var platform = navigator.platform;
var ua = navigator.userAgent;
var ios = /iPhone|iPad|iPod/.test(platform) && ua.indexOf( "AppleWebKit" ) > -1;
var andriod = ua.indexOf( "Android" ) > -1;
var comiis_scrollTop = 0;
var Comiis_Touch_on = 1;
var Comiis_Touch_openleftnav = 0;
var Comiis_Touch_endtime = 0;
var comiis_load_yes_on = 0;
var Comiis_MENU_on = 0;
var Comiis_MENUS_on = 0;
var Comiis_MENU_Data = new Object;
var comiis_group = 0;


var comiis_date_style = 0;
var POPMENU = new Object;
var popup = {
	init : function() {
		var $this = this;
		$('.popup').each(function(index, obj) {
			obj = $(obj);
			var pop = $(obj.attr('href'));
			if(pop && pop.attr('popup')) {
				pop.css({'display':'none'});
				obj.on('click', function(e) {
					$this.open(pop);
					return false;
				});
			}
		});
		this.maskinit();
	},
	maskinit : function() {
		var $this = this;
		$('#mask').off().on('tap', function() {
			$this.close();
		});
	},
	open : function(pop, type, url) {
		if(typeof pop == 'string' && pop.indexOf("messagetext") >= 0){
			var output = $(pop).find('#messagetext p').html();
			var output_no = output.indexOf("if(typeof");
			pop = (output_no > 0 ? output.substring(0, output_no) : output);
			converter = null;
			type = 'alert';
		}
		
		
		if(typeof pop == 'string') {
			if(!comiis_date_style){
				$('#ntcmsg').remove();
			}else{
				$('#comiis_date_style').remove();
			}
			if(type == 'alerts') {
				pop = '<div class="comiis_tip bg_f cl"><dt class="f_b"><p>'+ pop +'</p></dt><dd class="b_t cl"><a href="javascript:;" onclick="popup.close();" class="tip_btn tip_all bg_f f_b">确定</a></dd></div>'
			} else if(type == 'confirm') {			
			if(comiis_post_btnwz == 1){
				pop = '<div class="comiis_tip bg_f cl"><dt class="f_b"><p>'+ pop +'</p></dt><dd class="b_t cl"><a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">取消</a><a href="'+ url +'" class="tip_btn bg_f f_0"><span class="tip_lx">确定</span></a></dd></div>'
			}else{
				pop = '<div class="comiis_tip bg_f cl"><dt class="f_b"><p>'+ pop +'</p></dt><dd class="b_t cl"><a href="'+ url +'" class="tip_btn bg_f f_0">确定</a><a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">取消</span></a></dd></div>'
			}			
			}
			$('body').append('<div id="'+(comiis_date_style ? 'comiis_date_style' : 'ntcmsg')+'" style="display:none;">'+ pop +'</div>');
			pop = $((comiis_date_style ? '#comiis_date_style' : '#ntcmsg'));
		}
		
		var comiis_textarea = $('#' + pop.attr('id') + ' textarea').length > 0 ? 1 : 0;
		var html_box = pop.html().replace(/-comiis_htmlid-/gm, "newid_");
		
		if(POPMENU[pop.attr('id')]) {
			$('#' + pop.attr('id') + '_popmenu').html(html_box).css({'height':pop.height()+'px', 'width':comiis_textarea ? '90%' : pop.width()+'px'});
		} else {
			pop.parent().append('<div class="dialogbox" id="'+ pop.attr('id') +'_popmenu" style="height:'+ pop.height() +'px;width:'+ (comiis_textarea ? '90%' : pop.width()) +'px;">'+ html_box +'</div>');
		}
		var popupobj = $('#' + pop.attr('id') + '_popmenu');
		var left = comiis_textarea ? '5%' : (window.innerWidth - popupobj.width()) / 2;
		var top = comiis_textarea ? '70px' : (document.documentElement.clientHeight - popupobj.height()) / 2;
		var z_index = comiis_date_style ? '125' : '120'
		popupobj.css({'display':'block','position':'fixed','left':left,'top':top,'z-index':z_index,'opacity':1});
		
		comiis_textarea ? (popupobj.hasClass("comiis_textarea_box") ? '' : popupobj.addClass('comiis_textarea_box')) : popupobj.removeClass('comiis_textarea_box');
		
		if(comiis_date_style){
			$('#comiis_menu_bg').off().on('touchstart', function() {
				comiis_closedate();
				$(this).css('display','none');
				return false;
			}).css({
				'display':'block',
				'width':'100%',
				'height':'100%',
				'position':'fixed',
				'top':'0',
				'left':'0',
				'background':'transparent',
				'z-index':'121'
			});
		}else{
			$('#mask').css({'display':'block','width':'100%','height':'100%','position':'fixed','top':'0','left':'0','background':'black','opacity':'0.6','z-index':'100'});
		}
		POPMENU[pop.attr('id')] = pop;
		$('#ntcmsg').remove();
		
		Comiis_Touch_on = 0;
	},
	comiis_close : function() {
		Comiis_Touch_on = 1;
		Comiis_MENUS_on = 0;
		$('#comiis_bgbox').css('display', 'none');
		$('.comiis_popup').removeClass("comiis_share_box_show");
	},
	close : function() {
		Comiis_Touch_on = 1;
		$('#mask').css('display', 'none');
		$.each(POPMENU, function(index, obj) {
			$('#' + index + '_popmenu').css('display','none');
		});
		comiis_date_style = 0;
	}
};




function comiis_leftnv(){
	if($('.comiis_sidenv_box').length > 0){
		if(!$('.comiis_body').hasClass('comiis_showleftnv')){
			$('body').css({'height' : '100%','width' : '100%', 'overflow' : 'hidden'});
			$('.comiis_leftmenubg,.comiis_sidenv_box').css({'display' : 'block'});
			comiis_scrollTop = $(window).scrollTop();
			// $('.sidenv_li').height($(window).height() - 125);
			$('.comiis_body').css({'height' : '100%', 'overflow' : 'hidden'}).scrollTop(comiis_scrollTop).removeClass('comiis_hideleftnv').addClass("comiis_showleftnv");
			$('.comiis_sidenv_box').on('webkitTransitionEnd transitionend', function() {
				$(this).off('webkitTransitionEnd transitionend');
				$('.sidenv_li ul').css({'overflow-y' : 'scroll'});
				$('.comiis_leftmenubg').on("click", comiis_leftnv);
			});
		}else{
			$('.comiis_leftmenubg').off("click", comiis_leftnv);
			$('.sidenv_li ul').css({'overflow-y': ''});
			$('.comiis_body').removeClass("comiis_showleftnv").addClass('comiis_hideleftnv').on('webkitTransitionEnd transitionend', function() {
				$('.comiis_sidenv_box,.comiis_leftmenubg').css({'display' : 'none'});
				$(this).off('webkitTransitionEnd transitionend').removeClass('comiis_hideleftnv').css({'height' : '', 'overflow' : ''});
				$('body').css({'height' : '','width' : '', 'overflow' : ''});
				$(window).scrollTop(comiis_scrollTop);
			});
		}
	}
}
