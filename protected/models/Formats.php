<?php

/**
 * This is the model class for table "{{formats}}".
 *
 * The followings are the available columns in table '{{formats}}':
 * @property integer $id
 * @property integer $schemeid
 * @property string $name
 * @property string $description
 * @property integer $formatfile_id
 * @property string $xsd
 * @property string $xml
 * @property string $aggregator
 * @property string $periodicity
 */
class Formats extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Formats the static model class
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
		return '{{formats}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schemeid, name, description, formatfile_id, xsd, xml, aggregator, periodicity', 'required'),
			array('schemeid, formatfile_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('periodicity', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schemeid, name, description, formatfile_id, xsd, xml, aggregator, periodicity', 'safe', 'on'=>'search'),
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
		'scheme'=>array(self::BELONGS_TO,'Schemes','schemeid'),
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
			'name' => 'Name',
			'description' => 'Description',
			'formatfile_id' => 'Formatfile',
			'xsd' => 'Xsd',
			'xml' => 'Xml',
			'aggregator' => 'Aggregator',
			'periodicity' => 'Periodicity',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('formatfile_id',$this->formatfile_id);
		$criteria->compare('xsd',$this->xsd,true);
		$criteria->compare('xml',$this->xml,true);
		$criteria->compare('aggregator',$this->aggregator,true);
		$criteria->compare('periodicity',$this->periodicity,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/*
	function to dump data stored in an excel file
	*/
	public function showFormat()
	{
		//get the link of the file
		$file = new Files($this->formatfile_id);
		$path = $file->fileWithPath();
		if (preg_match("/xlsx$/",$file->originalname)!=0){
			Yii::import('application.vendors.simplexlsx.*');
			$xlsx = new SimpleXLSX($excelfile);
			return $xlsx->dump();
		}
		else {
	
	if (preg_match("/xls$/",$file->originalname)!=0) {	
       Yii::import('application.vendors.php-excel-reader.*');
		$xls = new Spreadsheet_Excel_Reader($excelfile);
		return $xls->dump();
	}
	}
	}
}