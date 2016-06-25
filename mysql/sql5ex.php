<?php
$name = $_GET['param'];
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

    if ($id == null && $name != null) {
        $sql = "SELECT * FROM ".$tb_name." WHERE name = '".$name."';";

        $stmt = $db->query($sql);

        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    if ($id != null) {
        $sql = "UPDATE my_table SET name = :name, address = :address, email = :email  WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $data = array(':name' => "'".$u_name."'", ':address' => "'".$addres."'", ':email' => "'".$email."'");
        $stmt->excute($data);

        $sql = "SELECT * FROM ".$tb_name." WHERE name = '".$u_name."';";

        $stmt = $db->query($sql);

        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    $json = json_encode($result);
    echo $json; 
} catch (PDOEXception $e) {
    echo "ERROE:".$e->getMessage();
    die();
}
?>