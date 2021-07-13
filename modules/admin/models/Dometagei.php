<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dometagei".
 *
 * @property int $id
 * @property string $etagei
 */
class Dometagei extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dometagei';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['etagei'], 'required'],
            [['etagei'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etagei' => 'Etagei',
        ];
    }
}
