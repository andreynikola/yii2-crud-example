<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="row">
    <?php foreach ($templates as $template){ ?>
    <div class="col-xs-6 col-md-3">
        <a href="<?= Url::toRoute(['templates/show', 'id' => $template['id']]); ?>" class="thumbnail">
            <?=$template['title'];?>
        </a>
    </div>
    <?php } ?>
</div>