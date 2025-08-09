<div class="modal modal-order" data-modal="order" tabindex="-1" role="dialog" on-close="remove">
    <div class="modal__inner modal__inner--order">
        <div class="modal__close" data-modal-close="order">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title">Заполните форму заявки</div>
        <form class="form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendOrder">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
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

                <div class="input-block">
                    <label class="input-block__label">Email <sup>*</sup></label>
                    <input type="text" name="email" class="input-block__input" placeholder="Ваше Email"
                           autocomplete="off" data-required="">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Адрес <sup>*</sup></label>

                    <textarea name="address" class="input-block__input input-block__input--textarea" placeholder="Начните вводить адрес"
                               data-dadata="address" autocomplete="off" data-required=""></textarea>
                    <div class="input-block__dropdown js-dadata-dropdown">
                        <div class="input-block__dropdown-list js-dadata-dropdown-list"></div>
                    </div>
                </div>
                <div class="input-block">
                    <label class="input-block__label">Подъезд <sup>*</sup></label>

                    <input type="number" name="entrance" class="input-block__input" placeholder="Подъезд"
                           autocomplete="off" data-required="">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Сообщение <sup>*</sup></label>
                    <textarea name="message" class="input-block__input input-block__input--textarea" placeholder="Опишите, какую услугу вы хотите получить"
                              autocomplete="off"></textarea>
                </div>
            </div>

            <div class="checkbox">
                <input type="checkbox" id="call-us-agreement" class="checkbox__input" checked data-checkbox-policy>
                <label for="call-us-agreement" class="checkbox__label checkbox__label--policy">
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

    </div>
</div>