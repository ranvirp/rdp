<?php

/**
 * This is the model class for table "{{instructions}}".
 *
 * The followings are the available columns in table '{{instructions}}':
 * @property integer $id
 * @property integer $schemeid
 * @property integer $from
 * @property integer $to
 * @property integer $instruction
 * @property integer $status
 * @property integer $history
 * @property string $attachments
 * @property integer $parentinst
 */
class Instructions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Instructions the static model class
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
		return '{{instructions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id, schemeid, from, to, instruction, status, history, attachments, parentinst', 'required'),
			//array('id, schemeid, from, to, instruction, status, history, parentinst', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schemeid, from, to, instruction, status, history, attachments, parentinst', 'safe', 'on'=>'search'),
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
			'instruction' => 'Instruction',
			'status' => 'Status',
			'history' => 'History',
			'attachments' => 'Attachments',
			'parentinst' => 'Parentinst',
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
		$criteria->compare('instruction',$this->instruction);
		$criteria->compare('status',$this->status);
		$criteria->compare('history',$this->history);
		$criteria->compare('attachments',$this->attachments,true);
		$criteria->compare('parentinst',$this->parentinst);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}