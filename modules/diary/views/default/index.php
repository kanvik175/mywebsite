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
            <td><?= Html::a($record->name, ['/diary/default/view', 'id' => $record->id]) ?></td>
            <td><?= $record->date ?></td>
            <td><?= Html::a('Редактировать', ['/diary/default/edit', 'id' => $record->id], ['class' => 'btn btn-warning']) ?></td>
            <td><?= Html::a('Удалить', ['/diary/default/delete', 'id' => $record->id], ['class' => 'btn btn-danger']); ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
