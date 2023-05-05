<?php
interface Item{
    public function name();
    public function packing();
    public function price();
}
interface Packing{
    public function pack();
}

class Wrapper implements Packing{

    public function pack(){
        return "Wrapper";
    }
}

class Bottle implements Packing{

    public function pack(){
        return "Bottle";
    }
}

abstract class Burger implements Item{
    public function packing(){
        return new Wrapper();
    }

    abstract public function price();
    abstract public function name();
}

abstract class ColdDrink implements Item{
    public function packing(){
        return new Bottle();
    }

    abstract public function price();
    abstract public function name();
}

class VegBurger extends Burger{
    public function price(){
        return 25;
    }
    
    public function name(){
        return 'Veg Burger';
    }
}


class ChickenBurger extends Burger{
    public function price(){
        return 50;
    }
    
    public function name(){
        return 'Chicken Burger';
    }
}

class Coke extends ColdDrink{
    public function price(){
        return 30;
    }
    
    public function name(){
        return 'Coke';
    }
}

class Pepsi extends ColdDrink{
    public function price(){
        return 35;
    }
    
    public function name(){
        return 'Pepsi';
    }
}


class Meal{
    public $items = [];

    public function addItem($item){
        array_push($this->items, $item);
    }

    public function getCost(){
        $cost = 0;
        foreach($this->items as $item){
            $cost += $item->price();
        }
        return $cost;
    }


    public function showItems(){
        foreach($this->items as $item){
            echo "Item : ".$item->name();
            echo " , Packing : ".($item->packing())->pack();
            echo " , Cost : ".$item->price()." \n";
        }
    }
}

class MealBuilder{
    public function prepareVegMeal(){
        $meal = new Meal();
        $meal->addItem(new VegBurger());
        $meal->addItem(new Coke());
        return $meal;
    }
    public function prepareNonVegMeal(){
        $meal = new Meal();
        $meal->addItem(new ChickenBurger());
        $meal->addItem(new Pepsi());
        return $meal;
    }
}


$mealBuilder = new MealBuilder();
$vegMeal = $mealBuilder->prepareVegMeal();
echo "Veg Meal \n";
$vegMeal->showItems();
echo "Total Cost : ".$vegMeal->getCost();
echo "\n ----------------------------------------------- \n";
$nonVegMeal = $mealBuilder->prepareNonVegMeal();
echo "Non Veg Meal \n";
$nonVegMeal->showItems();
echo "Total Cost : ".$nonVegMeal->getCost();
?>