<?php

class Email extends DbEntry {
    private $email;
    private $active;

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail($email){
        return $this->email;
    }

    public function setActive($active){
        $this->active = $active;
    }

    public function getActive($active){
        return $this->active;
    }
}

