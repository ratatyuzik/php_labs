<?php
require_once 'bank_account.php';
require_once 'saving_account.php';

try {
    echo "=== Creating USD Account ===<br>";
    $usdAccount = new BankAccount("USD", 100);
    $usdAccount->deposit(50);
    $usdAccount->withdraw(30);
    echo "USD Account balance: {$usdAccount->getBalance()} USD.<br>";

    echo "<br>=== Creating EUR Savings Account ===<br>";
    $eurAccount = new SavingsAccount("EUR", 200);
    $eurAccount->applyInterest();
    $eurAccount->withdraw(50);
    echo "EUR Savings Account balance: {$eurAccount->getBalance()} EUR.<br>";

    echo "<br>=== Creating UAH Account ===<br>";
    $uahAccount = new BankAccount("UAH", 500);
    $uahAccount->deposit(100);
    $uahAccount->withdraw(200);
    echo "UAH Account balance: {$uahAccount->getBalance()} UAH.<br>";

    echo "<br>=== Testing invalid deposit ===<br>";
    $usdAccount->deposit(-20);

} catch (Exception $e) {
    echo "Error: {$e->getMessage()} <br>";
}

try {
    echo "<br>=== Testing withdrawal of more than the balance ===<br>";
    $usdAccount->withdraw(200);
} catch (Exception $e) {
    echo "Error: {$e->getMessage()} <br>";
}
?>
