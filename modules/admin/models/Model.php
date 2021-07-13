<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "avtogruztip".
 *
 * @property int $id
 * @property string $tip
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
		    [['mark_id'], 'integer'],
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
            'name' => 'модель',
			'mark_id' => 'mark_id',
        ];
    }
}
