<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord {
    
     public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public function addToCart ($product, $qty = 1){
        $mainImg = $product->getImage();
        if (isset($_SESSION ['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] +=$qty;
           
        }else{
           $_SESSION['cart'][$product->id]=[
               'qty'=>$qty,
               'name'=>$product->name,
               'price'=>$product->price,
               'img'=>$mainImg->getUrl('x50')
           ]; 
        }
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty']+$qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;
         
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
    
     public function addToCartgruz ($avtogruz){
        $mainImg = $avtoleg->getImage();
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
           $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$avtovoda->price : $qty*$avtovoda->price;
            
    }
    
    public function recalc($id){
         if (!isset($_SESSION ['cart'][$id])) return false;
         $qtyMinus = $_SESSION['cart'][$id]['qty'];
         $sumMinus = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price'];
         $_SESSION['cart.qty']-=$qtyMinus;
         $_SESSION['cart.sum']-=$sumMinus;
         unset($_SESSION['cart'][$id]);
    }
}
