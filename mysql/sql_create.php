<?php
    $host = "localhost";
    $user = "C0114269";
    $pass = "pass";
    $db_name = "c0114269";
    $tb_name = "my_table";

    $db = mysqli_connect($host, $user, $pass, $db_name);

    if(!$db) {
        exit("データベースに接続できませんでした");
    }


    $data = mysqli_query($db, "CREATE TABLE ".$tb_name."(
        ID INT NOT NULL auto_increment,
        name varchar(50) NOT NULL,
        address varchar(50) NOT NULL,
        email varchar(50) NOT NULL,
        PRIMARY KEY(id)
        )");
    if (!$data) {
        exit("テーブルが既に存在します");
    }
    echo "作成完了！";
?>
