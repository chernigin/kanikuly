<?php if (!Yii::app()->request->isAjaxRequest): ?>
 
<h1>Изменить путевку<?php echo $m->id; ?></h1>
 
<?php endif; ?>
 
<?php echo $this->renderPartial('_form', array('m'=>$m)); ?>