/****************************************
 *       Default Order Table           *
 ****************************************/
$(document).ready(function() {
    // DataTables initialization code
    $('#default_order').DataTable({
        "order": [
            [0, "asc"]
        ],
        "lengthMenu": [
            [5, 15, 15, -1], // Display options
            [5, 10, 15, 'All'] // Values
        ]
    });
});