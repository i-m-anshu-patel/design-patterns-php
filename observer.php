<?php
interface Observer{
    public function add($subject);
    public function notify($price);
}

interface Company{
    public function update($price);
}

class StockSim implements Observer{
    private $companies = [];

    public function add($subject){
        array_push($this->companies, $subject);
    }

    public function updatePrices(){
        $this->notify(rand(23.99, 199.99));
    }
    public function notify($price){
        foreach($this->companies as $comp){
            $comp->update($price);
        }
    }
}

class Google implements Company{
    private $price;
    public function __construct($price){
        $this->price = $price;
        echo "Google created at $this->price \n";
    }
    public function update($price){
        $this->price = $price;
        echo "Setting Price of Google at $this->price \n";
    }
}


class Walmart implements Company{
    private $price;
    public function __construct($price){
        $this->price = $price;
        echo "Walmart created at $this->price \n";
    }
    public function update($price){
        $this->price = $price;
        echo "Setting Price of Walmart at $this->price \n";
    }
}

//Client

$stocksim = new StockSim();
$company1 = new Google(19.99);
$company2 = new Walmart(15.99);
$stocksim->add($company1);
$stocksim->add($company2);
$stocksim->updatePrices();
echo "\n";
$stocksim->updatePrices();
?>