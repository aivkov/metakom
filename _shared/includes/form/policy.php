<?php $agreement = $_SERVER['DOCUMENT_ROOT'] . '/docs/agreement.pdf';
$policy = $_SERVER['DOCUMENT_ROOT'] . '/docs/policy.pdf';
$form = $arParams['FORM'];
?>

<div class="form__fields form__fields--policy">
    <?php if(file_exists($agreement)):?>
        <div class="checkbox">
            <input type="checkbox" id="<?=$form?>-agreement" class="checkbox__input" checked data-checkbox-policy>
            <label for="<?=$form?>-agreement" class="checkbox__label checkbox__label--policy">
                <span>Я даю согласие на <a href="/docs/agreement.pdf" download>обработку персональных данных</a></span>
                <div class="checkbox__icon"></div>
            </label>
        </div>
    <?php else:?>
        <div class="checkbox">
            <input type="checkbox" id="<?=$form?>-agreement" class="checkbox__input" checked data-checkbox-policy>
            <label for="<?=$form?>-agreement" class="checkbox__label checkbox__label--policy">
                    <span>Заполняя данную форму, Вы подтверждаете свое совершеннолетие и соглашаетесь
                    на обработку персональных данных в соответствии с Условиями.</span>
                <div class="checkbox__icon"></div>
            </label>
        </div>
    <?php endif?>

    <?php if(file_exists($policy)):?>
        <div class="checkbox">
            <input type="checkbox" id="<?=$form?>-policy" class="checkbox__input" checked data-checkbox-policy>
            <label for="<?=$form?>-policy" class="checkbox__label checkbox__label--policy">
                <span>Я ознакомлен(а) с <a href="/docs/policy.pdf" download>политикой конфиденциальности</a></span>
                <div class="checkbox__icon"></div>
            </label>
        </div>
    <?php endif?>
</div>