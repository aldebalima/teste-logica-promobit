<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
       //todo your code.
        $responseData = array();
        $holderColor = '';
        $holderSize = '';
        foreach(self::products as  $product){
            $arrProduct = explode('-', $product);
            if ($holderColor ==''){
                $holderColor = $arrProduct[0];
                $holderSize = $arrProduct[1];
                $responseData[$holderColor]= array($holderSize => 1);
            }
            else if ($holderColor != $arrProduct[0]){
                $holderColor = $arrProduct[0];
                $holderSize = $arrProduct[1];
                $responseData[$holderColor]= array($holderSize=>1);
            }
            else{
                if(array_key_exists($arrProduct[1], $responseData[$holderColor])){
                     $responseData[$holderColor][$arrProduct[1]]+=1;
                }else{
                    $responseData[$holderColor][$arrProduct[1]] = 1;
                }
            }
        }
        return $responseData;
    }
}

