<div class="modal fade bd-example-modal-lg modalcreatemastercheckpoint" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="createModalMasterdata_checkpoint" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h4 class="modal-title"></h4> --}}
                <h5 class="modal-title">Master Data Check Point</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" onclick="clear_value_create_page()"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-masterCheckPoint" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_mesin" name="id_master_mesin">
                            @include('master-data-checkpoint.modal.create.form')
                            <div class="row">
                                <div class="col-12">
                                    <div class="datatable datatable-primary">
                                        <div class="table-responsive">
                                            {{-- <table id="tbl-detail-master-checkpoint"
                                                class="table table-bordered table-hover text-white" width="100%">

                                                <thead class="text-center text-white"
                                                    style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                    <tr class="text-white">
                                                        <th width="5%">No</th>
                                                        <th width="20%">Standart</th>

                                                        <th width="1%">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body">
                                                </tbody>
                                            </table> --}}
                                            <table id="tbl-detail-master-checkpoint"
                                                class="table table-striped table-bordered table-hover" width="100%">
                                                <thead
                                                    style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                    <tr>
                                                        <th class="text-white" width="5%">No</th>
                                                        <th class="text-white" width="20%">Standart</th>
                                                        <th class="text-white" width="1%">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- table rows will be dynamically generated here -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" data-toggle="tooltip" data-placement="top" title="Add Item"
                                class="btn btn-info" id="addRow"> Add Item</button>
                            {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                            <button type="button" class="btn btn-primary " onclick="clearadd()"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary AddMasterCheckpoint"><i class="ti-check"></i>
                                Save</button>
                            <input type="hidden" id="jml_row" name="jml_row" value="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#AddMasterdata', function(e) {
            e.preventDefault();
            $('#createModalMasterdata_checkpoint').modal('show');
            // $('.modal-title').text('Master data Check Point');
            $('#name_create').focus();
        });
    });
    // $('#createModalStokOut').on('shown.bs.modal', function() {
    //     $('#name_create').focus();
    //     var table = $('#tbl-detail-stout-edit').DataTable();
    //     table.draw();
    // });
    // clear add for add data
    function clearadd() {
        // $('#Transaksi_create').val("");
        // $('#Date').val("");
        $('#name_create').val("");
        $('#type_create').val("");
        $('#kategori_create').val("");
        // $('#remark_header_create_stout').val("");
        var table = $('#tbl-detail-master-checkpoint').DataTable();
        table.rows().remove().draw();
    }
    //select data master mesin
    function Getdatamesin() {
        $('#ItemModalAdd1').modal('show');
        var lookUpdataItem1 = $('#lookUpdataItem1').DataTable();
        lookUpdataItem1.destroy();
        var lookUpdataItem1 = $('#lookUpdataItem1').DataTable({
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
                $('#lookUpdataItem1 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem1 = [];
                    var rowItem1 = $(this);
                    var rowItem1 = lookUpdataItem1.rows(rowItem1).data();
                    $.each($(rowItem1), function(key, value) {
                        $(document).ready(function() {
                            document.getElementById("name_create").value = value[
                                "name_mesin"];
                            document.getElementById("type_create").value = value[
                                "type"];
                        });
                        $('#ItemModalAdd1').modal('hide');
                        $('#kategori_create').focus();

                    });
                });

            },

        });
    }

    function Getdatakategori() {
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
                        document.getElementById("kategori_create").value = value[
                            "kategori"];
                        $('#ItemModalAdd2').modal('hide');
                        // $('#pic_create').focus();
                    });
                });

            },

        });
    }


    $(document).ready(function() {
        $('#addRow').click(function() {
            var name = document.getElementById('name_create').value;
            var kategori = document.getElementById('kategori_create').value;

            if (name != '') {
                if (kategori != '') {

                    var t = $('#tbl-detail-master-checkpoint').DataTable();
                    var counter = t.rows().count();
                    var jml_row = Number(counter) + 1;

                    document.getElementById('jml_row').value = jml_row;

                    var standar = "standar" + jml_row;
                    var id = "id" + jml_row;


                    t.row.add([
                        '<input type="text" name="no[] " id="" value="' +
                        jml_row +
                        '"  class="form-control form-control" readonly>',
                        '<input type="text" name="standar_mesin[]"  id="' +
                        standar +
                        '" class="form-control form-control">',
                        '<a href="#" class="btn btn-danger destroy"><i class="fa fa-trash remove"></i></a>',
                    ]).draw();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Kategori Cannot Empty',
                    }).then(function() {
                        setTimeout(() => $("#name_create").focus(), 500)
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Name Mesin Cannot Empty',
                }).then(function() {
                    setTimeout(() => $("#kategori_creates").focus(), 500)
                });

            }

        });

    });

    // delete row
    $(document).on('click', '.destroy', function() {
        var row = $(this).closest('tr');
        var table = $('#tbl-detail-master-checkpoint').DataTable();
        table.row(row).remove().draw();
    });

    $('.modal-footer').on('click', '.AddMasterCheckpoint', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('AddMasterCheckpoint') }}",
            type: "POST",
            data: $('#form-masterCheckPoint').serialize(),
            dataType: 'json',
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    if (data.checkdata) {
                        Swal.fire({
                            icon: 'warning',
                            title: data.errors
                        });
                        clearadd();
                        // clear_table_when_input_data_same();
                    } else {
                        // $('.addStout').html('Saving...')
                        clearadd();
                        Swal.fire(
                            'Successfully!',
                            'Menambahkan Data Master CheckPoint !',
                            'success'
                        ).then(function() {
                            $('#createModalMasterdata_checkpoint').modal('hide');
                            $('#masterdata-checkpoint-datatables').DataTable().ajax
                                .reload();
                        })
                    }
                } else {
                    //     Swal.fire({
                    //     icon: 'warning',
                    //     title: 'Warning',
                    //     text: 'Perhatikan Inputan Anda! Form Tidak Boleh Ada Yang Kosong',
                    //   });
                    // printErrorMsg(data.error)
                }

            }
        })
    })
</script>
