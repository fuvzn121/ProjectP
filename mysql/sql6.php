<?php
$dtext = $_GET['dtext'];

$dsn = "mysql:dbname=c0114269;host=localhost";
$user = "C0114269";
$pass = "pass";
$tb_name = "my_table";

try{
    $db = new PDO($dsn, $user, $pass);
    
        $sql = "DELETE FROM my_table where id = :delete_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':delete_id', $dtext, PDO::PARAM_INT);
        $stmt->execute();
        

} catch (PDOEXception $e) {
    echo "ERROE:".$e->getMessage();
    die();
}
?>