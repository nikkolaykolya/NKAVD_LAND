<!DOCTYPE html>
<html lang="ru">

<?php
//echo $_GET['page'];
//$fileString = file_get_contents('test.json');
?>

<head>
    <!-- Кодировка страници -->
    <meta charset="UTF-8">
    <title>NKAVD</title>


    <!-- Подключение CSS -->
    <link rel=" stylesheet" href="css/project.css">
    <!-- 	<link rel=" stylesheet" href="../../css/style.css"> -->
    <link rel=" stylesheet" href="css/complete.css">
    <link rel=" stylesheet" href="css/counter.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="viewport"
          content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi"/>
</head>

<body class="body">

<header class="header">
    <div class="header__wrapper">
        <div class="header__body">
            <div class="header__logo-name">
                <img src="img/header/logo.svg" alt="" class="header__img header__img_color_white">
                <img src="img/header/logo-dark.svg" alt="" class="header__img header__img_color_dark">
                <div class="header__name">
                    <span>NKAVD</span>
                </div>
            </div>
            <nav class="header__menu-left">
                <div class="header__menu">
                    <ul class="header__list">
                        <li><a href="index.html" class="header__link">Главная</a></li>
                        <!--
                        <li><a href="#partners" class="header__link">Партнёры</a></li>
                        <li><a href="#guarantee" class="header__link">Гарантия</a></li>
                        <li><a href="#stages" class="header__link">Этапы работы</a></li> -->
                        <li><a href="" class="header__link">Портфолио</a></li>
                        <li>
                            <div class="header__line"></div>
                        </li>
                        <li>
                            <div class="header__numder">
                                <div>
                                    <a href="tel:+380974643434">+38 (097)-464-34-34</a>
                                </div>
                                <div>
                                    <a href="tel:+380954643434">+38 (095)-464-34-34</a>
                                </div>
                                <div>
                                    <a href="tel:+380634643434">+38 (063)-464-34-34</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="header__list-subtitle">
                        Свяжитесь с нами прямо сейчас и получите скидку!
                    </div>
                    <a href="#fill-form" class="fill-form header__fill-form">
                        <button class="header__list-button">
                            <div>
									<span>
										Заказать сайт
									</span>
                            </div>
                        </button>
                    </a>
                    <div class="header__network">
                        <a class="header__network_link header__network_inst" target="_blank"
                           href="https://www.instagram.com/nkavd/?hl=ru">
                            <img class="header_inst_dark" src="img/footer/inst_d.svg" alt="">
                        </a>
                        <a class="header__network_link header__network_tele" target="_blank"
                           href="https://t.me/nkavd_dev">
                            <img class="header_tele_yellow" src="img/footer/tele_d.svg" alt="">
                        </a>
                    </div>
                </div>
            </nav>
            <div class="header__burger">
                <span></span>
            </div>
            <div class="header__phone-question">
                <div class="header__phone">
                    <div class="header__phone_img"></div>
                    <div class="dropdown_phones">
                        <a href="tel:+380974643434">+38 (097)-464-34-34</a>
                        <a href="tel:+380954643434">+38 (095)-464-34-34</a>
                        <a href="tel:+380634643434">+38 (063)-464-34-34</a>
                    </div>
                </div>
                <a href="#fill-form" class="fill-form">
                    <button class="header__question" id="button">
                        <div id="circle"></div>
                        <span>Задать вопрос</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>

<figure class="figure_container">
    <figure class="figure_first" data-rellax-speed="-7"></figure>
    <figure class="figure_second" data-rellax-speed="-7"></figure>
    <figure class="figure_third" data-rellax-speed="-7"></figure>
    <figure class="figure_fourth" data-rellax-speed="-7"></figure>
    <figure class="figure_fifth" data-rellax-speed="-7"></figure>
</figure>
<div class="block1" id="home">
    <div class="block1__background" id="Visual2"></div>
</div>

<div class="block2">
    <div class="block2__wrapper">
        <h2 class="heading block2__heading">
            CRM System - создание универсального приложения для контроля работы команды
        </h2>
        <div class="block2__slider-box">
            <div class="block2__content-slider swiper-container">
                <div class="block2__content-wrapper swiper-wrapper">

                    <div class="block2__content-box swiper-slide">
                        <picture>
                            <source srcset="project/img/block2/slide1.png" type="image/png">
                            <img class="block2__box_img" src="project/img/block2/slide1.webp">
                        </picture>
                    </div>
                    <div class="block2__content-box swiper-slide">
                        <picture>
                            <source srcset="project/img/block2/slide1.png" type="image/png">
                            <img class="block2__box_img" src="project/img/block2/slide1.webp">
                        </picture>
                    </div>
                    <div class="block2__content-box swiper-slide">
                        <picture>
                            <source srcset="project/img/block2/slide1.png" type="image/png">
                            <img class="block2__box_img" src="project/img/block2/slide1.webp">
                        </picture>
                    </div>
                    <div class="block2__content-box swiper-slide">
                        <picture>
                            <source srcset="project/img/block2/slide1.png" type="image/png">
                            <img class="block2__box_img" src="project/img/block2/slide1.webp">
                        </picture>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<div class="block2__text">
    <p class="block2__title">
        Бизнес:
    </p>
    <p class="block2__subtitle">
        Группа проектно-строительных компаний ООО ”Промагропроект”. Группа компаний выполняет комплексное
        проектирование и строительство объектов жилищного, гражданского назначения, предприятий агропромышленного
        комплекса.
    </p>
    <p class="block2__title">
        Цель:
    </p>
    <p class="block2__subtitle">
        Создание системы контроля и администрирования работы сотрудников, внедрение возможности работы удалённо
    </p>
    <p class="block2__title">
        Регион:
    </p>
    <p class="block2__subtitle">
        Укрнаина
    </p>
</div>
<!-- Блок 3 -->
<div class="result">
    <div class="resalt__wrapper">
        <h2 class="heading resalt__heading">
            РЕЗУЛЬТАТЫ
        </h2>
        <div class="resalt__block-map">
            <div class="resalt__block_left">
                <div class="resalt__box">
                    <div class="resalt__box_block">
                        <h5>Бюджет</h5>
                        <span>16000$</span>
                    </div>
                </div>
                <div class="resalt__box">
                    <p>Создана актуальная и наглядная аналитика</p>
                </div>
            </div>
            <div class="resalt__block_right">
                <div class="resalt__box">
                    <p>Повышение точности прогнозирования продаж на <br> 50%</p>
                </div>
                <div class="resalt__box">
                    <p>Открылась возможность сотрудникам работать удаленно</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Блок 4 -->
<div class="tasks">
    <div class="tasks__wrapper">
        <h2 class="heading heading__tasks">
            ЗАДАЧИ
        </h2>
        <div class="tasks__box">
            <div class="tasks__block">
                <p>
                    Создание отдельного приложения для администратора
                </p>
            </div>
            <div class="tasks__block">
                <p>
                    Внедрение нишевых решений для создания более гибкого и удобного приложения
                </p>
            </div>
            <div class="tasks__block">
                <p>
                    Интегрировать месенджер внутри приложения
                </p>
            </div>
            <div class="tasks__block">
                <p>
                    Распределение доступов внутри приложения по ролям пользователя
                </p>
            </div>
            <div class="tasks__block">
                <p>
                    Внедрение аналитики по каждому пользователю, группам пользователей
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Блок 5 -->
<div class="complexity">
    <div class="complexity__wrapper">
        <h2 class="heading heading__complexity">
            СЛОЖНОСТИ
        </h2>
        <div class="complexity__box">
            <div class="complexity__colomn">
                <div class="complexity__numder"><span>1</span></div>
                <p>
                    Мы не понимали как адаптировать приложение под долгосрочные
                    задачи, которые невозможно разбить намелкие подзадачи
                </p>
            </div>
            <div class="complexity__colomn">
                <div class="complexity__numder"><span>2</span></div>
                <p>
                    Перевод сотрудников на работу в CRM
                    без потери скорости работы на этапе освоения приложения.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Блок решение -->
<div class="solution">
    <div class="solution__wrapper">
        <h2 class="heading heading__solution">
            РЕШЕНИЕ
        </h2>
        <p>
            До внедрения CRM-системы в отделах не было чёткого распредиления задач для каждого сотрудника. Детально
            изучив процессы, мы разработали инструменты для чёткого распределения задач по проектам, улучшили
            возможности планирования по всем типовым проектам.
        </p>
    </div>
</div>

<!-- Блок реализация -->

<div class="realization">
    <div class="realization__wrapper">
        <h2 class="heading heading__realization">
            РЕАЛИЗАЦИЯ
        </h2>
        <div class="realization__box">
            <p>
                Мы создали индивидуальную CRM-систему, которая закрыла потребности операцинонных-процессов компании.
            </p>
            <p>
                Благодаря автоматизации рабочего процесса усилилась возможность планирования, повысились показатели
                продуктивности сотрудников на 40%.
            </p>
            <p>
                Сотрудники получили возможность работать удаленно.
            </p>
            <p>
                Мы всегда на связи с заказчиком и при необходимости дорабатываем новый функционал.
            </p>
        </div>
    </div>
</div>

<div class="block6" id="portfolio">
    <h2 class="heading heading__portfolio">
        СМОТРЕТЬ ДРУГИЕ ПРОЕКТЫ
    </h2>
    <div class="block6__wrapper">
        <div class="block6__box">

            <picture>
                <source srcset="img/block6/BollBerry.png" type="image/png">
                <img class="block6__box_img" src="img/block6/BollBerry.webp">
            </picture>


            <div class="block6__text">
                <a href="" class="block6__transition-top">
                    <div>
                        <img src="img/block6/Info.svg" alt="" class="block6__transition-img">
                        <p>
                            Подробнее
                        </p>
                    </div>
                </a>
                <div class="block6__transition-bottom">
						<span>
							BollBerry - разработка бренда под ключ. Фирменный стиль, брендбук, гайдлайн, корпоративный сайт.
						</span>
                </div>
            </div>
        </div>
        <div class="block6__box">

            <picture>
                <source srcset="img/block6/War_Valley.png" type="image/png">
                <img class="block6__box_img" src="img/block6/War_Valley.webp">
            </picture>

            <div class="block6__text">
                <a href="" class="block6__transition-top">
                    <div>
                        <img src="img/block6/Info.svg" alt="" class="block6__transition-img">
                        <p>
                            Подробнее
                        </p>
                    </div>
                </a>
                <div class="block6__transition-bottom">
						<span>
							War Valley - мобильная игра. Гейм-дизайн и проработка локаций, публикация игры под ключ.
						</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block7" id="fill-form">
    <div class="block7__wrapper">
        <div class="block7__text">
            <div class="block7__text-title">
                ХОТИТЕ ТАК ЖЕ?
            </div>
            <div class="block7__text-quotes">
					<span>
						”
					</span>
            </div>
            <div class="block7__text-subtitle">
                Расскажите нам подробнее о своих бизнесс-целях, и мы поможем воплотить их в жизнь!
            </div>
        </div>
        <div class="block7__form">
            <form name="leadsForm" action="api/create_deal.php" method="post" enctype="multipart/form-data">
                <div class="block7__username">
                    <input class="_req" placeholder="Имя *" type="text" name="name" value="" required/>
                </div>
                <div class="block7__number">
                    <input name="phone" type="tel" pattern="^\+[0-9]{2}\((\d+)\)\d{3}-\d{2}-\d{2}" required="required">
                </div>
                <div class="block7__description">
                    <input placeholder="Опишите проект (не обязательно)" type="text" name="description" value=""/>
                </div>
                <div class="block7__button" id="button">
                    <button class="block__button" type="submit" id="form">
                        <div class="block__button_desktop-text desktop">
                            <div id="circle"></div>
                            <span>
									Обсудить проект
								</span>
                        </div>
                        <div class="block__button_mobile-text mobile">
                            <div id="circle"></div>
                            <span>
									Заказать сайт
								</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<footer class="footer">
    <div class="footer__wrapper">
        <div class="footer__border-box">
            <div class="footer__colomn footer__colomn_left">
                <div class="footer__logo-img">
                    <img src="img/header/logo.svg" alt="" class="header__img">
                    <div class="footer__logo">
                        NKAVD
                    </div>
                </div>
                <div class="footer__text">
                    Реализуем сложные и смелые веб-проекты
                </div>
            </div>

            <div class="footer__center">
                <div class="footer__center-nomder">
                    <div class="footer__phone">
                        <a href="tel:+380974643434">+38 (097)-464-34-34</a>
                    </div>
                    <div class="footer__phone">
                        <a href="tel:+380954643434">+38 (095)-464-34-34</a>
                    </div>
                    <div class="footer__phone">
                        <a href="tel:+380634643434">+38 (063)-464-34-34</a>
                    </div>
                </div>
                <div class="footer__network">
                    <a class="network network_inst" target="_blank" href="https://www.instagram.com/nkavd/?hl=ru">
                        <img class="inst_yellow" src="img/footer/inst_y.svg" alt="">
                        <img class="inst_dark" src="img/footer/inst_y_w.svg" alt="">
                    </a>
                    <a class="network network_tele" target="_blank" href="https://t.me/nkavd_dev">
                        <img class="tele_yellow" src="img/footer/tele_y.svg" alt="">
                        <img class="tele_dark" src="img/footer/tele_y_w.svg" alt="">
                    </a>
                </div>
                <div class="footer__email">
                    <a href="mailto:manager@nkavd.com">manager@nkavd.com</a>
                </div>
            </div>
            <div class="footer__colomn footer__colomn_right">
                <div class="footer__column_right-text">
                    <div>
                        Наши специалисты решат любой ваш вопрос! <br> Мы на связи с 9:00 до 18:00 GMT +2
                    </div>
                </div>
                <a href="#fill-form" class="fill-form footer__link_fill-form">
                    <button class="block__button footer-button" id="button">
                        <div class="block__button_desktop-text ">
                            <div id="circle"></div>
                            <span>
									Задать вопрос
								</span>
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <div class="footer__address">
            <a target="_blank" href="https://goo.gl/maps/RiiFhzcRmnZCu92h6">Харьков, улица Тобольская
                42</a>
        </div>
        <a class="link" href="NKAVD.COM">NKAVD.COM</a>
    </div>
</footer>
<!--Подключение Js-->
<script type="text/javascript" src="js/cloudflare.js"></script>
<script type="text/javascript" src="js/jsdelivr.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script>
    ScrollReveal().reveal('.block2', {
        delay: 150
    });
    ScrollReveal().reveal('.block2__partners', {
        delay: 150
    });
    ScrollReveal().reveal('.block3', {
        delay: 150
    });
    ScrollReveal().reveal('.block4', {
        delay: 150
    });
    ScrollReveal().reveal('.block5', {
        delay: 150
    });
    ScrollReveal().reveal('.block6', {
        delay: 150
    });
    ScrollReveal().reveal('.block7', {
        delay: 150
    });
</script>
<script>
    let phoneMatrix;

    class TelephoneMatrix {

        constructor(placeholder, input) {
            this.input = input;
            input.placeholder = placeholder;
            this.placeholder = input.placeholder;
            this.phoneIsValid = () => {
                return this.input.value.replace(/\D/g, "").length === this.expectedDigitsCount;
            };
            this.lastPhoneValue = "";

            this.expectedDigitsCount = placeholder.replace(/\D/g, '').length + (placeholder.match(/_/g) || []).length;
        }

        init() {
            this.input.addEventListener("input", e => this.mask(e), false);
            this.input.addEventListener("focus", () => {
                this.handleFieldSelection();
            });
            this.input.addEventListener("click", () => {
                this.handleFieldSelection();
            });
        }

        handleFieldSelection() {
            if (this.input.value.length === 0) {
                this.input.value = this.placeholder;
            }
            let cursorPosition = this.input.value.indexOf('_');
            cursorPosition = cursorPosition === -1 ? this.input.value.length : cursorPosition;
            this.setCursorPosition(cursorPosition, this.input);
        }

        mask(e) {

            let matrix = this.placeholder;
            let i = 0;
            let def = matrix.replace(/\D/g, "");
            let val = this.input.value.replace(/\D/g, "");

            def.length >= val.length && (val = def);

            matrix = matrix.replace(/[_\d]/g, function (a) {
                return val.charAt(i++) || "_"
            });
            if (val.length > this.expectedDigitsCount) {
                this.input.value = this.lastPhoneValue;
                return;
            } else document.querySelector("#form").reportValidity();

            console.log(this.phoneIsValid());
            this.input.value = matrix;
            this.lastPhoneValue = this.input.value;

            i = matrix.lastIndexOf(val.substr(-1));
            i < matrix.length && matrix !== this.placeholder ? i++ : i = matrix.indexOf("_");
            this.setCursorPosition(i, this.input)
        }

        setCursorPosition(pos, e) {
            console.log("focused");
            e.focus();
            if (e.setSelectionRange) e.setSelectionRange(pos, pos);
            else if (e.createTextRange) {
                let range = e.createTextRange();
                range.collapse(true);
                range.moveEnd("character", pos);
                range.moveStart("character", pos);
                range.select()
            }
        }
    }

    window.addEventListener("DOMContentLoaded", function () {
        let phone = document.forms["leadsForm"]['phone'];
        phoneMatrix = new TelephoneMatrix("+38(___)___-__-__", phone);
        phoneMatrix.init();
    });

    ScrollReveal().reveal('.block2', {delay: 150});
    ScrollReveal().reveal('.block2__partners', {delay: 150});
    ScrollReveal().reveal('.block3', {delay: 150});
    ScrollReveal().reveal('.block4', {delay: 150});
    ScrollReveal().reveal('.block5', {delay: 150});
    ScrollReveal().reveal('.block6', {delay: 150});
    ScrollReveal().reveal('.block7', {delay: 150});

    let rellax = [
        new Rellax('.figure_first'),
        new Rellax('.figure_second'),
        new Rellax('.figure_third'),
        new Rellax('.figure_fourth'),
        new Rellax('.figure_fifth'),
    ];

</script>
</body>

</html>