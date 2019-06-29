<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 06.05.19
 * Time: 20:34
 */

use yii\helpers\Html;

?>
<div class="diary-default-view">
    <table class="table">
        <tr><td><?= $record->name ?></td></tr>
        <?= isset($record->day_rate) ? "<tr><td>$record->day_rate</td></tr>" : "" ?>
        <?= isset($record->weight) ? "<tr><td>$record->weight</td></tr>" : "" ?>
        <?= isset($record->pull_up) ? "<tr><td>$record->pull_up</td></tr>" : "" ?>
        <?= isset($record->num_mad) ? "<tr><td>$record->num_mad</td></tr>" : "" ?>
        <?= isset($record->image) ? "<tr><td>" . (Html::img($record->getImage())) . "</td></tr>" : "" ?>
        <tr><td><?= $record->date ?></td></tr>
    </table>
</div>