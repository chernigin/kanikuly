<?php

$this->menu=array(
	array('label'=>'Журнал студентов', 'url'=>array('index')),
	array('label'=>'Создать студента', 'url'=>array('create')),
	array('label'=>'Просмотр студента', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>'Изменить студента', 'url'=>array('update', 'id'=>$model->id)),
);
?>
Укажите пароль <br/>
<?php
 echo CHtml::form();
 echo CHtml::textField ('Password');
 echo CHtml::submitButton('Изменить');
 echo CHtml::endForm();        
?>