<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $mid_name
 * @property string $phone
 * @property integer $faculty
 * @property integer $cource
 * @property integer $group
 * @property string $pass
 *
 * The followings are the available model relations:
 * @property Request[] $requests
 * @property Faculty $faculty0
 * @property Cource $cource0
 * @property Group $group0
 */
class Student extends CActiveRecord
{
        const ROLE_ADMIN = 'admin';
        const ROLE_USER = 'user';
        const ROLE_BANNED = 'banned';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
   
	public $verifyCode;
	public $_oldPass;

        
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nsb, surname, name, mid_name, email, username, phone, nationality,  faculty,cource, pass', 'required',),
			array('id, faculty', 'numerical', 'integerOnly'=>true),
			array('surname', 'length', 'max'=>30),
            array('nsb', 'length', 'max'=>30),
			array('email', 'email',),
			array('nsb, username, email, phone','unique', 'className' => 'Student'),
			array('name, mid_name, phone', 'length', 'max'=>20),
			array('pass', 'length', 'max'=>255),
			//array('password_repeat', 'compare', 'compareAttribute'=>'pass', 'on'=>'register'),
                        array('username','match','pattern'=>'/^([A-Za-z0-9]+)$/u','message'=>'Допустимые символы : A-Za-z0-9'),
                        //array('phone','match','pattern'=>'/^((8|\+7)?[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u','message'=>'Правильно введите номер телефона'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
                        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),
			array('id, surname, name, mid_name, phone, faculty, pass', 'safe', 'on'=>'search'),
			
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
			'requests' => array(self::HAS_MANY, 'Request', 'student'),
			'faculty0' => array(self::BELONGS_TO, 'Faculty', 'faculty'),
			'cource0' => array(self::BELONGS_TO, 'Cource', 'cource'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nsb' => 'Студенческий билет № (для сотрудников № удостоверения)',
			'surname' => 'Фамилия',
			'name' => 'Имя',
			'mid_name' => 'Отчество',
            		'username' => 'Имя для входа на сайт',
			'phone' => 'Телефон',
			'faculty' => 'Факультет',
			'cource' => 'Курс',
			'cource0.n_cource' => 'Курс',
			'pass' => 'Пароль',
			'email'=>'email',
            		'faculty0.name' => 'Факультет',
            		'verifyCode' => 'Код с картинки'
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

		$criteria->compare('id',$this->id);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mid_name',$this->mid_name,true);
       		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('faculty',$this->faculty);
		$criteria->compare('cource',$this->cource);
		$criteria->compare('pass',$this->pass,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
       public function afterFind() {
        $this->_oldPass = $this->pass;
        parent::afterFind();
    }

    public function beforeValidate() {
        //echo 1;
        //var_dump($this);
        $hash= md5('#Vl1E1A.' . $this->pass);
        if ($this->isNewRecord || 
                ($this->_oldPass!=$this->pass && $this->pass))
        {
            //echo '3-'.$this->pass;
            $this->pass =$hash;
        }
        //exit();
        return parent::beforeValidate();
    }
        
        public function getStudentString()
        {
            return $this->surnamename. ' '.$this->name;
        }
}


