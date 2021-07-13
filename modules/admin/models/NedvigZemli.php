<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "nedvigzemli".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $hit
 * @property string $username
 * @property string $oblast
 * @property string $gorod
 * @property string $adress
 * @property string $typ_uchastka
 * @property int $rasstoyanie_do_goroda
 * @property int $plochad_uchastka
 * @property string $kad_nomer
 * @property string $opisanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class NedvigZemli extends \yii\db\ActiveRecord
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
        return 'Nedvigzemli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
		    [['parent_id', 'moder', 'telephone', 'plochad_uchastka', 'price', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'verh', 'verhok'], 'integer'],
            [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate', 'verhdate'], 'safe'],
            [['oblast', 'adress', 'typ_uchastka', 'rasstoyanie_do_goroda', 'plochad_uchastka',  'opisanie', 'price', ], 'required'],
            [['username', 'oblast', 'gorod', 'raion', 'typ_uchastka', 'rasstoyanie_do_goroda'], 'string', 'max' => 255],
            [['adress'], 'string', 'max' => 100],
            [['kad_nomer', 'declat', 'declong'], 'string', 'max' => 20],
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
            'parent_id' => 'Parent ID',
            'data' => 'Дата размещения',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'oblast' => 'Область/Регион',
            'gorod' => 'Город',
            'raion' => 'Район',
            'adress' => 'Адрес',
            'typ_uchastka' => 'Тип участка',
            'rasstoyanie_do_goroda' => 'Расстояние',
            'plochad_uchastka' => 'Площадь (целое число)',
            'kad_nomer' => 'Кадастровый номер',
            'opisanie' => 'Описание участка',
            'price' => 'Цена руб.',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
			'hit' => 'В Избранном в разделе Участки',
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
