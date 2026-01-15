<?php
use Ms\Tools;
use Ms\Site;
$addresses = Site::getAddresses();
?>

<div class="contacts-block container">
    <div class="feedback">
        <h2 class="section__title title">Оформить заявку</h2>
        <form class="feedback__form js-ajax-form">
            <input type="hidden" name="action" value="Form/sendCall">
            <input type="hidden" name="ajaxCallback" value="afterFormSend">
            <div class="feedback__desc">Оставьте заявку и мы свяжемся с Вами в ближайшее время</div>
            <div class="form__fields">
                <div class="input-block">
                    <input type="text" name="name" class="input-block__input" placeholder="Имя *">
                </div>
                <div class="input-block">
                    <input type="text" name="phone" class="input-block__input" placeholder="Телефон *"
                           data-mask="phone" autocomplete="off" data-required="">
                </div>
                <div class="input-block">
                    <input type="text" name="message" class="input-block__input" placeholder="Комментарий">
                </div>

                <?php $agreement = $_SERVER['DOCUMENT_ROOT'] . '/docs/agreement.pdf';
                $policy = $_SERVER['DOCUMENT_ROOT'] . '/docs/policy.pdf';?>
                <div class="form__fields form__fields--policy">
                    <div class="checkbox">
                        <input type="checkbox" id="call-us-agreement-footer" class="checkbox__input" checked data-checkbox-policy>
                        <label for="call-us-agreement-footer" class="checkbox__label checkbox__label--policy">
                            <span class="checkbox__policy-text">
                                 <span>Я соглашаюсь с <a href="#" class="link" download>обработкой персональных данных</a></span>
                                <span>и <a href="#" class="link" download>условиями пользовательких соглашений</a></span>
                            </span>
                            <div class="checkbox__icon"></div>
                        </label>
                    </div>
                </div>

                <div class="form__footer">
                    <div class="form__message form__message--error js-form-error"></div>
                    <button class="form__submit btn btn--fullwidth btn--accent" type="submit">Отправить</button>
                </div>
            </div>

        </form>
    </div>
    <div id="contacts"  class="contacts">
        <h2 class="title contacts__title">Контакты</h2>
        <div class="contacts__list">
            <?php if($phones = Site::getPhones()):?>
                <div class="contacts__item">
                    <?php if(count($phones) > 1):?>
                        <div>Телефоны</div>
                    <?php else:?>
                        <div>Телефон</div>
                    <?php endif?>
                    <?php foreach($phones as $phone):?>
                        <div class="extrafont"><a href="tel:<?=Tools::phoneToTel($phone['phone'])?>" class="link"><?=$phone['phone']?></a></div>
                    <?php endforeach?>
                </div>
            <?php endif?>
            <?php if($emails = Site::getEmails()):?>
                <div class="contacts__item">
                    <div>Email</div>
                    <?php foreach($emails as $email):?>
                        <div class="extrafont"><a href="mailto:<?=$email?>" class="link"><?=$email?></a></div>
                    <?php endforeach?>
                </div>
            <?php endif?>
            <?php if($schedule = Site::getSchedule()):?>
                <div class="contacts__item">
                    <div>Время работы</div>
                </div>
            <?php endif?>
            <?php if($addresses = Site::getAddresses()):?>
                <div class="contacts__item">
                    <div>Главный офис</div>
                    <?php foreach($addresses as $address):?>
                        <div class="extrafont"><?=$address?></div>
                    <?php endforeach?>
                </div>
            <?php endif?>
            <?php if($socials = Site::getSocial()):?>
                <div class="contacts__item">
                    <div>Наши соцсети</div>
                    <div class="contacts__social social">
                        <?php foreach($socials as $social):?>
                            <a href="<?=$social['link']?>">
                                <img src="/local/img/mobis/social/accent/<?=$social['icon']?>" alt="">
                            </a>
                        <?php endforeach?>
                    </div>
                </div>
            <?php endif?>
        </div>

    </div>
</div>