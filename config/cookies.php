<?php
require_once __DIR__ . '/../config/const.php';

if (!empty($_COOKIE['topics']) && !empty($_COOKIE['articleNb'])) {

    $displayTopics = (array)json_decode($_COOKIE['topics']);

    $displayTopics = array_intersect(TOPICS, $displayTopics);


    $displayNb = ($_COOKIE['articleNb']);
    if (in_array($displayNb, ARTICLE_NB) == false) {
        $displayNB = 6;
    }
}

if (!empty($_COOKIE['mode'])) {
    $darkM = ($_COOKIE['mode']);
    if ($darkM == "darkMode") {
        $darkMo = $_COOKIE['mode'];
    } else {
        $darkMo = "";
    }
}
