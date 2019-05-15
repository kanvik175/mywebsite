<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 06.05.19
 * Time: 20:34
 */

?>
<div class="diary-default-view">
    <table class="table">
        <tr>
            <td><?= $record->name ?></td>
        </tr>
        <?php if (isset($record->day_rate)): ?>
        <tr>
            <td><?= $record->day_rate ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td><?= $record->date ?></td>
        </tr>
    </table>
</div>