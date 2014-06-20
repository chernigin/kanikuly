<?php

/**
 * This is the model class for table "period".
 *
 * The followings are the available columns in table 'period':
 * @property integer $id
 * @property string $period1
 * @property string $period2
 * @property integer $putevka
 *
 * The followings are the available model relations:
 * @property Putevka $putevka0
 * @property Request[] $requests
 */
class Period extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Period the static model class
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
		return 'period';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('period1, period2, putevka', 'required'),
			array('putevka', 'numerical', 'integerOnly'=>true),
                        array('period1, period2,','match','pattern'=>'/^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/u','message'=>'Формат даты ГГГГ-ММ-ДД.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, period1, period2, putevka', 'safe', 'on'=>'search'),
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
			'requests' => array(self::HAS_MANY, 'Request', 'period'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'period1' => 'Дата от',
			'period2' => 'Дата до',
			'putevka' => 'Путевка',
		);
	}
        public function getPeriodString()
        {
            return $this->period1. ' - '.$this->period2;
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

		$criteria->compare('id',$this->id);
		$criteria->compare('period1',$this->period1,true);
		$criteria->compare('period2',$this->period2,true);
		$criteria->compare('putevka',$this->putevka);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}