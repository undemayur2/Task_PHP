<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        //implement this method
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
    }

    public function withdraw(Money $amount)
	{ 
		$currentBalance	= (int) (string)$this->balance;
		$damount		= (int) (string)$amount;
		if($damount>$currentBalance)
		{
			Throw new Exception("Withdrawl amount larger than balance");
			return true;
		} else {
			$am	= $currentBalance-$damount;
			$this->balance=$am;
			return false;
		}
	} 
}