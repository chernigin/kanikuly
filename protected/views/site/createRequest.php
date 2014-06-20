<?php

$this->breadcrumbs=array(
	'Заявка',
);
?>
<?php $this->pageTitle = 'Каникулы ЮФУ | Онлайн-заявка'; ?>

<head>
<?php if(Yii::app()->user->hasFlash('requestMessage')):?>
<div class="flag"><?php echo Yii::app()->user->getFlash('requestMessage');?></div>
<?php endif;?>

<script>
    function load_periods(p_id)
    {
         $('#pperiod').empty();
            $.ajax({
                url:'/index.php/site/PutevkaPeriod?p_id='+p_id,
                type:'get',
                dataType:'json',
                success:function(d){
                    if(d.content && d.content.length)
                    {
                        d.content.forEach(function(v){
                            $('#pperiod').append(
                                    '<option value="'+v.id+'"> с '+
                                    v.period1 + ' по ' +v.period2+
                                    '</option>');
                        });
                    }
                }
            });
    }
    
    $(function(){
        load_periods($('#putevka').val());
        $('#putevka').change(function(){
           load_periods($(this).val());
        });
    });
</script>
<script>
            $(document).ready(function()
                {
                    $('.flag').delay(5000).hide("slow");
                });
</script>
</head>
<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 style="margin-bottom:5px;margin-top:5px;">Внимание!</h4>
  <p style="font-size:12pt;">В случае некорректно заполненого профиля, Ваша заявка рассмотрена не будет.</p>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>
<h1>Оформление путевки</h1>
<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>

	<?php echo $form->errorSummary($model); ?>



        <div class="row">
            <?php echo $form->labelEx($model,'putevka'); ?>
            <select id="putevka" name="Request[putevka]">
                    <?php foreach ($putevka as $t):?>
                    <option value="<?php echo $t->id ?>" 
                        <?php echo('t_id'==$t->id?'selected':'')?> >
                        <?php echo $t['name']?>
                    </option>
                    <?php endforeach;?>
            </select>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'period'); ?>
            <select id="pperiod" name="Request[period]">
            </select>
        </div>


	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>5, 'cols'=>10,'maxlength'=>2000,'placeholder'=>"Ваши достижения")); ?>
	</div>	
        
        <div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textArea($model,'place',array('rows'=>5, 'cols'=>75,'maxlength'=>2000,'placeholder'=>"Пожелания по расселению")); ?>
	</div>
        
	<div class="row buttons">
		<button class="btn btn-large btn-primary" type="submit">Оформить</button>
    </div>
         

<?php $this->endWidget(); ?>

</div><!-- form -->
