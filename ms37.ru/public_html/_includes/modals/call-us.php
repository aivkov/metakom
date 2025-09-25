<div class="modal modal-call-us" data-modal="call-us" tabindex="-1" role="dialog">
    <div class="modal__inner modal__inner--call-us">
        <div class="modal__close" data-modal-close="call-us"><img src="/img/close.svg" alt=""></div>
        <div class="modal__title">Заполните форму заявки</div>
        <form class="feedback__form form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendCallUs">
            <input type="hidden" name="ajax-callback" value="afterFormSend">
            <div class="feedback__form-fields">
                <div class="input-block">
                    <label class="input-block__label">Имя <sup>*</sup></label>
                    <input type="text" name="name" class="input-block__input" placeholder="Ваше имя"
                           autocomplete="off" data-required >
                </div>
                <div class="input-block">
                    <label class="input-block__label">Телефон <sup>*</sup></label>
                    <input type="text" name="phone" class="input-block__input" placeholder="+7 (___) ___-__-__"
                           data-mask="phone" autocomplete="off" data-required >
                </div>
                <div class="input-block">
                    <label class="input-block__label">Город <sup>*</sup></label>
                    <select class="input-block__select" name="city" data-required>
                        <option value="">---Выберите город---</option>
                        <option value="Иваново" selected>Иваново</option>
                        <option value="Кинешма">Кинешма</option>
                    </select>
                </div>
            </div>
            <div class="checkbox-block">
                <input type="checkbox" id="call-us-agreement" class="checkbox-block__checkbox" checked data-input-policy>
                <label for="call-us-agreement" class="label__agreement">Заполняя данную форму, Вы подтверждаете свое совершеннолетие и
                    соглашаетесь
                    на обработку персональных данных в соответствии с Условиями.</label>
            </div>
            <div class="form__message form__message--success js-form-success"></div>
            <div class="form__footer">
                <div class="form__message form__message--error js-form-error"></div>
                <button class="form__submit btn" type="submit">Отправить</button>
            </div>

        </form>
    </div>
</div>