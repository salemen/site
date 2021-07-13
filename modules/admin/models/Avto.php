<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avto".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $username
 * @property string $tip
 * @property string $marka
 * @property string $model
 * @property string $god
 * @property int $probeg
 * @property string $korobka
 * @property string $kuzov
 * @property string $dvigatel
 * @property string $privod
 * @property string $sostoyanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class Avto extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    public static function tableName()
    {
        return 'avto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip', 'marka', 'model', 'god', 'probeg', 'korobka', 'kuzov', 'dvigatel', 'privod', 'sostoyanie', 'price'], 'required'],
            [['parent_id', 'probeg', 'price'], 'integer'],
            [['data'], 'safe'],
            [['username', 'tip', 'marka', 'model', 'god', 'korobka', 'kuzov', 'dvigatel', 'privod', 'sostoyanie'], 'string', 'max' => 255],
            [['opisanie'], 'string', 'max' => 1000],
            [['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 6],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'data' => 'Дата размещения',
            'username' => 'Ваш логин',
            'tip' => 'Тип',
            'marka' => 'Марка',
            'model' => 'Модель',
            'god' => 'Год выпуска',
            'probeg' => 'Пробег',
            'korobka' => 'Коробка передач',
            'kuzov' => 'Тип кузова',
            'dvigatel' => 'Тип двигателя',
            'privod' => 'Тип привода',
            'sostoyanie' => 'Состояние',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
        ];
    }
    
     public function upload(){
        if($this->validate ()){
            $path = 'upload/store/'.$this->image->baseName.'.'.$this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
                
    }
    
    public function uploadGallery(){
        if($this->validate ()){
            foreach ($this->gallery as $file){
                $path = 'upload/store/'.$file->baseName.'.'.$file->extension;
            $file->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
                
            }
            
            return true;
        }else{
            return false;
        }
                
    }
}
