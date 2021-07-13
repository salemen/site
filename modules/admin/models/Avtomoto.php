<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avtomoto".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $username
 * @property string $tip
 * @property string $marka
 * @property string $god
 * @property string $probeg
 * @property string $korobka
 * @property string $sostoyanie
 * @property string $opisanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class Avtomoto extends \yii\db\ActiveRecord
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
        return 'avtomoto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'tip', 'marka', 'god', 'probeg', 'korobka', 'sostoyanie', 'opisanie', 'price', 'oblast'], 'required'],
            [['parent_id', 'price','telephone','moder','hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok'], 'integer'],
             [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['opisanie'], 'string'],
            [['username', 'tip', 'marka', 'god', 'probeg', 'korobka', 'sostoyanie'], 'string', 'max' => 255],
            [['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10],
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
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
			'oblast' => 'Область/Регион',
            'tip' => 'Тип',
            'marka' => 'Марка',
            'god' => 'Год выпуска',
            'probeg' => 'Пробег',
            'korobka' => 'Тип коробки',
            'sostoyanie' => 'Состояние',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
			'hit' => 'В Избранном в разделе Мототехника',
			'hitok' => 'hitok',
			'hitdate'=> 'hitdate',
			'new' => 'На объявлении стоит ярлык NEW ',
			'newok'=> 'newok',
			'newdate'=> 'newdate',
			'sale' => 'На объявлении стоит ярлык SALE',
			'saleok'=> 'saleok',
			'saledate'=> 'saledate',
			'rekom' => 'Размещено в Рекомендованных',
			'rekomok' => 'rekomok',
			'rekomdate' => 'rekomdate',
			'videl' => 'Выделено красным цветом',
			'videlok' => 'videlok',
			'videldate' => 'videldate',
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
