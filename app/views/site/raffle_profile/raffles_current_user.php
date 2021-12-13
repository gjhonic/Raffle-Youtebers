<?php

use yii\helpers\Url;

/* @var $RafflesApproved \app\models\base\Raffle */
/* @var $RafflesChecked \app\models\base\Raffle */
/* @var $RafflesNotApproved \app\models\base\Raffle */
/* @var $user \app\models\base\User */

?>
<div>
    <div style="overflow-x: auto; display:flex; justify-content: space-between;">
            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 220px" onclick="showApproved()" id="button-approved">
                <?=Yii::t('app', 'Published')?>
            </a>

            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px" onclick="showCheked()" id="button-checked">
                <?=Yii::t('app', 'Moderation')?>
            </a>

            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 150px" onclick="showNotApproved()" id="button-not-approved">
                <?=Yii::t('app', 'Forbidden')?>
            </a>

            <a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px" href="/raffle/list/<?=$user->code?>">
                <?=Yii::t('app', 'Archive of raffles')?>
            </a>
    </div>
    <p>
        <h1 id="head-type-raffle"></h1>
    </p>
    <div id="raffle-approved">
        <?php if($RafflesApproved) { ?>
            <div class="posts">
                <?php foreach ($RafflesApproved as $raffle){ ?>
                    <article>
                        <div class="image fit"><img src="/app/media/src/raffle/pic11.jpg" alt=""></div>
                        <h3><?=$raffle->title?></h3>
                        <p><?=$raffle->short_description?></p>
                        <ul class="actions">
                            <li><a href="<?=URL::to('/show/').$raffle->code?>" class="button large"><?=Yii::t('app', 'More details')?>...</a></li>
                        </ul>
                    </article>
                <?php } ?>
            </div>
            <div>
                <h4 align="center"><a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px" href="/raffle/list/<?=$user->code?>"><?=Yii::t('app', 'Archive of raffles')?></a></h4>
            </div>
            <?php }else{ ?>
                <article>
                    <p><?=Yii::t('app', 'No raffles')?></p>
                </article>
            <?php } ?>
    </div>

    <div id="raffle-checked">
        <?php if($RafflesChecked) { ?>
            <div class="posts">
                <?php foreach ($RafflesChecked as $raffle){ ?>
                    <article>
                        <div class="image fit"><img src="/app/media/src/raffle/pic11.jpg" alt=""></div>
                        <h3><?=$raffle->title?></h3>
                        <p><?=$raffle->short_description?></p>
                        <ul class="actions">
                            <li><a href="<?=URL::to('/show/').$raffle->code?>" class="button large"><?=Yii::t('app', 'More details')?>...</a></li>
                        </ul>
                    </article>
                <?php } ?>
            </div>
            <div>
                <h4 align="center"><a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px" href="/raffle/list/<?=$user->code?>"><?=Yii::t('app', 'Archive of raffles')?></a></h4>
            </div>
        <?php }else{ ?>
            <article>
                <p><?=Yii::t('app', 'No raffles')?></p>
            </article>
        <?php } ?>
    </div>

    <div id="raffle-not-approved">
        <?php if($RafflesNotApproved) { ?>
            <div class="posts">
                <?php foreach ($RafflesNotApproved as $raffle){ ?>
                    <article>
                        <div class="image fit"><img src="/app/media/src/raffle/pic11.jpg" alt=""></div>
                        <h3><?=$raffle->title?></h3>
                        <p><?=$raffle->short_description?></p>
                        <ul class="actions">
                            <li><a href="<?=URL::to('/show/').$raffle->code?>" class="button large"><?=Yii::t('app', 'More details')?>...</a></li>
                        </ul>
                    </article>
                <?php } ?>
            </div>
            <div>
                <h4 align="center"><a class="button" style="display: inline-block; margin-right: 10px; width: 23%; min-width: 180px" href="/raffle/list/<?=$user->code?>"><?=Yii::t('app', 'Archive of raffles')?></a></h4>
            </div>
        <?php }else{ ?>
            <article>
                <p><?=Yii::t('app', 'No raffles')?></p>
            </article>
        <?php } ?>
    </div>
</div>

<script>
    function showApproved(){
        $("#head-type-raffle").html("<?=Yii::t('app', 'Published')?>");
        $("#button-approved").removeClass().addClass("button primary");
        $("#button-checked").removeClass().addClass("button");
        $("#button-not-approved").removeClass().addClass("button");
        $("#raffle-approved").show();
        $("#raffle-checked").hide();
        $("#raffle-not-approved").hide();
    }

    function showCheked(){
        $("#head-type-raffle").html("<?=Yii::t('app', 'Moderation')?>");
        $("#button-approved").removeClass().addClass("button");
        $("#button-checked").removeClass().addClass("button primary");
        $("#button-not-approved").removeClass().addClass("button");
        $("#raffle-approved").hide();
        $("#raffle-checked").show();
        $("#raffle-not-approved").hide();
    }

    function showNotApproved(){
        $("#head-type-raffle").html("<?=Yii::t('app', 'Forbidden')?>");
        $("#button-approved").removeClass().addClass("button");
        $("#button-checked").removeClass().addClass("button");
        $("#button-not-approved").removeClass().addClass("button primary");
        $("#raffle-approved").hide();
        $("#raffle-checked").hide();
        $("#raffle-not-approved").show();
    }
    showApproved();
</script>