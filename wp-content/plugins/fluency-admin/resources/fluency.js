(function($){
	
	$('#adminmenu div.wp-menu-toggle').unbind("click");
	$('.wp-menu-separator').unbind("click");
	$('#adminmenu li.menu-top .wp-menu-image').unbind("click");
	
	fluencyZebra = {
		
		init:function() {
			
			$('table.form-table tr:even').addClass('even');
		  $('table.form-table tr:odd').addClass('odd');
			
		}
		
	};

	fluencyMenu = {
		
		init:function() {
			
			$('#adminmenu li.wp-has-submenu div.wp-submenu ul').each(function(){
				
				var t = $(this);
				var children = t.children();
				var option_count = parseInt(children.length);
				var menu_height = 12+(option_count*21);
				
				if(menu_height > window.innerHeight){
					t.css('width','200%').addClass('clearfix');
					t.children().eq(1).css('borderTop','1px solid #333');
					children.css('width','50%').css('float','left');
				}
				
				$(this).parent().parent().hoverIntent(
					function(){
						var w = $(window).get(0).innerHeight;
						var ul = $(this).children('div.wp-submenu').fadeIn('fast');
						var mh = ul.get(0).offsetHeight;
						var mt = $(this).get(0).offsetTop;
						var t = parseInt(w)-((parseInt(mt)+15)+parseInt(mh))
						$(this).addClass('hover');
						if(t<0){ul.css('top',parseInt(t)+10);}else if(t>mh){ul.css('top','');}
					},
					function(){
						$(this).children('div.wp-submenu').fadeOut('fast');
						$(this).removeClass('hover');
					}
				);
			});
			
			$('li.wp-menu-separator').remove();
			$('li.wp-menu-separator-last a.separator').text('Hide Menu')
			$('#adminmenu').append($('li.wp-menu-separator-last').remove().clone());
			
			$('a.separator').unbind('click').click(function(){
				if ( $('body').hasClass('hiddenMenu') ) {
					fluencyMenu.fold(1);
					deleteUserSetting( 'mfold' );
				} else {
					fluencyMenu.fold();
					setUserSetting( 'mfold', 'f' );
				}
				return false;
			});
			
			if ( $('body').hasClass('folded') ) {
				$('body').addClass('hiddenMenu').removeClass('folded');
			}

			if ( $('body').hasClass('hiddenMenu') ) {
				this.fold();
			}
			
		},
		
		fold : function(off) {
			if (off) {
				$('body').removeClass('hiddenMenu');
			} else {
				$('body').addClass('hiddenMenu');
			}
		}
			
	};
	
	fluencyKeys = {
		
		init:function() {
			
			var cc = new Array()
			cc[0] = $('li#menu-dashboard').children('div.wp-menu-toggle').text('D').siblings('div.wp-submenu').children('ul').children('li'); // d
			cc[1] = $('li#menu-posts').children('div.wp-menu-toggle').text('P').siblings('div.wp-submenu').children('ul').children('li'); // p
			cc[2] = $('li#menu-pages').children('div.wp-menu-toggle').text('G').siblings('div.wp-submenu').children('ul').children('li'); // g
			cc[3] = $('li#menu-media').children('div.wp-menu-toggle').text('M').siblings('div.wp-submenu').children('ul').children('li'); // m
			cc[4] = $('li#menu-links').children('div.wp-menu-toggle').text('L').siblings('div.wp-submenu').children('ul').children('li'); // l
			cc[5] = $('li#menu-comments').children('div.wp-menu-toggle').text('C').siblings('div.wp-submenu').children('ul').children('li'); // c
			cc[6] = $('li#menu-appearance').children('div.wp-menu-toggle').text('A').siblings('div.wp-submenu').children('ul').children('li'); // a
			cc[7] = $('li#menu-plugins').children('div.wp-menu-toggle').text('N').siblings('div.wp-submenu').children('ul').children('li'); // n
			cc[8] = $('li#menu-users').children('div.wp-menu-toggle').text('U').siblings('div.wp-submenu').children('ul').children('li'); // u
			cc[9] = $('li#menu-tools').children('div.wp-menu-toggle').text('T').siblings('div.wp-submenu').children('ul').children('li'); // t
			cc[10] = $('li#menu-settings').children('div.wp-menu-toggle').text('S').siblings('div.wp-submenu').children('ul').children('li'); // s
			
			var keyArray = new Array('1','2','3','4','5','6','7','8','9','B','E','F','H','I','J','K','O','Q','R','V','W','X','Y','Z');
			
			for(yy=0;yy<cc.length;yy++){
				var xx = 0;
				$(cc[yy]).each(function(){
					if(keyArray[xx]){
						$(this).append("<em>"+keyArray[xx]+"</em>");
					}
					xx = xx+1;
				});
			}
			
			
			var ik = "";
			var i = "";
			var gk = '';
			
			$(document).keydown(function(event) {
				
				if(event.shiftKey || event.metaKey || event.ctrlKey || event.altKey) { return true; }

				var el = event.target.tagName;
				var ek = event.which;
				switch(ek){
					case 68: i = $('li#menu-dashboard'); ik = "d"; break; // d
					case 80: i = $('li#menu-posts'); ik = "p"; break; // p
					case 71: i = $('li#menu-pages'); ik = "g"; break; // g
					case 77: i = $('li#menu-media'); ik = "m"; break; // m
					case 76: i = $('li#menu-links'); ik = "l"; break; // l
					case 67: i = $('li#menu-comments'); ik = "c"; break; // c
					case 65: i = $('li#menu-appearance'); ik = "a"; break; // a
					case 78: i = $('li#menu-plugins'); ik = "n"; break; // n
					case 85: i = $('li#menu-users'); ik = "u"; break; // u
					case 84: i = $('li#menu-tools'); ik = "t"; break; // t
					case 83: i = $('li#menu-settings'); ik = "s"; break; // s
				}

				var fk = ek-49;
				if( el == 'INPUT' || el == 'TEXTAREA' ){
					return true;
				} else if(fk>=0 && fk<42 && i) {
					if(fk>15){
						switch(fk){
							case 17: gk = 9; break; // B
							case 20: gk = 10; break; // E
							case 21: gk = 11; break; // F
							case 23: gk = 12; break; // H
							case 24: gk = 13; break; // I
							case 25: gk = 14; break; // J
							case 26: gk = 15; break; // K
							case 30: gk = 16; break; // O
							case 32: gk = 17; break; // Q
							case 33: gk = 18; break; // R
							case 37: gk = 19; break; // V
							case 38: gk = 20; break; // W
							case 39: gk = 21; break; // X
							case 40: gk = 22; break; // Y
							case 41: gk = 23; break; // Z
						}
					} else {
						gk = fk;
					}
					switch(ik){
						case "d": var d = $('li#menu-dashboard div.wp-submenu ul li a'); break;
						case "p": var d = $('li#menu-posts div.wp-submenu ul li a'); break;
						case "g": var d = $('li#menu-pages div.wp-submenu ul li a'); break;
						case "m": var d = $('li#menu-media div.wp-submenu ul li a'); break;
						case "l": var d = $('li#menu-links div.wp-submenu ul li a'); break;
						case "c": var d = $('li#menu-comments div.wp-submenu ul li a'); break;
						case "a": var d = $('li#menu-appearance div.wp-submenu ul li a'); break;
						case "n": var d = $('li#menu-plugins div.wp-submenu ul li a'); break;
						case "u": var d = $('li#menu-users div.wp-submenu ul li a'); break;
						case "t": var d = $('li#menu-tools div.wp-submenu ul li a'); break;
						case "s": var d = $('li#menu-settings div.wp-submenu ul li a'); break;
					}
					if(dd=$(d[gk]).get(0).href){ window.location=dd; }
				}

				if( el == 'INPUT' || el == 'TEXTAREA' ){
					return true;
				} else if(i) {
					if(i.children('div.wp-submenu').hasClass('open')) {
						var ul = i.children('div.wp-submenu').fadeOut('fast').removeClass('open');
					} else {
						$('#adminmenu li.wp-has-submenu.hover').removeClass('hover').children('div.wp-submenu').fadeOut('fast').removeClass('open');
						var w = $(window).get(0).innerHeight;
						var ul = i.children('div.wp-submenu').fadeIn('fast').addClass('open');
						var mh = ul.get(0).offsetHeight;
						var mt = ul.get(0).offsetTop;
						var t = parseInt(w)-((parseInt(mt)+15)+parseInt(mh))
						if(t<0){ul.css('top',parseInt(t)-15);}else if(t>mh){ul.css('top','');}
					}
					i.toggleClass('hover');
					return false;
				} else {
					return true;
				}

			});
			
		}
		
	};
	
	
	$(document).ready(function(){
		fluencyMenu.init();
		fluencyKeys.init();
		fluencyZebra.init();
		
		$('p.search-box input.button, p#post-search input.button').val('Search');
	
		// Line 160 wp-admin/js/common.dev.js
		// screen settings tab
		$('#show-settings-link').unbind('click').click(function() {
			if ( $('#contextual-help-wrap').hasClass('contextual-help-open') ) {
				$('#contextual-help-wrap').slideUp('fast',function(){
					$('#contextual-help-link').removeClass('show-settings-link-open');
					$(this).removeClass('contextual-help-open');
				});
			}
			$('#screen-options-wrap').slideToggle('fast', function(){
				if ( $(this).hasClass('screen-options-open') ) {
					$('#show-settings-link').removeClass('show-settings-link-open');
					$(this).removeClass('screen-options-open');
				} else {
					$('#show-settings-link').addClass('show-settings-link-open');
					$(this).addClass('screen-options-open');
				}
			});
			return false;
		});

		// help tab
		$('#contextual-help-link').unbind('click').click(function() {
			if ( $('#screen-options-wrap').hasClass('screen-options-open') ) {
				$('#screen-options-wrap').slideUp('fast',function(){
					$('#show-settings-link').removeClass('show-settings-link-open');
					$(this).removeClass('screen-options-open');
				});
			}
			$('#contextual-help-wrap').slideToggle('fast', function(){
				if ( $(this).hasClass('contextual-help-open') ) {
					$('#contextual-help-link').removeClass('show-settings-link-open');
					$(this).removeClass('contextual-help-open');
				} else {
					$('#contextual-help-link').addClass('show-settings-link-open');
					$(this).addClass('contextual-help-open');
				}
			});
			return false;
		});
	
	});

})(jQuery);