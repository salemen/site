<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "nedvig_kvartiri".
 *
 * @property int $id
 * @property string $type
 * @property string $operaciya
 * @property string $vtorichka_novostroi
 * @property string $oblast_region
 * @property string $gorod
 * @property string $raion
 * @property string $street
 * @property int $number_doma
 * @property int $number_kvartir
 * @property int $kolichestvo_komnat
 * @property string $tip_doma
 * @property int $etag
 * @property int $etagey_v_dome
 * @property int $plochad_obchy
 * @property int $plochad_gilaya
 * @property int $plochad_kuxni
 * @property string $kadastrovi_nomer
 * @property string $opisanie
 * @property int $price
 * @property string $gallery
 */
class NedvigKvartiri extends \yii\db\ActiveRecord
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
        return 'Nedvigkvartiri';
    }
    
    public function getNedvigcategory(){
        return $this->hasOne(Nedvigcategory::className (), ['id' => 'parent_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    { 
        return [
		    [['parent_id', 'moder', 'telephone', 'number_kvartir', 'kolichestvo_komnat', 'etag', 'etagey_v_dome', 'plochad_obchy', 'plochad_gilaya', 'plochad_kuxni', 'price', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'verh','verhok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate','verhdate'], 'safe'],
            [['operaciya', 'vtorichka_novostroi', 'oblast_region', 'gorod',  'street', 'kolichestvo_komnat', 'tip_doma', 'etag', 'etagey_v_dome', 'plochad_obchy', 'opisanie', 'price', ], 'required'],  
            [['username', 'oblast_region', 'gorod', 'raion', 'tip_doma', 'kadastrovi_nomer'], 'string', 'max' => 255],
            [['type', 'vtorichka_novostroi', 'declat', 'declong'], 'string', 'max' => 20],
            [['operaciya'], 'string', 'max' => 30],
            [['street'], 'string', 'max' => 40],
            [['number_doma'], 'string', 'max' => 11],
            [['opisanie'], 'string', 'max' => 1500],
			[['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10],
		
		   /*  [['parent_id', 'etag', 'etagey_v_dome', 'plochad_obchy',  'plochad_kuxni', 'plochad_gilaya', 'price','telephone','moder', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', ], 'integer'],
			[['date', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['operaciya', 'vtorichka_novostroi', 'oblast_region', 'gorod',  'street', 'kolichestvo_komnat', 'tip_doma', 'etag', 'etagey_v_dome', 'plochad_obchy', 'opisanie', 'price', ], 'required'],     
            [['opisanie'], 'string'],
            [['number_doma',], 'string', 'max' => 30],
			[['type', 'vtorichka_novostroi', 'declat', 'declong'], 'string', 'max' => 20],
            [['operaciya','username',], 'string', 'max' => 30],
            [['oblast_region', 'gorod', 'raion', 'street', 'tip_doma', 'kadastrovi_nomer'], 'string', 'max' => 255],
            [['image'],'file','extensions'=> 'png, jpg'],
            [['gallery'],'file','extensions'=> 'png, jpg', 'maxFiles'=> 10], */
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
			'data' => 'Дата рамещения',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'type' => 'Тип недвижимости',
            'operaciya' => 'Операция',
            'vtorichka_novostroi' => 'Вид',
			'declat' => 'широта',
			'declong' => 'долгота',
            'oblast_region' => 'Область/Регион',
            'gorod' => 'Город',
            'raion' => 'Район',
            'street' => 'Улица',
            'number_doma' => '№ дома',
            'number_kvartir' => '№ квартиры',
            'kolichestvo_komnat' => 'Комнат',
            'tip_doma' => 'Тип дома',
            'etag' => 'Этаж',
            'etagey_v_dome' => 'Этажей',
            'plochad_obchy' => 'Общая площадь',
            'plochad_gilaya' => 'Жилая площадь',
            'plochad_kuxni' => 'Площадь кухни',
            'kadastrovi_nomer' => 'Кадастровый номер',
            'opisanie' => 'Описание',
            'price' => 'Цена руб.',
            'gallery' => 'Галлерея изображений',
            'image' => 'Главное изображение',
			'hit' => 'В Избранном в разделе Квартиры',
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
