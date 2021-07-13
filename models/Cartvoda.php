<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartvoda extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartvoda ($avtovoda){
        $mainImg = $avtovoda->getImage();
        if (isset($_SESSION ['cartvoda'][$avtovoda->id])){
            $_SESSION['cartvoda'][$avtovoda->id];
           
        }else{
           $_SESSION['cartvoda'][$avtovoda->id]=[
               'name'=>$avtovoda->tip,
               'price'=>$avtovoda->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartvoda'][$id])) return false;
         $qtyMinus = $_SESSION['cartvoda'][$id]['qty'];
         $sumMinus = $_SESSION['cartvoda'][$id]['qty']*$_SESSION['cartvoda'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartvoda'][$id]);
    }
}












