<?php
require_once 'interface.php';

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    
    protected $balance;
    protected $currency;

    public function __construct($currency, $initialBalance = 0) {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Initial balance cannot be less than " . self::MIN_BALANCE);
        }
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be greater than 0.");
        }
        $this->balance += $amount;
        echo "Deposited $amount {$this->currency}. Current balance: {$this->balance} {$this->currency}.\n";
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Withdrawal amount must be greater than 0.");
        }
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Insufficient funds for withdrawal.");
        }
        $this->balance -= $amount;
        echo "Withdrawn $amount {$this->currency}. Current balance: {$this->balance} {$this->currency}.\n";
    }

    public function getBalance() {
        return $this->balance;
    }
}
?>
