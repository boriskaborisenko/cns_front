/*
 * Povaga form
 */
(function ($) {
  $.povagaForm = function (form) {
    this.$form = $(form);
    this.init();
  };

  $.povagaForm.prototype = {
    init: function () {
        this.$validate = this.$form.find("input");
        this.$address = this.$form.find("input[name='address']");
        this.$phone = $(this.$form.find(".js-input-phone--for-brn")[0]);
        this.$name = this.$form.find("input[name='name']");
        this.$email = this.$form.find("input[name='email']");
        this.$check_box_agree = this.$form.find("input[name='osago_want']");
        this.$osago_date_end = this.$form.find("input[name='osago_expires']");
        this.$priceHtml = $('.povaha-price');
        this.price = this.$form.find("input[name='price']");
        this.validRooles = this.rules();
        this.onloadHandler();
        this.onPhoneInput();
        this.onCbxChange();
        this.onChangePhone();
        this.onChangeAddress();
        this.onChangeName();
        this.onChangeEmail();
        this.onSubmitHandler();
        this.validation();
    },
    onloadHandler: function () {
        var self = this;
        $(document).ready(function () {
           self.checkCbx();
           self.checkFields();
        });
    },
    onPhoneInput: function () {
      var self = this;
      self.$phone.on('keyup', function (e) {
        var phone = $(this).val().substring(4).replace(/_/g, "0").replace(/[-]/g, " ");
        $('.js-input-phone--brn').val(phone);
      });
    },
    onCbxChange: function () {
      var self = this;
      self.$check_box_agree.on('change', function (e) {
          self.checkCbx();
          self.checkFields();
      });
    },
    checkCbx: function(){
        if(this.$check_box_agree.prop('checked') == true){
            this.$osago_date_end.prop('disabled',false);
            this.$osago_date_end.attr('required','');
            $('.material-icons.b-callback__timeicon').css('color','#ffec92');
            this.$osago_date_end.removeClass('povaga__field--disabled');
        } else {
            this.$osago_date_end.prop('disabled',true);
            this.$osago_date_end.removeAttr('required');
            $('.material-icons.b-callback__timeicon').css('color','#cfcdc6');
            this.$osago_date_end.addClass('povaga__field--disabled');
            this.$osago_date_end.removeClass('povaga__field--invalid');
        }
    },
    checkFields: function() {
        var changePrice = 0;
        if (this.$email.val() !== '') {
            changePrice = changePrice - 5;
        }
        if (this.$check_box_agree.prop('checked') == true) {
            changePrice = changePrice - 24;
        } 
        this.setPrice(39 + changePrice);
    },
    onChangePhone: function(){
        var self = this;
        self.$phone.on('change', function (e) {
            self.checkFields();     
        });
        if ($('.b-povaga__prev:hidden').length) {
            self.$phone.on('focus', function (e) {
                $('.povaga-excl').hide();     
            });
            self.$phone.on('focusout', function (e) {
                $('.povaga-excl').show();     
            });
        }
    },
    onChangeAddress: function(){
        var self = this;
        self.$address.on('change', function (e) {
            self.checkFields();     
        });
    },
    onChangeName: function(){
        var self = this;
        self.$name.on('change', function (e) {
            self.checkFields();     
        });
    },
    onChangeEmail: function(){
        var self = this;
        self.$email.on('change', function (e) {
            self.checkFields();     
        });
    },
    setPrice: function(value){
        this.price.val(value);
        this.$priceHtml.html(value);
    },
    validator: function(element){
        var name = element.attr('name');
        var check = true;
        var value = element.val();
        var required = element.attr('required');
        var disabled = element.attr('disabled');
        if (required !== undefined || (value.length > 0 && disabled === undefined)) {
          if (typeof name === 'string' && typeof this.validRooles[name] === 'object') {
            if (typeof this.validRooles[name]['transform'] === 'function') {
              value = this.validRooles[name]['transform'](value);
              element.val(value);
            }
            if (typeof this.validRooles[name]['check'] === 'function') {
              check = this.validRooles[name]['check'](value);
            }
            else {
              if (typeof this.validRooles[name]['mask'] !== 'undefined') {
                check = !!value.match(this.validRooles[name]['mask']);
              }
            }
          }
          if (check) {
            element.removeClass('povaga__field--invalid');
            return true;
          }
          else {
            element.addClass('povaga__field--invalid');
            return false;
          }
        }
        else {
          element.removeClass('povaga__field--invalid');
          return true;
        }
    },
    validation: function () {
        var self = this;
        self.$validate.on('blur', function () {
          self.validator($(this));
        });
    },
    validate: function () {
        var self = this;
        var validate = true;
        self.$validate.each(function( index) {
            if(!self.validator($(this))){
                validate = false;
            }
	});
        return validate;
    },
    onSubmitHandler: function () {
      var self = this;
  
      self.$form.on('submit', function (e) {
        if(!self.validate()){
            e.preventDefault();
        } 
      });
    },
    rules: function () {
      return {
        'name': {
          'mask': /^(.{2,30})$/,
          'error': 'Укажите Ваше имя'
        },
        'email': {
          'mask': /^[A-Za-z0-9-_.]+@[A-Za-z0-9-_]+\.[A-Za-z0-9-_]+(\.[A-Za-z0-9-_]+){0,2}$/
        },
        'tel': {
          'mask': /^\+38\s\(0\d{2}\)\s\d{3}-\d{2}-\d{2}$/
        },
        'address': {
          'mask': /^(.{2,100})$/,
          'error': 'Укажите Ваше имя'
        },
        'osago_expires': {
          'mask': /^\d{2}\.\d{2}\.\d{4}$/,
          'error': 'Укажите дату окончания полиса ОСАГО'
        }
      };
    }
  };

  $(function () {
    var povaga_form = new $.povagaForm("#povaga-form");
  });

    /*
     * Datepiker, moment.js, pikaday.js
     */
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