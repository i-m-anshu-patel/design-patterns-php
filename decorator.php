<?php
interface Shape{
    public function draw();
}

class Rectangle implements Shape{
    public function draw(){
        echo "Inside Rectangle \n";
    }
}

class Circle implements Shape{
    public function draw(){
        echo "Inside Circle \n";
    }
}

abstract class ShapeDecorator implements Shape{
    protected $decoratedShape;
    public function __construct($decoratedShape){
        $this->decoratedShape = $decoratedShape;
    }
    public function draw(){
        $this->decoratedShape->draw();
    }
}

class RedShapeDecorator extends ShapeDecorator{
    public $decoratedShape;

    public function __construct($decoratedShape){
        parent::__construct($decoratedShape);
    }

    public function draw(){
        $this->decoratedShape->draw();
        $this->setRedBorder($this->decoratedShape);
    }

    private function setRedBorder($shape){
        echo "Border color: red \n";
    }
}

$circle = new Circle();
$redCircle = new RedShapeDecorator(new Circle());
$redRectangle = new RedShapeDecorator(new Rectangle());
echo "Circle with normal border----> \n";
$circle->draw();
echo "Circle with red border----> \n";
$redCircle->draw();
echo "Rectangle with red border----> \n";
$redRectangle->draw();

?>