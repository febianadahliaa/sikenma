$(document).ready(function() {
    // Open Modal Reset Password
    $('.open-reset-modal').click(function() {
        var nip = $(this).data('nip');
        $('input#nip').val(nip);
    })

    // Autofill Name
    $('#nip').change(function() {
        var name = $(this).find(':selected').data('name');
        $('#name').val(name);
    });

    // Datatables Perjadin
    $('.dataTables-list').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        "info": false,
        "bLengthChange": false,
        "autoWidth": false,
        "columns": [
            { "width": "5%" },
            { "width": "10%" },
            { "width": "20%" },
            null,
            { "width": "13%" },
            { "width": "12%" },
          ]
    });
    
    // Datatables Perjadin Saya
    $('.dataTable-saya').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
    
    // Datatables Pegawai
    $('.dataTable-pegawai').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
    
    // Datatables
    $('.dataTables').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        "info": false,
        "bLengthChange": false
    });

    // Auto Close Alert
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
});