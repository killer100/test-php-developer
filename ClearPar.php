<?php

class ClearPar{


    public function build($str){
        $ret = '';
        $pareja = 0;
        
        for($i=0;$i<strlen($str);$i++){ 
          if($pareja==0 && $str{$i}=='(')
            $pareja=1; 

          if($pareja==1 && $str{$i}==')'){         
            $ret.='()';
            $pareja=0;
          }
        }

        return $ret;
    }

}

$obj = new ClearPar;

echo "Ejemplo 1: ".$obj->build("()())()")."<br>";


echo "Ejemplo 2: ".$obj->build("()(()")."<br>";


echo "Ejemplo 3: ".$obj->build(")(")."<br>";


echo "Ejemplo 4: ".$obj->build("((()")."<br>";


echo "Ejemplo 5: ".$obj->build("(()()()()(()))))())((()​)")."<br>";