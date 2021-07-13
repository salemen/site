<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "kolichestvo_komnat".
 *
 * @property int $id
 * @property string $number
 */
class KolichestvoKomnat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kolichestvo_komnat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['number'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
        ];
    }
}
