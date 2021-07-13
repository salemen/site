<?php



namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Category
 *
 * @author MANY
 */
class Avtokomplekt extends \yii\db\ActiveRecord {
    
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
      return 'avtokomplekt';
   }
   
   public function getAvtocategory() {
       return $this->hasOne(Avtocategory::ClassName(),['id'=>'parent_id'] );
   }
}







