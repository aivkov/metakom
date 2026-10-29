<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetPageProperty("description", "Установка и обслуживание домофонов, видеонаблюдения, шлагбаумов в многоквартирных домах. Замена домофона на умный #PHONE#");
$APPLICATION->SetPageProperty("keywords", "Мобис, обслуживание, монтаж и ремонт домофонов, систем видеонаблюдения, СКУД #CITY_PC#");
$APPLICATION->SetPageProperty("title", "Домофоны, шлагбаумы и видеонаблюдение #CITY_PC# | #SITE_NAME#");

?>
    <div class="section section--about">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'about-main', 'TEMPLATE' => 'about-main']) ?>
        </div>
    </div>
    <div class="section section--services section--bg">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/mobis/menu/services.php', ['SHOW_FEEDBACK' => true])?>
        </div>
    </div>

    <div class="section section--description">
        <div class="container container--narrow">
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'description-main', 'TEMPLATE' => 'swap']) ?>
        </div>
    </div>
    <div class="container">
        <div id="services" class="section section--services">
            <h2 class="section__title title"><?=$APPLICATION->ShowViewContent('section-title-services-main')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'services-main', 'TEMPLATE' => 'number']) ?>
        </div>
        <div id="about" class="section section--advantages">
            <h2 class="section__title title"><?=$APPLICATION->ShowViewContent('element-title-advantages-main')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-detail.php', ['CODE' => 'advantages-main', 'TEMPLATE' => 'advantages-main']) ?>
        </div>
    </div>

    <div class="section section--contacts section--bg">
        <?php $APPLICATION->IncludeFile('/includes/mobis/contacts-block.php') ?>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>