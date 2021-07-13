<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartkvart extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartkvart ($nedvigkvart){
        $mainImg = $nedvigkvart->getImage();
        if (isset($_SESSION ['cartkvart'][$nedvigkvart->id])){
            $_SESSION['cartkvart'][$nedvigkvart->id];
           
        }else{
           $_SESSION['cartkvart'][$nedvigkvart->id]=[
               'name'=>$nedvigkvart->type,
               'price'=>$nedvigkvart->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartkvart'][$id])) return false;
         $qtyMinus = $_SESSION['cartkvart'][$id]['qty'];
         $sumMinus = $_SESSION['cartkvart'][$id]['qty']*$_SESSION['cartkvart'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartkvart'][$id]);
    }
}














