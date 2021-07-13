<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "raion".
 *
 * @property int $id
 * @property int $id_raion
 * @property string $raion
 */
class Raion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'raion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_raion', 'raion'], 'required'],
            [['id_raion'], 'integer'],
            [['raion'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_raion' => 'Id Raion',
            'raion' => 'Raion',
        ];
    }
}
