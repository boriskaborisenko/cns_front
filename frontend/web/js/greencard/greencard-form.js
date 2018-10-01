(function ($) {
  $.GreencardForm = function (element) {
    this.$element = $(element);
    this.init();
  };

  $.GreencardForm.prototype = {
    init: function () {
      this.productId = this.$element.find("input[name='product_id']").val(); 
      this.$validate = this.$element.find("input");
      this.$submit = this.$element.find("button[type='submit']");
      this.$deliveryType = this.$element.find("[name='delivery_type']");
      this.birth_date = {
          $birth_day : this.$element.find("[name='birth_day']"),
          $birth_month : this.$element.find("[name='birth_month']"),
          $birth_year : this.$element.find("[name='birth_year']")
      };
      this.$totalPrice = this.$element.find(".js-total-price");
      this.$totalPriceInput = this.$element.find("[name='price']");
      this.totalPriceStart = this.$totalPriceInput.val();
      this.$promocode = this.$element.find("[name='promocode']");
      this.$promocode_value = this.$element.find("[name='promocode_value']");
      this.validRooles = this.rules();
      this.submit();
      this.validate();
      this.deliveryHandler();
      this.defaultDelivery();
      this.promocodeHandler();
    },
    rules: function () {
      var self = this;
      return {
        'surname': {
          'mask': /^(.{2,30})$/,
          'error': 'Укажите Вашу фамилию'
        },
        'name': {
          'mask': /^(.{2,30})$/,
          'error': 'Укажите Ваше имя'
        },
        'father_name': {
          'mask': /^(.{2,30})$/,
          'error': 'Укажите Ваше отчество'
        },
        'inn': {
          'mask': /^\d{10}$/,
          'error': 'Некорректный ИНН'
        },
//        'birth_day': {
//          'error': 'Некорректный день рождения',
//          'check': function (value) {
//            return self.checkBirthDate();
//          }
//        },
        'birth_year': {
          'mask': /^\d{4}$/,
          'error': 'Некорректный год рождения'
        },
        'doc_series': {
          'transform': function (value) {
            return value.toUpperCase();
          },
          'mask': /^([A-ZА-Я0-9]{1,3})$/,
          'error': 'Некорректная серия документа'
        },
        'doc_number': {
          'mask': /^(\d{6,8})$/,
          'error': 'Некорректный номер документа'
        },
        'doc_when': {
          'mask': /^\d{2}\.\d{2}\.\d{4}$/,
          'error': 'Некорректный год выдачи паспорта'
        },
        'auto_gos_num': {
          'transform': function (value) {
            return value.toUpperCase();
          },
          'mask': /^(.{3,})$/,
          'error': 'Некорректный Гос. номер'
        },
        'auto_vin': {
          'transform': function (value) {
            return value.toUpperCase();
          },
          'mask': /^([A-Z0-9]{17})$/,
          'error': 'Некорректный VIN-код'
        },
        'auto_mark': {
          'mask': /(.+)/
        },
        'auto_model': {
          'mask': /(.+)/
        },
        'delivery_city': {
          'mask': /^(.{2,})$/
        },
        'new_post_department':{
           'mask': /(.+)/
        },
        'delivery_street': {
          'mask': /^(.{2,})$/
        },
        'delivery_house': {
          'mask': /(.+)/
        },
        'delivery_apartments': {
          'mask': /(.+)/
        },
        'email': {
          'mask': /^[A-Za-z0-9-_.]+@[A-Za-z0-9-_]+\.[A-Za-z0-9-_]+(\.[A-Za-z0-9-_]+){0,2}$/
        },
        'phone': {
          'mask': /^\+38\s\(0\d{2}\)\s\d{3}-\d{2}-\d{2}$/
        }
      };
    },
    validate: function () {
      var self = this;
      self.$validate.on('blur', function () {
        self.validator($(this));
      });
    },
    submit: function () {
      var self = this;
      self.$submit.on('click', function (e) {
        e.preventDefault();
        self.$element.find('input').each(function () {
          self.validator($(this));
        });
        var invalid_elements = self.$element.find('.invalid');
        if (invalid_elements.length > 0) {
          $('html, body').animate({
            scrollTop: $('.invalid').offset().top - 200
          }, 800);
          return false;
        }
        else {
          self.$element.submit();
        }
      });
    },
    validator: function (element) {
      var name = element.attr('name');
      var check = true;
      var value = element.val();
      var required = element.attr('required');
      if (required !== undefined || value.length > 0) {
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
          element.addClass('valid');
          element.removeClass('invalid');
        }
        else {
          element.removeClass('valid');
          element.addClass('invalid');
        }
      }
      else {
        element.removeClass('valid');
        element.removeClass('invalid');
      }
    },
    deliveryHandler: function() {
        var self = this;
        self.$deliveryType.on('change', function () {
            var delivery_value = $(this).val();
            
            if (delivery_value == 'courier') {
                self.$element.find("[name='delivery_city']").val('Киев').removeAttr('required').attr('disabled','disabled').removeClass('invalid').addClass('valid'); 
                //self.$element.find("label[for='delivery_city']").addClass('active');
                self.$element.find('.pg-address__wrap').removeClass('hide');
                self.$element.find('.pg-own-delivery__wrap').addClass('hide');
                
                self.$element.find("[name='delivery_street']").closest('.input-field').removeClass('hide');
                self.$element.find("[name='delivery_house']").closest('.input-field').removeClass('hide');
                self.$element.find("[name='delivery_apartments']").closest('.input-field').removeClass('hide');
                
                self.$element.find("[name='new_post_department']").removeAttr('required').closest('.input-field').addClass('hide');
                self.$element.find('#new-post-offices').addClass('hide');
            } else if (delivery_value == 'own_delivery') {
                self.$element.find("[name='delivery_city']").removeAttr('disabled').removeAttr('required');
                self.$element.find("[name='new_post_department']").removeAttr('required');
                self.$element.find('.pg-address__wrap').addClass('hide');
                self.$element.find('.pg-own-delivery__wrap').removeClass('hide');
            } else if (delivery_value == 'new_post') {
                self.$element.find("[name='delivery_city']").removeAttr('disabled').attr('required','required');
                if (self.$element.find("[name='delivery_city']").val().length > 0) {
                    //self.$element.find("[name='delivery_city']").siblings('label').addClass('active');
                    self.$element.find("[name='delivery_city']").siblings('label');
                }
                self.$element.find('.pg-address__wrap').removeClass('hide');
                self.$element.find('.pg-own-delivery__wrap').addClass('hide');
                
                self.$element.find("[name='delivery_street']").closest('.input-field').addClass('hide');
                self.$element.find("[name='delivery_house']").closest('.input-field').addClass('hide');
                self.$element.find("[name='delivery_apartments']").closest('.input-field').addClass('hide');
                
                self.$element.find("[name='new_post_department']").attr('required','required').closest('.input-field').removeClass('hide');
                self.$element.find('#new-post-offices').removeClass('hide');
            }
        });
    },
    defaultDelivery: function(){
        var self = this;
        $(document).ready(function(){
            var register_place = self.$element.find("input[name='mesto_registratsii']").val();

            switch(register_place) {
                case 'zona_1_kiev':
                case 'zona_2_borispol_boyarka_brovari_vasilkov_vishgorod_vishnevoe_irpen':
                    break;
                default: 
                    self.$element.find('input[name="delivery_type"]').removeAttr('checked');
                    self.$element.find('#test14').prop('checked' , true);
                    self.$element.find('#test14').trigger('change');
                    
            }            
        });
    },
    promocodeHandler: function() {
        var self = this;
        
        self.$promocode.on('change, blur', function () {
            if(self.$promocode.val() != ''){
                var data = {q:self.$promocode.val(),product:self.productId}
                $('.overlay').show();
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/api/promocode/check',
                    data: data,
                    success: function (data) {
                        var priceChange = 0;
                        if(data.answer){
                            if (parseInt(self.$totalPriceInput.val()) > parseInt(data.data.price_limit)) {
                                self.$promocode.removeClass('invalid');
                                self.$promocode.addClass('valid');
                                self.$promocode.parent().removeClass('promocode-error');
                                self.$promocode.parent().removeClass('promocode-not-found');
                                self.$promocode_value.val(data.data.value);
                                switch(data.data.math_operation){
                                    case '+':
                                        priceChange = parseInt(data.data.value);
                                        break;
                                    case '-':
                                        priceChange = -parseInt(data.data.value);
                                        break;
                                    default:
                                        priceChange = 0;
                                }   
                            } else {
                                self.$promocode.removeClass('valid');
                                self.$promocode.addClass('invalid');
                                self.$promocode.parent().addClass('promocode-error');
                                self.$promocode.parent().removeClass('promocode-not-found');
                            }
                        } else {
                            self.$promocode.removeClass('valid');
                            self.$promocode.addClass('invalid');
                            self.$promocode.parent().removeClass('promocode-error');
                            self.$promocode.parent().addClass('promocode-not-found');
                        }
                        
                        self.$promocode_value.val(priceChange);

                    },
                    complete: function (jqXHR, textStatus) {
                        setTimeout(function () {
                          $('.overlay').hide();
                        }, 500);
                        
                        self.updatePrice();
                        //end of AJAX callback function  
                    }
                });
            }
        });
    },
    checkPromocodePrice: function() {
        return parseInt(this.$promocode_value.val());   
    },
    updatePrice: function() {
        var promocodePrice = this.checkPromocodePrice();
        var sumPriceChange = promocodePrice;  
        
        this.$totalPriceInput.val(parseInt(this.totalPriceStart) + sumPriceChange);
        this.$totalPrice.html(parseInt(this.totalPriceStart) + sumPriceChange);
    }
  };

  $(function () {
    var greencard_form = new $.GreencardForm("#greencard-order-form-oform");
  });

})(jQuery);