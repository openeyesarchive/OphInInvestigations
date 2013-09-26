<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophininvestigations_bloodtests".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $hb_hct_tested
 * @property string $hb_hct
 * @property integer $bun_electrolytes_tested
 * @property string $bun_electrolytes
 * @property integer $blood_glucose_tested
 * @property string $blood_glucose
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphInInvestigations_BloodTests extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophininvestigations_bloodtests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, hb_hct_tested, hb_hct, bun_electrolytes_tested, bun_electrolytes, blood_glucose_tested, blood_glucose, ', 'safe'),
			array('hb_hct_tested, bun_electrolytes_tested, blood_glucose_tested', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, hb_hct_tested, hb_hct, bun_electrolytes_tested, bun_electrolytes, blood_glucose_tested, blood_glucose, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'hb_hct_tested' => 'Hb/Hct tested',
			'hb_hct' => 'Hb/Hct',
			'bun_electrolytes_tested' => 'BUN/Electrolytes',
			'bun_electrolytes' => 'BUN/Electrolytes',
			'blood_glucose_tested' => 'Blood glucose',
			'blood_glucose' => 'Blood glucose',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('hb_hct_tested', $this->hb_hct_tested);
		$criteria->compare('hb_hct', $this->hb_hct);
		$criteria->compare('bun_electrolytes_tested', $this->bun_electrolytes_tested);
		$criteria->compare('bun_electrolytes', $this->bun_electrolytes);
		$criteria->compare('blood_glucose_tested', $this->blood_glucose_tested);
		$criteria->compare('blood_glucose', $this->blood_glucose);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->hb_hct_tested && strlen($this->hb_hct) == 0) {
			$this->addError('hb_hct',$this->getAttributeLabel('hb_hct').' cannot be blank');
		}
		if ($this->bun_electrolytes_tested && strlen($this->bun_electrolytes) == 0) {
			$this->addError('bun_electrolytes',$this->getAttributeLabel('bun_electrolytes').' cannot be blank');
		}
		if ($this->blood_glucose_tested && strlen($this->blood_glucose) == 0) {
			$this->addError('blood_glucose',$this->getAttributeLabel('blood_glucose').' cannot be blank');
		}

		return parent::beforeValidate();
	}

	protected function beforeSave()
	{
		if (!$this->hb_hct_tested) {
			$this->hb_hct = '';
		}
		if (!$this->bun_electrolytes_tested) {
			$this->bun_electrolytes = '';
		}
		if (!$this->blood_glucose_tested) {
			$this->blood_glucose = '';
		}

		return parent::beforeSave();
	}
}
?>
