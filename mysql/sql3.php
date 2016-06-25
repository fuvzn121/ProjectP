<?php
$dsn = "mysql:dbname=c0114269;host=localhost";
$user = "C0114269";
$pass = "pass";
$tb_name = "my_table";

try{
    $db = new PDO($dsn, $user, $pass);

    if(!$db) {
        exit("データベースに接続できませんでした");
    }
    $sql = "SELECT * FROM my_table;";
    $stmt = $db->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        $result[] = array(
            "ID"=>$row[0],
            "name"=>$row[1],
            "address"=>$row[2],
            "email"=>$row[3]
        );
    }
    array_unshift($result, array(
        "ID" => "ID",
        "name" => "氏名",
        "address" => "住所",
        "email" => "メールアドレス"));
    $json = json_encode($result);
    echo $json;
} catch (PDOEXception $e) {
    echo "ERROE:".$e->getMessage();
    die();
}
?>
