<?php


SetupWebPage::AddModule(
	__FILE__,
	'combodo-coverage-windows-computation/2.0.0',
	array(
		// Identification
		//
		'label' => 'Plug-in SLA computation with coverage windows for UserRequest and Incidents',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'combodo-sla-computation/1.0.0',
			'itop-service-mgmt/2.0.0||itop-service-mgmt-provider/2.0.0',
		),
		'mandatory' => false,
		'visible' => true,

		// Components
		//
		'datamodel' => array(
		),
		'webservice' => array(
			
		),
		'data.struct' => array(

		),
		'data.sample' => array(
		),
		
		// Documentation
		//
		'doc.manual_setup' => '',
		'doc.more_information' => '',

		// Default settings
		//
		'settings' => array(
		),
	)
);

class CoverageWindowComputationInstaller extends ModuleInstallerAPI
{
	public static function BeforeWritingConfig(Config $oConfiguration)
	{
		$oConfiguration->SetModuleSetting('combodo-sla-computation', 'coverage_oql', 'SELECT CoverageWindow AS cw JOIN lnkCustomerContractToService AS l1 ON l1.coveragewindow_id = cw.id JOIN CustomerContract AS cc ON l1.customercontract_id = cc.id WHERE cc.org_id= :this->org_id AND l1.service_id = :this->service_id');
		return $oConfiguration;
	}
}
?>