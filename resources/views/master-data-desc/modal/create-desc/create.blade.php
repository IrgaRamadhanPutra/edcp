<div class="modal fade bd-example-modal-lg modalcreatemasterdesc" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="createModalMasterdata_desc" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata Desc --Create--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" onclick="clear_value_create_page()"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-masterdesc" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_desc" name="id_master_desc">
                            @include('master-data-desc.modal.create-desc.form')
                            <div class="row">
                                <div class="col-12">
                                    <div class="datatable datatable-primary">
                                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                            <table id="tbl-detail-master-desc"
                                                class="table table-striped table-bordered table-hover" width="100%">
                                                <thead
                                                    style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                    <tr>
                                                        <th class="text-white" width="5%">No</th>
                                                        <th class="text-white" width="20%">Standart</th>
                                                        <th class="text-white" width="1%"></th>
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
                                class="btn btn-secondary" style="background: rgb(175, 16, 56)"id="addRow"> <i
                                    class="fa fa-plus"></i> Add
                                Item</button>
                            {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                            <button type="button" class="btn btn-secondary " onclick="clearadd()" data-dismiss="modal"
                                style="background: rgb(16, 130, 175)"><i class="fa-solid fa-xmark"></i>
                                &nbsp;Close</button>
                            <button type="button" class="btn btn-secondary AddMasterdesc"
                                style="background: rgb(16, 130, 175)"><i class="fa-solid fa-floppy-disk"></i>
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
            $('#createModalMasterdata_desc').modal('show');
            // $('.modal-title').text('Form Master data Desc');
            $('#kategori_create').focus();
        });
    });
    // clear add for add data
    function clearadd() {
        $('#kategori_create').val("");
        // $('#remark_header_create_stout').val("");
        var table = $('#tbl-detail-master-desc').DataTable();
        table.rows().remove().draw();
    }

    // get mster data kategori
    function Getdatakategori() {
        $('#ItemModalAdd1').modal('show');
        var lookUpdataItem1 = $('#lookUpdataItem1').DataTable();
        lookUpdataItem1.destroy();
        var lookUpdataItem1 = $('#lookUpdataItem1').DataTable({
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
                $('#lookUpdataItem1 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem2 = [];
                    var rowItem2 = $(this);
                    var rowItem2 = lookUpdataItem1.rows(rowItem2).data();
                    $.each($(rowItem2), function(key, value) {
                        document.getElementById("kategori_create").value = value[
                            "kategori"];
                        $('#ItemModalAdd1').modal('hide');
                        // $('#pic_create').focus();
                    });
                });

            },

        });
    }
    // add row for tabel standart
    // $(document).ready(function() {
    //     $('#addRow').click(function() {
    //         var kategori = document.getElementById('kategori_create').value;
    //         if (kategori != '') {
    //             var kategori = $('#kategori_create').val();
    //             var jml_row = document.getElementById(
    //                 'jml_row').value;
    //             var standar_elements = document
    //                 .getElementsByName("standar_mesin[]");
    //             var stndart1 = standar_elements[standar_elements.length - 1].value;
    //             // console.log(standar_elements);
    //             var t = $('#tbl-detail-master-desc').DataTable();
    //             var counter = t.rows().count();
    //             var jml_row = Number(counter) + 1;

    //             var standar = "standar" + jml_row;
    //             var id = "id" + jml_row;

    //             t.row.add([
    //                 jml_row,
    //                 '<input type="text" name="standar_mesin[]"  id="' + standar +
    //                 '" class="form-control form-control">',
    //                 '<a href="#" class="btn btn-danger destroy"><i class="fa fa-trash remove"></i></a>',
    //             ]).draw(false); // Menambahkan baris baru tanpa menggambar ulang tabel
    //         } else {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Error...',
    //                 text: 'kategori Cannot Empty',
    //             }).then(function() {
    //                 setTimeout(() => $("#kategori_create").focus(), 500)
    //             });
    //         }
    //     });

    // });

    $(document).ready(function() {
        $('#addRow').click(function() {
            var kategori = document.getElementById('kategori_create').value;
            if (kategori != '') {
                // validasi_standart();
                var jml_row = document.getElementById(
                    'jml_row').value;
                // console.log(standar_elements);
                var t = $('#tbl-detail-master-desc').DataTable();
                var counter = t.rows().count();
                var jml_row = Number(counter) + 1;

                var standar = "standar" + jml_row;
                var id = "id" + jml_row;

                t.row.add([
                    jml_row,
                    '<input type="text" name="standar_mesin[]"  id="' + standar +
                    '" class="form-control form-control" onkeyup="validasi_standart()">',
                    '<a href="#" class="btn btn-danger destroy"><i class="fa fa-trash remove"></i></a>',
                ]).draw(false); // Menambahkan baris baru tanpa menggambar ulang tabel
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'kategori Cannot Empty',
                }).then(function() {
                    setTimeout(() => $("#kategori_create").focus(), 500)
                });
            }
        });

    });

    function validasi_standart() {
        var jml_row = document.getElementById('jml_row').value;
        var rows = document.getElementsByName("standar_mesin[]");
        var standar1 = rows[rows.length - 1].value;
        var alreadyExists = false;

        for (var i = 0; i < rows.length - 1; i++) {
            var rowData = rows[i].value;
            if (rowData === standar1) {
                alreadyExists = true;
                break;
            }
        }

        if (alreadyExists) {
            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Data already exists'
            });
            var rows = document.getElementsByName("standar_mesin[]");
            var lastRow = rows[rows.length - 1];
            lastRow.value = "";
        } else {
            var kategori = $('#kategori_create').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('validasi_standar') }}",
                type: "POST",
                data: {
                    kategori: kategori,
                    standar1: standar1,
                },
                dataType: 'json',
                success: function(data) {
                    if (data == '') {
                        // Data doesn't exist, do something here if needed
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: 'Standard Already Submit',
                        });
                        var rows = document.getElementsByName("standar_mesin[]");
                        var lastRow = rows[rows.length - 1];
                        lastRow.value = "";
                    }
                }
            });
        }

    }

    // delete row
    $(document).on('click', '.destroy', function() {
        var row = $(this).closest('tr');
        var table = $('#tbl-detail-master-desc').DataTable();
        table.row(row).remove().draw();
    });

    // add data master desc
    $('.modal-footer').on('click', '.AddMasterdesc', function() {
        var inputs = [{
                name: 'no[]',
                label: 'No'
            },
            {
                name: 'standar_mesin[]',
                label: 'Standar Mesin'
            },
        ];
        // Variable to keep track of any fields with invalid values
        var hasError = false;

        // Iterate over the input elements and perform validation
        for (var i = 0; i < inputs.length; i++) {
            var inputElements = document.querySelectorAll('[name="' + inputs[i].name + '"]') ||
                document.querySelectorAll('[id="' + inputs[i].name + '"]');

            for (var j = 0; j < inputElements.length; j++) {
                var input = inputElements[j];

                if (!input || input.value === undefined || input.value === null || input.value.trim() ===
                    '') {
                    hasError = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Please fill in the "' + inputs[i].label + '" field for element ' + (
                            j +
                            1) + '.'
                    });
                    break; //
                }
            }
            if (hasError) {
                break; // Exit the outer loop if any field is invalid
            }
        }
        if (!hasError) {
            var jml_row = document.getElementById('jml_row').value;
            var rows = document.getElementsByName("standar_mesin[]");
            var standar1 = rows[rows.length - 1].value;
            var alreadyExists = false;

            for (var i = 0; i < rows.length - 1; i++) {
                var rowData = rows[i].value;
                if (rowData === standar1) {
                    alreadyExists = true;
                    break;
                }
            }

            if (alreadyExists) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Data already exists'
                });
                var rows = document.getElementsByName("standar_mesin[]");
                var lastRow = rows[rows.length - 1];
                lastRow.value = "";
            } else {
                var kategori = $('#kategori_create').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('validasi_standar') }}",
                    type: "POST",
                    data: {
                        kategori: kategori,
                        standar1: standar1,
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data == '') {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                }
                            });
                            $.ajax({
                                url: "{{ route('AddMasterDesc') }}",
                                type: "POST",
                                data: $('#form-masterdesc').serialize(),
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
                                                'Menambahkan Data Master Desc !',
                                                'success'
                                            ).then(function() {
                                                $('#createModalMasterdata_desc')
                                                    .modal('hide');
                                                $('#masterdata-desc-datatables')
                                                    .DataTable().ajax
                                                    .reload();
                                                var table = $(
                                                    '#tbl-detail-master-desc'
                                                ).DataTable();
                                                table.row(row).remove().draw();
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
                            // Data doesn't exist, do something here if needed
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Warning',
                                text: 'Standard Already Submit',
                            });
                            var rows = document.getElementsByName("standar_mesin[]");
                            var lastRow = rows[rows.length - 1];
                            lastRow.value = "";
                        }
                    }
                });
            }



        }

    })
</script>
