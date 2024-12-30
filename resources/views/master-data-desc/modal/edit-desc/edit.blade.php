<div class="modal fade bd-example-modal-lg edit-master-desc" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="edit-master-desc" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title formM"><i class="fa-brands fa-pix"></i> Master data Desc -- Edit --</h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        {{-- <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div> --}}
                        <form id="form-masterdata-desc-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('post')
                            <input type="hidden" name="edit_master_desc" id="edit_master_desc">
                            <br>
                            @include('master-data-desc.modal.edit-desc.form')
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-primary addRowEdit" id="addRowEdit"> Add Item</button> --}}
                                <button type="button"class="btn btn-secondary" style="background: rgb(16, 130, 175)"
                                    onclick="clearedit()" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                                    &nbsp;Close</button>

                                <button type="button" style="background: rgb(16, 130, 175)"
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
    // clear edit
    function clearedit() {
        $('#kategori_edit').val("");
        $('#standart_edit').val("");
    }
    // get mster data kategori
    function Getdatakategoriedit() {
        $('#ItemModalAdd2').modal('show');
        var lookUpdataItem2 = $('#lookUpdataItem2').DataTable();
        lookUpdataItem2.destroy();
        var lookUpdataItem2 = $('#lookUpdataItem2').DataTable({
            // your DataTable initialization code here
            "pagingType": "numbers",
            ajax: {
                url: "{{ route('get_master_kategori') }}",
            },
            serverSide: true,
            deferRender: true,
            responsive: true,
            // processing: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            searching: true,
            columns: [{
                    data: 'kategori',
                    name: 'Kategori',
                    width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                    className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                    "render": function(data, type, row,
                        meta) { // mengatur ukuran font pada kolom
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                },
                {
                    data: 'status',
                    name: 'Status',
                    width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                    className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                    "render": function(data, type, row,
                        meta) { // mengatur ukuran font pada kolom
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                },
            ],

            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpdataItem2 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem2 = [];
                    var rowItem2 = $(this);
                    var rowItem2 = lookUpdataItem2.rows(rowItem2).data();
                    $.each($(rowItem2), function(key, value) {
                        document.getElementById("kategori_edit").value =
                            value[
                                "kategori"];
                        $('#ItemModalAdd2').modal('hide');
                        // $('#pic_create').focus();
                    });
                });

            },

        });

    }
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        // document.getElementById('types_create_jtype').focus();
        var id = $(this).attr('row-id');
        // console.log(id);
        // alert(id);
        $('#edit_master_desc').val(id);
        $('#edit-master-desc').modal('show');
        // $('.modal-title').text('Master Data desc (Edit)');
        Editdata(id);

    });

    function Editdata(id) {
        var route = "{{ route('Edit_master_desc', ':id') }}";
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
                $('#kategori_edit').val(data.kategori);
                $('#standart_edit').val(data.standard);
            }
        });
    }

    //update data for edit master data desc
    $('.modal-footer').on('click', '.updateMasterdata', function() {
        // alert("masuk");
        var standart_edit = $('#standart_edit').val();

        var condtion = !standart_edit
        if (condtion) {
            swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                timer: 2500,
                text: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!',
            });
            // })
        } else {
            var id = document.getElementById('edit_master_desc').value;
            // console.log(id);
            var route = "{{ route('update_master_desc', ':id') }}";
            route = route.replace(':id', id);
            $.ajax({
                url: route,
                type: "POST",
                dataType: 'json',
                data: $('#form-masterdata-desc-edit').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // console.log(data);
                    clearedit();
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully!',
                        text: 'Data berhasil di update',
                        timer: 3000
                    }).then(function() {
                        $('#edit-master-desc').modal('hide');
                        $('#masterdata-desc-datatables').DataTable().ajax.reload();
                    });

                    // location.reload();
                },
                error: function(data) {
                    // console.log(data);
                }
            });
        }
        // return false;
    });
</script>
