<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "nedvigdoma".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $username
 * @property string $oblast
 * @property string $gorod
 * @property string $adress
 * @property int $kadastrovi_nomer
 * @property string $vid_obiekta
 * @property string $etagei_v_dome
 * @property string $material_sten
 * @property string $rasstoyanie_do_goroda
 * @property int $plochad_doma
 * @property int $plochad_uchastka
 * @property string $opisanie
 * @property int $price
 * @property string $gallery
 * @property string $img
 */
class NedvigDoma extends \yii\db\ActiveRecord
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
        return 'Nedvigdoma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'plochad_doma', 'price','telephone','moder', 'hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok', 'verh', 'verhok'], 'integer'],
			[['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate','verhdate'], 'safe'],
            [['vid_obiekta','oblast', 'adress', 'etagei_v_dome', 'material_sten', 'rasstoyanie_do_goroda', 'plochad_doma','opisanie', 'price',], 'required'],
            [['vid_obiekta', 'etagei_v_dome', 'material_sten', 'rasstoyanie_do_goroda', 'opisanie'], 'string'],
            [['username', 'oblast', 'gorod', 'kadastrovi_nomer', 'raion', 'rasstoyanie_do_goroda'], 'string', 'max' => 255],
            [['adress'], 'string', 'max' => 150],
			[['declat', 'declong', 'plochad_uchastka'], 'string', 'max' => 20],
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
            'oblast' => 'Область/Регион',
            'gorod' => 'Город',
			'raion' => 'Район',
            'adress' => 'Адрес',
            'kadastrovi_nomer' => 'Кадастровый номер',
            'vid_obiekta' => 'Вид объекта',
            'etagei_v_dome' => 'Этажей',
            'material_sten' => 'Материал стен',
            'rasstoyanie_do_goroda' => 'Расстояние до города',
            'plochad_doma' => 'Площадь дома',
            'plochad_uchastka' => 'Площадь участка',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'gallery' => 'Галерея изображений',
            'image' => 'Главное изображение',
			'hit' => 'В Избранном в разделе Дома',
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
