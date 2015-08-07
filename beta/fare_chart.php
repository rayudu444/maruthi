<?php
include("db.php");
$sq=("select * from farechart");
$s=mysql_query($sq);
while($re=mysql_fetch_array($s)){
$id = $re["id"];
$line["Duration"] = $re["duration"];
$line["Kms"] = $re["kms"];
$line["Hatch Back"] = $re["hatch_back"];
$line["Sedan"] = $re["sedan"];
$line["SUV"] = $re["suv"];
$cities[$id][] = $line;
}
echo json_encode($cities);
?>