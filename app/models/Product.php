<?php

class Product extends Model{
    public function __construct(){
        $table='product';
        parent::__construct($table);
    }
    
}