<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "oblast".
 *
 * @property int $id
 * @property string $oblast_region
 */
class Oblast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oblast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oblast_region'], 'required'],
            [['oblast_region'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'oblast_region' => 'Oblast Region',
        ];
    }
}
