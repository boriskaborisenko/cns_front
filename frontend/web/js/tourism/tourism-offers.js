/*
AutoComplite Plugin
*/
// jQuery autoComplete v1.0.7
// https://github.com/Pixabay/jQuery-autoComplete
!function(e){e.fn.autoComplete=function(t){var o=e.extend({},e.fn.autoComplete.defaults,t);return"string"==typeof t?(this.each(function(){var o=e(this);"destroy"==t&&(e(window).off("resize.autocomplete",o.updateSC),o.off("blur.autocomplete focus.autocomplete keydown.autocomplete keyup.autocomplete"),o.data("autocomplete")?o.attr("autocomplete",o.data("autocomplete")):o.removeAttr("autocomplete"),e(o.data("sc")).remove(),o.removeData("sc").removeData("autocomplete"))}),this):this.each(function(){function t(e){var t=s.val();if(s.cache[t]=e,e.length&&t.length>=o.minChars){for(var a="",c=0;c<e.length;c++)a+=o.renderItem(e[c],t);s.sc.html(a),s.updateSC(0)}else s.sc.hide()}var s=e(this);s.sc=e('<div class="autocomplete-suggestions '+o.menuClass+'"></div>'),s.data("sc",s.sc).data("autocomplete",s.attr("autocomplete")),s.attr("autocomplete","off"),s.cache={},s.last_val="",s.updateSC=function(t,o){if(s.sc.css({top:s.offset().top+s.outerHeight(),left:s.offset().left,width:s.outerWidth()}),!t&&(s.sc.show(),s.sc.maxHeight||(s.sc.maxHeight=parseInt(s.sc.css("max-height"))),s.sc.suggestionHeight||(s.sc.suggestionHeight=e(".autocomplete-suggestion",s.sc).first().outerHeight()),s.sc.suggestionHeight))if(o){var a=s.sc.scrollTop(),c=o.offset().top-s.sc.offset().top;c+s.sc.suggestionHeight-s.sc.maxHeight>0?s.sc.scrollTop(c+s.sc.suggestionHeight+a-s.sc.maxHeight):0>c&&s.sc.scrollTop(c+a)}else s.sc.scrollTop(0)},e(window).on("resize.autocomplete",s.updateSC),s.sc.appendTo("body"),s.sc.on("mouseleave",".autocomplete-suggestion",function(){e(".autocomplete-suggestion.selected").removeClass("selected")}),s.sc.on("mouseenter",".autocomplete-suggestion",function(){e(".autocomplete-suggestion.selected").removeClass("selected"),e(this).addClass("selected")}),s.sc.on("mousedown",".autocomplete-suggestion",function(t){var a=e(this),c=a.data("val");return(c||a.hasClass("autocomplete-suggestion"))&&(s.val(c),o.onSelect(t,c,a),s.sc.hide()),!1}),s.on("blur.autocomplete",function(){try{over_sb=e(".autocomplete-suggestions:hover").length}catch(t){over_sb=0}over_sb?s.is(":focus")||setTimeout(function(){s.focus()},20):(s.last_val=s.val(),s.sc.hide(),setTimeout(function(){s.sc.hide()},350))}),o.minChars||s.on("focus.autocomplete",function(){s.last_val="\n",s.trigger("keyup.autocomplete")}),s.on("keydown.autocomplete",function(t){if((40==t.which||38==t.which)&&s.sc.html()){var a,c=e(".autocomplete-suggestion.selected",s.sc);return c.length?(a=40==t.which?c.next(".autocomplete-suggestion"):c.prev(".autocomplete-suggestion"),a.length?(c.removeClass("selected"),s.val(a.addClass("selected").data("val"))):(c.removeClass("selected"),s.val(s.last_val),a=0)):(a=40==t.which?e(".autocomplete-suggestion",s.sc).first():e(".autocomplete-suggestion",s.sc).last(),s.val(a.addClass("selected").data("val"))),s.updateSC(0,a),!1}if(27==t.which)s.val(s.last_val).sc.hide();else if(13==t.which||9==t.which){var c=e(".autocomplete-suggestion.selected",s.sc);c.length&&s.sc.is(":visible")&&(o.onSelect(t,c.data("val"),c),setTimeout(function(){s.sc.hide()},20))}}),s.on("keyup.autocomplete",function(a){if(!~e.inArray(a.which,[13,27,35,36,37,38,39,40])){var c=s.val();if(c.length>=o.minChars){if(c!=s.last_val){if(s.last_val=c,clearTimeout(s.timer),o.cache){if(c in s.cache)return void t(s.cache[c]);for(var l=1;l<c.length-o.minChars;l++){var i=c.slice(0,c.length-l);if(i in s.cache&&!s.cache[i].length)return void t([])}}s.timer=setTimeout(function(){o.source(c,t)},o.delay)}}else s.last_val=c,s.sc.hide()}})})},e.fn.autoComplete.defaults={source:0,minChars:3,delay:150,cache:1,menuClass:"",renderItem:function(e,t){t=t.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");var o=new RegExp("("+t.split(" ").join("|")+")","gi");return'<div class="autocomplete-suggestion" data-val="'+e+'">'+e.replace(o,"<b>$1</b>")+"</div>"},onSelect:function(e,t,o){}}}(jQuery);

/*
 * Tourism, get offers via API
 */
(function ($) {
  $.offersForm = function (form) {
    this.$form = $(form);
    this.init();
  };

  $.offersForm.prototype = {
    init: function () {
        this.$autoCompleteElement = this.$form.find("input.js-city")[0];
        this.$country_name = this.$form.find("input[name='country_name']")[0];
        this.$country = this.$form.find("input[name='country']")[0];
        this.selectedCountry = null;
        this.onloadHandler();
        this.onSubmitHandler();
        this.autoCompleteHandler();
    },
    onloadHandler: function () {
        var self = this;
        $(document).ready(function () {
        });
    },
    onSubmitHandler: function () {
      var self = this;
  
      self.$form.on('submit', function (e) {
        e.preventDefault();
        
        self.senderFunc();     
      });
    },
    autoCompleteHandler: function () {
      var self = this;
      $(self.$autoCompleteElement).autoComplete({
        minChars: 0,
        renderItem : function (item,search){
          search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
          var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
          return '<div class="autocomplete-suggestion" data-alias="' + item.alias + '" data-name="' + item.name + '" data-currency="' + item.currency + '" data-sums=\'' + JSON.stringify(item.insurance_sum) + '\'>' + item.name.replace(re, "<b>$1</b>") + '</div>';
        },
        onSelect : function(event, term, item){
            $(self.$country).val(item.data('alias'));
            $(self.$country_name).val(item.data('name'));
            $options = '';
            $.each(item.data('sums'), function( key, value ) {
                $options += '<option value="'+key+'">'+value+' '+item.data('currency')+'</option>';
            });
            self.$form.find('[name="insurance_sum"]').removeAttr('disabled')
            self.$form.find('[name="insurance_sum"]').html('').append($options);
            self.$form.find('[name="insurance_sum"]').material_select();
        },
        source: function(term, suggest){
            term = term.toLowerCase();
            // g_countries init in tourism-calculator.php view
            var matches = [];
            for (i=0; i<g_countries.length; i++)
                if (~g_countries[i].name.toLowerCase().indexOf(term)) 
                    matches.push(g_countries[i]);
            suggest(matches);
        }
      });
    },
    senderFunc: function () {
        var formData = {};
        
        formData.country = this.$form.find('[name="country"]').val();
        formData.country_name = this.$form.find('[name="country_name"]').val();
        formData.purpose = this.$form.find('[name="purpose"]').val();
        formData.transport = this.$form.find('[name="transport"]').val();
        formData.insurance_sum = this.$form.find('[name="insurance_sum"]').val();
        if (this.$form.find('[name="ns_insurance_sum"]').length) {
            formData.ns_insurance_sum = this.$form.find('[name="ns_insurance_sum"]').val();
        }
        formData.date_start = moment(this.$form.find('[name="date_start"]').val(),'DD.MM.YYYY').format("YYYY-MM-DD");
        formData.date_end = moment(this.$form.find('[name="date_end"]').val(),'DD.MM.YYYY').format("YYYY-MM-DD");
               
        formData.ages = [];
        $.each( this.$form.find('[name="ages[]"]'), function( key, value ) {
            formData.ages.push($(value).val());
        });
        
        var data = $.param(formData);
        history.pushState(null, null, window.location.pathname + '?' + data);
        
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/api/tourism/get-offers',
        data: data,
        beforeSend: function( xhr ) {
            $('.overlay').show();
        },
        success: function (data) {
//            $('#tourism-calc-result').html(data.html);
            $('.tbody_result').html(data.html);
        },
        error: function( xhr ) {
            $('#tourism-calc-result').html('Error! Некорректные данные запроса');
        },
        complete: function (jqXHR, textStatus) {
            setTimeout(function () {
              $('.overlay').hide();
            }, 500);
            
        }
      });
    }
  };

  $(function () {
    var offers_form = new $.offersForm("#tourism-offers-form-debug");
  });
  
  
            $('body').on('change','.js-program',function(){
                var program = $(this).val();
                var price = $(this).parents('tr').find('.js-program-'+program).text();
                var id = $(this).data('id');
                price = parseInt(price);
                var form = $('#tourism-offer-form-'+id);
                form.find('[name="programm"]').val(program);
                form.find('[name="price"]').val(price);
            });

            var $row = $('.js-age'),
                $block = $row.find($('.js-age-block')).filter(':first'),
                id = 't_user', //no-index id
                block_count = $('.js-age-block').length,
                block_index = block_count;

            $row.on('click', '.js-age-add', function () {
                var $item = $block.clone();
                block_index++;
                block_count++;

                $item.find('.col').filter(':first').children().removeClass('g-hidden');

                var $input = $item.find('input'),
                    $label = $item.find('label'),
                    input_id = id + block_index;

                $input.attr('id', input_id).val('');
                $label.attr('for', input_id);
                
                $item.find('.js-age-add, .js-age-del').prop('disabled', false);
                $row.find('.js-age-add').prop('disabled', true);

                $row.append($item);
            });

            $row.on('click', '.js-age-del', function () {
                if (block_count === 1) {
                    return false;
                } else {
                    block_count = block_count - 1;

//                    $row.find('.js-age-block').filter(':last').remove();
                    $(this).parent().parent().remove();
                    var $item = $row.find('.js-age-block').filter(':last');

                    $item.find('.js-age-add').prop('disabled', false);
                    if (block_count != 1) {
                        $item.find('.js-age-del').prop('disabled', false);
                    }
                    
                }
            });

        (function () {
            moment.locale('ru');
            var picker_lang = {
                previousMonth: 'Предыдущий месяц',
                nextMonth: 'Следующий месяц',
                months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', "Пятница", 'Суббота'],
                weekdaysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пн', 'Сб']
            };

            var startDate,
                endDate,
                method = {},
                startPicker = new Pikaday({
                    field: document.getElementById('t_date1'),
                    format: 'DD.MM.YYYY',
                    firstDay: 1,
                    yearRange: [2016, 2040],
                    minDate: moment().toDate(),
                    i18n: picker_lang,
                    onSelect: function () {
                        startDate = this.getDate();
                        method.updateStartDate();
                    }
                }),

                endPicker = new Pikaday({
                    field: document.getElementById('t_date2'),
                    format: 'DD.MM.YYYY',
                    firstDay: 1,
                    yearRange: [2016, 2040],
                    minDate: moment().add(1, 'days').toDate(),
                    i18n: picker_lang,
                    onSelect: function () {
                        endDate = this.getDate();
                        method.updateEndDate();
                    }
                });
                
            method.updateEndDate = function() {
                startPicker.setMaxDate(moment(endDate).subtract(1, 'days'));
            };

            method.updateStartDate = function() {
                endPicker.setMinDate(new Date(moment(startDate).add(1, 'days')));
            };

//            method.setStartPeriod = function () {
//                startPicker.setDate(moment().toDate());
//                endPicker.setDate(moment().add(1, 'month').toDate());
//            };
//
//            method.setStartPeriod();
        })();

})(jQuery);