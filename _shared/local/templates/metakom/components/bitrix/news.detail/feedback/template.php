<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
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

<div class="feedback">
    <form class="feedback__form form js-ajax-form">
        <input type="hidden" name="action" value="Form/sendCall">
        <input type="hidden" name="ajaxCallback" value="afterFormSend">
        <div class="feedback__head">
            <h2 class="feedback__title title"><?=$arResult['NAME']?></h2>
            <?php if($arResult['PREVIEW_TEXT']):?>
                <div class="feedback__desc"><?=$arResult['PREVIEW_TEXT']?></div>
            <?php endif?>
        </div>

        <div class="form__fields">
            <div class="input-block">
                <label class="input-block__label">Имя <sup>*</sup></label>
                <input type="text" name="name" class="input-block__input" placeholder="Ваше имя" autocomplete="off" data-required="">
            </div>
            <div class="input-block">
                <label class="input-block__label">Телефон <sup>*</sup></label>
                <input type="text" name="phone" class="input-block__input" placeholder="+7 (___) ___-__-__" data-mask="phone"
                       autocomplete="off" data-required="">
            </div>
            <div class="input-block">
                <label class="input-block__label">Сообщение <sup>*</sup></label>
                <textarea name="message" class="input-block__input input-block__input--textarea" placeholder="Опишите, какую услугу вы хотите получить"
                          autocomplete="off"></textarea>
            </div>
        </div>

        <div class="checkbox">
            <input type="checkbox" id="feedback-agreement" class="checkbox__input" checked data-checkbox-policy>
            <label for="feedback-agreement" class="checkbox__label checkbox__label--policy">
                    <span>Заполняя данную форму, Вы подтверждаете свое совершеннолетие и соглашаетесь
                    на обработку персональных данных в соответствии с Условиями.</span>
                <div class="checkbox__icon"></div>
            </label>
        </div>

        <div class="form__footer">
            <div class="form__message form__message--error js-form-error"></div>
            <button class="form__submit btn btn--fullwidth" type="submit">Отправить</button>
        </div>
    </form>
    <?php if($arResult['PREVIEW_PICTURE']):?>
    <div class="feedback__right">
        <div class="feedback__img">
            <?php $arSmallFile = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], ['width' => 450, 'height' => 450], BX_RESIZE_IMAGE_PROPORTIONAL);?>
            <img src="<?=$arSmallFile['src']?>" alt="">
        </div>
    </div>
    <?php endif?>
</div>