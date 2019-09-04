<?php

abstract class DbEntry {
    protected $id;
    protected $pdo;

    public function save(){}

    public function remove(){}

    public function getId(){}

    function __construct($pdo){
        $this->pdo=$pdo;
    }
    
}

