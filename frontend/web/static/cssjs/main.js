$(document).ready(function () {
    $('#options').on('mousewheel', function (e) {
        if (e.originalEvent.wheelDelta / 120 > 0) {
            $("nav ul li").next().find("div").click();
        } else {
            $("nav ul li").prev().find("div").click();
        }
    });
});



document.addEventListener('mousemove', function (e) {
    var wx = window.innerWidth;
    var wh = window.innerHeight;
    var x = e.pageX - (wx / 4);
    var y = e.pageY - (wh / 4);
    var shade = $('.dir');
    var option = $('#options span');
    shade.css('text-shadow', x / 20 + 'px ' + y / 20 + 'px 90px rgba(150, 150, 150, 0.3)');
    option.css('text-shadow', x / 20 + 'px ' + y / 20 + 'px 90px rgba(50, 50, 50, 0.1)');
});

$(window).scroll(function () {

    $('.numba').css({
        'top': -($(this).scrollTop() / 3) + "px"
    });

    $("#next").removeClass("on").parent().css("background-image", "url(" + bg + ")");

    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        $("#next").addClass("on");
        var bgs = $("#next.on").attr('bg');
        $("#next.on").parent().css("background-image", "url(" + bgs + ")");
    }
});




$("nav a, .post a, #logo, .button ").click(function () {
    $("#nav").toggleClass("lo", {}, 3000);
    setTimeout(function () { $('#nav').removeClass('lo'); }, 1000);
});


$("nav a").click(function () {
    $("nav").removeClass("on");
    $(".bar").removeClass("animate");
});

$("#logo, .post a, #next").click(function () {
    $("#nav, body").addClass("off");
    $("aside").removeClass("on");

});



$(".mobile__post a").click(function () {
    setTimeout(function () {
        $("body").addClass("going");
    }, 5000);
});



$(window).load(function () {
    $("#nav, #intro, body").toggleClass("off");
    $(".single aside, figure").addClass("on");
    setTimeout(function () { $("#nav").removeClass("loading"); }, 800);
});

$(".button").click(function () {
    $("#nav, body").addClass("off");
});
(function () {
    $('#ham').on('click', function () {
        $("#nav").delay(300).toggleClass("menuopen");
        if ($(".bar").hasClass("animate")) {
            $("nav, .browser").removeClass("on");
            $(".bar").removeClass("animate");
            $("aside").removeClass("zero");
            $("aside").addClass('on');
            $("body, #nav,.link, .pages").removeClass("off");

        } else {
            $('.bar').addClass('animate');
            $('nav').delay(300).queue(function () {
                $(this).addClass('on').clearQueue();
            });
            $("body, #nav").addClass("off");
            $("aside").removeClass("on");
        }
    })
})();


/*!***************************************************
 * mark.js v8.1.1
 * https://github.com/julmot/mark.js
 * Copyright (c) 2014–2016, Julian Motz
 * Released under the MIT license https://git.io/vwTVl
 *****************************************************/
"use strict"; function _classCallCheck(a, b) { if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function") } var _extends = Object.assign || function (a) { for (var b = 1; b < arguments.length; b++) { var c = arguments[b]; for (var d in c) Object.prototype.hasOwnProperty.call(c, d) && (a[d] = c[d]) } return a }, _createClass = function () { function a(a, b) { for (var c = 0; c < b.length; c++) { var d = b[c]; d.enumerable = d.enumerable || !1, d.configurable = !0, "value" in d && (d.writable = !0), Object.defineProperty(a, d.key, d) } } return function (b, c, d) { return c && a(b.prototype, c), d && a(b, d), b } }(), _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (a) { return typeof a } : function (a) { return a && "function" == typeof Symbol && a.constructor === Symbol ? "symbol" : typeof a }; !function (a, b, c) { "function" == typeof define && define.amd ? define(["jquery"], function (d) { return a(b, c, d) }) : "object" === ("undefined" == typeof module ? "undefined" : _typeof(module)) && module.exports ? module.exports = a(b, c, require("jquery")) : a(b, c, jQuery) }(function (a, b, c) { var d = function () { function c(a) { _classCallCheck(this, c), this.ctx = a } return _createClass(c, [{ key: "log", value: function a(b) { var c = arguments.length <= 1 || void 0 === arguments[1] ? "debug" : arguments[1], a = this.opt.log; this.opt.debug && "object" === ("undefined" == typeof a ? "undefined" : _typeof(a)) && "function" == typeof a[c] && a[c]("mark.js: " + b) } }, { key: "escapeStr", value: function (a) { return a.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&") } }, { key: "createRegExp", value: function (a) { return a = this.escapeStr(a), Object.keys(this.opt.synonyms).length && (a = this.createSynonymsRegExp(a)), this.opt.diacritics && (a = this.createDiacriticsRegExp(a)), a = this.createMergedBlanksRegExp(a), a = this.createAccuracyRegExp(a) } }, { key: "createSynonymsRegExp", value: function (a) { var b = this.opt.synonyms, c = this.opt.caseSensitive ? "" : "i"; for (var d in b) if (b.hasOwnProperty(d)) { var e = b[d], f = this.escapeStr(d), g = this.escapeStr(e); a = a.replace(new RegExp("(" + f + "|" + g + ")", "gm" + c), "(" + f + "|" + g + ")") } return a } }, { key: "createDiacriticsRegExp", value: function (a) { var b = this.opt.caseSensitive ? "" : "i", c = this.opt.caseSensitive ? ["aàáâãäåāą", "AÀÁÂÃÄÅĀĄ", "cçćč", "CÇĆČ", "dđď", "DĐĎ", "eèéêëěēę", "EÈÉÊËĚĒĘ", "iìíîïī", "IÌÍÎÏĪ", "lł", "LŁ", "nñňń", "NÑŇŃ", "oòóôõöøō", "OÒÓÔÕÖØŌ", "rř", "RŘ", "sšś", "SŠŚ", "tť", "TŤ", "uùúûüůū", "UÙÚÛÜŮŪ", "yÿý", "YŸÝ", "zžżź", "ZŽŻŹ"] : ["aÀÁÂÃÄÅàáâãäåĀāąĄ", "cÇçćĆčČ", "dđĐďĎ", "eÈÉÊËèéêëěĚĒēęĘ", "iÌÍÎÏìíîïĪī", "lłŁ", "nÑñňŇńŃ", "oÒÓÔÕÖØòóôõöøŌō", "rřŘ", "sŠšśŚ", "tťŤ", "uÙÚÛÜùúûüůŮŪū", "yŸÿýÝ", "zŽžżŻźŹ"], d = []; return a.split("").forEach(function (e) { c.every(function (c) { if (c.indexOf(e) !== -1) { if (d.indexOf(c) > -1) return !1; a = a.replace(new RegExp("[" + c + "]", "gm" + b), "[" + c + "]"), d.push(c) } return !0 }) }), a } }, { key: "createMergedBlanksRegExp", value: function (a) { return a.replace(/[\s]+/gim, "[\\s]*") } }, { key: "createAccuracyRegExp", value: function (a) { var b = this, c = this.opt.accuracy, d = "string" == typeof c ? c : c.value, e = "string" == typeof c ? [] : c.limiters, f = ""; switch (e.forEach(function (a) { f += "|" + b.escapeStr(a) }), d) { case "partially": return "()(" + a + ")"; case "complementary": return "()([^\\s" + f + "]*" + a + "[^\\s" + f + "]*)"; case "exactly": return "(^|\\s" + f + ")(" + a + ")(?=$|\\s" + f + ")" } } }, { key: "getSeparatedKeywords", value: function (a) { var b = this, c = []; return a.forEach(function (a) { b.opt.separateWordSearch ? a.split(" ").forEach(function (a) { a.trim() && c.indexOf(a) === -1 && c.push(a) }) : a.trim() && c.indexOf(a) === -1 && c.push(a) }), { keywords: c.sort(function (a, b) { return b.length - a.length }), length: c.length } } }, { key: "getTextNodes", value: function (a) { var b = this, c = "", d = []; this.iterator.forEachNode(NodeFilter.SHOW_TEXT, function (a) { d.push({ start: c.length, end: (c += a.textContent).length, node: a }) }, function (a) { return b.matchesExclude(a.parentNode, !0) ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_ACCEPT }, function () { a({ value: c, nodes: d }) }) } }, { key: "matchesExclude", value: function (a, b) { var c = this.opt.exclude.concat(["script", "style", "title", "head", "html"]); return b && (c = c.concat(["*[data-markjs='true']"])), e.matches(a, c) } }, { key: "wrapRangeInTextNode", value: function (a, c, d) { var e = this.opt.element ? this.opt.element : "mark", f = a.splitText(c), g = f.splitText(d - c), h = b.createElement(e); return h.setAttribute("data-markjs", "true"), this.opt.className && h.setAttribute("class", this.opt.className), h.textContent = f.textContent, f.parentNode.replaceChild(h, f), g } }, { key: "wrapRangeInMappedTextNode", value: function (a, b, c, d, e) { var f = this; a.nodes.every(function (g, h) { var i = a.nodes[h + 1]; if ("undefined" == typeof i || i.start > b) { var j = function () { var i = b - g.start, j = (c > g.end ? g.end : c) - g.start; if (d(g.node)) { g.node = f.wrapRangeInTextNode(g.node, i, j); var k = a.value.substr(0, g.start), l = a.value.substr(j + g.start); if (a.value = k + l, a.nodes.forEach(function (b, c) { c >= h && (a.nodes[c].start > 0 && c !== h && (a.nodes[c].start -= j), a.nodes[c].end -= j) }), c -= j, e(g.node.previousSibling, g.start), !(c > g.end)) return { v: !1 }; b = g.end } }(); if ("object" === ("undefined" == typeof j ? "undefined" : _typeof(j))) return j.v } return !0 }) } }, { key: "wrapMatches", value: function (a, b, c, d, e) { var f = this, g = b ? 0 : 2; this.getTextNodes(function (h) { h.nodes.forEach(function (e) { e = e.node; for (var h = void 0; null !== (h = a.exec(e.textContent));)if (c(h[g], e)) { var i = h.index; b || (i += h[g - 1].length), e = f.wrapRangeInTextNode(e, i, i + h[g].length), d(e.previousSibling), a.lastIndex = 0 } }), e() }) } }, { key: "wrapMatchesAcrossElements", value: function (a, b, c, d, e) { var f = this, g = b ? 0 : 2; this.getTextNodes(function (h) { for (var i = void 0; null !== (i = a.exec(h.value));) { var j = i.index; b || (j += i[g - 1].length); var k = j + i[g].length; f.wrapRangeInMappedTextNode(h, j, k, function (a) { return c(i[g], a) }, function (b, c) { a.lastIndex = c, d(b) }) } e() }) } }, { key: "unwrapMatches", value: function (a) { for (var c = a.parentNode, d = b.createDocumentFragment(); a.firstChild;)d.appendChild(a.removeChild(a.firstChild)); c.replaceChild(d, a), c.normalize() } }, { key: "markRegExp", value: function (a, b) { var c = this; this.opt = b, this.log('Searching with expression "' + a + '"'); var d = 0, e = function (a) { d++, c.opt.each(a) }, f = "wrapMatches"; this.opt.acrossElements && (f = "wrapMatchesAcrossElements"), this[f](a, !0, function (a, b) { return c.opt.filter(b, a, d) }, e, function () { 0 === d && c.opt.noMatch(a), c.opt.done(d) }) } }, { key: "mark", value: function (a, b) { var c = this; this.opt = b; var d = this.getSeparatedKeywords("string" == typeof a ? [a] : a), e = d.keywords, f = d.length, g = this.opt.caseSensitive ? "" : "i", h = 0, i = "wrapMatches"; if (this.opt.acrossElements && (i = "wrapMatchesAcrossElements"), 0 === f) return void this.opt.done(h); var j = function a(b) { var d = new RegExp(c.createRegExp(b), "gm" + g), j = 0; c.log('Searching with expression "' + d + '"'), c[i](d, !1, function (a, d) { return c.opt.filter(d, b, h, j) }, function (a) { j++, h++, c.opt.each(a) }, function () { 0 === j && c.opt.noMatch(b), e[f - 1] === b ? c.opt.done(h) : a(e[e.indexOf(b) + 1]) }) }; j(e[0]) } }, { key: "unmark", value: function (a) { var b = this; this.opt = a; var c = this.opt.element ? this.opt.element : "*"; c += "[data-markjs]", this.opt.className && (c += "." + this.opt.className), this.log('Removal selector "' + c + '"'), this.iterator.forEachNode(NodeFilter.SHOW_ELEMENT, function (a) { b.unwrapMatches(a) }, function (a) { var d = e.matches(a, c), f = b.matchesExclude(a, !1); return !d || f ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_ACCEPT }, this.opt.done) } }, { key: "opt", set: function (b) { this._opt = _extends({}, { element: "", className: "", exclude: [], iframes: !1, separateWordSearch: !0, diacritics: !0, synonyms: {}, accuracy: "partially", acrossElements: !1, each: function () { }, noMatch: function () { }, filter: function () { return !0 }, done: function () { }, debug: !1, log: a.console, caseSensitive: !1 }, b) }, get: function () { return this._opt } }, { key: "iterator", get: function () { return this._iterator || (this._iterator = new e(this.ctx, this.opt.iframes, this.opt.exclude)), this._iterator } }]), c }(), e = function () { function a(b) { var c = arguments.length <= 1 || void 0 === arguments[1] || arguments[1], d = arguments.length <= 2 || void 0 === arguments[2] ? [] : arguments[2]; _classCallCheck(this, a), this.ctx = b, this.iframes = c, this.exclude = d } return _createClass(a, [{ key: "getContexts", value: function () { var a = void 0; a = "undefined" != typeof this.ctx && this.ctx ? NodeList.prototype.isPrototypeOf(this.ctx) ? Array.prototype.slice.call(this.ctx) : Array.isArray(this.ctx) ? this.ctx : [this.ctx] : []; var b = []; return a.forEach(function (a) { var c = b.filter(function (b) { return b.contains(a) }).length > 0; b.indexOf(a) !== -1 || c || b.push(a) }), b } }, { key: "getIframeContents", value: function (a, b) { var c = arguments.length <= 2 || void 0 === arguments[2] ? function () { } : arguments[2], d = void 0; try { var e = a.contentWindow; if (d = e.document, !e || !d) throw new Error("iframe inaccessible") } catch (a) { c() } d && b(d) } }, { key: "onIframeReady", value: function (a, b, c) { var d = this; try { !function () { var e = a.contentWindow, f = "about:blank", g = "complete", h = function () { var b = a.getAttribute("src").trim(), c = e.location.href; return c === f && b !== f && b }, i = function () { var e = function e() { try { h() || (a.removeEventListener("load", e), d.getIframeContents(a, b, c)) } catch (a) { c() } }; a.addEventListener("load", e) }; e.document.readyState === g ? h() ? i() : d.getIframeContents(a, b, c) : i() }() } catch (a) { c() } } }, { key: "waitForIframes", value: function (a, b) { var c = this, d = 0; this.forEachIframe(a, function () { return !0 }, function (a) { d++, c.waitForIframes(a.querySelector("html"), function () { --d || b() }) }, function (a) { a || b() }) } }, { key: "forEachIframe", value: function (b, c, d) { var e = this, f = arguments.length <= 3 || void 0 === arguments[3] ? function () { } : arguments[3], g = b.querySelectorAll("iframe"), h = g.length, i = 0; g = Array.prototype.slice.call(g); var j = function () { --h <= 0 && f(i) }; h || j(), g.forEach(function (b) { a.matches(b, e.exclude) ? j() : e.onIframeReady(b, function (a) { c(b) && (i++, d(a)), j() }, j) }) } }, { key: "createIterator", value: function (a, c, d) { return b.createNodeIterator(a, c, d, !1) } }, { key: "createInstanceOnIframe", value: function (b) { return new a(b.querySelector("html"), this.iframes) } }, { key: "compareNodeIframe", value: function (a, b, c) { var d = a.compareDocumentPosition(c), e = Node.DOCUMENT_POSITION_PRECEDING; if (d & e) { if (null === b) return !0; var f = b.compareDocumentPosition(c), g = Node.DOCUMENT_POSITION_FOLLOWING; if (f & g) return !0 } return !1 } }, { key: "getIteratorNode", value: function (a) { var b = a.previousNode(), c = void 0; return c = null === b ? a.nextNode() : a.nextNode() && a.nextNode(), { prevNode: b, node: c } } }, { key: "checkIframeFilter", value: function (a, b, c, d) { var e = !1, f = !1; return d.forEach(function (a, b) { a.val === c && (e = b, f = a.handled) }), this.compareNodeIframe(a, b, c) ? (e !== !1 || f ? e === !1 || f || (d[e].handled = !0) : d.push({ val: c, handled: !0 }), !0) : (e === !1 && d.push({ val: c, handled: !1 }), !1) } }, { key: "handleOpenIframes", value: function (a, b, c, d) { var e = this; a.forEach(function (a) { a.handled || e.getIframeContents(a.val, function (a) { e.createInstanceOnIframe(a).forEachNode(b, c, d) }) }) } }, { key: "iterateThroughNodes", value: function (a, b, c, d, e) { for (var f = this, g = this.createIterator(b, a, d), h = [], i = void 0, j = void 0, k = function () { var a = f.getIteratorNode(g); return j = a.prevNode, i = a.node }; k();)this.iframes && this.forEachIframe(b, function (a) { return f.checkIframeFilter(i, j, a, h) }, function (b) { f.createInstanceOnIframe(b).forEachNode(a, c, d) }), c(i); this.iframes && this.handleOpenIframes(h, a, c, d), e() } }, { key: "forEachNode", value: function (a, b, c) { var d = this, e = arguments.length <= 3 || void 0 === arguments[3] ? function () { } : arguments[3], f = this.getContexts(), g = f.length; g || e(), f.forEach(function (f) { var h = function () { d.iterateThroughNodes(a, f, b, c, function () { --g <= 0 && e() }) }; d.iframes ? d.waitForIframes(f, h) : h() }) } }], [{ key: "matches", value: function (a, b) { var c = "string" == typeof b ? [b] : b, d = a.matches || a.matchesSelector || a.msMatchesSelector || a.mozMatchesSelector || a.oMatchesSelector || a.webkitMatchesSelector; if (d) { var e = !1; return c.every(function (b) { return !d.call(a, b) || (e = !0, !1) }), e } return !1 } }]), a }(); return c.fn.mark = function (a, b) { return new d(this.get()).mark(a, b), this }, c.fn.markRegExp = function (a, b) { return new d(this.get()).markRegExp(a, b), this }, c.fn.unmark = function (a) { return new d(this.get()).unmark(a), this }, c }, window, document);
//
$(function () {
    var mark = function () {
        var keyword = $("#search").val();
        $(".post .title").unmark().mark(keyword, options).parent().parent().addClass("searching");
    };
    $("#search").on("input", mark);
});


// $("#search").hide();
$(".loop").click(function () {
    $("#nav").toggleClass("filter");
    $('.loop').toggleClass("active");
    $(".search").toggleClass("on");
    $(".posts").removeClass("searching");
    $("#search").val("");
    $(".post").unmark();
    $("#search").focus();
});

// $(".search.on .loop").click(function(){
//     $("#nav").toggleClass("filter");
//     $('.loop').toggleClass("active");
//     $("#search").show().focus();
//     $(".search").toggleClass("on");
//     $(".posts").removeClass("searching");
//     $("#search").val("");
//     $(".post").unmark();
// });

$(window).on('scroll', function () {
    var scrolled = $(this).scrollTop();
    $('.windows div').filter(function () {
        return scrolled >= $(this).offset().top - 150;
    }).addClass('top').siblings().removeClass('top');

});

$("figure").click(function () {
    $("aside").toggleClass("zero");
    $("#nav").toggleClass("off");
    $('.bar').toggleClass('animate');
    $(this).toggleClass('lin');
    if ($("aside").hasClass("zero")) {
        $(".link").addClass("off");
    } else {
        $(".link").removeClass("off");
    }
});

$("figure a ").click(function (e) {
    e.stopPropagation();
});

var bg = $(".post").attr('bg');
$('figure').css("background-image", "url(" + bg + ")");

$('.post:not(".page, .single")').hover(function () {
    var bg = $(this).attr('bg');
    var ajd = $(this).attr('id');
    $('figure').css("background-image", "url(" + bg + ")").toggleClass('hmv');
    $('.link span').html('' + ajd + '').attr('href', '' + ajd);
    $(this).addClass("hov").siblings('.post').removeClass("hov");

    $('.pixies div').eq($(this).index()).addClass('on').siblings().removeClass('on');

});

$('.post:first-child').addClass('hov');
$('.post-can:first-child').addClass('on');


$('.icon').on('click', function () {
    $(this).toggleClass('active');
    return $('.tap').addClass('active');
});
$('.icon').bind('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function () {
    return $('.tap').removeClass('active');
});

$(".icon").on('click', function () {
    $(".me,#options").toggleClass("on");
    $('.op').each(function (i) {
        var row = $(this);
        setTimeout(function () {
            row.toggleClass('on', 800);
        }, 80 * i);
    });

});

$('nav li').click(function () {
    $('#options div').eq($(this).index()).addClass('on').siblings().removeClass('on');
    $(this).addClass('ok').siblings().removeClass('ok');
});

$('#short').click(function () {
    value = $(this).data('link');
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(value).select();
    document.execCommand("copy");
    $temp.remove();
    $(this).addClass('done');
});


