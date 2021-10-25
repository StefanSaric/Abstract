$(document).ready(function() {
    $('#datatable').dataTable({
        responsive: true,
        scrollCollapse: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
    
    $('.multitables').each(function(){
        $(this).dataTable({
            sPaginationType: "full_numbers",
            aaSorting: [],
            oColVis: {
                "buttonText": "Columns",
                "iOverlayFade": 4,
                "sAlign": "right"
            },
            oLanguage: {
                sLengthMenu: '_MENU_ entries per page',
                sSearch: '<i class="fa fa-search"></i>',
                oPaginate: {
                    sPrevious: '<i class="fa fa-angle-left"></i>',
                    sNext: '<i class="fa fa-angle-right"></i>'
                }
            }
        });
    });
});
