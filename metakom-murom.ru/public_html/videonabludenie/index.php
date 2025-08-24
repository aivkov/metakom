<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание Ip видеокамер от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="section section--no-pt">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 83]) ?>
        </div>
    </div>

    <div class="section section--grey">
        <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['ID' => 84]) ?>
    </div>

    <div class="section section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/bonus.php', ['PARENT_SECTION' => 18]) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-19') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['PARENT_SECTION' => 19]) ?>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/advance.php', ['PARENT_SECTION' => 20]) ?>
        </div>
    </div>

    <div class="section section--grey">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/feedback.php', ['ID' => 94]) ?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>