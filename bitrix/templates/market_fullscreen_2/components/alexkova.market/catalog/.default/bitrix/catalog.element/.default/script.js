//fixed scroll btn
var StickyElement = function(node){
  var doc = $(document), 
      fixed = false,
      anchor = node.find('.sticky-anchor'),
      content = node.find('.sticky-content');
  
  var onScroll = function(e){
    var docTop = doc.scrollTop(),
        anchorTop = anchor.offset().top;
    
    //console.log('scroll', docTop, anchorTop);
    if((docTop + $(window).height()) > anchorTop){
      if(!fixed){
        anchor.height(content.outerHeight());
        content.addClass('fixed');        
        fixed = true;
      }
    }  else   {
      if(fixed){
        anchor.height(0);
        content.removeClass('fixed'); 
        fixed = false;
      }
    }
  };
  
  $(window).on('scroll', onScroll);
};

var demo = new StickyElement($('#formBtn'));







var formRequestMsg;
var trade_name;
var trade_id;
var trade_link;
var current_offer_id = 0; 

$(document).on(
    'click',
    '.quantity-button-offer-minus, .quantity-button-offer-plus',
    function(){
        if ($(this).hasClass('quantity-button-offer-minus')){
            id = parseInt($(this).attr('id').replace('quantity-button-minus-',''));
            valOld = parseInt($('#quantity-offer-'+id).val());
            valNew = valOld-1;
            if (valNew<1) valNew = 1;
            $('#quantity-offer-'+id).val(valNew);
        };
        if ($(this).hasClass('quantity-button-offer-plus')){
            id = parseInt($(this).attr('id').replace('quantity-button-plus-',''));
            valOld = parseInt($('#quantity-offer-'+id).val());
            valNew = valOld+1;
            $('#quantity-offer-'+id).val(valNew);
        };
    }
);

function setBasketIds(id) {
    $('#bxr-market-detail-basket-btn-wrap .offers-btn-wrap').hide();
    $('#bxr-market-detail-basket-btn-wrap .offers-btn-wrap[data-item="'+id+'"]').show();
}

$(document).on('click', '.bxr-detail-tabs li', function() {
    var tabCode = $(this).data('tab');
    $('.bxr-detail-tabs li').removeClass('active');
    $(this).addClass('active');
    $('.bxr-detail-tab').hide();
    $('.bxr-detail-tab[data-tab="'+tabCode+'"]').show();

    if(tabCode=="element-video")
        $(window).trigger('resize');
});

$(document).on('click', '.bxr-detail-top-tabs li', function() {
    var tabCode = $(this).data('tab');
    $('.bxr-detail-tab').hide();
    $('.bxr-detail-tabs li').removeClass('active');
    $('.bxr-detail-tabs li[data-tab="'+tabCode+'"]').addClass('active');
    $('.bxr-detail-tab[data-tab="'+tabCode+'"]').show();
    var tabOffset = 0;
    if ($('.bxr-menuline').hasClass('affix') || $('.bxr-menuline').hasClass('affix-top')) tabOffset = $('.bxr-menuline').height();
    window.BXReady.scrollTo('.bxr-detail-tabs', {offsetTop: 2*tabOffset});
    
    if(tabCode=="element-video")
        $(window).trigger('resize');
});

$(document).on('click', '.bxr-share-group', function() {
    $('.bxr-share-icon-wrap').toggle();
});

function resizeVideo() {
    if($("#container-video-mej").length>0) {    
        var correlation = 1.7;
        w = $(".mej").parent("div").width();

        if(w<200)
           w = 200; 

        $(".mej .mejs-container").not(".mejs-container-fullscreen").css({
            width:  w+"px",
            height: (w/correlation)+"px"
        });
    }
}

$(window).resize(function() {
    resizeVideo();
});

function setSkuUrl(id) {
    
    if(!useSelectSku)
        return false;
    
    if(id!=0 && id!=null)
        history.replaceState(null, null, '?offer='+id);
    
    if(!id) {
        url = window.location.href;
        url = url.substring(0,(url.lastIndexOf('/')+1));
        history.replaceState(null, null, url);
    }
        
}

function selectSKU(offers_view, id, params) {
    
    if(!useSelectSku)
        return false;
    
    if(offers_view == "SELECT") {
        if(id != 0)
            $(".bxr-sku-select-item[data-pid = " + id + "]").trigger("click");
        else
            $(".bxr-sku-select-item:first").trigger("click");
    }
    else if (offers_view == "ICONS") {
        if(id!=0)
            $(".bxr-sku-icons-item[data-pid = " + id + "]").trigger("click", [true]);
        else
            $(".bxr-sku-icons-item:first").trigger("click", [true]);
    }
    else if (offers_view == "CHOISE") {
        for (var item in params) {
            
            if(params[item].val=="" || params[item].id=="")
                continue;
            if(id!=0) {       
                $("#bxr-market-sku-select-wrap [data-prop-id='" + params[item].id + "']  [data-val-code='" + params[item].val + "'] ").trigger("click", [true]);
            }
            else
                $("#bxr-market-sku-select-wrap [data-prop-id='" + params[item].id + "'] li:first").trigger("click", [true]);
        }
        
        if (params[item] != undefined  ) {
            offerImg = params[item].url;        
            if(offerImg!="") {
                $($('.ax-element-slider-main .slick-list .slick-track a')[0]).find('img').attr('src', offerImg);
                $($('.ax-element-slider-main .slick-list .slick-track a')[0]).attr('href', offerImg);
                $($('.ax-element-slider-main .slick-list .slick-track a')[0]).find('img').attr('data-large', offerImg);
                $('.magnifier img').attr('src', offerImg);
                $($('.ax-element-slider-nav .slick-slide:not(.slick-cloned)')[0]).find('img').attr('src', offerImg);
                $($('.ax-element-slider-nav .slick-slide:not(.slick-cloned)')[0]).trigger('click');
            }
        }
        
    }
    
    setSkuUrl(id);
}

$(document).ready(function() {

    if($("#container-video-iframe").length>0) {    
        $('.element-video-card-iframe .video-img').click(function() {
            url = $(this).attr("data-url");
            
            if(url === undefined || url == "")
                return false;
            
            if((url.indexOf('youtu.be') + 1) || (url.indexOf('youtube.com/watch') + 1) ) {
                url = url.replace(new RegExp("https:", "i"), '');
                url = url.replace(new RegExp("http:", "i"), '');
                url = url.replace(new RegExp("\\/\\/youtu.be\\/", "i"), 'http://www.youtube.com/v/');
                url = url.replace(new RegExp("watch\\?v=", "i"), 'v/');
            }

            $.fancybox ({
                'type'              :   'iframe',
                'href'              :   url,
                'transitionIn'      :   'elastic',
                'transitionOut'     :   'elastic',
                'speedIn'           :   600,
                'speedOut'          :   200,
                'overlayShow'       :   false
            });
            return false;
        });
    }
    
    if($("#container-video-mej").length>0) {
        $('video').mediaelementplayer({
            plugins: ['flash','silverlight','youtube','vimeo'],
            success: function() {
                resizeVideo();
            }
        });
    }
    //$($('.bxr-detail-tabs li')[0]).click();
	$('div.bxr-detail-tab[data-tab="detail"]').show();
});

(function (window)
{
	if (!!window.JCShareButtons)
	{
		return;
	}

	window.JCShareButtons = function (containerId)
	{
		if (containerId)
		{
			var container = BX(containerId);
			if (container)
			{
				this.shareButtons = BX.findChildren(container, {tagName: 'LI'}, true);
				if (this.shareButtons && this.shareButtons.length >= 1)
				{
					BX.bind(this.shareButtons[this.shareButtons.length-1], 'click', BX.delegate(this.alterVisibility, this));
				}
			}
		}
	};

	window.JCShareButtons.prototype.alterVisibility = function()
	{
		if (this.shareButtons && this.shareButtons.length >= 1)
		{
			for (var i = 0; i < this.shareButtons.length-1; i++)
			{
				var li = this.shareButtons[i];
				li.style.display = li.style.display == "none"? "": "none";
			}
		}
	};
}
)(window);

function __function_exists(function_name)
{
	if (typeof function_name == 'string')
	{
		return (typeof window[function_name] == 'function');
	}
	else
	{
		return (function_name instanceof Function);
	}
}

window.onload=function(){
	//перемещаем кол-во в строку рейтинга
	if($(window).width() < 992)
	{
		$('.rating-title').html($('#quantity_mob').html());
		$('#quantity_mob').hide();
	}
	//считаю кол-во комментариев и вывожу их
	$('#count_top_reviews').html($('.blog-comment-content').length);
}
$(document).ready(function() {
	//на мобилках делаем цвет кнопки "В корзину" белым, а "Купить в 1 клик" - зеленым
	//if($(window).width() < 600)
	//{
		$('#formBtn .boottomBlock .bxr-basket-add').attr('style', 'background: #fff !important;');
		$('#formBtn .boottomBlock .bxr-basket-action button').attr('style', 'background: #02a836 !important;');
	//}
	if($(window).width() < 365)
	{
		$('#tab_props').html('Применение');
	}
});

function SetDeliveryBlock()
{
	if($('#top_delivery_info').attr("data-state") == 0)
	{
		$('#top_delivery_info').html($('#openPopup').html());
		$('#top_delivery_info').attr("data-state", "1");
	}else{
		$('#top_delivery_info').html("");
		$('#top_delivery_info').attr("data-state", "0");
	}
}