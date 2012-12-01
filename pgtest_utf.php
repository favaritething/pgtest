<html>
<head><title>PHP TEST</title></head>
<body>

<?php

$conn = "dbname=test user=zero password=postgres";
$link = pg_connect($conn);
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');

$sql="SELECT * FROM shinamono";
$result=pg_query($sql);
if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
}


//
for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
    $rows = pg_fetch_array($result, NULL, PGSQL_ASSOC);
    
    print($rows['hinmei']);
    print($rows['nedan']);
    print('<br>');

}
var_dump(pg_num_rows($result));
print('件ヒットしました。<br/>');

// PostgreSQLに対する処理

$close_flag = pg_close($link);

if ($close_flag){
    print('切断に成功しました。<br>');
}

?>
