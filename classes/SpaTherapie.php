<?php

require_once 'Artikel.php';

class SpaTherapie extends Artikel {
    private $preis;
    private $kategorie;
    private $kategorien=['Für Männer','Für Frauen', 'Kosmetiken'];
    

    function __construct($pdo,$id=null) {
        parent::__construct($pdo);
        if (isset($id)) {
            $this->id = $id;
            $this->load();
        }
    }
    
    public function setPreis($preis) {
        $this->preis = $preis;
    }

    public function getPreis() {
        return $this->preis;
    }

    public function setKategorie($kategorie) {
        $this->kategorie = $kategorie;
    }

    public function getKategorie() {
        return $this->kategorien[$this->kategorie];
    }
    
    

    public function save(){
        if (!$this->id) {
            $insertQuery = 'INSERT INTO `Produkte` (
                `name`,
                `preis`,
                `beschreibung`,
                `kategorie`) 
                VALUES (?,?,?,?)';
            $stmt = $this->pdo->prepare($insertQuery);
            $stmt->execute([
                $this->name,
                $this->preis,
                $this->beschreibung,  
                $this->kategorie]);
        } 
        else {
            $updateQuery = 'UPDATE `Produkte`
                SET 
                `name` = ?,
                `preis` = ?,
                `beschreibung` = ?,
                `kategorie` = ? 
                WHERE id = ?';
            $stmt = $this->pdo->prepare($updateQuery);
            $stmt->execute([
                $this->name,
                $this->preis,
                $this->beschreibung,  
                $this->kategorie,
                $this->id]);
        }
    }
    
    public function load(){
        $selectQuery = 'SELECT id,name,preis,beschreibung,kategorie FROM Produkte WHERE id=?';
        $stmt = $this->pdo->prepare($selectQuery);
        $stmt->execute([$this->id]);
        $produkt = $stmt->fetch();
        $this->name = $produkt['name'];
        $this->preis = $produkt['preis'];
        $this->beschreibung = $produkt['beschreibung'];
        $this->kategorie = $produkt['kategorie'];
    }
}

