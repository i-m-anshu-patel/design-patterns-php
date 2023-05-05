<?php
interface Shape{
    public function draw();
}

class Rectangle implements Shape{
    public function draw(){
        echo "Inside Rectangle \n";
    }
}

class Square implements Shape{
    public function draw(){
        echo "Inside Square \n";
    }
}


class Circle implements Shape{
    public function draw(){
        echo "Inside Circle \n";
    }
}


class ShapeMaker{
    private $circle;
    private $rectangle;

    private $square;

    public function __construct(){
        $this->circle = new Circle();
        $this->rectangle = new Rectangle();
        $this->square = new Square();
    }

    public function drawCircle(){
       return $this->circle->draw();
    }
    public function drawRectangle(){
       return $this->rectangle->draw();
    }

    public function drawSquare(){
       return $this->square->draw();
    }

}
$shapeMaker = new ShapeMaker();
$shapeMaker->drawCircle();
$shapeMaker->drawRectangle();
$shapeMaker->drawSquare();
?>