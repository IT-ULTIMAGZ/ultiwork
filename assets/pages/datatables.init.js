/**
* Theme: Moltran Admin Template
* Author: Coderthemes
* Component: Datatable
* 
*/
var handleDataTableButtons=function(){
    "use strict";
    0!==$("#datatable-buttons").length&&
    $("#datatable-buttons").DataTable({
        dom:"Bfrtip",
        buttons:[
            {
                extend:"excel",
                className:"btn-sm"
            },
            {
                extend:"pdf",
                orientation: 'landscape',
                className:"btn-sm"
            },
            {
                extend:"print",
                orientation: 'landscape',
                className:"btn-sm"
            },
            'colvis',
            ],
            responsive:!0,
    });
    $("#datatable-buttons2").DataTable({
        dom:"Bfrtip",
        buttons:[
            {
                extend:"excel",
                className:"btn-sm"
            },
            {
                extend:"pdf",
                orientation: 'landscape',
                className:"btn-sm"
            },
            {
                extend:"print",
                orientation: 'landscape',
                className:"btn-sm"
            },
            'colvis',
            ],
            responsive:!0,
    });
    $("#datatable-responsive").DataTable({
        responsive:!0
    })
},
TableManageButtons=function(){
    "use strict";
    return{
        init:function(){
            handleDataTableButtons()
        }
    }
}();