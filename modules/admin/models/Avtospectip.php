<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avtosostoyanie".
 *
 * @property int $id
 * @property string $tip
 */
class Avtospectip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avtospectip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
        ];
    }
}
