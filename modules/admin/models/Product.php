<?php

namespace app\modules\admin\models;
use app\modules\admin\models\Category;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
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
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product';
    }
    
    public function getCategory(){
        return $this->hasOne(Category::className (), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
		return [
            [['category_id', 'name', 'price', 'content','oblast_region'], 'required'],
            [['category_id', 'moder', 'telephone', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'verh', 'verhok'], 'integer'],
			[['date', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate', 'verhdate'], 'safe'],
            [['content', 'username','gorod','raion'], 'string'],
            [['price'], 'number'],
			[['declat', 'declong'], 'string', 'max' => 20],
            [['name', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10 ],
        ];
         /* return [
            [['username', 'oblast_region','telephone', 'name', 'content', 'price'], 'required'],
            [['category_id', 'moder', 'telephone', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'type3'], 'integer'],
            [['date', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['price'], 'number'],
            [['username', 'oblast_region', 'keywords', 'description',], 'string', 'max' => 255],
            [['gorod'], 'string', 'max' => 50],
            [['name', 'declat', 'declong'], 'string', 'max' => 20],
            [['content'], 'string', 'max' => 1500],
            [['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10 ],
        ]; */
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'category_id' => 'Категория',
			'oblast_region' => 'Регион (обязательное поле)',
			'gorod' => 'Город (необязательно поле)',
			'raion' => 'Район (необязательное поле)',
			'date' => 'Дата размещения',
            'username' => 'Ваш логин',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'name' => 'Название товара/услуги',
            'content' => 'Описание',
            'price' => 'Стоимость',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Главное фото',
            'gallery' => 'Галерея изображений',
            'hit' => 'В Избранном в раздел "Магазин"',
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
			'verh' => 'Закреплено на ВЕРХУ',
			'verhok' => 'verhok',
			'verhdate' => 'verhdate',
			
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
?>