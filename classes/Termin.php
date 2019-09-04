<?php

class Termin extends DbEntry {
    private $timestamp;
    private $active;

    public function __construct(){}

    public function setTs($ts){
        $this->ts = $ts;
    }

    public function getTs($ts){
        return $this->ts;
    }

    public function setActive($active){
        $this->active = $active;
    }

    public function getActive($active){
        return $this->active;
    }

    public function inThePast(){}


}

