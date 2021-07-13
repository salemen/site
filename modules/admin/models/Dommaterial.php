<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dommaterial".
 *
 * @property int $id
 * @property string $material
 */
class Dommaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dommaterial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['material'], 'required'],
            [['material'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'material' => 'Material',
        ];
    }
}
