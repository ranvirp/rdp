<?php

/**
 * This is the model class for table "beneficiary".
 *
 * The followings are the available columns in table 'beneficiary':
 * @property string $id
 * @property string $bwid
 * @property string $name
 * @property string $father
 * @property string $husband
 * @property string $dob
 * @property integer $age
 * @property string $ason
 * @property string $religion
 * @property string $caste
 * @property string $castename
 */
class Beneficiary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Beneficiary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'beneficiary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bwid, name, father, husband, dob, age, ason, religion, caste, castename', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('bwid', 'length', 'max'=>20),
			array('name, father, husband, castename', 'length', 'max'=>100),
			array('religion', 'length', 'max'=>10),
			array('caste', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bwid, name, father, husband, dob, age, ason, religion, caste, castename', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bwid' => 'Bwid',
			'name' => 'Name',
			'father' => 'Father',
			'husband' => 'Husband',
			'dob' => 'Dob',
			'age' => 'Age',
			'ason' => 'Ason',
			'religion' => 'Religion',
			'caste' => 'Caste',
			'castename' => 'Castename',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('bwid',$this->bwid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('father',$this->father,true);
		$criteria->compare('husband',$this->husband,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('ason',$this->ason,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('caste',$this->caste,true);
		$criteria->compare('castename',$this->castename,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}