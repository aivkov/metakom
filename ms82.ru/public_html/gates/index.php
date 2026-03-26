<?php
/** @var \CMain $APPLICATION */

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Установка и облуживание шлагбаумов и ворот от Метаком Сервис в Крыму");
$APPLICATION->SetAdditionalCss(CUtil::GetAdditionalFileURL('/local/css/banner.css'));
?>

    <div class="section section--banner section--no-pt section--no-pb">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'gates-banner', 'TEMPLATE' => 'banner']) ?>
        </div>
    </div>

    <div class="section">
        <?php $APPLICATION->IncludeFile('/includes/metakom/news-detail.php', ['CODE' => 'gates-banner2', 'TEMPLATE' => 'banner3']) ?>
    </div>

    <div class="section section section--dark-accent">
        <div class="container">
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'barrier-options', 'TEMPLATE' => 'multi-desc']) ?>
        </div>
    </div>

    <div class="section section--no-pb">
        <div class="container">
            <h2 class="section__title">Я хочу установить</h2>
            <div class="section__tabs">
                <div class="section__tab tab is-active" data-tab="gates" data-tab-id="gates"><?=$APPLICATION->ShowViewContent('section-title-gates-bonus')?></div>
                <div class="section__tab tab" data-tab="gates" data-tab-id="barrier"><?=$APPLICATION->ShowViewContent('section-title-barrier-bonus')?></div>
            </div>
            <div class="section__tabs-content">
                <div class="tab-block is-active" data-tab-block="gates" data-tab-block-id="gates">
                    <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'gates-bonus', 'TEMPLATE' => 'bonus']) ?>
                    <div class="subsection">
                        <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-gates-steps')?></h2>
                        <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'gates-steps', 'TEMPLATE' => 'steps-simple']) ?>
                    </div>

                </div>
                <div class="tab-block" data-tab-block="gates" data-tab-block-id="barrier">
                    <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'barrier-bonus', 'TEMPLATE' => 'bonus']) ?>
                    <div class="subsection">
                        <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-barrier-steps')?></h2>
                        <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'barrier-steps', 'TEMPLATE' => 'steps-simple']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-guarantees')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'guarantees', 'TEMPLATE' => 'attention']) ?>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h2 class="section__title"><?=$APPLICATION->ShowViewContent('section-title-for-whom')?></h2>
            <?php $APPLICATION->IncludeFile('/includes/metakom/news-list.php', ['SECTION_CODE' => 'for-whom', 'TEMPLATE' => 'clients']) ?>
        </div>
    </div>
    <div class="section section--feedback section--grey">
        <div class="container container--xs">
            <h2 class="section__title">Оставьте заявку</h2>
            <p class="section__description center">На бесплатный выезд инженера.<br>Мы подберем для Вас лучшее решение под ваш бюджет</p>
            <?php $APPLICATION->IncludeFile('/includes/form/call-simple.php');?>
        </div>
    </div>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>