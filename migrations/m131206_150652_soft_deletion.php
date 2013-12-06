<?php

class m131206_150652_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophininvestigations_bloodtests','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_bloodtests_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_cxr','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_cxr_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_ecg','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_ecg_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_urinalysis','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophininvestigations_urinalysis_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophininvestigations_bloodtests','deleted');
		$this->dropColumn('et_ophininvestigations_bloodtests_version','deleted');
		$this->dropColumn('et_ophininvestigations_cxr','deleted');
		$this->dropColumn('et_ophininvestigations_cxr_version','deleted');
		$this->dropColumn('et_ophininvestigations_ecg','deleted');
		$this->dropColumn('et_ophininvestigations_ecg_version','deleted');
		$this->dropColumn('et_ophininvestigations_urinalysis','deleted');
		$this->dropColumn('et_ophininvestigations_urinalysis_version','deleted');
	}
}
