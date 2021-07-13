<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartbiznes extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartbiznes ($nedvigbiznes){
        $mainImg = $nedvigbiznes->getImage();
        if (isset($_SESSION ['cartbiznes'][$nedvigbiznes->id])){
            $_SESSION['cartbiznes'][$nedvigbiznes->id];
           
        }else{
           $_SESSION['cartbiznes'][$nedvigbiznes->id]=[
               'name'=>$nedvigbiznes->type,
               'price'=>$nedvigbiznes->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartspec'][$id])) return false;
         $qtyMinus = $_SESSION['cartspec'][$id]['qty'];
         $sumMinus = $_SESSION['cartspec'][$id]['qty']*$_SESSION['cartspec'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartspec'][$id]);
    }
}






