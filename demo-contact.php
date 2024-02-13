<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <script>if (navigator.userAgent.match(/MSIE|Internet Explorer/i) || navigator.userAgent.match(/Trident\/7\..*?rv:11/i)) { var href = document.location.href; if (!href.match(/[?&]nowprocket/)) { if (href.indexOf("?") == -1) { if (href.indexOf("#") == -1) { document.location.href = href + "?nowprocket=1" } else { document.location.href = href.replace("#", "?nowprocket=1#") } } else { if (href.indexOf("#") == -1) { document.location.href = href + "&nowprocket=1" } else { document.location.href = href.replace("#", "&nowprocket=1#") } } } }</script>
    <script>class RocketLazyLoadScripts { constructor() { this.triggerEvents = ["keydown", "mousedown", "mousemove", "touchmove", "touchstart", "touchend", "wheel"], this.userEventHandler = this._triggerListener.bind(this), this.touchStartHandler = this._onTouchStart.bind(this), this.touchMoveHandler = this._onTouchMove.bind(this), this.touchEndHandler = this._onTouchEnd.bind(this), this.clickHandler = this._onClick.bind(this), this.interceptedClicks = [], window.addEventListener("pageshow", (e => { this.persisted = e.persisted })), window.addEventListener("DOMContentLoaded", (() => { this._preconnect3rdParties() })), this.delayedScripts = { normal: [], async: [], defer: [] }, this.allJQueries = [] } _addUserInteractionListener(e) { document.hidden ? e._triggerListener() : (this.triggerEvents.forEach((t => window.addEventListener(t, e.userEventHandler, { passive: !0 }))), window.addEventListener("touchstart", e.touchStartHandler, { passive: !0 }), window.addEventListener("mousedown", e.touchStartHandler), document.addEventListener("visibilitychange", e.userEventHandler)) } _removeUserInteractionListener() { this.triggerEvents.forEach((e => window.removeEventListener(e, this.userEventHandler, { passive: !0 }))), document.removeEventListener("visibilitychange", this.userEventHandler) } _onTouchStart(e) { "HTML" !== e.target.tagName && (window.addEventListener("touchend", this.touchEndHandler), window.addEventListener("mouseup", this.touchEndHandler), window.addEventListener("touchmove", this.touchMoveHandler, { passive: !0 }), window.addEventListener("mousemove", this.touchMoveHandler), e.target.addEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "onclick", "rocket-onclick")) } _onTouchMove(e) { window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, { passive: !0 }), window.removeEventListener("mousemove", this.touchMoveHandler), e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick") } _onTouchEnd(e) { window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, { passive: !0 }), window.removeEventListener("mousemove", this.touchMoveHandler) } _onClick(e) { e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick"), this.interceptedClicks.push(e), e.preventDefault(), e.stopPropagation(), e.stopImmediatePropagation() } _replayClicks() { window.removeEventListener("touchstart", this.touchStartHandler, { passive: !0 }), window.removeEventListener("mousedown", this.touchStartHandler), this.interceptedClicks.forEach((e => { e.target.dispatchEvent(new MouseEvent("click", { view: e.view, bubbles: !0, cancelable: !0 })) })) } _renameDOMAttribute(e, t, n) { e.hasAttribute && e.hasAttribute(t) && (event.target.setAttribute(n, event.target.getAttribute(t)), event.target.removeAttribute(t)) } _triggerListener() { this._removeUserInteractionListener(this), "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", this._loadEverythingNow.bind(this)) : this._loadEverythingNow() } _preconnect3rdParties() { let e = []; document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((t => { if (t.hasAttribute("src")) { const n = new URL(t.src).origin; n !== location.origin && e.push({ src: n, crossOrigin: t.crossOrigin || "module" === t.getAttribute("data-rocket-type") }) } })), e = [...new Map(e.map((e => [JSON.stringify(e), e]))).values()], this._batchInjectResourceHints(e, "preconnect") } async _loadEverythingNow() { this.lastBreath = Date.now(), this._delayEventListeners(), this._delayJQueryReady(this), this._handleDocumentWrite(), this._registerAllDelayedScripts(), this._preloadAllScripts(), await this._loadScriptsFromList(this.delayedScripts.normal), await this._loadScriptsFromList(this.delayedScripts.defer), await this._loadScriptsFromList(this.delayedScripts.async); try { await this._triggerDOMContentLoaded(), await this._triggerWindowLoad() } catch (e) { } window.dispatchEvent(new Event("rocket-allScriptsLoaded")), this._replayClicks() } _registerAllDelayedScripts() { document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e => { e.hasAttribute("src") ? e.hasAttribute("async") && !1 !== e.async ? this.delayedScripts.async.push(e) : e.hasAttribute("defer") && !1 !== e.defer || "module" === e.getAttribute("data-rocket-type") ? this.delayedScripts.defer.push(e) : this.delayedScripts.normal.push(e) : this.delayedScripts.normal.push(e) })) } async _transformScript(e) { return await this._littleBreath(), new Promise((t => { const n = document.createElement("script");[...e.attributes].forEach((e => { let t = e.nodeName; "type" !== t && ("data-rocket-type" === t && (t = "type"), n.setAttribute(t, e.nodeValue)) })), e.hasAttribute("src") ? (n.addEventListener("load", t), n.addEventListener("error", t)) : (n.text = e.text, t()); try { e.parentNode.replaceChild(n, e) } catch (e) { t() } })) } async _loadScriptsFromList(e) { const t = e.shift(); return t ? (await this._transformScript(t), this._loadScriptsFromList(e)) : Promise.resolve() } _preloadAllScripts() { this._batchInjectResourceHints([...this.delayedScripts.normal, ...this.delayedScripts.defer, ...this.delayedScripts.async], "preload") } _batchInjectResourceHints(e, t) { var n = document.createDocumentFragment(); e.forEach((e => { if (e.src) { const i = document.createElement("link"); i.href = e.src, i.rel = t, "preconnect" !== t && (i.as = "script"), e.getAttribute && "module" === e.getAttribute("data-rocket-type") && (i.crossOrigin = !0), e.crossOrigin && (i.crossOrigin = e.crossOrigin), n.appendChild(i) } })), document.head.appendChild(n) } _delayEventListeners() { let e = {}; function t(t, n) { !function (t) { function n(n) { return e[t].eventsToRewrite.indexOf(n) >= 0 ? "rocket-" + n : n } e[t] || (e[t] = { originalFunctions: { add: t.addEventListener, remove: t.removeEventListener }, eventsToRewrite: [] }, t.addEventListener = function () { arguments[0] = n(arguments[0]), e[t].originalFunctions.add.apply(t, arguments) }, t.removeEventListener = function () { arguments[0] = n(arguments[0]), e[t].originalFunctions.remove.apply(t, arguments) }) }(t), e[t].eventsToRewrite.push(n) } function n(e, t) { let n = e[t]; Object.defineProperty(e, t, { get: () => n || function () { }, set(i) { e["rocket" + t] = n = i } }) } t(document, "DOMContentLoaded"), t(window, "DOMContentLoaded"), t(window, "load"), t(window, "pageshow"), t(document, "readystatechange"), n(document, "onreadystatechange"), n(window, "onload"), n(window, "onpageshow") } _delayJQueryReady(e) { let t = window.jQuery; Object.defineProperty(window, "jQuery", { get: () => t, set(n) { if (n && n.fn && !e.allJQueries.includes(n)) { n.fn.ready = n.fn.init.prototype.ready = function (t) { e.domReadyFired ? t.bind(document)(n) : document.addEventListener("rocket-DOMContentLoaded", (() => t.bind(document)(n))) }; const t = n.fn.on; n.fn.on = n.fn.init.prototype.on = function () { if (this[0] === window) { function e(e) { return e.split(" ").map((e => "load" === e || 0 === e.indexOf("load.") ? "rocket-jquery-load" : e)).join(" ") } "string" == typeof arguments[0] || arguments[0] instanceof String ? arguments[0] = e(arguments[0]) : "object" == typeof arguments[0] && Object.keys(arguments[0]).forEach((t => { delete Object.assign(arguments[0], { [e(t)]: arguments[0][t] })[t] })) } return t.apply(this, arguments), this }, e.allJQueries.push(n) } t = n } }) } async _triggerDOMContentLoaded() { this.domReadyFired = !0, await this._littleBreath(), document.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), window.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), document.dispatchEvent(new Event("rocket-readystatechange")), await this._littleBreath(), document.rocketonreadystatechange && document.rocketonreadystatechange() } async _triggerWindowLoad() { await this._littleBreath(), window.dispatchEvent(new Event("rocket-load")), await this._littleBreath(), window.rocketonload && window.rocketonload(), await this._littleBreath(), this.allJQueries.forEach((e => e(window).trigger("rocket-jquery-load"))), await this._littleBreath(); const e = new Event("rocket-pageshow"); e.persisted = this.persisted, window.dispatchEvent(e), await this._littleBreath(), window.rocketonpageshow && window.rocketonpageshow({ persisted: this.persisted }) } _handleDocumentWrite() { const e = new Map; document.write = document.writeln = function (t) { const n = document.currentScript, i = document.createRange(), r = n.parentElement; let o = e.get(n); void 0 === o && (o = n.nextSibling, e.set(n, o)); const s = document.createDocumentFragment(); i.setStart(s, 0), s.appendChild(i.createContextualFragment(t)), r.insertBefore(s, o) } } async _littleBreath() { Date.now() - this.lastBreath > 45 && (await this._requestAnimFrame(), this.lastBreath = Date.now()) } async _requestAnimFrame() { return document.hidden ? new Promise((e => setTimeout(e))) : new Promise((e => requestAnimationFrame(e))) } static run() { const e = new RocketLazyLoadScripts; e._addUserInteractionListener(e) } } RocketLazyLoadScripts.run();</script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="dns-prefetch" href="//www.olark.com">
    <link rel="dns-prefetch" href="//www.facebook.com">
    <link rel="dns-prefetch" href="//marketingplatform.google.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    <link rel="dns-prefetch" href="//www.linkedin.com">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <!-- This site is optimized with the Yoast SEO plugin v19.0 - https://yoast.com/wordpress/plugins/seo/ -->
    <title>Global Office Locations and Contact Information - InfyGlobe</title>
    <meta name="description"
        content="With 9 global delivery centres and 1500+ clients across 15+ countries, InfyGlobe develops enterprise-grade software for growing and big companies. Contact us to find out more." />
    <link rel="canonical" href="https://www.neosofttech.com/contact/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Global Office Locations and Contact Information - InfyGlobe" />
    <meta property="og:description"
        content="With 9 global delivery centres and 1500+ clients across 15+ countries, InfyGlobe develops enterprise-grade software for growing and big companies. Contact us to find out more." />
    <meta property="og:url" content="https://www.neosofttech.com/contact/" />
    <meta property="og:site_name" content="InfyGlobe" />
    <meta property="article:publisher" content="https://www.facebook.com/neosofttechnologies" />
    <meta property="article:modified_time" content="2023-05-04T13:33:51+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Global Office Locations and Contact Information - InfyGlobe" />
    <meta name="twitter:description"
        content="With 9 global delivery centres and 1500+ clients across 15+ countries, InfyGlobe develops enterprise-grade software for growing and big companies. Contact us to find out more." />
    <meta name="twitter:site" content="@neosofttech" />
    <script type="application/ld+json"
        class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"https://www.neosofttech.com/#website","url":"https://www.neosofttech.com/","name":"InfyGlobe","description":"","potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https://www.neosofttech.com/?s={search_term_string}"},"query-input":"required name=search_term_string"}],"inLanguage":"en-US"},{"@type":"WebPage","@id":"https://www.neosofttech.com/contact/#webpage","url":"https://www.neosofttech.com/contact/","name":"Global Office Locations and Contact Information - InfyGlobe","isPartOf":{"@id":"https://www.neosofttech.com/#website"},"datePublished":"2022-06-01T06:46:22+00:00","dateModified":"2023-05-04T13:33:51+00:00","description":"With 9 global delivery centres and 1500+ clients across 15+ countries, InfyGlobe develops enterprise-grade software for growing and big companies. Contact us to find out more.","breadcrumb":{"@id":"https://www.neosofttech.com/contact/#breadcrumb"},"inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://www.neosofttech.com/contact/"]}]},{"@type":"BreadcrumbList","@id":"https://www.neosofttech.com/contact/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Contact"}]}]}</script>
    <!-- / Yoast SEO plugin. -->


    <link rel='dns-prefetch' href='//www.google.com' />

    <link rel="alternate" type="application/rss+xml" title="InfyGlobe &raquo; Feed"
        href="https://www.neosofttech.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="InfyGlobe &raquo; Comments Feed"
        href="https://www.neosofttech.com/comments/feed/" />
    <meta name="keywords" content="contact us, global locations" />
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id='global-styles-inline-css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }
    </style>
    <link data-minify="1" rel='stylesheet' id='contact-form-7-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=1706686329'
        media='all' />
    <link data-minify="1" rel='stylesheet' id='cookie-law-info-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/plugins/cookie-law-info/public/css/cookie-law-info-public.css?ver=1706686329'
        media='all' />
    <link data-minify="1" rel='stylesheet' id='cookie-law-info-gdpr-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/plugins/cookie-law-info/public/css/cookie-law-info-gdpr.css?ver=1706686329'
        media='all' />
    <link data-minify="1" rel='stylesheet' id='megamenu-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/uploads/maxmegamenu/style.css?ver=1706686329'
        media='all' />
    <link data-minify="1" rel='stylesheet' id='neosoft-style-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/themes/neosoft/style.css?ver=1706686329'
        media='all' />
    <link data-minify="1" rel='stylesheet' id='neosoft-footer-style-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/themes/neosoft/app/css/style.css?ver=1706686329'
        media='all' />
    <link rel='stylesheet' id='neosoft-selecto2-style-css'
        href='https://www.neosofttech.com/wp-content/themes/neosoft/app/css/select2.min.css' media='all' />
    <link rel='stylesheet' id='neosoft-dropdown-style-css'
        href='https://www.neosofttech.com/wp-content/themes/neosoft/app/css/jquery-ui.min.css' media='all' />
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-includes/js/jquery/jquery.min.js'
        id='jquery-core-js'></script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-includes/js/jquery/jquery-migrate.min.js'
        defer='defer' id='jquery-migrate-js'></script>
    <script id='cookie-law-info-js-extra' data-type="lazy"
        data-src="data:text/javascript;base64,CnZhciBDbGlfRGF0YSA9IHsibm5fY29va2llX2lkcyI6W10sImNvb2tpZWxpc3QiOltdLCJub25fbmVjZXNzYXJ5X2Nvb2tpZXMiOltdLCJjY3BhRW5hYmxlZCI6IiIsImNjcGFSZWdpb25CYXNlZCI6IiIsImNjcGFCYXJFbmFibGVkIjoiIiwic3RyaWN0bHlFbmFibGVkIjpbIm5lY2Vzc2FyeSIsIm9ibGlnYXRvaXJlIl0sImNjcGFUeXBlIjoiZ2RwciIsImpzX2Jsb2NraW5nIjoiMSIsImN1c3RvbV9pbnRlZ3JhdGlvbiI6IiIsInRyaWdnZXJEb21SZWZyZXNoIjoiIiwic2VjdXJlX2Nvb2tpZXMiOiIifTsKdmFyIGNsaV9jb29raWViYXJfc2V0dGluZ3MgPSB7ImFuaW1hdGVfc3BlZWRfaGlkZSI6IjUwMCIsImFuaW1hdGVfc3BlZWRfc2hvdyI6IjUwMCIsImJhY2tncm91bmQiOiIjRkZGIiwiYm9yZGVyIjoiI2IxYTZhNmMyIiwiYm9yZGVyX29uIjoiIiwiYnV0dG9uXzFfYnV0dG9uX2NvbG91ciI6IiM2MWEyMjkiLCJidXR0b25fMV9idXR0b25faG92ZXIiOiIjNGU4MjIxIiwiYnV0dG9uXzFfbGlua19jb2xvdXIiOiIjZmZmIiwiYnV0dG9uXzFfYXNfYnV0dG9uIjoiMSIsImJ1dHRvbl8xX25ld193aW4iOiIiLCJidXR0b25fMl9idXR0b25fY29sb3VyIjoiIzMzMyIsImJ1dHRvbl8yX2J1dHRvbl9ob3ZlciI6IiMyOTI5MjkiLCJidXR0b25fMl9saW5rX2NvbG91ciI6IiM0NDQiLCJidXR0b25fMl9hc19idXR0b24iOiIiLCJidXR0b25fMl9oaWRlYmFyIjoiIiwiYnV0dG9uXzNfYnV0dG9uX2NvbG91ciI6IiNkZWRmZTAiLCJidXR0b25fM19idXR0b25faG92ZXIiOiIjYjJiMmIzIiwiYnV0dG9uXzNfbGlua19jb2xvdXIiOiIjMzMzMzMzIiwiYnV0dG9uXzNfYXNfYnV0dG9uIjoiMSIsImJ1dHRvbl8zX25ld193aW4iOiIiLCJidXR0b25fNF9idXR0b25fY29sb3VyIjoiI2RlZGZlMCIsImJ1dHRvbl80X2J1dHRvbl9ob3ZlciI6IiNiMmIyYjMiLCJidXR0b25fNF9saW5rX2NvbG91ciI6IiMzMzMzMzMiLCJidXR0b25fNF9hc19idXR0b24iOiIxIiwiYnV0dG9uXzdfYnV0dG9uX2NvbG91ciI6IiM2MWEyMjkiLCJidXR0b25fN19idXR0b25faG92ZXIiOiIjNGU4MjIxIiwiYnV0dG9uXzdfbGlua19jb2xvdXIiOiIjZmZmIiwiYnV0dG9uXzdfYXNfYnV0dG9uIjoiMSIsImJ1dHRvbl83X25ld193aW4iOiIiLCJmb250X2ZhbWlseSI6ImluaGVyaXQiLCJoZWFkZXJfZml4IjoiIiwibm90aWZ5X2FuaW1hdGVfaGlkZSI6IjEiLCJub3RpZnlfYW5pbWF0ZV9zaG93IjoiIiwibm90aWZ5X2Rpdl9pZCI6IiNjb29raWUtbGF3LWluZm8tYmFyIiwibm90aWZ5X3Bvc2l0aW9uX2hvcml6b250YWwiOiJyaWdodCIsIm5vdGlmeV9wb3NpdGlvbl92ZXJ0aWNhbCI6ImJvdHRvbSIsInNjcm9sbF9jbG9zZSI6IiIsInNjcm9sbF9jbG9zZV9yZWxvYWQiOiIiLCJhY2NlcHRfY2xvc2VfcmVsb2FkIjoiIiwicmVqZWN0X2Nsb3NlX3JlbG9hZCI6IiIsInNob3dhZ2Fpbl90YWIiOiIiLCJzaG93YWdhaW5fYmFja2dyb3VuZCI6IiNmZmYiLCJzaG93YWdhaW5fYm9yZGVyIjoiIzAwMCIsInNob3dhZ2Fpbl9kaXZfaWQiOiIjY29va2llLWxhdy1pbmZvLWFnYWluIiwic2hvd2FnYWluX3hfcG9zaXRpb24iOiIxMDBweCIsInRleHQiOiIjMzMzMzMzIiwic2hvd19vbmNlX3luIjoiIiwic2hvd19vbmNlIjoiMTAwMDAiLCJsb2dnaW5nX29uIjoiIiwiYXNfcG9wdXAiOiIiLCJwb3B1cF9vdmVybGF5IjoiMSIsImJhcl9oZWFkaW5nX3RleHQiOiIiLCJjb29raWVfYmFyX2FzIjoiYmFubmVyIiwicG9wdXBfc2hvd2FnYWluX3Bvc2l0aW9uIjoiYm90dG9tLXJpZ2h0Iiwid2lkZ2V0X3Bvc2l0aW9uIjoibGVmdCJ9Owp2YXIgbG9nX29iamVjdCA9IHsiYWpheF91cmwiOiJodHRwczpcL1wvd3d3Lm5lb3NvZnR0ZWNoLmNvbVwvd3AtYWRtaW5cL2FkbWluLWFqYXgucGhwIn07Cg=="></script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/plugins/cookie-law-info/public/js/cookie-law-info-public.js'
        defer='defer' id='cookie-law-info-js'></script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/themes/neosoft/node_modules/bootstrap/dist/js/bootstrap.bundle.js'
        defer='defer' id='neosoft-bootstrap-script-js'></script>
    <link rel="https://api.w.org/" href="https://www.neosofttech.com/wp-json/" />
    <link rel="alternate" type="application/json" href="https://www.neosofttech.com/wp-json/wp/v2/pages/352" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.neosofttech.com/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
        href="https://www.neosofttech.com/wp-includes/wlwmanifest.xml" />
    <link rel='shortlink' href='https://www.neosofttech.com/?p=352' />
    <link rel="alternate" type="application/json+oembed"
        href="https://www.neosofttech.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.neosofttech.com%2Fcontact%2F" />
    <link rel="alternate" type="text/xml+oembed"
        href="https://www.neosofttech.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.neosofttech.com%2Fcontact%2F&#038;format=xml" />

    <link rel="preload" as="font"
        href="https://www.neosofttech.com/wp-content/themes/neosoft/app/fonts/icomoon/icomoon.ttf" crossorigin>
    <link rel="preload" as="font"
        href="https://www.neosofttech.com/wp-content/themes/neosoft/app/fonts/gilroy/Gilroy-Bold.woff" crossorigin>
    <link rel="preload" as="font"
        href="https://www.neosofttech.com/wp-content/themes/neosoft/app/fonts/gilroy/Gilroy-Light.woff" crossorigin>
    <link rel="preload" as="font"
        href="https://www.neosofttech.com/wp-content/themes/neosoft/app/fonts/gilroy/Gilroy-Medium.woff" crossorigin>
    <link rel="preload" as="font"
        href="https://www.neosofttech.com/wp-content/themes/neosoft/app/fonts/gilroy/Gilroy-SemiBold.woff" crossorigin>
    <link rel="stylesheet" href="./Css/Style0.css" />
    <link rel="icon" href="./Assets/Images/infi-logo.png" sizes="32x32" />
    <style type="text/css">
        /** Mega Menu CSS: fs **/
    </style>
    <noscript>
        <style id="rocket-lazyload-nojs-css">
            .rll-youtube-player,
            [data-lazy-src] {
                display: none !important;
            }
        </style>
    </noscript> <!-- start  /*header menu js-mk */ -->
    <!-- <script type="rocketlazyloadscript" data-rocket-type="text/javascript">
    jQuery(function($){

        $('li.mega-neosoft-col-title > ul.mega-sub-menu > li.mega-menu-item').hide();
        $("li.mega-neosoft-col-content > ul.mega-sub-menu > li.mega-menu-item").hide();
        $(".mega-menu-link").click(function(){
            $('li.mega-neosoft-col-title > ul.mega-sub-menu > li.mega-menu-item').hide();
            $("li.mega-neosoft-col-content > ul.mega-sub-menu > li.mega-menu-item").hide(); 
            $("li.mega-neosoft-col-content > ul.mega-sub-menu > li:last.mega-menu-item ").show(); 
            $(this).parent().closest('.mega-neosoft-col').find('li.mega-menu-item').removeClass('mega-toggle-on');
            $(this).parent().closest('.mega-neosoft-col').find('.mega-menu-link').attr("aria-expanded","false");
            $(this).attr("aria-expanded","true");              
            var menu_title_text= $(this).text().split(' ').join('-'); $('.'+menu_title_text.toLowerCase()).closest("li").show(); 
            var menu_title_text_lowercase=menu_title_text.toLowerCase();      
            setTimeout(function() {       
                if(menu_title_text_lowercase == 'services'){
                    $('li.mega-neosoft-col-title > ul.mega-sub-menu > li:first.mega-menu-item').show();
                    $("li.mega-neosoft-col-content > ul.mega-sub-menu > li:first.mega-menu-item").show();
                     if(!$("li.mega-neosoft-col > ul.mega-sub-menu > li:first.mega-menu-item").hasClass("mega-toggle-on")){
                        $('li.mega-neosoft-col > ul.mega-sub-menu > li:first.mega-menu-item').addClass('mega-toggle-on');
                        $('li.mega-neosoft-col > ul.mega-sub-menu > li:first.mega-menu-item > a.mega-menu-link').attr("aria-expanded","true");
                     }
                } 
            }, 400);
        });
    });
    </script>
    <style>
        #mega-menu-wrap-menu-1 #mega-menu-menu-1 li.mega-menu-item.mega-menu-megamenu ul.mega-sub-menu li.mega-collapse-children.mega-toggle-on > ul.mega-sub-menu {
            margin-top: 54px !important;
        }
    </style> -->
    <!-- end    /*header menu js-mk */ -->
</head>

<body
    class="page-template page-template-template-parts page-template-contact-template page-template-template-partscontact-template-php page page-id-352 wp-custom-logo">
    <div class="snowflakes" aria-hidden="true">
        <!--   <div class="snowflake">❅</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❆</div>
  <div class="snowflake">❄</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❆</div>
  <div class="snowflake">❄</div>
  <div class="snowflake">❅</div>
  <div class="snowflake">❆</div>
  <div class="snowflake">❄</div> -->

    </div>
    <!-- Global site tag (gtag.js) - Google Ads: 794643987 -->
    <script type="rocketlazyloadscript" async src="https://www.googletagmanager.com/gtag/js?id=UA-5701460-4"></script>
    <script type="rocketlazyloadscript" async src="https://www.googletagmanager.com/gtag/js?id=AW-794643987"></script>
    <script type="rocketlazyloadscript">
        window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-5701460-4');

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'AW-794643987');
</script>

    <!-- Google Tag Manager -->
    <script type="rocketlazyloadscript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N32636G');</script>
    <!-- End Google Tag Manager →
<script type="rocketlazyloadscript">
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1260654004137056');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1260654004137056&ev=PageView&noscript=1" alt="Facebook"
  /></noscript>
  <script type="rocketlazyloadscript">
  fbq('track', 'CompleteRegistration');
  </script>

<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N32636G" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-dark-grayscale">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 0.49803921568627" />
                    <fefuncg type="table" tablevalues="0 0.49803921568627" />
                    <fefuncb type="table" tablevalues="0 0.49803921568627" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-grayscale">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 1" />
                    <fefuncg type="table" tablevalues="0 1" />
                    <fefuncb type="table" tablevalues="0 1" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-yellow">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.54901960784314 0.98823529411765" />
                    <fefuncg type="table" tablevalues="0 1" />
                    <fefuncb type="table" tablevalues="0.71764705882353 0.25490196078431" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-red">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 1" />
                    <fefuncg type="table" tablevalues="0 0.27843137254902" />
                    <fefuncb type="table" tablevalues="0.5921568627451 0.27843137254902" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-midnight">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0 0" />
                    <fefuncg type="table" tablevalues="0 0.64705882352941" />
                    <fefuncb type="table" tablevalues="0 1" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-magenta-yellow">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.78039215686275 1" />
                    <fefuncg type="table" tablevalues="0 0.94901960784314" />
                    <fefuncb type="table" tablevalues="0.35294117647059 0.47058823529412" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-purple-green">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.65098039215686 0.40392156862745" />
                    <fefuncg type="table" tablevalues="0 1" />
                    <fefuncb type="table" tablevalues="0.44705882352941 0.4" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 0 0" width="0" height="0" focusable="false" role="none"
        style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
        <defs>
            <filter id="wp-duotone-blue-orange">
                <fecolormatrix color-interpolation-filters="sRGB" type="matrix"
                    values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                <fecomponenttransfer color-interpolation-filters="sRGB">
                    <fefuncr type="table" tablevalues="0.098039215686275 1" />
                    <fefuncg type="table" tablevalues="0 0.66274509803922" />
                    <fefuncb type="table" tablevalues="0.84705882352941 0.41960784313725" />
                    <fefunca type="table" tablevalues="1 1" />
                </fecomponenttransfer>
                <fecomposite in2="SourceGraphic" operator="in" />
            </filter>
        </defs>
    </svg>
    <div id="page" class="site">
        <!-- <a class="skip-link screen-reader-text" href="#primary">Skip to content</a> -->
        <header class="header">
            <div class="header_top">
                <div class="container top-navbar">
                    <div class="row align-items-center">
                        <div class="col-md-6 header__list">
                        </div>
                        <div class="col-md-6">
                            <ul class="top_side">
                                <li class="dropdown">
                                    <a class="btn btn-transparent text-light dropdown-toggle droptext" id="language">
                                        Global - English
                                    </a>
                                    <!-- for dropdown button -->
                                    <div id="myNav1" class="dropdown-overlay">

                                        <!-- Button to close the overlay navigation -->
                                        <a href="javascript:void(0)" class="close_btn"
                                            onclick="close_Nav1()">&times;</a>

                                        <!-- Overlay content -->
                                        <div class="dropdown-overlay-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p class="dropdown-overlay_give">Give us a call</p>
                                                    </div>
                                                    <div class="col-md-9 dropdown-overlay-text">
                                                        <ul class="flags-container">
                                                            <li>
                                                                <span class="flag-img"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                                                        alt="india-flag"
                                                                        data-lazy-src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/india-flag.svg"><noscript><img
                                                                            src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/india-flag.svg"
                                                                            loading="lazy"
                                                                            alt="india-flag"></noscript></span>
                                                                <span>+91 22 40500600</span>
                                                            </li>
                                                            <li><span class="flag-img"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                                                        alt="india-flag"
                                                                        data-lazy-src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag2.svg"><noscript><img
                                                                            src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag2.svg"
                                                                            loading="lazy"
                                                                            alt="india-flag"></noscript></span>
                                                                <span>+61 29 191
                                                                    6546</span>
                                                            </li>
                                                            <li><span class="flag-img"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                                                        alt="india-flag"
                                                                        data-lazy-src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag3.svg"><noscript><img
                                                                            src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag3.svg"
                                                                            loading="lazy"
                                                                            alt="india-flag"></noscript></span>
                                                                <span>+1 347 829
                                                                    5496</span>
                                                            </li>
                                                            <li><span class="flag-img"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                                                        alt="india-flag"
                                                                        data-lazy-src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag4.svg"><noscript><img
                                                                            src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag4.svg"
                                                                            loading="lazy"
                                                                            alt="india-flag"></noscript></span>
                                                                <span>+61 29 191
                                                                    6546</span>
                                                            </li>
                                                            <li><span class="flag-img"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                                                        alt="india-flag"
                                                                        data-lazy-src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag5.svg"><noscript><img
                                                                            src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag5.svg"
                                                                            loading="lazy"
                                                                            alt="india-flag"></noscript></span>
                                                                <span>+44 203 355
                                                                    7938</span>
                                                            </li>
                                                            <li><span class="flag-img"><img
                                                                        src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                                                        alt="india-flag"
                                                                        data-lazy-src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag6.svg"><noscript><img
                                                                            src="https://www.neosofttech.com/wp-content/themes/neosoft/app/images/flag6.svg"
                                                                            loading="lazy"
                                                                            alt="india-flag"></noscript></span>
                                                                <span>+61 29 191
                                                                    6546</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- for dropdown button -->
                                </li>
                                <!-- <li class="dropdown">
                                <a class="btn btn-transparent text-light dropdown-toggle droptext" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    onclick="open_Nav2()">
                                    Red Folder
                                </a>
                                // for dropdown button
                                <div id="myNav2" class="redfolder-overlay">

                                    // Button to close the overlay navigation
                                    <a href="javascript:void(0)" class="close_btn" onclick="close_Nav2()">
                                        <span class="icon-cross"></span>
                                    </a>

                                    // Overlay content
                                    <div class="redfolder-content">
                                        <div class="row">
                                            <div class="col-lg-12 redfolder-part">
                                                <div class="redfolder-part__img">
                                                    <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="folder-icon" data-lazy-src="app/images/folder-icon.svg"><noscript><img src="app/images/folder-icon.svg" loading="lazy" alt="folder-icon"></noscript>
                                                </div>
                                                <div class="redfolder-part__content">
                                                    <h2>You have no saved content in your Red Folder.</h2>
                                                    <p>Bookmark content that interests you and it will be saved here for
                                                        you
                                                        to read or share later.</p>
                                                </div>
                                                <a href="#" class="btn btn--tertiary-outline">EXPLORE
                                                    InfyGlobe</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                // for dropdown button
                            </li> -->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-dark navbar-light">
                <div class="container">
                    <a class="menu-brand" href="#">
                        <span class="icon-menu brand--menu"></span>
                    </a>
                    <div class="navmobile">
                        <div class="menu-menu-1-container">
                            <ul id="menu-menu-1" class="slide-menu__top-list">
                                <li id="menu-item-9953"
                                    class="servicesmobile servicesmenu submenu-parent menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9953">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-2804"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2804">
                                            <a href="digitaltransformation.html">Digital Transformation</a>
                                        </li>
                                        <li id="menu-item-6185"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-6185">
                                            <a href=" team-augmentaion.html">Team
                                                Augmentation</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-9899"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9899">
                                                    <a href="java.html">Java</a>
                                                </li>
                                                <li id="menu-item-9893" s
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9893">
                                                    <a href=" php.html">PHP</a>
                                                </li>
                                                <li id="menu-item-9897"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9897">
                                                    <a href=" python.html">Python</a>
                                                </li>
                                                <li id="menu-item-9896"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9896">
                                                    <a href=" reactjs.html">React
                                                        JS</a>
                                                </li>
                                                <li id="menu-item-10043"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10043">
                                                    <a href=" dot-net.html">.NET</a>
                                                </li>
                                                <li id="menu-item-10593"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10593">
                                                    <a href=" uidevelop.html">UI
                                                        / UX</a>
                                                </li>
                                                <li id="menu-item-10555"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10555">
                                                    <a href=" front-end.html">Front-End
                                                        Development</a>
                                                </li>
                                                <li id="menu-item-9898"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9898">
                                                    <a href=" ios.html">iOS</a>
                                                </li>
                                                <li id="menu-item-9895"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9895">
                                                    <a href=" android.html">Android</a>
                                                </li>
                                                <li id="menu-item-9892"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9892">
                                                    <a href=" flutter.html">Flutter</a>
                                                </li>
                                                <li id="menu-item-9894"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9894">
                                                    <a href=" nodejs.html">Node
                                                        JS</a>
                                                </li>
                                                <li id="menu-item-10044"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10044">
                                                    <a href=" angular.html">Angular</a>
                                                </li>
                                                <li id="menu-item-10556"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10556">
                                                    <a href=" devops-dev.html">DevOps</a>
                                                </li>
                                                <li id="menu-item-10592"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10592">
                                                    <a href=" bigdata-dev.html">Big
                                                        Data</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-2805"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2805">
                                            <a href="appdevelopment.html">Application Development</a>
                                        </li>
                                        <li id="menu-item-2808"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2808">
                                            <a href="cloud-computing.html">Cloud Consulting</a>
                                        </li>
                                        <li id="menu-item-2811"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2811">
                                            <a href="devops.html">DevOps Consulting</a>
                                        </li>
                                        <li id="menu-item-2810"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2810">
                                            <a href="bigdata.html">Big Data and Analytics</a>
                                        </li>
                                        <li id="menu-item-2809"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2809">
                                            <a href="artificial-intelligence.html">Artificial Intelligence</a>
                                        </li>
                                        <li id="menu-item-2812"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2812">
                                            <a href="quality-engineering.html">Quality Engineering</a>
                                        </li>
                                        <li id="menu-item-2813"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2813">
                                            <a href="internet-of-things.html">Internet Of Things</a>
                                        </li>
                                        <li id="menu-item-2814"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2814">
                                            <a href="blockchain.html">Blockchain</a>
                                        </li>
                                        <li id="menu-item-2815"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2815">
                                            <a href="ui-ux.html">UI/UX</a>
                                        </li>
                                        <li id="menu-item-2816"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2816">
                                            <a href="product-development.html">Product Development</a>
                                        </li>
                                        <li id="menu-item-2817"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2817">
                                            <a href="ims.html">IMS</a>
                                        </li>
                                        <li id="menu-item-2818"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2818">
                                            <a href="data-science.html">Data Science</a>
                                        </li>
                                        <li id="menu-item-2819"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2819">
                                            <a href="innovation-lab.html">Innovation Lab</a>
                                        </li>
                                        <li id="menu-item-9901"
                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9901">
                                            <a href="#">An approach that embeds purpose and value throughout your
                                                organization.</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-12"
                                    class="industrymobile industriesmenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12">
                                    <a href="#">Industries</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-8676"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8676">
                                            <a href="ecommerce-software-development.html">Ecommerce
                                                &#038; Retail</a>
                                        </li>
                                        <li id="menu-item-8689"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8689">
                                            <a href="financial-it-services.html">Financial
                                                Services</a>
                                        </li>
                                        <li id="menu-item-8682"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8682">
                                            <a href="professional-services.html">Professional
                                                Services</a>
                                        </li>
                                        <li id="menu-item-8677"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8677">
                                            <a href="healthcare-it-services.html">Healthcare</a>
                                        </li>
                                        <li id="menu-item-8688"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8688">
                                            <a href="logistics-software-development.html">Logistics
                                                &#038; Supply Chain</a>
                                        </li>
                                        <li id="menu-item-8690"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8690">
                                            <a href="manufacturing-it-services.html">Manufacturing</a>
                                        </li>
                                        <li id="menu-item-8681"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8681">
                                            <a href="sports.html">Sports</a>
                                        </li>
                                        <li id="menu-item-8684"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8684">
                                            <a href="travel-app-development.html">Travel
                                                &#038; Hospitality</a>
                                        </li>
                                        <li id="menu-item-8683"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8683">
                                            <a href="real-estate-app-development.html">Real
                                                Estate</a>
                                        </li>
                                        <li id="menu-item-8685"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8685">
                                            <a href="telecom-software-development.html">Telecom</a>
                                        </li>
                                        <li id="menu-item-8686"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8686">
                                            <a href="elearning-software-development.html">Education
                                                &#038; Learning</a>
                                        </li>
                                        <li id="menu-item-8687"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8687">
                                            <a href="media-software-development.html">Media
                                                &#038; Entertainment</a>
                                        </li>
                                        <li id="menu-item-8680"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8680">
                                            <a href="isvs.html">ISVs &#8211; Digital
                                                Products</a>
                                        </li>
                                        <li id="menu-item-9902"
                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9902">
                                            <a href="#">Crafting roadmaps to digital maturity across diverse
                                                industries and segments.</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-13"
                                    class="solution solutionsmenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13">
                                    <a href="#">Solutions</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-2822"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2822">
                                            <a href="crm.html">CRM</a>
                                        </li>
                                        <li id="menu-item-2821"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2821">
                                            <a href="ecommerce.html">Ecommerce</a>
                                        </li>
                                        <li id="menu-item-2820"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2820">
                                            <a href="enterprise-resource-planing-erp.html">ERP</a>
                                        </li>
                                        <li id="menu-item-2825"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2825">
                                            <a href="content-management-system-cms.html">CMS</a>
                                        </li>
                                        <li id="menu-item-2824"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2824">
                                            <a href="robotic-process-automation-rpa.html">RPA</a>
                                        </li>
                                        <li id="menu-item-2823"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2823">
                                            <a href="sap.html">SAP</a>
                                        </li>
                                        <li id="menu-item-9903"
                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9903">
                                            <a href="#">Helping organizations drive ROI from their digital
                                                initiatives.</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-2379"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2379">
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li id="menu-item-355"
                                    class="blogsmenu menu-item menu-item-type-post_type menu-item-object-page menu-item-355">
                                    <a href="blogs.html">Blogs</a>
                                </li>
                                <li id="menu-item-356"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-356">
                                    <a href="carreers.html">Careers</a>
                                </li>
                                <li id="menu-item-357"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-357">
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="globalenglish">
                            <h2>test</h2>
                        </div> -->
                    </div>
                    <a class="navbar-brand ml-0" href="index.html">
                        <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                            alt="" srcset="" class="header-logo white--logo logo-img"
                            data-lazy-src="./Assets/Images/infiglobe-logo.png" loading="lazy" alt="" srcset=""
                            class="header-logo white--logo"></noscript>
                        <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                            alt="logo2" srcset="" class="header-logo black--logo logo-img"
                            data-lazy-src="./Assets/Images/infiglobe-logo.png"><noscript><img
                                src="./Assets/Images/infiglobe-logo.png" loading="lazy" alt="logo2" srcset=""
                                class="header-logo black--logo logo-img"></noscript>
                        <!-- <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="logo2" class="header-logo black--logo" data-lazy-src="/wp-content/uploads/2022/12/neosoft-logo.svg"><noscript><img src="/wp-content/uploads/2022/12/neosoft-logo.svg" loading="lazy" alt="logo2" class="header-logo black--logo"></noscript> -->
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="menu-menu-1-container">
                            <ul id="primary-menu" class="navbar-nav me-auto mb-2 mb-lg-0 ps-5">
                                <li
                                    class="servicesmobile servicesmenu submenu-parent menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9953">
                                    <a href="#">Services</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2804">
                                            <a href="digitaltransformation.html">Digital Transformation</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-6185">
                                            <a href=" team-augmentaion.html">Team
                                                Augmentation</a>
                                            <ul class="sub-menu">
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9899">
                                                    <a href=" java.html">Java</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9893">
                                                    <a href=" php.html">PHP</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9897">
                                                    <a href=" python.html">Python</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9896">
                                                    <a href=" reactjs.html">React
                                                        JS</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10043">
                                                    <a href=" dot-net.html">.NET</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10593">
                                                    <a href=" uidevelop.html">UI
                                                        / UX</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10555">
                                                    <a href=" front-end.html">Front-End
                                                        Development</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9898">
                                                    <a href=" ios.html">iOS</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9895">
                                                    <a href=" android.html">Android</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9892">
                                                    <a href=" flutter.html">Flutter</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9894">
                                                    <a href=" nodejs.html">Node
                                                        JS</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10044">
                                                    <a href=" angular.html">Angular</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10556">
                                                    <a href=" devops-dev.html">DevOps</a>
                                                </li>
                                                <li
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10592">
                                                    <a href=" bigdata-dev.html">Big
                                                        Data</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2805">
                                            <a href="appdevelopment.html">Application Development</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2808">
                                            <a href="cloud-computing.html">Cloud Consulting</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2811">
                                            <a href="devops.html">DevOps Consulting</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2810">
                                            <a href="bigdata.html">Big Data and Analytics</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2809">
                                            <a href="artificial-intelligence.html">Artificial Intelligence</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2812">
                                            <a href="quality-engineering.html">Quality Engineering</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2813">
                                            <a href="internet-of-things.html">Internet Of Things</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2814">
                                            <a href="blockchain.html">Blockchain</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2815">
                                            <a href="ui-ux.html">UI/UX</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2816">
                                            <a href="product-development.html">Product Development</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2817">
                                            <a href="ims.html">IMS</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2818">
                                            <a href="data-science.html">Data Science</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2819">
                                            <a href="innovation-lab.html">Innovation Lab</a>
                                        </li>
                                        <li
                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9901">
                                            <a href="#">An approach that embeds purpose and value throughout your
                                                organization.</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="industrymobile industriesmenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12">
                                    <a href="#">Industries</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8676">
                                            <a href="ecommerce-software-development.html">Ecommerce
                                                &#038; Retail</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8689">
                                            <a href="financial-it-services.html">Financial
                                                Services</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8682">
                                            <a href="professional-services.html">Professional
                                                Services</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8677">
                                            <a href="healthcare-it-services.html">Healthcare</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8688">
                                            <a href="logistics-software-development.html">Logistics
                                                &#038; Supply Chain</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8690">
                                            <a href="manufacturing-it-services.html">Manufacturing</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8681">
                                            <a href="sports.html">Sports</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8684">
                                            <a href="travel-app-development.html">Travel
                                                &#038; Hospitality</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8683">
                                            <a href="real-estate-app-development.html">Real
                                                Estate</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8685">
                                            <a href="telecom-software-development.html">Telecom</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8686">
                                            <a href="elearning-software-development.html">Education
                                                &#038; Learning</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8687">
                                            <a href="media-software-development.html">Media
                                                &#038; Entertainment</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8680">
                                            <a href="isvs.html">ISVs &#8211; Digital
                                                Products</a>
                                        </li>
                                        <li
                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9902">
                                            <a href="#">Crafting roadmaps to digital maturity across diverse
                                                industries and segments.</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="solution solutionsmenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-13">
                                    <a href="#">Solutions</a>
                                    <ul class="sub-menu">
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2822">
                                            <a href="crm.html">CRM</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2821">
                                            <a href="ecommerce.html">Ecommerce</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2820">
                                            <a href="enterprise-resource-planing-erp.html">ERP</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2825">
                                            <a href="content-management-system-cms.html">CMS</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2824">
                                            <a href="robotic-process-automation-rpa.html">RPA</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2823">
                                            <a href="sap.html">SAP</a>
                                        </li>
                                        <li
                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9903">
                                            <a href="#">Helping organizations drive ROI from their digital
                                                initiatives.</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2379">
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li
                                    class="blogsmenu menu-item menu-item-type-post_type menu-item-object-page menu-item-355">
                                    <a href="blogs.html">Blogs</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-356">
                                    <a href="carreers.html">Careers</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-357">
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <ul class="navbar-nav explore__nav">
                        <li class="nav-item">
                            <a class="nav-link explore" id="searchbox" href="#" onclick="openNav()"><span
                                    class="explore-txt">Explore</span> <span class="icon-search"></span></a>
                            <div id="myNav" class="search_explore">
                                <div class="container d-flex flex-column align-items-center justify-content-center">
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span
                                            class="icon-cross"></span></a>
                                    <div class="search-content">
                                        <!-- <p>Search</p> -->
                                        <h2>What are you <br /> looking for?</h2>
                                        <div class="col-sm-12 col-md-12 search-content__searchbar">
                                            <div class="input-group d-flex">
                                                <!-- <input type="text" class="form-control text-search w-100" placeholder="Explore here ...">
                                                <button class="btn btn-transparent btn-search" type="button">
                                                    <span class="icon-search"></span>
                                                </button> -->
                                                <form role="search" method="get" class="search-form" action="#">
                                                    <input name="s" id="search" value="" type="text"
                                                        class="form-control text-search w-100" placeholder="Search ..."
                                                        autocomplete="off" onfocus="this.value=''">
                                                    <div class="search-submit">
                                                        <input type="submit" class="btn" value="Search" />
                                                        <span class="icon-search"></span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="area__interest d-flex">
                                            <div class="area__interest_text">
                                                <p>Trending</p>
                                            </div>
                                            <div class="area__interest_btn">
                                                <!-- <ul class="d-flex flex-wrap mb-0"> -->
                                                <!-- <li><a class="btn btn--tertiary-outline"
                                                            href="?s=&se=&t=tag"></a>
                                                    </li> -->
                                                <!-- </ul> -->
                                                <ul class="d-flex flex-wrap mb-0">
                                                    <li><a class="btn btn--tertiary-outline"
                                                            href="index.html">Services</a>
                                                    </li>
                                                    <li><a class="btn btn--tertiary-outline"
                                                            href="index.html">Solutions</a>
                                                    </li>
                                                    <li><a class="btn btn--tertiary-outline"
                                                            href="index.html">Locations</a>
                                                    </li>
                                                    <li><a class="btn btn--tertiary-outline" href="index.html">Jobs</a>
                                                    </li>
                                                    <li><a class="btn btn--tertiary-outline" href="index.html">
                                                            InfyGlobe</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="side-menu">
                                <div class="side-menu__inner">
                                    <div class="slide-menu__list">

                                        <div class="menu-leftside-container">
                                            <ul id="menu-leftside" class="slide-menu__top-list">
                                                <li id="menu-item-9834"
                                                    class="servicesmobile servicesmenu submenu-parent menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9834">
                                                    <a href="#">Services</a>
                                                    <ul class="sub-menu">
                                                        <li id="menu-item-9835"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9835">
                                                            <a href="digitaltransformation.html">Digital
                                                                Transformation</a>
                                                        </li>
                                                        <li id="menu-item-9841"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9841">
                                                            <a href=" team-augmentaion.html">Team
                                                                Augmentation</a><span class="for-collaps-icon"></span>
                                                            <ul class="sub-menu">
                                                                <li id="menu-item-9843"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9843">
                                                                    <a href="java.html">Java</a>
                                                                </li>
                                                                <li id="menu-item-9848"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9848">
                                                                    <a href=" php.html">PHP</a>
                                                                </li>
                                                                <li id="menu-item-9844"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9844">
                                                                    <a href=" php.html">Python</a>
                                                                </li>
                                                                <li id="menu-item-9847"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9847">
                                                                    <a href=" php.html">React
                                                                        JS</a>
                                                                </li>
                                                                <li id="menu-item-10045"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10045">
                                                                    <a href=" dot-net.html">.NET</a>
                                                                </li>
                                                                <li id="menu-item-10590"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10590">
                                                                    <a href=" uidevelop.html">UI
                                                                        UX Development Company</a>
                                                                </li>
                                                                <li id="menu-item-10557"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10557">
                                                                    <a href=" front-end.html">Front-End
                                                                        Development</a>
                                                                </li>
                                                                <li id="menu-item-9842"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9842">
                                                                    <a href=" ios">iOS</a>
                                                                </li>
                                                                <li id="menu-item-9845"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9845">
                                                                    <a href=" android.html">Android</a>
                                                                </li>
                                                                <li id="menu-item-9900"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9900">
                                                                    <a href=" flutter.html">Flutter</a>
                                                                </li>
                                                                <li id="menu-item-9846"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9846">
                                                                    <a href=" nodejs.html">Node
                                                                        JS</a>
                                                                </li>
                                                                <li id="menu-item-10046"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10046">
                                                                    <a href=" angular.html">Angular</a>
                                                                </li>
                                                                <li id="menu-item-10558"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10558">
                                                                    <a href=" devops-dev.html">DevOps</a>
                                                                </li>
                                                                <li id="menu-item-10591"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10591">
                                                                    <a href=" bigdata-dev.html">Big
                                                                        data Development Company</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li id="menu-item-9849"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9849">
                                                            <a href="appdevelopment.html">Application
                                                                Development</a>
                                                        </li>
                                                        <li id="menu-item-9850"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9850">
                                                            <a href="cloud-computing.html">Cloud Consulting</a>
                                                        </li>
                                                        <li id="menu-item-9851"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9851">
                                                            <a href="devops.html">DevOps Consulting</a>
                                                        </li>
                                                        <li id="menu-item-9852"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9852">
                                                            <a href="bigdata.html">Big Data and Analytics</a>
                                                        </li>
                                                        <li id="menu-item-9853"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9853">
                                                            <a href="artificial-intelligence.html">Artificial
                                                                Intelligence</a>
                                                        </li>
                                                        <li id="menu-item-9855"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9855">
                                                            <a href="quality-engineering.html">Quality
                                                                Engineering</a>
                                                        </li>
                                                        <li id="menu-item-9854"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9854">
                                                            <a href="internet-of-things.html">Internet Of Things</a>
                                                        </li>
                                                        <li id="menu-item-9856"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9856">
                                                            <a href="blockchain.html">Blockchain</a>
                                                        </li>
                                                        <li id="menu-item-9858"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9858">
                                                            <a href="ui-ux.html">UI/UX</a>
                                                        </li>
                                                        <li id="menu-item-9859"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9859">
                                                            <a href="product-development.html">Product
                                                                Development</a>
                                                        </li>
                                                        <li id="menu-item-9860"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9860">
                                                            <a href="ims.html">IMS</a>
                                                        </li>
                                                        <li id="menu-item-9861"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9861">
                                                            <a href="data-science.html">Data Science</a>
                                                        </li>
                                                        <li id="menu-item-9862"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9862">
                                                            <a href="innovation-lab.html">Innovation Lab</a>
                                                        </li>
                                                        <li id="menu-item-9857"
                                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9857">
                                                            <a href="#">An approach that embeds purpose and value
                                                                throughout your organization.</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li id="menu-item-9879"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9879">
                                                    <a href="#">Industries</a>
                                                    <ul class="sub-menu">
                                                        <li id="menu-item-9865"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9865">
                                                            <a href="ecommerce-software-development.html">Ecommerce
                                                                &#038; Retail</a>
                                                        </li>
                                                        <li id="menu-item-9866"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9866">
                                                            <a href="financial-it-services.html">Financial
                                                                Services</a>
                                                        </li>
                                                        <li id="menu-item-9867"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9867">
                                                            <a href="professional-services.html">Professional
                                                                Services</a>
                                                        </li>
                                                        <li id="menu-item-9868"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9868">
                                                            <a href="healthcare-it-services.html">Healthcare</a>
                                                        </li>
                                                        <li id="menu-item-9870"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9870">
                                                            <a href="logistics-software-development.html">Logistics
                                                                &#038; Supply Chain</a>
                                                        </li>
                                                        <li id="menu-item-9869"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9869">
                                                            <a href="manufacturing-it-services.html">Manufacturing</a>
                                                        </li>
                                                        <li id="menu-item-9871"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9871">
                                                            <a href="sports.html">Sports</a>
                                                        </li>
                                                        <li id="menu-item-9872"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9872">
                                                            <a href="travel-app-development.html">Travel
                                                                &#038; Hospitality</a>
                                                        </li>
                                                        <li id="menu-item-9873"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9873">
                                                            <a href="real-estate-app-development.html">Real
                                                                Estate</a>
                                                        </li>
                                                        <li id="menu-item-9874"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9874">
                                                            <a href="telecom-software-development.html">Telecom</a>
                                                        </li>
                                                        <li id="menu-item-9875"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9875">
                                                            <a href="elearning-software-development.html">Education
                                                                &#038; Learning</a>
                                                        </li>
                                                        <li id="menu-item-9876"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9876">
                                                            <a href="media-software-development.html">Media
                                                                &#038; Entertainment</a>
                                                        </li>
                                                        <li id="menu-item-9877"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9877">
                                                            <a href="isvs.html">ISVs &#8211;
                                                                Digital Products</a>
                                                        </li>
                                                        <li id="menu-item-9878"
                                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9878">
                                                            <a href="#">Crafting roadmaps to digital maturity across
                                                                diverse industries and segments.</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li id="menu-item-9880"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9880">
                                                    <a href="#">Solutions</a>
                                                    <ul class="sub-menu">
                                                        <li id="menu-item-9884"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9884">
                                                            <a href="crm.html">CRM</a>
                                                        </li>
                                                        <li id="menu-item-9886"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9886">
                                                            <a href="ecommerce.html">Ecommerce</a>
                                                        </li>
                                                        <li id="menu-item-9885"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9885">
                                                            <a href="enterprise-resource-planing-erp.html">ERP</a>
                                                        </li>
                                                        <li id="menu-item-9883"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9883">
                                                            <a href="content-management-system-cms.html">CMS</a>
                                                        </li>
                                                        <li id="menu-item-9881"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9881">
                                                            <a href="robotic-process-automation-rpa.html">RPA</a>
                                                        </li>
                                                        <li id="menu-item-9882"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9882">
                                                            <a href="sap.html">SAP</a>
                                                        </li>
                                                        <li id="menu-item-9887"
                                                            class="right-side-cont menu-item menu-item-type-custom menu-item-object-custom menu-item-9887">
                                                            <a href="#">Helping organizations drive ROI from their
                                                                digital initiatives.</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li id="menu-item-9888"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9888">
                                                    <a href="about-us.html">About Us</a>
                                                </li>
                                                <li id="menu-item-9889"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9889">
                                                    <a href="blogs.html">Blogs</a>
                                                </li>
                                                <li id="menu-item-9890"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9890">
                                                    <a href="carreers.html">Career</a>
                                                </li>
                                                <li id="menu-item-9891"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9891">
                                                    <a href="contact.html">Contact</a>
                                                </li>
                                            </ul>
                                        </div> <!--<ul class="slide-menu__top-list ">
                                            <li>
                                                <a href="#">Blogs</a>
                                            </li>
                                            <li>
                                                <a href="#">Webinars</a>
                                            </li>
                                            <li>
                                                <a href="#">Whitepapers</a>
                                            </li>
                                            <li>
                                                <a href="#" class="slide-menu__news">News Room</a>
                                            </li>
                                        </ul>-->

                                        <div>
                                            <h4 class="bottom__listtext">Our Brands</h4>
                                            <ul class="bottom__list">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="close d-flex align-items-center justify-content-center">
                                        <span class="icon-cross"></span>
                                        <!-- <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="close" data-lazy-src="app/images/close.jpg"><noscript><img src="app/images/close.jpg" loading="lazy" alt="close"></noscript> -->
                                    </div>
                                </div>
                            </div>


                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <section class="contactus">
                <div class="container">
                    <h1 class="contactus__title">Contact Us</h1>

                    <p class="contactus__para">We are happy you have taken the first step. Let's get started and discuss
                        how we can drive digital outcomes for your business. <br> We are processing your message and our
                        consultants shall reach out to you in 48 working hours.</p>
                    <div role="form" class="wpcf7" id="wpcf7-f363-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>



                        <form id="contactlist" method="post" class="wpcf7-form init contactus__form"
                            novalidate="novalidate" data-status="init">
                            <input type="hidden" name="access_key" value="f63d3ace-1e97-403c-b622-d1251c33cf7d">


                            <div class="row row-60">
                               <input type="hidden" name="Countryname" value="test1" class="wpcf7-form-control wpcf7-hidden"
                                    id="country-name" /> 
                                <input type="hidden" name="Needservice" value="Needservice" class="wpcf7-form-control wpcf7-hidden"
                                    id="need-service" />
                                <div class="customer_success_text" style="margin-bottom: 6rem; display:none;"
                                    id="myModal2">
                                    <div style="background: #ed1819;position: relative;">
                                        <span class="icon-cross close"
                                            style="position: absolute; right: 1rem; z-index: 2; padding: 1rem 1rem; border: 1px solid #fff; border-radius: 50%; font-size:10px;top: 0.5rem;"></span>
                                        </p>
                                        <div class="inner_text_customer" style="padding: 1rem;">
                                            <div id="result"></div>
                                            <p class="d-flex m-0" style="width:90%">Thanks for reaching out. Our
                                                consultants will shortly get in touch with you.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">



                                    <div class="contactus__inputs">
                                        <label for=" " class="form-label">Name *</label><br />
                                        <span class="wpcf7-form-control-wrap your-name"><input type="text" name="name"
                                                value="" size="40"
                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                                aria-required="true" aria-invalid="false" /></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <select class="countrydropdown"><br />
                                        <option selected name="country">Country</option><br />
                                        <option value="Afghanistan">Afghanistan</option><br />
                                        <option value="Albania">Albania</option><br />
                                        <option value="Algeria">Algeria</option><br />
                                        <option value="American Samoa">American Samoa</option><br />
                                        <option value="Andorra">Andorra</option><br />
                                        <option value="Angola">Angola</option><br />
                                        <option value="Anguilla">Anguilla</option><br />
                                        <option value="Antarctica">Antarctica</option><br />
                                        <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option><br />
                                        <option value="Argentina">Argentina</option><br />
                                        <option value="Armenia">Armenia</option><br />
                                        <option value="Aruba">Aruba</option><br />
                                        <option value="Ascension Island">Ascension Island</option><br />
                                        <option value="Australia">Australia</option><br />
                                        <option value="Austria">Austria</option><br />
                                        <option value="Azerbaijan">Azerbaijan</option><br />
                                        <option value="Bahamas">Bahamas</option><br />
                                        <option value="Bahrain">Bahrain</option><br />
                                        <option value="Bangladesh">Bangladesh</option><br />
                                        <option value="Barbados">Barbados</option><br />
                                        <option value="Belarus">Belarus</option><br />
                                        <option value="Belgium">Belgium</option><br />
                                        <option value="Belize">Belize</option><br />
                                        <option value="Benin">Benin</option><br />
                                        <option value="Bermuda">Bermuda</option><br />
                                        <option value="Bhutan">Bhutan</option><br />
                                        <option value="Bolivia">Bolivia</option><br />
                                        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option><br />
                                        <option value="Botswana">Botswana</option><br />
                                        <option value="Bouvet Island">Bouvet Island</option><br />
                                        <option value="Brazil">Brazil</option><br />
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option><br />
                                        <option value="British Virgin Islands">British Virgin Islands</option><br />
                                        <option value="Brunei">Brunei</option><br />
                                        <option value="Bulgaria">Bulgaria</option><br />
                                        <option value="Burkina Faso">Burkina Faso</option><br />
                                        <option value="Burundi">Burundi</option><br />
                                        <option value="Cambodia">Cambodia</option><br />
                                        <option value="Cameroon">Cameroon</option><br />
                                        <option value="Canada">Canada</option><br />
                                        <option value="Canary Islands">Canary Islands</option><br />
                                        <option value="Cape Verde">Cape Verde</option><br />
                                        <option value="Caribbean Netherlands">Caribbean Netherlands</option><br />
                                        <option value="Cayman Islands">Cayman Islands</option><br />
                                        <option value="Central African Republic">Central African Republic</option><br />
                                        <option value="Ceuta &amp; Melilla">Ceuta &amp; Melilla</option><br />
                                        <option value="Chad">Chad</option><br />
                                        <option value="Chile">Chile</option><br />
                                        <option value="China">China</option><br />
                                        <option value="Christmas Island">Christmas Island</option><br />
                                        <option value="Clipperton Island">Clipperton Island</option><br />
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><br />
                                        <option value="Colombia">Colombia</option><br />
                                        <option value="Comoros">Comoros</option><br />
                                        <option value="Congo - Brazzaville">Congo - Brazzaville</option><br />
                                        <option value="Congo - Kinshasa">Congo - Kinshasa</option><br />
                                        <option value="Cook Islands">Cook Islands</option><br />
                                        <option value="Costa Rica">Costa Rica</option><br />
                                        <option value="Croatia">Croatia</option><br />
                                        <option value="Cuba">Cuba</option><br />
                                        <option value="Curaçao">Curaçao</option><br />
                                        <option value="Cyprus">Cyprus</option><br />
                                        <option value="Czechia">Czechia</option><br />
                                        <option value="Côte d’Ivoire">Côte d’Ivoire</option><br />
                                        <option value="Denmark">Denmark</option><br />
                                        <option value="Diego Garcia">Diego Garcia</option><br />
                                        <option value="Djibouti">Djibouti</option><br />
                                        <option value="Dominica">Dominica</option><br />
                                        <option value="Dominican Republic">Dominican Republic</option><br />
                                        <option value="Ecuador">Ecuador</option><br />
                                        <option value="Egypt">Egypt</option><br />
                                        <option value="El Salvador">El Salvador</option><br />
                                        <option value="Equatorial Guinea">Equatorial Guinea</option><br />
                                        <option value="Eritrea">Eritrea</option><br />
                                        <option value="Estonia">Estonia</option><br />
                                        <option value="Eswatini">Eswatini</option><br />
                                        <option value="Ethiopia">Ethiopia</option><br />
                                        <option value="Falkland Islands">Falkland Islands</option><br />
                                        <option value="Faroe Islands">Faroe Islands</option><br />
                                        <option value="Fiji">Fiji</option><br />
                                        <option value="Finland">Finland</option><br />
                                        <option value="France">France</option><br />
                                        <option value="French Guiana">French Guiana</option><br />
                                        <option value="French Polynesia">French Polynesia</option><br />
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <br />
                                        <option value="Gabon">Gabon</option><br />
                                        <option value="Gambia">Gambia</option><br />
                                        <option value="Georgia">Georgia</option><br />
                                        <option value="Germany">Germany</option><br />
                                        <option value="Ghana">Ghana</option><br />
                                        <option value="Gibraltar">Gibraltar</option><br />
                                        <option value="Greece">Greece</option><br />
                                        <option value="Greenland">Greenland</option><br />
                                        <option value="Grenada">Grenada</option><br />
                                        <option value="Guadeloupe">Guadeloupe</option><br />
                                        <option value="Guam">Guam</option><br />
                                        <option value="Guatemala">Guatemala</option><br />
                                        <option value="Guernsey">Guernsey</option><br />
                                        <option value="Guinea">Guinea</option><br />
                                        <option value="Guinea-Bissau">Guinea-Bissau</option><br />
                                        <option value="Guyana">Guyana</option><br />
                                        <option value="Haiti">Haiti</option><br />
                                        <option value="Heard &amp; McDonald Islands">Heard &amp; McDonald Islands
                                        </option><br />
                                        <option value="Honduras">Honduras</option><br />
                                        <option value="Hong Kong SAR China">Hong Kong SAR China</option><br />
                                        <option value="Hungary">Hungary</option><br />
                                        <option value="Iceland">Iceland</option><br />
                                        <option value="India">India</option><br />
                                        <option value="Indonesia">Indonesia</option><br />
                                        <option value="Iran">Iran</option><br />
                                        <option value="Iraq">Iraq</option><br />
                                        <option value="Ireland">Ireland</option><br />
                                        <option value="Isle of Man">Isle of Man</option><br />
                                        <option value="Israel">Israel</option><br />
                                        <option value="Italy">Italy</option><br />
                                        <option value="Jamaica">Jamaica</option><br />
                                        <option value="Japan">Japan</option><br />
                                        <option value="Jersey">Jersey</option><br />
                                        <option value="Jordan">Jordan</option><br />
                                        <option value="Kazakhstan">Kazakhstan</option><br />
                                        <option value="Kenya">Kenya</option><br />
                                        <option value="Kiribati">Kiribati</option><br />
                                        <option value="Kosovo">Kosovo</option><br />
                                        <option value="Kuwait">Kuwait</option><br />
                                        <option value="Kyrgyzstan">Kyrgyzstan</option><br />
                                        <option value="Laos">Laos</option><br />
                                        <option value="Latvia">Latvia</option><br />
                                        <option value="Lebanon">Lebanon</option><br />
                                        <option value="Lesotho">Lesotho</option><br />
                                        <option value="Liberia">Liberia</option><br />
                                        <option value="Libya">Libya</option><br />
                                        <option value="Liechtenstein">Liechtenstein</option><br />
                                        <option value="Lithuania">Lithuania</option><br />
                                        <option value="Luxembourg">Luxembourg</option><br />
                                        <option value="Macao SAR China">Macao SAR China</option><br />
                                        <option value="Madagascar">Madagascar</option><br />
                                        <option value="Malawi">Malawi</option><br />
                                        <option value="Malaysia">Malaysia</option><br />
                                        <option value="Maldives">Maldives</option><br />
                                        <option value="Mali">Mali</option><br />
                                        <option value="Malta">Malta</option><br />
                                        <option value="Marshall Islands">Marshall Islands</option><br />
                                        <option value="Martinique">Martinique</option><br />
                                        <option value="Mauritania">Mauritania</option><br />
                                        <option value="Mauritius">Mauritius</option><br />
                                        <option value="Mayotte">Mayotte</option><br />
                                        <option value="Mexico">Mexico</option><br />
                                        <option value="Micronesia">Micronesia</option><br />
                                        <option value="Moldova">Moldova</option><br />
                                        <option value="Monaco">Monaco</option><br />
                                        <option value="Mongolia">Mongolia</option><br />
                                        <option value="Montenegro">Montenegro</option><br />
                                        <option value="Montserrat">Montserrat</option><br />
                                        <option value="Morocco">Morocco</option><br />
                                        <option value="Mozambique">Mozambique</option><br />
                                        <option value="Myanmar (Burma)">Myanmar (Burma)</option><br />
                                        <option value="Namibia">Namibia</option><br />
                                        <option value="Nauru">Nauru</option><br />
                                        <option value="Nepal">Nepal</option><br />
                                        <option value="Netherlands">Netherlands</option><br />
                                        <option value="Netherlands Antilles">Netherlands Antilles</option><br />
                                        <option value="New Caledonia">New Caledonia</option><br />
                                        <option value="New Zealand">New Zealand</option><br />
                                        <option value="Nicaragua">Nicaragua</option><br />
                                        <option value="Niger">Niger</option><br />
                                        <option value="Nigeria">Nigeria</option><br />
                                        <option value="Niue">Niue</option><br />
                                        <option value="Norfolk Island">Norfolk Island</option><br />
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option><br />
                                        <option value="North Korea">North Korea</option><br />
                                        <option value="North Macedonia">North Macedonia</option><br />
                                        <option value="Norway">Norway</option><br />
                                        <option value="Oman">Oman</option><br />
                                        <option value="Outlying Oceania">Outlying Oceania</option><br />
                                        <option value="Pakistan">Pakistan</option><br />
                                        <option value="Palau">Palau</option><br />
                                        <option value="Palestinian Territories">Palestinian Territories</option><br />
                                        <option value="Panama">Panama</option><br />
                                        <option value="Papua New Guinea">Papua New Guinea</option><br />
                                        <option value="Paraguay">Paraguay</option><br />
                                        <option value="Peru">Peru</option><br />
                                        <option value="Philippines">Philippines</option><br />
                                        <option value="Pitcairn Islands">Pitcairn Islands</option><br />
                                        <option value="Poland">Poland</option><br />
                                        <option value="Portugal">Portugal</option><br />
                                        <option value="Puerto Rico">Puerto Rico</option><br />
                                        <option value="Qatar">Qatar</option><br />
                                        <option value="Romania">Romania</option><br />
                                        <option value="Russia">Russia</option><br />
                                        <option value="Rwanda">Rwanda</option><br />
                                        <option value="Réunion">Réunion</option><br />
                                        <option value="Samoa">Samoa</option><br />
                                        <option value="San Marino">San Marino</option><br />
                                        <option value="Saudi Arabia">Saudi Arabia</option><br />
                                        <option value="Senegal">Senegal</option><br />
                                        <option value="Serbia">Serbia</option><br />
                                        <option value="Seychelles">Seychelles</option><br />
                                        <option value="Sierra Leone">Sierra Leone</option><br />
                                        <option value="Singapore">Singapore</option><br />
                                        <option value="Sint Maarten">Sint Maarten</option><br />
                                        <option value="Slovakia">Slovakia</option><br />
                                        <option value="Slovenia">Slovenia</option><br />
                                        <option value="Solomon Islands">Solomon Islands</option><br />
                                        <option value="Somalia">Somalia</option><br />
                                        <option value="South Africa">South Africa</option><br />
                                        <option value="South Georgia &amp; South Sandwich Islands">South Georgia &amp;
                                            South Sandwich Islands</option><br />
                                        <option value="South Korea">South Korea</option><br />
                                        <option value="South Sudan">South Sudan</option><br />
                                        <option value="Spain">Spain</option><br />
                                        <option value="Sri Lanka">Sri Lanka</option><br />
                                        <option value="St. Barthélemy">St. Barthélemy</option><br />
                                        <option value="St. Helena">St. Helena</option><br />
                                        <option value="St. Kitts &amp; Nevis">St. Kitts &amp; Nevis</option><br />
                                        <option value="St. Lucia">St. Lucia</option><br />
                                        <option value="St. Martin">St. Martin</option><br />
                                        <option value="St. Pierre &amp; Miquelon">St. Pierre &amp; Miquelon</option>
                                        <br />
                                        <option value="St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines
                                        </option><br />
                                        <option value="Sudan">Sudan</option><br />
                                        <option value="Suriname">Suriname</option><br />
                                        <option value="Svalbard &amp; Jan Mayen">Svalbard &amp; Jan Mayen</option><br />
                                        <option value="Sweden">Sweden</option><br />
                                        <option value="Switzerland">Switzerland</option><br />
                                        <option value="Syria">Syria</option><br />
                                        <option value="São Tomé &amp; Príncipe">São Tomé &amp; Príncipe</option><br />
                                        <option value="Taiwan">Taiwan</option><br />
                                        <option value="Tajikistan">Tajikistan</option><br />
                                        <option value="Tanzania">Tanzania</option><br />
                                        <option value="Thailand">Thailand</option><br />
                                        <option value="Timor-Leste">Timor-Leste</option><br />
                                        <option value="Togo">Togo</option><br />
                                        <option value="Tokelau">Tokelau</option><br />
                                        <option value="Tonga">Tonga</option><br />
                                        <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option><br />
                                        <option value="Tristan da Cunha">Tristan da Cunha</option><br />
                                        <option value="Tunisia">Tunisia</option><br />
                                        <option value="Turkey">Turkey</option><br />
                                        <option value="Turkmenistan">Turkmenistan</option><br />
                                        <option value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands</option>
                                        <br />
                                        <option value="Tuvalu">Tuvalu</option><br />
                                        <option value="U.S. Outlying Islands">U.S. Outlying Islands</option><br />
                                        <option value="U.S. Virgin Islands">U.S. Virgin Islands</option><br />
                                        <option value="Uganda">Uganda</option><br />
                                        <option value="Ukraine">Ukraine</option><br />
                                        <option value="United Arab Emirates">United Arab Emirates</option><br />
                                        <option value="United Kingdom">United Kingdom</option><br />
                                        <option value="United States">United States</option><br />
                                        <option value="Uruguay">Uruguay</option><br />
                                        <option value="Uzbekistan">Uzbekistan</option><br />
                                        <option value="Vanuatu">Vanuatu</option><br />
                                        <option value="Vatican City">Vatican City</option><br />
                                        <option value="Venezuela">Venezuela</option><br />
                                        <option value="Vietnam">Vietnam</option><br />
                                        <option value="Wallis &amp; Futuna">Wallis &amp; Futuna</option><br />
                                        <option value="Western Sahara">Western Sahara</option><br />
                                        <option value="Yemen">Yemen</option><br />
                                        <option value="Zambia">Zambia</option><br />
                                        <option value="Zimbabwe">Zimbabwe</option><br />
                                        <option value="Åland Islands">Åland Islands</option><br />
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="contactus__inputs">
                                        <label for=" " class="form-label">Email ID *</label><br />
                                        <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                name="email" value="" size="40"
                                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control"
                                                aria-required="true" aria-invalid="false" /></span>
                                    </div>
                                </div>

                                <div class="col-md-6"> 
                                    <select class="countrydropdown"><br />
                                        <option selected name="Needservice">Service</option><br />

                                        <option value="Webdev1">Webdev1</option><br />
                                        <option value="Webdev2">Webdev2</option><br />
                                        <option value="Webdev3">Webdev3</option><br />
                                        <option value="Webdev4">Webdev4</option><br />
                                        <option value="Webdev5">Webdev5</option><br />
                                        <option value="Webdev16">Webdev6</option><br />
                                    </select>
                                </div>



                                <div class="contactus__inputs">
                                    <label for=" " class="form-label">Contact Number*</label><br />
                                    <span class="wpcf7-form-control-wrap your-number"><input type="tel" name="number"
                                            value="" size="40" maxlength="10" minlength="10"
                                            class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel form-control"
                                            aria-required="true" aria-invalid="false" /></span>
                                </div>
                            </div>
                            <div class="col-md-6  contactus__inputs">
                                <label for=" " class="form-label">Organization/Institute</label><br />
                                <span class="wpcf7-form-control-wrap organisation"><input type="text"
                                        name="organisation" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                        aria-required="true" aria-invalid="false" /></span>
                            </div>
                            <div class="col-md-6  contactus__inputs">
                                <label for=" " class="form-label">Testform</label><br />
                                <span class="wpcf7-form-control-wrap organisation"><input type="text" name="testform"
                                        value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                        aria-required="true" aria-invalid="false" /></span>
                            </div>
                            <div class="col-md-12">
                                <div class="contactus__inputs">
                                    <label for=" " class="form-label">How Can We Help You?</label><br />
                                    <span class="wpcf7-form-control-wrap helpstatement"><input type="text"
                                            name="helpstatement" value="" size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                            aria-required="true" aria-invalid="false" /></span>
                                </div>
                            </div>
                            <div class="col-md-12 contactus__inputs mb-0">
                                <div class="contactus__checkbox">
                                    <span class="wpcf7-form-control-wrap agree-privacy-policy"><span
                                            class="wpcf7-form-control wpcf7-checkbox wpcf7-validates-as-required form-check-input"
                                            id="flexCheckDefault"><span class="wpcf7-list-item first last"><label>
                                                    <input type="checkbox" checked name="agree-privacy-policy[]"
                                                        value="I agree to the privacy policy." /><span
                                                        class="wpcf7-list-item-label">I agree to the privacy
                                                        policy.</span></label></span></span></span> <label for=" "
                                        class="form label"></label>
                                </div>
                            </div>
                            <div class="col-md-12 contactus__inputs direct-email">
                                You can also email us directly at <a
                                    href="mailto:info@infyglobe.com">info@infyglobe.com</a>
                            </div>

                            <div class="mb-3">

                            </div>
                            <div class="col-md-4">
                                <div class="submit-btn-wdth submit-btn-outer">
                                    <input type="submit" value="Submit"
                                        class="wpcf7-form-control has-spinner wpcf7-submit w-100 d-flex align-items-center justify-content-between btn contactform__submitbtn btn--primary" /><span
                                        class="icon-arrow"></span>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12 contactus__inputs mt-5">
                            <p>By Clicking "Submit", I agree to receive promotional and marketing material.</p>
                            <p>Note: We will treat any information you submit with us as confidential.</p>
                            <p>Please read our Privacy Policy for additional information.</p>
                        </div>
                    </div>
                </div>
    </div>
    </div>
    </section>




    <section class="worldwideoffice">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="worldwideoffice__title">Worldwide offices</h2>
                    <p class="worldwideoffice__explore">Explore our service offerings and subsidiaries in specific
                        geographies.</p>
                </div>

                <div class="col-md-6">
                    <div class="d-none d-lg-block">

                        <div class="worldwideoffice__wordwidetext">
                            <div class="d-flex flex-column">
                                <span class="location__title worldwideoffice__locationtitle">21</span>
                                <span class="location__offices worldwideoffice__offices">Offices</span>
                            </div>

                            <p class="worldwideoffice__para location__officespara">
                                Across 10+ territories with 4,000+ global
                                workforce
                            </p>


                        </div>

                        <div></div>
                    </div>
                </div>

                <div class="location__maparea worldwideoffice__maparea col-md-12">
                    <ul class="nav nav-tabs responsive" id="location_tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="india-tab" data-bs-toggle="tab" data-bs-target="#india"
                                type="button" role="tab" aria-controls="india" aria-selected="false">India</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="asia-pacific-tab" data-bs-toggle="tab"
                                data-bs-target="#asia-pacific" type="button" role="tab" aria-controls="asia-pacific"
                                aria-selected="false">Asia Pacific</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="middle-east-tab" data-bs-toggle="tab"
                                data-bs-target="#middle-east" type="button" role="tab" aria-controls="middle-east"
                                aria-selected="false">Middle East</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="europe-tab" data-bs-toggle="tab" data-bs-target="#europe"
                                type="button" role="tab" aria-controls="europe" aria-selected="false">Europe</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="north-america-tab" data-bs-toggle="tab"
                                data-bs-target="#north-america" type="button" role="tab" aria-controls="north-america"
                                aria-selected="false">North America</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="south-america-tab" data-bs-toggle="tab"
                                data-bs-target="#south-america" type="button" role="tab" aria-controls="south-america"
                                aria-selected="false">South America</button>
                        </li>

                    </ul>
                    <div class="tab-content responsive">


                        <div class="tab-pane active" id="india" role="tabpanel" aria-labelledby="europe-tab">


                            <div class="contactus__tabs">
                                <div class="row row-40">

                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Dadar, Mumbai (Headquarters)</h3>
                                            <p class="worldwideoffice__adrees">The Ruby Tower, Senapati Bapat Marg,
                                                Dadar West, Mumbai, Maharashtra 400028</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Parel, Mumbai</h3>
                                            <p class="worldwideoffice__adrees">Business Arcade, Sayani Road, Opp. S. T
                                                Bus Stand, Lower Parel, Mumbai, Maharashtra 400013</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Rabale, Mumbai</h3>
                                            <p class="worldwideoffice__adrees">Sigma IT Park, Unit No. 501, TTC
                                                Industrial Area, Rabale, Navi Mumbai, Maharashtra 400701</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Pune</h3>
                                            <p class="worldwideoffice__adrees">IT-09, 10th Floor, Blue Ridge SEZ,
                                                Hinjewadi, Pune, Maharashtra 411057</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Noida</h3>
                                            <p class="worldwideoffice__adrees">WorkEdge Coworx - Coworking Noida, B 23,
                                                Sector 63 Road, B Block, Sector 63, Noida, Uttar Pradesh 201301</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Ahmedabad</h3>
                                            <p class="worldwideoffice__adrees">WestGate, True Value, Block-E, 5th Floor,
                                                Near YMCA Club, SG Road, Ahmedabad 380015 Gujarat, India.</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Indore</h3>
                                            <p class="worldwideoffice__adrees">Virtual Co-Works, 41-42, First Floor,
                                                Pu4, Scheme No. 54, Vijay Nagar, Indore, Madhya Pradesh 452010</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Bengaluru</h3>
                                            <p class="worldwideoffice__adrees">Novel MSR Building, Subbaiah Reddy
                                                Colony, Marathahalli Village, Marathahalli, Bengaluru, Karnataka -
                                                560037</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Kolkata</h3>
                                            <p class="worldwideoffice__adrees">Technopolis Building 11th floor HCHQ+V3X,
                                                Street Number 1, BP Block, Sector V, Bidhannagar, Kolkata, West Bengal
                                                700091</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Chennai</h3>
                                            <p class="worldwideoffice__adrees">Awfis Primus, 1st Floor, Door No. SP–7A,
                                                Guindy Industrial Estate, SIDCO, Industrial Estate, Guindy, Chennai,
                                                Tamil Nadu, 600032</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Hyderabad</h3>
                                            <p class="worldwideoffice__adrees">N-Heights buildings ,AWFIS, 6th floor
                                                Siddiq Nagar, , HITEC City, Hyderabad, Telangana 500081</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="asia-pacific" role="tabpanel" aria-labelledby="europe-tab">


                            <div class="contactus__tabs">
                                <div class="row row-40">

                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Singapore</h3>
                                            <p class="worldwideoffice__adrees">52C Hume Avenue, #06-17 The Summerhill,
                                                Singapore 596230</p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Australia</h3>
                                            <p class="worldwideoffice__adrees">152 Elizabeth Street Melbourne, VIC 3000
                                            </p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="middle-east" role="tabpanel" aria-labelledby="europe-tab">


                            <div class="contactus__tabs">
                                <div class="row row-40">

                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Dubai</h3>
                                            <p class="worldwideoffice__adrees">6th Floor, Latifa Tower, Sheikh Zayed
                                                Road,
                                                Opp. Dubai World Trade Centre,
                                                Dubai, United Arab Emirates.</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="europe" role="tabpanel" aria-labelledby="europe-tab">


                            <div class="contactus__tabs">
                                <div class="row row-40">

                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Sweden</h3>
                                            <p class="worldwideoffice__adrees">Gamla Brogatan 19, 111 20 Stockholm<span
                                                    class="address2">Doebelnsgatan 12, SE-903 30, Umea</span></p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Germany</h3>
                                            <p class="worldwideoffice__adrees">Magdalene-Schoch-Str. 5 97074 Würzburg
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>UK</h3>
                                            <p class="worldwideoffice__adrees">21, Christopher Road, Selly Oak,
                                                Birmingham, B29 6QJ</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="north-america" role="tabpanel" aria-labelledby="europe-tab">


                            <div class="contactus__tabs">
                                <div class="row row-40">

                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>USA</h3>
                                            <p class="worldwideoffice__adrees">1207 Delaware Ave Suite 3411 Wilmington,
                                                DE 19806</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="south-america" role="tabpanel" aria-labelledby="europe-tab">


                            <div class="contactus__tabs">
                                <div class="row row-40">

                                    <div class="col-md-3 worldwideoffice__mb-60">
                                        <div class="bg-light worldwideoffice__officeadress">

                                            <h3>Argentina</h3>
                                            <p class="worldwideoffice__adrees">Av. Constitucion 910 5 S. Pa, Rio Cuarto,
                                                Cordoba, Argentina</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="worldwideoffice__addressmobile">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading1">
                                <a class="accordion-button  section_description mb-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1">
                                    India </a>
                            </h4>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body worldwideoffice__sliderpoffice">
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Dadar, Mumbai (Headquarters)</h4>

                                        <p>The Ruby Tower, Senapati Bapat Marg, Dadar West, Mumbai, Maharashtra 400028
                                        </p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Parel, Mumbai</h4>

                                        <p>Business Arcade, Sayani Road, Opp. S. T Bus Stand, Lower Parel, Mumbai,
                                            Maharashtra 400013</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Rabale, Mumbai</h4>

                                        <p>Sigma IT Park, Unit No. 501, TTC Industrial Area, Rabale, Navi Mumbai,
                                            Maharashtra 400701</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Pune</h4>

                                        <p>IT-09, 10th Floor, Blue Ridge SEZ, Hinjewadi, Pune, Maharashtra 411057</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Noida</h4>

                                        <p>WorkEdge Coworx - Coworking Noida, B 23, Sector 63 Road, B Block, Sector 63,
                                            Noida, Uttar Pradesh 201301</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Ahmedabad</h4>

                                        <p>WestGate, True Value, Block-E, 5th Floor, Near YMCA Club, SG Road, Ahmedabad
                                            380015 Gujarat, India.</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Indore</h4>

                                        <p>Virtual Co-Works, 41-42, First Floor, Pu4, Scheme No. 54, Vijay Nagar,
                                            Indore, Madhya Pradesh 452010</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Bengaluru</h4>

                                        <p>Novel MSR Building, Subbaiah Reddy Colony, Marathahalli Village,
                                            Marathahalli, Bengaluru, Karnataka - 560037</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Kolkata</h4>

                                        <p>Technopolis Building 11th floor HCHQ+V3X, Street Number 1, BP Block, Sector
                                            V, Bidhannagar, Kolkata, West Bengal 700091</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Chennai</h4>

                                        <p>Awfis Primus, 1st Floor, Door No. SP–7A, Guindy Industrial Estate, SIDCO,
                                            Industrial Estate, Guindy, Chennai, Tamil Nadu, 600032</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Hyderabad</h4>

                                        <p>N-Heights buildings ,AWFIS, 6th floor Siddiq Nagar, , HITEC City, Hyderabad,
                                            Telangana 500081</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading2">
                                <a class="accordion-button collapsed section_description mb-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                    aria-controls="collapse2">
                                    Asia Pacific </a>
                            </h4>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body worldwideoffice__sliderpoffice">
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Singapore</h4>

                                        <p>52C Hume Avenue, #06-17 The Summerhill, Singapore 596230</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Australia</h4>

                                        <p>152 Elizabeth Street Melbourne, VIC 3000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading3">
                                <a class="accordion-button collapsed section_description mb-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                                    aria-controls="collapse3">
                                    Middle East </a>
                            </h4>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body worldwideoffice__sliderpoffice">
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Dubai</h4>

                                        <p>6th Floor, Latifa Tower, Sheikh Zayed Road,
                                            Opp. Dubai World Trade Centre,
                                            Dubai, United Arab Emirates.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading4">
                                <a class="accordion-button collapsed section_description mb-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                    aria-controls="collapse4">
                                    Europe </a>
                            </h4>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body worldwideoffice__sliderpoffice">
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Sweden</h4>

                                        <p>Gamla Brogatan 19, 111 20 Stockholm<span class="address2">Doebelnsgatan 12,
                                                SE-903 30, Umea</span></p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Germany</h4>

                                        <p>Magdalene-Schoch-Str. 5 97074 Würzburg</p>
                                    </div>
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>UK</h4>

                                        <p>21, Christopher Road, Selly Oak, Birmingham, B29 6QJ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading5">
                                <a class="accordion-button collapsed section_description mb-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false"
                                    aria-controls="collapse5">
                                    North America </a>
                            </h4>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body worldwideoffice__sliderpoffice">
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>USA</h4>

                                        <p>1207 Delaware Ave Suite 3411 Wilmington, DE 19806</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="heading6">
                                <a class="accordion-button collapsed section_description mb-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false"
                                    aria-controls="collapse6">
                                    South America </a>
                            </h4>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body worldwideoffice__sliderpoffice">
                                    <div class="worldwideoffice__officebody worldwideoffice__officeadress">
                                        <h4>Argentina</h4>

                                        <p>Av. Constitucion 910 5 S. Pa, Rio Cuarto, Cordoba, Argentina</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="d-block d-lg-none">

                        <div class="worldwideoffice__wordwidetext">
                            <div class="d-flex flex-column">
                                <span class="location__title worldwideoffice__locationtitle">21</span>
                                <span class="location__offices worldwideoffice__offices">Offices</span>
                            </div>

                            <p class="worldwideoffice__para location__officespara">
                                Across 10+ territories with<br> 4,000+ global
                                workforce
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    </main>

    <script>
        const form = document.getElementById('contactlist');
        const result = document.getElementById('result');

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            const object = Object.fromEntries(formData);
            const json = JSON.stringify(object);
            result.innerHTML = "Please wait..."

            fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: json
            })
                .then(async (response) => {
                    let json = await response.json();
                    console.log('json',json);
                    if (response.status == 200) {
                        result.innerHTML = json.message;
                    } else {
                        console.log(response);
                        result.innerHTML = json.message;
                    }
                })
                .catch(error => {
                    console.log(error);
                    result.innerHTML = "Something went wrong!";
                })
                .then(function () {
                    form.reset();
                    setTimeout(() => {
                        result.style.display = "none";
                    
                    }, 3000);
                });
        });
    </script>

    <script type="rocketlazyloadscript">
// jQuery(document).ready(function() {
//     jQuery('.wpcf7-form-control.wpcf7-checkbox.wpcf7-validates-as-required.wpcf7-not-valid  input:checkbox')
//         .addClass("form-check-input");
//     jQuery('.wpcf7-form-control.wpcf7-checkbox.wpcf7-validates-as-required.wpcf7-not-valid').removeClass(
//         "form-check-input");

// });


jQuery(document).ready(function() {
    jQuery('.wpcf7-validates-as-required  input:checkbox').addClass("form-check-input");
    jQuery('.wpcf7-form-control').removeClass(
        "form-check-input");

});

jQuery(document).ready(function() {
    jQuery(".worldwideoffice__sliderpoffice .slick-dots").addClass("container");

});

jQuery(document).ready(function() {
    jQuery('.accordion-button').on('click', function(e) {
        jQuery(this).parents().eq(1).find('.accordion-body').slick("refresh");
    })
})
</script>


    <footer class="footer footersection">
        <div class="container">
            <div class="row">
                <div class="footersection__sectioncontainer d-flex">
                    <div
                        class="footersection__firstsection d-flex align-items-start justify-content-between flex-column footersection__list">

                        <div class="logo-wrapper">
                            <a class="" href="index.html">
                                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="" class="logo-img" data-lazy-src="./Assets/Images/infiglobe-logo.png"
                                    loading="lazy" alt="" class=""></noscript>
                            </a>
                            <div class="great-place-logo">
                                <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="" class="img-fluid"
                                    data-lazy-src="https://www.neosofttech.com/wp-content/uploads/2024/01/GPTW-logo.svg" /><noscript><img
                                        src="https://www.neosofttech.com/wp-content/uploads/2024/01/GPTW-logo.svg"
                                        alt="" class="img-fluid" /></noscript>
                            </div>
                        </div>
                    </div>
                    <div class="footersection__secondsection d-flex  justify-content-between">
                        <ul class="footer_bottom footersection__footerbottom footersection__footercenter pb-4">
                            <li class="footer_menu_title">Our Company</li>
                            <li><a href="about-us.html">About us</a></li>
                            <li><a href="industries.html">Industries</a></li>

                            <li><a href="carreers.html">Careers</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                            <li class="footer_menu_title">Resources</li>
                            <li><a href="blogs.html">Blogs</a></li>
                        </ul>
                        <ul class="footersection__footerbottom pb-4 footersection__footercenter">
                            <li class="footer_menu_title">Services</li>
                            <li><a href="digitaltransformation.html">Digital Transformation</a></li>
                            <li><a href="team-augmentaion.html">Team Augmentation</a></li>
                            <li><a href="product-development.html">Product Engineering</a></li>
                            <li><a href="appdevelopment.html">Application Development</a></li>
                            <li><a href="innovation-lab.html">Innovation Lab</a></li>
                            <li><a href="ui-ux.html">UI/UX</a></li>
                            <li><a href="artificial-intelligence.html">Artificial Intelligence (AI)</a></li>
                            <li><a href="internet-of-things.html">Internet of Things (IoT)</a></li>
                            <li><a href="blockchain.html">Blockchain</a></li>
                            <li><a href="data-science.html">Data Science</a></li>
                            <li><a href="bigdata.html">Big Data &amp; Analytics</a></li>
                            <li><a href="devops.html">DevOps</a></li>
                            <li><a href="ims.html">IMS</a></li>
                            <li><a href="quality-engineering.html">Quality Engineering</a></li>
                            <li><a href="cloud-computing.html">Cloud Services</a></li>
                        </ul>
                        <ul class="footersection__footerbottom pb-4">
                            <li class="footer_menu_title">Solutions</li>
                            <li><a href="ecommerce.html">eCommerce</a></li>
                            <li><a href="crm.html">CRM</a></li>
                            <li><a href="content-management-system-cms.html">CMS</a></li>
                            <li><a href="robotic-process-automation-rpa.html">RPA</a></li>
                            <li><a href="sap.html">SAP</a></li>
                            <li><a href="enterprise-resource-planing-erp.html">ERP</a></li>
                        </ul>
                    </div>
                    <div class="footersection__thirdsection d-flex align-items-center  flex-column">
                        <div>
                            <h5 class="footersection__brandtitle">Our Brands</h5>
                            <p></p>
                        </div>
                        <ul class="footersection__brand">
                            <li><a target="_blank" href="#"><img src="./Assets/Images/c5.png" style="height: 6rem;"
                                        alt="S4S"></a>
                            </li>
                            <li><a target="_blank" href="#"><img src="./Assets/Images/q-logo.png" alt="Neo Smile"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="ecoengine" id="eco__engine"><div class="ns-eco">
<div class="eco__button">
<ul>
<li>
                                    <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="eco-icon" class="eco-icon" data-lazy-src="/wp-content/uploads/2022/05/eco_icon.png"><noscript><img src="/wp-content/uploads/2022/05/eco_icon.png" alt="eco-icon" class="eco-icon"></noscript>
                                </li>
<li>
                                    <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="eco-icon" class="eco-icon" data-lazy-src="/wp-content/uploads/2022/05/eco_icon.png"><noscript><img src="/wp-content/uploads/2022/05/eco_icon.png" alt="eco-icon" class="eco-icon"></noscript>
                                </li>
<li>
                                    <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="eco-icon" class="eco-icon" data-lazy-src="/wp-content/uploads/2022/05/eco_icon.png"><noscript><img src="/wp-content/uploads/2022/05/eco_icon.png" alt="eco-icon" class="eco-icon"></noscript>
                                </li>
</ul>
</div>
<div class="icon" id="ecoengine__icon">
                            <img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="eco-icon" class="eco-icon" data-lazy-src="/wp-content/uploads/2022/05/eco_icon.png"><noscript><img src="/wp-content/uploads/2022/05/eco_icon.png" alt="eco-icon" class="eco-icon"></noscript><p></p>
<p class="eco-engine">ECO<br>ENGINE</p>
<p class="knowmore">Know More <span class="icon-arrow"></span></p>
<p></p>
</div>
</div>
<div class="ns-eco1">
<div class="icon2">
<img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" alt="eco-icon" class="eco-icon" data-lazy-src="/wp-content/uploads/2022/06/code.svg"><noscript><img src="/wp-content/uploads/2022/06/code.svg" alt="eco-icon" class="eco-icon"></noscript><p></p>
<p class="eco-engine1">Total Lines<br>of Code
                            </p>
</div>
</div></div> -->

                </div>

                <div class="social-media-icons footersection__socialmedia pb-4">
                    <ul class="d-flex">
                        <li><a target="_blank" href="#"><img
                                    src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="facebook" data-lazy-src="./Assets/Images/fb.svg"><noscript><img
                                        src="./Assets/Images/fb.svg" loading="lazy" alt="facebook"></noscript></a></li>
                        <li><a target="_blank" href="#"><img
                                    src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="LinkedIn" data-lazy-src="./Assets/Images/linkedin.svg"><noscript><img
                                        src="./Assets/Images/linkedin.svg" loading="lazy" alt="LinkedIn"></noscript></a>
                        </li>
                        <li><a target="_blank" href="#"><img
                                    src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="YouTube Link" data-lazy-src="./Assets/Images/you-tube.svg"><noscript><img
                                        src="./Assets/Images/you-tube.svg" loading="lazy"
                                        alt="YouTube Link"></noscript></a></li>
                        <li><a target="_blank" href="#"><img
                                    src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E"
                                    alt="Instagram Link" data-lazy-src="./Assets/Images/instagram.svg"><noscript><img
                                        src="./Assets/Images/instagram.svg" loading="lazy"
                                        alt="Instagram Link"></noscript></a></li>
                    </ul>
                </div>
                <div class="col-md-12 footersection__copyright">
                    <p> Copyright © 2022 InfyGlobe Pvt. Ltd. 2024</p>
                </div>
            </div>
        </div>
    </footer>

    </div><!-- #page -->

    <!--googleoff: all-->
    <div id="cookie-law-info-bar" data-nosnippet="true"><span>
            <div class="cli-bar-container cli-style-v2">
                <div class="cli-bar-message">We use cookies on our website to give you the most relevant experience by
                    remembering your preferences and repeat visits. By clicking “Accept All”, you consent to the use of
                    ALL the cookies. However, you may visit "Cookie Settings" to provide a controlled consent.</div>
                <div class="cli-bar-btn_container"><a role='button'
                        class="medium cli-plugin-button cli-plugin-main-button cli_settings_button"
                        style="margin:0px 5px 0px 0px">Cookie Settings</a><a id="wt-cli-accept-all-btn" role='button'
                        data-cli_action="accept_all"
                        class="wt-cli-element medium cli-plugin-button wt-cli-accept-all-btn cookie_action_close_header cli_action_button">Accept
                        All</a></div>
            </div>
        </span></div>
    <div id="cookie-law-info-again" data-nosnippet="true"><span id="cookie_hdr_showagain">Manage consent</span></div>
    <div class="cli-modal" data-nosnippet="true" id="cliSettingsPopup" tabindex="-1" role="dialog"
        aria-labelledby="cliSettingsPopup" aria-hidden="true">
        <div class="cli-modal-dialog" role="document">
            <div class="cli-modal-content cli-bar-popup">
                <button type="button" class="cli-modal-close" id="cliModalClose">
                    <svg class="" viewbox="0 0 24 24">
                        <path
                            d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z">
                        </path>
                        <path d="M0 0h24v24h-24z" fill="none"></path>
                    </svg>
                    <span class="wt-cli-sr-only">Close</span>
                </button>
                <div class="cli-modal-body">
                    <div class="cli-container-fluid cli-tab-container">
                        <div class="cli-row">
                            <div class="cli-col-12 cli-align-items-stretch cli-px-0">
                                <div class="cli-privacy-overview">
                                    <h4>Privacy Overview</h4>
                                    <div class="cli-privacy-content">
                                        <div class="cli-privacy-content-text">This website uses cookies to improve your
                                            experience while you navigate through the website. Out of these, the cookies
                                            that are categorized as necessary are stored on your browser as they are
                                            essential for the working of basic functionalities of the website. We also
                                            use third-party cookies that help us analyze and understand how you use this
                                            website. These cookies will be stored in your browser only with your
                                            consent. You also have the option to opt-out of these cookies. But opting
                                            out of some of these cookies may affect your browsing experience.</div>
                                    </div>
                                    <a class="cli-privacy-readmore" aria-label="Show more" role="button"
                                        data-readmore-text="Show more" data-readless-text="Show less"></a>
                                </div>
                            </div>
                            <div class="cli-col-12 cli-align-items-stretch cli-px-0 cli-tab-section-container">
                                <div class="cli-tab-section">
                                    <div class="cli-tab-header">
                                        <a role="button" tabindex="0" class="cli-nav-link cli-settings-mobile"
                                            data-target="necessary" data-toggle="cli-toggle-tab">
                                            Necessary </a>
                                        <div class="wt-cli-necessary-checkbox">
                                            <input type="checkbox" class="cli-user-preference-checkbox"
                                                id="wt-cli-checkbox-necessary" data-id="checkbox-necessary"
                                                checked="checked" />
                                            <label class="form-check-label"
                                                for="wt-cli-checkbox-necessary">Necessary</label>
                                        </div>
                                        <span class="cli-necessary-caption">Always Enabled</span>
                                    </div>
                                    <div class="cli-tab-content">
                                        <div class="cli-tab-pane cli-fade" data-id="necessary">
                                            <div class="wt-cli-cookie-description">
                                                Necessary cookies are absolutely essential for the website to function
                                                properly. These cookies ensure basic functionalities and security
                                                features of the website, anonymously.
                                                <table class="cookielawinfo-row-cat-table cookielawinfo-winter">
                                                    <thead>
                                                        <tr>
                                                            <th class="cookielawinfo-column-1">Cookie</th>
                                                            <th class="cookielawinfo-column-3">Duration</th>
                                                            <th class="cookielawinfo-column-4">Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="cookielawinfo-row">
                                                            <td class="cookielawinfo-column-1">
                                                                cookielawinfo-checkbox-analytics</td>
                                                            <td class="cookielawinfo-column-3">11 months</td>
                                                            <td class="cookielawinfo-column-4">This cookie is set by
                                                                GDPR Cookie Consent plugin. The cookie is used to store
                                                                the user consent for the cookies in the category
                                                                "Analytics".</td>
                                                        </tr>
                                                        <tr class="cookielawinfo-row">
                                                            <td class="cookielawinfo-column-1">
                                                                cookielawinfo-checkbox-functional</td>
                                                            <td class="cookielawinfo-column-3">11 months</td>
                                                            <td class="cookielawinfo-column-4">The cookie is set by GDPR
                                                                cookie consent to record the user consent for the
                                                                cookies in the category "Functional".</td>
                                                        </tr>
                                                        <tr class="cookielawinfo-row">
                                                            <td class="cookielawinfo-column-1">
                                                                cookielawinfo-checkbox-necessary</td>
                                                            <td class="cookielawinfo-column-3">11 months</td>
                                                            <td class="cookielawinfo-column-4">This cookie is set by
                                                                GDPR Cookie Consent plugin. The cookies is used to store
                                                                the user consent for the cookies in the category
                                                                "Necessary".</td>
                                                        </tr>
                                                        <tr class="cookielawinfo-row">
                                                            <td class="cookielawinfo-column-1">
                                                                cookielawinfo-checkbox-others</td>
                                                            <td class="cookielawinfo-column-3">11 months</td>
                                                            <td class="cookielawinfo-column-4">This cookie is set by
                                                                GDPR Cookie Consent plugin. The cookie is used to store
                                                                the user consent for the cookies in the category "Other.
                                                            </td>
                                                        </tr>
                                                        <tr class="cookielawinfo-row">
                                                            <td class="cookielawinfo-column-1">
                                                                cookielawinfo-checkbox-performance</td>
                                                            <td class="cookielawinfo-column-3">11 months</td>
                                                            <td class="cookielawinfo-column-4">This cookie is set by
                                                                GDPR Cookie Consent plugin. The cookie is used to store
                                                                the user consent for the cookies in the category
                                                                "Performance".</td>
                                                        </tr>
                                                        <tr class="cookielawinfo-row">
                                                            <td class="cookielawinfo-column-1">viewed_cookie_policy</td>
                                                            <td class="cookielawinfo-column-3">11 months</td>
                                                            <td class="cookielawinfo-column-4">The cookie is set by the
                                                                GDPR Cookie Consent plugin and is used to store whether
                                                                or not user has consented to the use of cookies. It does
                                                                not store any personal data.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cli-tab-section">
                                    <div class="cli-tab-header">
                                        <a role="button" tabindex="0" class="cli-nav-link cli-settings-mobile"
                                            data-target="functional" data-toggle="cli-toggle-tab">
                                            Functional </a>
                                        <div class="cli-switch">
                                            <input type="checkbox" id="wt-cli-checkbox-functional"
                                                class="cli-user-preference-checkbox" data-id="checkbox-functional" />
                                            <label for="wt-cli-checkbox-functional" class="cli-slider"
                                                data-cli-enable="Enabled" data-cli-disable="Disabled"><span
                                                    class="wt-cli-sr-only">Functional</span></label>
                                        </div>
                                    </div>
                                    <div class="cli-tab-content">
                                        <div class="cli-tab-pane cli-fade" data-id="functional">
                                            <div class="wt-cli-cookie-description">
                                                Functional cookies help to perform certain functionalities like sharing
                                                the content of the website on social media platforms, collect feedbacks,
                                                and other third-party features.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cli-tab-section">
                                    <div class="cli-tab-header">
                                        <a role="button" tabindex="0" class="cli-nav-link cli-settings-mobile"
                                            data-target="performance" data-toggle="cli-toggle-tab">
                                            Performance </a>
                                        <div class="cli-switch">
                                            <input type="checkbox" id="wt-cli-checkbox-performance"
                                                class="cli-user-preference-checkbox" data-id="checkbox-performance" />
                                            <label for="wt-cli-checkbox-performance" class="cli-slider"
                                                data-cli-enable="Enabled" data-cli-disable="Disabled"><span
                                                    class="wt-cli-sr-only">Performance</span></label>
                                        </div>
                                    </div>
                                    <div class="cli-tab-content">
                                        <div class="cli-tab-pane cli-fade" data-id="performance">
                                            <div class="wt-cli-cookie-description">
                                                Performance cookies are used to understand and analyze the key
                                                performance indexes of the website which helps in delivering a better
                                                user experience for the visitors.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cli-tab-section">
                                    <div class="cli-tab-header">
                                        <a role="button" tabindex="0" class="cli-nav-link cli-settings-mobile"
                                            data-target="analytics" data-toggle="cli-toggle-tab">
                                            Analytics </a>
                                        <div class="cli-switch">
                                            <input type="checkbox" id="wt-cli-checkbox-analytics"
                                                class="cli-user-preference-checkbox" data-id="checkbox-analytics" />
                                            <label for="wt-cli-checkbox-analytics" class="cli-slider"
                                                data-cli-enable="Enabled" data-cli-disable="Disabled"><span
                                                    class="wt-cli-sr-only">Analytics</span></label>
                                        </div>
                                    </div>
                                    <div class="cli-tab-content">
                                        <div class="cli-tab-pane cli-fade" data-id="analytics">
                                            <div class="wt-cli-cookie-description">
                                                Analytical cookies are used to understand how visitors interact with the
                                                website. These cookies help provide information on metrics the number of
                                                visitors, bounce rate, traffic source, etc.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cli-tab-section">
                                    <div class="cli-tab-header">
                                        <a role="button" tabindex="0" class="cli-nav-link cli-settings-mobile"
                                            data-target="advertisement" data-toggle="cli-toggle-tab">
                                            Advertisement </a>
                                        <div class="cli-switch">
                                            <input type="checkbox" id="wt-cli-checkbox-advertisement"
                                                class="cli-user-preference-checkbox" data-id="checkbox-advertisement" />
                                            <label for="wt-cli-checkbox-advertisement" class="cli-slider"
                                                data-cli-enable="Enabled" data-cli-disable="Disabled"><span
                                                    class="wt-cli-sr-only">Advertisement</span></label>
                                        </div>
                                    </div>
                                    <div class="cli-tab-content">
                                        <div class="cli-tab-pane cli-fade" data-id="advertisement">
                                            <div class="wt-cli-cookie-description">
                                                Advertisement cookies are used to provide visitors with relevant ads and
                                                marketing campaigns. These cookies track visitors across websites and
                                                collect information to provide customized ads.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cli-tab-section">
                                    <div class="cli-tab-header">
                                        <a role="button" tabindex="0" class="cli-nav-link cli-settings-mobile"
                                            data-target="others" data-toggle="cli-toggle-tab">
                                            Others </a>
                                        <div class="cli-switch">
                                            <input type="checkbox" id="wt-cli-checkbox-others"
                                                class="cli-user-preference-checkbox" data-id="checkbox-others" />
                                            <label for="wt-cli-checkbox-others" class="cli-slider"
                                                data-cli-enable="Enabled" data-cli-disable="Disabled"><span
                                                    class="wt-cli-sr-only">Others</span></label>
                                        </div>
                                    </div>
                                    <div class="cli-tab-content">
                                        <div class="cli-tab-pane cli-fade" data-id="others">
                                            <div class="wt-cli-cookie-description">
                                                Other uncategorized cookies are those that are being analyzed and have
                                                not been classified into a category as yet.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cli-modal-footer">
                    <div class="wt-cli-element cli-container-fluid cli-tab-container">
                        <div class="cli-row">
                            <div class="cli-col-12 cli-align-items-stretch cli-px-0">
                                <div class="cli-tab-footer wt-cli-privacy-overview-actions">

                                    <a id="wt-cli-privacy-save-btn" role="button" tabindex="0" data-cli-action="accept"
                                        class="wt-cli-privacy-btn cli_setting_save_button wt-cli-privacy-accept-btn cli-btn">SAVE
                                        &amp; ACCEPT</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cli-modal-backdrop cli-fade cli-settings-overlay"></div>
    <div class="cli-modal-backdrop cli-fade cli-popupbar-overlay"></div>
    <!--googleon: all-->
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript">
        var wpcf7Elm = document.querySelector('.wpcf7');
        jQuery(wpcf7Elm).submit(function() {
            jQuery(".wpcf7-response-output").hide();
            jQuery(this).find(':input[type=submit]').prop('disabled', true);
            wpcf7Elm.addEventListener('wpcf7submit', function(event) {
                jQuery(this).find(':input[type=submit]').prop('disabled', false);                
                jQuery(this).find(".wpcf7-response-output").show();

            }, false);
            wpcf7Elm.addEventListener('wpcf7invalid', function() {
                jQuery(this).find(':input[type=submit]').prop('disabled', false);                jQuery(this).find(".wpcf7-response-output").show();

            }, false);
        });
    </script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript">
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        if ( ('363' == event.detail.contactFormId) || ('107' == event.detail.contactFormId) ) {
            jQuery("#myModal2").css("display","block");
            $("#country").val("").trigger("change");
        }
    }, false );
</script>
    <script type="rocketlazyloadscript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '10206' == event.detail.contactFormId ) {
        location = 'https://www.neosofttech.com/campaign/thank-you/';
    }else {
        location = 'https://www.neosofttech.com/thankyou/';
    }
}, false );
</script>
    <link data-minify="1" rel='stylesheet' id='cookie-law-info-table-css'
        href='https://www.neosofttech.com/wp-content/cache/min/1/wp-content/plugins/cookie-law-info/public/css/cookie-law-info-table.css?ver=1706686329'
        media='all' />
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-includes/js/dist/vendor/regenerator-runtime.min.js' defer='defer'
        id='regenerator-runtime-js'></script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-includes/js/dist/vendor/wp-polyfill.min.js'
        defer='defer' id='wp-polyfill-js'></script>
    <script id='contact-form-7-js-extra'>
        var wpcf7 = { "api": { "root": "https:\/\/www.neosofttech.com\/wp-json\/", "namespace": "contact-form-7\/v1" }, "cached": "1" };
    </script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/plugins/contact-form-7/includes/js/index.js' defer='defer'
        id='contact-form-7-js'></script>
    <script type="rocketlazyloadscript" id='rocket-browser-checker-js-after'>
"use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return _createClass(RocketBrowserCompatibilityChecker,[{key:"_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener("test",null,options),window.removeEventListener("test",null,options)}catch(err){self.passiveSupported=!1}}},{key:"initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key:"isDataSaverModeOn",value:function(){return"connection"in navigator&&!0===navigator.connection.saveData}},{key:"supportsLinkPrefetch",value:function(){var elem=document.createElement("link");return elem.relList&&elem.relList.supports&&elem.relList.supports("prefetch")&&window.IntersectionObserver&&"isIntersecting"in IntersectionObserverEntry.prototype}},{key:"isSlowConnection",value:function(){return"connection"in navigator&&"effectiveType"in navigator.connection&&("2g"===navigator.connection.effectiveType||"slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}();
</script>
    <script id='rocket-preload-links-js-extra'>
        var RocketPreloadLinksConfig = { "excludeUris": "\/clientele\/|\/outsource-software-development\/|\/outsource-software-development-uae\/|\/(?:.+\/)?feed(?:\/(?:.+\/?)?)?$|\/(?:.+\/)?embed\/|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/refer\/|\/go\/|\/recommend\/|\/recommends\/", "usesTrailingSlash": "1", "imageExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|pdf|doc|docx|xls|xlsx|php", "fileExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|pdf|doc|docx|xls|xlsx|php|html|htm", "siteUrl": "https:\/\/www.neosofttech.com", "onHoverDelay": "100", "rateThrottle": "3" };
    </script>
    <script type="rocketlazyloadscript" id='rocket-preload-links-js-after'>
(function() {
"use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return e(n,[{key:"init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris,"i"),images:RegExp(".("+this.config.imageExt+")$","i"),fileExt:RegExp(".("+this.config.fileExt+")$","i")},this._initListeners(this))}},{key:"_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener("mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener("mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener("touchstart",e.listener.bind(e),e.listenerOptions)}},{key:"listener",value:function(e){var t=e.target.closest("a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case"mousedown":case"touchstart":this._addPrefetchLink(n);break;case"mouseover":this._earlyPrefetch(t,n,"mouseout")}}},{key:"_earlyPrefetch",value:function(t,e,n){var i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void 0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("/")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return this.config.usesTrailingSlash&&!e.endsWith("/")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run();
}());
</script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-content/themes/neosoft/js/navigation.js'
        defer='defer' id='neosoft-navigation-js'></script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-content/themes/neosoft/js/olarkchat.js'
        async='async' id='neosoft-olarkchat-js'></script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-content/themes/neosoft/js/linkedin.js'
        defer='defer' id='neosoft-linkedin-js'></script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-content/themes/neosoft/js/snap.licdn.js'
        defer='defer' id='neosoft-snap-js'></script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/themes/neosoft/node_modules/jquery/dist/jquery.min.js'
        id='neosoft-jquerymin-script-js'></script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/themes/neosoft/app/js/jquery-ui.min.js' defer='defer'
        id='neosoft-dropdown-script-js'></script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/themes/neosoft/node_modules/slick-carousel/slick/slick.min.js'
        defer='defer' id='neosoft-slick-script-js'></script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/themes/neosoft/app/js/select2.min.js' defer='defer'
        id='neosoft-selecto2-script-js'></script>
    <script id='neosoft-custom-script-js-extra'>
        var myAjax = { "ajaxurl": "https:\/\/www.neosofttech.com\/wp-admin\/admin-ajax.php" };
    </script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/themes/neosoft/app/js/min/custom.min.js' defer='defer'
        id='neosoft-custom-script-js'></script>
    <script type="rocketlazyloadscript"
        src='https://www.google.com/recaptcha/api.js?render=6LdhSkIoAAAAACICg2q1m7CCmCRAdluGCeHdsgCZ&#038;ver=3.0'
        defer='defer' id='google-recaptcha-js'></script>
    <script id='wpcf7-recaptcha-js-extra'>
        var wpcf7_recaptcha = { "sitekey": "6LdhSkIoAAAAACICg2q1m7CCmCRAdluGCeHdsgCZ", "actions": { "homepage": "homepage", "contactform": "contactform" } };
    </script>
    <script type="rocketlazyloadscript"
        src='https://www.neosofttech.com/wp-content/plugins/contact-form-7/modules/recaptcha/index.js' defer='defer'
        id='wpcf7-recaptcha-js'></script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-includes/js/hoverIntent.min.js'
        defer='defer' id='hoverIntent-js'></script>
    <script id='megamenu-js-extra'>
        var megamenu = { "timeout": "300", "interval": "100" };
    </script>
    <script type="rocketlazyloadscript" src='https://www.neosofttech.com/wp-content/plugins/megamenu/js/maxmegamenu.js'
        defer='defer' id='megamenu-js'></script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript"
        id="flying-scripts">const loadScriptsTimer=setTimeout(loadScripts,5*1000);const userInteractionEvents=["mouseover","keydown","touchstart","touchmove","wheel"];userInteractionEvents.forEach(function(event){window.addEventListener(event,triggerScriptLoader,{passive:!0})});function triggerScriptLoader(){loadScripts();clearTimeout(loadScriptsTimer);userInteractionEvents.forEach(function(event){window.removeEventListener(event,triggerScriptLoader,{passive:!0})})}
function loadScripts(){document.querySelectorAll("script[data-type='lazy']").forEach(function(elem){elem.setAttribute("src",elem.getAttribute("data-src"))})}</script>
    <script>window.lazyLoadOptions = [{ elements_selector: "img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]", data_src: "lazy-src", data_srcset: "lazy-srcset", data_sizes: "lazy-sizes", class_loading: "lazyloading", class_loaded: "lazyloaded", threshold: 300, callback_loaded: function (element) { if (element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") { if (element.classList.contains("lazyloaded")) { if (typeof window.jQuery != "undefined") { if (jQuery.fn.fitVids) { jQuery(element).parent().fitVids() } } } } } }, { elements_selector: ".rocket-lazyload", data_src: "lazy-src", data_srcset: "lazy-srcset", data_sizes: "lazy-sizes", class_loading: "lazyloading", class_loaded: "lazyloaded", threshold: 300, }]; window.addEventListener('LazyLoad::Initialized', function (e) {
            var lazyLoadInstance = e.detail.instance; if (window.MutationObserver) {
                var observer = new MutationObserver(function (mutations) {
                    var image_count = 0; var iframe_count = 0; var rocketlazy_count = 0; mutations.forEach(function (mutation) {
                        for (var i = 0; i < mutation.addedNodes.length; i++) {
                            if (typeof mutation.addedNodes[i].getElementsByTagName !== 'function') { continue }
                            if (typeof mutation.addedNodes[i].getElementsByClassName !== 'function') { continue }
                            images = mutation.addedNodes[i].getElementsByTagName('img'); is_image = mutation.addedNodes[i].tagName == "IMG"; iframes = mutation.addedNodes[i].getElementsByTagName('iframe'); is_iframe = mutation.addedNodes[i].tagName == "IFRAME"; rocket_lazy = mutation.addedNodes[i].getElementsByClassName('rocket-lazyload'); image_count += images.length; iframe_count += iframes.length; rocketlazy_count += rocket_lazy.length; if (is_image) { image_count += 1 }
                            if (is_iframe) { iframe_count += 1 }
                        }
                    }); if (image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) { lazyLoadInstance.update() }
                }); var b = document.getElementsByTagName("body")[0]; var config = { childList: !0, subtree: !0 }; observer.observe(b, config)
            }
        }, !1)</script>
    <script data-no-minify="1" async
        src="https://www.neosofttech.com/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js"></script><!-- <script type="rocketlazyloadscript" data-rocket-type='text/javascript'>/*{literal}<![CDATA[*/window.olark||(function(i){var e=window,h=document,a=e.location.protocol=="https:"?"https:":"http:",g=i.name,b="load";(function(){e[g]=function(){(c.s=c.s||[]).push(arguments)};var c=e[g]._={},f=i.methods.length; while(f--){(function(j){e[g][j]=function(){e[g]("call",j,arguments)}})(i.methods[f])} c.l=i.loader;c.i=arguments.callee;c.f=setTimeout(function(){if(c.f){(new Image).src=a+"//"+c.l.replace(".js",".png")+"&"+escape(e.location.href)}c.f=null},20000);c.p={0:+new Date};c.P=function(j){c.p[j]=new Date-c.p[0]};function d(){c.P(b);e[g](b)}e.addEventListener?e.addEventListener(b,d,false):e.attachEvent("on"+b,d); (function(){function l(j){j="head";return["<",j,"></",j,"><",z,' onl'+'oad="var d=',B,";d.getElementsByTagName('head')[0].",y,"(d.",A,"('script')).",u,"='",a,"//",c.l,"'",'"',"></",z,">"].join("")}var z="body",s=h[z];if(!s){return setTimeout(arguments.callee,100)}c.P(1);var y="appendChild",A="createElement",u="src",r=h[A]("div"),G=r[y](h[A](g)),D=h[A]("iframe"),B="document",C="domain",q;r.style.display="none";s.insertBefore(r,s.firstChild).id=g;D.frameBorder="0";D.id=g+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){D.src="javascript:false"} D.allowTransparency="true";G[y](D);try{D.contentWindow[B].open()}catch(F){i[C]=h[C];q="javascript:var d="+B+".open();d.domain='"+h.domain+"';";D[u]=q+"void(0);"}try{var H=D.contentWindow[B];H.write(l());H.close()}catch(E){D[u]=q+'d.write("'+l().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}c.P(2)})()})()})({loader:(function(a){return "static.olark.com/jsclient/loader0.js?ts="+(a?a[1]:(+new Date))})(document.cookie.match(/olarkld=([0-9]+)/)),name:"olark",methods:["configure","extend","declare","identify"]});
    /* custom configuration goes here (www.olark.com/documentation) */
    olark.configure("locale.welcome_title", "Need Help?");
    olark.configure("locale.chatting_title", "Chat with us");
    olark.configure("locale.welcome_message", "Have a question? We'd love to help.");
    olark.configure('system.hb_show_as_tab', false );
    // olark.configure("locale.unavailable_title", "Need help?");
    // olark.configure("locale.away_message", "We're not around but please leave us a message");
    olark.identify('4675-859-10-6282');/*]]>{/literal}*/</script>
    <script type="rocketlazyloadscript" data-rocket-type="text/javascript">
    _linkedin_partner_id = "636667";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script><script type="rocketlazyloadscript" data-rocket-type="text/javascript">
    (function(){var s = document.getElementsByTagName("script")[0];
    var b = document.createElement("script");
    b.type = "text/javascript";b.async = true;
    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
    s.parentNode.insertBefore(b, s);})();
</script> -->
    <noscript>
        <img height="1" width="1" style="display:none;" alt=""
            src="https://px.ads.linkedin.com/collect/?pid=636667&fmt=gif" />
    </noscript>
    <script type="rocketlazyloadscript">    jQuery(function($) {
        $('.cross_menu').on('click', function(e) {
            e.preventDefault();
            $('.max-mega-menu').data('maxmegamenu').hideAllPanels();
        });
        $('#career-priority-submit').on('click', function(e){
            e.preventDefault();
            var from_email = $('.priority-email').val();
            var p1 = $('#drag1 p').text();
            var p2 = $('#drag2 p').text();
            var p3 = $('#drag3 p').text();
            var p4 = $('#drag4 p').text();
            var p5 = $('#drag5 p').text();
            var p6 = $('#drag6 p').text();
            var p7 = $('#drag7 p').text();
            var p8 = $('#drag8 p').text();
            var p9 = $('#drag9 p').text();
            var p10 = $('#drag10 p').text();
            var formData = {
                from: from_email,
                p1: p1,
                p2: p2,
                p3: p3,
                p4: p4,
                p5: p5,
                p6: p6,
                p7: p7,
                p8: p8,
                p9: p9,
                p10: p10,
                action:'prio_mail'
            };
            $.ajax({
                type        : 'POST', 
                url         : "https://www.neosofttech.com/wp-admin/admin-ajax.php",
                data        : formData,
                dataType    : 'json',
                }).done(function(data) {
                   $(".success-msg").css("display","block");
                   $(".priority-email").val("");        
                }).fail(function(error) {
                    $(".priority-email").val("");
                    $(".fail-msg").css("display","block");
                });

            });
    });
    $('.close').on('click', function() {
        $("#myModal2").css("display","none");
    });
</script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt=""
            src="https://px.ads.linkedin.com/collect/?pid=636667&fmt=gif" />
    </noscript>
</body>

</html>
<!-- This website is like a Rocket, isn't it? Performance optimized by WP Rocket. Learn more: https://wp-rocket.me - Debug: cached@1707288547 -->