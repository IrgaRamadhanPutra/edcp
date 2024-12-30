<div class="modal fade bd-example-modal-lg edit-masterdata" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="edit-masterdata" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white border-bottom">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata Mesin --Edit--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        {{-- <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div> --}}
                        <form id="form-masterdata-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('post')
                            @include('master-data-mesin.modal.edit-data.form')
                            <br>
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-secondary addRowEdit" id="addRowEdit"> Add Item</button> --}}
                                <button type="button" style="background: rgb(16, 130, 175);" class="btn btn-secondary "
                                    data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;Close</button>

                                <button type="button" style="background: rgb(16, 130, 175);"
                                    class="btn btn-secondary updateMasterdata"><i class="fa-solid fa-floppy-disk"></i>
                                    Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // EDIT PAGE
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        // document.getElementById('types_create_jtype').focus();
        var id = $(this).attr('row-id');
        // console.log(id);
        // alert(id);
        $('#id_masterdata_edit').val(id);
        $('#edit-masterdata').modal('show');
        // $('.modal-title').text('Master Data Mesin (Edit)');

        Editdata(id);
    });
    //  VIEW DATA EDIT FROM AJAX
    function Editdata(id) {
        var route = "{{ route('edit_master_data', ':id') }}";
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
                $('#name_edit').val(data[0].name_mesin);
                $('#type_edit').val(data[0].type);
                $('#desc_edit').val(data[0].descript);
            }
        });
    }
    $('.modal-footer').on('click', '.updateMasterdata', function() {
        // alert("masuk");
        var name = $('#name_edit').val();
        var type = $('#type_edit').val();

        // console.log(id);
        $.ajax({
            url: "{{ route('validasi_type2') }}",
            type: "POST",
            dataType: 'json',
            data: {
                name: name,
                type: type
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // console.log(data);

                if (data == '') {
                    var id = document.getElementById('id_masterdata_edit').value;
                    var route = "{{ route('update_master_data', ':id') }}";
                    route = route.replace(':id', id);
                    // $('.updateStout').html('Saving...');
                    // $('.updateMaster').html('Saving...')
                    $.ajax({
                        url: route,
                        type: "POST",
                        dataType: 'json',
                        data: $('#form-masterdata-edit').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            // console.log(data);
                            clear_Masteradd();
                            Swal.fire({
                                icon: 'success',
                                title: 'Successfully!',
                                text: 'Data berhasil di update',
                                timer: 3000
                            }).then(function() {
                                $('#edit-masterdata').modal('hide');
                                $('#masterdata_mesin-datatables').DataTable()
                                    .ajax.reload();
                            });

                            // location.reload();
                        },
                        error: function(data) {
                            // console.log(data);
                        }
                    });

                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        timer: 2500,
                        text: 'Name dan Type Mesin Tidak Boleh Sama!',
                    });
                }
                // console.log(data);
            }
        });
        // }
        // return false;
    });
</script>
