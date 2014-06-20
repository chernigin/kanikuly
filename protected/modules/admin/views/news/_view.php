<tr>
                       
                        <td style='width:100px; text-align: center;'>
                           <?php echo CHtml::link(CHtml::encode($data->time), array('view', 'id'=>$data->id_news)); ?>
                        </td>
                        <td>
                           <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id_news)); ?>
                        </td>
 </tr>