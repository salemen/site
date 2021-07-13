<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartzemli extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartzemli ($nedvigzemli){
        $mainImg = $nedvigzemli->getImage();
        if (isset($_SESSION ['cartzemli'][$nedvigzemli->id])){
            $_SESSION['cartzemli'][$nedvigzemli->id];
           
        }else{ 
           $_SESSION['cartzemli'][$nedvigzemli->id]=[
               'name'=>$nedvigzemli->typ_uchastka,
               'price'=>$nedvigzemli->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartzemli'][$id])) return false;
         $qtyMinus = $_SESSION['cartzemli'][$id]['qty'];
         $sumMinus = $_SESSION['cartzemli'][$id]['qty']*$_SESSION['cartzemli'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartzemli'][$id]);
    }
}






