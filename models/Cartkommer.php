<?php
namespace app\models;
use yii\db\ActiveRecord;

class Cartkommer extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    
    
     public function addToCartkommer ($nedvigkommer){
        $mainImg = $nedvigkommer->getImage();
        if (isset($_SESSION ['cartkommer'][$nedvigkommer->id])){
            $_SESSION['cartkommer'][$nedvigkommer->id];
           
        }else{ 
           $_SESSION['cartkommer'][$nedvigkommer->id]=[
               'name'=>$nedvigkommer->type_nedvigimosty,
               'price'=>$nedvigkommer->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
           $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cartkommer'][$id])) return false;
         $qtyMinus = $_SESSION['cartkommer'][$id]['qty'];
         $sumMinus = $_SESSION['cartkommer'][$id]['qty']*$_SESSION['cartkommer'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cartkommer'][$id]);
    }
}






