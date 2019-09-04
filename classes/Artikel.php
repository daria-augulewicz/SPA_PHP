<?php

require_once 'DbEntry.php';

class Artikel extends DbEntry {
    protected $name;
    protected $beschreibung;

    function __construct($pdo) {
        parent::__construct($pdo);
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setBeschreibung($beschreibung) {
        $this->beschreibung = $beschreibung;
    }

    public function getBeschreibung() {
        return $this->beschreibung;
    }
}
