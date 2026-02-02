<div class="modal modal-request" data-modal="request" tabindex="-1" role="dialog" on-close="remove">
    <div class="modal__inner modal__inner--request">
        <div class="modal__close" data-modal-close="request">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title">Заполните форму заявки</div>
        <form class="form js-ajax-form">
            <div>Здесь Вы можете обратиться к руководителю организации с любым вопросом: написать заявление, отзыв, жалобу,
                прислать файл. Обратите внимание, что если вы оставите свой e-mail, руководитель ответит Вам гораздо быстрее.</div>
            <input type="hidden" name="action" value="Form/sendRequest">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
            <input type="hidden" name="form-type" value="request">
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
                    <label class="input-block__label">Email</label>
                    <input type="text" name="email" class="input-block__input" placeholder="Ваше Email"
                           autocomplete="off">
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
                    <label class="input-block__label">Сообщение <sup>*</sup></label>
                    <textarea name="message" class="input-block__input input-block__input--textarea" placeholder="Задайте свой вопрос или опишите проблему"
                              autocomplete="off"></textarea>
                </div>
                <div class="input-block">
                    <input type="file" name="file">
                    <div class="input-block__hint">Не более 10 Мб</div>
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