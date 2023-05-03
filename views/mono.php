

<div class="fullWidthContainer">
    <?php
    $testxml = simplexml_load_file(TOPICS[$display]);
    $monoDisplay = $testxml->channel->item;
    $monoCount = count($testxml->channel->item);

    if ($monoCount < $displayNb) {
        for ($i = 0; $i< $monoCount; $i++) {
            $newDate = new DateTime($monoDisplay[$i]->pubDate);
            $fmtDate = new IntlDateFormatter('fr_FR');
            $fmtDate->setPattern('EEEE F LLLL yyyy à HH:mm');
            echo '
                    <div class="article">
                        <h2><a href="' . $monoDisplay[$i]->link . '">' . $monoDisplay[$i]->title . '</a></h2>
                        <p class="date">' . $fmtDate->format($newDate) . '</p>
                        <p class="description">' . $monoDisplay[$i]->description . '</p>
                        <p class="link"><i><a href="' . $monoDisplay[$i]->link . '">Lire la suite...</a></i></p>
                    </div>';
        }
    
    }else {

    for ($i = 0; $i< $displayNb; $i++) {
        $newDate = new DateTime($monoDisplay[$i]->pubDate);
        $fmtDate = new IntlDateFormatter('fr_FR');
        $fmtDate->setPattern('EEEE F LLLL yyyy à HH:mm');
        echo '
                <div class="article">
                    <h2><a href="' . $monoDisplay[$i]->link . '">' . $monoDisplay[$i]->title . '</a></h2>
                    <p class="date">' . $fmtDate->format($newDate) . '</p>
                    <p class="description">' . $monoDisplay[$i]->description . '</p>
                    <p class="link"><i><a href="' . $monoDisplay[$i]->link . '">Lire la suite...</a></i></p>
                </div>';
    } }

    // foreach ($testxml->channel->item as $item) {
    //     $newDate = new DateTime($item->pubDate);
    //     $fmtDate = new IntlDateFormatter('fr_FR');
    //     $fmtDate->setPattern('EEEE F LLLL yyyy à HH:mm');
    //     echo '
    //             <div class="article">
    //                 <h2><a href="' . $item->link . '">' . $item->title . '</a></h2>
    //                 <p class="date">' . $fmtDate->format($newDate) . '</p>
    //                 <p class="description">' . $item->description . '</p>
    //                 <p class="link"><i><a href="' . $item->link . '">Lire la suite...</a></i></p>
    //             </div>';
    // } ?>
</div>