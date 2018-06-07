!function(e){jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{easeOutBounce:function(e,a,t,i,o){return(a/=o)<1/2.75?i*(7.5625*a*a)+t:2/2.75>a?i*(7.5625*(a-=1.5/2.75)*a+.75)+t:2.5/2.75>a?i*(7.5625*(a-=2.25/2.75)*a+.9375)+t:i*(7.5625*(a-=2.625/2.75)*a+.984375)+t},easeOutElastic:function(e,a,t,i,o){var n=1.70158,r=0,s=i;if(0==a)return t;if(1==(a/=o))return t+i;if(r||(r=.3*o),s<Math.abs(i)){s=i;var n=r/4}else var n=r/(2*Math.PI)*Math.asin(i/s);return s*Math.pow(2,-10*a)*Math.sin((a*o-n)*(2*Math.PI)/r)+i+t},easeOutExpo:function(e,a,t,i,o){return a==o?t+i:i*(-Math.pow(2,-10*a/o)+1)+t}}),e.BXReady={showAjaxShadow:function(e,a,t){1==t?($(e).addClass("ajax-shadow"),$(e).addClass("ajax-shadow-r")):($("div").is("#"+a)||$('<div id="'+a+'" class="ajax-shadow"></div>').appendTo("body"),$("#"+a).show(),$("#"+a).width($(e).width()),$("#"+a).height($(e).outerHeight()),$("#"+a).css("top",$(e).offset().top+"px"),$("#"+a).css("left",$(e).offset().left+"px"))},closeAjaxShadow:function(e,a){1==a?($(e).removeClass("ajax-shadow-r"),$(e).removeClass("ajax-shadow")):$("#"+e).hide()},scrollTo:function(e){$("html, body").animate({scrollTop:$(e).offset().top-20+"px"},{duration:500})},autosizeVertical:function(){maxHeight=0,$("div.bxr-v-autosize").each(function(){$(this).height()>maxHeight&&(maxHeight=$(this).height())}),$("div.bxr-v-autosize").each(function(){delta=Math.round((maxHeight-$(this).height())/2),$(this).css({"padding-top":delta+"px","padding-bottom":delta+"px"})})}},e.BXReady.Market={loader:[],setPriceCents:function(){$(".bxr-format-price").each(function(){price=$(this).html(),newPrice=price.replace(/(\.\d\d)/g,"<sup>$1</sup>"),newPrice=newPrice.replace(/(\.)/g,""),$(this).html(newPrice)})},bestsellersAjaxUrl:"/ajax/bestsellers.php",markersAjaxUrl:"/ajax/markers.php"},$(document).on("click",".search-btn",function(){var e=$("#searchline");e.is(":visible")?e.fadeOut():e.fadeIn()}),$(document).on("click",".bxr-mobile-login-icon",function(){$(".bxr-mobile-login-area").fadeOut(200,function(){$(".phone-ico").fadeIn(200)})}),$(document).on("click",".bxr-mobile-phone-icon",function(){$(".phone-ico").fadeOut(200,function(){$(".bxr-mobile-login-area").fadeIn(200)})}),$(e).on("resize",function(){$(e).width()>960?$(".bxr-mobile-phone-area").fadeOut(200,function(){$(".bxr-mobile-login-area").fadeIn(200)}):$(".bxr-mobile-phone-area").fadeIn(200,function(){$(".bxr-mobile-login-area").fadeOut(200)})}),$(document).on("click",".mobile-footer-menu-tumbl",function(){$(this).next().toggle()}),$(document).on("click",".delivery-item-more",function(){"none"==$(this).prev(".delivery-item-text").css("display")?($(this).prev(".delivery-item-text").slideDown(),$(this).html('<span class="fa fa-angle-up"></span>')):($(this).prev(".delivery-item-text").slideUp(),$(this).html('<span class="fa fa-angle-down"></span>'))}),e.onload=function(){"object"!=typeof e.BXReady.Market.loader&&(e.BXReady.Market.loader=[]);for(var a in e.BXReady.Market.loader)"function"==typeof e.BXReady.Market.loader[a]&&e.BXReady.Market.loader[a]()},"object"!=typeof e.BXReady.Market.loader&&(e.BXReady.Market.loader=[]),e.BXReady.Market.loader.push(BXReady.autosizeVertical),$(e).resize(function(){BXReady.autosizeVertical()}),$('.bxr-section-desc').readmore({moreLink: '<a href="#" style="margin-bottom: 15px;">Читать полностью</a>',lessLink: '<a href="#" style="margin-bottom: 15px;">Свернуть</a>',maxHeight: 70})}(window);
function getBrowserInfo() {
    var t,v = undefined;
    if (window.chrome) t = 'Chrome';
    else if (window.opera) t = 'Opera';
    else if (document.all) {
        t = 'IE';
        var nv = navigator.appVersion;
        var s = nv.indexOf('MSIE')+5;
        v = nv.substring(s,s+1);
    }
    else if (navigator.appName) t = 'Netscape';
    return {type:t,version:v};
}
function bookmark(a){
    var url = window.document.location;
    var title = window.document.title;
    var b = getBrowserInfo();
    if (b.type == 'IE' && 8 >= b.version && b.version >= 4) window.external.AddFavorite(url,title);
    else if (b.type == 'Opera') {
        a.href = url;
        a.rel = "sidebar";
        a.title = url+','+title;
        return true;
    }
    else if (b.type == "Netscape") window.sidebar.addPanel(title,url,"");
    else alert("Нажмите CTRL-D, чтобы добавить страницу в закладки.");
    return false;
}   


Share = {
    go: function(_element, _options) {
        var
            self = Share,
            options = $.extend(
                {
                    type:       'vk',    // тип соцсети
                    url:        location.href,  // какую ссылку шарим
                    count_url:  location.href,  // для какой ссылки крутим счётчик
                    title:      document.title, // заголовок шаринга
                    image:      param('image'),             // картинка шаринга
                    text:       param('description'),             // текст шаринга
                },
                $(_element).data(), // Если параметры заданы в data, то читаем их
                _options            // Параметры из вызова метода имеют наивысший приоритет
            );
console.log("options = "+options.description);

        if (self.popup(link = self[options.type](options)) === null) {
            // Если не удалось открыть попап
            if ( $(_element).is('a') ) {
                // Если это <a>, то подставляем адрес и просим браузер продолжить переход по ссылке
                $(_element).prop('href', link);
                return true;
            }
            else {
                // Если это не <a>, то пытаемся перейти по адресу
                location.href = link;
                return false;
            }
        }
        else {
            // Попап успешно открыт, просим браузер не продолжать обработку
            return false;
        }
		function param(name) {
			return $('meta[property=og\\:' + name + ']').attr('content');
        }
    },

    // ВКонтакте
    vk: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);

        return 'https://vkontakte.ru/share.php?'
            + 'url='          + encodeURIComponent(options.url)
            + '&title='       + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&image='       + encodeURIComponent(options.image)
            + '&noparse=true';
    },

    // Одноклассники
    ok: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);

        return 'https://connect.ok.ru/offer?'
            + '&url='    + encodeURIComponent(options.url)
            + '&title=' + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&imageUrl=' + encodeURIComponent(options.image);

    },

    // Facebook
    fb: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);

        return 'https://www.facebook.com/sharer.php?s=100'
            + '&p[title]='     + encodeURIComponent(options.title)
            + '&p[summary]='   + encodeURIComponent(options.text)
            + '&p[url]='       + encodeURIComponent(options.url)
            + '&p[images][0]=' + encodeURIComponent(options.image);
    },

    // Живой Журнал
    lj: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                text:   '',
            }, _options);

        return 'https://livejournal.com/update.bml?'
            + 'subject='        + encodeURIComponent(options.title)
            + '&event='         + encodeURIComponent(options.text + '<br/><a href="' + options.url + '">' + options.title + '</a>')
            + '&transform=1';
    },

    // Твиттер
    tw: function(_options) {
        var options = $.extend({
                url:        location.href,
                count_url:  location.href,
                title:      document.title,
            }, _options);

        return 'https://twitter.com/share?'
            + 'text='      + encodeURIComponent(options.title)
            + '&url='      + encodeURIComponent(options.url)
            + '&counturl=' + encodeURIComponent(options.count_url);
    },

    // Mail.Ru
    mr: function(_options) {
        var options = $.extend({
                url:    location.href,
                title:  document.title,
                image:  '',
                text:   '',
            }, _options);

        return 'https://connect.mail.ru/share?'
            + 'url='          + encodeURIComponent(options.url)
            + '&title='       + encodeURIComponent(options.title)
            + '&description=' + encodeURIComponent(options.text)
            + '&imageurl='    + encodeURIComponent(options.image);
    },

    // Открыть окно шаринга
    popup: function(url) {
        return window.open(url,'','toolbar=0,status=0,scrollbars=1,width=626,height=436');
    }
}
// Все элементы класса .social_share считаем кнопками шаринга
$(document).on('click', '.social_share', function(){
    Share.go(this);
});

window.onload = function() {
	//valid phone
	$(".phones").mask("+7(999)999-99-99");//маска
}

(function(win, doc, $) {

    $(doc).on('submit', '#auth_form-popup', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: 'is-ajax=Y&' + form.serialize(),
            success: function (response) {
                var data = $(response).find('.form-error').text();
                if($.trim(data).length)
                    form.find('.form-error').text(data);
                else
                    win.location.reload();
            }
        });
    });

}(window, document, jQuery));

$(function(){
        var bodyBlock = $('.newMenuWrap.body');
        var mainBlock = $('.newMenuWrap.mainUhod');
        var makeupBlock = $('.newMenuWrap.makeupBlock');
        var specialBlock = $('.newMenuWrap.specialBlock');
        var hairBlock = $('.newMenuWrap.hairBlock');
        var brandBlock = $('.newMenuWrap.brandBlock');

        $('.newMenuWrap.body').remove();
        $('.newMenuWrap.mainUhod').remove();
        $('.newMenuWrap.specialBlock').remove();
        $('.newMenuWrap.hairBlock').remove();
        $('.newMenuWrap.brandBlock').remove();

        $('.bxr-v-line_menu nav a[href="/catalog/telo/"]').next().addClass('hiddenFixed bodyBLock');
        $('.bxr-v-line_menu nav a[href="/catalog/telo/"]').next().html(bodyBlock);

        $('.bxr-v-line_menu nav a[href="/catalog/base/"]').next().addClass('hiddenFixed mainBLock');
        $('.bxr-v-line_menu nav a[href="/catalog/base/"]').next().html(mainBlock);

        $('.bxr-v-line_menu nav a[href="/catalog/makiyazh/"]').next().addClass('hiddenFixed makeupBlock');
        $('.bxr-v-line_menu nav a[href="/catalog/makiyazh/"]').next().html(makeupBlock);

        $('.bxr-v-line_menu nav a[href="/catalog/special/"]').next().addClass('hiddenFixed specialBlock');
        $('.bxr-v-line_menu nav a[href="/catalog/special/"]').next().html(specialBlock);

        $('.bxr-v-line_menu nav a[href="/catalog/volosy/"]').next().addClass('hiddenFixed hairBlock');
        $('.bxr-v-line_menu nav a[href="/catalog/volosy/"]').next().html(hairBlock);

        $('.bxr-v-line_menu nav a[href="/brands/"]').next().addClass('hiddenFixed brandBlock');
        $('.bxr-v-line_menu nav a[href="/brands/"]').next().html(brandBlock);

        $('.askQ').click(function(){
            if ($('#FAQ').css('display') == 'none') {
                $('#FAQ').css('display', 'block');
                $(this).text('Скрыть форму');
            } else {
                $('#FAQ').css('display', 'none');
                $(this).text('Задать вопрос');
            }
        });

        $('.bxr-top-line-auth li a').each(function(){
            if($(this).attr('href') == 'location.pathname'){
                $(this).addClass('activeTopLink');
            }
        });

        $('#FAQ').submit(function(e){
            $('.errorField').css('display', 'none');

            e.preventDefault();

            var nameVal = $('input[name="PROPERTY[220][0]"]').val();
            var emailVal = $('input[name="PROPERTY[221][0]"]').val();
            var textValForm = $('textarea[name="PROPERTY[222][0]"]').val();

            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

            var flagCheck = 1;

            if(nameVal == ''){
                flagCheck = 0;
                $('.errorField.name').css('display', 'block');
                $('.errorField.name').text('Поле обязательно для заполнения');
            }
            
            if(emailVal == ''){
                flagCheck = 0;
                $('.errorField.email').css('display', 'block');
                $('.errorField.email').text('Поле обязательно для заполнения');
            } else {
                if (!pattern.test(emailVal)){
                    flagCheck = 0;
                    $('.errorField.email').css('display', 'block');
                    $('.errorField.email').text('Некорректный e-mail');
                }
            }

            if(textValForm == ''){
                flagCheck = 0;
                $('.errorField.text').css('display', 'block');
                $('.errorField.text').text('Поле обязательно для заполнения');
            }

            
            if (flagCheck == 0) {
                $('.errorField.msg').css('display', 'block');
                return false;
            }

            if (flagCheck == 1) {
                $.ajax({
                      url: "/faq.php",
                      type: "POST",
                      data: 'name=' + nameVal + '&email=' + emailVal + '&text=' + textValForm,

                      success: function(data){
                          $('#popupSuccessFAQ').css('display', 'block');
                          $('#FAQ').remove();
                      }
                });
            }
        });
    })

