<div class="container">
	<div class="hi-user"><?php echo Yii::t('labels','Hi') . ' ' . $username . '!'; ?></div>
	<div class="logo">
		<div class="activity-timer"><?php echo Yii::t('labels','Activity Timer'); ?></div>
	</div>
	<div class="row form">
		<?php
		echo CHtml::form('','post',array(
			'enctype'=>'multipart/form-data',
			'id'=>'new-activity-form',
		));
		?>
			<div class="col-md-4">
				<h2><?php echo Yii::t('labels','New Activity');?></h2>
				<label><?php echo Yii::t('labels', 'Name'); ?></label>
				<div><?php echo CHtml::textField('name',null); ?></div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<label><?php echo Yii::t('labels','Value'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('value',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-6">
						<label><?php echo Yii::t('labels','Iteration'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('iteration',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-6">
						<label><?php echo Yii::t('labels','Break'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('break',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-6">
						<label><?php echo Yii::t('labels','Total Iteration'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('total_iteration',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-offset-6 col-md-6"><?php echo CHtml::button('Save'); ?></div>
				</div>
			</div>
			<div class="col-md-4">
				<h2><?php echo Yii::t('labels','New Scenario');?></h2>
				<label><?php echo Yii::t('labels', 'Name'); ?></label>
				<div><?php echo CHtml::textField('name',null); ?></div>				
				<label><?php echo Yii::t('labels', 'Exist Activity'); ?></label>
				<div><?php echo CHtml::listBox('name',null,$data_activity,array('size'=>6)); ?></div>				
			</div>
			<div class="col-md-4">
				<label><?php echo Yii::t('labels', 'Scenario'); ?></label>
				<div><?php echo CHtml::listBox('scenario',null,$data_scenario,array('size'=>6)); ?></div>				
				<div class="col-md-offset-6 col-md-6"><?php echo CHtml::button('Save'); ?></div>
				<div><?php echo CHtml::dropDownList('exist_scenario',null,$data_scenario); ?></div>
				<div class="block-center"><?php echo CHtml::button('START',array(
					'class'=>'start-button',
					'id'=>'start'
				)); ?></div>
			</div>
		<?php
		echo CHtml::endForm();
		?>
	</div>
	<div id="execute">
		<div class="total-iteration-icon">5</div>
		<div class="iteration-icon">3</div>
		<div class="break-large">2</div>
		<div class="iteration-large">3</div>
		<div class="total-iteration-large">5</div>		
	</div>
</div>
<div class="copyright">
	<?php echo Yii::t('labels','All right reserved &copy ') .
		CHtml::link('shamisait.com','http://shamisait.com',array('target'=>'_blank'));
	?>
</div>
<?php
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$js=<<<eod
$("#start").click(function(){
	$("#content > div.container > div.row.form").fadeOut("fast");
	$("#execute").fadeIn("fast");
	$("#execute > div.iteration-large, #execute > div.total-iteration-large").hide();
})
eod;
$cs->registerScript(0,$js);
?>
