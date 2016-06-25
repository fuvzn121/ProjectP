<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>php2.php</title>
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
            return $table;
        }

        function print_table($table) {
            for ($i = 0; $i < 2; $i++) {
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
    </body>
</html>