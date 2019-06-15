<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$data = Activities::model()->sortActivities();
		$this->render('index',array(
			'data'=>$data,
			'username'=>'Mohammadali',
			'data_activity'=>array('Blank'),
			'data_scenario'=>array('Blank')
		));
	}
	
	function actionNewActivity()
	{
		$this->renderPartial('new_activity');
	}
	
	function actionActivity()
	{
		$this->renderPartial('activity',array('activity'=>Activities::model()->findByPk($_POST['value'])));
	}
	
	function actionSaveActivity()
	{
		$activity = new Activities;
		$activity->attributes = $_POST['attributes'];
		$activity->save();
		$data = Activities::model()->sortActivities();
		$this->renderPartial('main',array('data'=>$data));
	}
	
	function actionLoadActivity()
	{
		$act = Activities::model()->findByPk($_POST['index']);
		echo json_encode(array(
			'name'=>$act->name,
			'value'=>$act->value,
			'iteration'=>$act->iteration,
			'nbreak'=>$act->break,
			'total_iteration'=>$act->total_iteration
		));
	}
	
}