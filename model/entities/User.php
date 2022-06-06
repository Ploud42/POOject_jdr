<?php

class User
{
    private $id;
    private $pseudo;
    private $mail;
    private $password;

    public function getID()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($newPseudo)
    {
        $this->pseudo = $newPseudo;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($newMail)
    {
        $this->mail = $newMail;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($newPwd)
    {
        $this->password = $newPwd;
    }

    public function __toString()
    {
        return $this->pseudo;
    }
}
