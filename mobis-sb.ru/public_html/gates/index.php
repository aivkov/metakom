<?php
/** @var \CMain $APPLICATION */

use Ms\Site;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка ворот и шлагбаумов от Метаком Сервис в Брянске");
?>

    <div class="section section--banner">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'gates-banner', 'TEMPLATE' => 'banner']) ?>
        </div>
    </div>
    <div class="section section--services section--bg">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/mobis/menu/services.php') ?>
        </div>
    </div>
    <div class="section section--description">
        <div class="container container--narrow">
            <h2 class="section__title section__title--small"><?= $APPLICATION->ShowViewContent('section-title-gates-description') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'gates-description', 'TEMPLATE' => 'swap']) ?>
        </div>
    </div>


<?php
$arFilter = ['IBLOCK_ID' => Site::getIblockId(), 'CODE' => 'gates-bonus'];
$arSelect = ['ID', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'NAME'];
$parentSection = CIBlockSection::GetList([], $arFilter, false, $arSelect)->Fetch();

$bonusSections = [];
$arFilter = [
    'IBLOCK_ID' => Site::getIblockId(),
    '>LEFT_MARGIN' => $parentSection['LEFT_MARGIN'],
    '<RIGHT_MARGIN' => $parentSection['RIGHT_MARGIN'],
    '!ID' => $parentSection['ID']
];
$arSelect = ['ID', 'PICTURE', 'NAME', 'CODE', 'DESCRIPTION', 'DETAIL_PICTURE'];
$dbSect = CIBlockSection::GetList([], $arFilter, false, $arSelect);

while ($section = $dbSect->Fetch()) {
    $bonusSections[] = $section;
}
?>
<?php if ($parentSection): ?>
    <div class="section section--no-pb">
        <div class="container container--narrow">
            <h2 class="section__title section__title--small"><?=$parentSection['NAME']?></h2>
            <div class="section__tabs bonus__tabs">
                <?php foreach($bonusSections as $key => $section):?>
                    <div class="section__tab tab bonus__tab <?php if(!$key):?> is-active<?php endif?>" data-tab="gates" data-tab-id="<?=$section['CODE']?>">
                        <div class="bonus__tab-radio"><span></span></div>
                        <span><?=$section['NAME']?></span>
                        <div class="bonus__tab-img">
                            <img src="<?=CFile::getPath($section['DETAIL_PICTURE'])?>" alt="">
                        </div>
                    </div>
                <?php endforeach?>
            </div>
            <div class="section__tabs-content">
                <?php foreach($bonusSections as $key => $section):?>
                    <div class="tab-block <?php if(!$key):?> is-active<?php endif?>"
                         data-tab-block="gates" data-tab-block-id="<?=$section['CODE']?>">
                        <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php',
                            ['SECTION_CODE' => $section['CODE'], 'TEMPLATE' => 'bonus']) ?>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </div>
<?php endif ?>

    <div class="section section--steps">
        <div class="container">
            <h2 class="section__title section__title--small"><?= $APPLICATION->ShowViewContent('section-title-gates-steps') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/mobis/news-list.php', ['SECTION_CODE' => 'gates-steps', 'TEMPLATE' => 'steps']) ?>
        </div>
    </div>

    <div class="section section--contacts section--bg">
        <?php $APPLICATION->IncludeFile('/includes/mobis/contacts-block.php') ?>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>