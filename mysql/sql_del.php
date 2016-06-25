
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


        $data = mysqli_query($db, "DROP TABLE ".$tb_name);
        if (!$data) {
            exit("テーブルが存在しません");
        }
        echo "削除完了！";

        ?>
