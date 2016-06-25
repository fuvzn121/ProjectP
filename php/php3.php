<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>php3.php</title>
    </head>
    <body>
    <table border="1">
        <caption>簡単な住所録の例</caption>
        <tr>
            <th>名前</th>
            <th>住所</th>
            <th>電話番号</th>
            <th>メール</th>
        <?php
        function init_table() {
            $table = array(
                 array(
                    '名前' => '東京太郎',
                    '住所' => '東京都',
                    '電話番号' => '012-345-6789',
                    'メール' => 'taro@hoge.jp'),
                 array(
                    '名前' => '工科花子',
                    '住所' => '北海道',
                    '電話番号' => '987-654-3210',
                    'メール' => 'hana@hoge.jp')
            );
            if ($_POST != null) {
                $table[] = array(
                    '名前' => $_POST['氏名'],
                    '住所' => $_POST['住所'],
                    '電話番号' => $_POST['電話番号'],
                    'メール' => $_POST['メール']
                );
            } else {
                return $table;
            }
            return $table;

        }

        function print_table($table) {
            for ($i = 0; $i < count($table); $i++) {
                echo "<tr><td>" . $table[$i]['名前'] . "</td>";
                echo "<td>" . $table[$i]['住所'] . "</td>";
                echo "<td>" . $table[$i]['電話番号'] . "</td>";
                echo "<td>" . $table[$i]['メール'] . "</td></tr>";
            }
            echo "</table>";
            return $table;
        }

        print_table(init_table());
        ?>

    <form action="./php3.php" method="post">
        名前<input type="text" name="氏名"/><br>
        住所<input type="text" name="住所"/><br>
        電話番号<input type="text" name="電話番号"/><br>
        メールアドレス<input type="text" name="メール"/><br>
        <input type="submit" value="追加"/>
    </form>
    </body>
</html>