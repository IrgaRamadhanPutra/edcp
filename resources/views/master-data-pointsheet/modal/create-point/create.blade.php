<div class="modal fade bd-example-modal-xl modalcreatemasterpointsheet" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="createModalMasterdata_pointsheet" role="dialog">
    <div class="modal-dialog modal-xl" style="max-width: 1000px; width: 100%">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata PointSheet --Create--</h4>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-masterpointsheet" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_pointsheet" name="id_master_pointsheet">
                            @include('master-data-pointsheet.modal.create-point.form')
                            <div class="row">
                                <div class="col-12">
                                    <div class="datatable datatable-primary">
                                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                            <table id="tbl-detail-master-pointsheet"
                                                class="table table-striped table-bordered table-hover" width="100%">
                                                <thead
                                                    style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                    <tr>
                                                        <th class="text-white" width="5%">No</th>
                                                        <th class="text-white" width="20%">Kategori</th>
                                                        <th class="text-white" width="40%">Standard</th>
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
                                class="btn btn-secondary" style="background: rgb(175, 16, 56)"id="addRow"> <i
                                    class="fa fa-plus"></i> Add
                                Item</button>
                            {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                            <button type="button" class="btn btn-secondary " onclick="clearadd()" data-dismiss="modal"
                                style="background: rgb(16, 130, 175)"><i class="fa-solid fa-xmark"></i>
                                &nbsp;Close</button>
                            <button type="button" class="btn btn-secondary AddMasterpoint"
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
            $('#createModalMasterdata_pointsheet').modal('show');
            // $('.modal-title').text('Master data Check Point');
            // $('#kategori_create').focus();
        });
    });

    //cancel
    function clearadd() {
        // $('#Transaksi_create').val("");
        // $('#Date').val("");
        $('#mesin_create').val("");
        $('#Type_create').val("");
        // $('#remark_header_create_stout').val("");
        var table = $('#tbl-detail-master-pointsheet').DataTable();
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
                url: "{{ route('Get_master_mesin') }}",
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
                    "data": "name_mesin"
                },
                {
                    "data": "type"
                },
                {
                    "data": "descript",
                },
            ],
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpdataItem1 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem1 = [];
                    var rowItem1 = $(this);
                    var rowItem1 = lookUpdataItem1.rows(rowItem1).data();
                    $.each($(rowItem1), function(key, value) {
                        $(document).ready(function() {
                            document.getElementById("mesin_create").value = value[
                                "name_mesin"];
                            document.getElementById("Type_create").value = value[
                                "type"];
                        });
                        $('#ItemModalAdd1').modal('hide');

                    });
                });

            },

        });
    }

    // add row for tabel standart
    $(document).ready(function() {
        $('#addRow').click(function() {
            var name = document.getElementById('mesin_create').value;

            if (name != '') {
                var t = $('#tbl-detail-master-pointsheet').DataTable();

                var counter = t.rows().count();
                var jml_row = Number(counter) + 1;

                document.getElementById('jml_row').value = jml_row;

                var kategori = "kategori" + jml_row;
                var id_desc = "id_desc" + jml_row;
                var standar_hidden = "standar_hidden" + jml_row;
                var kategori_hidden = "kategori_hidden" + jml_row;
                var standar = "standar" + jml_row;
                var id = "id" + jml_row;
                t.row.add([
                    '<input type="text" name="no[]" id="" value="' + jml_row +
                    '" class="form-control form-control" readonly>',
                    '<div class="input-group">' +
                    '<input type="text" value="" placeholder="Search Item" autocomplete="off" id="' +
                    kategori +
                    '" name="kategori[]" required class="form-control form-control kategori" readonly>' +
                    '<span class="input-group-btn">' +
                    '<button type="button" id="btnPopUpkategori" data-row="' + jml_row +
                    '" data-id="' + jml_row +
                    '" class="btn btn-secondary" style="background: rgb(16, 130, 175)">' +
                    '<i class="fas fa-search"></i>' +
                    '</button>' +
                    '</span>' +
                    '</div>',
                    '<input type="text" name="standar_mesin[]" id="' + standar +
                    '" class="form-control form-control" readonly>',
                    '<input type="hidden" name="id_desc[]" id="' + id_desc + '">' +
                    '<input type="hidden" name="standar_hidden[]" id="' + standar_hidden +
                    '">' +
                    '<a href="#" class="btn btn-danger destroy"><i class="fa fa-trash remove"></i></a>'
                ]).draw(false);

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Name Mesin Cannot Empty',
                }).then(function() {
                    setTimeout(() => $("#kategori_create").focus(), 500)
                });

            }
        });

    });

    // delete row
    $(document).on('click', '.destroy', function() {
        var row = $(this).closest('tr');
        var table = $('#tbl-detail-master-pointsheet').DataTable();
        table.row(row).remove().draw();
    });


    //get data desc
    $(document).on('click', '#btnPopUpkategori', function(e) {
        e.preventDefault();
        $('#ItemModalAdddesc').modal('show');
        // $('.modal-title').text('Stock Out Entry (New)');
        var lookUpdataItemdesc = $('#lookUpdataItemdesc').DataTable();
        lookUpdataItemdesc.destroy();
        var lookUpdataItemdesc = $('#lookUpdataItemdesc').DataTable({
            // your DataTable initialization code here
            "pagingType": "numbers",
            ajax: {
                url: "{{ route('Get_master_desc') }}",
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
                    "data": "kategori"
                },
                {
                    "data": "standard"
                },
            ],
            "initComplete": function(settings, json) {
                $('#lookUpdataItemdesc tbody').on('dblclick', 'tr', function() {
                    var rowItem1 = $(this);
                    var rowItem1 = lookUpdataItemdesc.rows(rowItem1).data();



                    $.each($(rowItem1), function(key, value) {
                        $(document).ready(function() {
                            var jml_row = document.getElementById(
                                'jml_row').value;


                            var standar_elements = document
                                .getElementsByName("standar_mesin[]");
                            var alreadyExists = false;

                            for (var i = 0; i < standar_elements
                                .length; i++) {
                                if (standar_elements[i].value === value
                                    .standard) {
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
                            } else {
                                var jml_row = document.getElementById(
                                    'jml_row').value;
                                var id_desc = "id_desc" + jml_row;
                                var id_desc1 = $('#' + id_desc).val(value
                                    .id_desc);
                                var a = id_desc1.val();

                                var mesin_create = $('#mesin_create').val();
                                var type_create = $('#Type_create').val();
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]'
                                        ).attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ route('validasi_standarmesin') }}",
                                    type: "GET",
                                    data: {
                                        a: a,
                                        mesin_create: mesin_create,
                                        type_create: type_create

                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        // console.log(data);
                                        if (data == '') {
                                            var jml_row =
                                                document
                                                .getElementById(
                                                    'jml_row')
                                                .value;
                                            var kategori =
                                                "kategori" +
                                                jml_row;
                                            var standar =
                                                "standar" +
                                                jml_row;
                                            var id_desc =
                                                "id_desc" +
                                                jml_row;

                                            var id_desc1 = $(
                                                    '#' +
                                                    id_desc)
                                                .val(value
                                                    .id_desc);
                                            var kategori1 = $(
                                                    '#' +
                                                    kategori)
                                                .val(value
                                                    .kategori
                                                );
                                            var standard1 = $(
                                                    '#' +
                                                    standar)
                                                .val(value
                                                    .standard);
                                            // Handle success response here
                                            // alert('masuk')

                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error...',
                                                text: 'Data already submit'
                                            });
                                        }
                                    }
                                });
                            }
                            // var jml_row = document.getElementById(
                            //     'jml_row').value;
                            // var id_desc = "id_desc" + jml_row;
                            // var id_desc1 = $('#' + id_desc).val(value
                            //     .id_desc);
                            // var a = id_desc1.val();

                            // var mesin_create = $('#mesin_create').val();
                            // var type_create = $('#Type_create').val();
                            // $.ajaxSetup({
                            //     headers: {
                            //         'X-CSRF-TOKEN': $(
                            //             'meta[name="csrf-token"]'
                            //         ).attr('content')
                            //     }
                            // });
                            // $.ajax({
                            //     url: "{{ route('validasi_standarmesin') }}",
                            //     type: "GET",
                            //     data: {
                            //         a: a,
                            //         mesin_create: mesin_create,
                            //         type_create: type_create

                            //     },
                            //     dataType: 'json',
                            //     success: function(data) {
                            //         // console.log(data);
                            //         if (data == '') {
                            //             var jml_row =
                            //                 document
                            //                 .getElementById(
                            //                     'jml_row')
                            //                 .value;
                            //             var kategori =
                            //                 "kategori" +
                            //                 jml_row;
                            //             var standar =
                            //                 "standar" +
                            //                 jml_row;
                            //             var id_desc =
                            //                 "id_desc" +
                            //                 jml_row;

                            //             var id_desc1 = $(
                            //                     '#' +
                            //                     id_desc)
                            //                 .val(value
                            //                     .id_desc);
                            //             var kategori1 = $(
                            //                     '#' +
                            //                     kategori)
                            //                 .val(value
                            //                     .kategori
                            //                 );
                            //             var standard1 = $(
                            //                     '#' +
                            //                     standar)
                            //                 .val(value
                            //                     .standard);
                            //             // Handle success response here
                            //             // alert('masuk')

                            //         } else {
                            //             Swal.fire({
                            //                 icon: 'error',
                            //                 title: 'Error...',
                            //                 text: 'Data sudah ada'
                            //             });
                            //         }
                            //     }
                            // });
                            // Your code to insert the data here

                        });

                        // var jml_row = document.getElementById(
                        //     'jml_row').value;
                        // var kategori_hidden = "kategori_hidden" + jml_row;
                        // var standar_hidden = "standar_hidden" + jml_row;

                        $('#ItemModalAdddesc').modal('hide');
                    });

                });

                // $('#lookUpdataItemdesc tbody').on('dblclick', 'tr', function() {
                //     var dataArrItem1 = [];
                //     var rowItem1 = $(this);
                //     var rowItem1 = lookUpdataItemdesc.rows(rowItem1).data();

                //     var isDataAlreadyPresent =
                //         false; // Flag variable to track if data is already present in the table

                //     $.each($(rowItem1), function(key, value) {
                //         $(document).ready(function() {
                //             var standarElements = document
                //                 .getElementsByName("standar_mesin[]");
                //             var alreadyExists = false;

                //             for (var i = 0; i < standarElements
                //                 .length; i++) {
                //                 if (standarElements[i].value === value
                //                     .standar) {
                //                     alreadyExists = true;
                //                     break;
                //                 }
                //             }

                //             if (alreadyExists) {
                //                 Swal.fire({
                //                     icon: 'error',
                //                     title: 'Error...',
                //                     text: 'The data is already present in the table.'
                //                 });
                //             } else {
                //                 // Insert the data into the form fields
                //                 var jml_row = document.getElementById(
                //                         'jml_row')
                //                     .value;
                //                 // console.log(jml_row);
                //                 var kategori = "kategori" + jml_row;
                //                 var standar = "standar" + jml_row;
                //                 var id_desc = "id_desc" + jml_row;
                //                 // Ambil elemen HTML dengan ID yang sama dengan nilai dari "barang" menggunakan jQuery
                //                 // dan atur nilainya menjadi "barang_name"
                //                 var id_desc1 = $('#' + id_desc).val(
                //                     value
                //                     .id_desc);
                //                 var kategori1 = $('#' + kategori).val(value
                //                     .kategori);
                //                 var standard1 = $('#' + standar).val(value
                //                     .standard);
                //                 // Your code to insert the data here
                //             }


                //         });



                //         $('#ItemModalAdddesc').modal('hide');
                //     });
                // });

            },

        });
    });
    // $(document).ready(function() {
    //     $('#btnPopUpkategori').click(function() {
    //         $('#ItemModalAdddesc').modal('show');

    //     });

    // });

    // add data master Pointsheet
    $('.modal-footer').on('click', '.AddMasterpoint', function() {
        // Get all the input elements with the specified names or IDs
        var inputs = [{
                name: 'no[]',
                label: 'No'
            },
            {
                name: 'kategori[]',
                label: 'Kategori'
            },
            {
                name: 'standar_mesin[]',
                label: 'Standar Mesin'
            },
            {
                name: 'id_desc[]',
                label: 'ID Description'
            }
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
                        // text: 'Please fill in the "' + inputs[i].label + '" field for element ' + (
                        //     j +
                        //     1) + '.'
                        text: 'Column cannot be empty'
                    });
                    break; //
                }
            }
            if (hasError) {
                break; // Exit the outer loop if any field is invalid
            }
        }

        // Check if any field has an invalid value
        if (!hasError) {
            // Proceed with the AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('AddMasterPoint') }}",
                type: "POST",
                data: $('#form-masterpointsheet').serialize(),
                dataType: 'json',
                success: function(data) {
                    // Rest of the success callback logic
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
                                'Menambahkan Data Master Pointsheet !',
                                'success'
                            ).then(function() {
                                $('#createModalMasterdata_pointsheet').modal('hide');
                                $('#masterdata-point-datatables').DataTable().ajax
                                    .reload();
                                // var table = $('#tbl-detail-master-pointsheet')
                                //     .DataTable();
                                // table.row(row).remove().draw();
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
            });
        }

    })
</script>
