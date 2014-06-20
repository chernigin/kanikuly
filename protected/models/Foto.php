<?php
class Foto extends CActiveRecord
{
        public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'foto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('name, album', 'required'),
			array('album', 'numerical', 'integerOnly'=>true),
			array('name, image', 'length', 'max'=>100),
                        array('image','file','types'=>'jpg, jpeg, png, bmp,',
                        'allowEmpty'=>true,'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, album, image', 'safe', 'on'=>'search'),
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
			'album0' => array(self::BELONGS_TO, 'Album', 'album'),
		);
	}
        protected function beforeSave(){
        if(!parent::beforeSave())
            return false;
        if(($this->scenario=='insert' || $this->scenario=='update') &&
            ($image=CUploadedFile::getInstance($this,'image'))){
            $this->deleteDocument(); 
 
            $this->image=$image;
            $this->image->saveAs(
                Yii::getPathOfAlias('webroot.media.gallery.photo').DIRECTORY_SEPARATOR.$this->image);
        }
        return true;
         }
 
        protected function beforeDelete(){
            if(!parent::beforeDelete())
                return false;
            $this->deleteDocument(); 
            return true;
        }

        public function deleteDocument(){
            $documentPath=Yii::getPathOfAlias('webroot.media.gallery.photo').DIRECTORY_SEPARATOR.
                $this->image;
            if(is_file($documentPath))
                unlink($documentPath);
        }
               

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'album' => 'Альбом',
			'album0.name' => 'Альбом',
			'image' => 'Изображение',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('album',$this->album);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Foto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
