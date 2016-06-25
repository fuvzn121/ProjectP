<?php
$id = $_GET['param1'];
$u_name = $_GET['param2'];
$addres = $_GET['param3'];
$email = $_GET['param4'];

$dsn = "mysql:dbname=c0114269;host=localhost";
$user = "C0114269";
$pass = "pass";
$tb_name = "my_table";

try{
    $db = new PDO($dsn, $user, $pass);
        $sql = "UPDATE my_table SET name = :name, address = :address, email = :email  WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $u_name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $addres, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


        $stmt = $db->query($sql);

    
} catch (PDOEXception $e) {
    echo "ERROE:".$e->getMessage();
    die();
}
?>