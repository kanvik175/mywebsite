<?php

    use yii\helpers\Html;

?>
<div class="diary-default-index">
    <?php if (isset($flash_message)): ?>
        <div class="alert alert-<?= $flash_message['error'] ? "danger" : "success" ?>">
            <?= $flash_message['message'] ?>
        </div>
    <?php endif; ?>
    <?= Html::a('Новая запись', ['/diary/default/create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px;']) ?>

    <table class="table">
    <?php foreach ($records as $record): ?>
        <tr>
            <td><?= $record->name ?></td>
            <td><?= $record->date ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

</div>
