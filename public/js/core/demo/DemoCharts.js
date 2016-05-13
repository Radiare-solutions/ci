(function (namespace, $) {
    "use strict";

    var DemoCharts = function () {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function () {
            o.initialize();
        });

    };
    var p = DemoCharts.prototype;

// =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function () {



        // Morris
        this._initMorris();

        // Knob
        this._initKnob();
    };

// =========================================================================
    // MORRIS
    // =========================================================================

    p._initMorris = function () {
        if (typeof Morris !== 'object') {
            return;
        }

        var sampleDataYear = [
            {x: '2010', y: 10, url: "results-text.html"},
            {x: '2011', y: 30, url: "results-text.html"},
            {x: '2012', y: 20, url: "results-text.html"},
            {x: '2013', y: 25, url: "results-text.html"},
            {x: '2014', y: 55, url: "results-text.html"},
            {x: '2015', y: 14, url: "results-text.html"},
            {x: '2016', y: 34, url: "http://www.google.com"},
        ];



        // Morris Area demo
        if ($('#morris-area-graph').length > 0) {
            var labelColor = $('#morris-area-graph').css('color');
            Morris.Area({
                element: 'morris-area-graph',
                behaveLikeLine: true,
                data: sampleDataYear,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Studies'],
                gridTextColor: labelColor,
                lineColors: $('#morris-area-graph').data('colors').split(',')
            });
        }

        $("#morris-area-graph").click(function () {
            var newValue;
            var newValue = $(this).find("div.morris-hover-row-label").text();

            console.log(newValue);
            for (var index = 0; index < sampleDataYear.length; index++)
            {
//     console.log(arr[index]);
                if (sampleDataYear[index].x == newValue)
                {
                    window.location = sampleDataYear[index].url;
                }
            }
// console.log(sampleDataYear[0].x);
        });



       /* var sampleDataSponser = [
            {y: 'Abbott', a: 120, url: "results-text.html"},
            {y: 'Clalit Health Services Other', a: 115, url: "results-text.html"},
            {y: 'Rabin Medical Center', a: 105, url: "results-text.html"},
            {y: 'Pfizer', a: 96, url: "results-text.html"},
            {y: 'Medical University of Vienna', a: 82, url: "results-text.html"},
            {y: 'Mylan Inc. Industry', a: 80, url: "results-text.html"},
            {y: 'UCB Pharma SA Industry', a: 77, url: "results-text.html"},
            {y: 'Peter Higgins Other', a: 75, url: "results-text.html"},
            {y: 'AbbVie', a: 60, url: "results-text.html"},
            {y: 'Innovaderm Research Inc', a: 50, url: "results-text.html"},
            {y: 'Janssen Research & Development, LLC Industry', a: 40, url: "results-text.html"},
        ];



        if ($('#morris-bar-graph').length > 0) {
            Morris.Bar({
                element: 'morris-bar-graph',
                data: sampleDataSponser,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Studies'],
                gridTextColor: '#000',
                barColors: $('#morris-bar-graph').data('colors').split(',')
            });
        }
        $("#morris-bar-graph").click(function () {
            var newValue;
            var newValue = $(this).find("div.morris-hover-row-label").text();

            console.log(newValue);
            for (var index = 0; index < sampleDataSponser.length; index++)
            {
//     console.log(arr[index]);
                if (sampleDataSponser[index].y == newValue)
                {
                    window.location = sampleDataSponser[index].url;
                }
            }
// console.log(sampleDataYear[0].x);
        });*/


    };



    p._initKnob = function () {
        if (!$.isFunction($.fn.knob)) {
            return;
        }

        $('.dial').each(function () {
            var options = materialadmin.App.getKnobStyle($(this));
            $(this).knob(options);
        });
    };

    // =========================================================================
    namespace.DemoCharts = new DemoCharts;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
