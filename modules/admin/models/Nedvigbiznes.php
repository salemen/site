<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Nedvigbiznes".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $username
 * @property int $telephone
 * @property string $type
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $operaciya
 * @property string $oblast_region
 * @property string $gorod
 * @property string $raion
 * @property string $street
 * @property int $number_doma
 * @property string $typ_biznesa
 * @property string $opisanie
 * @property int $price
 * @property string $gallery
 * @property string $image
 */
class Nedvigbiznes extends \yii\db\ActiveRecord
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
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Nedvigbiznes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'telephone', 'price','moder','hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'verh', 'verhok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate', 'verhdate'], 'safe'],
            [['type', 'operaciya', 'oblast', 'gorod', 'opisanie', 'price'], 'required'],
            [['opisanie'], 'string'],
			[['declat', 'declong'], 'string', 'max' => 50],
            [['username', 'type', 'operaciya'], 'string', 'max' => 50],
            [['oblast', 'gorod', 'raion', 'street'], 'string', 'max' => 100],
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
            'id' => '№',
            'parent_id' => 'Parent ID',
            'data' => 'Дата размещения',
            'username' => 'Логин',
            'telephone' => 'Телефон',
			'moder' => 'Модерация',
            'type' => 'Тип бизнеса',
            'operaciya' => 'Операция',
            'oblast' => 'Область/Регион',
            'gorod' => 'Город',
            'raion' => 'Район',
            'street' => 'Улица',
            'number_doma' => 'Номер дома',
            //'typ_biznesa' => 'Typ Biznesa',
            'opisanie' => 'Описание',
            'price' => 'Стоимость',
            'gallery' => 'Галлерея изображений',
            'image' => 'Главное изображение',
			'hit' => 'В Избранном в разделе Бизнес',
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
