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
					<div class="col-xs-6">
						<label><?php echo Yii::t('labels','Value'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('value',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-xs-6">
						<label><?php echo Yii::t('labels','Iteration'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('iteration',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-xs-6">
						<label><?php echo Yii::t('labels','Break'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('break',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="col-xs-6">
						<label><?php echo Yii::t('labels','Total Iteration'); ?></label>
						<div class="clearfix"></div>
						<div><?php echo CHtml::textField('total_iteration',null); ?></div>
						<div class="clearfix"></div>
					</div>
					<div class="button"><?php echo CHtml::button(Yii::t('labels', 'Save')); ?></div>
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
				<div class="button"><?php echo CHtml::button('Save'); ?></div>
				<div><?php echo CHtml::dropDownList('exist_scenario',null,$data_scenario); ?></div>
				<div class="button"><?php echo CHtml::button(Yii::t('labels', 'Start'),array(
					'class'=>'start-button',
					'id'=>'start'
				)); ?></div>
			</div>
		<?php
		echo CHtml::endForm();
		?>
	</div>
	<div id="execute" class="row">
		<div class="total-iteration-icon col-xs-3">5</div>
		<div class="iteration-icon col-xs-3">3</div>
		<div class="break-large">2</div>
		<div class="iteration-large">3</div>
		<div class="total-iteration-large">5</div>
		<div class="button"><?php echo CHtml::button(Yii::t('labels', 'Reset'),array(
			'class'=>'reset-button',
			'id'=>'reset'
		)); ?></div>
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
	$("#execute > div, #execute").fadeIn();
	$("#execute > div.iteration-large, #execute > div.total-iteration-large").hide();
})
$("#reset").click(function(){
	$("#execute").fadeOut();
	$("#content > div.container > div.row.form").fadeIn("fast");
})
eod;
$cs->registerScript(0,$js);
/*
$newact=CController::createUrl('default/newActivity');
$act=CController::createUrl('default/activity');
$save=CController::createUrl('default/saveActivity');
$load=CController::createUrl('default/loadActivity');
echo CHtml::dropDownList('type',null,$data);
echo CHtml::button(Yii::t('labels','Go!'),array('id'=>'submit'));
echo CHtml::button(Yii::t('labels','Save'),array('id'=>'save'));
$js=<<<eod
$("#submit").hide();
newActivity();
$("#type").change(function(){
	$(this).children("option:selected").each(function(){
		var val = $(this).attr("value");
		if(val == 0){
			$("#activity").remove();
			$("#submit, #save").toggle("fast");
			newActivity();
		} else {
			$("#new_activity, #activity").remove();
			activity(val);
			$("#submit").show("fast").attr("index",val);
			$("#save").hide("fast");
		}
	})
})

function newActivity(){
	$.ajax({
		type: "post",
		url: "$newact",
		success: function(html){
			$("body").append(html);
		}
	});
}

function activity(val){
	$.ajax({
		type: "post",
		url: "$act",
		data: {value: val},
		success: function(html){
			$("body").append(html);
		}
	});
}

$("#save").click(function(){
	$.ajax({
		type: "post",
		url: "$save",
		data: {
			attributes : {
				name: $("#name").val(),
				value: $("#value").val(),
				iteration: $("#iteration").val(),
				break: $("#break").val(),
				total_iteration: $("#total_iteration").val()
			}
		},
		success: function(html){
			$("body").empty().append(html);
		}
	});
})

$("#submit").click(function(){
	var json;
	$.ajax({
		type: "post",
		url: "$load",
		data: { index: $(this).attr("index")},
		success: function(data){
			json = $.parseJSON(data);
			$("body").empty();
			startActivity(json);
		}
	});
})

function startActivity(data){
	var totalIteration = 0, value = 0, iteration = 0, nBreak = 0, sec = 1000;
	var timer, start = 0, end = data.total_iteration * ( data.iteration * data.value + data.nbreak);
	timer = setInterval(function(){
		if(start == end){
			clearInterval(timer);
		} else {
			start += 1;
			if(totalIteration != data.total_iteration){
				totalIteration += 1;
				console.log("totalIteration: " + totalIteration);
				console.log("iteration: " + iteration);
				if(iteration == data.iteration){
					iteration = 0;
					console.log("break: " + nBreak);
					nBreak = nBreak == data.nbreak ? 0 : nBreak + 1;				
				} else {
					iteration += 1;
					console.log("value: " + value);
					value = value == data.value ? 0 : value + 1;
				}				
			}
		}
	}, sec);
}

eod;
*/
?>
