<?php

/**
 * This is the model class for table "{{summary}}".
 *
 * The followings are the available columns in table '{{summary}}':
 * @property integer $id
 * @property integer $schemeid
 * @property double $allottment
 * @property double $received
 * @property double $allotcentral
 * @property double $allotstate
 * @property double $receivedstate
 * @property double $receivedcentral
 */
class Summary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Summary the static model class
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
		return '{{summary}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, schemeid, allottment, received, allotcentral, allotstate, receivedstate, receivedcentral', 'required'),
			array('id, schemeid', 'numerical', 'integerOnly'=>true),
			array('allottment, received, allotcentral, allotstate, receivedstate, receivedcentral', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schemeid, allottment, received, allotcentral, allotstate, receivedstate, receivedcentral', 'safe', 'on'=>'search'),
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
			'allottment' => 'Allottment',
			'received' => 'Received',
			'allotcentral' => 'Allotcentral',
			'allotstate' => 'Allotstate',
			'receivedstate' => 'Receivedstate',
			'receivedcentral' => 'Receivedcentral',
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
		$criteria->compare('allottment',$this->allottment);
		$criteria->compare('received',$this->received);
		$criteria->compare('allotcentral',$this->allotcentral);
		$criteria->compare('allotstate',$this->allotstate);
		$criteria->compare('receivedstate',$this->receivedstate);
		$criteria->compare('receivedcentral',$this->receivedcentral);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}