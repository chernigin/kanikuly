<?php
class News extends CActiveRecord
{
        public $document;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, details', 'required'),
			array('name', 'length', 'max'=>200),
			array('details', 'length', 'max'=>2500),
                         array('document','file','types'=>'jpg, jpeg, png, bmp,gif',
                'allowEmpty'=>true,'on'=>'insert,update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, name, details, date, img', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
        
       protected function beforeSave(){
        if(!parent::beforeSave())
            return false;
        if(($this->scenario=='insert' || $this->scenario=='update') &&
            ($document=CUploadedFile::getInstance($this,'document'))){
            $this->deleteDocument(); 
 
            $this->document=$document;
            $this->document->saveAs(
                Yii::getPathOfAlias('webroot.media.news').DIRECTORY_SEPARATOR.$this->document);
				
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
        $documentPath=Yii::getPathOfAlias('webroot.media.news').DIRECTORY_SEPARATOR.
            $this->document;
        if(is_file($documentPath))
            unlink($documentPath);
    }
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'album0' => array(self::BELONGS_TO, 'Album', 'album'),
                    'comments' => array(self::HAS_MANY, 'Comment', 'news_id'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'details' => 'Детали',
			'date' => 'Дата',
                        'document' => 'Изображение',
			'album0.name' => 'Альбом',
			'album' => 'Альбом',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
          public function commentCount()
          {
                $criteria = new CDbCriteria ();
                     $criteria->params=array(
                    ':news_id'=>$this->id,
                         ':status'=> 2,);
                $criteria->condition='news_id=:news_id AND status=:status';

                   $count= Comment::model()->count($criteria);
                return $count;
          }
    
}
