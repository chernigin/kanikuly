<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property integer $id
 * @property integer $student
 * @property integer $putevka
 * @property integer $period
 * @property string $note
 * @property string $date
 */
class Request extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Request the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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
			array('student, putevka, period', 'required'),
			array('student, putevka, period', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>3000),
                        array('place', 'length', 'max'=>500),
                        array('date,','match','pattern'=>'/^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/u','message'=>'Формат даты ГГГГ-ММ-ДД.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
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
                    'putevka0' => array(self::BELONGS_TO, 'Putevka', 'putevka'),
                    'period0' => array(self::BELONGS_TO, 'Period', 'period'),
                    'student0' => array(self::BELONGS_TO,'Student', 'student'),
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
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',  $this->id);
		$criteria->compare('student',$this->student);
		$criteria->compare('putevka',$this->putevka);
		$criteria->compare('period',$this->period);
		$criteria->compare('note',$this->note,true);
                $criteria->compare('place',$this->place,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}