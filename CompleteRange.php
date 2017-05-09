<?php

class CompleteRange{



    public function build($array){
        $ret = [];
        $last = end($array);
        $first = $array[0];
        for($i = $first; $i<=$last; $i++){
            array_push($ret, $i);
        }
        return $ret;
    }

    public function showArray($array){
        $ret = '[';
        foreach ($array as $key => $value) {
            if ($key > 0) 
                $ret.= ',';
            $ret .=  $value;
        }
        $ret .= '];';
        return $ret;
    }
}


$obj = new CompleteRange;


$result = $obj->build([1, 2, 4, 5]);
echo "Ejemplo 1: ".$obj->showArray($result);
echo '<br><br>';

$result = $obj->build([2, 4, 9]);
echo "Ejemplo 2: ".$obj->showArray($result);
echo '<br><br>';

$result = $obj->build([55, 58, 60]);
echo "Ejemplo 3: ".$obj->showArray($result);
echo '<br><br>';