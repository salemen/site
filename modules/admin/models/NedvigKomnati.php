<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "nedvigkomnati".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $hit
 * @property string $username
 * @property string $oblast
 * @property string $gorod
 * @property string $adress
 * @property int $komnat_v_kvartire
 * @property string $type_doma
 * @property int $etag
 * @property int $etagei_v_dome
 * @property int $plochad
 * @property string $opisanie
 * @property int $price
 */
class NedvigKomnati extends \yii\db\ActiveRecord
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
        return 'Nedvigkomnati';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oblast', 'gorod', 'adress', 'komnat_v_kvartire', 'type_doma', 'etag', 'operaciya', 'etagei_v_dome', 'plochad', 'opisanie', 'price'], 'required'],
            [['parent_id', 'komnat_v_kvartire', 'etag', 'etagei_v_dome', 'plochad', 'price','telephone','moder', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['opisanie'], 'string'],
            [['operaciya', 'declat', 'declong'], 'string', 'max' => 20],
            [['username', 'oblast', 'gorod', 'adress', 'type_doma','raion'], 'string', 'max' => 255],
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
            'data' => 'Дата рамещения',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'oblast' => 'Область/Регион',
            'gorod' => 'Город',
            'raion' => 'Район',
            'adress' => 'Адрес',
            'komnat_v_kvartire' => 'Комнат в квартире',
            'type_doma' => 'Тип дома',
            'etag' => 'Этаж',
            'etagei_v_dome' => 'Этажей в доме',
            'operaciya' => 'Операция',
            'plochad' => 'Площадь',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
			'hit' => 'В Избранном в разделе Комнаты',
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
