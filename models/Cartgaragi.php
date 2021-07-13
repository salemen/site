<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartgaragi extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartgaragi ($nedviggaragi){
        $mainImg = $nedviggaragi->getImage();
        if (isset($_SESSION ['cartgaragi'][$nedviggaragi->id])){
            $_SESSION['cartgaragi'][$nedviggaragi->id];
           
        }else{ 
           $_SESSION['cartgaragi'][$nedviggaragi->id]=[
               'name'=>('Гараж'),
               'price'=>$nedviggaragi->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartgaragi'][$id])) return false;
         $qtyMinus = $_SESSION['cartgaragi'][$id]['qty'];
         $sumMinus = $_SESSION['cartgaragi'][$id]['qty']*$_SESSION['cartgaragi'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartgaragi'][$id]);
    }
}



