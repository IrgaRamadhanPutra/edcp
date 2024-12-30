<div class="modal fade bd-example-modal-lg modalcreatemasterdata" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="view-masterdata-mesin" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white border-bottom">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata Desc --View--</h4>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body">
                        <form method="POST">
                            @csrf
                            @include('master-data-mesin.modal.view-data.form')
                            {{-- @include('master_staff.modal.create.form') --}}
                            <hr>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background: rgb(16, 130, 175);" class="btn btn-secondary"
                            data-dismiss="modal">Done</button>
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
        $('#view-masterdata-mesin').modal('show');
        // $('.modal-title').text('Master Data Mesin (View)');
        getDetail(id, 'VIEW')
        // $('#itemcode_create').focus();
    });
    //  VIEW DATA SHOW DETAIL FROM AJAX
    function getDetail(id, method) {
        var route = "{{ route('view_master_data') }}";
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
                $('#name_view').val(data[0].name_mesin);
                $('#type_view').val(data[0].type);
                $('#desc_view').val(data[0].descript);
            }
        });
    }
</script>
