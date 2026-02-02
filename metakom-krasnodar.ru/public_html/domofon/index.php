<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание аналоговых домофонов от компании «Метаком» в Краснодаре");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'domofon-banner', 'TEMPLATE' => 'banner']) ?>
        </div>
    </div>
    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'domofon-banner2', 'TEMPLATE' => 'banner2']) ?>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-domofon-benefit')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'domofon-benefit', 'TEMPLATE' => 'benefit']) ?>
        </div>
    </div>
    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?=$APPLICATION->ShowViewContent('section-title-domofon-steps')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'domofon-steps', 'TEMPLATE' => 'steps']) ?>
        </div>
    </div>
    <div class="container">
        <div class="section section--extra">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-domofon-advanced')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'domofon-advanced', 'TEMPLATE' => 'benefit']) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>