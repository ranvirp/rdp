<?php

/**
 * This is the model class for table "{{district}}".
 *
 * The followings are the available columns in table '{{district}}':
 * @property integer $id
 * @property string $name
 * @property integer $districtcode
 * @property string $hqr
 * @property string $loc
 * @property integer $tehsils
 * @property integer $blocks
 * @property integer $revvill
 * @property integer $panchayats
 * @property double $area
 */
class District extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return District the static model class
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
		return '{{district}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, districtcode, hqr, loc, tehsils, blocks, revvill, panchayats, area', 'required'),
			array('districtcode, tehsils, blocks, revvill, panchayats', 'numerical', 'integerOnly'=>true),
			array('area', 'numerical'),
			array('name, loc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, districtcode, hqr, loc, tehsils, blocks, revvill, panchayats, area', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'districtcode' => 'Districtcode',
			'hqr' => 'Hqr',
			'loc' => 'Loc',
			'tehsils' => 'Tehsils',
			'blocks' => 'Blocks',
			'revvill' => 'Revvill',
			'panchayats' => 'Panchayats',
			'area' => 'Area',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('districtcode',$this->districtcode);
		$criteria->compare('hqr',$this->hqr,true);
		$criteria->compare('loc',$this->loc,true);
		$criteria->compare('tehsils',$this->tehsils);
		$criteria->compare('blocks',$this->blocks);
		$criteria->compare('revvill',$this->revvill);
		$criteria->compare('panchayats',$this->panchayats);
		$criteria->compare('area',$this->area);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}