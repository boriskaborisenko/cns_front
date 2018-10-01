<?php
namespace frontend\helpers;

use Yii;
use common\helpers\ArrayHelperApi;
use common\models\Cities;
use yii\helpers\Url;

class HtmlCns extends \yii\helpers\Html
{
    public static function factorSelect ($factor, $params = []) 
    {
        $selected = self::currentSelected($factor, $params);
                
        return  parent::dropDownList(
                    $factor->alias, 
                    $selected, 
                    ArrayHelperApi::selectOptions($factor->values),
                    []).
                parent::label(\Yii::t('factors', $factor->alias).":");
    }

    public static function factorSelectAutoType ($factor, $params = []) 
    {
        $selected = self::currentSelected($factor, $params);
        
        return  parent::dropDownList(
                    $factor->alias, 
                    $selected, 
                    ArrayHelperApi::autoOptgroups($factor->values),
                    [
                        'groups' => [
                            'Легковые' => [
                                'data-img' => '/img/icons/car.svg'
                            ],
                            'Грузовые' => [
                                'data-img' => '/img/icons/truck.svg'
                            ],
                            'Мотоциклы' => [
                                'data-img' => '/img/icons/bike.svg'
                            ],
                            'Прицепы' => [
                                'data-img' => '/img/icons/caravan.svg'
                            ],
                            'Автобусы' => [
                                'data-img' => '/img/icons/bus.svg'
                            ]
                        ],
                        'class' => 'js-optgroup'
                    ]).
                parent::label($factor->name.":");
    }    

    public static function factorSelectPlace ($factor, $params = []) 
    {
        $selected = self::currentSelected($factor, $params);
        
        $city_data = Cities::getSpecifiedCity();
        
        if(!empty($city_data['selected'])) {
               $selected = $city_data['selected'];
            }
        
        if (Yii::$app->cities->isCityCalculator && Yii::$app->cities->city) {
            $city_data['city'] = Yii::$app->cities->city->name_ru;
            $city_data['koatuu'] = Yii::$app->cities->city->koatuu;
            $selected = Yii::$app->cities->city->zone_alias;
        }
        
        return  parent::tag('div',
                    parent::input('text','registration_city',$city_data['city'],['class'=>'js-city osago-offers-form__city_input','placeholder'=>'Город регистрации ТС', 'required' => 'required']).
                    parent::input('text','mesto_registratsii',$selected,['hidden'=>'hidden']).
                    parent::input('text','koatuu',$city_data['koatuu'],['hidden'=>'hidden']),
                    ['class'=>'select-wrapper']).
                parent::label(\Yii::t('factors', $factor->alias).":");
    }     
    
    public static function currentSelected ($factor, $params = []) 
    {
        $get = \Yii::$app->request->get();
        if (!empty($get[$factor->alias])) {
            $selected = $get[$factor->alias];
        } elseif(isset($params['selected'])) {
            $selected = $params['selected'];
        } else {
            $selected = reset($factor->values)->alias;
        }
        return  $selected;
    }
    
    public static function currentSelectedDate ($factor, $params = []) 
    {
        $get = \Yii::$app->request->get();
        if (!empty($get[$factor->alias])) {
            $selected = date($params['format'],strtotime($get[$factor->alias]));
        } elseif(isset($params['selected'])) {
            $selected = $params['selected'];
        } else {
            $selected = '';
        }
        return  $selected;
    }
    
    public static function currentSelectedFactorName ($factor, $params = []) 
    {
        $selected = self::currentSelected($factor, $params);        
        $factor_values = ArrayHelperApi::map($factor->values,'alias','name');
        return  $factor_values[$selected];
    }
    
    public static function companyAliasInput () 
    {
        $company = Yii::$app->request->get('company',NULL);
        if (!empty($company)) {
            return parent::input('text','company',$company,['hidden'=>'hidden']);
        } else {
            return false;
        } 
    }
    
    public static function allCompaniesOffersButton () 
    {
        $company = Yii::$app->request->get('company',NULL);
        if (!empty($company)) {
            return parent::buttonInput('Показать предложения всех компаний',['id'=>'show_all_companies_offers', /*'class' => 'btn b-hero__btn waves-effect waves-light'*/]);
        } else {
            return false;
        } 
    }
    
    /*
     * Breadcrumbs helper.
     * Generate site breadcrumbs via template:
     * 
        <ol itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="https://example.com/">
                    <span itemprop="name">Главная</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            ›
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="https://example.com/razdel/">
                    <span itemprop="name">Раздел</span>
                </a>
               <meta itemprop="position" content="2" />
            </li>
            ›
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="https://example.com/razdel/podrazdel">
                    <span itemprop="name">Подраздел</span>
                </a>
                <meta itemprop="position" content="3" />
            </li>
        </ol>
     * 
     * @param array $items the breadcrumbs items
     * @return string the breadcrumbs html markup
     */
    public static function breadcrumbs ($array = [], $main = true) 
    {        
        if ($main) { 
            $list='
            <li class="b-crumb__item" itemprop="itemListElement" itemscope itemtype="//schema.org/ListItem">
                <a class="b-crumb__link" itemscope itemtype="//schema.org/Thing" itemprop="item" href="'.Url::to(["/"],true).'">
                    <span itemprop="name">'.Yii::t("app", "Main").'</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>'; 
        } else {
            $list='';
        } 
        foreach ($array as $key => $value) {
            if (isset($value['href'])) {
//            <span itemprop="name">Название раздела</span>
                $span_title = parent::tag('span',$value['title'],['itemprop' => 'name']);
          
//            <a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="https://example.com/">
//                <span itemprop="name">Название раздела</span>
//            </a>
                $a_href = parent::a(
                    $span_title,
                    Url::to([$value['href']],true),
                    [
                        'itemscope' => '',
                        'itemtype' => "//schema.org/Thing",
                        'itemprop' => "item",
                        'class' => 'b-crumb__link'
                    ]); 
            
//            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
//                <a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="https://example.com/">
//                    <span itemprop="name">Главная</span>
//                </a>
//                <meta itemprop="position" content="1" />
//            </li>            
                $li_item = parent::tag('li',
                        $a_href.'<meta itemprop="position" content="'.((int)$key+2).'" />',
                        [
                            'itemprop' => "itemListElement",
                            'itemscope' => '',
                            'itemtype' => "//schema.org/ListItem",
                            'class' => 'b-crumb__item '.((isset($value['active'])) ? 'active' : '')
                        ]);
            } else {
                
                $a_href = parent::tag('span',
                        $value['title'],
                        [
                            'class' => 'b-crumb__link'
                        ]);
                $li_item = parent::tag('li',
                    $a_href,
                    [
                        'class' => 'b-crumb__item '.((isset($value['active'])) ? 'active' : '')
                    ]);
            }
            
                    
            $list .= $li_item;      
        }
        
        return parent::tag('ol',$list,[
            'itemscope' => '',
            'itemtype' => "//schema.org/BreadcrumbList",
            'class' => 'b-crum pg-breadcrumbs pg-display__inline-block pg-inline-block__margin'
        ]);
    }
    
    /*
     * Calculator steps.
     * It`s like breadcrumbs, but without micromarkup
     * @param array $items the steps items
     * @return string the steps html markup
     */
    public static function calcSteps ($array = []) 
    {
        $list = '';
        foreach ($array as $value) {
            if (isset($value['href'])) {
                $a_href = parent::a(
                    $value['title'],
                    Url::to([$value['href']],true),
                    [
                        'class' => 'b-crumb__link'
                    ]); 
            } else {
                $a_href = parent::tag('span',
                        $value['title'],
                        [
                            'class' => 'b-crumb__link'
                        ]);
            }
            
            $li_item = parent::tag('li',
                    $a_href,
                    [
                        'class' => 'b-crumb__item '.((isset($value['active'])) ? 'active' : '')
                    ]);            
                    
            $list .= $li_item;        
        }
        return parent::tag('ol',$list,[
            'class' => 'b-crum pg-display__inline-block pg-inline-block__margin'
        ]);
    }
    
    public static function tourismAges ($factor,$params = ['selected'=>[]]) 
    {
        $ages = self::currentSelected($factor,$params);
        
        $remove_btn_first = parent::button('<i class="material-icons">remove</i>',[
            'class' => "btn-floating waves-effect waves-light red g-hidden js-age-del",
            'disabled' => true,
            'title' => 'Удалить поле'
        ]);
        $remove_btn = parent::button('<i class="material-icons">remove</i>',[
            'class' => "btn-floating waves-effect waves-light red js-age-del",
            'title' => 'Удалить поле'
        ]);
        $add_btn = parent::button('<i class="material-icons">add</i>',[
            'class' => "btn-floating waves-effect waves-light js-age-add",
            'disabled' => true,
            'title' => 'Добавить поле'
        ]);
        $add_btn_last = parent::button('<i class="material-icons">add</i>',[
            'class' => "btn-floating waves-effect waves-light js-age-add",
            'title' => 'Добавить поле'
        ]);
        
        
        if (!empty($ages)) {
            switch (count($ages)) {
                case 1:
                    $remove = parent::tag('div', $remove_btn_first, ['class'=>'col s3 input-field']);
                    $input = '<i class="icon-user prefix grey-text active"></i>'
                    .parent::input('text','ages[]',reset($ages),[
                        'id'=>'t_user1',
                        'placeholder' => "30",
                        'required' => 'required'
                    ]).
                    parent::label('Возраст','t_user1');
                    $content = parent::tag('div', $input, ['class'=>'col s6 input-field']);
                    $add = parent::tag('div', $add_btn_last, ['class'=>'col s3 input-field']);
                    
                    return parent::tag('div',
                                        $remove
                                        .$content
                                        .$add,
                                        ['class' => 'col s12 m6 l3 js-age-block']);
                case 2:
                    // First button
                    $remove_1 = parent::tag('div', $remove_btn_first, ['class'=>'col s3 input-field']);
                    $input_1 = '<i class="icon-user prefix grey-text active"></i>'
                    .parent::input('text','ages[]',reset($ages),[
                        'id'=>'t_user1',
                        'placeholder' => "30",
                        'required' => 'required'
                    ]).
                    parent::label('Возраст','t_user1');
                    $content_1 = parent::tag('div', $input_1, ['class'=>'col s6 input-field']);
                    $add_1 = parent::tag('div', $add_btn, ['class'=>'col s3 input-field']);
                    
                    // Last button
                    $remove_2 = parent::tag('div', $remove_btn, ['class'=>'col s3 input-field']);
                    $input_2 = '<i class="icon-user prefix grey-text active"></i>'
                    .parent::input('text','ages[]',end($ages),[
                        'id'=>'t_user2',
                        'placeholder' => "30",
                        'required' => 'required'
                    ]).
                    parent::label('Возраст','t_user2');
                    $content_2 = parent::tag('div', $input_2, ['class'=>'col s6 input-field']);
                    $add_2 = parent::tag('div', $add_btn_last, ['class'=>'col s3 input-field']);
                    
                    return  parent::tag('div',
                                        $remove_1
                                        .$content_1
                                        .$add_1,
                                        ['class' => 'col s12 m6 l3 js-age-block'])
                            .parent::tag('div',
                                        $remove_2
                                        .$content_2
                                        .$add_2,
                                        ['class' => 'col s12 m6 l3 js-age-block']);
                default:
                    $count = count($ages);
                    // First button
                    $remove_1 = parent::tag('div', $remove_btn_first, ['class'=>'col s3 input-field']);
                    $input_1 = parent::input('text','ages[]',array_shift($ages),[
                        'id'=>'t_user1',
                        'placeholder' => "30",
                        'required' => 'required'
                    ]).
                    parent::label('Возраст','t_user1');
                    $content_1 = parent::tag('div', $input_1, ['class'=>'col s6 input-field']);
                    $add_1 = parent::tag('div', $add_btn, ['class'=>'col s3 input-field']);
                    
                    // Last button
                    $remove_N = parent::tag('div', $remove_btn, ['class'=>'col s3 input-field']);
                    $input_N = parent::input('text','ages[]',array_pop($ages),[
                        'id'=>'t_user'.$count,
                        'placeholder' => "30",
                        'required' => 'required'
                    ]).
                    parent::label('Возраст','t_user'.$count);
                    $content_N = parent::tag('div', $input_N, ['class'=>'col s6 input-field']);
                    $add_N = parent::tag('div', $add_btn_last, ['class'=>'col s3 input-field']);
                    
                    // Inner elements
                    $inner_content = '';
                    foreach ($ages as $key => $item) {
                        $remove = parent::tag('div', $remove_btn, ['class'=>'col s3 input-field']);
                        $input = '<i class="icon-user prefix grey-text active"></i>'
                        .parent::input('text','ages[]',$item,[
                            'id'=>'t_user'.$key+2,
                            'placeholder' => "30",
                            'required' => 'required'
                        ]).
                        parent::label('Возраст','t_user'.$key+2);
                        $content = parent::tag('div', $input, ['class'=>'col s6 input-field']);
                        $add = parent::tag('div', $add_btn, ['class'=>'col s3 input-field']);
                        $inner_content .= parent::tag('div',
                                            $remove
                                            .$content
                                            .$add,
                                            ['class' => 'col s12 m6 l3 js-age-block']);
                    } 
                    
                    return  parent::tag('div',
                                        $remove_1
                                        .$content_1
                                        .$add_1,
                                        ['class' => 'col s12 m6 l3 js-age-block'])
                            .$inner_content
                            .parent::tag('div',
                                        $remove_N
                                        .$content_N
                                        .$add_N,
                                        ['class' => 'col s12 m6 l3 js-age-block']); 
            }
        } else {
            $remove = parent::tag('div', $remove_btn_first, ['class'=>'col s3 input-field']);
            $input = '<i class="icon-user prefix grey-text active"></i>'
            .parent::input('text','ages[]',null,[
                'id'=>'t_user1',
                'placeholder' => "30",
                'required' => 'required'
            ]).
            parent::label('Возраст','t_user1');
            $content = parent::tag('div', $input, ['class'=>'col s6 input-field']);
            $add = parent::tag('div', $add_btn_last, ['class'=>'col s3 input-field']);

            return parent::tag('div',
                                $remove
                                .$content
                                .$add,
                                ['class' => 'col s12 m6 l3 js-age-block']);    
        }
    }
    
    public static function tourismFactorSelectCountry ($factor, $params = []) 
    {
        $selected = self::currentSelected($factor, $params);
        $get = Yii::$app->request->get();
        if(isset($get['country_name'])) {
            $country_name = $get['country_name'];
        } else {
            $country_name = '';
            $selected = '';
        }
        
        return  parent::tag('div',
                    parent::input('text','country_name',$country_name,['class'=>'js-city','placeholder'=>'Направление', 'required' => 'required']).
                    parent::input('text','country',$selected,['hidden'=>'hidden']),
                    ['class'=>'select-wrapper']).
                parent::label(\Yii::t('factors', $factor->alias).":");
    }
    
    public static function bonuses($bonuses)
    {
        $bonusesArr = json_decode($bonuses);
        if ($bonusesArr !== NULL) {
            $resBons = [];
            if (!empty($bonusesArr->bons)) {
                foreach ($bonusesArr->bons as $key => $bonus) {
                    $bonus = (array)$bonus;
                    if (isset($bonus['status']) && isset($bonus['sort']) && $bonus['status'] == 1) {
                        $resBons[$bonus['sort']]['alias'] = $key;
                        $resBons[$bonus['sort']]['sort'] = $bonus['sort'];
                        $resBons[$bonus['sort']]['tt'] = $bonus['tt'];

                    }
                }
                ksort($resBons);
                $html = '';
                
                foreach ($resBons as $bonus) {
                    $html .= "<i class='flaticon-{$bonus['alias']} js-tooltip' data-position='top' data-tooltip='{$bonus['tt']}'></i>";
                }
                return $html;
            }
            return false;
        } else {
            return $bonuses;
        }
    }
    
    public static function bonusFlag($bonuses)
    {
        $bonusesArr = json_decode($bonuses);
        if ($bonusesArr !== NULL) {
            if (!empty($bonusesArr->flag) && isset($bonusesArr->flag->status) && $bonusesArr->flag->status == 1) {
                $html = <<<EOF
                        <figure class="b-ch-table-lbl {$bonusesArr->flag->color}">
                            <img src="/img/icons/label-{$bonusesArr->flag->color}.svg" class="b-ch-table-lbl__img" alt="" />
                            <figcaption class="b-ch-table-lbl__entry">
                                <div class="b-ch-table-lbl__content">
                                    {$bonusesArr->flag->text}
                                </div>
                            </figcaption>
                        </figure>
EOF;
            
                return $html;                 
            }
            return false;
        }
        return $bonuses;
    }
    
    public static function bonusSticker($bonuses)
    {
        $bonusesArr = json_decode($bonuses);
        if ($bonusesArr !== NULL) {
            if (!empty($bonusesArr->sticker) && isset($bonusesArr->sticker->status) && $bonusesArr->sticker->status == 1) {
                if (!empty($bonusesArr->sticker->tt)) {
                    $html = <<<EOF
                        <div class="b-choice-table__sticker b-sticker g-tooltip">
                            <span class="b-sticker__text">
                                    {$bonusesArr->sticker->text}&nbsp;<i class="material-icons">info_outline</i>
                            </span>
                            <span class="g-tooltiptext g-tooltip-top">{$bonusesArr->sticker->tt}
                            </span>
                        </div>
EOF;
                } else {
                    $html = <<<EOF
                        <div class="b-choice-table__sticker b-sticker g-tooltip">
                            <span class="b-sticker__text">
                                {$bonusesArr->sticker->text}
                            </span>
                        </div>
EOF;
                } 
                return $html;                 
            }
            return false;
        }
        return $bonuses;
    }
    
    public static function osagoPrettyCities($cities)
    {
        if ($cities) {
            $links = '';
            foreach ($cities as $city) {
                switch ($city->alias) {
                    case 'foreign':
                        $customClass = 'fast_city_select osago-offers-form__city_link c-brand-orange';
                        break;
                    default :
                        $customClass = 'fast_city_select osago-offers-form__city_link';
                }
                $links .= self::a(
                        $city->name_ru, 
                        Url::to(["/osago/{$city->alias}/calculator"]), 
                        [
                            'class' => $customClass,
                            'data-city' => $city->name_ru,
                            'data-alias' => $city->alias,
                            'data-zone' => $city->zone_alias
                        ]);
            }
            $wrapper = self::tag('div', $links, ['class' => 'osago-offers-form__cities']);
            
            return $wrapper;
        }
        return false;
    }
    
    public static function tourismInsuranceSumSelect ($factor) 
    {
        $factors = \Yii::$app->tourism->getRequiredFactors();
        $get = \Yii::$app->request->get();
        $selected = null;
        $insurance_sums = [];
        $currency = null;
        if (!empty($get['country'])) {
            foreach ($factors['country']->values as $country) {
                if ($get['country'] == $country->alias) {
                    $selected = $country->insurance_sum[0]->alias;
                    $insurance_sums = $country->insurance_sum;
                    $currency = $country->currency;
                    if (!empty($get[$factor->alias])) {
                        foreach ($country->insurance_sum as $sum) {
                            if ($get[$factor->alias] == $sum->alias) {
                                $selected = $get[$factor->alias];
                                break 2;
                            }
                        }
                    }
                    break;
                }
            }
        }
        $options = [];
        if (!empty($insurance_sums)) {
            foreach ($insurance_sums as $sum) {
                $options[$sum->alias] = $sum->value.' '.$currency;
            }
        }
        
        $selectOptions = [];
        if (empty($options)) {
            $selectOptions = ['disabled' => 'disabled'];
            $options[] = 'Выберите направление';
        }        
        
        return  parent::dropDownList(
                    $factor->alias, 
                    $selected, 
                    $options,
                    $selectOptions).
                parent::label(\Yii::t('factors', $factor->alias).":");
    }
    
    public static function factorMotoMarketPrice () 
    {
        $price = \Yii::$app->request->get('moto_market_price',false);
        if (!$price) {
            $price = '';
        }
        return  parent::tag('div',
                    parent::input('text','moto_market_price',$price,['class'=>'','placeholder'=>'60000', 'required' => 'required']),
                    ['class'=>'select-wrapper']).
                parent::label(\Yii::t('factors', 'moto_market_price').' <span class="tooltipped" data-position="top" data-tooltip="Рыночная стоимость должна быть минимум 60 тыс. грн"><i class="material-icons">info_outline</i></span>'.":");
    }
}
