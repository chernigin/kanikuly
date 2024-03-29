<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property string $create_time
 * @property integer $user_id
 * @property integer $news_id
 *
 * The followings are the available model relations:
 * @property News $news
 * @property Student $user
 */


class Comment extends CActiveRecord
{
    
    public $verifyCode;
    const STATUS_PENDING=1;
    const STATUS_APPROVED=1;
	
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, status', 'required'),
			array('status, user_id, news_id', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, status, create_time, user_id, news_id', 'safe', 'on'=>'search'),
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
			'status0' => array(self::BELONGS_TO, 'Status_Type', 'status'),
			'news' => array(self::BELONGS_TO, 'News', 'news_id'),
			'user' => array(self::BELONGS_TO, 'Student', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Текст коментария',
			'status' => 'Статус',
			'status0.type' => 'Статус',
			'create_time' => 'Дата создания',
			'user_id' => 'Пользователь',
			'news_id' => 'Новость',
			'news.name' => 'Новость',
			'student.surname' => 'Пользователь',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('news_id',$this->news_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function approve()
        {
            $this->status=Comment::STATUS_APPROVED;
            $this->update(array('status'));
        }
}
