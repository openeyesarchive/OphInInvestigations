<?php 
class m130904_093835_event_type_OphInInvestigations extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphInInvestigations'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Investigation events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphInInvestigations', 'name' => 'Investigations','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphInInvestigations'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Blood tests',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Blood tests','class_name' => 'Element_OphInInvestigations_BloodTests', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Blood tests'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'ECG',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'ECG','class_name' => 'Element_OphInInvestigations_Ecg', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'ECG'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'CXR',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'CXR','class_name' => 'Element_OphInInvestigations_Cxr', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'CXR'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Urinalysis',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Urinalysis','class_name' => 'Element_OphInInvestigations_Urinalysis', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Urinalysis'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophininvestigations_bloodtests', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'hb_hct_tested' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Hb Hct
				'hb_hct' => 'varchar(20) DEFAULT \'\'', // Hb Hct
				'bun_electrolytes_tested' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // BUN Electrolytes
				'bun_electrolytes' => 'varchar(20) DEFAULT \'\'', // BUN Electrolytes
				'blood_glucose_tested' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Blood glucose
				'blood_glucose' => 'varchar(20) DEFAULT \'\'', // Blood glucose
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophininvestigations_bloodtests_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophininvestigations_bloodtests_cui_fk` (`created_user_id`)',
				'KEY `et_ophininvestigations_bloodtests_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophininvestigations_bloodtests_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_bloodtests_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_bloodtests_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophininvestigations_ecg', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'ecg_tested' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // ECG
				'ecg' => 'varchar(20) DEFAULT \'\'', // ECG
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophininvestigations_ecg_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophininvestigations_ecg_cui_fk` (`created_user_id`)',
				'KEY `et_ophininvestigations_ecg_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophininvestigations_ecg_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_ecg_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_ecg_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophininvestigations_cxr', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'cxr_tested' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // CXR
				'cxr' => 'varchar(20) DEFAULT \'\'', // CXR
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophininvestigations_cxr_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophininvestigations_cxr_cui_fk` (`created_user_id`)',
				'KEY `et_ophininvestigations_cxr_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophininvestigations_cxr_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_cxr_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_cxr_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophininvestigations_urinalysis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'urinalysis_tested' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Urinalysis
				'urinalysis' => 'varchar(20) DEFAULT \'\'', // Urinalysis
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophininvestigations_urinalysis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophininvestigations_urinalysis_cui_fk` (`created_user_id`)',
				'KEY `et_ophininvestigations_urinalysis_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophininvestigations_urinalysis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_urinalysis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophininvestigations_urinalysis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophininvestigations_bloodtests');



		$this->dropTable('et_ophininvestigations_ecg');



		$this->dropTable('et_ophininvestigations_cxr');



		$this->dropTable('et_ophininvestigations_urinalysis');




		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphInInvestigations'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphInInvestigations does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

