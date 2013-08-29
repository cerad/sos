<?php

namespace Cerad\Bundle\Test01Bundle\Product;

class Product
{
    private $id;
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getId  () { return $this->id; }
    public function getName() { return $this->name; }
}
?>
