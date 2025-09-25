<section class="section feedback" id="feedback">
    <div class="feedback__container container">
        <h2 class="feedback__title title">Оставить заявку</h2>
        <div class="feedback__wrap">
            <div class="feedback__left">
                <div class="feedback__desc">Заполните форму и мы свяжемся с Вами
                    в ближайшее время
                </div>
                <form class="feedback__form form js-ajax-form">
                    <input type="hidden" name="action" value="Form/sendFeedback">
                    <input type="hidden" name="ajax-callback" value="afterFormSend">
                    <div class="feedback__form-fields">
                        <div class="input-block">
                            <label class="input-block__label">Телефон <sup>*</sup></label>
                            <input type="text" name="phone" class="input-block__input" placeholder="+7 (___) ___-__-__"
                                   data-mask="phone" autocomplete="off" data-required >
                        </div>
                        <div class="input-block">
                            <label class="input-block__label">Имя <sup>*</sup></label>
                            <input type="text" name="name" class="input-block__input" placeholder="Ваше имя"
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
                            <label class="input-block__label">Заявка</label>
                            <textarea class="input-block__textarea input-block__input" name="comment"
                                      placeholder="Опишите, какую услугу Вы хотите получить"></textarea>
                        </div>
                    </div>
                    <div class="checkbox-block">
                        <input type="checkbox" id="feedback-main-agreement" class="checkbox-block__checkbox" checked data-input-policy>
                        <label for="feedback-main-agreement" class="label__agreement">Заполняя данную форму, Вы подтверждаете свое совершеннолетие и
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
            <div class="feedback__right">
                <div class="feedback__img">
                    <img src="/img/image-form.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>