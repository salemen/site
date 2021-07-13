<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goroda".
 *
 * @property int $id
 * @property int $id_oblast
 * @property string $name
 */
class Goroda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goroda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_oblast'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_oblast' => 'Id Oblast',
            'name' => 'Name',
        ];
    }
}
