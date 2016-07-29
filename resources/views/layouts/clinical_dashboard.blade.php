<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->

        <link rel="stylesheet" href="{{ URL::asset("dist/jqcloud.min.css") }}">
        <!-- BEGIN PLUGIN CSS -->
        <link href="{{ URL::asset("css/theme-1/libs/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/libs/morris/morris.core.css?1420463396") }}" />
        <!-- END PLUGIN CSS -->
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset("css/theme-1/bootstrap.css?1422792965") }}" />
        <link href="{{ URL::asset("css/bootstrap-theme.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/font-awesome.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/animate.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/theme-1/libs/jquery-scrollbar/jquery.scrollbar.css")}}" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="{{ URL::asset("css/style.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/responsive.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom-icon-set.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset("css/custom.css")}}" rel="stylesheet" type="text/css"/>

        <link href="{{ URL::asset("css/theme-2/libs/c3/c3.css")}}" rel="stylesheet" type="text/css">
        <style>
            .height-60{
                height:55px

            }
            .bg-head-blue{
                background:#0094D2;

            }
            body {
                //background:url( {{ URL::asset("images/bg.jpg") }}) !important;            
                }
            </style>


        </head>
        <!-- END HEAD -->

        <!-- BEGIN BODY -->
        <body class="horizontal-menu">

            <?php echo View::make('header')->render(); ?>

            <!-- BEGIN CONTAINER -->
            <div class="page-container row-fluid" style="padding-top:60px;">

                <!-- BEGIN PAGE CONTAINER-->
                <div class="page-content"> 




                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div id="portlet-config" class="modal hide">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button"></button>
                            <h3>Widget Settings</h3>
                        </div>
                        <div class="modal-body"> Widget settings form goes here </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content " style="padding-top:10px !important;">  
                        @yield('content')
                    </div>
                </div>

            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN CORE JS FRAMEWORK--> 
            <script src="{{ URL::asset("js/plugins/jquery-1.8.3.min.js") }}" type="text/javascript"></script> 
            <script src="{{ URL::asset("js/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js") }}" type="text/javascript"></script> 
            <script src="{{ URL::asset("js/plugins/bootstrapv3/bootstrap.min.js") }}" type="text/javascript"></script> 
            <script src="{{ URL::asset("js/plugins/breakpoints.js") }}" type="text/javascript"></script> 
            <script src="{{ URL::asset("js/plugins/jquery-unveil/jquery.unveil.min.js") }}" type="text/javascript"></script> 
            <!-- END CORE JS FRAMEWORK --> 
            <!-- BEGIN PAGE LEVEL JS --> 	
            <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="{{ URL::asset("js/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }}" type="text/javascript"></script>
            <script src="{{ URL::asset("js/plugins/pace/pace.min.js") }}" type="text/javascript"></script>  
            <script src="{{ URL::asset("js/plugins/jquery-numberAnimate/jquery.animateNumbers.js") }}" type="text/javascript"></script>
            <script src="{{ URL::asset("js/plugins/morris.js/morris.min.js") }}"></script>
            <!-- END PAGE LEVEL PLUGINS --> 	

            <!-- BEGIN CORE TEMPLATE JS --> 
            <script src="{{ URL::asset("js/core.js") }}" type="text/javascript"></script> 
            <script src="{{ URL::asset("js/chat.js") }}" type="text/javascript"></script> 
            <script src="{{ URL::asset("js/demo.js") }}" type="text/javascript"></script> 
            <!-- END CORE TEMPLATE JS --> 

            <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
            <script src="{{ URL::asset("js/plugins/c3/c3.js") }}"></script>
            <script src="{{ URL::asset("js/plugins/jqcloud/jqcloud.js") }}"></script>
            <script src="{{ URL::asset("js/plugins/html2canvas.js") }}"></script>
            <script src="{{ URL::asset("js/plugins/canvas2image.js") }}"></script>
             <!--<script src="dist/core_tests.js"></script>-->
            <script>

var words = <?php echo ($conditionData); ?>;

var colors = ['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'];

// $('#condition').jQCloud(words);


$('#condition').jQCloud(words
        // , {
        // classPattern: null,
        // colors: ['#4f649b', '#daf252', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36'],
        // fontSize: {
        //   from: 0.1,
        //   to: 0.02
        // }
        // }
        );
setTimeout(function () {
    var obj = $("#condition").data("jqcloud");
    var data = obj.word_array;
    // console.log(data);
    for (var i in data) {
        $("#" + data[i]["attr"]["id"]).css("color", colors[i]);
    }
}, 100);



            </script>
            <script>
                var sampleDataYear = <?php echo ($estimatedCompletionData); ?>;

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

                var sampleDataSponser =<?php echo ($sponsorData); ?>

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
                        if (sampleDataSponser[index].y == newValue)
                        {
                            window.location = sampleDataSponser[index].url;
                        }
                    }
                });


                var samplePhase =<?php echo ($phaseData); ?>;
                var chart = c3.generate({
                    bindto: '.c3-donut',
                    data: {
                        columns: samplePhase,
                        type: 'pie',
                        onclick: function (d, i) {

                            for (var j = 0; j < samplePhase.length; j++) {
                                // console.log(samplePhase[j][0]);
                                // console.log(d);
                                if (samplePhase[j][0] == d.id) {
                                    //console.log(samplePhase[j][2]);
                                    window.location = samplePhase[j][2];
                                }
                            }
                        },
                        order: null // set null to disable sort of data. desc is the default.
                    },
                    color: {
                        pattern: ['#4f649b', '#56a55b', '#17becf', '#bf6565', '#e377c2', '#9fdf8a', '#daf252', '#d62728', '#ff9896', '#47315b', '#aa0f3b', '#c49c94', '#5d6b06', '#0d4b77', '#c69345', '#1a4dce', '#d3935b', '#d66119', '#466b40', '#123d36']
                    },
                    legend: {
                        show: true,
                        position: 'right'
                    },
                    pie: {
                        label: {
                            format: function (value) {
                                return value;
                            }
                        },
                        title: "Phase",
                        width: 40
                    }

                });





            </script>



            <script src="{{ URL::asset("js/d3plus.js") }}"></script>

            <script>
                var sample_status =<?php echo ($statusData); ?>;
                var visualization = d3plus.viz()
                        .container("#viz")
                        .data(sample_status)
                        .type("tree_map")
                        .id("name")
                        .size("value")
                        .labels({"resize": false, "font": {"size": 13}})
                        .font({"weight": "500"})
                        .mouse({
                            "move": true, // key will also take custom function
                            "click": function (e) {
                                window.location.href = e.url;
                            }
                        })
                        .draw();

                var sample_drug = <?php echo ($drugData); ?>;

                var visualization = d3plus.viz()
                        .container("#viz1")
                        .data(sample_drug)
                        .type("bubbles")
                        .id("name")
                        .size("value")
                        .labels({"resize": false, "font": {"size": 10}})
                        .mouse({
                            "move": true, // key will also take custom function
                            "click": function (e) {
                                window.location.href = e.url;
                            }
                        })
                        .draw()
            </script>
            
            <script type="text/javascript" src="http://gabelerner.github.io/canvg/rgbcolor.js"></script> 
<script type="text/javascript" src="http://gabelerner.github.io/canvg/StackBlur.js"></script>
<script type="text/javascript" src="http://gabelerner.github.io/canvg/canvg.js"></script> 


            <script type="text/javascript">
                function div2image(div_id) {
                    exportImageAsPNG(div_id);
                    
                     /*var test = $('#condition_section').html();
                     html2canvas($("#phase-section"), {
                        onrendered: function (canvas) {
                            Canvas2Image.saveAsPNG(canvas);        
                            //$("canvas#test").html("hello");
                        }
                    });
                     //var svg = '<svg>'+test+'</svg>';
                     //svg = $(svg).html();
                     $(canvas).html(test);
                     //canvas.toDataURL('image/png');
                     //canvg(document.getElementById('canvas'), svg);   
                     //$(canvas).html(svg);
                     
                     // console.log(svg);
//                    var canvas = document.getElementById('canvas');
//                    var ctx = canvas.getContext('2d');
//                    var test = $('#phase-section').html();
//                    var data = '<svg xmlns="http://www.w3.org/2000/svg" width="433" height="287">' +
//                            '<foreignObject width="100%" height="100%">' +
//                            '<div xmlns="http://www.w3.org/1999/xhtml" style="font-size:40px">' +
//                             test +
//                            '</div></foreignObject>' +
//                            '</svg>';
//
//                    var DOMURL = window.URL || window.webkitURL || window;
//
//                    var img = new Image();
//                    var svg = new Blob([data], {type: 'image/svg+xml'});
//                    var url = DOMURL.createObjectURL(svg);
//
//                    img.onload = function () {
//                        ctx.drawImage(img, 0, 0);
//                        DOMURL.revokeObjectURL(url);
//                    }
//
//                    img.src = url;
//                    document.write('<img src="'+img.src+'">');

                    // -------------------------------
                   /* html2canvas($("#phase-section"), {
                        onrendered: function (canvas) {

                            //$("canvas#test").html("hello");
                            //var data = getImageData((canvas, 433,287, $('#phase-section').html()));
                            //var data = $("canvas#test").html();
                            //canvas = btoa($('#phase-section').html());
                            $(canvas).html(($('#phase-section').html()));
                            //var img = canvas.toDataURL("image/png");

                            //console.log(canvas);
                            //document.body.appendChild(canvas);
                            // Canvas2Image.saveAsPNG(canvas); 
                            //$("#img-out").append(canvas);
                            //var canvas = $(canvas);

                            //document.write('<img src="' + img + '"/>');
                             theCanvas = canvas;
                             document.body.appendChild(canvas);
                             
                             // Convert and download as image 
                            // Canvas2Image.saveAsPNG(canvas); 
                             $("#img-out").append(canvas);
                             // Clean up 
                             //document.body.removeChild(canvas);
                             
                        }
                    });*/
                }
            </script>
            
            <script>
                SVGElement.prototype.toDataURL = function(type, options) {
        var _svg = this;
        
        function debug(s) {
            console.log("SVG.toDataURL:", s);
        }

        function exportSVG() {
            var svg_xml = XMLSerialize(_svg);
            var svg_dataurl = base64dataURLencode(svg_xml);
            debug(type + " length: " + svg_dataurl.length);

            // NOTE double data carrier
            if (options.callback) options.callback(svg_dataurl);
            return svg_dataurl;
        }

        function XMLSerialize(svg) {

            // quick-n-serialize an SVG dom, needed for IE9 where there's no XMLSerializer nor SVG.xml
            // s: SVG dom, which is the <svg> elemennt
            function XMLSerializerForIE(s) {
                var out = "";
                
                out += "<" + s.nodeName;
                for (var n = 0; n < s.attributes.length; n++) {
                    out += " " + s.attributes[n].name + "=" + "'" + s.attributes[n].value + "'";
                }
                
                if (s.hasChildNodes()) {
                    out += ">\n";

                    for (var n = 0; n < s.childNodes.length; n++) {
                        out += XMLSerializerForIE(s.childNodes[n]);
                    }

                    out += "</" + s.nodeName + ">" + "\n";

                } else out += " />\n";

                return out;
            }

            
            if (window.XMLSerializer) {
                debug("using standard XMLSerializer.serializeToString")
                return (new XMLSerializer()).serializeToString(svg);
            } else {
                debug("using custom XMLSerializerForIE")
                return XMLSerializerForIE(svg);
            }
        
        }

        function base64dataURLencode(s) {
            var b64 = "data:image/svg+xml;base64,";
            // https://developer.mozilla.org/en/DOM/window.btoa
            if (window.btoa) {
                debug("using window.btoa for base64 encoding");
                b64 += btoa(s);
            } else {
                debug("using custom base64 encoder");
                b64 += Base64.encode(s);
            }
            
            return b64;
        }

        function exportImage(type) {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext('2d');

            // TODO: if (options.keepOutsideViewport), do some translation magic?

            var svg_img = new Image();
            var svg_xml = XMLSerialize(_svg);
            svg_img.src = base64dataURLencode(svg_xml);

            svg_img.onload = function() {
                debug("exported image size: " + [svg_img.width, svg_img.height])
                canvas.width = svg_img.width;
                canvas.height = svg_img.height;
                ctx.drawImage(svg_img, 0, 0);

                // SECURITY_ERR WILL HAPPEN NOW
                var png_dataurl = canvas.toDataURL(type);
                debug(type + " length: " + png_dataurl.length);

                if (options.callback) options.callback( png_dataurl );
                else debug("WARNING: no callback set, so nothing happens.");
            }
            
            svg_img.onerror = function() {
                console.log(
                    "Can't export! Maybe your browser doesn't support " +
                    "SVG in img element or SVG input for Canvas drawImage?\n" +
                    "http://en.wikipedia.org/wiki/SVG#Native_support"
                );
            }

            // NOTE: will not return anything
        }

        function exportImageCanvg(type) {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext('2d');
            var svg_xml = XMLSerialize(_svg);
						console.log(svg_xml);
            // NOTE: canvg gets the SVG element dimensions incorrectly if not specified as attributes
            //debug("detected svg dimensions " + [_svg.clientWidth, _svg.clientHeight])
            //debug("canvas dimensions " + [canvas.width, canvas.height])

            var keepBB = options.keepOutsideViewport;
            if (keepBB) var bb = _svg.getBBox();

            // NOTE: this canvg call is synchronous and blocks
            canvg(canvas, svg_xml, { 
                ignoreMouse: true, ignoreAnimation: true,
                offsetX: keepBB ? -bb.x : undefined, 
                offsetY: keepBB ? -bb.y : undefined,
                scaleWidth: keepBB ? bb.width+bb.x : undefined,
                scaleHeight: keepBB ? bb.height+bb.y : undefined,
                renderCallback: function() {
                    debug("exported image dimensions " + [canvas.width, canvas.height]);
                    var png_dataurl = canvas.toDataURL(type);
                    debug(type + " length: " + png_dataurl.length);
        
                    if (options.callback) options.callback( png_dataurl );
                },
                useCORS: false
            });

            // NOTE: return in addition to callback
            return canvas.toDataURL(type);
        }

        // BEGIN MAIN

        if (!type) type = "image/svg+xml";
        if (!options) options = {};

        if (options.keepNonSafe) debug("NOTE: keepNonSafe is NOT supported and will be ignored!");
        if (options.keepOutsideViewport) debug("NOTE: keepOutsideViewport is only supported with canvg exporter.");
        
        switch (type) {
            case "image/svg+xml":
                return exportSVG();
                break;

            case "image/png":
            case "image/jpeg":

                if (!options.renderer) {
                    if (window.canvg) options.renderer = "canvg";
                    else options.renderer="native";
                }

                switch (options.renderer) {
                    case "canvg":
                        debug("using canvg renderer for png export");
                        return exportImageCanvg(type);
                        break;

                    case "native":
                        debug("using native renderer for png export. THIS MIGHT FAIL.");
                        return exportImage(type);
                        break;

                    default:
                        debug("unknown png renderer given, doing noting (" + options.renderer + ")");
                }

                break;

            default:
                debug("Sorry! Exporting as '" + type + "' is not supported!")
        }
    }

        /*genChart();
		var nodeList = document.getElementById('chart').querySelector('svg').querySelectorAll('.c3-chart path');
		var nodeList2 = document.getElementById('chart').querySelector('svg').querySelectorAll('.c3-axis path');
		var nodeList3 = document.getElementById('chart').querySelector('svg').querySelectorAll('.c3 line');
		var line_graph = Array.from(nodeList);
		var x_and_y = Array.from(nodeList2).concat(Array.from(nodeList3));
		line_graph.forEach(function(element){
			element.style.fill = "none";
		})
		x_and_y.forEach(function(element){
			element.style.fill = "none";
			element.style.stroke = "black";
		})
        exportImageAsPNG();
*/
    function genChart() {
       /*var chart = c3.generate({
			data: {
				columns: [
					['data1', 30, 200, 100, 400, 150, 250],
					['data2', 50, 20, 10, 40, 15, 25]
				]
			}
		}); */

    }


    function exportImageAsPNG(div_id){
         var svgElement = document.getElementById(div_id).querySelector('condition'); //.querySelector('condition');
        var img = document.getElementById("canvas");
        console.log(svgElement);
      //   $(canvas).html(svgElement);
                            //var img = canvas.toDataURL("image/png");
 svgElement.toDataURL("image/png", {
            callback: function(data) {     
                $("#canvas1").attr("href", data);
                data = data.replace('data:image/png;base64,', 'data:application/octet-stream;base64,');
                //window.open(data);
                img.setAttribute("src", data);
            }
        });
                            //console.log(canvas);
                            //document.body.appendChild(canvas);
                            //Canvas2Image.saveAsPNG(canvas); 
                            console.log(svgElement);/*                                                                   
                            var content = $(div_id).html();
                //var data = svgElement.html('data:application/octet-stream;base64,');
                $(svgElement).html('data:application/octet-stream;base64,'+(content));                
                $(svgElement).html(content);
                console.log($(svgElement).html());
                window.open($(svgElement).html());                            
                            
/*        svgElement.toDataURL("image/png", {
            callback: function(data) {     
                $("#canvas1").attr("href", data);
                data = data.replace('data:image/png;base64,', 'data:application/octet-stream;base64,');
                window.open(data);
                img.setAttribute("src", data);
            }
        });*/
    }

                </script>
                <canvas></canvas>
                <a href="" id="canvas1">
<img id="canvas" width="200px" height="200px" src="">
                </a>
        </body>
    </html>