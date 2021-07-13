<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartmoto extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartmoto ($avtomoto){
        $mainImg = $avtomoto->getImage();
        if (isset($_SESSION ['cartmoto'][$avtomoto->id])){
            $_SESSION['cartmoto'][$avtomoto->id];
           
        }else{
           $_SESSION['cartmoto'][$avtomoto->id]=[
               'name'=>$avtomoto->marka,
               'price'=>$avtomoto->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartmoto'][$id])) return false;
         $qtyMinus = $_SESSION['cartmoto'][$id]['qty'];
         $sumMinus = $_SESSION['cartmoto'][$id]['qty']*$_SESSION['cartmoto'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartmoto'][$id]);
    }
}








