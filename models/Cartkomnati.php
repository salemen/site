<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartkomnati extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartkomnati ($nedvigkomnati){
        $mainImg = $nedvigkomnati->getImage();
        if (isset($_SESSION ['cartkomnati'][$nedvigkomnati->id])){
            $_SESSION['cartkomnati'][$nedvigkomnati->id];
           
        }else{ 
           $_SESSION['cartkomnati'][$nedvigkomnati->id]=[
               'name'=>('Комната'),
               'price'=>$nedvigkomnati->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartkomnati'][$id])) return false;
         $qtyMinus = $_SESSION['cartkomnati'][$id]['qty'];
         $sumMinus = $_SESSION['cartkomnati'][$id]['qty']*$_SESSION['cartkomnati'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartkomnati'][$id]);
    }
}




