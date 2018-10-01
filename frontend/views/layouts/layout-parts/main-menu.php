<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
                    <ul class="b-menu b-menu--left">
                        <li class="b-menu__item">
                            <a class="dropdown-button b-menu__dropdown" href="#!" data-activates='services' data-constrainwidth="false">
                                Меню
                                <span class="icon-triangle-down"></span>
                            </a>
                            <ul id="services" class="dropdown-content b-submenu">
                                <li class="b-submenu__item">
                                    <a href="/services/auto">
                                        <span class="b-submenu__icon b-submenu__icon--car"></span>
                                        Автомобили
                                    </a>
                                    <ul class="b-submenu">
                                        <li class="b-submenu__item">
                                            <a href="/osago">ОСАГО</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/osago/calculator">Калькулятор ОСАГО</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/kasko">КАСКО</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/moto-kasko/calculator">Калькулятор МОТО-КАСКО</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/green-card">Зеленая Карта</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/green-card/calculator">Калькулятор Зеленая Карта</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="b-submenu__item">
                                    <a href="/services/health">
                                        <span class="b-submenu__icon b-submenu__icon--swimming"></span>
                                        Здоровье
                                    </a>
                                    <ul class="b-submenu">
                                        <li class="b-submenu__item">
                                            <a href="/tourism">Туризм</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/tourism/calculator">Калькулятор туризм</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/health">Медицинское страхование</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/accident">Несчастный случай</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="divider b-submenu__item"></li>
                                <li class="divider b-submenu__item"></li>
                                <li class="b-submenu__item">
                                    <a href="/services/property">
                                        <span class="b-submenu__icon b-submenu__icon--house"></span>
                                        Недвижимость
                                    </a>
                                    <ul class="b-submenu">
                                        <li class="b-submenu__item">
                                            <a href="/apartment">Квартира</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/house">Частный дом</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="b-submenu__item">
                                    <a href="/services/responsibility">
                                        <span class="b-submenu__icon b-submenu__icon--hands"></span>
                                        Ответственность
                                    </a>
                                    <ul class="b-submenu">
                                        <li class="b-submenu__item">
                                            <a href="/neighbors">Перед соседями</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/professional">Профессиональная</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/weapon">Владельца оружия</a>
                                        </li>
                                        <li class="b-submenu__item">
                                            <a href="/dog">Владельцев собак</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="divider b-submenu__item b-submenu__item--large"></li>
                                <li class="divider b-submenu__item b-submenu__item--large"></li>
                                <li class="b-submenu__item b-submenu__item--large">
                                    <?= Html::a('Для бизнеса', '/for-business')?>
                                </li>
                                <li class="b-submenu__item b-submenu__item--large">
                                    <?= Html::a('О нас', '/about')?>
                                </li>
                                <li class="b-submenu__item b-submenu__item--large">
                                    <?= Html::a('Контакты', '/contacts')?>
                                </li>
                            </ul>
                        </li>
                        <li class="b-menu__item b-menu__item--large">
                            <?= Html::a('Для бизнеса', '/for-business/')?>
                        </li>
                        <li class="b-menu__item b-menu__item--large">
                            <a href="/about">О нас</a>
                        </li>
                        <li class="b-menu__item b-menu__item--large">
                            <a href="/contacts">Контакты</a>
                        </li>
                        <li class="b-menu__item">
                            <button type="button" class="btn-floating waves-effect waves-light modal-trigger b-menu__call-back" data-target="callback"><span class="icon-phone"></span></button>
                        </li>
                        <li class="b-menu__item">
                            <a href="tel:0800758758" class="b-menu__call-link">0 800-758-758</a>
                        </li>
                    </ul>
