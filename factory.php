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

class ShapeFactory{
    public function getShape($shapeType){
        if($shapeType=='rectangle'){
            return new Rectangle();
        }
        elseif($shapeType=='square'){
            return new Square();
        }
        elseif($shapeType=='circle'){
            return new Circle();
        }
    }
}

$shapeFactory = new ShapeFactory();
$shape1 = $shapeFactory->getShape('rectangle');
$shape1->draw();
$shape2 = $shapeFactory->getShape('square');
$shape2->draw();
$shape3 = $shapeFactory->getShape('circle');
$shape3->draw();
?>