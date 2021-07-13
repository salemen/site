<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartdoma extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartdoma ($nedvigdoma){
        $mainImg = $nedvigdoma->getImage();
        if (isset($_SESSION ['cartdoma'][$nedvigdoma->id])){
            $_SESSION['cartdoma'][$nedvigdoma->id];
           
        }else{
           $_SESSION['cartdoma'][$nedvigdoma->id]=[
               'name'=>$nedvigdoma->vid_obiekta,
               'price'=>$nedvigdoma->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartdoma'][$id])) return false;
         $qtyMinus = $_SESSION['cartdoma'][$id]['qty'];
         $sumMinus = $_SESSION['cartdoma'][$id]['qty']*$_SESSION['cartdoma'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartdoma'][$id]);
    }
}
















