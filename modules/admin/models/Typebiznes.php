<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tipuchastka".
 *
 * @property int $id
 * @property string $tip
 */
class Typebiznes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typebiznes';
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
            'type' => 'Тип бизнеса',
        ];
    }
}
