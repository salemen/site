<?php



namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Category
 *
 * @author MANY
 */
class Nedvigkvartiri extends ActiveRecord {
    
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
      return 'Nedvigkvartiri';
   }
   
   public function getNedvigcategory() {
       return $this->hasOne(Nedvigcategory::ClassName(),['id'=>'parent_id'] );
   }
}


