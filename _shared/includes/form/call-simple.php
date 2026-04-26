<?php use Ms\Site;
$arCities = Site::getCities();
$arCities = array_unique($arCities);
?>

<form class="form js-ajax-form">
    <input type="hidden" name="action" value="Form/sendCall">
    <input type="hidden" name="ajaxCallback" value="afterFormSend">
    <input type="hidden" name="form-type" value="call">
    <div class="form__fields">
        <?php /*
        <div class="input-block">
            <label class="superbold">Имя <sup>*</sup></label>
            <input type="text" name="name" class="input-block__input" placeholder="Ваше имя"
                   autocomplete="off" data-required="">
        </div>
 */?>
        <div class="input-block">
            <label class="superbold">Телефон <sup>*</sup></label>
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