<html>
<head><title>PHP TEST</title></head>
<body>

<?php

$conn = "dbname=test user=zero password=postgres";
$link = pg_connect($conn);
if (!$link) {
    die('��³���ԤǤ���'.pg_last_error());
}

print('��³���������ޤ�����<br>');

$sql="SELECT * FROM shinamono";
$result=pg_query($sql);
if (!$result) {
    die('�����꡼�����Ԥ��ޤ�����'.pg_last_error());
}


//
for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
    $rows = pg_fetch_array($result, NULL, PGSQL_ASSOC);
    
    print($rows['hinmei']);
    print($rows['nedan']);
    print('<br>');

}
var_dump(pg_num_rows($result));
print('��ҥåȤ��ޤ�����<br/>');

// PostgreSQL���Ф������

$close_flag = pg_close($link);

if ($close_flag){
    print('���Ǥ��������ޤ�����<br>');
}

?>
