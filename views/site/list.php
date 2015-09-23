<?php

foreach($list as $listItem) {
?>
    <h1><?=$listItem['title']?></h1>
    <p><?=htmlentities($listItem['body']) ?></p>
<?php
}?>