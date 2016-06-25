<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>php5</title>
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

        //$tableの初期化
        function init_table() {
            $table = array();
            return $table;
        }

        //住所録の出力
        function print_table() {
            init_table();

        //フォームに値が入力され、かつファイルが存在する時住所録を出力
            if ($_POST != null || file_exists("./php5.json")) {
                $table = get_file();
                foreach ($table as $val) {
                    if(is_array($val)) {   //配列かどうか確認
                        foreach ($val as $val2) {
                            echo "<tr>";
                            echo "<td> {$val2["名前"]}</td>";
                            echo "<td> {$val2["住所"]}</td>";
                            echo "<td> {$val2["電話番号"]}</td>";
                            echo "<td> {$val2["メール"]}</td>";
                            echo "</tr>";
                        }
                    }
                }
            }
        }

        //ファイルから配列の取得
        function get_file() {
            $file = "./php5.json";
            //ファイルが存在しないときのエラーを回避
            if (file_exists($file) && !empty($file)) {
                $json = file_get_contents($file);
                $table[] = json_decode($json, true);
                return $table;
            }
        }

        function write_file() {
            $new_table = null;
            $file = "php5.json";
            //ファイルが存在しない時ファイルを生成
            if (!file_exists($file)) {
                touch($file);
            } else {
                if ($_POST != null) {
                    $handle = fopen($file, "r");
                    //ファイルサイズが0の時のエラーを回避
                    if (filesize($file) != null) {
                        $new_table = json_decode(fread($handle, filesize($file)), true);
                    }
                    fclose($handle);
                    //配列に追加
                    $table = array(
                        "名前" => $_POST['名前'],
                        "住所" => $_POST['住所'],
                        "電話番号" => $_POST['電話番号'],
                        "メール" => $_POST['メール']);
                    $output = add_array($new_table, $table);
                    //jsonへ変換してファイルに書き込み
                    $handle = fopen($file, 'w');
                    fwrite($handle, json_encode($output, JSON_UNESCAPED_UNICODE));
                    fclose($handle);
                }
            }
        }

        //2次元配列の子配列と指定配列を比較、マッチした添字の配列を新しいものにいれかえるor末尾に追加して返す
        function add_array($array, $new_array) {
            $array[] = $new_array;
            return $array;
        }

        write_file();
        print_table();
        ?>
        </tr>
    </table>
    <form action="php5.php" method="post">
        名前<input type="text" name="名前"><br/>
        住所<input type="text" name="住所"><br/>
        電話番号<input type="text" name="電話番号"><br/>
        メールアドレス<input type="text" name="メール"><br/>
        <input type="submit" value="追加">
    </form>
    </body>
</html>