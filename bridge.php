<?php
interface DrawApi{
    public function drawCircle($radius, $x, $y);
}

class RedCircle implements DrawApi{
    public function drawCircle($radius, $x, $y){
        echo "drawing circle [ color : red, radius : ".$radius." coordinates : $x , $y \n";
    }
}

class GreenCircle implements DrawApi{
    public function drawCircle($radius, $x, $y){
        echo "drawing circle [ color : green, radius : ".$radius." coordinates : $x , $y \n";
    }
}

abstract class Shape{
    protected $drawApi;
    public function __construct($drawApi){
        $this->drawApi = $drawApi;
    }

    abstract public function draw();
}

class Circle extends Shape{
    private $x, $y, $radius;
    public function __construct($x, $y, $radius, $drawApi){
        parent::__construct($drawApi);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw(){
        $this->drawApi->drawCircle($this->radius, $this->x, $this->y);
    }
}


$redCircle = new Circle(100, 100, 10, new RedCircle());
$greenCircle = new Circle(100, 10, 5, new GreenCircle());

$redCircle->draw();
$greenCircle->draw();
?>