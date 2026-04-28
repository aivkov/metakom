<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global \CMain $APPLICATION */
/** @global \CUser $USER */
/** @global \CDatabase $DB */
/** @var \CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var array $templateData */
/** @var \CBitrixComponent $component */

use Ms\Tools;

?>
<div class="news">
    <?php if ($arResult['ITEMS']): ?>
        <?php foreach($arResult['ITEMS'] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
        <?php $date = $arItem['ACTIVE_FROM'] ?: $arItem['DATE_CREATE']?>
            <div class="news__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="news__item-head">
                    <h2 class="news__item-title"><?=$arItem['NAME']?></h2>
                    <div class="news__item-date"><?=Tools::formatDateStr($date)?></div>
                </div>
                <?php if($arItem['PREVIEW_TEXT']):?>
                    <div class="news__item-preview"><?=$arItem['PREVIEW_TEXT']?></div>
                <?php endif?>
                <?php if($arItem['DETAIL_TEXT']):?>
                    <div class="news__item-detail"><?=$arItem['DETAIL_TEXT']?></div>
                <?php endif?>
            </div>
        <?php endforeach?>
    <?php else: ?>
        <p class="error">Нет новстей</p>
    <?php endif ?>
</div>


