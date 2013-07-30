<?php

/**
 * This is the model class for table "{{designation}}".
 *
 * The followings are the available columns in table '{{designation}}':
 * @property integer $id
 * @property integer $designation_type_id
 * @property string $details
 * @property string $user
 * @property string $level
 * @property integer $level_id
 */
class Designation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Designation the static model class
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
		return '{{designation}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('designation_type_id, level_id', 'required'),
			array('designation_type_id, level_id', 'numerical', 'integerOnly'=>true),
			array('details', 'length', 'max'=>255),
			array('user', 'length', 'max'=>20),
			array('level', 'length', 'max'=>10),
			array('designation_type_id', 'UniqueAttributesValidator',
                      'with'=>'level_id'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, designation_type_id, details, user, level, level_id', 'safe', 'on'=>'search'),
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
		'designation_type'=>array(self::BELONGS_TO,'Designation_types','designation_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'designation_type_id' => 'Designation Type',
			'details' => 'Details',
			'user' => 'User',
			'level' => 'Level',
			'level_id' => 'Level',
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
		$criteria->compare('designation_type_id',$this->designation_type_id);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('level_id',$this->level_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public  function getLevelObj($level,$objid){
            //return $level.":".$objid;
	 return $level::model()->findByPk($objid)->name;
	}
}