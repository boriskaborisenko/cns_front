<?php
namespace frontend\models;

use Yii;

/**
 * Description of FactorsModel
 *
 * @author Pavlo
 */
class FactorsModel extends \yii\base\Model
{

    public static function getOsagoFactors()
    {
        return [
            'tip_ts' => [
                'values' => [
                    'legkovye_ts_do_1600_sm3' => Yii::t('factors', 'legkovye_ts_do_1600_sm3'),
                    'legkovye_ts_1601_2000_sm3' => Yii::t('factors', 'legkovye_ts_1601_2000_sm3'),
                    'legkovye_ts_2001_3000_sm3' => Yii::t('factors', 'legkovye_ts_2001_3000_sm3'),
                    'legkovye_ts_3001_sm3_i_bolshe' => Yii::t('factors', 'legkovye_ts_3001_sm3_i_bolshe'),
                    'pritsepy_k_legkovym_ts' => Yii::t('factors', 'pritsepy_k_legkovym_ts'),
                    'gruzovye_ts_do_2t' => Yii::t('factors', 'gruzovye_ts_do_2t'),
                    'gruzovye_ts_2t_i_bolshe' => Yii::t('factors', 'gruzovye_ts_2t_i_bolshe'),
                    'pritsepy_k_gruzovym_ts' => Yii::t('factors', 'pritsepy_k_gruzovym_ts'),
                    'avtobusy_do_20_mest' => Yii::t('factors', 'avtobusy_do_20_mest'),
                    'avtobusy_20_i_bolee_mest' => Yii::t('factors', 'avtobusy_20_i_bolee_mest'),
                    'mototsikly_do_300_sm3' => Yii::t('factors', 'mototsikly_do_300_sm3'),
                    'mototsikly_300_sm3_i_bolshe' => Yii::t('factors', 'mototsikly_300_sm3_i_bolshe'),
                ],
                'label' => Yii::t('factors', 'tip_ts'),
            ],
            'mesto_registratsii' => [
                'values' => [
                    'zona_1_kiev' => Yii::t('factors', 'zona_1_kiev'),
                    'zona_2_borispol_boyarka_brovari_vasilkov_vishgorod_vishnevoe_irpen' => Yii::t(
                        'factors',
                        'zona_2_borispol_boyarka_brovari_vasilkov_vishgorod_vishnevoe_irpen'
                    ),
                    'zona_3_odessa_kharkov' => Yii::t('factors', 'zona_3_odessa_kharkov'),
                    'zona_4_dnepropetrovsk_donetsk_zaporozhe_krivoy_rog_lvov' => Yii::t(
                        'factors',
                        'zona_4_dnepropetrovsk_donetsk_zaporozhe_krivoy_rog_lvov'
                    ),
                    'zona_5' => Yii::t('factors', 'zona_5'),
                    'zona_6_nas_punkty_menee_100_tys_chel' => Yii::t('factors', 'zona_6_nas_punkty_menee_100_tys_chel'),
                    'zona_7_inye_strany' => Yii::t('factors', 'zona_7_inye_strany'),
                ],
                'label' => Yii::t('factors', 'mesto_registratsii'),
            ],
            'franshiza' => [
                'values' => [
                    '0' => Yii::t('factors', '0'),
                    '510' => Yii::t('factors', '510'),
                    '2000' => Yii::t('factors', '2000'),
                    '1000' => Yii::t('factors', '1000'),
                ],
                'label' => Yii::t('factors', 'franshiza'),
            ],
            'sfera_ispolzovaniya' => [
                'values' => [
                    'fiz_litso' => Yii::t('factors', 'fiz_litso'),
                    'fiz_litso_taksi' => Yii::t('factors', 'fiz_litso_taksi'),
                    'yur_litso' => Yii::t('factors', 'yur_litso'),
                    'yur_litso_taksi' => Yii::t('factors', 'yur_litso_taksi'),
                ],
                'label' => Yii::t('factors', 'sfera_ispolzovaniya'),
            ],
            'stazh_vozhdeniya' => [
                'values' => [
                    'do_3_kh_let' => Yii::t('factors', 'do_3_kh_let'),
                    'bolee_3_kh_let' => Yii::t('factors', 'bolee_3_kh_let'),
                ],
                'label' => Yii::t('factors', 'stazh_vozhdeniya'),
            ],
            'srok_deystviya' => [
                'values' => [
                    '1_god' => Yii::t('factors', '1_god'),
                    '11_mesyatsev' => Yii::t('factors', '11_mesyatsev'),
                    '10_mesyatsev' => Yii::t('factors', '10_mesyatsev'),
                    '9_mesyatsev' => Yii::t('factors', '9_mesyatsev'),
                    '8_mesyatsev' => Yii::t('factors', '8_mesyatsev'),
                    '7_mesyatsev' => Yii::t('factors', '7_mesyatsev'),
                    '6_mesyatsev' => Yii::t('factors', '6_mesyatsev'),
                    '5_mesyatsev' => Yii::t('factors', '5_mesyatsev'),
                    '4_mesyatsa' => Yii::t('factors', '4_mesyatsa'),
                    '3_mesyatsa' => Yii::t('factors', '3_mesyatsa'),
                    '2_mesyatsa' => Yii::t('factors', '2_mesyatsa'),
                    '1_mesyats' => Yii::t('factors', '1_mesyats'),
                    '15_dney' => Yii::t('factors', '15_dney'),
                ],
                'label' => Yii::t('factors', 'srok_deystviya'),
            ],
            'god_vypuska_bm' => [
                'values' => [
                    '2016' => Yii::t('factors', '2016'),
                    '2015' => Yii::t('factors', '2015'),
                    '2014' => Yii::t('factors', '2014'),
                    '2013' => Yii::t('factors', '2013'),
                    '2012_i_ranee' => Yii::t('factors', '2012_i_ranee'),
                ],
                'label' => Yii::t('factors', 'god_vypuska_bm'),
            ],
            'kolichestvo_ts' => [
                'values' => [
                    '1_4_ts' => Yii::t('factors', '1_4_ts'),
                    '5_9_ts' => Yii::t('factors', '5_9_ts'),
                    '10_19_ts' => Yii::t('factors', '10_19_ts'),
                    '20_99_ts' => Yii::t('factors', '20_99_ts'),
                    '100_499_ts' => Yii::t('factors', '100_499_ts'),
                    '500_1999_ts' => Yii::t('factors', '500_1999_ts'),
                    '2000_i_bolee_ts' => Yii::t('factors', '2000_i_bolee_ts'),
                ],
                'label' => Yii::t('factors', 'kolichestvo_ts'),
            ],
            'lgoty' => [
                'values' => [
                    'net_lgot' => Yii::t('factors', 'net_lgot'),
                    'est_lgoty' => Yii::t('factors', 'est_lgoty'),
                ],
                'label' => Yii::t('factors', 'lgoty'),
            ],
            'company_bonuses' => [
                'label' => Yii::t('factors', 'Бонусы'),
            ],
        ];

    }
    
    public static function getGreencardFactors()
    {
        return [
                'zk_srok_deystviya' => [
                    'values' => [
                        '1_god_25'        => Yii::t('factors', '1_god_25'),
                        '11_mesyatsev_25' => Yii::t('factors', '11_mesyatsev_25'),
                        '10_mesyatsev_25' => Yii::t('factors', '10_mesyatsev_25'),
                        '9_mesyatsev_25'  => Yii::t('factors', '9_mesyatsev_25' ),
                        '8_mesyatsev_25'  => Yii::t('factors', '8_mesyatsev_25' ),
                        '7_mesyatsev_25'  => Yii::t('factors', '7_mesyatsev_25' ),
                        '6_mesyatsev_25'  => Yii::t('factors', '6_mesyatsev_25' ),
                        '5_mesyatsev_25'  => Yii::t('factors', '5_mesyatsev_25' ),
                        '4_mesyatsa_25'   => Yii::t('factors', '4_mesyatsa_25'),
                        '3_mesyatsa_25'   => Yii::t('factors', '3_mesyatsa_25'),
                        '2_mesyatsa_25'   => Yii::t('factors', '2_mesyatsa_25'),
                        '1_mesyats_25'    => Yii::t('factors', '1_mesyats_25'),
                        '15_dney_25'      => Yii::t('factors', '15_dney_25'),
                    ],
                    'label' => Yii::t('factors', 'zk_srok_deystviya'),
                ],
            
                'zk_tip_ts' => [
                    'values' => [
                        'legkovye_ts_24' => Yii::t('factors', 'legkovye_ts_24'),
                        'avtobusy_24'    => Yii::t('factors', 'avtobusy_24'),
                        'gruzovye_ts_24' => Yii::t('factors', 'gruzovye_ts_24'),
                        'pritsepy_24'    => Yii::t('factors', 'pritsepy_24'),
                        'mototsikly_24'  => Yii::t('factors', 'mototsikly_24'),
                    ],
                    'label' => Yii::t('factors', 'zk_tip_ts'),
                ],

                'zk_napravlenie' => [
                    'values' => [
                        'azer_bel_mol_ros_23' => Yii::t('factors', 'azer_bel_mol_ros_23'),
                        'evropa_23'           => Yii::t('factors', 'evropa_23'),
                    ],
                    'label' => Yii::t('factors', 'zk_napravlenie'),
                ],
            
                'company_bonuses' => [
                    'label' => Yii::t('factors', 'Бонусы'),
                ],
        ];
    }
    
    public static function getMotokaskoFactors()
    {
        return [
                'moto_srok_deystviya' => [
                    'values' => [
                        '3_month_28'        => Yii::t('factors', '3_month_28'),
                        '6_month_28'        => Yii::t('factors', '6_month_28'),
                        '9_month_28' => Yii::t('factors', '9_month_28'),
                    ],
                    'label' => Yii::t('factors', 'moto_srok_deystviya'),
                ],
                'moto_age' => [
                    'values' => [
                        'up_to_5_y_27'        => Yii::t('factors', 'up_to_5_y_27'),
                        '5_10_y_27' => Yii::t('factors', '5_10_y_27'),
                    ],
                    'label' => Yii::t('factors', 'moto_age'),
                ],
               
        ];
    }
}
