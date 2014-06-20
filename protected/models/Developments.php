<?php
class Developments extends CActiveRecord{
    public $document;
 
    public static function model($className=__CLASS__){
        return parent::model($className);
    }
 
    public function tableName(){
        return 'developments';
    }

	public function relations()
	{
		return array(
			'album0' => array(self::BELONGS_TO, 'Album', 'album'),
                );
	}
 
    public function rules(){
        return array(
            array('name, details, date','required','on'=>'insert,update'),
            array('document','file','types'=>'jpg, jpeg, png, bmp,gif',
                'allowEmpty'=>true,'on'=>'insert,update'),
        );
    }
 
    protected function beforeSave(){
        if(!parent::beforeSave())
            return false;
        if(($this->scenario=='insert' || $this->scenario=='update') &&
            ($document=CUploadedFile::getInstance($this,'document'))){
            $this->deleteDocument();
 
            $this->document=$document;
            $this->document->saveAs(
                Yii::getPathOfAlias('webroot.media.developments').DIRECTORY_SEPARATOR.$this->document);
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
        $documentPath=Yii::getPathOfAlias('webroot.media.developments').DIRECTORY_SEPARATOR.
            $this->document;
        if(is_file($documentPath))
            unlink($documentPath);
    }

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'details' => 'Детали',
			'album' => 'Альбом',
			'album0.name' => 'Альбом',
			'document' => 'Изображение',
			'date' => 'Дата',
		);
	}
    
     public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('details',$this->details,true);
        $criteria->compare('document',$this->document,true);
        $criteria->compare('date',$this->date,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

}
