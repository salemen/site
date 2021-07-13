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
 */
class NedvigKvartiri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nedvig_kvartiri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'operaciya', 'vtorichka_novostroi', 'oblast_region', 'gorod', 'raion', 'street', 'number_doma', 'number_kvartir', 'kolichestvo_komnat', 'tip_doma', 'etag', 'etagey_v_dome', 'plochad_obchy', 'plochad_gilaya', 'plochad_kuxni',  'opisanie', 'price'], 'required'],
            [['type', 'operaciya', 'vtorichka_novostroi', 'oblast_region', 'gorod', 'raion', 'street', 'tip_doma', 'kadastrovi_nomer', 'opisanie'], 'string'],
            [['number_doma', 'number_kvartir', 'kolichestvo_komnat', 'etag', 'etagey_v_dome', 'plochad_obchy', 'plochad_gilaya', 'plochad_kuxni', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'type' => 'Тип недвижимости',
            'operaciya' => 'Операция',
            'vtorichka_novostroi' => 'Вид недв-сти',
            'oblast_region' => 'Область/Регион',
            'gorod' => 'Город',
            'raion' => 'Район',
            'street' => 'Улица',
            'number_doma' => '№ дома',
            'number_kvartir' => '№ квартиры',
            'kolichestvo_komnat' => 'Комнат',
            'tip_doma' => 'Тип дома',
            'etag' => 'Этаж',
            'etagey_v_dome' => 'Этажей в доме',
            'plochad_obchy' => 'Общая площадь',
            'plochad_gilaya' => 'Жилая площадь',
            'plochad_kuxni' => 'Площадь кухни',
            'kadastrovi_nomer' => 'Кадастровый номер',
            'opisanie' => 'Описание',
            'price' => 'Стоимость',
            //'gallery' => 'Изображения'
            
        ];
    }
}
