<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// Alustetaan kysely tietokantayhteydellämme
$db = DB::connection();
$sql = <<<EOF
      SELECT * from Tutorial;
EOF;

$ret = pg_query($db, $sql);
if (!$ret) {
    echo pg_last_error($db);
    exit;
}
$rows = array();
while ($r = pg_fetch_assoc($ret)) {
    $rows[] = $r;
    echo json_encode($rows);
}


    
