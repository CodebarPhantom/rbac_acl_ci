/* ------------------------------------------------------------------------------
 *
 *  # Fixed Columns extension for Datatables
 *
 *  Demo JS code for datatable_extension_fixed_columns.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var DatatableFixedColumns = function() {


    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableFixedColumns = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        //
        // Fixed column with complex headers
        //
        
        // Initialize
        var table = $('.datatable-fixed-complex').DataTable({
           
            ordering: false,
            autoWidth: false,            
            scrollX: true,
            scrollY: '500px',
            scrollCollapse: true,
            paging:  false,
            bInfo : false,
            bFilter: false,
            fixedColumns:   {
                leftColumns: 1
            },
            buttons: [{
                extend: 'excelHtml5',
                className : 'hidden'
                
            }]

                
             
        });

        var tablebudget =$('.datatable-nobutton').DataTable({
           
            ordering: false,
            autoWidth: true,            
            scrollX: true,
            scrollY: '450px',
            scrollCollapse: true,
            paging:  false,
            bInfo : false,
            bFilter: false,
            fixedColumns:   {
                leftColumns: 3
            }               
             
        });

        var tabledsr =$('.datatable-nobutton-1column').DataTable({
           
            ordering: false,
            autoWidth:true,            
            scrollX: true,
            scrollY: '400px',
            scrollCollapse: true,
            paging:  false,
            bInfo : false,
            bFilter: false,
            fixedColumns:   {
                leftColumns: 1
            }               
             
        });

        //custom button biar ga makan banyak space buttons-excel, csv pdf dll bawaan dari datatable
        $("#ExportReporttoExcel").on("click", function() {
            table.button( '.buttons-excel').trigger();
        });

        // Adjust columns on window resize
        setTimeout(function() {
            $(window).on('resize', function () {
                table.columns.adjust();
                tablebudget.columns.adjust();
                tabledsr.columns.adjust();
            });
        }, 100);
    };

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableFixedColumns();
            _componentSelect2();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableFixedColumns.init();
});
