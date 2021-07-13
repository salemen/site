<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "domvid".
 *
 * @property int $id
 * @property string $vid
 */
class Domvid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domvid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vid'], 'required'],
            [['vid'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vid' => 'Vid',
        ];
    }
}
