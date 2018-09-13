var exchange_domain = "cpm-exchange.adflex.asia";
var tracking_domain = "cpm-track.adflex.asia";

function generateCb() {
    var t;
    try {
        t = window.top.adflex_cb
    } catch (t) {}
    return t || adflex_cb || Math.floor(adflex_time % 65536 + 65536 * Math.floor(65536 * Math.random()))
}

var adflex_time = (new Date).getTime(),
    adflex_cb = generateCb(),
    adflex_rtb = adflex_rtb || new function() {
        this.is_iframe = function() {
            var e = !1;
            try {
                e = t.location !== t.parent.location
            } catch (t) {}
            return e
        }, this.getDoc = function() {
            var e = null;
            try {
                e = this.is_iframe() ? t.frameElement.contentDocument || t.frameElement.contentWindow.document : document
            } catch (t) {}
            return e || document
        }, this.getIfrmDoc = function(t) {
            return t.contentDocument ? t.contentDocument : t.contentWindow ? t.contentWindow.document : t.document ? t.document : null
        }, this.extend = function() {
            for (var t, e = 0, r = {}; e < arguments.length; e++)
                for (t in arguments[e]) r[t] = r[t] || arguments[e][t];
            return r
        }, this.detectIE = function() {
            var t = window.navigator.userAgent,
                e = t.indexOf("MSIE ");
            if (e > 0) return parseInt(t.substring(e + 5, t.indexOf(".", e)), 10);
            if (t.indexOf("Trident/") > 0) {
                var r = t.indexOf("rv:");
                return parseInt(t.substring(r + 3, t.indexOf(".", r)), 10)
            }
            var i = t.indexOf("Edge/");
            return i > 0 && parseInt(t.substring(i + 5, t.indexOf(".", i)), 10)
        }, this.adflex_tags = {};
        var t = window,
            e = this.getDoc(),
            r = "adflex_tag_";
        this.tag = function(e) {
            try {
                var i = e.tag_id;
                if (this.adflex_tags[i] ? (this.adflex_tags[i].dupn += 1, qs = this.getAdflexDIV(i), qs.setAttribute("id", r + i + "_" + this.adflex_tags[i].dupn)) : (this.adflex_tags[i] = {
                        id: i,
                        div_id: i,
                        dupn: 1
                    }, qs = this.getAdflexDIV(i)), qs) {
                    var n = t.atob,
                        a = n ? "about:blank" : "#",
                        s = this.create_iframe(a, qs, {
                            id: this.generateIframeId(i)
                        }, e);
                    s && n && (js_code = 'document.write(\'<script type="text/javascript" src="//' + exchange_domain + '/ad_request?pzoneid=' + i + "&ref=" + this.site_url() + "&cb=" + adflex_cb + "&loc=" + this.site_loc() + "\"></'+'script>');", this.iframe_with_content(s, this.build_js(js_code, 1), e))
                }
            } catch (t) {}
        }, this.site_url = function() {
            var r = "",
                i = "";
            if (-1 !== (r = i = this.is_iframe() && "" !== e.referrer ? e.referrer : t.location.href).indexOf("javascript:window") || -1 !== r.indexOf("about:blank")) try {
                r = t.parent.location.href
            } catch (t) {
                r = i
            }
            return r.length > 1024 && (r = r.replace(/([^:]+:\/\/[^\/]+).*/, "$1")), r
        }, this.site_loc = function() {
            var t = "";
            try {
                t = this.is_iframe() && document.referrer ? document.referrer.replace(/^\s+|\s+$/g, "") : document.location.href
            } catch (t) {}
            return t.replace(/["']/g, "")
        }, this.getAdflexDIV = function(t) {
            var i = 0,
                n = r + t,
                a = e.getElementsByTagName("div"),
                s = "adflex-div";
            try {
                for (; i < a.length; i++)
                    if (a[i].id === n && -1 === a[i].className.indexOf(s)) {
                        q = a[i];
                        var o = q.className || "";
                        q.classList ? q.classList.add(s) : q.className = "" !== o ? o + " " + s : s;
                        break
                    }
            } catch (t) {}
            return q
        }, this.getAdflexID = function(t) {
            var e = this.adflex_tags[t].dupn;
            return r + t + (e > 1 ? "_" + e : "")
        }, this.findTag = function(t, e) {
            var r, i, n;
            if (t) try {
                n = t.getElementsByTagName("script") || [];
                for (i in n)
                    if (-1 !== (n[i].text || "").indexOf(e)) {
                        r = n[i];
                        break
                    }
            } catch (t) {}
            return r
        }, this.setAttributes = function(t, e) {
            try {
                if (t)
                    for (var r in e) t.setAttribute(r, e[r]);
                return t
            } catch (t) {}
            return null
        }, this.readyStateDontWrite = function(t) {
            return "loaded" === t || "complete" === t || "interactive" === t
        }, this.create_iframe = function(t, r, i, n) {
            var a = e.createElement("iframe");
            return this.setAttributes(a, this.extend(i || {}, {
                src: t,
                marginHeight: 0,
                marginWidth: 0,
                frameBorder: 0,
                scrolling: "no",
                style: "width:" + n.width + "px;height:" + n.height + "px;"
            })), r && r.appendChild(a), a
        }, this.generateIframeId = function(t) {
            return "adflexfr-" + t + "-" + Math.round(1e3 * Math.random())
        }, this.iframe_with_content = function(t, e, r) {
            var i = this.generate_iframe_content(e, r);
            return this.writeContentToIframe(t, i)
        }, this.generate_iframe_content = function(t, e) {
            var r = '<script type="text/javascript">function showAdsByAdflex(){document.getElementById("adflex_gc").style.width = \'105px\';document.getElementById("adflex_gb").style.display = \'none\';document.getElementById("adflex_gs").style.display = \'block\';}function hideAdsByAdflex(cb){setTimeout(function() {document.getElementById("adflex_gc").style.width = \'15px\';document.getElementById("adflex_gb").style.display = \'block\';document.getElementById("adflex_gs").style.display = \'none\';}, 500);}<\/script>';
            r += "<style>#block_adexchange svg:not(:root) {overflow: auto;!important}</style>", r += '<div id="block_adexchange" style="width: ' + e.width + "px; height: " + e.height + 'px; position: relative;font: 15px/1.2em Arial,sans-serif ! important;">', this.detectIE() || (r += '            <div dir="ltr" id="adflex_gc" style="width: 15px; height: 15px;height: 15px;position: absolute;left: 0;text-rendering: geometricprecision;bottom: 0;width: 15px;z-index: 9020;">', r += '                <div id="adflex_gb" style="display: block;height: 100%;" onmouseover="showAdsByAdflex()">', r += '<svg width="100%" height="100%">', r += '<rect width="100%" height="100%" fill="lightgray"/>', r += '<svg stroke="#000000" fill="#000000" x="0px" y="0px">', r += '                    <circle cx="7.5px" cy="7.5px" r="5.5px" fill="none" stroke-width="1.1px"/>', r += '                    <circle cx="7.5px" cy="4.75px" r="1px" stroke="none"/>', r += '                    <line x1="7.5px" x2="7.5px" y1="6.5px" y2="11px" fill="none" stroke-width="1.75px"/>', r += "                    </svg>", r += "                    </svg>", r += "                </div>", r += '                <div id="adflex_gs" style="display: none;height: 100%;" onmouseleave="hideAdsByAdflex()">', r += '                    <a target="_blank" href="https://cpm.adflex.asia" style="text-decoration: none;" id="abgl">', r += '                        <svg height="100%" width="100%">', r += '                        <path transform="matrix(-1.18971, -0.00136069, 0.00161882, -0.999999, 105, 15)" d="M0,0l96,0l0,15l-92,0s-4,0,-4,-4Z" fill="lightgray"/>', r += '                        <svg width="34px" y="11px" x="17px" overflow="visible">', r += '                        <text transform="scale(0.11121408415723971)" font-size="100px" font-family="Arial" fill="black">Ads by</text>', r += "                        </svg>", r += '                        <svg width="38px" y="11px" x="53px" overflow="visible">', r += '                        <text transform="scale(0.11784163440459683)" font-weight="bold" font-size="100px" font-family="Arial" fill="black">Adflex</text>', r += "                        </svg>", r += '                        <svg y="0px" x="0px" fill="#000000" stroke="#000000">', r += '                        <circle stroke-width="1.1px" fill="none" r="5.5px" cy="7.5px" cx="7.5px"/>', r += '                        <circle stroke="none" r="1px" cy="4.75px" cx="7.5px"/>', r += '                        <line stroke-width="1.75px" fill="none" y2="11px" y1="6.5px" x2="7.5px" x1="7.5px"/>', r += "                        </svg>", r += "                        </svg>", r += "                    </a>", r += "                </div>", r += "            </div>");
            var i = "        </div>";
            return i += "", k = "<!DOCTYPE HTML><html><head></head><body>" + r + t + i + "</body></html>", k
        }, this.writeContentToIframe = function(t, e) {
            var r = this.getIfrmDoc(t);
            r && (r.open(), r.write(e), r.close())
        }, this.build_js = function(t, e, r) {
            return "<script " + (r ? 'id="' + r + '" ' : "") + 'type="text/javascript"' + (e ? ">" + t : ' src="' + t + '">') + "<\/script>"
        }
    };
! function(t, e) {
    if (window.adflex_tags && (e = adflex_tags.length))
        for (t = 0; e > t; ++t) "object" == typeof adflex_tags[t] && adflex_rtb.tag(adflex_tags[t])
}(), adflex_tags = {
    push: function(t) {
        adflex_rtb.tag(t)
    }
};
