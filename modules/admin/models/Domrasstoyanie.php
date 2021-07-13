<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "domrasstoyanie".
 *
 * @property int $id
 * @property string $rasstoyanie
 */
class Domrasstoyanie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domrasstoyanie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rasstoyanie'], 'required'],
            [['rasstoyanie'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rasstoyanie' => 'Rasstoyanie',
        ];
    }
}
