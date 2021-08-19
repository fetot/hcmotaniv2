$(document).ready(function () {
    $('#cetaktabel').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'print', 'excel',{extend: 'pdfHtml5',pageSize: 'LEGAL',orientation: 'landscape'}
        ],
        paging: false
        });
    });