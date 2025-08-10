<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание умных домофонов от Метаком Сервис в Муроме");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="container">
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner.php', ['ID' => 39]) ?>
        </div>
        <div class="section section--no-pt">
            <?php $APPLICATION->IncludeFile('/includes/metakom/banner2.php', ['ID' => 40]) ?>
        </div>
    </div>
    <div class="section section--dark-accent">
        <?php $APPLICATION->IncludeFile('/includes/metakom/description.php', ['ID' => 41]) ?>
    </div>
    <div class="section">
        <div class="container">
            <h2 class="section__title section__title--big"><?= $APPLICATION->ShowViewContent('section-title-18') ?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/steps.php', ['ID' => 18]) ?>
        </div>
    </div>


<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>