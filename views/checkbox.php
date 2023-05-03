<ul>
    <?php
    require_once __DIR__ . '/../config/const.php';

    foreach (TOPICS as $key => $value) {  ?>
        <li>
            <div class="checkbox">

                <?php
                if (!empty($displayTopics)){
                if (in_array($value, $displayTopics)) {
                    $isChecked = "checked=checked";
                }else {
                    $isChecked = "";
                }}
                ?>

                <input type="checkbox" name="userTopic[]" value="<?= $value ?>" id="<?= $key ?>" <?= $isChecked ?? ""?>>
                <label for="<?= $key ?>"><?= $key ?></label>
            </div>
        </li>
    <?php } ?>
</ul>
<P id="checkboxInfo"><?= $error['topics'] ?? "" ?></P>