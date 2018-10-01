/*
 * Moto-kasko, get offers via API
 */
(function ($) {
  $.offersForm = function (form) {
    this.$form = $(form);
    this.init();
  };

  $.offersForm.prototype = {
    init: function () {
      this.$changeElements = this.$form.find("select,input[type='checkbox'],input[type='radio']");
      this.$marketPrice = this.$form.find('input[name="moto_market_price"]');
//      this.onloadHandler();
      this.onchangeHandler();
      this.onSubmitHandler();
    },
    onchangeHandler: function () {
      var self = this;
      
      self.$changeElements.on('change', function () {
        self.senderFunc(true);     
      });
    },
    onSubmitHandler: function () {
      var self = this;
      
      this.$form.on('submit', function (e) {
        e.preventDefault();
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
        if ($.isNumeric(self.$marketPrice.val()) && self.$marketPrice.val() >= 60000) {
            self.$marketPrice.removeClass('invalid');
            $('.custom_warning').hide();
        } else {
            self.$marketPrice.addClass('invalid');
            //$('#moto-kasko-price-more-59999').openModal();
            $('.custom_warning').show();
            return false;
        }
        var data = this.$form.serialize();
        if (is_onload) {
          history.pushState(null, null, window.location.pathname + '?' + data);
        }
        $('.overlay').show();
        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: '/api/moto-kasko/get-offers',
          data: data,
          success: function (data) {
              $('#pg-page__offers tbody').html(data.html);
          },
          complete: function (jqXHR, textStatus) {
              setTimeout(function () {
                $('.overlay').hide();
              }, 500);

              self.reInitLoadedOffers();
          }
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
    var offers_form = new $.offersForm("#moto-kasko-offers-form");
  });

})(jQuery);