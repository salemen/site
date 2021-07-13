<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "etag".
 *
 * @property int $id
 * @property string $etag
 */
class Etag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['etag'], 'required'],
            [['etag'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etag' => 'Etag',
        ];
    }
}
