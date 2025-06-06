/*!
 FixedColumns 4.0.1
 2019-2021 SpryMedia Ltd - datatables.net/license
*/
var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.getGlobal = function (a) {
    a = ["object" == typeof globalThis && globalThis, a, "object" == typeof window && window, "object" == typeof self && self, "object" == typeof global && global];
    for (var g = 0; g < a.length; ++g) {
        var k = a[g];
        if (k && k.Math == Math) return k
    }
    throw Error("Cannot find global object");
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.checkEs6ConformanceViaProxy = function () {
    try {
        var a = {}, g = Object.create(new $jscomp.global.Proxy(a, {
            get: function (k, e, d) {
                return k == a && "q" == e && d == g
            }
        }));
        return !0 === g.q
    } catch (k) {
        return !1
    }
};
$jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS = !1;
$jscomp.ES6_CONFORMANCE = $jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS && $jscomp.checkEs6ConformanceViaProxy();
$jscomp.arrayIteratorImpl = function (a) {
    var g = 0;
    return function () {
        return g < a.length ? {done: !1, value: a[g++]} : {done: !0}
    }
};
$jscomp.arrayIterator = function (a) {
    return {next: $jscomp.arrayIteratorImpl(a)}
};
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.SIMPLE_FROUND_POLYFILL = !1;
$jscomp.ISOLATE_POLYFILLS = !1;
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function (a, g, k) {
    if (a == Array.prototype || a == Object.prototype) return a;
    a[g] = k.value;
    return a
};
$jscomp.IS_SYMBOL_NATIVE = "function" === typeof Symbol && "symbol" === typeof Symbol("x");
$jscomp.TRUST_ES6_POLYFILLS = !$jscomp.ISOLATE_POLYFILLS || $jscomp.IS_SYMBOL_NATIVE;
$jscomp.polyfills = {};
$jscomp.propertyToPolyfillSymbol = {};
$jscomp.POLYFILL_PREFIX = "$jscp$";
var $jscomp$lookupPolyfilledValue = function (a, g) {
    var k = $jscomp.propertyToPolyfillSymbol[g];
    if (null == k) return a[g];
    k = a[k];
    return void 0 !== k ? k : a[g]
};
$jscomp.polyfill = function (a, g, k, e) {
    g && ($jscomp.ISOLATE_POLYFILLS ? $jscomp.polyfillIsolated(a, g, k, e) : $jscomp.polyfillUnisolated(a, g, k, e))
};
$jscomp.polyfillUnisolated = function (a, g, k, e) {
    k = $jscomp.global;
    a = a.split(".");
    for (e = 0; e < a.length - 1; e++) {
        var d = a[e];
        if (!(d in k)) return;
        k = k[d]
    }
    a = a[a.length - 1];
    e = k[a];
    g = g(e);
    g != e && null != g && $jscomp.defineProperty(k, a, {configurable: !0, writable: !0, value: g})
};
$jscomp.polyfillIsolated = function (a, g, k, e) {
    var d = a.split(".");
    a = 1 === d.length;
    e = d[0];
    e = !a && e in $jscomp.polyfills ? $jscomp.polyfills : $jscomp.global;
    for (var h = 0; h < d.length - 1; h++) {
        var m = d[h];
        if (!(m in e)) return;
        e = e[m]
    }
    d = d[d.length - 1];
    k = $jscomp.IS_SYMBOL_NATIVE && "es6" === k ? e[d] : null;
    g = g(k);
    null != g && (a ? $jscomp.defineProperty($jscomp.polyfills, d, {
        configurable: !0,
        writable: !0,
        value: g
    }) : g !== k && ($jscomp.propertyToPolyfillSymbol[d] = $jscomp.IS_SYMBOL_NATIVE ? $jscomp.global.Symbol(d) : $jscomp.POLYFILL_PREFIX + d, d =
        $jscomp.propertyToPolyfillSymbol[d], $jscomp.defineProperty(e, d, {configurable: !0, writable: !0, value: g})))
};
$jscomp.initSymbol = function () {
};
$jscomp.polyfill("Symbol", function (a) {
    if (a) return a;
    var g = function (d, h) {
        this.$jscomp$symbol$id_ = d;
        $jscomp.defineProperty(this, "description", {configurable: !0, writable: !0, value: h})
    };
    g.prototype.toString = function () {
        return this.$jscomp$symbol$id_
    };
    var k = 0, e = function (d) {
        if (this instanceof e) throw new TypeError("Symbol is not a constructor");
        return new g("jscomp_symbol_" + (d || "") + "_" + k++, d)
    };
    return e
}, "es6", "es3");
$jscomp.initSymbolIterator = function () {
};
$jscomp.polyfill("Symbol.iterator", function (a) {
        if (a) return a;
        a = Symbol("Symbol.iterator");
        for (var g = "Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "), k = 0; k < g.length; k++) {
            var e = $jscomp.global[g[k]];
            "function" === typeof e && "function" != typeof e.prototype[a] && $jscomp.defineProperty(e.prototype, a, {
                configurable: !0,
                writable: !0,
                value: function () {
                    return $jscomp.iteratorPrototype($jscomp.arrayIteratorImpl(this))
                }
            })
        }
        return a
    }, "es6",
    "es3");
$jscomp.initSymbolAsyncIterator = function () {
};
$jscomp.iteratorPrototype = function (a) {
    a = {next: a};
    a[Symbol.iterator] = function () {
        return this
    };
    return a
};
$jscomp.makeIterator = function (a) {
    var g = "undefined" != typeof Symbol && Symbol.iterator && a[Symbol.iterator];
    return g ? g.call(a) : $jscomp.arrayIterator(a)
};
$jscomp.owns = function (a, g) {
    return Object.prototype.hasOwnProperty.call(a, g)
};
$jscomp.polyfill("WeakMap", function (a) {
    function g() {
        if (!a || !Object.seal) return !1;
        try {
            var b = Object.seal({}), f = Object.seal({}), l = new a([[b, 2], [f, 3]]);
            if (2 != l.get(b) || 3 != l.get(f)) return !1;
            l.delete(b);
            l.set(f, 4);
            return !l.has(b) && 4 == l.get(f)
        } catch (u) {
            return !1
        }
    }

    function k() {
    }

    function e(b) {
        var f = typeof b;
        return "object" === f && null !== b || "function" === f
    }

    function d(b) {
        if (!$jscomp.owns(b, m)) {
            var f = new k;
            $jscomp.defineProperty(b, m, {value: f})
        }
    }

    function h(b) {
        if (!$jscomp.ISOLATE_POLYFILLS) {
            var f = Object[b];
            f && (Object[b] =
                function (l) {
                    if (l instanceof k) return l;
                    Object.isExtensible(l) && d(l);
                    return f(l)
                })
        }
    }

    if ($jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS) {
        if (a && $jscomp.ES6_CONFORMANCE) return a
    } else if (g()) return a;
    var m = "$jscomp_hidden_" + Math.random();
    h("freeze");
    h("preventExtensions");
    h("seal");
    var n = 0, c = function (b) {
        this.id_ = (n += Math.random() + 1).toString();
        if (b) {
            b = $jscomp.makeIterator(b);
            for (var f; !(f = b.next()).done;) f = f.value, this.set(f[0], f[1])
        }
    };
    c.prototype.set = function (b, f) {
        if (!e(b)) throw Error("Invalid WeakMap key");
        d(b);
        if (!$jscomp.owns(b, m)) throw Error("WeakMap key fail: " + b);
        b[m][this.id_] = f;
        return this
    };
    c.prototype.get = function (b) {
        return e(b) && $jscomp.owns(b, m) ? b[m][this.id_] : void 0
    };
    c.prototype.has = function (b) {
        return e(b) && $jscomp.owns(b, m) && $jscomp.owns(b[m], this.id_)
    };
    c.prototype.delete = function (b) {
        return e(b) && $jscomp.owns(b, m) && $jscomp.owns(b[m], this.id_) ? delete b[m][this.id_] : !1
    };
    return c
}, "es6", "es3");
$jscomp.MapEntry = function () {
};
$jscomp.polyfill("Map", function (a) {
    function g() {
        if ($jscomp.ASSUME_NO_NATIVE_MAP || !a || "function" != typeof a || !a.prototype.entries || "function" != typeof Object.seal) return !1;
        try {
            var c = Object.seal({x: 4}), b = new a($jscomp.makeIterator([[c, "s"]]));
            if ("s" != b.get(c) || 1 != b.size || b.get({x: 4}) || b.set({x: 4}, "t") != b || 2 != b.size) return !1;
            var f = b.entries(), l = f.next();
            if (l.done || l.value[0] != c || "s" != l.value[1]) return !1;
            l = f.next();
            return l.done || 4 != l.value[0].x || "t" != l.value[1] || !f.next().done ? !1 : !0
        } catch (u) {
            return !1
        }
    }

    if ($jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS) {
        if (a && $jscomp.ES6_CONFORMANCE) return a
    } else if (g()) return a;
    var k = new WeakMap, e = function (c) {
        this.data_ = {};
        this.head_ = m();
        this.size = 0;
        if (c) {
            c = $jscomp.makeIterator(c);
            for (var b; !(b = c.next()).done;) b = b.value, this.set(b[0], b[1])
        }
    };
    e.prototype.set = function (c, b) {
        c = 0 === c ? 0 : c;
        var f = d(this, c);
        f.list || (f.list = this.data_[f.id] = []);
        f.entry ? f.entry.value = b : (f.entry = {
            next: this.head_,
            previous: this.head_.previous,
            head: this.head_,
            key: c,
            value: b
        }, f.list.push(f.entry),
            this.head_.previous.next = f.entry, this.head_.previous = f.entry, this.size++);
        return this
    };
    e.prototype.delete = function (c) {
        c = d(this, c);
        return c.entry && c.list ? (c.list.splice(c.index, 1), c.list.length || delete this.data_[c.id], c.entry.previous.next = c.entry.next, c.entry.next.previous = c.entry.previous, c.entry.head = null, this.size--, !0) : !1
    };
    e.prototype.clear = function () {
        this.data_ = {};
        this.head_ = this.head_.previous = m();
        this.size = 0
    };
    e.prototype.has = function (c) {
        return !!d(this, c).entry
    };
    e.prototype.get = function (c) {
        return (c =
            d(this, c).entry) && c.value
    };
    e.prototype.entries = function () {
        return h(this, function (c) {
            return [c.key, c.value]
        })
    };
    e.prototype.keys = function () {
        return h(this, function (c) {
            return c.key
        })
    };
    e.prototype.values = function () {
        return h(this, function (c) {
            return c.value
        })
    };
    e.prototype.forEach = function (c, b) {
        for (var f = this.entries(), l; !(l = f.next()).done;) l = l.value, c.call(b, l[1], l[0], this)
    };
    e.prototype[Symbol.iterator] = e.prototype.entries;
    var d = function (c, b) {
        var f = b && typeof b;
        "object" == f || "function" == f ? k.has(b) ? f = k.get(b) :
            (f = "" + ++n, k.set(b, f)) : f = "p_" + b;
        var l = c.data_[f];
        if (l && $jscomp.owns(c.data_, f)) for (c = 0; c < l.length; c++) {
            var u = l[c];
            if (b !== b && u.key !== u.key || b === u.key) return {id: f, list: l, index: c, entry: u}
        }
        return {id: f, list: l, index: -1, entry: void 0}
    }, h = function (c, b) {
        var f = c.head_;
        return $jscomp.iteratorPrototype(function () {
            if (f) {
                for (; f.head != c.head_;) f = f.previous;
                for (; f.next != f.head;) return f = f.next, {done: !1, value: b(f)};
                f = null
            }
            return {done: !0, value: void 0}
        })
    }, m = function () {
        var c = {};
        return c.previous = c.next = c.head = c
    }, n = 0;
    return e
}, "es6", "es3");
(function () {
    var a, g, k = function () {
        function e(d, h) {
            var m = this;
            if (!g || !g.versionCheck || !g.versionCheck("1.10.0")) throw Error("StateRestore requires DataTables 1.10 or newer");
            d = new g.Api(d);
            this.classes = a.extend(!0, {}, e.classes);
            this.c = a.extend(!0, {}, e.defaults, h);
            void 0 === h.left && void 0 !== this.c.leftColumns && (this.c.left = this.c.leftColumns);
            void 0 === h.right && void 0 !== this.c.rightColumns && (this.c.right = this.c.rightColumns);
            this.s = {barWidth: 0, dt: d, rtl: "rtl" === a(d.table().node()).css("direction")};
            h = {
                "background-color": "white",
                bottom: "0px", display: "block", position: "absolute", width: this.s.barWidth + 1 + "px"
            };
            this.dom = {
                leftBottomBlocker: a("<div>").css(h).css("left", 0).addClass(this.classes.leftBottomBlocker),
                leftTopBlocker: a("<div>").css(h).css({left: 0, top: 0}).addClass(this.classes.leftTopBlocker),
                rightBottomBlocker: a("<div>").css(h).css("right", 0).addClass(this.classes.rightBottomBlocker),
                rightTopBlocker: a("<div>").css(h).css({right: 0, top: 0}).addClass(this.classes.rightTopBlocker)
            };
            if (this.s.dt.settings()[0]._bInitComplete) this._addStyles(),
                this._setKeyTableListener(); else d.one("preInit.dt", function () {
                m._addStyles();
                m._setKeyTableListener()
            });
            d.settings()[0]._fixedColumns = this;
            return this
        }

        e.prototype.left = function (d) {
            void 0 !== d && (this.c.left = d, this._addStyles());
            return this.c.left
        };
        e.prototype.right = function (d) {
            void 0 !== d && (this.c.right = d, this._addStyles());
            return this.c.right
        };
        e.prototype._addStyles = function () {
            if (this.s.dt.settings()[0].oScroll.sY) {
                var d = a(this.s.dt.table().node()).closest("div.dataTables_scrollBody")[0],
                    h = this.s.dt.settings()[0].oBrowser.barWidth;
                this.s.barWidth = d.offsetWidth - d.clientWidth >= h ? h : 0;
                this.dom.rightTopBlocker.css("width", this.s.barWidth + 1);
                this.dom.leftTopBlocker.css("width", this.s.barWidth + 1);
                this.dom.rightBottomBlocker.css("width", this.s.barWidth + 1);
                this.dom.leftBottomBlocker.css("width", this.s.barWidth + 1)
            }
            d = null;
            h = this.s.dt.column(0).header();
            var m = null;
            null !== h && (h = a(h), m = h.outerHeight() + 1, d = a(h.closest("div.dataTables_scroll")).css("position", "relative"));
            var n = this.s.dt.column(0).footer(), c = null;
            null !== n && (n = a(n), c = n.outerHeight(),
            null === d && (d = a(n.closest("div.dataTables_scroll")).css("position", "relative")));
            for (var b = this.s.dt.columns().data().toArray().length, f = 0, l = 0, u = a(this.s.dt.table().node()).children("tbody").children("tr"), x = 0, A = new Map, r = 0; r < b; r++) {
                var t = this.s.dt.column(r);
                0 < r && A.set(r - 1, x);
                if (t.visible()) {
                    var y = a(t.header());
                    t = a(t.footer());
                    if (r - x < this.c.left) {
                        a(this.s.dt.table().node()).addClass(this.classes.tableFixedLeft);
                        d.addClass(this.classes.tableFixedLeft);
                        if (0 < r - x) for (var p = r; p + 1 < b;) {
                            var q = this.s.dt.column(p -
                                1, {page: "current"});
                            if (q.visible()) {
                                f += a(q.nodes()[0]).outerWidth();
                                l += q.header() ? a(q.header()).outerWidth() : q.footer() ? a(q.header()).outerWidth() : 0;
                                break
                            }
                            p--
                        }
                        for (var v = 0, w = u; v < w.length; v++) p = w[v], a(a(p).children()[r - x]).css(this._getCellCSS(!1, f, "left")).addClass(this.classes.fixedLeft);
                        y.css(this._getCellCSS(!0, l, "left")).addClass(this.classes.fixedLeft);
                        t.css(this._getCellCSS(!0, l, "left")).addClass(this.classes.fixedLeft)
                    } else {
                        v = 0;
                        for (w = u; v < w.length; v++) p = w[v], p = a(a(p).children()[r - x]), p.hasClass(this.classes.fixedLeft) &&
                        p.css(this._clearCellCSS("left")).removeClass(this.classes.fixedLeft);
                        y.hasClass(this.classes.fixedLeft) && y.css(this._clearCellCSS("left")).removeClass(this.classes.fixedLeft);
                        t.hasClass(this.classes.fixedLeft) && t.css(this._clearCellCSS("left")).removeClass(this.classes.fixedLeft)
                    }
                } else x++
            }
            null === h || h.hasClass("index") || (this.s.rtl ? (this.dom.leftTopBlocker.outerHeight(m), d.append(this.dom.leftTopBlocker)) : (this.dom.rightTopBlocker.outerHeight(m), d.append(this.dom.rightTopBlocker)));
            null === n || n.hasClass("index") ||
            (this.s.rtl ? (this.dom.leftBottomBlocker.outerHeight(c), d.append(this.dom.leftBottomBlocker)) : (this.dom.rightBottomBlocker.outerHeight(c), d.append(this.dom.rightBottomBlocker)));
            v = l = f = 0;
            for (r = b - 1; 0 <= r; r--) if (t = this.s.dt.column(r), t.visible()) if (y = a(t.header()), t = a(t.footer()), w = A.get(r), void 0 === w && (w = x), r + v >= b - this.c.right) {
                a(this.s.dt.table().node()).addClass(this.classes.tableFixedRight);
                d.addClass(this.classes.tableFixedRight);
                if (r + 1 + v < b) for (p = r; p + 1 < b;) {
                    q = this.s.dt.column(p + 1, {page: "current"});
                    if (q.visible()) {
                        f += a(q.nodes()[0]).outerWidth();
                        l += q.header() ? a(q.header()).outerWidth() : q.footer() ? a(q.header()).outerWidth() : 0;
                        break
                    }
                    p++
                }
                q = 0;
                for (var z = u; q < z.length; q++) p = z[q], a(a(p).children()[r - w]).css(this._getCellCSS(!1, f, "right")).addClass(this.classes.fixedRight);
                y.css(this._getCellCSS(!0, l, "right")).addClass(this.classes.fixedRight);
                t.css(this._getCellCSS(!0, l, "right")).addClass(this.classes.fixedRight)
            } else {
                q = 0;
                for (z = u; q < z.length; q++) p = z[q], p = a(a(p).children()[r - w]), p.hasClass(this.classes.fixedRight) &&
                p.css(this._clearCellCSS("right")).removeClass(this.classes.fixedRight);
                y.hasClass(this.classes.fixedRight) && y.css(this._clearCellCSS("right")).removeClass(this.classes.fixedRight);
                t.hasClass(this.classes.fixedRight) && t.css(this._clearCellCSS("right")).removeClass(this.classes.fixedRight)
            } else v++;
            h && (this.s.rtl ? (this.dom.leftTopBlocker.outerHeight(m), d.append(this.dom.leftTopBlocker)) : (this.dom.rightTopBlocker.outerHeight(m), d.append(this.dom.rightTopBlocker)));
            n && (this.s.rtl ? (this.dom.leftBottomBlocker.outerHeight(c),
                d.append(this.dom.leftBottomBlocker)) : (this.dom.rightBottomBlocker.outerHeight(c), d.append(this.dom.rightBottomBlocker)))
        };
        e.prototype._getCellCSS = function (d, h, m) {
            return "left" === m ? this.s.rtl ? {
                position: "sticky",
                right: h + (d ? this.s.barWidth : 0) + "px"
            } : {left: h + "px", position: "sticky"} : this.s.rtl ? {
                left: h + "px",
                position: "sticky"
            } : {position: "sticky", right: h + (d ? this.s.barWidth : 0) + "px"}
        };
        e.prototype._clearCellCSS = function (d) {
            return "left" === d ? this.s.rtl ? {position: "", right: ""} : {left: "", position: ""} : this.s.rtl ? {
                left: "",
                position: ""
            } : {position: "", right: ""}
        };
        e.prototype._setKeyTableListener = function () {
            var d = this;
            this.s.dt.on("key-focus", function (h, m, n) {
                h = a(n.node()).offset();
                m = a(a(d.s.dt.table().node()).closest("div.dataTables_scrollBody"));
                if (0 < d.c.left) {
                    var c = a(d.s.dt.column(d.c.left - 1).header()), b = c.offset(), f = c.outerWidth();
                    h.left < b.left + f && (c = m.scrollLeft(), m.scrollLeft(c - (b.left + f - h.left)))
                }
                0 < d.c.right && (c = d.s.dt.columns().data().toArray().length, n = a(n.node()).outerWidth(), b = a(d.s.dt.column(c - d.c.right).header()).offset(),
                h.left + n > b.left && (c = m.scrollLeft(), m.scrollLeft(c - (b.left - (h.left + n)))))
            });
            this.s.dt.on("draw", function () {
                d._addStyles()
            });
            this.s.dt.on("column-reorder", function () {
                d._addStyles()
            });
            this.s.dt.on("column-visibility", function () {
                setTimeout(function () {
                    d._addStyles()
                }, 50)
            })
        };
        e.version = "4.0.1";
        e.classes = {
            fixedLeft: "dtfc-fixed-left",
            fixedRight: "dtfc-fixed-right",
            leftBottomBlocker: "dtfc-left-bottom-blocker",
            leftTopBlocker: "dtfc-left-top-blocker",
            rightBottomBlocker: "dtfc-right-bottom-blocker",
            rightTopBlocker: "dtfc-right-top-blocker",
            tableFixedLeft: "dtfc-has-left",
            tableFixedRight: "dtfc-has-right"
        };
        e.defaults = {i18n: {button: "FixedColumns"}, left: 1, right: 0};
        return e
    }();
    (function (e) {
        "function" === typeof define && define.amd ? define(["jquery", "datatables.net"], function (d) {
            return e(d, window, document)
        }) : "object" === typeof exports ? module.exports = function (d, h) {
            d || (d = window);
            h && h.fn.dataTable || (h = require("datatables.net")(d, h).$);
            return e(h, d, d.document)
        } : e(window.jQuery, window, document)
    })(function (e, d, h) {
        function m(c, b) {
            void 0 === b && (b = null);
            c = new n.Api(c);
            b = b ? b : c.init().fixedColumns || n.defaults.fixedColumns;
            return new k(c, b)
        }

        a = e;
        g = a.fn.dataTable;
        var n = e.fn.dataTable;
        e.fn.dataTable.FixedColumns = k;
        e.fn.DataTable.FixedColumns = k;
        d = e.fn.dataTable.Api.register;
        d("fixedColumns()", function () {
            return this
        });
        d("fixedColumns().left()", function (c) {
            var b = this.context[0];
            return void 0 !== c ? (b._fixedColumns.left(c), this) : b._fixedColumns.left()
        });
        d("fixedColumns().right()", function (c) {
            var b = this.context[0];
            return void 0 !== c ? (b._fixedColumns.right(c),
                this) : b._fixedColumns.right()
        });
        e.fn.dataTable.ext.buttons.fixedColumns = {
            action: function (c, b, f, l) {
                e(f).attr("active") ? (e(f).removeAttr("active").removeClass("active"), b.fixedColumns().left(0), b.fixedColumns().right(0)) : (e(f).attr("active", !0).addClass("active"), b.fixedColumns().left(l.config.left), b.fixedColumns().right(l.config.right))
            }, config: {left: 1, right: 0}, init: function (c, b, f) {
                void 0 === c.settings()[0]._fixedColumns && m(c.settings(), f);
                e(b).attr("active", !0).addClass("active");
                c.button(b).text(f.text ||
                    c.i18n("buttons.fixedColumns", c.settings()[0]._fixedColumns.c.i18n.button))
            }, text: null
        };
        e(h).on("init.dt.dtfc", function (c, b) {
            "dt" === c.namespace && (b.oInit.fixedColumns || n.defaults.fixedColumns) && (b._fixedColumns || m(b, null))
        })
    })
})();