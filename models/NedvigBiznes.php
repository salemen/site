<?php



namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Category
 *
 * @author MANY
 */
class Nedvigbiznes extends \yii\db\ActiveRecord {
    
    public $image;
    public $gallery;
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
   public static function tableName() {
      return 'Nedvigbiznes';
   }
   
   public function getNedvigcategory() {
       return $this->hasOne(Nedvigcategory::ClassName(),['id'=>'parent_id'] );
   }
}



