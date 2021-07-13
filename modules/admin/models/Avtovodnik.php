<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avtovodnik".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $hit
 * @property string $data
 * @property string $username
 * @property string $tip
 * @property string $tip_dvigatel
 * @property string $l/s
 * @property string $sostoyanie
 * @property string $opisanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class Avtovodnik extends \yii\db\ActiveRecord
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
        return 'avtovodnik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip', 'tip_dvigatel', 'sostoyanie', 'opisanie', 'price', 'oblast'], 'required'],
            [['parent_id', 'price','telephone','moder','hit', 'hitok', 'new', 'newok', 'sale', 'saleok', 'rekom', 'rekomok', 'videl', 'videlok'], 'integer'],
             [['data', 'hitdate', 'newdate', 'saledate', 'rekomdate', 'videldate'], 'safe'],
            [['opisanie'], 'string'],
            [['hit'], 'string', 'max' => 20],
            [['username', 'tip', 'tip_dvigatel', 'l_s', 'sostoyanie'], 'string', 'max' => 255],
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
			'oblast' => 'Область/Регион',
            'username' => 'Ваш логин',
            'telephone' => 'Ваш телефон',
			'moder' => 'Модерация',
            'tip' => 'Тип',
            'tip_dvigatel' => 'Тип двигателя',
            'l_s' => 'Лошадиных сил',
            'sostoyanie' => 'Состояние',
            'opisanie' => 'Описание',
            'price' => 'Цена',
            'image' => 'Главное изображение',
            'gallery' => 'Галлерея изображений',
			'hit' => 'В Избранном в разделе Водный транспорт',
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
