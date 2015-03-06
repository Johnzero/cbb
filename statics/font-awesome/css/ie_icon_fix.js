/*!
 *  IE8 Icon Fix: This javascript file selectively replaces all font-awesome icons to spans filled with dataicons.
 *  Applicable to Font-Awesome version 3.1.0
 *
 *  Author: Sandeep
 *  -------------------------------------------------------
 *  Email: sandeep048@gmail.com
*/

function isIE () {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}

$(document).ready(function() {
	if ((isIE ()) && (isIE () < 9)) {
		var icon_char_map = {"icon-building": "&#xf0f7;", "icon-tint": "&#xf043;", "icon-list-ol": "&#xf0cb;", "icon-folder-open": "&#xf07c;", "icon-refresh": "&#xf021;", "icon-chevron-down": "&#xf078;", "icon-signal": "&#xf012;", "icon-list": "&#xf03a;", "icon-h-sign": "&#xf0fd;", "icon-maxcdn": "&#xf136;", "icon-gift": "&#xf06b;", "icon-unlock": "&#xf09c;", "icon-bell": "&#xf0a2;", "icon-pinterest": "&#xf0d2;", "icon-book": "&#xf02d;", "icon-spinner": "&#xf110;", "icon-plus-sign": "&#xf055;", "icon-leaf": "&#xf06c;", "icon-code-fork": "&#xf126;", " ": " ", "icon-external-link": "&#xf08e;", "icon-crop": "&#xf125;", "icon-coffee": "&#xf0f4;", "icon-meh": "&#xf11a;", "icon-tablet": "&#xf10a;", "icon-arrow-left": "&#xf060;", "icon-asterisk": "&#xf069;", "icon-keyboard": "&#xf11c;", "icon-bullhorn": "&#xf0a1;", "icon-angle-up": "&#xf106;", "icon-chevron-right": "&#xf054;", "icon-eraser": "&#xf12d;", "icon-circle-arrow-left": "&#xf0a8;", "icon-edit": "&#xf044;", "icon-star": "&#xf005;", "icon-minus": "&#xf068;", "icon-save": "&#xf0c7;", "icon-info": "&#xf129;", "icon-lightbulb": "&#xf0eb;", "icon-barcode": "&#xf02a;", "icon-plus": "&#xf067;", "icon-zoom-in": "&#xf00e;", "icon-check-minus": "&#xf147;", "icon-bookmark": "&#xf02e;", "icon-sort-up": "&#xf0de;", "icon-off": "&#xf011;", "icon-retweet": "&#xf079;", "icon-folder-open-alt": "&#xf115;", "icon-facetime-video": "&#xf03d;", "icon-star-half-empty": "&#xf123;", "icon-stethoscope": "&#xf0f1;", "icon-certificate": "&#xf0a3;", "icon-beaker": "&#xf0c3;", "icon-rss-sign": "&#xf143;", "icon-bar-chart": "&#xf080;", "icon-fullscreen": "&#xf0b2;", "icon-move": "&#xf047;", "icon-flag": "&#xf024;", "icon-user": "&#xf007;", "icon-rocket": "&#xf135;", "icon-eye-open": "&#xf06e;", "icon-chevron-sign-up": "&#xf139;", "icon-envelope-alt": "&#xf0e0;", "icon-tags": "&#xf02c;", "icon-unlock-alt": "&#xf13e;", "icon-th": "&#xf00a;", "icon-mobile-phone": "&#xf10b;", "icon-th-list": "&#xf00b;", "icon-repeat": "&#xf01e;", "icon-ok-sign": "&#xf058;", "icon-fast-backward": "&#xf049;", "icon-linkedin": "&#xf0e1;", "icon-edit-sign": "&#xf14b;", "icon-star-half": "&#xf089;", "icon-arrow-right": "&#xf061;", "icon-warning-sign": "&#xf071;", "icon-info-sign": "&#xf05a;", "icon-food": "&#xf0f5;", "icon-map-marker": "&#xf041;", "icon-paper-clip": "&#xf0c6;", "icon-lemon": "&#xf094;", "icon-anchor": "&#xf13d;", "icon-magic": "&#xf0d0;", "icon-hand-right": "&#xf0a4;", "icon-flag-alt": "&#xf11d;", "icon-align-center": "&#xf037;", "icon-align-justify": "&#xf039;", "icon-key": "&#xf084;", "icon-download": "&#xf01a;", "icon-copy": "&#xf0c5;", "icon-comments": "&#xf086;", "icon-facebook-sign": "&#xf082;", "icon-stop": "&#xf04d;", "icon-twitter": "&#xf099;", "icon-superscript": "&#xf12b;", "icon-angle-down": "&#xf107;", "icon-microphone-off": "&#xf131;", "icon-angle-left": "&#xf104;", "icon-sitemap": "&#xf0e8;", "icon-tasks": "&#xf0ae;", "icon-thumbs-up": "&#xf087;", "icon-double-angle-up": "&#xf102;", "icon-ellipsis-vertical": "&#xf142;", "icon-time": "&#xf017;", "icon-resize-vertical": "&#xf07d;", "icon-angle-right": "&#xf105;", "icon-smile": "&#xf118;", "icon-chevron-up": "&#xf077;", "icon-film": "&#xf008;", "icon-headphones": "&#xf025;", "icon-bell-alt": "&#xf0f3;", "icon-underline": "&#xf0cd;", "icon-file": "&#xf016;", "icon-calendar": "&#xf073;", "icon-eject": "&#xf052;", "icon-circle-arrow-up": "&#xf0aa;", "icon-fire": "&#xf06d;", "icon-user-md": "&#xf0f0;", "icon-calendar-empty": "&#xf133;", "icon-unlink": "&#xf127;", "icon-terminal": "&#xf120;", "icon-step-backward": "&#xf048;", "icon-bookmark-empty": "&#xf097;", "icon-minus-sign": "&#xf056;", "icon-ban-circle": "&#xf05e;", "icon-html5": "&#xf13b;", "icon-star-empty": "&#xf006;", "icon-lock": "&#xf023;", "icon-signin": "&#xf090;", "icon-minus-sign-alt": "&#xf146;", "icon-gamepad": "&#xf11b;", "icon-pushpin": "&#xf08d;", "icon-cloud-upload": "&#xf0ee;", "icon-download-alt": "&#xf019;", "icon-heart": "&#xf004;", "icon-circle-arrow-down": "&#xf0ab;", "icon-indent-left": "&#xf03b;", "icon-columns": "&#xf0db;", "icon-google-plus": "&#xf0d5;", "icon-music": "&#xf001;", "icon-signout": "&#xf08b;", "icon-arrow-up": "&#xf062;", "icon-folder-close": "&#xf07b;", "icon-double-angle-left": "&#xf100;", "icon-fire-extinguisher": "&#xf134;", "icon-phone-sign": "&#xf098;", "icon-microphone": "&#xf130;", "icon-twitter-sign": "&#xf081;", "icon-envelope": "&#xf003;", "icon-list-alt": "&#xf022;", "icon-filter": "&#xf0b0;", "icon-step-forward": "&#xf051;", "icon-tag": "&#xf02b;", "icon-adjust": "&#xf042;", "icon-exclamation-sign": "&#xf06a;", "icon-play-circle": "&#xf01d;", "icon-ok-circle": "&#xf05d;", "icon-hand-down": "&#xf0a7;", "icon-puzzle-piece": "&#xf12e;", "icon-exchange": "&#xf0ec;", "icon-comment": "&#xf075;", "icon-shopping-cart": "&#xf07a;", "icon-question": "&#xf128;", "icon-screenshot": "&#xf05b;", "icon-question-sign": "&#xf059;", "icon-expand-alt": "&#xf116;", "icon-picture": "&#xf03e;", "icon-trash": "&#xf014;", "icon-comments-alt": "&#xf0e6;", "icon-table": "&#xf0ce;", "icon-text-height": "&#xf034;", "icon-github-sign": "&#xf092;", "icon-briefcase": "&#xf0b1;", "icon-group": "&#xf0c0;", "icon-chevron-sign-left": "&#xf137;", "icon-camera": "&#xf030;", "icon-bold": "&#xf032;", "icon-inbox": "&#xf01c;", "icon-forward": "&#xf04e;", "icon-fighter-jet": "&#xf0fb;", "icon-cut": "&#xf0c4;", "icon-home": "&#xf015;", "icon-qrcode": "&#xf029;", "icon-hand-up": "&#xf0a6;", "icon-thumbs-down": "&#xf088;", "icon-volume-off": "&#xf026;", "icon-suitcase": "&#xf0f2;", "icon-chevron-sign-down": "&#xf13a;", "icon-backward": "&#xf04a;", "icon-laptop": "&#xf109;", "icon-heart-empty": "&#xf08a;", "icon-quote-left": "&#xf10d;", "icon-strikethrough": "&#xf0cc;", "icon-flag-checkered": "&#xf11e;", "icon-bullseye": "&#xf140;", "icon-reply": "&#xf112;", "icon-volume-down": "&#xf027;", "icon-credit-card": "&#xf09d;", "icon-circle": "&#xf111;", "icon-caret-up": "&#xf0d8;", "icon-font": "&#xf031;", "icon-share-sign": "&#xf14d;", "icon-exclamation": "&#xf12a;", "icon-comment-alt": "&#xf0e5;", "icon-caret-right": "&#xf0da;", "icon-caret-down": "&#xf0d7;", "icon-list-ul": "&#xf0ca;", "icon-hospital": "&#xf0f8;", "icon-eye-close": "&#xf070;", "icon-fast-forward": "&#xf050;", "icon-align-left": "&#xf036;", "icon-bolt": "&#xf0e7;", "icon-linkedin-sign": "&#xf08c;", "icon-check": "&#xf046;", "icon-google-plus-sign": "&#xf0d4;", "icon-check-empty": "&#xf096;", "icon-reorder": "&#xf0c9;", "icon-remove-sign": "&#xf057;", "icon-play": "&#xf04b;", "icon-cloud": "&#xf0c2;", "icon-dashboard": "&#xf0e4;", "icon-sort": "&#xf0dc;", "icon-reply-all": "&#xf122;", "icon-subscript": "&#xf12c;", "icon-circle-arrow-right": "&#xf0a9;", "icon-print": "&#xf02f;", "icon-ok": "&#xf00c;", "icon-share": "&#xf045;", "icon-desktop": "&#xf108;", "icon-check-sign": "&#xf14a;", "icon-paste": "&#xf0ea;", "icon-beer": "&#xf0fc;", "icon-indent-right": "&#xf03c;", "icon-pencil": "&#xf040;", "icon-external-link-sign": "&#xf14c;", "icon-undo": "&#xf0e2;", "icon-remove": "&#xf00d;", "icon-rss": "&#xf09e;", "icon-globe": "&#xf0ac;", "icon-caret-left": "&#xf0d9;", "icon-ticket": "&#xf145;", "icon-shield": "&#xf132;", "icon-facebook": "&#xf09a;", "icon-circle-blank": "&#xf10c;", "icon-magnet": "&#xf076;", "icon-random": "&#xf074;", "icon-arrow-down": "&#xf063;", "icon-legal": "&#xf0e3;", "icon-double-angle-right": "&#xf101;", "icon-resize-small": "&#xf066;", "icon-wrench": "&#xf0ad;", "icon-medkit": "&#xf0fa;", "icon-folder-close-alt": "&#xf114;", "icon-play-sign": "&#xf144;", "icon-sort-down": "&#xf0dd;", "icon-cogs": "&#xf085;", "icon-remove-circle": "&#xf05c;", "icon-code": "&#xf121;", "icon-ellipsis-horizontal": "&#xf141;", "icon-italic": "&#xf033;", "icon-level-up": "&#xf148;", "icon-chevron-sign-right": "&#xf138;", "icon-truck": "&#xf0d1;", "icon-pause": "&#xf04c;", "icon-glass": "&#xf000;", "icon-zoom-out": "&#xf010;", "icon-double-angle-down": "&#xf103;", "icon-link": "&#xf0c1;", "icon-file-alt": "&#xf0f6;", "icon-css3": "&#xf13c;", "icon-align-right": "&#xf038;", "icon-resize-horizontal": "&#xf07e;", "icon-chevron-left": "&#xf053;", "icon-cog": "&#xf013;", "icon-volume-up": "&#xf028;", "icon-mail-reply-all": "&#xf122;", "icon-sign-blank": "&#xf0c8;", "icon-cloud-download": "&#xf0ed;", "icon-trophy": "&#xf091;", "icon-money": "&#xf0d6;", "icon-pinterest-sign": "&#xf0d3;", "icon-hand-left": "&#xf0a5;", "icon-collapse-alt": "&#xf117;", "icon-share-alt": "&#xf064;", "icon-github": "&#xf09b;", "icon-search": "&#xf002;", "icon-ambulance": "&#xf0f9;", "icon-quote-right": "&#xf10e;", "icon-plane": "&#xf072;", "icon-hdd": "&#xf0a0;", "icon-resize-full": "&#xf065;", "icon-plus-sign-alt": "&#xf0fe;", "icon-upload-alt": "&#xf093;", "icon-road": "&#xf018;", "icon-level-down": "&#xf149;", "icon-phone": "&#xf095;", "icon-th-large": "&#xf009;", "icon-frown": "&#xf119;", "icon-umbrella": "&#xf0e9;", "icon-upload": "&#xf01b;", "icon-text-width": "&#xf035;", "icon-location-arrow": "&#xf124;", "icon-camera-retro": "&#xf083;"};
		var icons = $.find('i');

		for(var i=0; i<icons.length; i++){
			var cur_icon = icons[i];
			var icon_class = $(cur_icon).attr('class');

			var attrs = '';
			$(cur_icon).each(function() {
			  $.each(this.attributes, function() {
			    if(this.specified && this.name!='class') {
					attrs += (this.name+"='"+this.value+"' ");
			    }
			  });
			});

			var temp = icon_class.split(' ');
			for(var j=0; j<temp.length; j++){
				if(temp[j].indexOf('-')>0){
					icon_class =  temp[j];
					break;
				}
			}

			var span_html = "<span data-icon='" + icon_char_map[icon_class] + "' "+ attrs +"></span> &nbsp;";
			$(cur_icon).replaceWith(span_html);
		}
	}
});