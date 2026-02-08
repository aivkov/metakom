<div class="modal modal-request" data-modal="request" tabindex="-1" role="dialog">
    <div class="modal__inner modal__inner--request">
        <div class="modal__close" data-modal-close="request">
            <img src="/local/img/icons/close.svg" alt="">
        </div>
        <div class="modal__title">Заполните форму заявки</div>
        <form class="form js-ajax-form">
            <div>Здесь Вы можете запросить выписку по лицевому счету, указав Ваш адрес или лицевой счет.
                Выписка придет Вам в виде Excel-файла на указанную электронную почту.</div>
            <input type="hidden" name="action" value="Form/sendRequest">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
            <input type="hidden" name="form-type" value="request">
            <div class="form__fields">
                <div class="input-block">
                    <label class="input-block__label">Адрес</label>

                    <textarea name="address" class="input-block__input input-block__input--textarea" placeholder="Начните вводить адрес"
                              data-dadata="address" autocomplete="off"></textarea>
                    <div class="input-block__dropdown js-dadata-dropdown">
                        <div class="input-block__dropdown-list js-dadata-dropdown-list"></div>
                    </div>
                </div>
                <div class="input-block">
                    <label class="input-block__label">Лицевой счет</label>
                    <input type="text" name="personal-account" class="input-block__input" placeholder="Ваш лицевой счет"
                           autocomplete="off">
                </div>
                <div class="input-block">
                    <label class="input-block__label">Email <sup>*</sup></label>
                    <input type="text" name="email" class="input-block__input" placeholder="Ваше Email"
                           autocomplete="off" data-required="">
                </div>
            </div>

            <?php $APPLICATION->IncludeFile('/includes/form/policy.php')?>

            <div class="form__footer">
                <div class="form__message form__message--error js-form-error"></div>
                <button class="form__submit btn btn--fullwidth" type="submit">Отправить</button>
            </div>

        </form>

    </div>
</div>