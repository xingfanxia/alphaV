var ddsmoothmenu = {
    arrowimages: {
        down: ["downarrowclass", "", 23],
        right: ["rightarrowclass", "", 6]
    },
    transition: {
        overtime: 300,
        outtime: 300
    },
    shadow: true,
    showhidedelay: {
        showdelay: 100,
        hidedelay: 200
    },
    //zindexvalue: 2,
    closeonnonmenuclick: true,
    closeonmouseout: false,
    overarrowre: /(?=\.(gif|jpg|jpeg|png|bmp))/i,
    overarrowaddtofilename: "_over",
    detecttouch: !! ("ontouchstart" in window) || !! ("ontouchstart" in document.documentElement) || !! window.ontouchstart || (!!window.Touch && !!window.Touch.length) || !! window.onmsgesturechange || window.DocumentTouch && window.document instanceof
    window.DocumentTouch,
    detectwebkit: navigator.userAgent.toLowerCase().indexOf("applewebkit") > -1,
    idevice: /ipad|iphone/i.test(navigator.userAgent),
    detectie6: function () {
        var ie;
        return (ie = /MSIE (\d+)/.exec(navigator.userAgent)) && ie[1] < 7
    }(),
    detectie9: function () {
        var ie;
        return (ie = /MSIE (\d+)/.exec(navigator.userAgent)) && ie[1] > 8
    }(),
    ie9shadow: function () {},
    css3support: typeof document.documentElement.style.boxShadow === "string" || !document.all && document.querySelector,
    prevobjs: [],
    menus: null,
    executelink: function ($,
        prevobjs, e) {
        var prevscount = prevobjs.length,
            link = e.target;
        while (--prevscount > -1)
            if (prevobjs[prevscount] === this) {
                prevobjs.splice(prevscount, 1);
                if (link.href !== ddsmoothmenu.emptyhash && link.href && $(link).is("a") && !$(link).children("span." + ddsmoothmenu.arrowimages.down[0] + ", span." + ddsmoothmenu.arrowimages.right[0]).size()) {
                    if (link.target && link.target !== "_self") window.open(link.href, link.target);
                    else window.location.href = link.href;
                    e.stopPropagation()
                }
            }
    },
    updateprev: function ($, prevobjs, $curobj) {
        var prevscount =
            prevobjs.length,
            prevobj, $indexobj = $curobj.parents().add(this);
        while (--prevscount > -1)
            if ($indexobj.index(prevobj = prevobjs[prevscount]) < 0) {
                $(prevobj).trigger("click", [1]);
                prevobjs.splice(prevscount, 1)
            }
        prevobjs.push(this)
    },
    subulpreventemptyclose: function (e) {
        var link = e.target;
        if (link.href === ddsmoothmenu.emptyhash && $(link).parent("li").find("ul").size() < 1) {
            e.preventDefault();
            e.stopPropagation()
        }
    },
    getajaxmenu: function ($, setting, nobuild) {
        var $menucontainer = $("#" + setting.contentsource[0]);
        $menucontainer.html("Loading Menu...");
        $.ajax({
                url: setting.contentsource[1],
                async: true,
                error: function (ajaxrequest) {
                    $menucontainer.html("Error fetching content. Server Response: " + ajaxrequest.responseText)
                },
                success: function (content) {
                    $menucontainer.html(content); !! !nobuild && ddsmoothmenu.buildmenu($, setting)
                }
            })
    },
    closeall: function (e) {
        var smoothmenu = ddsmoothmenu,
            prevscount;
        if (!smoothmenu.globaltrackopen) return;
        if (e.type === "mouseleave" || (e.type === "click" || e.type === "touchstart") && smoothmenu.menus.index(e.target) < 0) {
            prevscount = smoothmenu.prevobjs.length;
            while (--prevscount > -1) {
                $(smoothmenu.prevobjs[prevscount]).trigger("click");
                smoothmenu.prevobjs.splice(prevscount, 1)
            }
        }
    },
    emptyhash: jQuery('<a href="#"></a>').get(0).href,
    buildmenu: function ($, setting) {
        var smoothmenu = ddsmoothmenu;
        smoothmenu.globaltrackopen = smoothmenu.closeonnonmenuclick || smoothmenu.closeonmouseout;
        var zsub = 0;
        var prevobjs = smoothmenu.globaltrackopen ? smoothmenu.prevobjs : [];
        var $mainparent = $("#" + setting.mainmenuid).removeClass("ddsmoothmenu ddsmoothmenu-v").addClass(setting.classname || "ddsmoothmenu");
        var $mainmenu = $mainparent.find(">ul");
        var method = smoothmenu.detecttouch ? "toggle" : setting.method === "toggle" ? "toggle" : "hover";
		var $topheaders = $mainmenu.find(">li>ul").parent();
        var orient = setting.orientation != "v" ? "down" : "right",
            $parentshadow = $(document.body);
        $mainmenu.click(function (e) {
            e.target.href === smoothmenu.emptyhash && e.preventDefault()
        });
        if (method === "toggle") {
            if (smoothmenu.globaltrackopen) smoothmenu.menus = smoothmenu.menus ? smoothmenu.menus.add($mainmenu.add($mainmenu.find("*"))) : $mainmenu.add($mainmenu.find("*"));
            if (smoothmenu.closeonnonmenuclick) {
                if (orient === "down") $mainparent.click(function (e) {
                    e.stopPropagation()
                });
                $(document).unbind("click.smoothmenu").bind("click.smoothmenu", smoothmenu.closeall);
                if (smoothmenu.idevice) {
                    document.removeEventListener("touchstart", smoothmenu.closeall, false);
                    document.addEventListener("touchstart", smoothmenu.closeall, false)
                }
            } else if (setting.closeonnonmenuclick) {
                if (orient === "down") $mainparent.click(function (e) {
                    e.stopPropagation()
                });
                $(document).bind("click." + setting.mainmenuid, function (e) {
                    $mainmenu.find("li>a.selected").parent().trigger("click")
                });
                if (smoothmenu.idevice) document.addEventListener("touchstart", function (e) {
                    $mainmenu.find("li>a.selected").parent().trigger("click")
                }, false)
            }
            if (smoothmenu.closeonmouseout) {
                var $leaveobj = orient === "down" ? $mainparent : $mainmenu;
                $leaveobj.bind("mouseleave.smoothmenu", smoothmenu.closeall)
            } else if (setting.closeonmouseout) {
                var $leaveobj = orient === "down" ? $mainparent : $mainmenu;
                $leaveobj.bind("mouseleave.smoothmenu", function () {
                    $mainmenu.find("li>a.selected").parent().trigger("click")
                })
            }
            if (!$('style[title="ddsmoothmenushadowsnone"]').size()) $("head").append('<style title="ddsmoothmenushadowsnone" type="text/css">.ddsmoothmenushadowsnone{display:none!important;}</style>');
            var shadowstimer;
            $(window).resize(function () {
                clearTimeout(shadowstimer);
                var $selected = $mainmenu.find("li>a.selected").parent(),
                    $shadows = $(".ddshadow").addClass("ddsmoothmenushadowsnone");
                $selected.eq(0).trigger("click");
                $selected.trigger("click");
                shadowstimer = setTimeout(function () {
                    $shadows.removeClass("ddsmoothmenushadowsnone")
                }, 100)
            })
        }
        $topheaders.each(function () {
            var $curobj = $(this).css({
                    zIndex: (setting.zindexvalue || smoothmenu.zindexvalue) + zsub--
                });
            var $subul = $curobj.children("ul:eq(0)").css({
                    display: "block"
                }).data("timers", {});
			
			//ltr support
			$lang_dir = $('html').attr('dir');
			if($lang_dir == 'rtl'){
            var $link = $curobj.children("a:eq(0)").css({
                    paddingRight: smoothmenu.arrowimages[orient][2]
                }).prepend('<span style="display: block;" class="' + smoothmenu.arrowimages[orient][0] + '"></span>');
			}else{
			var $link = $curobj.children("a:eq(0)").css({
                    paddingRight: smoothmenu.arrowimages[orient][2]
                }).append('<span style="display: block;" class="' + smoothmenu.arrowimages[orient][0] + '"></span>');
			}
			//-ltr support
            var dimensions = {
                w: $link.outerWidth(),
                h: $curobj.innerHeight(),
                subulw: $subul.outerWidth(),
                subulh: $subul.outerHeight()
            };
            $subul.css({
                    top: orient === "down" ? dimensions.h : 0
                });

            function restore() {
                $link.removeClass("selected")
            }
            method === "toggle" && $subul.click(smoothmenu.subulpreventemptyclose);
            $curobj[method](function (e) {
                if (!$curobj.data("headers")) {
                    smoothmenu.buildsubheaders($,
                        $subul.find(">li>ul").parent(), setting, method, prevobjs);
                    $curobj.data("headers", true).find(">ul").css({
                            display: "none",
                            visibility: "visible"
                        })
                }
                method === "toggle" && smoothmenu.updateprev.call(this, $, prevobjs, $curobj);
                clearTimeout($subul.data("timers").hidetimer);
                $link.addClass("selected");
                $subul.data("timers").showtimer = setTimeout(function () {
                    var menuleft = orient === "down" ? 0 : dimensions.w;
                    menuleft = $curobj.offset().left + menuleft + dimensions.subulw > $(window).width() ? orient === "down" ? -dimensions.subulw + dimensions.w : -dimensions.w : menuleft;
					//rtl support
					if($lang_dir == 'rtl'){
					var menuright = orient === "down" ? 0 : dimensions.w;
					var posright = $(window).width()-$curobj.offset().left;
                    menuright = posright + menuright + dimensions.subulw > $(window).width() ? orient === "down" ? -dimensions.subulw + dimensions.w : -dimensions.w : menuright;
                    $subul.css({
                            right: menuright,
                            width: dimensions.subulw
                        }).stop(true, true).animate({
                            height: "show",
                            opacity: "show"
                        }, smoothmenu.transition.overtime, function () {
                            this.style.removeAttribute && this.style.removeAttribute("filter")
                        });
					} else{
					var menuleft = orient === "down" ? 0 : dimensions.w;
                    menuleft = $curobj.offset().left + menuleft + dimensions.subulw > $(window).width() ? orient === "down" ? -dimensions.subulw + dimensions.w : -dimensions.w : menuleft;
                    $subul.css({
                            left: menuleft,
                            width: dimensions.subulw
                        }).stop(true, true).animate({
                            height: "show",
                            opacity: "show"
                        }, smoothmenu.transition.overtime, function () {
                            this.style.removeAttribute && this.style.removeAttribute("filter")
                        });
					}
					//-rtl support
                    if (setting.shadow) {
                        if (!$curobj.data("$shadow")) $curobj.data("$shadow", $("<div></div>").addClass("ddshadow toplevelshadow").prependTo($parentshadow).css({
                                    zIndex: $curobj.css("zIndex")
                                }));
                        smoothmenu.ie9shadow($curobj.data("$shadow"));
                        var offsets = $subul.offset();
                        var shadowleft =
                            offsets.left;
                        var shadowtop = offsets.top;
                        $curobj.data("$shadow").css({
                                overflow: "visible",
                                width: dimensions.subulw,
                                left: shadowleft,
                                top: shadowtop
                            }).stop(true, true).animate({
                                height: dimensions.subulh
                            }, smoothmenu.transition.overtime)
                    }
                }, smoothmenu.showhidedelay.showdelay)
            }, function (e, speed) {
                var $shadow = $curobj.data("$shadow");
                if (method === "hover") restore();
                else smoothmenu.executelink.call(this, $, prevobjs, e);
                clearTimeout($subul.data("timers").showtimer);
                $subul.data("timers").hidetimer = setTimeout(function () {
                    $subul.stop(true,
                        true).animate({
                            height: "hide",
                            opacity: "hide"
                        }, speed || smoothmenu.transition.outtime, function () {
                            method === "toggle" && restore()
                        });
                    if ($shadow) {
                        if (!smoothmenu.css3support && smoothmenu.detectwebkit) $shadow.children("div:eq(0)").css({
                                opacity: 0
                            });
                        $shadow.stop(true, true).animate({
                                height: 0
                            }, speed || smoothmenu.transition.outtime, function () {
                                if (method === "toggle") this.style.overflow = "hidden"
                            })
                    }
                }, smoothmenu.showhidedelay.hidedelay)
            })
        })
    },
    buildsubheaders: function ($, $headers, setting, method, prevobjs) {
        $headers.each(function () {
            var smoothmenu =
                ddsmoothmenu;
            var $curobj = $(this).css({
                    zIndex: $(this).parent("ul").css("z-index")
                });
            var $subul = $curobj.children("ul:eq(0)").css({
                    display: "block"
                }).data("timers", {}),
                $parentshadow;
            method === "toggle" && $subul.click(smoothmenu.subulpreventemptyclose);
            var $link = $curobj.children("a:eq(0)").append('<span style="display: block;" class="' + smoothmenu.arrowimages["right"][0] + '"></span>');
            var dimensions = {
                w: $link.outerWidth(),
                subulw: $subul.outerWidth(),
                subulh: $subul.outerHeight()
            };
            $subul.css({
                    top: 0
                });

            function restore() {
                $link.removeClass("selected")
            }
            $curobj[method](function (e) {
                if (!$curobj.data("headers")) {
                    smoothmenu.buildsubheaders($, $subul.find(">li>ul").parent(), setting, method, prevobjs);
                    $curobj.data("headers", true).find(">ul").css({
                            display: "none",
                            visibility: "visible"
                        })
                }
                method === "toggle" && smoothmenu.updateprev.call(this, $, prevobjs, $curobj);
                clearTimeout($subul.data("timers").hidetimer);
                $link.addClass("selected");
                $subul.data("timers").showtimer = setTimeout(function () {

					//rtl support
					if($lang_dir == 'rtl'){
                    var menuright = dimensions.w;
					var posright = $(window).width()-$curobj.offset().left;
                    menuright = posright + menuright + dimensions.subulw >
                        $(window).width() ? -dimensions.w - 10 : menuright + 10;
                    $subul.css({
                            right: menuright,
                            width: dimensions.subulw
                        }).stop(true, true).animate({
                            height: "show",
                            opacity: "show"
                        }, smoothmenu.transition.overtime, function () {
                            this.style.removeAttribute && this.style.removeAttribute("filter")
                        });
					}else{
                    var menuleft = dimensions.w;
					//alert($curobj.offset().left + menuleft + dimensions.subulw+ ' ' +$(window).width());
                    menuleft = $curobj.offset().left + menuleft + dimensions.subulw >
                        $(window).width() ? -dimensions.w - 10 : menuleft + 10;
					$subul.css({
                            left: menuleft,
                            width: dimensions.subulw
                        }).stop(true, true).animate({
                            height: "show",
                            opacity: "show"
                        }, smoothmenu.transition.overtime, function () {
                            this.style.removeAttribute && this.style.removeAttribute("filter")
                        });
					}
                    if (setting.shadow) {
                        if (!$curobj.data("$shadow")) {
                            $parentshadow = $curobj.parents("li:eq(0)").data("$shadow");
                            $curobj.data("$shadow", $("<div></div>").addClass("ddshadow").prependTo($parentshadow).css({
                                        zIndex: $parentshadow.css("z-index")
                                    }))
                        }
                        var offsets =
                            $subul.offset();
                        var shadowleft = menuleft;
                        var shadowtop = $curobj.position().top;
                        if (smoothmenu.detectwebkit && !smoothmenu.css3support) $curobj.data("$shadow").css({
                                opacity: 1
                            });
                        $curobj.data("$shadow").css({
                                overflow: "visible",
                                width: dimensions.subulw,
                                left: shadowleft,
                                top: shadowtop
                            }).stop(true, true).animate({
                                height: dimensions.subulh
                            }, smoothmenu.transition.overtime)
                    }
                }, smoothmenu.showhidedelay.showdelay)
            }, function (e, speed) {
                var $shadow = $curobj.data("$shadow");
                if (method === "hover") restore();
                else smoothmenu.executelink.call(this,
                    $, prevobjs, e);
                clearTimeout($subul.data("timers").showtimer);
                $subul.data("timers").hidetimer = setTimeout(function () {
                    $subul.stop(true, true).animate({
                            height: "hide",
                            opacity: "hide"
                        }, speed || smoothmenu.transition.outtime, function () {
                            method === "toggle" && restore()
                        });
                    if ($shadow) {
                        if (!smoothmenu.css3support && smoothmenu.detectwebkit) $shadow.children("div:eq(0)").css({
                                opacity: 0
                            });
                        $shadow.stop(true, true).animate({
                                height: 0
                            }, speed || smoothmenu.transition.outtime, function () {
                                if (method === "toggle") this.style.overflow = "hidden"
                            })
                    }
                },
                smoothmenu.showhidedelay.hidedelay)
            })
        })
    },
    init: function (setting) {
        if (this.detectie6 && parseFloat(jQuery.fn.jquery) > 1.3) {
            this.init = function (setting) {
                if (typeof setting.contentsource == "object") jQuery(function ($) {
                    ddsmoothmenu.getajaxmenu($, setting, "nobuild")
                });
                return false
            };
            jQuery('link[href*="ddsmoothmenu"]').attr("disabled", true);
            jQuery(function ($) {
                alert("You Seriously Need to Update Your Browser!\n\nDynamic Drive Smooth Navigational Menu Showing Text Only Menu(s)\n\nDEVELOPER's NOTE: This script will run in IE 6 when using jQuery 1.3.2 or less,\nbut not real well.");
                $('link[href*="ddsmoothmenu"]').attr("disabled", true)
            });
            return this.init(setting)
        }
        var mainmenuid = "#" + setting.mainmenuid,
            right, down, stylestring = ["</style>\n"],
            stylesleft = setting.arrowswap ? 4 : 2;

        function addstyles() {
            if (stylesleft) return;
            if (typeof setting.customtheme == "object" && setting.customtheme.length == 2) {
                var mainselector = setting.orientation == "v" ? mainmenuid : mainmenuid + ", " + mainmenuid;
                stylestring.push([mainselector, " ul li a {background:", setting.customtheme[0], ";}\n", mainmenuid, " ul li a:hover {background:",
                        setting.customtheme[1], ";}"
                    ].join(""))
            }
            stylestring.push('\n<style type="text/css">');
            stylestring.reverse();
            jQuery("head").append(stylestring.join("\n"))
        }
        if (setting.arrowswap) {
            right = ddsmoothmenu.arrowimages.right[1].replace(ddsmoothmenu.overarrowre, ddsmoothmenu.overarrowaddtofilename);
            down = ddsmoothmenu.arrowimages.down[1].replace(ddsmoothmenu.overarrowre, ddsmoothmenu.overarrowaddtofilename);
            jQuery(new Image).bind("load error", function (e) {
                setting.rightswap = e.type === "load";
                if (setting.rightswap) stylestring.push([mainmenuid,
                        " ul li a:hover .", ddsmoothmenu.arrowimages.right[0], ", ", mainmenuid, " ul li a.selected .", ddsmoothmenu.arrowimages.right[0], " { background-image: url(", this.src, ");}"
                    ].join(""));
                --stylesleft;
                addstyles()
            }).attr("src", right);
            jQuery(new Image).bind("load error", function (e) {
                setting.downswap = e.type === "load";
                if (setting.downswap) stylestring.push([mainmenuid, " ul li a:hover .", ddsmoothmenu.arrowimages.down[0], ", ", mainmenuid, " ul li a.selected .", ddsmoothmenu.arrowimages.down[0], " { background-image: url(",
                        this.src, ");}"
                    ].join(""));
                --stylesleft;
                addstyles()
            }).attr("src", down)
        }
        jQuery(new Image).bind("load error", function (e) {
            if (e.type === "load") stylestring.push([mainmenuid + " ul li a .", ddsmoothmenu.arrowimages.right[0], " { background: url(", this.src, ") no-repeat;width:", this.width, "px;height:", this.height, "px;}"].join(""));
            --stylesleft;
            addstyles()
        }).attr("src", ddsmoothmenu.arrowimages.right[1]);
        jQuery(new Image).bind("load error", function (e) {
            if (e.type === "load") stylestring.push([mainmenuid + " ul li a .",
                    ddsmoothmenu.arrowimages.down[0], " { background: url(", this.src, ") no-repeat;width:", this.width, "px;height:", this.height, "px;}"
                ].join(""));
            --stylesleft;
            addstyles()
        }).attr("src", ddsmoothmenu.arrowimages.down[1]);
        setting.shadow = this.detectie6 && (setting.method === "hover" || setting.orientation === "v") ? false : setting.shadow || this.shadow;
        jQuery(document).ready(function ($) {
            if (setting.shadow && ddsmoothmenu.css3support) $("body").addClass("ddcss3support");
            if (typeof setting.contentsource == "object") ddsmoothmenu.getajaxmenu($,
                setting);
            else ddsmoothmenu.buildmenu($, setting)
        })
    }
};
if (parseFloat(jQuery.fn.jquery) > 1.8 && !! !jQuery.migrateWarnings)(function () {
    var toggleDisp = jQuery.fn.toggle;
    jQuery.extend(jQuery.fn, {
            toggle: function (fn, fn2) {
                if (!jQuery.isFunction(fn) || !jQuery.isFunction(fn2)) return toggleDisp.apply(this, arguments);
                var args = arguments,
                    guid = fn.guid || jQuery.guid++,
                    i = 0,
                    toggler = function (event) {
                        var lastToggle = (jQuery._data(this, "lastToggle" + fn.guid) || 0) % i;
                        jQuery._data(this, "lastToggle" + fn.guid, lastToggle + 1);
                        event.preventDefault();
                        return args[lastToggle].apply(this, arguments) ||
                            false
                    };
                toggler.guid = guid;
                while (i < args.length) args[i++].guid = guid;
                return this.click(toggler)
            }
        })
})();
if (ddsmoothmenu.detectie9)(function ($) {
    function incdec(v, how) {
        return parseInt(v) + how + "px"
    }
    ddsmoothmenu.ie9shadow = function ($elem) {
        var getter = document.defaultView.getComputedStyle($elem.get(0), null),
            curshadow = getter.getPropertyValue("box-shadow").split(" "),
            curmargin = {
                top: getter.getPropertyValue("margin-top"),
                left: getter.getPropertyValue("margin-left")
            };
        $("head").append(['\n<style title="ie9shadow" type="text/css">', ".ddcss3support .ddshadow {", "\tbox-shadow: " + incdec(curshadow[0], 1) + " " + incdec(curshadow[1],
                    1) + " " + curshadow[2] + " " + curshadow[3] + ";", "}", ".ddcss3support .ddshadow.toplevelshadow {", "\topacity: " + ($(".ddcss3support .ddshadow").css("opacity") - 0.1) + ";", "\tmargin-top: " + incdec(curmargin.top, -1) + ";", "\tmargin-left: " + incdec(curmargin.left, -1) + ";", "}", "</style>\n"].join("\n"));
        ddsmoothmenu.ie9shadow = function () {}
    };
    var jqheight = $.fn.height,
        jqwidth = $.fn.width;
    $.extend($.fn, {
            height: function () {
                var obj = this.get(0);
                if (this.size() < 1 || arguments.length || obj === window || obj === document) return jqheight.apply(this,
                    arguments);
                return parseFloat(document.defaultView.getComputedStyle(obj, null).getPropertyValue("height"))
            },
            innerHeight: function () {
                if (this.size() < 1) return null;
                var val = this.height(),
                    obj = this.get(0),
                    getter = document.defaultView.getComputedStyle(obj, null);
                val += parseInt(getter.getPropertyValue("padding-top"));
                val += parseInt(getter.getPropertyValue("padding-bottom"));
                return val
            },
            outerHeight: function (bool) {
                if (this.size() < 1) return null;
                var val = this.innerHeight(),
                    obj = this.get(0),
                    getter = document.defaultView.getComputedStyle(obj,
                        null);
                val += parseInt(getter.getPropertyValue("border-top-width"));
                val += parseInt(getter.getPropertyValue("border-bottom-width"));
                if (bool) {
                    val += parseInt(getter.getPropertyValue("margin-top"));
                    val += parseInt(getter.getPropertyValue("margin-bottom"))
                }
                return val
            },
            width: function () {
                var obj = this.get(0);
                if (this.size() < 1 || arguments.length || obj === window || obj === document) return jqwidth.apply(this, arguments);
                return parseFloat(document.defaultView.getComputedStyle(obj, null).getPropertyValue("width"))
            },
            innerWidth: function () {
                if (this.size() <
                    1) return null;
                var val = this.width(),
                    obj = this.get(0),
                    getter = document.defaultView.getComputedStyle(obj, null);
                val += parseInt(getter.getPropertyValue("padding-right"));
                val += parseInt(getter.getPropertyValue("padding-left"));
                return val
            },
            outerWidth: function (bool) {
                if (this.size() < 1) return null;
                var val = this.innerWidth(),
                    obj = this.get(0),
                    getter = document.defaultView.getComputedStyle(obj, null);
                val += parseInt(getter.getPropertyValue("border-right-width"));
                val += parseInt(getter.getPropertyValue("border-left-width"));
                if (bool) {
                    val += parseInt(getter.getPropertyValue("margin-right"));
                    val += parseInt(getter.getPropertyValue("margin-left"))
                }
                return val
            }
        })
})(jQuery);
jQuery(document).ready(function () {
    ddsmoothmenu.init({
            mainmenuid: "menu-container",
            orientation: "h",
            classname: "menu",
            contentsource: "markup"
        })
});