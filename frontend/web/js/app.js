// 1.
// оформление select с иконками в optgroup
// * Вообще в этом файле не используется

// 2.
// Сортируемые таблицы
// * Установка value для td перенесена в osago-offers.js

//3.
// додано у секції "Сортируемых таблиц" 
// прив'язка рядка бонусів choice-table для малого екрана до батьківського рядка з контентом при сортуванні

// Avoid `console` errors in browsers that lack a console
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
/*
* jquery-match-height 0.7.0 by @liabru
* http://brm.io/jquery-match-height/
* License MIT
*/
!function (t) { "use strict"; "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery) }(function (t) {
    var e = -1, o = -1, i = function (t) { return parseFloat(t) || 0 }, a = function (e) { var o = 1, a = t(e), n = null, r = []; return a.each(function () { var e = t(this), a = e.offset().top - i(e.css("margin-top")), s = r.length > 0 ? r[r.length - 1] : null; null === s ? r.push(e) : Math.floor(Math.abs(n - a)) <= o ? r[r.length - 1] = s.add(e) : r.push(e), n = a }), r }, n = function (e) {
        var o = {
            byRow: !0, property: "height", target: null, remove: !1
        }; return "object" == typeof e ? t.extend(o, e) : ("boolean" == typeof e ? o.byRow = e : "remove" === e && (o.remove = !0), o)
    }, r = t.fn.matchHeight = function (e) { var o = n(e); if (o.remove) { var i = this; return this.css(o.property, ""), t.each(r._groups, function (t, e) { e.elements = e.elements.not(i) }), this } return this.length <= 1 && !o.target ? this : (r._groups.push({ elements: this, options: o }), r._apply(this, o), this) }; r.version = "0.7.0", r._groups = [], r._throttle = 80, r._maintainScroll = !1, r._beforeUpdate = null,
    r._afterUpdate = null, r._rows = a, r._parse = i, r._parseOptions = n, r._apply = function (e, o) {
        var s = n(o), h = t(e), l = [h], c = t(window).scrollTop(), p = t("html").outerHeight(!0), d = h.parents().filter(":hidden"); return d.each(function () { var e = t(this); e.data("style-cache", e.attr("style")) }), d.css("display", "block"), s.byRow && !s.target && (h.each(function () {
            var e = t(this), o = e.css("display"); "inline-block" !== o && "flex" !== o && "inline-flex" !== o && (o = "block"), e.data("style-cache", e.attr("style")), e.css({
                display: o, "padding-top": "0",
                "padding-bottom": "0", "margin-top": "0", "margin-bottom": "0", "border-top-width": "0", "border-bottom-width": "0", height: "100px", overflow: "hidden"
            })
        }), l = a(h), h.each(function () { var e = t(this); e.attr("style", e.data("style-cache") || "") })), t.each(l, function (e, o) {
            var a = t(o), n = 0; if (s.target) n = s.target.outerHeight(!1); else {
                if (s.byRow && a.length <= 1) return void a.css(s.property, ""); a.each(function () {
                    var e = t(this), o = e.attr("style"), i = e.css("display"); "inline-block" !== i && "flex" !== i && "inline-flex" !== i && (i = "block"); var a = {
                        display: i
                    }; a[s.property] = "", e.css(a), e.outerHeight(!1) > n && (n = e.outerHeight(!1)), o ? e.attr("style", o) : e.css("display", "")
                })
            } a.each(function () { var e = t(this), o = 0; s.target && e.is(s.target) || ("border-box" !== e.css("box-sizing") && (o += i(e.css("border-top-width")) + i(e.css("border-bottom-width")), o += i(e.css("padding-top")) + i(e.css("padding-bottom"))), e.css(s.property, n - o + "px")) })
        }), d.each(function () { var e = t(this); e.attr("style", e.data("style-cache") || null) }), r._maintainScroll && t(window).scrollTop(c / p * t("html").outerHeight(!0)),
        this
    }, r._applyDataApi = function () { var e = {}; t("[data-match-height], [data-mh]").each(function () { var o = t(this), i = o.attr("data-mh") || o.attr("data-match-height"); i in e ? e[i] = e[i].add(o) : e[i] = o }), t.each(e, function () { this.matchHeight(!0) }) }; var s = function (e) { r._beforeUpdate && r._beforeUpdate(e, r._groups), t.each(r._groups, function () { r._apply(this.elements, this.options) }), r._afterUpdate && r._afterUpdate(e, r._groups) }; r._update = function (i, a) {
        if (a && "resize" === a.type) {
            var n = t(window).width(); if (n === e) return; e = n;
        } i ? -1 === o && (o = setTimeout(function () { s(a), o = -1 }, r._throttle)) : s(a)
    }, t(r._applyDataApi), t(window).bind("load", function (t) { r._update(!1, t) }), t(window).bind("resize orientationchange", function (t) { r._update(!0, t) })
});

/**
 * bxSlider v4.2.5
 * Copyright 2013-2015 Steven Wanderski
 * Written while drinking Belgian ales and listening to jazz

 * Licensed under MIT (http://opensource.org/licenses/MIT)
 */

!function (a) { var b = { mode: "horizontal", slideSelector: "", infiniteLoop: !0, hideControlOnEnd: !1, speed: 500, easing: null, slideMargin: 0, startSlide: 0, randomStart: !1, captions: !1, ticker: !1, tickerHover: !1, adaptiveHeight: !1, adaptiveHeightSpeed: 500, video: !1, useCSS: !0, preloadImages: "visible", responsive: !0, slideZIndex: 50, wrapperClass: "bx-wrapper", touchEnabled: !0, swipeThreshold: 50, oneToOneTouch: !0, preventDefaultSwipeX: !0, preventDefaultSwipeY: !1, ariaLive: !0, ariaHidden: !0, keyboardEnabled: !1, pager: !0, pagerType: "full", pagerShortSeparator: " / ", pagerSelector: null, buildPager: null, pagerCustom: null, controls: !0, nextText: "Next", prevText: "Prev", nextSelector: null, prevSelector: null, autoControls: !1, startText: "Start", stopText: "Stop", autoControlsCombine: !1, autoControlsSelector: null, auto: !1, pause: 4e3, autoStart: !0, autoDirection: "next", stopAutoOnClick: !1, autoHover: !1, autoDelay: 0, autoSlideForOnePage: !1, minSlides: 1, maxSlides: 1, moveSlides: 0, slideWidth: 0, shrinkItems: !1, onSliderLoad: function () { return !0 }, onSlideBefore: function () { return !0 }, onSlideAfter: function () { return !0 }, onSlideNext: function () { return !0 }, onSlidePrev: function () { return !0 }, onSliderResize: function () { return !0 } }; a.fn.bxSlider = function (c) { if (0 === this.length) return this; if (this.length > 1) return this.each(function () { a(this).bxSlider(c) }), this; var d = {}, e = this, f = a(window).width(), g = a(window).height(); if (!a(e).data("bxSlider")) { var h = function () { a(e).data("bxSlider") || (d.settings = a.extend({}, b, c), d.settings.slideWidth = parseInt(d.settings.slideWidth), d.children = e.children(d.settings.slideSelector), d.children.length < d.settings.minSlides && (d.settings.minSlides = d.children.length), d.children.length < d.settings.maxSlides && (d.settings.maxSlides = d.children.length), d.settings.randomStart && (d.settings.startSlide = Math.floor(Math.random() * d.children.length)), d.active = { index: d.settings.startSlide }, d.carousel = d.settings.minSlides > 1 || d.settings.maxSlides > 1 ? !0 : !1, d.carousel && (d.settings.preloadImages = "all"), d.minThreshold = d.settings.minSlides * d.settings.slideWidth + (d.settings.minSlides - 1) * d.settings.slideMargin, d.maxThreshold = d.settings.maxSlides * d.settings.slideWidth + (d.settings.maxSlides - 1) * d.settings.slideMargin, d.working = !1, d.controls = {}, d.interval = null, d.animProp = "vertical" === d.settings.mode ? "top" : "left", d.usingCSS = d.settings.useCSS && "fade" !== d.settings.mode && function () { for (var a = document.createElement("div"), b = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"], c = 0; c < b.length; c++) if (void 0 !== a.style[b[c]]) return d.cssPrefix = b[c].replace("Perspective", "").toLowerCase(), d.animProp = "-" + d.cssPrefix + "-transform", !0; return !1 }(), "vertical" === d.settings.mode && (d.settings.maxSlides = d.settings.minSlides), e.data("origStyle", e.attr("style")), e.children(d.settings.slideSelector).each(function () { a(this).data("origStyle", a(this).attr("style")) }), j()) }, j = function () { var b = d.children.eq(d.settings.startSlide); e.wrap('<div class="' + d.settings.wrapperClass + '"><div class="bx-viewport"></div></div>'), d.viewport = e.parent(), d.settings.ariaLive && !d.settings.ticker && d.viewport.attr("aria-live", "polite"), d.loader = a('<div class="bx-loading" />'), d.viewport.prepend(d.loader), e.css({ width: "horizontal" === d.settings.mode ? 1e3 * d.children.length + 215 + "%" : "auto", position: "relative" }), d.usingCSS && d.settings.easing ? e.css("-" + d.cssPrefix + "-transition-timing-function", d.settings.easing) : d.settings.easing || (d.settings.easing = "swing"), d.viewport.css({ width: "100%", overflow: "hidden", position: "relative" }), d.viewport.parent().css({ maxWidth: n() }), d.settings.pager || d.settings.controls || d.viewport.parent().css({ margin: "0 auto 0px" }), d.children.css({ "float": "horizontal" === d.settings.mode ? "left" : "none", listStyle: "none", position: "relative" }), d.children.css("width", o()), "horizontal" === d.settings.mode && d.settings.slideMargin > 0 && d.children.css("marginRight", d.settings.slideMargin), "vertical" === d.settings.mode && d.settings.slideMargin > 0 && d.children.css("marginBottom", d.settings.slideMargin), "fade" === d.settings.mode && (d.children.css({ position: "absolute", zIndex: 0, display: "none" }), d.children.eq(d.settings.startSlide).css({ zIndex: d.settings.slideZIndex, display: "block" })), d.controls.el = a('<div class="bx-controls" />'), d.settings.captions && y(), d.active.last = d.settings.startSlide === q() - 1, d.settings.video && e.fitVids(), ("all" === d.settings.preloadImages || d.settings.ticker) && (b = d.children), d.settings.ticker ? d.settings.pager = !1 : (d.settings.controls && w(), d.settings.auto && d.settings.autoControls && x(), d.settings.pager && v(), (d.settings.controls || d.settings.autoControls || d.settings.pager) && d.viewport.after(d.controls.el)), k(b, l) }, k = function (b, c) { var d = b.find('img:not([src=""]), iframe').length, e = 0; return 0 === d ? void c() : void b.find('img:not([src=""]), iframe').each(function () { a(this).one("load error", function () { ++e === d && c() }).each(function () { this.complete && a(this).load() }) }) }, l = function () { if (d.settings.infiniteLoop && "fade" !== d.settings.mode && !d.settings.ticker) { var b = "vertical" === d.settings.mode ? d.settings.minSlides : d.settings.maxSlides, c = d.children.slice(0, b).clone(!0).addClass("bx-clone"), f = d.children.slice(-b).clone(!0).addClass("bx-clone"); d.settings.ariaHidden && (c.attr("aria-hidden", !0), f.attr("aria-hidden", !0)), e.append(c).prepend(f) } d.loader.remove(), s(), "vertical" === d.settings.mode && (d.settings.adaptiveHeight = !0), d.viewport.height(m()), e.redrawSlider(), d.settings.onSliderLoad.call(e, d.active.index), d.initialized = !0, d.settings.responsive && a(window).bind("resize", S), d.settings.auto && d.settings.autoStart && (q() > 1 || d.settings.autoSlideForOnePage) && I(), d.settings.ticker && J(), d.settings.pager && E(d.settings.startSlide), d.settings.controls && H(), d.settings.touchEnabled && !d.settings.ticker && N(), d.settings.keyboardEnabled && !d.settings.ticker && a(document).keydown(M) }, m = function () { var b = 0, c = a(); if ("vertical" === d.settings.mode || d.settings.adaptiveHeight) if (d.carousel) { var e = 1 === d.settings.moveSlides ? d.active.index : d.active.index * r(); for (c = d.children.eq(e), i = 1; i <= d.settings.maxSlides - 1; i++) c = e + i >= d.children.length ? c.add(d.children.eq(i - 1)) : c.add(d.children.eq(e + i)) } else c = d.children.eq(d.active.index); else c = d.children; return "vertical" === d.settings.mode ? (c.each(function (c) { b += a(this).outerHeight() }), d.settings.slideMargin > 0 && (b += d.settings.slideMargin * (d.settings.minSlides - 1))) : b = Math.max.apply(Math, c.map(function () { return a(this).outerHeight(!1) }).get()), "border-box" === d.viewport.css("box-sizing") ? b += parseFloat(d.viewport.css("padding-top")) + parseFloat(d.viewport.css("padding-bottom")) + parseFloat(d.viewport.css("border-top-width")) + parseFloat(d.viewport.css("border-bottom-width")) : "padding-box" === d.viewport.css("box-sizing") && (b += parseFloat(d.viewport.css("padding-top")) + parseFloat(d.viewport.css("padding-bottom"))), b }, n = function () { var a = "100%"; return d.settings.slideWidth > 0 && (a = "horizontal" === d.settings.mode ? d.settings.maxSlides * d.settings.slideWidth + (d.settings.maxSlides - 1) * d.settings.slideMargin : d.settings.slideWidth), a }, o = function () { var a = d.settings.slideWidth, b = d.viewport.width(); if (0 === d.settings.slideWidth || d.settings.slideWidth > b && !d.carousel || "vertical" === d.settings.mode) a = b; else if (d.settings.maxSlides > 1 && "horizontal" === d.settings.mode) { if (b > d.maxThreshold) return a; b < d.minThreshold ? a = (b - d.settings.slideMargin * (d.settings.minSlides - 1)) / d.settings.minSlides : d.settings.shrinkItems && (a = Math.floor((b + d.settings.slideMargin) / Math.ceil((b + d.settings.slideMargin) / (a + d.settings.slideMargin)) - d.settings.slideMargin)) } return a }, p = function () { var a = 1, b = null; return "horizontal" === d.settings.mode && d.settings.slideWidth > 0 ? d.viewport.width() < d.minThreshold ? a = d.settings.minSlides : d.viewport.width() > d.maxThreshold ? a = d.settings.maxSlides : (b = d.children.first().width() + d.settings.slideMargin, a = Math.floor((d.viewport.width() + d.settings.slideMargin) / b)) : "vertical" === d.settings.mode && (a = d.settings.minSlides), a }, q = function () { var a = 0, b = 0, c = 0; if (d.settings.moveSlides > 0) if (d.settings.infiniteLoop) a = Math.ceil(d.children.length / r()); else for (; b < d.children.length;)++a, b = c + p(), c += d.settings.moveSlides <= p() ? d.settings.moveSlides : p(); else a = Math.ceil(d.children.length / p()); return a }, r = function () { return d.settings.moveSlides > 0 && d.settings.moveSlides <= p() ? d.settings.moveSlides : p() }, s = function () { var a, b, c; d.children.length > d.settings.maxSlides && d.active.last && !d.settings.infiniteLoop ? "horizontal" === d.settings.mode ? (b = d.children.last(), a = b.position(), t(-(a.left - (d.viewport.width() - b.outerWidth())), "reset", 0)) : "vertical" === d.settings.mode && (c = d.children.length - d.settings.minSlides, a = d.children.eq(c).position(), t(-a.top, "reset", 0)) : (a = d.children.eq(d.active.index * r()).position(), d.active.index === q() - 1 && (d.active.last = !0), void 0 !== a && ("horizontal" === d.settings.mode ? t(-a.left, "reset", 0) : "vertical" === d.settings.mode && t(-a.top, "reset", 0))) }, t = function (b, c, f, g) { var h, i; d.usingCSS ? (i = "vertical" === d.settings.mode ? "translate3d(0, " + b + "px, 0)" : "translate3d(" + b + "px, 0, 0)", e.css("-" + d.cssPrefix + "-transition-duration", f / 1e3 + "s"), "slide" === c ? (e.css(d.animProp, i), 0 !== f ? e.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function (b) { a(b.target).is(e) && (e.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), F()) }) : F()) : "reset" === c ? e.css(d.animProp, i) : "ticker" === c && (e.css("-" + d.cssPrefix + "-transition-timing-function", "linear"), e.css(d.animProp, i), 0 !== f ? e.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function (b) { a(b.target).is(e) && (e.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), t(g.resetValue, "reset", 0), K()) }) : (t(g.resetValue, "reset", 0), K()))) : (h = {}, h[d.animProp] = b, "slide" === c ? e.animate(h, f, d.settings.easing, function () { F() }) : "reset" === c ? e.css(d.animProp, b) : "ticker" === c && e.animate(h, f, "linear", function () { t(g.resetValue, "reset", 0), K() })) }, u = function () { for (var b = "", c = "", e = q(), f = 0; e > f; f++) c = "", d.settings.buildPager && a.isFunction(d.settings.buildPager) || d.settings.pagerCustom ? (c = d.settings.buildPager(f), d.pagerEl.addClass("bx-custom-pager")) : (c = f + 1, d.pagerEl.addClass("bx-default-pager")), b += '<div class="bx-pager-item"><a href="" data-slide-index="' + f + '" class="bx-pager-link">' + c + "</a></div>"; d.pagerEl.html(b) }, v = function () { d.settings.pagerCustom ? d.pagerEl = a(d.settings.pagerCustom) : (d.pagerEl = a('<div class="bx-pager" />'), d.settings.pagerSelector ? a(d.settings.pagerSelector).html(d.pagerEl) : d.controls.el.addClass("bx-has-pager").append(d.pagerEl), u()), d.pagerEl.on("click touchend", "a", D) }, w = function () { d.controls.next = a('<a class="bx-next" href="">' + d.settings.nextText + "</a>"), d.controls.prev = a('<a class="bx-prev" href="">' + d.settings.prevText + "</a>"), d.controls.next.bind("click touchend", z), d.controls.prev.bind("click touchend", A), d.settings.nextSelector && a(d.settings.nextSelector).append(d.controls.next), d.settings.prevSelector && a(d.settings.prevSelector).append(d.controls.prev), d.settings.nextSelector || d.settings.prevSelector || (d.controls.directionEl = a('<div class="bx-controls-direction" />'), d.controls.directionEl.append(d.controls.prev).append(d.controls.next), d.controls.el.addClass("bx-has-controls-direction").append(d.controls.directionEl)) }, x = function () { d.controls.start = a('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + d.settings.startText + "</a></div>"), d.controls.stop = a('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + d.settings.stopText + "</a></div>"), d.controls.autoEl = a('<div class="bx-controls-auto" />'), d.controls.autoEl.on("click", ".bx-start", B), d.controls.autoEl.on("click", ".bx-stop", C), d.settings.autoControlsCombine ? d.controls.autoEl.append(d.controls.start) : d.controls.autoEl.append(d.controls.start).append(d.controls.stop), d.settings.autoControlsSelector ? a(d.settings.autoControlsSelector).html(d.controls.autoEl) : d.controls.el.addClass("bx-has-controls-auto").append(d.controls.autoEl), G(d.settings.autoStart ? "stop" : "start") }, y = function () { d.children.each(function (b) { var c = a(this).find("img:first").attr("title"); void 0 !== c && ("" + c).length && a(this).append('<div class="bx-caption"><span>' + c + "</span></div>") }) }, z = function (a) { a.preventDefault(), d.controls.el.hasClass("disabled") || (d.settings.auto && d.settings.stopAutoOnClick && e.stopAuto(), e.goToNextSlide()) }, A = function (a) { a.preventDefault(), d.controls.el.hasClass("disabled") || (d.settings.auto && d.settings.stopAutoOnClick && e.stopAuto(), e.goToPrevSlide()) }, B = function (a) { e.startAuto(), a.preventDefault() }, C = function (a) { e.stopAuto(), a.preventDefault() }, D = function (b) { var c, f; b.preventDefault(), d.controls.el.hasClass("disabled") || (d.settings.auto && d.settings.stopAutoOnClick && e.stopAuto(), c = a(b.currentTarget), void 0 !== c.attr("data-slide-index") && (f = parseInt(c.attr("data-slide-index")), f !== d.active.index && e.goToSlide(f))) }, E = function (b) { var c = d.children.length; return "short" === d.settings.pagerType ? (d.settings.maxSlides > 1 && (c = Math.ceil(d.children.length / d.settings.maxSlides)), void d.pagerEl.html(b + 1 + d.settings.pagerShortSeparator + c)) : (d.pagerEl.find("a").removeClass("active"), void d.pagerEl.each(function (c, d) { a(d).find("a").eq(b).addClass("active") })) }, F = function () { if (d.settings.infiniteLoop) { var a = ""; 0 === d.active.index ? a = d.children.eq(0).position() : d.active.index === q() - 1 && d.carousel ? a = d.children.eq((q() - 1) * r()).position() : d.active.index === d.children.length - 1 && (a = d.children.eq(d.children.length - 1).position()), a && ("horizontal" === d.settings.mode ? t(-a.left, "reset", 0) : "vertical" === d.settings.mode && t(-a.top, "reset", 0)) } d.working = !1, d.settings.onSlideAfter.call(e, d.children.eq(d.active.index), d.oldIndex, d.active.index) }, G = function (a) { d.settings.autoControlsCombine ? d.controls.autoEl.html(d.controls[a]) : (d.controls.autoEl.find("a").removeClass("active"), d.controls.autoEl.find("a:not(.bx-" + a + ")").addClass("active")) }, H = function () { 1 === q() ? (d.controls.prev.addClass("disabled"), d.controls.next.addClass("disabled")) : !d.settings.infiniteLoop && d.settings.hideControlOnEnd && (0 === d.active.index ? (d.controls.prev.addClass("disabled"), d.controls.next.removeClass("disabled")) : d.active.index === q() - 1 ? (d.controls.next.addClass("disabled"), d.controls.prev.removeClass("disabled")) : (d.controls.prev.removeClass("disabled"), d.controls.next.removeClass("disabled"))) }, I = function () { if (d.settings.autoDelay > 0) { setTimeout(e.startAuto, d.settings.autoDelay) } else e.startAuto(), a(window).focus(function () { e.startAuto() }).blur(function () { e.stopAuto() }); d.settings.autoHover && e.hover(function () { d.interval && (e.stopAuto(!0), d.autoPaused = !0) }, function () { d.autoPaused && (e.startAuto(!0), d.autoPaused = null) }) }, J = function () { var b, c, f, g, h, i, j, k, l = 0; "next" === d.settings.autoDirection ? e.append(d.children.clone().addClass("bx-clone")) : (e.prepend(d.children.clone().addClass("bx-clone")), b = d.children.first().position(), l = "horizontal" === d.settings.mode ? -b.left : -b.top), t(l, "reset", 0), d.settings.pager = !1, d.settings.controls = !1, d.settings.autoControls = !1, d.settings.tickerHover && (d.usingCSS ? (g = "horizontal" === d.settings.mode ? 4 : 5, d.viewport.hover(function () { c = e.css("-" + d.cssPrefix + "-transform"), f = parseFloat(c.split(",")[g]), t(f, "reset", 0) }, function () { k = 0, d.children.each(function (b) { k += "horizontal" === d.settings.mode ? a(this).outerWidth(!0) : a(this).outerHeight(!0) }), h = d.settings.speed / k, i = "horizontal" === d.settings.mode ? "left" : "top", j = h * (k - Math.abs(parseInt(f))), K(j) })) : d.viewport.hover(function () { e.stop() }, function () { k = 0, d.children.each(function (b) { k += "horizontal" === d.settings.mode ? a(this).outerWidth(!0) : a(this).outerHeight(!0) }), h = d.settings.speed / k, i = "horizontal" === d.settings.mode ? "left" : "top", j = h * (k - Math.abs(parseInt(e.css(i)))), K(j) })), K() }, K = function (a) { var b, c, f, g = a ? a : d.settings.speed, h = { left: 0, top: 0 }, i = { left: 0, top: 0 }; "next" === d.settings.autoDirection ? h = e.find(".bx-clone").first().position() : i = d.children.first().position(), b = "horizontal" === d.settings.mode ? -h.left : -h.top, c = "horizontal" === d.settings.mode ? -i.left : -i.top, f = { resetValue: c }, t(b, "ticker", g, f) }, L = function (b) { var c = a(window), d = { top: c.scrollTop(), left: c.scrollLeft() }, e = b.offset(); return d.right = d.left + c.width(), d.bottom = d.top + c.height(), e.right = e.left + b.outerWidth(), e.bottom = e.top + b.outerHeight(), !(d.right < e.left || d.left > e.right || d.bottom < e.top || d.top > e.bottom) }, M = function (a) { var b = document.activeElement.tagName.toLowerCase(), c = "input|textarea", d = new RegExp(b, ["i"]), f = d.exec(c); if (null == f && L(e)) { if (39 === a.keyCode) return z(a), !1; if (37 === a.keyCode) return A(a), !1 } }, N = function () { d.touch = { start: { x: 0, y: 0 }, end: { x: 0, y: 0 } }, d.viewport.bind("touchstart MSPointerDown pointerdown", O), d.viewport.on("click", ".bxslider a", function (a) { d.viewport.hasClass("click-disabled") && (a.preventDefault(), d.viewport.removeClass("click-disabled")) }) }, O = function (a) { if (d.controls.el.addClass("disabled"), d.working) a.preventDefault(), d.controls.el.removeClass("disabled"); else { d.touch.originalPos = e.position(); var b = a.originalEvent, c = "undefined" != typeof b.changedTouches ? b.changedTouches : [b]; d.touch.start.x = c[0].pageX, d.touch.start.y = c[0].pageY, d.viewport.get(0).setPointerCapture && (d.pointerId = b.pointerId, d.viewport.get(0).setPointerCapture(d.pointerId)), d.viewport.bind("touchmove MSPointerMove pointermove", Q), d.viewport.bind("touchend MSPointerUp pointerup", R), d.viewport.bind("MSPointerCancel pointercancel", P) } }, P = function (a) { t(d.touch.originalPos.left, "reset", 0), d.controls.el.removeClass("disabled"), d.viewport.unbind("MSPointerCancel pointercancel", P), d.viewport.unbind("touchmove MSPointerMove pointermove", Q), d.viewport.unbind("touchend MSPointerUp pointerup", R), d.viewport.get(0).releasePointerCapture && d.viewport.get(0).releasePointerCapture(d.pointerId) }, Q = function (a) { var b = a.originalEvent, c = "undefined" != typeof b.changedTouches ? b.changedTouches : [b], e = Math.abs(c[0].pageX - d.touch.start.x), f = Math.abs(c[0].pageY - d.touch.start.y), g = 0, h = 0; 3 * e > f && d.settings.preventDefaultSwipeX ? a.preventDefault() : 3 * f > e && d.settings.preventDefaultSwipeY && a.preventDefault(), "fade" !== d.settings.mode && d.settings.oneToOneTouch && ("horizontal" === d.settings.mode ? (h = c[0].pageX - d.touch.start.x, g = d.touch.originalPos.left + h) : (h = c[0].pageY - d.touch.start.y, g = d.touch.originalPos.top + h), t(g, "reset", 0)) }, R = function (a) { d.viewport.unbind("touchmove MSPointerMove pointermove", Q), d.controls.el.removeClass("disabled"); var b = a.originalEvent, c = "undefined" != typeof b.changedTouches ? b.changedTouches : [b], f = 0, g = 0; d.touch.end.x = c[0].pageX, d.touch.end.y = c[0].pageY, "fade" === d.settings.mode ? (g = Math.abs(d.touch.start.x - d.touch.end.x), g >= d.settings.swipeThreshold && (d.touch.start.x > d.touch.end.x ? e.goToNextSlide() : e.goToPrevSlide(), e.stopAuto())) : ("horizontal" === d.settings.mode ? (g = d.touch.end.x - d.touch.start.x, f = d.touch.originalPos.left) : (g = d.touch.end.y - d.touch.start.y, f = d.touch.originalPos.top), !d.settings.infiniteLoop && (0 === d.active.index && g > 0 || d.active.last && 0 > g) ? t(f, "reset", 200) : Math.abs(g) >= d.settings.swipeThreshold ? (0 > g ? e.goToNextSlide() : e.goToPrevSlide(), e.stopAuto()) : t(f, "reset", 200)), d.viewport.unbind("touchend MSPointerUp pointerup", R), d.viewport.get(0).releasePointerCapture && d.viewport.get(0).releasePointerCapture(d.pointerId) }, S = function (b) { if (d.initialized) if (d.working) window.setTimeout(S, 10); else { var c = a(window).width(), h = a(window).height(); (f !== c || g !== h) && (f = c, g = h, e.redrawSlider(), d.settings.onSliderResize.call(e, d.active.index)) } }, T = function (a) { var b = p(); d.settings.ariaHidden && !d.settings.ticker && (d.children.attr("aria-hidden", "true"), d.children.slice(a, a + b).attr("aria-hidden", "false")) }, U = function (a) { return 0 > a ? d.settings.infiniteLoop ? q() - 1 : d.active.index : a >= q() ? d.settings.infiniteLoop ? 0 : d.active.index : a }; return e.goToSlide = function (b, c) { var f, g, h, i, j = !0, k = 0, l = { left: 0, top: 0 }, n = null; if (d.oldIndex = d.active.index, d.active.index = U(b), !d.working && d.active.index !== d.oldIndex) { if (d.working = !0, j = d.settings.onSlideBefore.call(e, d.children.eq(d.active.index), d.oldIndex, d.active.index), "undefined" != typeof j && !j) return d.active.index = d.oldIndex, void (d.working = !1); "next" === c ? d.settings.onSlideNext.call(e, d.children.eq(d.active.index), d.oldIndex, d.active.index) || (j = !1) : "prev" === c && (d.settings.onSlidePrev.call(e, d.children.eq(d.active.index), d.oldIndex, d.active.index) || (j = !1)), d.active.last = d.active.index >= q() - 1, (d.settings.pager || d.settings.pagerCustom) && E(d.active.index), d.settings.controls && H(), "fade" === d.settings.mode ? (d.settings.adaptiveHeight && d.viewport.height() !== m() && d.viewport.animate({ height: m() }, d.settings.adaptiveHeightSpeed), d.children.filter(":visible").fadeOut(d.settings.speed).css({ zIndex: 0 }), d.children.eq(d.active.index).css("zIndex", d.settings.slideZIndex + 1).fadeIn(d.settings.speed, function () { a(this).css("zIndex", d.settings.slideZIndex), F() })) : (d.settings.adaptiveHeight && d.viewport.height() !== m() && d.viewport.animate({ height: m() }, d.settings.adaptiveHeightSpeed), !d.settings.infiniteLoop && d.carousel && d.active.last ? "horizontal" === d.settings.mode ? (n = d.children.eq(d.children.length - 1), l = n.position(), k = d.viewport.width() - n.outerWidth()) : (f = d.children.length - d.settings.minSlides, l = d.children.eq(f).position()) : d.carousel && d.active.last && "prev" === c ? (g = 1 === d.settings.moveSlides ? d.settings.maxSlides - r() : (q() - 1) * r() - (d.children.length - d.settings.maxSlides), n = e.children(".bx-clone").eq(g), l = n.position()) : "next" === c && 0 === d.active.index ? (l = e.find("> .bx-clone").eq(d.settings.maxSlides).position(), d.active.last = !1) : b >= 0 && (i = b * parseInt(r()), l = d.children.eq(i).position()), "undefined" != typeof l ? (h = "horizontal" === d.settings.mode ? -(l.left - k) : -l.top, t(h, "slide", d.settings.speed)) : d.working = !1), d.settings.ariaHidden && T(d.active.index * r()) } }, e.goToNextSlide = function () { if (d.settings.infiniteLoop || !d.active.last) { var a = parseInt(d.active.index) + 1; e.goToSlide(a, "next") } }, e.goToPrevSlide = function () { if (d.settings.infiniteLoop || 0 !== d.active.index) { var a = parseInt(d.active.index) - 1; e.goToSlide(a, "prev") } }, e.startAuto = function (a) { d.interval || (d.interval = setInterval(function () { "next" === d.settings.autoDirection ? e.goToNextSlide() : e.goToPrevSlide() }, d.settings.pause), d.settings.autoControls && a !== !0 && G("stop")) }, e.stopAuto = function (a) { d.interval && (clearInterval(d.interval), d.interval = null, d.settings.autoControls && a !== !0 && G("start")) }, e.getCurrentSlide = function () { return d.active.index }, e.getCurrentSlideElement = function () { return d.children.eq(d.active.index) }, e.getSlideElement = function (a) { return d.children.eq(a) }, e.getSlideCount = function () { return d.children.length }, e.isWorking = function () { return d.working }, e.redrawSlider = function () { d.children.add(e.find(".bx-clone")).outerWidth(o()), d.viewport.css("height", m()), d.settings.ticker || s(), d.active.last && (d.active.index = q() - 1), d.active.index >= q() && (d.active.last = !0), d.settings.pager && !d.settings.pagerCustom && (u(), E(d.active.index)), d.settings.ariaHidden && T(d.active.index * r()) }, e.destroySlider = function () { d.initialized && (d.initialized = !1, a(".bx-clone", this).remove(), d.children.each(function () { void 0 !== a(this).data("origStyle") ? a(this).attr("style", a(this).data("origStyle")) : a(this).removeAttr("style") }), void 0 !== a(this).data("origStyle") ? this.attr("style", a(this).data("origStyle")) : a(this).removeAttr("style"), a(this).unwrap().unwrap(), d.controls.el && d.controls.el.remove(), d.controls.next && d.controls.next.remove(), d.controls.prev && d.controls.prev.remove(), d.pagerEl && d.settings.controls && !d.settings.pagerCustom && d.pagerEl.remove(), a(".bx-caption", this).remove(), d.controls.autoEl && d.controls.autoEl.remove(), clearInterval(d.interval), d.settings.responsive && a(window).unbind("resize", S), d.settings.keyboardEnabled && a(document).unbind("keydown", M), a(this).removeData("bxSlider")) }, e.reloadSlider = function (b) { void 0 !== b && (c = b), e.destroySlider(), h(), a(e).data("bxSlider", this) }, h(), a(e).data("bxSlider", this), this } } }(jQuery);

/*
    jQuery Masked Input Plugin
    Copyright (c) 2007 - 2015 Josh Bush (digitalbush.com)
    Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
    Version: 1.4.1
*/
!function (a) { "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof exports ? require("jquery") : jQuery) }(function (a) { var b, c = navigator.userAgent, d = /iphone/i.test(c), e = /chrome/i.test(c), f = /android/i.test(c); a.mask = { definitions: { 9: "[0-9]", a: "[A-Za-z]", "*": "[A-Za-z0-9]" }, autoclear: !0, dataName: "rawMaskFn", placeholder: "_" }, a.fn.extend({ caret: function (a, b) { var c; if (0 !== this.length && !this.is(":hidden")) return "number" == typeof a ? (b = "number" == typeof b ? b : a, this.each(function () { this.setSelectionRange ? this.setSelectionRange(a, b) : this.createTextRange && (c = this.createTextRange(), c.collapse(!0), c.moveEnd("character", b), c.moveStart("character", a), c.select()) })) : (this[0].setSelectionRange ? (a = this[0].selectionStart, b = this[0].selectionEnd) : document.selection && document.selection.createRange && (c = document.selection.createRange(), a = 0 - c.duplicate().moveStart("character", -1e5), b = a + c.text.length), { begin: a, end: b }) }, unmask: function () { return this.trigger("unmask") }, mask: function (c, g) { var h, i, j, k, l, m, n, o; if (!c && this.length > 0) { h = a(this[0]); var p = h.data(a.mask.dataName); return p ? p() : void 0 } return g = a.extend({ autoclear: a.mask.autoclear, placeholder: a.mask.placeholder, completed: null }, g), i = a.mask.definitions, j = [], k = n = c.length, l = null, a.each(c.split(""), function (a, b) { "?" == b ? (n--, k = a) : i[b] ? (j.push(new RegExp(i[b])), null === l && (l = j.length - 1), k > a && (m = j.length - 1)) : j.push(null) }), this.trigger("unmask").each(function () { function h() { if (g.completed) { for (var a = l; m >= a; a++) if (j[a] && C[a] === p(a)) return; g.completed.call(B) } } function p(a) { return g.placeholder.charAt(a < g.placeholder.length ? a : 0) } function q(a) { for (; ++a < n && !j[a];); return a } function r(a) { for (; --a >= 0 && !j[a];); return a } function s(a, b) { var c, d; if (!(0 > a)) { for (c = a, d = q(b) ; n > c; c++) if (j[c]) { if (!(n > d && j[c].test(C[d]))) break; C[c] = C[d], C[d] = p(d), d = q(d) } z(), B.caret(Math.max(l, a)) } } function t(a) { var b, c, d, e; for (b = a, c = p(a) ; n > b; b++) if (j[b]) { if (d = q(b), e = C[b], C[b] = c, !(n > d && j[d].test(e))) break; c = e } } function u() { var a = B.val(), b = B.caret(); if (o && o.length && o.length > a.length) { for (A(!0) ; b.begin > 0 && !j[b.begin - 1];) b.begin--; if (0 === b.begin) for (; b.begin < l && !j[b.begin];) b.begin++; B.caret(b.begin, b.begin) } else { for (A(!0) ; b.begin < n && !j[b.begin];) b.begin++; B.caret(b.begin, b.begin) } h() } function v() { A(), B.val() != E && B.change() } function w(a) { if (!B.prop("readonly")) { var b, c, e, f = a.which || a.keyCode; o = B.val(), 8 === f || 46 === f || d && 127 === f ? (b = B.caret(), c = b.begin, e = b.end, e - c === 0 && (c = 46 !== f ? r(c) : e = q(c - 1), e = 46 === f ? q(e) : e), y(c, e), s(c, e - 1), a.preventDefault()) : 13 === f ? v.call(this, a) : 27 === f && (B.val(E), B.caret(0, A()), a.preventDefault()) } } function x(b) { if (!B.prop("readonly")) { var c, d, e, g = b.which || b.keyCode, i = B.caret(); if (!(b.ctrlKey || b.altKey || b.metaKey || 32 > g) && g && 13 !== g) { if (i.end - i.begin !== 0 && (y(i.begin, i.end), s(i.begin, i.end - 1)), c = q(i.begin - 1), n > c && (d = String.fromCharCode(g), j[c].test(d))) { if (t(c), C[c] = d, z(), e = q(c), f) { var k = function () { a.proxy(a.fn.caret, B, e)() }; setTimeout(k, 0) } else B.caret(e); i.begin <= m && h() } b.preventDefault() } } } function y(a, b) { var c; for (c = a; b > c && n > c; c++) j[c] && (C[c] = p(c)) } function z() { B.val(C.join("")) } function A(a) { var b, c, d, e = B.val(), f = -1; for (b = 0, d = 0; n > b; b++) if (j[b]) { for (C[b] = p(b) ; d++ < e.length;) if (c = e.charAt(d - 1), j[b].test(c)) { C[b] = c, f = b; break } if (d > e.length) { y(b + 1, n); break } } else C[b] === e.charAt(d) && d++, k > b && (f = b); return a ? z() : k > f + 1 ? g.autoclear || C.join("") === D ? (B.val() && B.val(""), y(0, n)) : z() : (z(), B.val(B.val().substring(0, f + 1))), k ? b : l } var B = a(this), C = a.map(c.split(""), function (a, b) { return "?" != a ? i[a] ? p(b) : a : void 0 }), D = C.join(""), E = B.val(); B.data(a.mask.dataName, function () { return a.map(C, function (a, b) { return j[b] && a != p(b) ? a : null }).join("") }), B.one("unmask", function () { B.off(".mask").removeData(a.mask.dataName) }).on("focus.mask", function () { if (!B.prop("readonly")) { clearTimeout(b); var a; E = B.val(), a = A(), b = setTimeout(function () { B.get(0) === document.activeElement && (z(), a == c.replace("?", "").length ? B.caret(0, a) : B.caret(a)) }, 10) } }).on("blur.mask", v).on("keydown.mask", w).on("keypress.mask", x).on("input.mask paste.mask", function () { B.prop("readonly") || setTimeout(function () { var a = A(!0); B.caret(a), h() }, 0) }), e && f && B.off("input.mask").on("input.mask", u), A() }) } }) });

/* TINY SORT */
(function (e) { var a = false, g = null, f = parseFloat, b = /(\d+\.?\d*)$/g; e.tinysort = { id: "TinySort", version: "1.2.18", copyright: "Copyright (c) 2008-2012 Ron Valstar", uri: "http://tinysort.sjeiti.com/", licenced: { MIT: "http://www.opensource.org/licenses/mit-license.php", GPL: "http://www.gnu.org/licenses/gpl.html" }, defaults: { order: "asc", attr: g, data: g, useVal: a, place: "start", returns: a, cases: a, forceStrings: a, sortFunction: g } }; e.fn.extend({ tinysort: function (m, h) { if (m && typeof (m) != "string") { h = m; m = g } var n = e.extend({}, e.tinysort.defaults, h), s, B = this, x = e(this).length, C = {}, p = !(!m || m == ""), q = !(n.attr === g || n.attr == ""), w = n.data !== g, j = p && m[0] == ":", k = j ? B.filter(m) : B, r = n.sortFunction, v = n.order == "asc" ? 1 : -1, l = []; if (!r) { r = n.order == "rand" ? function () { return Math.random() < 0.5 ? 1 : -1 } : function (F, E) { var i = !n.cases ? d(F.s) : F.s, K = !n.cases ? d(E.s) : E.s; if (!n.forceStrings) { var H = i.match(b), G = K.match(b); if (H && G) { var J = i.substr(0, i.length - H[0].length), I = K.substr(0, K.length - G[0].length); if (J == I) { i = f(H[0]); K = f(G[0]) } } } return v * (i < K ? -1 : (i > K ? 1 : 0)) } } B.each(function (G, H) { var I = e(H), E = p ? (j ? k.filter(H) : I.find(m)) : I, J = w ? E.data(n.data) : (q ? E.attr(n.attr) : (n.useVal ? E.val() : E.text())), F = I.parent(); if (!C[F]) { C[F] = { s: [], n: [] } } if (E.length > 0) { C[F].s.push({ s: J, e: I, n: G }) } else { C[F].n.push({ e: I, n: G }) } }); for (s in C) { C[s].s.sort(r) } for (s in C) { var y = C[s], A = [], D = x, u = [0, 0], z; switch (n.place) { case "first": e.each(y.s, function (E, F) { D = Math.min(D, F.n) }); break; case "org": e.each(y.s, function (E, F) { A.push(F.n) }); break; case "end": D = y.n.length; break; default: D = 0 } for (z = 0; z < x; z++) { var o = c(A, z) ? !a : z >= D && z < D + y.s.length, t = (o ? y.s : y.n)[u[o ? 0 : 1]].e; t.parent().append(t); if (o || !n.returns) { l.push(t.get(0)) } u[o ? 0 : 1]++ } } return B.pushStack(l) } }); function d(h) { return h && h.toLowerCase ? h.toLowerCase() : h } function c(j, m) { for (var k = 0, h = j.length; k < h; k++) { if (j[k] == m) { return !a } } return a } e.fn.TinySort = e.fn.Tinysort = e.fn.tsort = e.fn.tinysort })(jQuery);

/*
 * verge 1.9.1+201402130803
 * https://github.com/ryanve/verge
 * MIT License 2013 Ryan Van Etten
 */
!function (a, b, c) { "undefined" != typeof module && module.exports ? module.exports = c() : a[b] = c() }(this, "verge", function () { function a() { return { width: k(), height: l() } } function b(a, b) { var c = {}; return b = +b || 0, c.width = (c.right = a.right + b) - (c.left = a.left - b), c.height = (c.bottom = a.bottom + b) - (c.top = a.top - b), c } function c(a, c) { return a = a && !a.nodeType ? a[0] : a, a && 1 === a.nodeType ? b(a.getBoundingClientRect(), c) : !1 } function d(b) { b = null == b ? a() : 1 === b.nodeType ? c(b) : b; var d = b.height, e = b.width; return d = "function" == typeof d ? d.call(b) : d, e = "function" == typeof e ? e.call(b) : e, e / d } var e = {}, f = "undefined" != typeof window && window, g = "undefined" != typeof document && document, h = g && g.documentElement, i = f.matchMedia || f.msMatchMedia, j = i ? function (a) { return !!i.call(f, a).matches } : function () { return !1 }, k = e.viewportW = function () { var a = h.clientWidth, b = f.innerWidth; return b > a ? b : a }, l = e.viewportH = function () { var a = h.clientHeight, b = f.innerHeight; return b > a ? b : a }; return e.mq = j, e.matchMedia = i ? function () { return i.apply(f, arguments) } : function () { return {} }, e.viewport = a, e.scrollX = function () { return f.pageXOffset || h.scrollLeft }, e.scrollY = function () { return f.pageYOffset || h.scrollTop }, e.rectangle = c, e.aspect = d, e.inX = function (a, b) { var d = c(a, b); return !!d && d.right >= 0 && d.left <= k() }, e.inY = function (a, b) { var d = c(a, b); return !!d && d.bottom >= 0 && d.top <= l() }, e.inViewport = function (a, b) { var d = c(a, b); return !!d && d.bottom >= 0 && d.right >= 0 && d.top <= l() && d.left <= k() }, e });
jQuery.extend(verge);

// Application Scripts:

// покажем - спрячем форму поиска
// при открытии десктоп-подменю покажем оверлей (затемним фон)
// подключим мобильное меню
// подключим модальные окна
// подключим стилизованные select
// подключим тултипы
// вкладки
// меняем стиль хидера на главной
// хиро слайдер
// слайдер просмотров
// видео в модальном окне
// callback-block - покажем скрытый select когда снимаем галочку с чекбокса
// оформление ОСАГО - по клику на линк покажем дополнительные поля формы
// оформление select с иконками в optgroup

// функція оформлення SEO-тексту (сторінка "Страховые компании")
// щоб візуально знаходився внизу контейнера і не налазив на таблицю
//---------------------------------------------------------------------------------------

// SeoBlock - функція, яка зміщує абсолютно позиціонований oSeoBlock нижчке вмісту (збільшує відступ від блока, який візуально вище)
function SeoBlock (oSeoBlock){
    var t=this;
    t.seoBlock = oSeoBlock;
    t.seoWrap = t.seoBlock.parent(".b-seoWrap");	//блок-обгортка в якому знаходиться oSeoBlock і якому треба збільшити висоту

    t.recalcHeight = function(){	// функція збільшення висоти t.seoWrap на висоту oSeoBlock
            t.seoWrap.height("auto");
            t.seoWrap.height(t.seoWrap.height() + t.seoBlock.outerHeight(true));
    }

    $(document).ready(t.recalcHeight);  //виконається при події "ready"
    $(window).on("load", t.recalcHeight);   //виконається при події "load" (пізніше за "ready"), для стабільної роботи
    $(window).resize(t.recalcHeight);	//виконається при зміні розміру viewport
}
function Accordion (oAccordion){
    var t=this;
    t.accBtns = oAccordion.find("a.js-accordionBtn");	//всі кнопки акордеонів
    t.toggleAcc = function(event){	//	функція, яка має спрацьовувати при кліку на посилання для розгортання акордеона
        event.preventDefault();
        event.stopPropagation();
        $(this).find("span").fadeToggle(200);
        $(this).toggleClass("js-accordionBtn_active");
        $(this).next("div.js-accordionContent").slideToggle(400);
    }
    t.accBtns.click(t.toggleAcc);
}

jQuery(document).ready(function ($) {
    //
    //підключаємо оформлення SEO-тексту (щоб не налазив на текст вище)
    var seoDiv = new SeoBlock($("div.b-seo"));
	//підключаємо можливість ховати текст під кат
	var accordion = new Accordion($(".js-accordion"));
    // покажем - спрячем форму поиска
    //---------------------------------------------------------------------------------------
    (function () {
            var $search__btn = $('[data-searchform]'),
                $form = $('.b-search'),
                $body=$('body'),
                method = {};

            method.show = function () {
                $form.addClass('active');
                method.changeIcon('close');
                method.closeOnClick();
            };
            method.hide = function () {
                $form.removeClass('active');
                method.changeIcon('search');
                $body.unbind('click', method.hide);
            };

            method.changeIcon = function (event) {//поменяем иконки в хидере (в десктопной и мобильной версии)
                if (event === 'close') {
                    $search__btn.find('i[class^="icon-"]').removeAttr('class').addClass('icon-cross');
                    $search__btn.find('i.material-icons').text('close');
                } else {
                    if (event === 'search') {
                        $search__btn.find('i[class^="icon-"]').removeAttr('class').addClass('icon-search');
                        $search__btn.find('i.material-icons').text('search');
                    }
                }
            };

            method.closeOnClick = function () {//доп.метод закрытия формы
                $form.on('mouseleave', function () {
                    $body.bind('click', method.hide);
                }).on('mouseenter', function () {
                    $body.unbind('click', method.hide);
                });
            }

            $form.on('click', '.b-search__form', function (e) {
                e.stopPropagation();
            });

            $('.b-header').on('click', '[data-searchform]', function (e) {
                e.preventDefault();
                if (!$form.hasClass('active')) {
                    method.show();
                } else {
                    method.hide();
                }
            });
    })();

    //
    // при открытии десктоп-подменю покажем оверлей (затемним фон)
    //---------------------------------------------------------------------------------------
    (function () {
        var $menu_btn = $('.b-menu--left').find('.b-menu__dropdown');
            
        $menu_btn.append('<div class="b-menu__overlay"></div>')
        .on('click', '.b-menu__overlay', function (e) {//добавили оверлей, при клике по нему не меняем location.href
            e.preventDefault();
        });
    })();

    //
    // подключим мобильное меню
    //---------------------------------------------------------------------------------------
    $(".button-collapse").sideNav();
    //
    // подключим модальные окна
    //---------------------------------------------------------------------------------------
    $('.modal-trigger').leanModal();
    //
    // подключим стилизованные select
    //---------------------------------------------------------------------------------------
    $('select').material_select();
    //
    // подключим тултипы - перенесено в розділ сортування таблиці!!!
    //---------------------------------------------------------------------------------------
    //$('.tooltipped, .js-tooltip').tooltip({ delay: 50 });

    //
    // вкладки
    //---------------------------------------------------------------------------------------
    function initTabs() {
        var $list = $('.js-tabs'),
            $content =$('.js-tabs-content > div'),
            method = {};

        method.init = (function () {//спрячем "лишние" вкладки
            $content.hide()
            $list.each(function () {
                var current = $(this).find('li.current');
                if (current.length <1 ) { $(this).find('li:first').addClass('current'); }
                current = $(this).find('li.current a').attr('href');
                $(current).show();
            });
        })();

        method.show = function (el) {//обработка клика по вкладке
            var $tabs = el.parents('ul').find('li');
            var tab_next = el.attr('href');
            var tab_current = $tabs.filter('.current').find('a').attr('href');
            $(tab_current).hide();
            $tabs.removeClass('current');
            el.parent().addClass('current');
            $(tab_next).fadeIn();
            history.pushState(null, null, window.location.search + el.attr('href'));
        };

        
        $list.on('click', 'a[href^="#"]', function (e) {//клик по вкладке
            e.preventDefault();
            method.show($(this));
        });

        method.parsing = (function () {//парсим линк и открываем нужную вкладку при загрузке
            var hash = window.location.hash;
            if (hash) {
                var selectedTab = $list.find('a[href="' + hash + '"]');
                selectedTab.trigger('click', true);
            };
        })();
    };
    if ($('.js-tabs').length) { initTabs(); }

    //
    // меняем стиль хидера на главной
    //---------------------------------------------------------------------------------------
    function changeHeader() {
        var $header = $('.js-header'),
            $window = $(window),
            className = 'b-header--hero',
            method = {};

        method.checkScroll = function () {
            var fromTop = $window.scrollTop();

            if (fromTop > 100) {
                $header.removeClass(className);
            } else {
                $header.addClass(className);
            };
        };

        method.checkScroll();

        $window.bind('scroll', method.checkScroll);
    };
    if ($('.js-header').length) {
        changeHeader();
    }


    //
    // хиро слайдер
    //---------------------------------------------------------------------------------------
    function initHero() {
        var $slider = $('.js-hero');
        $slider.bxSlider({
            controls: false,
            pagerCustom: '.js-hero-nav',
            auto: true,
            pause: 8000,
            autoHover:true,
            mode: 'fade',
            onSliderLoad: function (currentIndex) {
                $slider.children('li').eq(currentIndex).find('.js-hero-caption').addClass('active');
            },
            onSlideBefore: function($slideElement) {
                $slideElement.find('.js-hero-caption').removeClass('active');
            },
            onSlideAfter: function ($slideElement) {
                $slideElement.find('.js-hero-caption').addClass('active');
            }
        });

        $('.js-hero-nav').hover(function () {
            $slider.stopAuto();
        }, function () {
            $slider.startAuto();
        });
    };
    if ($('.js-hero').length) { initHero();}

    //
    // слайдер просмотров
    //---------------------------------------------------------------------------------------
    function initHistorySlider() {
        var $slider = $('.js-history'),
            rtime, //переменные для пересчета ресайза окна с задержкой delta
            timeout = false,
            delta = 200,
            method = {};

        method.getSliderSettings = function () {
            var setting,
                    settings1 = {
                        maxSlides: 1,
                        minSlides: 1,
                        slideWidth: 302,
                    },
                    settings2 = {
                        maxSlides: 1,
                        minSlides: 1,
                        slideWidth: 372,
                    },
                    settings3 = {
                        maxSlides: 2,
                        minSlides: 2,
                        slideWidth: 372,
                    },
                    settings4 = {
                        maxSlides: 3,
                        minSlides: 3,
                        slideWidth: 372,
                    },
                    common = {
                        slideMargin: 10,
                        moveSlides: 1,
                        auto: false,
                        pager: false,
                        mode: 'horizontal',
                        infiniteLoop: false,
                        hideControlOnEnd: true,
                        useCSS: false,
                        nextSelector: '.js-history-next',
                        prevSelector: '.js-history-prev',
                        nextText: '<i class="icon-right"></i>',
                        prevText: '<i class="icon-left"></i>',
                    },
                    winW = $(window).width();
            if (winW < 400) {
                setting = $.extend(settings1, common);
            }
            if (winW >= 400 && winW < 800) {
                setting = $.extend(settings2, common);
            }
            if (winW >= 800 && winW < 1200) {
                setting = $.extend(settings3, common);
            }
            if (winW >= 1200) {
                setting = $.extend(settings4, common);
            }
            return setting;
        };

        method.reloadSliderSettings = function () {
            $slider.reloadSlider(method.getSliderSettings());
        };

        method.endResize = function () {
            if (new Date() - rtime < delta) {
                setTimeout(method.endResize, delta);
            } else {
                timeout = false;
                //ресайз окончен - пересчитываем
                method.reloadSliderSettings();
            }
        };

        method.startResize = function () {
            rtime = new Date();
            if (timeout === false) {
                timeout = true;
                setTimeout(method.endResize, delta);
            }
        };

        $slider.bxSlider(method.getSliderSettings());//запускаем слайдер

        $(window).bind('resize', method.startResize);//пересчитываем кол-во видимых элементов при ресайзе окна с задержкой .2с

        $('.js-history').on('click', '.js-del', function () {//удаляем элементы
            var $el = $(this).parents('li');
            $el.remove();
            method.reloadSliderSettings();
            var count = $slider.getSlideCount();
            if (count === 0) {//если удалили все - скрыли блок
                $('.b-history').hide();
            }
        });
    };

    if ($('.js-history').length) {
        initHistorySlider();
    };

    //
    // видео в модальном окне
    //---------------------------------------------------------------------------------------
    $('.js-videolink').on('click', function (e) {
        e.preventDefault();
        var link = $(this).attr('href'),
            id = getYoutubeID(link);

        if (id) {
            $('#videomodal').find('iframe').attr('src', 'https://www.youtube.com/embed/' + id + '?rel=0&amp;showinfo=0;autoplay=1');
            $('#videomodal').openModal({
                complete: function () {
                    $('#videomodal').find('iframe').attr('src', '');
                }
            });
        }

        function getYoutubeID(url) {//парсим youtube-ссылку, возвращаем id видео
            var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
            var match = url.match(regExp),
                urllink;
            if (match && match[1].length == 11) {
                urllink = match[1];
            } else {
                urllink = false;
            }
            return urllink;
        }
    });

    //
    // маска для телефонного номера
    //---------------------------------------------------------------------------------------
    $('.js-input-phone').mask('+38 (099) 999-99-99');
    $('.js-input-phone--for-brn').mask('+38 (09?9) 999-99-99');
    $('.js-input-phone--brn').mask('(999) 999 99 99',{placeholder:"0"});
    
    // callback-block - покажем скрытый select когда снимаем галочку с чекбокса
    //---------------------------------------------------------------------------------------
    (function () {
        $('.js-callback-check').each(function () {//для статичного блока на странице и формы в модальном окне
            var $el = $(this);
            $el.one('change', function () {//выполним только один раз
                if (!$(this).is(':checked')) {
                    $(this).parent('p').addClass('hide').nextAll('.js-callback-check-target').removeClass('hide');
                };
            });
        });
    })();

    //
    // оформление ОСАГО - по клику на линк покажем дополнительные поля формы
    //---------------------------------------------------------------------------------------
    function showFormBlock() {
        $('.js-form-links').one('click', 'a', function (e) {
            e.preventDefault();
            var target = $(this).attr('href'),
                $target = $(target);
            if ($target.length) {
                $('.js-form-links').hide();
                $target.removeClass('hide');
                $('html, body').animate({ scrollTop: $target.offset().top - 50 }, 800);
            }
        });
    };
    if ($('.js-form-links').length) {
        showFormBlock();
    };

    //
    // оформление select с иконками в optgroup
    //---------------------------------------------------------------------------------------
    /*
    function stylingOptionGroup() {
        $('select.js-optgroup').each(function () {
            var $el = $(this),
                count = $el.find('optgroup[data-img]').length,
                $target = $el.prev('.select-dropdown');

            if (count) {
                for (var i = 0; i < count; i++) {
                    var source = $el.find('optgroup[data-img]').eq(i).data('img');
                    $target.find('li.optgroup').eq(i).prepend('<img src=' + source + ' class="left" alt="" />');
                };
            };
        });
    };
    if ($('.js-optgroup').length) { stylingOptionGroup(); }
    */
    //
    // Сортируемые таблицы
    //---------------------------------------------------------------------------------------
    //(function () {
        // init
        // var aAsc = [],
            // $table = $('table.js-sortable');
        // $table.each(function () {
            // $(this).find('thead th').each(function (index) { $(this).attr('rel', index); });
            // //$(this).find('th,td').each(function () { $(this).attr('value', $(this).text()); });
        // });
        
        //пронумеруємо data-bonusSnap однаковим номером для рядка пропозиції із tr.b-ch-table__smScrBonusRow
		// var $tableRows = $table.find("tbody tr");
		// $tableRows.filter(":odd").each(function (index) { $(this).attr('data-bonusSnap', index); });
		// $tableRows.filter(":even").each(function (index) { $(this).attr('data-bonusSnap', index); });
		// $tableRowsWithPrice = $tableRows.not(".b-ch-table__smScrBonusRow");	//рядки зі змістом
		// $tableRowsBonusSmScr = $tableRows.filter(".b-ch-table__smScrBonusRow");	//рядки з бонусами
		// //заповнимо рядок бонусів для малого екрана змістом з комірки бонусів
        // $tableRowsBonusSmScr.each(function(){	// проходимо по всім рядкам бонусів
				// var bonusSnap = $(this).attr('data-bonusSnap');
				
				// $(this).find("div").after($tableRowsWithPrice.filter(function(){	//заповнюємо конкретний бонусний рядок
					// return $(this).attr("data-bonusSnap") == bonusSnap;}).find("td:nth-child(3)").children().clone());
			// });
			
		//--------Tooltips-----------
		
		// Підключаємо тултіпи після додавання рядків бонусів для малого екрана (щоб там теж були підказки)
		//$('.tooltipped, .js-tooltip').tooltip({ delay: 50 });
		
		// // Будемо ховати всі тултіпи через 3 секунди, бо незручно в мобільній версії
		// var  tooltipHideTime = 3000;	// через скільки мс ховати тултіпи materialize
		// var  $materializeTooltips	= $(".material-tooltip")
			// ,$cssTooltips			= $(".g-tooltiptext");
		// var  $materializeTooltipsParents	= $(".js-tooltip, .tooltipped")
			// ,$cssTooltipsParents			= $(".g-tooltip");
			
		// //ховаємо свої тултіпи
		// $cssTooltipsParents.each(function() {
			// $(this).find(".g-tooltiptext").css("display", "none");
			// $(this).on("click", function(){				
				// var $tooltip = $(this).find(".g-tooltiptext");
				// $tooltip.fadeIn().animate({
						// opacity: 1
					// }, 300);
				// var timeoutID = setTimeout(function(){
						// $tooltip.animate({
							// opacity: 0} ,300, function(){
								// $(this).css("display", "none")
							// });
					// }, tooltipHideTime + 4500);	// ховатимо css тултіпи пізніше, бо там багато тексту
			// });
		// });
		// //ховатимемо наші тултіпи при кліку на самих себе
		// $cssTooltips.click(function(event) {
				// event.stopPropagation();
				// $cssTooltips.animate({
					// opacity: 0} ,300, function(){
						// $(this).css("display", "none")
					// });
		// });
			
		// //ховатимемо наші тултіпи і при кліку за межами тултіпа
		// (function(){
			// $(document).click(function(event) {
				// event.stopPropagation();
				// if ($(event.target).closest(".g-tooltiptext").length + $(event.target).closest(".g-tooltip").length) return;
				// $cssTooltips.animate({
					// opacity: 0} ,300, function(){
						// $(this).css("display", "none")
					// });
			// });
		// })();
		
		// //ховаємо тултіпи materialize framework
		// $materializeTooltipsParents.on("click", function(){			
			// var  currentTooltip 	= $(this)
				// ,currentTooltipID 	= currentTooltip.attr("data-tooltip-id");
				
			// $materializeTooltips.filter(function(){return $(this).attr("id") == currentTooltipID}).each(function() {
				// $(this).delay(tooltipHideTime).fadeOut(600, function(){
					// $(this).hide();
				// }).show();
			// });
		// });
		//---------------------

        // // table click
        // $table.on('click', '.js-sort-col', function (e) {
            // // update arrow icon
            // $(this).parents('table.js-sortable').find('span.arrow').remove();
            // $(this).append('<span class="arrow"></span>');

            // // sort direction
            // var nr = $(this).attr('rel');
            // aAsc[nr] = aAsc[nr] == 'desc' ? 'asc' : 'desc';
            // if (aAsc[nr] == 'desc') { $(this).find('span.arrow').addClass('up'); }

            // // sort rows
            // var rows = $(this).parents('table.js-sortable').find('tbody tr');
            // rows.tsort('td:eq(' + nr + ')', { order: aAsc[nr], attr: 'value' });
			
			// //тут додамо приєднання рядків з бонусами (малий екран) після сортування
			// $tableRowsWithPrice.each(function (index) {
				// $(this).after($tableRowsBonusSmScr.filter( function (){
						// return $(this).attr("data-bonusSnap") == index;
					// }));
			// });
			
            // // fix row classes
            // rows.removeClass('alt first last');
            // var table = $(this).parents('table.js-sortable');
            // table.find('tr:even').addClass('alt');
            // table.find('tr:first').addClass('first');
            // table.find('tr:last').addClass('last');
        // });
    //})();

});
