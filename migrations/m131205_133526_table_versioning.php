<?php

class m131205_133526_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophininvestigations_bloodtests_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`hb_hct_tested` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`hb_hct` varchar(20) COLLATE utf8_bin DEFAULT '',
	`bun_electrolytes_tested` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`bun_electrolytes` varchar(20) COLLATE utf8_bin DEFAULT '',
	`blood_glucose_tested` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`blood_glucose` varchar(20) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophininvestigations_bloodtests_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophininvestigations_bloodtests_cui_fk` (`created_user_id`),
	KEY `acv_et_ophininvestigations_bloodtests_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophininvestigations_bloodtests_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_bloodtests_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_bloodtests_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophininvestigations_bloodtests_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophininvestigations_bloodtests_version');

		$this->createIndex('et_ophininvestigations_bloodtests_aid_fk','et_ophininvestigations_bloodtests_version','id');
		$this->addForeignKey('et_ophininvestigations_bloodtests_aid_fk','et_ophininvestigations_bloodtests_version','id','et_ophininvestigations_bloodtests','id');

		$this->addColumn('et_ophininvestigations_bloodtests_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophininvestigations_bloodtests_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophininvestigations_bloodtests_version','version_id');
		$this->alterColumn('et_ophininvestigations_bloodtests_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophininvestigations_cxr_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`cxr_tested` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`cxr` varchar(20) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophininvestigations_cxr_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophininvestigations_cxr_cui_fk` (`created_user_id`),
	KEY `acv_et_ophininvestigations_cxr_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophininvestigations_cxr_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_cxr_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_cxr_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophininvestigations_cxr_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophininvestigations_cxr_version');

		$this->createIndex('et_ophininvestigations_cxr_aid_fk','et_ophininvestigations_cxr_version','id');
		$this->addForeignKey('et_ophininvestigations_cxr_aid_fk','et_ophininvestigations_cxr_version','id','et_ophininvestigations_cxr','id');

		$this->addColumn('et_ophininvestigations_cxr_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophininvestigations_cxr_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophininvestigations_cxr_version','version_id');
		$this->alterColumn('et_ophininvestigations_cxr_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophininvestigations_ecg_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`ecg_tested` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`ecg` varchar(20) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophininvestigations_ecg_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophininvestigations_ecg_cui_fk` (`created_user_id`),
	KEY `acv_et_ophininvestigations_ecg_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophininvestigations_ecg_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_ecg_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_ecg_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophininvestigations_ecg_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophininvestigations_ecg_version');

		$this->createIndex('et_ophininvestigations_ecg_aid_fk','et_ophininvestigations_ecg_version','id');
		$this->addForeignKey('et_ophininvestigations_ecg_aid_fk','et_ophininvestigations_ecg_version','id','et_ophininvestigations_ecg','id');

		$this->addColumn('et_ophininvestigations_ecg_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophininvestigations_ecg_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophininvestigations_ecg_version','version_id');
		$this->alterColumn('et_ophininvestigations_ecg_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophininvestigations_urinalysis_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`urinalysis_tested` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`urinalysis` varchar(20) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophininvestigations_urinalysis_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophininvestigations_urinalysis_cui_fk` (`created_user_id`),
	KEY `acv_et_ophininvestigations_urinalysis_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophininvestigations_urinalysis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_urinalysis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophininvestigations_urinalysis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophininvestigations_urinalysis_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophininvestigations_urinalysis_version');

		$this->createIndex('et_ophininvestigations_urinalysis_aid_fk','et_ophininvestigations_urinalysis_version','id');
		$this->addForeignKey('et_ophininvestigations_urinalysis_aid_fk','et_ophininvestigations_urinalysis_version','id','et_ophininvestigations_urinalysis','id');

		$this->addColumn('et_ophininvestigations_urinalysis_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophininvestigations_urinalysis_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophininvestigations_urinalysis_version','version_id');
		$this->alterColumn('et_ophininvestigations_urinalysis_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

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

		$this->dropTable('et_ophininvestigations_bloodtests_version');
		$this->dropTable('et_ophininvestigations_cxr_version');
		$this->dropTable('et_ophininvestigations_ecg_version');
		$this->dropTable('et_ophininvestigations_urinalysis_version');
	}
}
