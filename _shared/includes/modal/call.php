<div class="modal modal-call" data-modal="call" tabindex="-1" role="dialog" on-close="remove">
    <div class="modal__inner modal__inner--call">
        <div class="modal__close" data-modal-close="call">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title">Обратный звонок</div>
        <form class="form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendCall">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
            <input type="hidden" name="form-type" value="call">
            <div class="form__fields">
                <div class="input-block">
                    <label class="input-block__label">Имя <sup>*</sup></label>
                    <input type="text" name="name" class="input-block__input" placeholder="Ваше имя"
                           autocomplete="off" data-required="">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Телефон <sup>*</sup></label>
                    <input type="text" name="phone" class="input-block__input" placeholder="+7 (___) ___-__-__"
                           data-mask="phone" autocomplete="off" data-required="">
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