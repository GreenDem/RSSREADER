<?php

require_once __DIR__ . '/../config/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userTopic = filter_input(INPUT_POST, 'userTopic', FILTER_SANITIZE_URL, FILTER_REQUIRE_ARRAY);

    if (empty($userTopic) || count($userTopic) != 3) {
        $error['topics'] = 'Veuillez selectionner 3 sujets svp';
    } else {
        $userTopic = array_intersect(TOPICS, $userTopic);
        setcookie('topics', json_encode($userTopic), time() + 31000000, "/");
    }

    $articleNb = filter_input(INPUT_POST, 'articleNb', FILTER_SANITIZE_NUMBER_INT) ?? 6;

    if (in_array($articleNb, ARTICLE_NB)) {
        setcookie('articleNb', $articleNb, time() + 31000000, '/');
    }
    header('location: /controllers/tripleCtrl.php');
    die;
}

include __DIR__ . '/../views/settings.php';
include __DIR__ . '/../views/footer.php';
