<?php

/**
 * This is the model class for table "{{works}}".
 *
 * The followings are the available columns in table '{{works}}':
 * @property string $id
 * @property string $bwid
 * @property string $name
 * @property string $finyear
 * @property double $amount
 * @property string $schemecode
 * @property string $agencycode
 */
class Works extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Works the static model class
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
		return '{{works}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bwid, name, finyear, amount, schemecode, agencycode', 'required'),
			array('amount', 'numerical'),
			array('bwid', 'length', 'max'=>30),
			array('finyear', 'length', 'max'=>7),
			array('schemecode, agencycode', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bwid, name, finyear, amount, schemecode, agencycode', 'safe', 'on'=>'search'),
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
			'finyear' => 'Finyear',
			'amount' => 'Amount',
			'schemecode' => 'Schemecode',
			'agencycode' => 'Agencycode',
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
		$criteria->compare('finyear',$this->finyear,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('schemecode',$this->schemecode,true);
		$criteria->compare('agencycode',$this->agencycode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}