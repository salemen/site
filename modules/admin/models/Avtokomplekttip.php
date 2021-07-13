<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avtokomplekttip".
 *
 * @property int $id
 * @property string $tip
 */
class Avtokomplekttip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avtokomplekttip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip'], 'required'],
            [['tip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tip' => 'Tip',
        ];
    }
}
