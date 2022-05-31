<?php

class Character
{
    private $id;
    private $name;
    private $hp;
    private $atk;

    /*     public function __construct($name, $hp, $atk)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->atk = $atk;
    } */

    public function getID()
    {
        return $this->id;
    }

    //pour accéder à nos propriétés lorsqu'elles sont privés on a besoin de fonctions dédiées appelées getter et setter
    public function getName()
    {
        //le getter est là pour récupérer la donnée
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getAtk()
    {
        return $this->atk;
    }

    public function setName($newname)
    {
        //le setter est là pour attribuer une nouvelle valeur (celle qu'on lui envoie) à une propriété
        $this->name = $newname;
    }

    public function setHp($newhp)
    {
        $this->hp = $newhp;
    }

    public function setAtk($newatk)
    {
        $this->atk = $newatk;
    }

    public function autoAttack($target)
    {
        $target->hp -= $this->atk;
    }

    public function __toString()
    {
        return $this->name;
    }
}
