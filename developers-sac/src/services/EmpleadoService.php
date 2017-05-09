<?php

namespace App\services;

class EmpleadoService{

    private $urlData;

    public function __construct(){
        $this->urlData = '/resources/employees.json';
    }

    private function GetData(){
        $data = file_get_contents(__DIR__.'/../../'.$this->urlData);
        return json_decode($data);
    }

    /** 
     * @return array 
     */ 
    public function ListarEmpleados(){
        return $this->GetData();
    }

    /** 
     * @return array 
     */ 
    public function ListarEmpleado($id){
        $data = $this->GetData();
        return from($data)->Where(function($x)use($id){ return $x->id == $id;})->firstOrDefault();
    }

    /** 
     * @return array 
     */ 
    public function ListarEmpleadosPorRangoSalario($min, $max){
        $data = $this->GetData();
        return from($data)
        ->Where(function($x)use($min, $max){ return $x->salary_number >= $min && $x->salary_number <=$max;})
        ->toArrayDeep();
    }

}