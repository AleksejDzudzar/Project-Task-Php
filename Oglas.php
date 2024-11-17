<?php
//Forma htoru popoljnjueme u unosu i vecka ju hasnujeme
class Oglas {
    private $id;
    private $model;
    private $marka;
    private $cena;
    private $tip;

    public function getId() {
        return $this->id;
    }

    public function getModel() {
        return $this->model;
    }

    public function getMarka() {
        return $this->marka;
    }

    public function getCena() {
        return $this->cena;
    }

    public function getTip() {
        return $this->tip;
    }

    public function setId($id) {
        return $this->id = $id;
    }

    public function setModel($model) {
        return $this->model = $model;
    }

    public function setMarka($marka) {
        return $this->marka = $marka;
    }

    public function setCena($cena) {
        return $this->cena = $cena;
    }

    public function setTip($tip) {
        return $this->tip = $tip;
    }
}