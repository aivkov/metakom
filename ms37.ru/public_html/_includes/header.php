<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>ООО «Метаком Сервис» - Обслуживание, монтаж и ремонт домофонного оборудования, систем видеонаблюдения,
        СКУД</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Geometria:wght@300;700;800&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"/>
    <link rel="stylesheet" href="/css/style.css?v=7">
</head>
<body>
<header class="header">
    <div class="container header__container">
        <div class="header__left">
            <a class="header__logo logo" href="/">
                <img src="/img/logo.png" alt="Метаком-сервис">
            </a>
        </div>

        <div class="header__right">
            <div class="header__menu menu js-header-menu">
                <ul class="menu__list header__menu-list">
                    <li class="menu__item">
                        <a href="/news" class="menu__link">Новости</a>
                    </li>
                    <li class="menu__item">
                        <a href="/about-us" class="menu__link">О нас</a>
                    </li>
                    <li class="menu__item menu__item--parent js-parent-menu">
                        <a href="javascript:void(0)" class="menu__link js-parent-menu-btn">Услуги</a>
                        <ul class="menu__list menu__submenu js-submenu">
                            <li class="menu__item">
                                <a href="/domofon" class="menu__link">Домофон</a>
                            </li>
                            <li class="menu__item">
                                <a href="/umni-domofon" class="menu__link">Умный домофон</a>
                            </li>
                            <li class="menu__item">
                                <a href="/videonabludenie" class="menu__link">Видеонаблюдение</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="https://poverka-37.ru/" class="menu__link" target="_blank">Поверка счётчиков воды</a>
                    </li>
                    <li class="menu__item menu__item--parent js-parent-menu">
                        <a href="javascript:void(0)" class="menu__link js-parent-menu-btn">Оформить заявку</a>
                        <ul class="menu__list menu__submenu js-submenu">
                            <li class="menu__item">
                                <a href="#" class="menu__link" data-modal-open="feedback">Заявка на обслуживание</a>
                            </li>
                            <li class="menu__item">
                                <a href="#" class="menu__link" data-modal-open="call-us">Заявка на установку</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="/contacts" class="menu__link">Контакты</a>
                    </li>

                </ul>
                <div class="hamb js-toggle-menu"><i></i><i></i><i></i></div>
            </div>
            <div class="header__contacts">
                <a href="tel:+74932580359" class="header__phone js-location-phone">+7 (4932) 58-03-59</a>
                <a href="#" class="header__contacts-link" data-modal-open="call-us">Заказать звонок</a>
            </div>
        </div>


    </div>

    <div class="container header__container">
        <div class="header__location js-location">
            <span>📍</span>
            <span class="header__city js-location-city">Иваново</span>
            <img class="header__location-image" src="/img/arrow-down-icon.svg" alt="">
            <div class="header__location-popup js-location-popup">
                <ul>
                    <li class="js-location-city-select none" data-phone="+7 (4932) 58-03-59"
                        data-email="ivanovo@ms37.ru" data-schedule="Пн. – Пт. : с 9:00 до 18:00"
                        data-map="https://yandex.ru/map-widget/v1/?um=constructor%3AZ8yEavHHUzIyVS_HqJI-T0BVkH8oshmm&source=constructor"
                        data-id="ivn">Иваново
                    </li>
                    <li class="js-location-city-select" data-phone="+7 (49331) 5-77-54" data-email="kineshma@ms37.ru"
                        data-schedule="Пн. – Пт. : с 9:00 до 17:00"
                        data-map="https://yandex.ru/map-widget/v1/?um=constructor%3A381cad0ba02d8eb3995d91d3c246f23105218e588fff17704a02034c448d97d0&amp;source=constructor"
                        data-id="kshm">Кинешма
                    </li>
                </ul>
            </div>
        </div>

    </div>
</header>