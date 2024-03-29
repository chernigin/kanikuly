<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property integer $id
 * @property integer $student
 * @property integer $putevka
 * @property integer $period
 * @property string $place
 * @property string $note
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Student $student0
 * @property Putevka $putevka0
 * @property Period $period0
 */
class Requestuser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('putevka, period', 'required'),
			array('student, putevka, period', 'numerical', 'integerOnly'=>true),
			array('place', 'length', 'max'=>500),
			array('note', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, student, putevka, period, place, note, date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'student0' => array(self::BELONGS_TO, 'Student', 'student'),
			'putevka0' => array(self::BELONGS_TO, 'Putevka', 'putevka'),
			'period0' => array(self::BELONGS_TO, 'Period', 'period'),
            'status0' => array(self::BELONGS_TO, 'RequestStatus', 'status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student' => 'Студент',
                        'student0.surname' => 'Студент',
			'putevka' => 'Путевка',
                        'period' => 'Период',
			'period0.PeriodString' => 'Период',
			'note' => 'Примечание',
			'date' => 'Дата заполнения',
                        'putevka0.name' => 'Путевка',
                        'place'=>'Пожелание по расселению',
            'status0.name'=>'Статус',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('student',Yii::app()->user->id);
		$criteria->compare('putevka',$this->putevka);
		$criteria->compare('period',$this->period);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Requestuser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
