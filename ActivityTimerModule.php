<?php

class ActivityTimerModule extends CWebModule
{

	public $prefixTable;
	public $theme;
	
	public function init()
	{
		$this->setImport(array(
			'ActivityTimer.models.*',
			'ActivityTimer.components.*',
		));
		
		Yii::app()->theme = $this->theme;
		$this->prefixTable .= strlen($this->prefixTable) ? '_' : null;
		
		if(!Yii::app()->db->schema->getTable($this->prefixTable . 'activities') || !Yii::app()->db->schema->getTable($this->prefixTable . 'activities_scenario'))
		{
			Yii::app()->db->createCommand()->createTable($this->prefixTable . 'activities',array(
				'activity_id'=>'pk',
				'user_id'=>'bigint',
				'name'=>'text',
				'value'=>'int',
				'iteration'=>'int',
				'break'=>'int',
				'total_iteration'=>'int'
			),'ENGINE=InnoDB');
			Yii::app()->db->createCommand()->createIndex('user',$this->prefixTable . 'activities', 'user_id');
			Yii::app()->db->createCommand()->addForeignKey('user',$this->prefixTable . 'activities', 'user_id', 'users', 'user_id');
			Yii::app()->db->createCommand()->createTable($this->prefixTable . 'activities_scenario',array(
				'scenario_id'=>'pk',
				'user_id'=>'bigint',
				'name'=>'text',
				'scenario'=>'text',
			),'ENGINE=InnoDB');
			Yii::app()->db->createCommand()->createIndex('user',$this->prefixTable . 'activities_scenario', 'user_id');
			Yii::app()->db->createCommand()->addForeignKey('user',$this->prefixTable . 'activities_scenario', 'user_id', 'users', 'user_id');
		}		
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
			return false;
	}
}
