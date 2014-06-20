<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Ошибка',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="alert alert-error">
<img style="width:100px; height:100px;" src="/images/grumpy.png"/><?php echo CHtml::encode($message); ?>
</div>