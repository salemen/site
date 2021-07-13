<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "garagioxrana".
 *
 * @property int $id
 * @property string $tip
 */
class Garagioxrana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'garagioxrana';
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
