<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartavto extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartavto ($avtoleg){
        $mainImg = $avtoleg->getImage();
        if (isset($_SESSION ['cartavto'][$avtoleg->id])){
            $_SESSION['cartavto'][$avtoleg->id];
           
        }else{
           $_SESSION['cartavto'][$avtoleg->id]=[
               'name'=>$avtoleg->marka,
               'price'=>$avtoleg->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartavto'][$id])) return false;
         $qtyMinus = $_SESSION['cartavto'][$id]['qty'];
         $sumMinus = $_SESSION['cartavto'][$id]['qty']*$_SESSION['cartavto'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartavto'][$id]);
    }
}


