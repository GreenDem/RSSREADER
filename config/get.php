<?php 
require_once __DIR__ . '/../config/const.php';


if (!isset($_GET['display'])){
    $display = 'Jeux';
} else {
    if (array_key_exists($_GET['display'], TOPICS) == false) {
        $display = "Jeux";
    }else {
        $display = $_GET['display'];
    }
}
?>