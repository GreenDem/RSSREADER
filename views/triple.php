<?php
require_once __DIR__ . '/../config/cookies.php';
?>
<div class="tripleContainer">
    <?php
    foreach ($displayTopics as $key => $value) {
    ?>
        <div class="thirdContainer">
            <p class="containerName"><?= $key  ?></p>
        <?php
        $testxml = simplexml_load_file("$value");
        foreach ($testxml->channel->item as $item) {
            $newDate = new DateTime($item->pubDate);
            $fmtDate = new IntlDateFormatter('fr_FR');
            $fmtDate->setPattern('EEEE F LLLL yyyy à HH:mm');
            echo '
                <div class="article">
                    <h2><a href="' . $item->link . '">' . $item->title . '</a></h2>
                    <p class="date">' . $fmtDate->format($newDate) . '</p>
                    <p class="description">' . $item->description . '</p>
                    <p class="link"><i><a href="' . $item->link . '">Lire la suite...</a></i></p>
                </div>';
        }
        echo "</div>";
    } ?>
        </div>