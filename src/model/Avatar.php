<?php
namespace projet_4\src\model;

class Avatar
{

    private $id;
    private $name;
    private $size;
    private $type;
    private $pseudo;
    private $bin;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
      $this->pseudo = $pseudo;
    }

    public function getBin() {
      return $this->bin;
    }

    public function setBin($bin) {
      $this->bin = $bin;
    }
}
