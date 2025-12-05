<?php /** @var array $arParams */?>
<div class="modal modal-order" data-modal="review" tabindex="-1" role="dialog">
    <div class="modal__inner modal__inner--review">
        <div class="modal__close" data-modal-close="review">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title">Добавить отзыв</div>
        <form class="form js-ajax-form">
            <input type="hidden" name="action" value="Review/add">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
            <input type="hidden" name="iblockId" value="<?=$arParams['IBLOCK_ID']?>">
            <input type="hidden" name="sectionCode" value="<?=$arParams['PARENT_SECTION_CODE']?>">

            <div class="form__fields">
                <div class="input-block">
                    <label class="input-block__label">Имя <sup>*</sup></label>
                    <input type="text" name="name" class="input-block__input" placeholder="Ваше имя"
                           autocomplete="off" data-required="">
                </div>

                <div class="input-block">
                    <label class="input-block__label">Аватар</label>
                    <input type="file" name="photo" class="input-block__input"
                           autocomplete="off" accept=".jpg,.jpeg,.png">
                    <div class="input-block__hint">jpg, png, Не более 2 Мб</div>
                </div>

                <div class="input-block">
                    <label class="input-block__label">Текст отзыва <sup>*</sup></label>
                    <textarea name="message" class="input-block__input input-block__input--textarea review__add-textarea"
                              autocomplete="off"></textarea>
                </div>
            </div>

            <div class="form__footer">
                <div class="form__message form__message--error js-form-error"></div>
                <button class="form__submit btn btn--fullwidth" type="submit">Отправить</button>
            </div>

        </form>

    </div>
</div>