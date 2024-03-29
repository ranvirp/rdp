<?php

/**
 * This is the model base class for the table "{{files}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Files".
 *
 * Columns in table "{{files}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $mimetype
 * @property string $size
 * @property string $path
 * @property string $deleteAccess
 * @property string $updateAccess
 * @property string $viewAccess
 * @property string $originalname
 *
 */
abstract class BaseFiles extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{files}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Files|Files', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			//array('title, desc, mimetype, size, path, deleteAccess, updateAccess, viewAccess, originalname', 'required'),
			array('mimetype, deleteAccess, updateAccess, viewAccess', 'length', 'max'=>255),
			array('size', 'length', 'max'=>5),
			array('id, title, desc, mimetype, size, path, deleteAccess, updateAccess, viewAccess, originalname', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'desc' => Yii::t('app', 'Desc'),
			'mimetype' => Yii::t('app', 'Mimetype'),
			'size' => Yii::t('app', 'Size'),
			'path' => Yii::t('app', 'Path'),
			'deleteAccess' => Yii::t('app', 'Delete Access'),
			'updateAccess' => Yii::t('app', 'Update Access'),
			'viewAccess' => Yii::t('app', 'View Access'),
			'originalname' => Yii::t('app', 'Originalname'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('desc', $this->desc, true);
		$criteria->compare('mimetype', $this->mimetype, true);
		$criteria->compare('size', $this->size, true);
		$criteria->compare('path', $this->path, true);
		$criteria->compare('deleteAccess', $this->deleteAccess, true);
		$criteria->compare('updateAccess', $this->updateAccess, true);
		$criteria->compare('viewAccess', $this->viewAccess, true);
		$criteria->compare('originalname', $this->originalname, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}