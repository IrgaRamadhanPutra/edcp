<div class="modal fade bd-example-modal-lg edit-master-checkpoint" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="edit-master-checkpoint" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h4 class="modal-title formM"></h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        {{-- <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div> --}}
                        <form id="form-masterdat-checkpoint-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('post')
                            <input type="hidden" name="edit_master_checkpoint" id="edit_master_checkpoint">
                            @include('master-data-checkpoint.modal.edit.form')
                            <br>
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-primary addRowEdit" id="addRowEdit"> Add Item</button> --}}
                                <button type="button" class="btn btn-primary " onclick="clearedit()"
                                    data-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary updateMasterdata"><i class="ti-check"></i>
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
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        // document.getElementById('types_create_jtype').focus();
        var id = $(this).attr('row-id');
        // console.log(id);
        // alert(id);
        $('#edit_master_checkpoint').val(id);
        $('#edit-master-checkpoint').modal('show');
        $('.modal-title').text('Master Data Checkpoint (Edit)');

        Editdata(id);
    });

    function Editdata(id) {
        var route = "{{ route('edit_master_check', ':id') }}";
        route = route.replace(':id', id);
        $.ajax({
            url: route,
            method: 'get',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                $('#name_edit').val(data.name_mesin);
                $('#type_edit').val(data.type);
                $('#kategori_edit').val(data.kategori);
                $('#standart_edit').val(data.standard);
            }
        });
    }
    // clear edit
    function clearedit() {
        $('#name_edit').val("");
        $('#type_edit').val("");
        $('#kategori_edit').val("");
        $('#standart_edit').val("");
    }
    //get data mesin edit
    function getdata_mesin2() {
        $('#ItemModaledit1').modal('show');
        var lookUpdataItem3 = $('#lookUpdataItem3').DataTable();
        lookUpdataItem3.destroy();
        var lookUpdataItem3 = $('#lookUpdataItem3').DataTable({
            // your DataTable initialization code here
            "pagingType": "numbers",
            ajax: {
                url: "{{ route('get_master_mesin') }}",
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
                    data: 'name_mesin',
                    name: 'Name',
                    width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                    className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                    "render": function(data, type, row,
                        meta) { // mengatur ukuran font pada kolom
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                },
                {
                    data: 'type',
                    name: 'Type',
                    width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                    className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                    "render": function(data, type, row,
                        meta) { // mengatur ukuran font pada kolom
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                },
                {
                    data: 'descript',
                    name: 'Descript',
                    width: '30%', // mengatur lebar kolom DESCRIPT menjadi 30%
                    className: 'text-center', // mengatur alignment teks pada kolom menjadi left
                    "render": function(data, type, row,
                        meta) { // mengatur ukuran font pada kolom
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                }

            ],

            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpdataItem3 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem3 = [];
                    var rowItem3 = $(this);
                    var rowItem3 = lookUpdataItem3.rows(rowItem3).data();
                    $.each($(rowItem3), function(key, value) {
                        $(document).ready(function() {
                            document.getElementById("name_edit").value = value[
                                "name_mesin"];
                            document.getElementById("type_edit").value = value[
                                "type"];
                        });
                        $('#ItemModaledit1').modal('hide');
                        // $('#kategori_create').focus();

                    });
                });

            },

        });
    }

    //getdata_kategori_edit
    function getdata_kategori2() {
        $('#ItemModaledit2').modal('show');
        var lookUpdataItem4 = $('#lookUpdataItem4').DataTable();
        lookUpdataItem4.destroy();
        var lookUpdataItem4 = $('#lookUpdataItem4').DataTable({
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
                $('#lookUpdataItem4 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem2 = [];
                    var rowItem2 = $(this);
                    var rowItem2 = lookUpdataItem4.rows(rowItem2).data();
                    $.each($(rowItem2), function(key, value) {
                        document.getElementById("kategori_edit").value = value[
                            "kategori"];
                        $('#ItemModaledit2').modal('hide');
                        // $('#pic_create').focus();
                    });
                });

            },

        });
    }


    //update data for edit master data checkpoint
    $('.modal-footer').on('click', '.updateMasterdata', function() {
        // alert("masuk");
        var id = document.getElementById('edit_master_checkpoint').value;
        // console.log(id);
        var route = "{{ route('update_master_checkpoint', ':id') }}";
        route = route.replace(':id', id);
        // $('.updateStout').html('Saving...');
        // $('.updateMaster').html('Saving...')
        $.ajax({
            url: route,
            type: "POST",
            dataType: 'json',
            data: $('#form-masterdat-checkpoint-edit').serialize(),
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
                    $('#edit-master-checkpoint').modal('hide');
                    $('#masterdata-checkpoint-datatables').DataTable().ajax.reload();
                });

                // location.reload();
            },
            error: function(data) {
                // console.log(data);
            }
        });
        // }
        // return false;
    });
</script>
