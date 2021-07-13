<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avtogruztip".
 *
 * @property int $id
 * @property string $tip
 */
class Marka extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['mark'], 'required'],
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
            'mark' => 'марка',
        ];
    }
}
