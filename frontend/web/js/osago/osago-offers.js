/*
AutoComplite Plugin
*/
// jQuery autoComplete v1.0.7
// https://github.com/Pixabay/jQuery-autoComplete
!function(e){e.fn.autoComplete=function(t){var o=e.extend({},e.fn.autoComplete.defaults,t);return"string"==typeof t?(this.each(function(){var o=e(this);"destroy"==t&&(e(window).off("resize.autocomplete",o.updateSC),o.off("blur.autocomplete focus.autocomplete keydown.autocomplete keyup.autocomplete"),o.data("autocomplete")?o.attr("autocomplete",o.data("autocomplete")):o.removeAttr("autocomplete"),e(o.data("sc")).remove(),o.removeData("sc").removeData("autocomplete"))}),this):this.each(function(){function t(e){var t=s.val();if(s.cache[t]=e,e.length&&t.length>=o.minChars){for(var a="",c=0;c<e.length;c++)a+=o.renderItem(e[c],t);s.sc.html(a),s.updateSC(0)}else s.sc.hide()}var s=e(this);s.sc=e('<div class="autocomplete-suggestions '+o.menuClass+'"></div>'),s.data("sc",s.sc).data("autocomplete",s.attr("autocomplete")),s.attr("autocomplete","off"),s.cache={},s.last_val="",s.updateSC=function(t,o){if(s.sc.css({top:s.offset().top+s.outerHeight(),left:s.offset().left,width:s.outerWidth()}),!t&&(s.sc.show(),s.sc.maxHeight||(s.sc.maxHeight=parseInt(s.sc.css("max-height"))),s.sc.suggestionHeight||(s.sc.suggestionHeight=e(".autocomplete-suggestion",s.sc).first().outerHeight()),s.sc.suggestionHeight))if(o){var a=s.sc.scrollTop(),c=o.offset().top-s.sc.offset().top;c+s.sc.suggestionHeight-s.sc.maxHeight>0?s.sc.scrollTop(c+s.sc.suggestionHeight+a-s.sc.maxHeight):0>c&&s.sc.scrollTop(c+a)}else s.sc.scrollTop(0)},e(window).on("resize.autocomplete",s.updateSC),s.sc.appendTo("body"),s.sc.on("mouseleave",".autocomplete-suggestion",function(){e(".autocomplete-suggestion.selected").removeClass("selected")}),s.sc.on("mouseenter",".autocomplete-suggestion",function(){e(".autocomplete-suggestion.selected").removeClass("selected"),e(this).addClass("selected")}),s.sc.on("mousedown",".autocomplete-suggestion",function(t){var a=e(this),c=a.data("val");return(c||a.hasClass("autocomplete-suggestion"))&&(s.val(c),o.onSelect(t,c,a),s.sc.hide()),!1}),s.on("blur.autocomplete",function(){try{over_sb=e(".autocomplete-suggestions:hover").length}catch(t){over_sb=0}over_sb?s.is(":focus")||setTimeout(function(){s.focus()},20):(s.last_val=s.val(),s.sc.hide(),setTimeout(function(){s.sc.hide()},350))}),o.minChars||s.on("focus.autocomplete",function(){s.last_val="\n",s.trigger("keyup.autocomplete")}),s.on("keydown.autocomplete",function(t){if((40==t.which||38==t.which)&&s.sc.html()){var a,c=e(".autocomplete-suggestion.selected",s.sc);return c.length?(a=40==t.which?c.next(".autocomplete-suggestion"):c.prev(".autocomplete-suggestion"),a.length?(c.removeClass("selected"),s.val(a.addClass("selected").data("val"))):(c.removeClass("selected"),s.val(s.last_val),a=0)):(a=40==t.which?e(".autocomplete-suggestion",s.sc).first():e(".autocomplete-suggestion",s.sc).last(),s.val(a.addClass("selected").data("val"))),s.updateSC(0,a),!1}if(27==t.which)s.val(s.last_val).sc.hide();else if(13==t.which||9==t.which){var c=e(".autocomplete-suggestion.selected",s.sc);c.length&&s.sc.is(":visible")&&(o.onSelect(t,c.data("val"),c),setTimeout(function(){s.sc.hide()},20))}}),s.on("keyup.autocomplete",function(a){if(!~e.inArray(a.which,[13,27,35,36,37,38,39,40])){var c=s.val();if(c.length>=o.minChars){if(c!=s.last_val){if(s.last_val=c,clearTimeout(s.timer),o.cache){if(c in s.cache)return void t(s.cache[c]);for(var l=1;l<c.length-o.minChars;l++){var i=c.slice(0,c.length-l);if(i in s.cache&&!s.cache[i].length)return void t([])}}s.timer=setTimeout(function(){o.source(c,t)},o.delay)}}else s.last_val=c,s.sc.hide()}})})},e.fn.autoComplete.defaults={source:0,minChars:3,delay:150,cache:1,menuClass:"",renderItem:function(e,t){t=t.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");var o=new RegExp("("+t.split(" ").join("|")+")","gi");return'<div class="autocomplete-suggestion" data-val="'+e+'">'+e.replace(o,"<b>$1</b>")+"</div>"},onSelect:function(e,t,o){}}}(jQuery);

//
// оформление select с иконками в optgroup
//---------------------------------------------------------------------------------------
function stylingOptionGroup() {
  $('select.js-optgroup').each(function () {
    var $el = $(this),
      count = $el.find('optgroup[data-img]').length,
      $target = $el.prev('.select-dropdown'),
      img = [];

    if (count) {
      for (var i = 0; i < count; i++) {
        img[i] = $el.find('optgroup[data-img]').eq(i).data('img');
        $target.find('li.optgroup').eq(i).prepend('<img src=' + img[i] + ' class="left" alt="" />');
      };
    };
  });
};
  

/*
 * Osago, get offers via API
 */
(function ($) {
  $.offersForm = function (form) {
    this.$form = $(form);
    this.init();
    this.formData = this.$form.serialize();
    // если мы видим предупреждение о том, что не выбран город регистрации,
    // то мы блокируем элементы формы и наводим фокус на и инпут города
    if (this.showCityWarning()) {
        this.$form.find('select, input').attr('disabled', true);
        this.$form.find("input[name='registration_city']").attr('disabled', false).focus();
//        this.$anotherCountryCb.attr('disabled', false);   // task #157
    } else {
        this.$form.find('select, input').removeAttr('disabled');
//        this.autoCompleteHandler();
    }
    
  };

  $.offersForm.prototype = {
    init: function () {
      this.$changeElements = this.$form.find("select,input[type='checkbox']:not(#another_country),input[type='radio']");
      this.$autoCompleteElement = this.$form.find("input.js-city")[0];
      this.$registPlace = this.$form.find("input[name='mesto_registratsii']")[0];
      this.$registPlaceKoatuu = this.$form.find("input[name='koatuu']")[0];
      this.$cityInput = this.$form.find("input[name='registration_city']").val();
      this.$cityInputObj = this.$form.find("input[name='registration_city']");
//      this.$anotherCountryCb = this.$form.find("input[name='another_country']");  // task #157
      this.autoCompleteHandler();
      this.onloadHandler();
      this.onchangeHandler();
      this.onBlurCityInput();
      this.Rooles = this.rooles();
      this.showAllCompaniesOffers();
//      this.anotherCountryChangeHandler();  // task #157
    },
    
    prettyUrlCities: function () {
      return [
          'kyiv',
          'kharkov',
          'odessa',
          'dnepr',
          'lvov',
          'zaporozhye',        
          'foreign'
      ]
    },
    
    showCityWarning: function () {
        var self = this; 
        var $city = self.$form.find("input[name='registration_city']");
        var $warning = self.$form.find('.custom_warning');
        
//        if($city.val() == '' || ($(self.$registPlace).val() == '' && !self.$anotherCountryCb.is(':checked'))){   // task #157
        if($city.val() == '' || $(self.$registPlace).val() == ''){
            $warning.show();
            $city.focus();
            $city.addClass('invalid');
            return true;
        } else {
            $warning.hide();
            $city.removeClass('invalid');
            return false;
        }
    },
    onBlurCityInput: function () {
        var self = this;
        this.$cityInputObj.blur(function(){
            self.cityInputSender();
        });
//        .keypress(function(e) {
//            if (e.keyCode == 13 && self.$anotherCountryCb.is(':checked')) {
//                self.cityInputSender();
//            }
//        });  // task #157
    },
    cityInputSender: function () {
        // если мы видим предупреждение о том, что не выбран город регистрации,
        // то мы блокируем элементы формы и наводим фокус на и инпут города
        if (!this.showCityWarning()) {
            this.$form.find('select, input').removeAttr('disabled');    
        } else {
            this.$form.find('select, input').attr('disabled', true);
            this.$cityInputObj.attr('disabled', false).focus();
//            this.$anotherCountryCb.attr('disabled', false);   // task #157
        }

        if (!this.showCityWarning() && this.$cityInput != this.$cityInputObj.val()) {
            this.$cityInput = this.$cityInputObj.val();
            this.senderFunc(true);
        }
    },
//    anotherCountryChangeHandler: function () {   // task #157
//        var self = this;
//        self.$anotherCountryCb.on('change',function(){
//            var $cityInput = self.$form.find("input[name='registration_city']");
//            if (this.checked && $cityInput.val() != '') {
//                $(self.$registPlace).val('zona_7_inye_strany');
//                self.$form.find('select, input').removeAttr('disabled');
//                self.$form.find('.custom_warning').hide();
//                $cityInput.removeClass('invalid');
//                self.rollbackCityPrettyUrl('NULL');
//                self.senderFunc(true);
//            } else if (this.checked) {
//                $(self.$registPlace).val('zona_7_inye_strany');
//            } else {
//                self.$form.find('select, input:not(.js-city,#another_country)').attr('disabled', true);
//                $cityInput.attr('disabled', false).val('').focus();
//                self.$anotherCountryCb.attr('disabled', false);
//                $(self.$registPlace).val('');
//                $('#pg-page__offers tbody').html('');
//            }
//        });
//    },
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
        if (!self.showCityWarning()) {
            self.disablerFunc($(this));
            self.senderFunc(true);
        } 
      });
    },
    onloadHandler: function () {
        var self = this;
        $(document).ready(function () {
            if ($('.js-optgroup').length) { 
                stylingOptionGroup();
            }
            if (!self.showCityWarning()) {
                self.senderFunc(false); 
            }
        });
    },
    autoCompleteHandler: function () {
      var self = this;
      $(self.$autoCompleteElement).autoComplete({
        minChars: 1,
        renderItem : function (item,search){
//            if (!self.$anotherCountryCb.is(':checked')) {   // task #157
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                return '<div class="autocomplete-suggestion" data-val="' + item.name + '" data-zone="' + item.zone_alias + '" data-koatuu="' + item.koatuu + '" data-alias="' + item.alias + '">' + item.name.replace(re, "<b>$1</b>") + '</div>';
//            } else {
//                return '';
//            }
        },
        onSelect : function(event, term, item){
            $(self.$registPlace).val(item.data('zone'));
            $(self.$registPlaceKoatuu).val(item.data('koatuu'));
            if (!self.showCityWarning()) {
//                self.$anotherCountryCb.attr('checked',false);   // task #157
                self.$cityInput = term;
                self.$form.find('select, input').removeAttr('disabled');
                self.rollbackCityPrettyUrl(item.data('alias'));
                self.senderFunc(true);
            }        
        },
        source: function(term, response){
//            if (!self.$anotherCountryCb.is(':checked')) {   // task #157
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/api/osago/get-cities',
                    data: 'r=none&api=v1&q='+term,
                    beforeSend: function (jqXHR) {
                            $(self.$registPlace).val('');
                            $(self.$registPlaceKoatuu).val('');
                    },
                    success: function (data) {
                        if (data.answer) {
                            response(data.cities); 
                        } 
                        else {
                              setTimeout(function () {
                                  self.$form.find("input[name='registration_city']").attr('disabled', false).focus();
                                  $('.custom_warning_text').html('Указанного города нет в каталоге' );
                                  $('.custom_warning').show();
                              }, 1000);
                        }
                    },
                    complete: function (jqXHR, textStatus) {
                    }
                });
//            } else {
//                response([]);
//            }
        }
      });
    },
    
    rollbackCityPrettyUrl: function(alias){
        
        if (this.prettyUrlCities().indexOf(alias) > -1) {
            history.pushState(null, null, '/osago/'+alias+'/calculator');
        } else if (window.location.pathname != '/osago/calculator') {
            history.pushState(null, null, '/osago/calculator');
        }
    },
    
    senderFunc: function (is_onload) {
      
      var data = this.$form.serialize();
      var self = this;
      if (is_onload) {
        history.pushState(null, null, window.location.pathname + '?' + data);
      }
      
      // проверяем данные формы. если они такие же, как были при инициализации - отправляем запрос
      if((data != self.formData) || !is_onload) {
          // переписываем данные формы, которые были при инициализации на текущие
          
          $('a.fast_city_select').each(function(){
              $(this).attr('href','/osago/'+$(this).data('alias')+'/calculator'+'?'+data);
          });
          
          self.formData = data;
            $('.overlay').show();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/api/osago/get-offers',
                data: data,
                success: function (data) {
                    $('#pg-page__offers tbody').html(data.html);
                },
                complete: function (jqXHR, textStatus) {

                    // разблокируем элементы формы после выполнения аякса
                    self.$form.find('select, input').removeAttr('disabled');

                    setTimeout(function () {
                      $('.overlay').hide();
                      //$('html, body').animate({
                      //  scrollTop: $('#pg-page__offers').offset().top - 100
                      //  }, 800);
                    }, 500);
                    
                    self.reInitLoadedOffers();
				  
				  
                    //end of AJAX callback function  
                }
            });
        }
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
    showAllCompaniesOffers: function(){
        var self = this;
        var buttonSelector = $('#show_all_companies_offers');
        buttonSelector.click(function(){
            self.$form.find("[name='company']").remove();
            self.senderFunc(true);
            buttonSelector.hide();
        });
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
        var nr = $table.find('thead .b-ch-table__paymentTh').attr('rel');
        var order = 'asc';
        var $price_sort_btn = $table.find('th.b-ch-table__paymentTh');
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
            },
            {
              'all': false,
              'factor': 'lgoty',
              'values': [
                'est_lgoty'
              ]
            },
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
                'yur_litso_taksi',
                'fiz_litso_taksi'
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
    }
  };

  $(function () {
    var offers_form = new $.offersForm("#osago-offers-form");
  });

})(jQuery);
