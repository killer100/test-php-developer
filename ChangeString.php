<?php

class ChangeString{

    private $alfabeto;
    private $sizeAlfabeto;

    function __construct(){

        $this->alfabeto = [
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
        ];

        $this->sizeAlfabeto = count($this->alfabeto);
        
    }


    public function build($str){
        $ret = '';

        for($i=0;$i<strlen($str);$i++){ 
            $char = $str{$i};
            $toUpper = false;

            if(ctype_upper($char)){
                $char = strtolower($char);
                $toUpper = true;
            }

            $index = array_search($char, $this->alfabeto);
            
            if($index===false)
                $ret .= $char;
            else                
                $ret .= $this->VerificarLetra($char, $index, $toUpper);            
        } 
        
        return $ret;  
    }

    private function VerificarLetra($letra, $index, $toUpper){
        $charNew = $letra;

        if($index+1 ==  $this->sizeAlfabeto)
           $index = -1;

        $charNew = $this->alfabeto[$index+1];
        if($toUpper)
           $charNew = strtoupper($charNew);
        
        return $charNew;
    }
}

$obj = new ChangeString;

echo "Ejemplo 1: ".$obj->build("123 abcd*3")."<br>";


echo "Ejemplo 2: ".$obj->build("**Casa 52")."<br>";


echo "Ejemplo 3: ".$obj->build("**Casa 52Z")."<br>";
