<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание аналоговых домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 66]) ?>
        </div>
    </div>
    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['ID' => 67]) ?>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-8')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/benefit.php', ['PARENT_SECTION' => 8]) ?>
        </div>
    </div>
    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?=$APPLICATION->ShowViewContent('section-title-10')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['PARENT_SECTION' => 10]) ?>
        </div>
    </div>
    <div class="container">
        <div class="section section--extra">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-6')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/benefit.php', ['PARENT_SECTION' => 6]) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>