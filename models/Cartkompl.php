<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartkompl extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartkompl ($avtokompl){
        $mainImg = $avtokompl->getImage();
        if (isset($_SESSION ['cartkompl'][$avtokompl->id])){
            $_SESSION['cartkompl'][$avtokompl->id];
           
        }else{
           $_SESSION['cartkompl'][$avtokompl->id]=[
               'name'=>$avtokompl->tip,
               'price'=>$avtokompl->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartkompl'][$id])) return false;
         $qtyMinus = $_SESSION['cartkompl'][$id]['qty'];
         $sumMinus = $_SESSION['cartkompl'][$id]['qty']*$_SESSION['cartkompl'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartkompl'][$id]);
    }
}










