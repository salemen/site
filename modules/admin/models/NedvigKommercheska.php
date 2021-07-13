<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "nedvigkommercheska".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $username
 * @property string $hit
 * @property string $type_nedvigimosty
 * @property string $oblast
 * @property string $gorod
 * @property string $adress
 * @property int $plochad
 * @property string $plochad_uchastka
 * @property int $kolichestvo_etagei
 * @property int $etag
 * @property int $nazvanie_obiekta
 * @property int $opisanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class NedvigKommercheska extends \yii\db\ActiveRecord
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
        return 'Nedvigkommercheska';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
		    [['parent_id', 'moder', 'telephone', 'plochad', 'kolichestvo_etagei', 'etag', 'price', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'verh', 'verhok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate', 'verhdate'], 'safe'],
            [['operaciya','type_nedvigimosty', 'oblast', 'adress', 'plochad', 'kolichestvo_etagei', 'nazvanie_obiekta', 'opisanie', 'price'], 'required'],
            [['username', 'type_nedvigimosty', 'oblast', 'gorod', 'raion', 'plochad_uchastka', 'nazvanie_obiekta'], 'string', 'max' => 255],
            [['operaciya', 'declat', 'declong'], 'string', 'max' => 20],
            [['adress'], 'string', 'max' => 100],
            [['opisanie'], 'string', 'max' => 1500],
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
			'data' => 'Дата размещения',
            'parent_id' => 'Parent ID',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'operaciya' => 'Операция',
            'type_nedvigimosty' => 'Тип недвижимости',
            'oblast' => 'Область/Регион',
            'gorod' => 'Город',
			'raion' => 'Район',
            'adress' => 'Адрес',
            'plochad' => 'Площадь',
            'plochad_uchastka' => 'Площадь участка',
            'kolichestvo_etagei' => 'Количество этажей',
            'etag' => 'Этаж',
            'nazvanie_obiekta' => 'Название объекта',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
			'hit' => 'В Избранном в разделе Коммерческая',
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
