<?php

class m130904_110735_hb_hct_label_setting extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("id")->from("event_type")->where("class_name = :class_name",array(":class_name"=>"OphInInvestigations"))->queryRow();
		$element_type = $this->dbConnection->createCommand()->select("id")->from("element_type")->where("event_type_id = :event_type_id and class_name = :class_name",array(":event_type_id"=>$event_type['id'],":class_name"=>"Element_OphInInvestigations_BloodTests"))->queryRow();
		if (!$setting_field_type = $this->dbConnection->createCommand()->select("id")->from("setting_field_type")->where("name = :name",array(":name"=>"String"))->queryRow()) {
			$this->insert('setting_field_type',array('name' => 'String'));
			$setting_field_type = $this->dbConnection->createCommand()->select("id")->from("setting_field_type")->where("name = :name",array(":name"=>"String"))->queryRow();
		}

		$this->insert('setting_metadata',array(
			'element_type_id' => $element_type['id'],
			'field_type_id' => $setting_field_type['id'],
			'key' => 'hb_hct_label',
			'name' => 'Hb/Hct label',
			'default_value' => '4 - 11 mmol/l',
		));
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("id")->from("event_type")->where("class_name = :class_name",array(":class_name"=>"OphInInvestigations"))->queryRow();
		$element_type = $this->dbConnection->createCommand()->select("id")->from("element_type")->where("event_type_id = :event_type_id and class_name = :class_name",array(":event_type_id"=>$event_type['id'],":class_name"=>"Element_OphInInvestigations_BloodTests"))->queryRow();

		$this->delete('setting_metadata',"element_type_id = {$element_type['id']} and `key`='hb_hct_label'");
	}
}
