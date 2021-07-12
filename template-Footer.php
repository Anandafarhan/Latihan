<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    $('.edit').on('click', function(e) {
        var product = $(this).data('product');
        var cost = $(this).data('cost');
        var sale = $(this).data('sale');
        var id = $(this).data('id');
        $('#modalEdit').modal('show');
        $('#title').html("Edit " + product);
        $('#cost').val(cost);
        $('#sale').val(sale);
        $('#edid').attr('value', id);
    });

    $('.del').on('click', function(e) {
        var product = $(this).data('product');
        var id = $(this).data('id');
        $('#modalDelete').modal('show');
        $('#product').html(product);
        $('#delid').attr('value', id);
    });
</script>
</body>

</html>