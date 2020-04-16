<?php
include("db.php");
$db = new Database();
$db->conn();

$sql ="SELECT * FROM tbl_slide";
$result = $db->cnn->query($sql);
while($row = $result->fetch_array()){
    echo($row[1]);
}
?>