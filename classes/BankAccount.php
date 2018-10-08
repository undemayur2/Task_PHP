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
		$currentBalance	=(int) (string)$this->balance;
		$damount		=(int) (string)$amount;
		$am				= $currentBalance+$damount;
		$this->balance=$am;
		return $this->balance;
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
		$currentAccountAmount	= (int) (string)$this->balance;
		$am	= (int) (string)$amount;
		
		if($am>$currentAccountAmount)
		{
			Throw new Exception("Withdrawl amount larger than balance");
			return true;
		} else {
			$xx=$currentAccountAmount-$am;
			$this->balance=$xx;
			$targetAccAmount=(int) (string)$account->balance;
			$cc=$targetAccAmount+$am;
		 
			$account->balance=$cc;
			return false;
		}
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