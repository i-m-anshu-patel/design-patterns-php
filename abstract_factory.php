<?php
interface Shape{
    public function draw();
}

class RoundRectangle implements Shape{
    public function draw(){
        echo "Inside Round Rectangle \n";
    }
}

class RoundSquare implements Shape{
    public function draw(){
        echo "Inside  Round Square \n";
    }
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

abstract class AbstractFactory{
    abstract function getShape($shapeType);
}

class ShapeFactory extends AbstractFactory{
    public function getShape($shape){
        if($shape == 'rectangle'){
            return new Rectangle();
        }
        elseif($shape == 'square'){
            return new Square();
        }
    }
}

class RoundedShapeFactory extends AbstractFactory{
    public function getShape($shape){
        if($shape == 'rectangle'){
            return new RoundRectangle();
        }
        elseif($shape == 'square'){
            return new RoundSquare();
        }
    }
}

class FactoryProducer{
    public static function getFactory($rounded){
        if($rounded){
            return new RoundedShapeFactory();
        }
        else{
            return new ShapeFactory();
        }
    }
}

$shapeFactory1 = FactoryProducer::getFactory(false);
$shape1 = $shapeFactory1->getShape('rectangle');
$shape1->draw();
$shapeFactory2 = FactoryProducer::getFactory(true);
$shape2 = $shapeFactory2->getShape('rectangle');
$shape2->draw();
$shapeFactory3 = FactoryProducer::getFactory(false);
$shape3 = $shapeFactory3->getShape('square');
$shape3->draw();
$shapeFactory4 = FactoryProducer::getFactory(true);
$shape4 = $shapeFactory4->getShape('square');
$shape4->draw();
?>