AmCharts.AmPieChart = AmCharts.Class({
    inherits: AmCharts.AmSlicedChart,
    construct: function(e) {
        this.type = "pie";
        AmCharts.AmPieChart.base.construct.call(this, e);
        this.cname = "AmPieChart";
        this.pieBrightnessStep = 30;
        this.minRadius = 10;
        this.depth3D = 0;
        this.startAngle = 90;
        this.angle = this.innerRadius = 0;
        this.startRadius = "500%";
        this.pullOutRadius = "20%";
        this.labelRadius = 20;
        this.labelText = "[[title]]: [[percents]]%";
        this.balloonText = "[[title]]: [[percents]]% ([[value]])\n[[description]]";
        this.previousScale = 1;
        AmCharts.applyTheme(this,
            e, this.cname)
    },
    drawChart: function() {
        AmCharts.AmPieChart.base.drawChart.call(this);
        var e = this.chartData;
        if (AmCharts.ifArray(e)) {
            if (0 < this.realWidth && 0 < this.realHeight) {
                AmCharts.VML && (this.startAlpha = 1);
                var f = this.startDuration,
                    c = this.container,
                    b = this.updateWidth();
                this.realWidth = b;
                var k = this.updateHeight();
                this.realHeight = k;
                var d = AmCharts.toCoordinate,
                    l = d(this.marginLeft, b),
                    a = d(this.marginRight, b),
                    u = d(this.marginTop, k) + this.getTitleHeight(),
                    m = d(this.marginBottom, k),
                    x, y, g, w = AmCharts.toNumber(this.labelRadius),
                    q = this.measureMaxLabel();
                q > this.maxLabelWidth && (q = this.maxLabelWidth);
                this.labelText && this.labelsEnabled || (w = q = 0);
                x = void 0 === this.pieX ? (b - l - a) / 2 + l : d(this.pieX, this.realWidth);
                y = void 0 === this.pieY ? (k - u - m) / 2 + u : d(this.pieY, k);
                g = d(this.radius, b, k);
                g || (b = 0 <= w ? b - l - a - 2 * q : b - l - a, k = k - u - m, g = Math.min(b, k), k < b && (g /= 1 - this.angle / 90, g > b && (g = b)), k = AmCharts.toCoordinate(this.pullOutRadius, g), g = (0 <= w ? g - 1.8 * (w + k) : g - 1.8 * k) / 2);
                g < this.minRadius && (g = this.minRadius);
                k = d(this.pullOutRadius, g);
                u = AmCharts.toCoordinate(this.startRadius,
                    g);
                d = d(this.innerRadius, g);
                d >= g && (d = g - 1);
                m = AmCharts.fitToBounds(this.startAngle, 0, 360);
                0 < this.depth3D && (m = 270 <= m ? 270 : 90);
                m -= 90;
                b = g - g * this.angle / 90;
                for (l = 0; l < e.length; l++)
                    if (a = e[l], !0 !== a.hidden && 0 < a.percents) {
                        var p = 360 * a.percents / 100,
                            q = Math.sin((m + p / 2) / 180 * Math.PI),
                            z = -Math.cos((m + p / 2) / 180 * Math.PI) * (b / g),
                            n = this.outlineColor;
                        n || (n = a.color);
                        var A = this.alpha;
                        isNaN(a.alpha) || (A = a.alpha);
                        n = {
                            fill: a.color,
                            stroke: n,
                            "stroke-width": this.outlineThickness,
                            "stroke-opacity": this.outlineAlpha,
                            "fill-opacity": A
                        };
                        a.url &&
                        (n.cursor = "pointer");
                        n = AmCharts.wedge(c, x, y, m, p, g, b, d, this.depth3D, n, this.gradientRatio, a.pattern);
                        AmCharts.setCN(this, n, "pie-item");
                        AmCharts.setCN(this, n.wedge, "pie-slice");
                        AmCharts.setCN(this, n, a.className, !0);
                        this.addEventListeners(n, a);
                        a.startAngle = m;
                        e[l].wedge = n;
                        0 < f && (this.chartCreated || n.setAttr("opacity", this.startAlpha));
                        a.ix = q;
                        a.iy = z;
                        a.wedge = n;
                        a.index = l;
                        if (this.labelsEnabled && this.labelText && a.percents >= this.hideLabelsPercent) {
                            var h = m + p / 2;
                            360 < h && (h -= 360);
                            var r = w;
                            isNaN(a.labelRadius) || (r =
                                a.labelRadius);
                            var p = x + q * (g + r),
                                A = y + z * (g + r),
                                B, v = 0;
                            if (0 <= r) {
                                var C;
                                90 >= h && 0 <= h ? (C = 0, B = "start", v = 8) : 90 <= h && 180 > h ? (C = 1, B = "start", v = 8) : 180 <= h && 270 > h ? (C = 2, B = "end", v = -8) : 270 <= h && 360 > h && (C = 3, B = "end", v = -8);
                                a.labelQuarter = C
                            } else B = "middle";
                            var h = this.formatString(this.labelText, a),
                                t = this.labelFunction;
                            t && (h = t(a, h));
                            t = a.labelColor;
                            t || (t = this.color);
                            "" != h && (h = AmCharts.wrappedText(c, h, t, this.fontFamily, this.fontSize, B, !1, this.maxLabelWidth), AmCharts.setCN(this, h, "pie-label"), AmCharts.setCN(this, h, a.className, !0),
                                h.translate(p + 1.5 * v, A), h.node.style.pointerEvents = "none", a.tx = p + 1.5 * v, a.ty = A, 0 <= r ? (r = h.getBBox(), t = AmCharts.rect(c, r.width + 5, r.height + 5, "#FFFFFF", .005), t.translate(p + 1.5 * v + r.x, A + r.y), a.hitRect = t, n.push(h), n.push(t)) : this.freeLabelsSet.push(h), a.label = h);
                            a.tx = p;
                            a.tx2 = p + v;
                            a.tx0 = x + q * g;
                            a.ty0 = y + z * g
                        }
                        p = d + (g - d) / 2;
                        a.pulled && (p += this.pullOutRadiusReal);
                        a.balloonX = q * p + x;
                        a.balloonY = z * p + y;
                        a.startX = Math.round(q * u);
                        a.startY = Math.round(z * u);
                        a.pullX = Math.round(q * k);
                        a.pullY = Math.round(z * k);
                        this.graphsSet.push(n);
                        (0 ===
                            a.alpha || 0 < f && !this.chartCreated) && n.hide();
                        m += 360 * a.percents / 100
                    }
                0 < w && !this.labelRadiusField && this.arrangeLabels();
                this.pieXReal = x;
                this.pieYReal = y;
                this.radiusReal = g;
                this.innerRadiusReal = d;
                0 < w && this.drawTicks();
                this.initialStart();
                this.setDepths()
            }(e = this.legend) && e.invalidateSize()
        } else this.cleanChart();
        this.dispDUpd();
        this.chartCreated = !0
    },
    setDepths: function() {
        var e = this.chartData,
            f;
        for (f = 0; f < e.length; f++) {
            var c = e[f],
                b = c.wedge,
                c = c.startAngle;
            0 <= c && 180 > c ? b.toFront() : 180 <= c && b.toBack()
        }
    },
    arrangeLabels: function() {
        var e =
                this.chartData,
            f = e.length,
            c, b;
        for (b = f - 1; 0 <= b; b--) c = e[b], 0 !== c.labelQuarter || c.hidden || this.checkOverlapping(b, c, 0, !0, 0);
        for (b = 0; b < f; b++) c = e[b], 1 != c.labelQuarter || c.hidden || this.checkOverlapping(b, c, 1, !1, 0);
        for (b = f - 1; 0 <= b; b--) c = e[b], 2 != c.labelQuarter || c.hidden || this.checkOverlapping(b, c, 2, !0, 0);
        for (b = 0; b < f; b++) c = e[b], 3 != c.labelQuarter || c.hidden || this.checkOverlapping(b, c, 3, !1, 0)
    },
    checkOverlapping: function(e, f, c, b, k) {
        var d, l, a = this.chartData,
            u = a.length,
            m = f.label;
        if (m) {
            if (!0 === b)
                for (l = e + 1; l < u; l++) a[l].labelQuarter ==
                    c && (d = this.checkOverlappingReal(f, a[l], c)) && (l = u);
            else
                for (l = e - 1; 0 <= l; l--) a[l].labelQuarter == c && (d = this.checkOverlappingReal(f, a[l], c)) && (l = 0);
            !0 === d && 100 > k && (d = f.ty + 3 * f.iy, f.ty = d, m.translate(f.tx2, d), f.hitRect && (m = m.getBBox(), f.hitRect.translate(f.tx2 + m.x, d + m.y)), this.checkOverlapping(e, f, c, b, k + 1))
        }
    },
    checkOverlappingReal: function(e, f, c) {
        var b = !1,
            k = e.label,
            d = f.label;
        e.labelQuarter != c || e.hidden || f.hidden || !d || (k = k.getBBox(), c = {}, c.width = k.width, c.height = k.height, c.y = e.ty, c.x = e.tx, e = d.getBBox(), d = {},
            d.width = e.width, d.height = e.height, d.y = f.ty, d.x = f.tx, AmCharts.hitTest(c, d) && (b = !0));
        return b
    }
});