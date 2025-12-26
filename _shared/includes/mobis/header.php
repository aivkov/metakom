<?php /** @global CMain $APPLICATION */

use Ms\Tools;
use Ms\Site;
?>

<header class="header">
    <div class="container header__container">
        <a href="/" class="header__logo logo">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt="Мобис">
        </a>

        <?php $APPLICATION->IncludeFile('/includes/mobis/menu/top.php')?>

        <div class="header__right">
            <?php if($phone = Site::getPhones()[0]):?>
                <div class="header__phone">
                    <a href="tel:<?=Tools::phoneToTel($phone)?>" class="header__phone extrafont"><?=$phone?></a>
                </div>
            <?php endif?>
            <div class="header__feedback">
                <a href="#" data-modal-ajax-open="call" class="header__feedback-link link--accent" data-modal-ajax-open="call">Заказать звонок</a>
            </div>
        </div>
    </div>
</header>