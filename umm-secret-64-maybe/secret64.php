<?php
/**
 * Secret64 is a simple thing that converts String to
 * simple shuffled base64.
 * This script are inspired by Adf.ly's ysmm code.
 * 
 * @author Chris <hi@christianto.net>
 */

 class Secret64 {
     const
        PADDING_REPLACE = "_";
     private static function swapize($encoded){
         $encoded = str_replace("=", self::PADDING_REPLACE, $encoded);
         $encoded = str_split($encoded);
         $a=[];
         $b=[];
         for($i=0; $i<count($encoded); $i++) {
            if($i % 2 == 0)
                $a[] = $encoded[$i];
            else
                $b[] = $encoded[$i];
         }
         $b = array_reverse($b);
         $data = "";
         for($i=0; $i<(count($encoded)/2); $i++){
             $data .= $a[$i] . $b[$i];
         }
        return $data;         
     }

     private static function deswapize($encoded){
        $encoded = str_replace(self::PADDING_REPLACE, "=", $encoded);
        $encoded = str_split($encoded);
        $a=[];
        $b=[];
        for($i=0; $i<count($encoded); $i++) {
           if($i % 2 == 0)
               $a[] = $encoded[$i];
           else
               $b[] = $encoded[$i];
        }
        $b = array_reverse($b);
        $data = "";
        for($i=0; $i<(count($encoded)/2); $i++){
            $data .= $a[$i] . $b[$i];
        }
       return $data;         
    }

     public static function encode($data) {
        return self::swapize(base64_encode($data));
     }

     public static function decode($data) {
        return base64_decode(self::deswapize($data));
     }
 }