<?php

namespace projet_4\src\model;

class Comment
{
    private $id;
    private $pseudo;
    private $content;
    private $createdAt;
    private $flag;
    private $avatar;

    public function getAvatar() {
      return $this->avatar;
    }

    public function setAvatar($avatar) {
      $this->avatar = $avatar;
    }

    public function isFlag() {
      return $this->flag;
    }

    public function setFlag($flag) {
      $this->flag = $flag;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
