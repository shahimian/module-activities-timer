<?php

/**
 * This is the model class for table "yii_activities".
 *
 * The followings are the available columns in table 'yii_activities':
 * @property string $activity_id
 * @property string $name
 * @property integer $value
 * @property integer $iteration
 * @property integer $break
 * @property integer $total_iteration
 */
class Activities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Activities the static model class
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
		return Yii::app()->controller->module->prefixTable . 'activities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, value, iteration, break, total_iteration', 'required'),
			array('value, iteration, break, total_iteration', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('activity_id, name, value, iteration, break, total_iteration', 'safe', 'on'=>'search'),
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
			'activity_id' => 'Activity',
			'name' => 'Name',
			'value' => 'Value',
			'iteration' => 'Iteration',
			'break' => 'Break',
			'total_iteration' => 'Total Iteration',
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

		$criteria->compare('activity_id',$this->activity_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('iteration',$this->iteration);
		$criteria->compare('break',$this->break);
		$criteria->compare('total_iteration',$this->total_iteration);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	function sortActivities()
	{
		$activities = $this->findAll();
		$data = array(Yii::t('labels','New scenario'));
		foreach($activities as $row)
			$data[$row->activity_id] = $row->name;
		return $data;
	}
	
}