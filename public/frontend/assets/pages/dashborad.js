/*
 Template Name: Upcube - Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Dashboard js
 */

!(function (e) {
    "use strict";
    var a = function () {};
    (a.prototype.createAreaChart = function (e, a, r, t, i, o, c, n) {
        Morris.Area({
            element: e,
            pointSize: 0,
            lineWidth: 0,
            data: t,
            xkey: i,
            ykeys: o,
            labels: c,
            resize: !0,
            gridLineColor: "#eee",
            hideHover: "auto",
            lineColors: n,
            fillOpacity: 0.6,
            behaveLikeLine: !0,
        });
    }),
        (a.prototype.createBarChart = function (e, a, r, t, i, o) {
            Morris.Bar({
                element: e,
                data: a,
                xkey: r,
                ykeys: t,
                labels: i,
                gridLineColor: "#eee",
                barSizeRatio: 0.4,
                resize: !0,
                hideHover: "auto",
                barColors: o,
            });
        }),
        (a.prototype.createDonutChart = function (e, a, r) {
            Morris.Donut({ element: e, data: a, resize: !0, colors: r });
        }),
        (a.prototype.init = function () {
            var e = [
                { y: "2007", a: 0, b: 0, c: 0 },
                { y: "2008", a: 150, b: 45, c: 15 },
                { y: "2009", a: 60, b: 150, c: 195 },
                { y: "2010", a: 180, b: 36, c: 21 },
                { y: "2011", a: 90, b: 60, c: 360 },
                { y: "2012", a: 75, b: 240, c: 120 },
                { y: "2013", a: 30, b: 30, c: 30 },
            ];
            this.createAreaChart(
                "morris-area-example",
                0,
                0,
                e,
                "y",
                ["a", "b", "c"],
                ["Series A", "Series B", "Series C"],
                ["#0097a7", "#ffbb44", "#f32f53"]
            );
            var a = [
                { y: "2009", a: 100, b: 90, c: 40 },
                { y: "2010", a: 75, b: 65, c: 20 },
                { y: "2011", a: 50, b: 40, c: 50 },
                { y: "2012", a: 75, b: 65, c: 95 },
                { y: "2013", a: 50, b: 40, c: 22 },
                { y: "2014", a: 75, b: 65, c: 56 },
                { y: "2015", a: 100, b: 90, c: 60 },
            ];
            this.createBarChart(
                "morris-bar-example",
                a,
                "y",
                ["a", "b", "c"],
                ["Series A", "Series B", "Series C"],
                ["#4c84ff", "#6fd088", "#f75285"]
            );
            var r = [
                { label: "Bitcoin", value: 12 },
                { label: "Ethereum", value: 42 },
                { label: "Cardano", value: 20 },
                { label: "Ripple", value: 26 },
            ];
            this.createDonutChart("morris-donut-example", r, [
                "#4c84ff",
                "#ebeff2",
                "#6fd088",
                "#f75285",
            ]);
        }),
        (e.Dashboard = new a()),
        (e.Dashboard.Constructor = a);
})(window.jQuery),
    (function (e) {
        "use strict";
        e.Dashboard.init();
    })(window.jQuery);
