<?php

use app\models\base\Raffle;

/* @var $user object */
/* @var $RafflesApproved Raffle */
/* @var $RafflesChecked Raffle */
/* @var $RafflesNotApproved Raffle */

$this->title = $user->username;

?>

<header id="header">
    <a href="#" class="logo"> <?= Yii::t('app', 'Profile') ?> / <?= $user->code ?> </a>
    <ul class="icons">
        <li><a href="#" class="icon brands fa-vk"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-instagram"><span class="label">Snapchat</span></a></li>
        <li><a href="#" class="icon brands fa-discord"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon brands fa-youtube"><span class="label">Medium</span></a></li>
    </ul>
</header>

<section>
    <header class="main">
        <br>
        <h2>
            <?php if (($hello_message = $user->getHelloMessage()) !== null) { ?>
                <?= $hello_message ?>
            <?php } else { ?>
                <?= $user->surname . " " . $user->name ?>
            <?php } ?>

            <?php if ($user->id != Yii::$app->user->getId()) { ?>
                <?php if (!$user->mySubsription()) { ?>
                    <span class="button extra-small" id="button-subscribe">
                        <?=Yii::t('app', 'Subscribe to')?>
                        <span
                                class="icon solid fa-check">
                        </span>
                    </span>
                <?php } ?>
            <?php } ?>
        </h2>
    </header>
    <span class="image main">
        <?php if ($user->existAva()) { ?>
            <img src="images/pic10.jpg" alt=""/>
        <?php } else { ?>
            <img src="/media/src/raffle/pic11.jpg" alt="">
        <?php } ?>
    </span>
    <h3>
        <?php
            $about_message = $user->getAboutInfo();
        ?>
        <?php if ($about_message) { ?>
            <?= $about_message ?>
        <?php } else { ?>
            Я просто веселый человег!)
        <?php } ?>
    </h3>
    <div>
        <a href="" class="button small"><?=Yii::t('app', 'Followers')?>: <span id="count-subscribers"></span></a>
    </div>
    <br>
</section>

<div>
    <?php if ($user->id === Yii::$app->user->identity->getId()) { ?>
        <?= $this->render('raffle_profile/raffles_current_user', [
            'RafflesApproved' => $RafflesApproved,
            'RafflesChecked' => $RafflesChecked,
            'RafflesNotApproved' => $RafflesNotApproved,
            'user' => $user
        ]) ?>
    <?php } else { ?>
        <?= $this->render('raffle_profile/raffles_user', [
            'RafflesApproved' => $RafflesApproved,
            'user' => $user
        ]) ?>
    <?php } ?>
</div>

<script>
    //TODO Переписать на fetch и вынести в скрипты
    let user_code = "<?=$user->code?>";
    $(document).ready(function () {
        getCountSubscribers();
        getCountSubscriptions();
    });

    function getCountSubscribers() {
        $.ajax({
            url: '/api/user/countsubscribers',
            type: 'GET',
            dataType: 'json',
            data: {code: user_code},
            beforeSend: function () {
                $("#count-subscribers").html("(загрузка...)")
            },
            success: function (res) {
                $("#count-subscribers").html(res);
            },
            error: function () {
                $("#count-subscriptions").html("error");
            }
        });
    }

    function getCountSubscriptions() {
        $.ajax({
            url: '/api/user/countsubscriptions',
            type: 'GET',
            dataType: 'json',
            data: {code: user_code},
            beforeSend: function () {
                $("#count-subscriptions").html("(загрузка...)")
            },
            success: function (res) {
                $("#count-subscriptions").html(res);
            },
            error: function () {
                $("#count-subscriptions").html("error");
            }
        });
    }

    $("#button-subscribe").click(function () {
        $.ajax({
            url: '/api/user/countsubscriptions',
            type: 'POST',
            dataType: 'json',
            data: {code: user_code},
            beforeSend: function () {
                $("#count-subscriptions").html("(загрузка...)")
            },
            success: function (res) {
                $("#count-subscriptions").html(res);
            },
            error: function () {
                $("#count-subscriptions").html("error");
            }
        });
    })
</script>

