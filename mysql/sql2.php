<?php
$name = $_GET['add_n'];
$address = $_GET['add_a'];
$email = $_GET['add_e'];

$dsn = "mysql:dbname=c0114269;host=localhost";
$user = "C0114269";
$pass = "pass";
$tb_name = "my_table";

try{
    if(!empty($name) && !empty($address) && !empty($email)){
        $db = new PDO($dsn, $user, $pass);

        $stmt = $db -> prepare("INSERT INTO my_table (name, address, email) VALUES (:name, :address, :email)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }
} catch (PDOEXception $e) {
    echo "ERROE:".$e->getMessage();
    die();
}
?>
