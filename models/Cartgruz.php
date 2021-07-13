<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartgruz extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartgruz ($avtogruz){
        $mainImg = $avtogruz->getImage();
        if (isset($_SESSION ['cartgruz'][$avtogruz->id])){
            $_SESSION['cartgruz'][$avtogruz->id];
           
        }else{
           $_SESSION['cartgruz'][$avtogruz->id]=[
               'name'=>$avtogruz->marka,
               'price'=>$avtogruz->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartgruz'][$id])) return false;
         $qtyMinus = $_SESSION['cartgruz'][$id]['qty'];
         $sumMinus = $_SESSION['cartgruz'][$id]['qty']*$_SESSION['cartgruz'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartgruz'][$id]);
    }
}




