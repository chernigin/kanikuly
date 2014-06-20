<?php
class Album extends CActiveRecord
{
        public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, gallery', 'required' ),
			array('name, image, gallery', 'length', 'max'=>100),
                        array('image','file','types'=>'jpg, jpeg, png, bmp,',
                'allowEmpty'=>true,'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, image, gallery', 'safe', 'on'=>'search'),
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
			'gallery0' => array(self::BELONGS_TO, 'Gallery', 'gallery'),
			'fotos' => array(self::HAS_MANY, 'Foto', 'album'),
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
                Yii::getPathOfAlias('webroot.media.gallery.album').DIRECTORY_SEPARATOR.$this->image);
        }
        return true;
    }
 
//    protected function beforeDelete(){
//        if(!parent::beforeDelete())
//            return false;
//        $this->deleteDocument();
//        Foto::model()->deleteAll();
//        $models=$this->fotos;
//        foreach ($models as $m):
//            unlink($m);
//        endforeach;
//        return true;
//    }
    protected function beforeDelete(){
        if(!parent::beforeDelete())
            return false;
   
        
        $this->deleteDocument();
        $models=$this->fotos;
        Foto::model()->deleteAll('album='.$this->id);
        foreach ($models as $m)
        {
            $path= Yii::getPathOfAlias('webroot.media.gallery.photo').DIRECTORY_SEPARATOR.$m->image;

            unlink($path);
        }
  
  //Foto::model()->deleteAllByAttributes(['album'=>$this->id]);
        return true;
    }
 
    public function deleteDocument(){
        $documentPath=Yii::getPathOfAlias('webroot.media.gallery.album').DIRECTORY_SEPARATOR.
            $this->image;
        if(is_file($documentPath))
            unlink($documentPath);
    }
    
//    public function afterDelete(){
//        parent::afterDelete();
//        Foto::model()->deleteAll('album='.$this->id);
//       
//    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'image' => 'Изображение',
			'gallery' => 'Галерея',
			'gallery0.name' => 'Раздел галереи',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('gallery',$this->gallery);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Album the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
