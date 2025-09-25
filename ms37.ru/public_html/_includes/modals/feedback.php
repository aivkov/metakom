<div class="modal modal-feedback" data-modal="feedback" tabindex="-1" role="dialog">
    <div class="modal__inner modal__inner--feedback">
        <div class="modal__close" data-modal-close="feedback"><img src="/img/close.svg" alt=""></div>
        <div class="modal__title">Заполните форму заявки</div>
        <form class="feedback__form form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendFeedback">
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
                    <label class="input-block__label">Email <sup>*</sup></label>
                    <input type="text" name="email" class="input-block__input" placeholder="Ваш email"
                           autocomplete="off" data-required >
                </div>
                <div class="input-block">
                    <label class="input-block__label">Город <sup>*</sup></label>
                    <select class="input-block__select" name="city" data-required>
                        <option value="">---Выберите город---</option>
                        <option value="Иваново">Иваново</option>
                        <option value="Кинешма">Кинешма</option>
                    </select>
                </div>
                <div class="input-block">
                    <label class="input-block__label">Адрес <sup>*</sup></label>
                    <textarea name="address" class="input-block__input input-block__textarea input-block__textarea--address" placeholder="Адрес"
                    autocomplete="off" data-dadata="address" data-required></textarea>
                    <div class="input-block__dropdown js-dadata-dropdown">
                        <div class="input-block__dropdown-list js-dadata-dropdown-list"></div>
                    </div>
                </div>
                <div class="input-block">
                    <label class="input-block__label">Подъезд</label>
                    <input type="number" name="entrance" class="input-block__input" placeholder="Подъезд"
                           autocomplete="off">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Заявка</label>
                    <textarea class="input-block__textarea input-block__input" name="comment"
                              placeholder="Опишите, какую услугу Вы хотите получить"></textarea>
                </div>
            </div>
            <div class="checkbox-block">
                <input type="checkbox" id="feedback-modal-agreement" class="checkbox-block__checkbox" checked data-input-policy>
                <label for="feedback-modal-agreement" class="label__agreement">Заполняя данную форму, Вы подтверждаете свое совершеннолетие и
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