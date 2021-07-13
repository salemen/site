<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avto".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $data
 * @property string $username
 * @property string $tip
 * @property string $marka
 * @property string $model
 * @property string $god
 * @property int $probeg
 * @property string $korobka
 * @property string $kuzov
 * @property string $dvigatel
 * @property string $privod
 * @property string $sostoyanie
 * @property int $price
 * @property string $image
 * @property string $gallery
 */
class Avtomarka extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    
   
    public static function tableName()
    {
        return 'marka';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark'], 'string', 'max' => 255],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark' => 'Марка',
        ];
    }
    
    
}
