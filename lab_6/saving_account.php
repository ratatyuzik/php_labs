<?php
require_once 'bank_account.php';

class SavingsAccount extends BankAccount {
    public static $interestRate = 0.05;

    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
        echo "Interest applied: $interest {$this->currency}. Current balance: {$this->balance} {$this->currency}.\n";
    }
}
?>
