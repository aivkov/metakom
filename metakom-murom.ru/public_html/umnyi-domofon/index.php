<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание умных домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 76]) ?>
        </div>
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['ID' => 77]) ?>
        </div>
    </div>
    <div class="section section--dark-accent">
        <?php $APPLICATION->IncludeFile('/includes/metakom/description.php', ['ID' => 78]) ?>
    </div>
    <div class="section">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-9') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['PARENT_SECTION' => 9]) ?>
        </div>
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>