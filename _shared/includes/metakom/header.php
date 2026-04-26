<?php /** @global CMain $APPLICATION */

use Ms\Tools;
use Ms\Site;

$arLogo = Site::getLogo();
?>

<header class="header">
    <div class="header__container container">
        <div class="header__left">
            <div>
                <a href="/" class="header__logo logo logo--<?= Site::getLid() ?>">
                    <img src="<?= $arLogo['src'] ?>" alt="<?= $arLogo['alt'] ?>">
                </a>
                <?php $APPLICATION->IncludeFile('/includes/metakom/header-city.php') ?>
            </div>

            <?php $APPLICATION->IncludeFile('/includes/metakom/menu/top.php') ?>
        </div>
        <div class="header__right">

            <div class="header__phones">
                <?php if (Site::count() === 1): ?>
                    <?php if ($phone = Site::getPhones()[0]): ?>
                        <a href="tel:<?= Tools::phoneToTel($phone['phone']) ?>" class="header__phone"><?= $phone['phone'] ?></a>
                    <?php endif ?>
                <?php else: ?>
                    <?php $ids = Site::getIds();?>
                    <?php foreach($ids as $id): ?>
                        <?php $phone = Site::getPhones($id)[0];?>
                        <a href="tel:<?= Tools::phoneToTel($phone['phone']) ?>"
                           class="header__phone tab-block <?php if($id  == $ids[0]):?> is-active<?php endif?>"
                           data-tab-block="contacts"
                           data-tab-block-id="contacts-<?=$id?>"><?= $phone['phone'] ?></a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>

            <div class="header__feedback">
                <a href="#" data-modal-ajax-open="call" class="header__feedback-link">Обратный звонок</a>
            </div>
            <div class="header__social">
                <?php $APPLICATION->IncludeFile('/includes/metakom/social.php') ?>
            </div>
        </div>
    </div>
</header>