/*
 * Greencard, get offers via API
 */
(function ($) {
  $.offersForm = function (form) {
    this.$form = $(form);
    this.init();
  };

  $.offersForm.prototype = {
    init: function () {
      this.$changeElements = this.$form.find("select,input[type='checkbox'],input[type='radio']");
      this.onloadHandler();
      this.onchangeHandler();
      this.Rooles = this.rooles();
    },
    rooles: function () {
      return {
        'tip_ts': {
          'legkovye_ts_3001_sm3_i_bolshe': [
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'pritsepy_k_legkovym_ts': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'gruzovye_ts_do_2t': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'gruzovye_ts_2t_i_bolshe': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'pritsepy_k_gruzovym_ts': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'avtobusy_20_i_bolee_mest': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'mototsikly_do_300_sm3': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'mototsikly_300_sm3_i_bolshe': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ],
          'other_values': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'fiz_litso_taksi',
                'yur_litso_taksi'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            }
          ]
        },
        'sfera_ispolzovaniya': {
          'fiz_litso_taksi': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
                'pritsepy_k_legkovym_ts',
                'gruzovye_ts_do_2t',
                'gruzovye_ts_2t_i_bolshe',
                'pritsepy_k_gruzovym_ts',
                'avtobusy_20_i_bolee_mest',
                'mototsikly_do_300_sm3',
                'mototsikly_300_sm3_i_bolshe'
              ]
            }
          ],
          'yur_litso_taksi': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
                'pritsepy_k_legkovym_ts',
                'gruzovye_ts_do_2t',
                'gruzovye_ts_2t_i_bolshe',
                'pritsepy_k_gruzovym_ts',
                'avtobusy_20_i_bolee_mest',
                'mototsikly_do_300_sm3',
                'mototsikly_300_sm3_i_bolshe'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            },
            {
              'all': false,
              'factor': 'stazh_vozhdeniya',
              'values': [
                'bolee_3_kh_let'
              ]
            }
          ],
          'yur_litso': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
//                'pritsepy_k_legkovym_ts',
//                'gruzovye_ts_do_2t',
//                'gruzovye_ts_2t_i_bolshe',
//                'pritsepy_k_gruzovym_ts',
//                'avtobusy_20_i_bolee_mest',
//                'mototsikly_do_300_sm3',
//                'mototsikly_300_sm3_i_bolshe'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            },
            {
              'all': false,
              'factor': 'stazh_vozhdeniya',
              'values': [
                'bolee_3_kh_let'
              ]
            }
          ],
          'other_values': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
//                'pritsepy_k_legkovym_ts',
//                'gruzovye_ts_do_2t',
//                'gruzovye_ts_2t_i_bolshe',
//                'pritsepy_k_gruzovym_ts',
//                'avtobusy_20_i_bolee_mest',
//                'mototsikly_do_300_sm3',
//                'mototsikly_300_sm3_i_bolshe'
              ]
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            },
            {
              'all': false,
              'factor': 'stazh_vozhdeniya',
              'values': [
                'bolee_3_kh_let'
              ]
            }
          ]
        },
        'lgoty': {
          'est_lgoty': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
                'legkovye_ts_3001_sm3_i_bolshe',
                'pritsepy_k_legkovym_ts',
                'gruzovye_ts_do_2t',
                'gruzovye_ts_2t_i_bolshe',
                'pritsepy_k_gruzovym_ts',
                'avtobusy_do_20_mest',
                'avtobusy_20_i_bolee_mest',
                'mototsikly_do_300_sm3',
                'mototsikly_300_sm3_i_bolshe'
              ]
            },
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'yur_litso',
                'yur_litso_taksi'
              ]
            }
          ],
          'other_values': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
                'legkovye_ts_3001_sm3_i_bolshe',
                'pritsepy_k_legkovym_ts',
                'gruzovye_ts_do_2t',
                'gruzovye_ts_2t_i_bolshe',
                'pritsepy_k_gruzovym_ts',
                'avtobusy_do_20_mest',
                'avtobusy_20_i_bolee_mest',
                'mototsikly_do_300_sm3',
                'mototsikly_300_sm3_i_bolshe'
              ]
            },
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'yur_litso',
                'yur_litso_taksi'
              ]
            }
          ]
        },
        'stazh_vozhdeniya': {
          'bolee_3_kh_let': [
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'yur_litso',
                'yur_litso_taksi'
              ]
            }
          ],
          'other_values': [
            {
              'all': false,
              'factor': 'tip_ts',
              'values': [
                'legkovye_ts_3001_sm3_i_bolshe',
                'pritsepy_k_legkovym_ts',
                'gruzovye_ts_do_2t',
                'gruzovye_ts_2t_i_bolshe',
                'pritsepy_k_gruzovym_ts',
                'avtobusy_do_20_mest',
                'avtobusy_20_i_bolee_mest',
                'mototsikly_do_300_sm3',
                'mototsikly_300_sm3_i_bolshe'
              ]
            },
            {
              'all': false,
              'factor': 'sfera_ispolzovaniya',
              'values': [
                'yur_litso',
                'yur_litso_taksi'
              ]
            }
          ]
        }
      };
    },
    onchangeHandler: function () {
      var self = this;
  
      self.$changeElements.on('change', function () {
        if ($(this).attr('name') == 'srok_deystviya') {
            switch ($(this).val()) {
                case '5_mesyatsev':
                case '4_mesyatsa':
                case '3_mesyatsa':
                case '2_mesyatsa':
                case '1_mesyats':
                case '15_dney':
                    $('#transit').openModal();
                    break;
                default:
            }
        }
        self.disablerFunc($(this));
        self.senderFunc(true);     
      });
    },
    onloadHandler: function () {
        var self = this;
        $(document).ready(function () {
            self.senderFunc(false);
        });
    },
    senderFunc: function (is_onload) {
      var self = this;
      var data = this.$form.serialize();
      if (is_onload) {
        history.pushState(null, null, window.location.pathname + '?' + data);
      }
      $('.overlay').show();
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/api/greencard/get-offers',
        data: data,
        success: function (data) {
            $('#pg-page__offers tbody').html(data.html);
        },
        complete: function (jqXHR, textStatus) {
            setTimeout(function () {
              $('.overlay').hide();
              //$('html, body').animate({
              //  scrollTop: $('#pg-page__offers').offset().top - 100
              //  }, 800);
            }, 500);
            
            self.reInitLoadedOffers();
            // init loaded content for sorting
//            var $table = $('table.js-sortable');
//            $table.each(function () {
//                $(this).find('thead th').each(function (index) { $(this).attr('rel', index); });
//                $(this).find('td').each(function () { $(this).attr('value', $(this).find('.js_pg-sort').text()); });
//            });          
            //$table.find('th.pg-offer-to-pay').click();
            
        }
      });
    },
    disablerFunc: function ($element) {
      if ($element !== null) {
        var factor_name = $element.attr('name');
        var factor_value = $element.val();
        this.disablerWalker(factor_name, factor_value);
      } else {
        var self = this;
        $.each(this.$changeElements, function () {
          var factor_name = $(this).attr('name');
          var factor_value = $(this).val();
          self.disablerWalker(factor_name, factor_value);
        });
      }
    },
    disablerWalker: function (factor_name, factor_value) {
      var self = this;
      if (this.Rooles[factor_name] !== undefined) {
        var filters = this.Rooles[factor_name][factor_value];
        if (filters !== undefined) {
          $.each(filters, function (index, value) {
            var $input = self.$form.find('[name="' + value.factor + '"]');
            if (value.all) {
              $input.attr('disabled', 'disabled');
            } else {
              $.each(value.values, function (element_index, element_value) {
                $input.find('option[value="' + element_value + '"]').attr('disabled', 'disabled');
                $.data($input.find('option[value="' + element_value + '"]')[0], factor_name, factor_value);
              });
            }
            $input.material_select(); // reinitialize select            
          });
        } else {
          $.each(this.Rooles[factor_name]['other_values'], function (index, value) {
            var $input = self.$form.find('[name="' + value.factor + '"]');
            if (value.all) {
              $input.removeAttr('disabled');
            } else {
              $.each(value.values, function (element_index, element_value) {
                $input.find('option[value="' + element_value + '"]').removeData(factor_name);
                if ($.isEmptyObject($.data($input.find('option[value="' + element_value + '"]')[0]))) {
                  $input.find('option[value="' + element_value + '"]').removeAttr('disabled');
                }
              });
            }
            $input.material_select(); // reinitialize select
          });
        }
      }
    },
    reInitLoadedOffers: function(){
        // -------- sort choice table ------------
        // init loaded content for sorting var aAsc = [],
        var  aAsc = []
            ,$table = $('table.js-sortable')
                                ;
        $table.each(function () {
            $(this).find('thead th').each(function (index) { $(this).attr('rel', index); });
            $(this).find('td').each(function () { $(this).attr('value', $(this).find('.js_pg-sort').text()); });
        }); 
                      // підсвічуватимемо рядок бонусів (моб версія) пропозиції при наведенні на відповідний рядок пропозиції
        $('#pg-page__offers tbody tr:nth-child(2n+1)').mouseenter(
              function(){
                  $(this).next('tr.b-ch-table__smScrBonusRow').css('background-color', '#f2f2f2');
                  $(this).css('background-color', '#f2f2f2');
              });

        $('#pg-page__offers tbody tr:nth-child(2n+1)').mouseleave(
              function(){
                  $(this).next('tr.b-ch-table__smScrBonusRow').css('background-color', '#fff');
                  $(this).css('background-color', '#fff');
              });
                      // підсвічуватимемо рядок пропозиції при наведенні на відповідні бонуси (моб версія)
        $('#pg-page__offers tbody tr:nth-child(2n)').mouseenter(
              function(){
                  $(this).prev('tr').css('background-color', '#f2f2f2');
                  $(this).css('background-color', '#f2f2f2');
              });

        $('#pg-page__offers tbody tr:nth-child(2n)').mouseleave(
              function(){
                  $(this).prev('tr').css('background-color', '#fff');
                  $(this).css('background-color', '#fff');
              });

                      //пронумеруємо data-bonusSnap однаковим номером для рядка пропозиції із tr.b-ch-table__smScrBonusRow
                      var $tableRows = $table.find("tbody tr");
                      $tableRows.filter(":odd").each(function (index) { $(this).attr('data-bonusSnap', index); });
                      $tableRows.filter(":even").each(function (index) { $(this).attr('data-bonusSnap', index); });
                      $tableRowsWithPrice = $tableRows.not(".b-ch-table__smScrBonusRow");	//рядки зі змістом
                      $tableRowsBonusSmScr = $tableRows.filter(".b-ch-table__smScrBonusRow");	//рядки з бонусами
                      //заповнимо рядок бонусів для малого екрана змістом з комірки бонусів
                      $tableRowsBonusSmScr.each(function(){	// проходимо по всім рядкам бонусів
                                      var bonusSnap = $(this).attr('data-bonusSnap');

                                      $(this).find("div").after($tableRowsWithPrice.filter(function(){	//заповнюємо конкретний бонусний рядок
                                              return $(this).attr("data-bonusSnap") == bonusSnap;}).find("td:nth-child(3)").children().clone());
                              });

                         //--------Tooltips-----------
                      // Підключаємо тултіпи після додавання рядків бонусів для малого екрана (щоб там теж були підказки)
                      $('.tooltipped, .js-tooltip').tooltip({ delay: 50 });

                      // Будемо ховати всі тултіпи через 3 секунди, бо незручно в мобільній версії
                      var  tooltipHideTime = 3000;	// через скільки мс ховати тултіпи materialize
                      var  $materializeTooltips	= $(".material-tooltip")
                              ,$cssTooltips			= $(".g-tooltiptext");
                      var  $materializeTooltipsParents	= $(".js-tooltip, .tooltipped")
                              ,$cssTooltipsParents			= $(".g-tooltip");

                      //ховаємо свої тултіпи
      $cssTooltipsParents.each(function() {
              $(this).find(".g-tooltiptext").css("display", "none");
              $(this).on("click", function(){				
                      var $tooltip = $(this).find(".g-tooltiptext");
                      $tooltip.fadeIn().animate({
                                      opacity: 1
                              }, 300);
                      var timeoutID = setTimeout(function(){
                                      $tooltip.animate({
                                              opacity: 0} ,300, function(){
                                                      $(this).css("display", "none")
                                              });
                              }, tooltipHideTime + 4500);	// ховатимо css тултіпи пізніше, бо там багато тексту
              });
      });
      //ховатимемо наші тултіпи при кліку на самих себе
      $cssTooltips.click(function(event) {
                      event.stopPropagation();
                      $cssTooltips.animate({
                              opacity: 0} ,300, function(){
                                      $(this).css("display", "none")
                              });
      });

      //ховатимемо наші тултіпи і при кліку за межами тултіпа
      (function(){
              $(document).click(function(event) {
                      event.stopPropagation();
                      if ($(event.target).closest(".g-tooltiptext").length + $(event.target).closest(".g-tooltip").length) return;
                      $cssTooltips.animate({
                              opacity: 0} ,300, function(){
                                      $(this).css("display", "none")
                              });
              });
      })();

      //ховаємо тултіпи materialize framework
      $materializeTooltipsParents.on("click", function(){			
              var  currentTooltip 	= $(this)
                      ,currentTooltipID 	= currentTooltip.attr("data-tooltip-id");

              $materializeTooltips.filter(function(){return $(this).attr("id") == currentTooltipID}).each(function() {
                      $(this).delay(tooltipHideTime).fadeOut(600, function(){
                              $(this).hide();
                      }).show();
              });
      });
      //----table sort continue   
         // default sort
        var $rows = $table.find('tbody tr');
        var nr = $table.find('thead .pg-offer-to-pay').attr('rel');	//класу pg-offer-to-pay зараз нема в розмітці
        var order = 'asc';
        var $price_sort_btn = $table.find('th.pg-offer-to-pay');
        if ( $price_sort_btn.find('.arrow.up').length ) {
            order = 'desc'
        } else if (!$price_sort_btn.find('.arrow').length) {
            $price_sort_btn.append('<span class="arrow"></span>');
        }
        $rows.tsort('td:eq(' + nr + ')', { order: order, attr: 'value' });
        //$('.tooltipped, .js-tooltip').tooltip({ delay: 50 });

                        //тут дприєднаємо рядки з бонусами (малий екран) до відповідних рядків пропозицій
                      $tableRowsWithPrice.each(function (index) {
                              $(this).after($tableRowsBonusSmScr.filter( function (){
                                              return $(this).attr("data-bonusSnap") == index;
                                      }));
                      });

        // table click
        $table.on('click', '.js-sort-col', function (e) {
            // update arrow icon
            $(this).parents('table.js-sortable').find('span.arrow').remove();
            $(this).append('<span class="arrow"></span>');

            // sort direction
            var nr = $(this).attr('rel');
            aAsc[nr] = aAsc[nr] == 'desc' ? 'asc' : 'desc';
            if (aAsc[nr] == 'desc') { $(this).find('span.arrow').addClass('up'); }

            // sort rows
            var rows = $(this).parents('table.js-sortable').find('tbody tr');
            rows.tsort('td:eq(' + nr + ')', { order: aAsc[nr], attr: 'value' });

                      //тут дприєднаємо рядки з бонусами (малий екран) до відповідних рядків пропозицій після сортування
                      $tableRowsWithPrice.each(function (index) {
                              $(this).after($tableRowsBonusSmScr.filter( function (){
                                              return $(this).attr("data-bonusSnap") == index;
                                      }));
                      });

            // fix row classes
            rows.removeClass('alt first last');
            var table = $(this).parents('table.js-sortable');
            table.find('tr:even').addClass('alt');
            table.find('tr:first').addClass('first');
            table.find('tr:last').addClass('last');
        });
    }
  };

  $(function () {
    var offers_form = new $.offersForm("#greencard-offers-form");
  });

})(jQuery);