<?php use Ms\Tools;
/** @var array $arParams */

?>
<div class="modal modal-product" data-modal="product" tabindex="-1" role="dialog" data-on-close="remove">
    <div class="modal__inner modal__inner--product">
        <div class="modal__close" data-modal-close="product">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title modal__title--product">Заказать товар</div>

        <form class="form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendCall">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
            <input type="hidden" name="form-type" value="call">
            <input type="hidden" name="productName" value="<?= $arParams['name']?>">
            <input type="hidden" name="productPrice" value="<?=$arParams['price']?>">
            <div class="modal-product__product">
                <?php if($arParams['picture']):?>
                    <div class="modal-product__img img-block">
                        <img src="<?=CFile::GetPath($arParams['picture'])?>" alt="<?= $arParams['name']?>">
                    </div>
                <?php endif?>
                <div>
                    <div><?=$arParams['name']?></div>
                    <div><?php if($arParams['price']):?><span>Цена: </span><?php endif?>
                        <span class="semibold">
                         <?=Tools::formatPrice($arParams['price'])?>
                    </span>
                    </div>
                </div>
            </div>
            <div class="form__fields">
                <?php /*
                <div class="input-block">
                    <label class="input-block__label">Имя <sup>*</sup></label>
                    <input type="text" name="name" class="input-block__input" placeholder="Ваше имя"
                           autocomplete="off" data-required="">
                </div>
                */?>
                <div class="input-block">
                    <label class="input-block__label">Телефон <sup>*</sup></label>
                    <input type="text" name="phone" class="input-block__input" placeholder="+7 (___) ___-__-__"
                           data-mask="phone" autocomplete="off" data-required="">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Email <sup>*</sup></label>
                    <input type="text" name="email" class="input-block__input" placeholder="Ваше Email"
                           autocomplete="off" data-required="">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Комментарии <sup>*</sup></label>
                    <textarea name="comment" class="input-block__input input-block__input--textarea"
                              autocomplete="off"></textarea>
                </div>
            </div>

            <?php $APPLICATION->IncludeFile('/includes/form/policy.php', ['FORM' => 'call'])?>

            <div class="form__footer">
                <div class="form__message form__message--error js-form-error"></div>
                <button class="form__submit btn btn--fullwidth" type="submit">Отправить</button>
            </div>

        </form>

    </div>
</div>