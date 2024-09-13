<?php

class Geometric_Shape {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function calculateArea() {
        return 0;
    }
}

class Circle extends Geometric_Shape {
    private $radius;

    public function __construct($radius) {
        parent::__construct("Circle");
        $this->radius = $radius;
    }

    public function calculateArea() {
        return round(pi() * pow($this->radius, 2), 2);
    }
}

class Rectangle extends Geometric_Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        parent::__construct("Rectangle");
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

$circle = new Circle(10);
echo "<h3>The area of the " . $circle->name . " is: " . $circle->calculateArea() . "</h3>";

$rectangle = new Rectangle(3, 6);
echo "<h3>The area of the " . $rectangle->name . " is: " . $rectangle->calculateArea() . "</h3>";
?>
