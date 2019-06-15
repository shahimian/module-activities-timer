<?php $this->pageTitle = Yii::t('labels','Activity Timer'); ?>
<!DOCTYPE html>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/stylesheets/styles.css">
<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon.ico" type="image/ico" />
<title><?php echo $this->pageTitle; ?></title>
</head>

<body>
<?php echo $content; ?>
</body>
</html>