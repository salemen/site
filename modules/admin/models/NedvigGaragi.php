<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "nedviggaragi".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $hit
 * @property string $username
 * @property string $oblast
 * @property string $gorod
 * @property string $adress
 * @property string $type_materiala
 * @property int $plochad
 * @property string $ochrana
 * @property string $opisanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class Nedviggaragi extends \yii\db\ActiveRecord
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
        return 'Nedviggaragi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
		
 		    [['parent_id', 'moder', 'telephone', 'plochad', 'price', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['oblast', 'gorod', 'adress', 'type_materiala', 'plochad', 'ochrana', 'opisanie', 'price',], 'required'],
            [['username', 'oblast', 'gorod', 'raion', 'type_materiala'], 'string', 'max' => 255],
            [['adress'], 'string', 'max' => 100],
            [['ochrana', 'declat', 'declong'], 'string', 'max' => 20],
            [['opisanie'], 'string', 'max' => 1500],
			[['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10], 
		
            /*  [['username', 'oblast', 'gorod', 'adress', 'type_materiala', 'plochad', 'ochrana', 'opisanie', 'price'], 'required'],
            [['parent_id', 'plochad', 'price','telephone','moder', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['opisanie'], 'string'],
            [['ochrana', 'declat', 'declong'], 'string', 'max' => 20],
            [['username', 'oblast', 'gorod', 'adress', 'type_materiala','raion'], 'string', 'max' => 255],
            [['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10],  */
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
            'data' => 'Дата создания',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'oblast' => 'Область/Регион',
            'gorod' => 'Город',
            'raion' => 'Район',
            'adress' => 'Адрес',
            'type_materiala' => 'Материал',
            'plochad' => 'Площадь',
            'ochrana' => 'Охрана',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
			'hit' => 'В Избранном в разделе Гаражи',
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
