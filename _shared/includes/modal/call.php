<div class="modal modal-call" data-modal="call" tabindex="-1" role="dialog" on-close="remove">
    <div class="modal__inner modal__inner--call">
        <div class="modal__close" data-modal-close="call">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title">Заполните форму заявки</div>
        <form class="form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendCall">
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
            </div>
            <?php $agreement = $_SERVER['DOCUMENT_ROOT'] . '/docs/agreement.pdf';
                $policy = $_SERVER['DOCUMENT_ROOT'] . '/docs/policy.pdf';?>

            <div class="form__fields form__fields--policy">
                <?php if(file_exists($agreement)):?>
                    <div class="checkbox">
                        <input type="checkbox" id="call-us-agreement" class="checkbox__input" checked data-checkbox-policy>
                        <label for="call-us-agreement" class="checkbox__label checkbox__label--policy">
                            <span>Я даю согласие на <a href="/docs/agreement.pdf" download>обработку персональных данных</a></span>
                            <div class="checkbox__icon"></div>
                        </label>
                    </div>
                <?php else:?>
                    <div class="checkbox">
                        <input type="checkbox" id="call-us-agreement" class="checkbox__input" checked data-checkbox-policy>
                        <label for="call-us-agreement" class="checkbox__label checkbox__label--policy">
                    <span>Заполняя данную форму, Вы подтверждаете свое совершеннолетие и соглашаетесь
                    на обработку персональных данных в соответствии с Условиями.</span>
                            <div class="checkbox__icon"></div>
                        </label>
                    </div>
                <?php endif?>

                <?php if(file_exists($policy)):?>
                    <div class="checkbox">
                        <input type="checkbox" id="call-us-policy" class="checkbox__input" checked data-checkbox-policy>
                        <label for="call-us-policy" class="checkbox__label checkbox__label--policy">
                            <span>Я ознакомлен(а) с <a href="/docs/policy.pdf" download>политикой конфиденциальности</a></span>
                            <div class="checkbox__icon"></div>
                        </label>
                    </div>
                <?php endif?>
            </div>

            <div class="form__footer">
                <div class="form__message form__message--error js-form-error"></div>
                <button class="form__submit btn btn--fullwidth" type="submit">Отправить</button>
            </div>

        </form>

    </div>
</div>