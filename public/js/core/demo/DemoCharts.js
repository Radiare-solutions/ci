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
		// Morris Area demo
		if ($('#morris-area-graph').length > 0) {
			var labelColor = $('#morris-area-graph').css('color');
			Morris.Area({
				element: 'morris-area-graph',
				behaveLikeLine: true,
				data: [
					{x: '2010', y: 10},
					{x: '2011', y: 30},
					{x: '2012', y: 20},
					{x: '2013', y: 25},
					{x: '2014', y: 55},
					{x: '2015', y: 14},
					{x: '2016', y: 34},
				],
				xkey: 'x',
				ykeys: ['y'],
				labels: ['Y'],
				gridTextColor: labelColor,
				lineColors: $('#morris-area-graph').data('colors').split(',')
			});
		}
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
