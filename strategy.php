<?php
interface PaymentMethod
{
    public function pay();
}

class CreditCardStrategy implements PaymentMethod
{
    public function pay()
    {
        return "Credit Card";
    }
}

class ApplePayStrategy implements PaymentMethod
{
    public function pay()
    {
        return "Apple pay";
    }
}

class GooglePayStrategy implements PaymentMethod
{
    public function pay()
    {
        return "Google pay";
    }
}

class Context
{
    private $strategy;
    public function __construct($paymentMethod)
    {
        switch($paymentMethod){
            case 'credit':
                $this->strategy = new CreditCardStrategy();
                break;
            case 'apple':
                $this->strategy = new ApplePayStrategy();
                break;
            case 'google':
                $this->strategy = new GooglePayStrategy();
                break;
            default:
                throw new Exception("Error Processing Request", 1);
                
        }
    }

    public function pay() : string
    {
        return $this->strategy->pay();
    }
}


$obj1 = new Context('credit');
echo $obj1->pay(),"\n";
$obj2 = new Context('apple');
echo $obj2->pay();
?>