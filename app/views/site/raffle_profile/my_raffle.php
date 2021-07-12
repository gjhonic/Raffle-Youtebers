<?php

use yii\helpers\Html;
use yii\helpers\URL;

/* @var $Raffles \app\models\db\Raffle */
/* @var $user \app\models\db\User */

?>
<div>
    <div style="overflow-x: auto; display:flex; justify-content: space-between;">
            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 220px">Одобренные конкурсы</a>

            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px">На модерации</a>

            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 150px">Запрещенные</a>

            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px" href="/raffle/list/<?=$user->code?>">Смотреть все</a>
    </div>

    <div class="posts">
        <?php foreach ($Raffles as $raffle){ ?>
            <article>
                <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
                <div class="image fit"><img src="/app/media/src/raffle/pic11.jpg" alt=""></div>
                <h3><?=$raffle->title?></h3>
                <p><?=$raffle->short_description?></p>
                <ul class="actions">
                    <li><a href="<?=URL::to('/show/').$raffle->code?>" class="button large">Подробнее...</a></li>
                </ul>
            </article>
        <?php } ?>
    </div>
</div>

<section id="banner">
    <div class="content">
        <?php if($Raffles != null){ ?>
            <ul class="pagination">
                <li><span class="button disabled">Prev</span></li>
                <li><a href="#" class="page active">1</a></li>
                <li><a href="#" class="page">2</a></li>
                <li><a href="#" class="page">3</a></li>
                <li><span>…</span></li>
                <li><a href="#" class="page">8</a></li>
                <li><a href="#" class="page">9</a></li>
                <li><a href="#" class="page">10</a></li>
                <li><a href="#" class="button">Next</a></li>
            </ul>
        <?php } ?>
    </div>
</section>