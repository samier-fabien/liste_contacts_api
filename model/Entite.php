<?php
abstract class Entite
{
    protected $id;

    public function __construct(int $id)
    {
        $this->setId($id);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        if (is_int($id)) {
            $this->id = $id;
        } else {
            $this->id = 0;
        }

        return $this;
    }
}
