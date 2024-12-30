<div class="modal fade bd-example-modal-lg modalviewcheckpoint" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="viewModalcheckpoint" role="dialog">
    <div class="modal-dialog modal-dialog-centered mt-5 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body">
                        <form method="POST">
                            @csrf
                            @include('master-data-checkpoint.modal.view-data.form')
                            <hr>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Done</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.view', function(e) {
        e.preventDefault();
        var id = $(this).attr('row-id');
        // console.log(id);
        // alert(id);
        $('#viewModalcheckpoint').modal('show');
        $('.modal-title').text('Master Data CheckPoint (View)');
        getDetail(id, 'VIEW')
        // $('#itemcode_create').focus();
    });

    function getDetail(id, method) {
        var route = "{{ route('view_master_check') }}";
        route = route.replace(':id', id);
        $.ajax({
            url: route,
            method: 'get',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#name_view').val(data.name_mesin);
                $('#type_view').val(data.type);
                $('#kategori_view').val(data.kategori);
                $('#standart_view').val(data.standard);
            }
        });
    }
</script>
