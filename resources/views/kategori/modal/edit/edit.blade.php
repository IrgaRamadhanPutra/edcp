<div class="modal fade bd-example-modal-lg edit-master_kategori" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="edit-master_kategori" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white border-bottom">
                <h4 class="modal-title formM"><i class="fa-brands fa-pix"></i> Master Data Kategori --Edit--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        {{-- <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div> --}}
                        <form id="form-master_kategori-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('post')
                            @include('kategori.modal.edit.form')
                            <br>
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-secondary addRowEdit" id="addRowEdit"> Add Item</button> --}}
                                <button type="button" style="background: rgb(16, 130, 175);" class="btn btn-secondary "
                                    data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;Close</button>

                                <button type="button" style="background: rgb(16, 130, 175);"
                                    class="btn btn-secondary updatemaster_kategori"><i
                                        class="fa-solid fa-floppy-disk"></i>
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
        $('#id_masterkategori_edit').val(id);
        $('#edit-master_kategori').modal('show');
        // $('.modal-title').text('Master Master Kategori (Edit)');
        Editdata(id);
    });

    function Editdata(id) {
        var route = "{{ route('edit_master_kategori', ':id') }}";
        route = route.replace(':id', id);
        // alert(route);
        $.ajax({
            url: route,
            method: 'get',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('#edit_kategori').val(data.kategori);
            }
        });
    }
    $('.modal-footer').on('click', '.updatemaster_kategori', function() {
        // alert("masuk");
        var edit_kategori = $('#edit_kategori').val();

        var condtion = !edit_kategori
        if (condtion) {
            swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                timer: 2500,
                text: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!',
            });
            // })
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('validasi_kategori2') }}",
                type: "POST",
                data: {
                    edit_kategori: edit_kategori // Pass the value of the input field, not the jQuery object
                },
                dataType: 'json',
                success: function(data) {
                    if (data == '') {
                        var id = document.getElementById('id_masterkategori_edit').value;
                        // console.log(id);
                        var route = "{{ route('update_master_kategori', ':id') }}";
                        route = route.replace(':id', id);
                        // $('.updateStout').html('Saving...');
                        // $('.updateMaster').html('Saving...')
                        $.ajax({
                            url: route,
                            type: "POST",
                            dataType: 'json',
                            data: $('#form-master_kategori-edit').serialize(),
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
                                    $('#edit-master_kategori').modal('hide');
                                    $('#masterdata-kategori-datatables')
                                        .DataTable().ajax.reload();
                                });

                                // location.reload();
                            },
                            error: function(data) {
                                // console.log(data);
                            }
                        });
                    } else {
                        // alert('eror');
                        swal.fire({
                            icon: 'warning',
                            title: 'Perhatian',
                            timer: 2500,
                            text: 'Kategori Tidak Boleh Sama!',
                        });
                    }

                }
            });

        }
        // return false;
    });
</script>
