<?php

/**
 * This is the model class for table "{{cashbook}}".
 *
 * The followings are the available columns in table '{{cashbook}}':
 * @property integer $id
 * @property integer $schemeid
 * @property integer $from
 * @property integer $to
 * @property double $amount
 * @property string $dateoftr
 * @property string $trtype
 * @property string $trdetails
 * @property string $trdoc
 */
class Cashbook extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cashbook the static model class
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
		return '{{cashbook}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schemeid, from, to, amount, dateoftr, trtype, trdetails, trdoc', 'required'),
			array('schemeid, from, to', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('trtype', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schemeid, from, to, amount, dateoftr, trtype, trdetails, trdoc', 'safe', 'on'=>'search'),
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
			'schemeid' => 'Schemeid',
			'from' => 'From',
			'to' => 'To',
			'amount' => 'Amount',
			'dateoftr' => 'Dateoftr',
			'trtype' => 'Trtype',
			'trdetails' => 'Trdetails',
			'trdoc' => 'Trdoc',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('schemeid',$this->schemeid);
		$criteria->compare('from',$this->from);
		$criteria->compare('to',$this->to);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('dateoftr',$this->dateoftr,true);
		$criteria->compare('trtype',$this->trtype,true);
		$criteria->compare('trdetails',$this->trdetails,true);
		$criteria->compare('trdoc',$this->trdoc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}