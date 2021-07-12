/**
* Theme: Montran Admin Template
* Author: Coderthemes
* Chart Js Page
* 
*/

!function($) {
    "use strict";

    var ChartJs = function() {};

    ChartJs.prototype.respChart = function respChart(selector,type,data, options) {
        // get selector by context
        var ctx = selector.get(0).getContext("2d");
        // pointing parent container to make chart js inherit its width
        var container = $(selector).parent();

        // enable resizing matter
        $(window).resize( generateChart );

        // this function produce the responsive Chart JS
        function generateChart(){
            // make chart width fit with its container
            var ww = selector.attr('width', $(container).width() );
            switch(type){
                case 'Line':
                    new Chart(ctx).Line(data, options);
                    break;
            }
            // Initiate new chart or Redraw

        };
        // run function - render chart at first load
        generateChart();
    },
    //init
    ChartJs.prototype.init = function() {
        //creating lineChart
        var data = {
            labels : [
                "Tanggal 1","Tanggal 2",
                "Tanggal 3","Tanggal 4",
                "Tanggal 5","Tanggal 6",
                "Tanggal 7","Tanggal 8",
                "Tanggal 9","Tanggal 10",
                "Tanggal 11","Tanggal 12",
                "Tanggal 13","Tanggal 14",
                "Tanggal 15","Tanggal 16",
                "Tanggal 17","Tanggal 18",
                "Tanggal 19","Tanggal 20",
                "Tanggal 21","Tanggal 21",
                "Tanggal 23","Tanggal 24",
                "Tanggal 25","Tanggal 26",
                "Tanggal 27","Tanggal 28",
                "Tanggal 29","Tanggal 30",
                ],
            datasets : [
                {
                    fillColor : "rgba(49, 126, 235, 0.75)",
                    strokeColor : "rgba(49, 126, 235, 0.75)",
                    pointColor : "#29b6f6",
                    pointStrokeColor : "rgba(49, 126, 235, 0.75)",
                    data : [
                        33,52,63,92,50,
                        53,46,33,52,63,
                        92,50,53,0,0,
                        0,0,0,0,0,
                        0,0,0,0,0,
                        0,0,0,0,0
                    ]
                },
                
                {
                    fillColor : "#dcdcdc",
                    strokeColor : "#dcdcdc",
                    pointColor : "#7e57c2",
                    pointStrokeColor : "#dcdcdc",
                    data : [
                        15,25,40,35,32,
                        91,33,15,25,40,
                        35,32,93,0,0,
                        0,0,0,0,0,
                        0,0,0,0,0,
                        0,0,0,0,0
                    ]
                }

            ]
        };
        
        this.respChart($("#lineChart"),'Line',data);
    },
    $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.ChartJs.init()
}(window.jQuery);