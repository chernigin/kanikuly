<?php 
$c_month=$this->month;
$c_year=$this->year;
if ($c_month<10) $c_month="0".$c_month;
$criteria = (string)"date like '".$c_year."-".$c_month."%'";
$stud=Yii::app()->db->createCommand()
                ->select('date')
                ->from('developments')		
                ->where($criteria)
                ->queryAll();
//echo $stud [0]['date'];
//echo $stud [1]['date'];

 ?>

<table id="calendar">
    <thead>
        <tr class="month-year-row">
            <th class="previous-month"><?php echo CHtml::link('<<', $this->previousLink); ?></th>
            <th colspan="5"><?php echo $this->monthName.', '.$this->year; ?></th>
            <th class="next-month"><?php echo CHtml::link('>>', $this->nextLink); ?></th>
        </tr>
        <tr class="weekdays-row">
            <?php foreach(Yii::app()->locale->getWeekDayNames('narrow') as $weekDay): ?>
                <th><?php echo $weekDay; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php $daysStarted = false; $day = 1; ?>
        <?php for($i = 1; $i <= $this->daysInCurrentMonth+$this->firstDayOfTheWeek; $i++): ?>
            <?php if(!$daysStarted) $daysStarted = ($i == $this->firstDayOfTheWeek+1); ?>
            <td <?php if($day == $this->day) echo 'class="calendar-selected-day a"'; ?>
                  <?php
                    if ($day<10) $c_day="0".$day;
              else $c_day=$day;
              
            $current_data = (string)$c_year."-".$c_month."-".$c_day;
            foreach ($stud as $date): 
                      if ($date['date']==$current_data) echo 'class="selected-day"';
                    endforeach;?>
                >
                <?php if($daysStarted && $day <= $this->daysInCurrentMonth): ?>
                    <?php echo CHtml::link($day, $this->getDayLink($day)); $day++; ?>
                <?php endif; ?>
            </td>
            <?php if($i % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
        <?php endfor; ?>
        </tr>
    </tbody>
</table>


<?php

        
      
                

?>