<?php

/**
 * This is the model class for table "{{usertasks}}".
 *
 * The followings are the available columns in table '{{usertasks}}':
 * @property integer $id
 * @property integer $designation_id
 * @property integer $scheme_id
 * @property integer $task_type
 * @property integer $task_id
 * @property string $task_description
 * @property integer $deadline
 * @property integer $status
 */
class Usertasks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usertasks the static model class
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
		return '{{usertasks}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('designation_id, scheme_id, task_type, task_id, task_description, deadline, status', 'required'),
			//array('designation_id, scheme_id, task_type, task_id, deadline, status', 'numerical', 'integerOnly'=>true),
			array('task_description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, designation_id, scheme_id, task_type, task_id, task_description, deadline, status', 'safe', 'on'=>'search'),
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
			'designation_id' => 'Designation',
			'scheme_id' => 'Scheme',
			'task_type' => 'Task Type',
			'task_id' => 'Task',
			'task_description' => 'Task Description',
			'deadline' => 'Deadline',
			'status' => 'Status',
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
		$criteria->compare('designation_id',$this->designation_id);
		$criteria->compare('scheme_id',$this->scheme_id);
		$criteria->compare('task_type',$this->task_type);
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('task_description',$this->task_description,true);
		$criteria->compare('deadline',$this->deadline);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}