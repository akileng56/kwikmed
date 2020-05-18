/* 
 *Common Methods used throughout the system
 */


//1. Load the datatables for list data when the page has fully loaded
$(document).ready(function () {
    $('#records_list').DataTable({
        paging: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
});

$(document).ready(function () {
    $('#records').DataTable({
        paging: true,
    });
});
$(document).ready(function() {
    $('#membership_list').DataTable( {
        paging: true,
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf', 'print'
        ]
    } );
} );

$('.reassign-check-all').click(function() {
    var selector = $(this).is(':checked') ? ':not(:checked)' : ':checked';

    $('#reassignform-ticketsassigned input[type="checkbox"]' + selector).each(function() {
        $(this).trigger('click');
    });
});