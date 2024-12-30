<div class="modal fade bd-example-modal-lg modalcreatemasterimage" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="createModalMasterdata_image" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata Image --Create--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" onclick="clear_value_create_page()"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-masterimage" method="post" action="javascript:void(0)"
                            style="max-height: 300px; overflow-y: auto;">
                            @csrf
                            @method('POST')

                            <input type="hidden" id="id_masterimage_edit" name="id">
                            @include('master-data-image.modal.create-image.form')
                        </form>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" style="background: rgb(16, 130, 175)"
                                id="addRow">Tambah Data</button>
                            <button type="button" class="btn btn-secondary " style="background: rgb(16, 130, 175)"
                                onclick="clear_Masteradd()" data-dismiss="modal"><i
                                    class="fa-solid fa-xmark"></i>&nbsp;Close</button>

                            <button type="button" style="background: rgb(16, 130, 175)"
                                class="btn btn-secondary addMaster_data"><i class="fa-solid fa-floppy-disk"></i>
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
    // ADD DISPLAY MODAL CREATEs
    $(document).on('click', '#AddMasterdata', function(e) {
        e.preventDefault();
        $('#createModalMasterdata_image').modal('show');
        document.getElementById("mesin_create").focus();
        // $('.modal-title').text('Masterdata Image (New)');

    });
    $(document).ready(function() {

        $('#createModalMasterdata_image').on('shown.bs.modal', function() {
            document.getElementById("mesin_create").focus();
        });
    });
    // function form image
    // function previewImage(event) {
    //     var input = event.target;
    //     var reader = new FileReader();
    //     reader.onload = function() {
    //         var output = document.getElementById('output');
    //         output.src = reader.result;
    //     };
    //     if (input.files && input.files[0]) {
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    $(document).ready(function() {
        $('#addRow').click(function() {

            var t = $('#upload-image').DataTable();
            var counter = t.rows().count();
            var jml_row = Number(counter) + 1;

            document.getElementById('jml_row').value = jml_row;

            var barang = "barang" + jml_row;
            var id = "id" + jml_row;
            var jumlah = "jumlah" + jml_row;
            var img_daily = "img_daily" + jml_row;
            var typ_gambar = "type_gambar" + jml_row;
            // Buat elemen gambar dengan ID yang unik
            var imageId = "output_" + jml_row;
            var image_output = "image[]" + jml_row;
            // console.log(imageId);
            var imageHtml = '<img id="' + imageId +
                '" name="output[]" src="" alt="Preview Image" height="100" width="100">';
            t.row.add([
                '<input type="text" name="no[]" id="" value="' + jml_row +
                '" class="form-control form-control" readonly>',
                '<select name="type_image[]" id="' + typ_gambar +
                '" class="form-control form-control" onchange="validasi_type()">' +
                '<option value="">PILIH</option>' +
                '<option value="1">1</option>' +
                '<option value="2A">2A</option>' +
                '<option value="2B">2B</option>' +
                '<option value="3A">3A</option>' +
                '<option value="3B">3B</option>' +
                '<option value="3C">3C</option>' +
                '<option value="4A">4A</option>' +
                '<option value="4B">4B</option>' +
                '<option value="5">5</option>' +
                '<option value="6">6</option>' +
                '</select>',
                '<input type="file" name="image_create[]" id="image_create_' + jml_row +
                '" onchange="previewImage(event, \'' + imageId + '\', \'' + image_output +
                '\')" placeholder="">',
                imageHtml,
                '<a href="#" class="btn btn-danger destroy"><i class="fa fa-trash remove"></i></a>',
                '<input type="hidden" name="img_daily[]"  id="' + image_output +
                '" class="form-control form-control">'
            ]).draw();

        });

    });

    // function previewImage(event, imageId, image_output) {
    //     var input = event.target;
    //     var file = input.files[0];

    //     if (file) {
    //         var fileExtension = file.name.split('.').pop().toLowerCase();
    //         var allowedExtensions = ['png', 'jpg', 'jpeg'];

    //         if (allowedExtensions.indexOf(fileExtension) !== -1) {
    //             var reader = new FileReader();
    //             reader.onload = function() {
    //                 var output = document.getElementById(imageId);
    //                 // Master_data_image.log(output);
    //                 // console.log(output);
    //                 output.src = reader.result;
    //                 // Mengonversi gambar menjadi base64
    //                 var base64Image = reader.result.split(',')[1];

    //                 // Get the target element by its ID
    //                 var inputElement = document.getElementById('image_output');

    //                 // Assign the base64 image data to the element
    //                 inputElement.src = "data:image/jpeg;base64," + base64Image;

    //             };
    //             reader.readAsDataURL(file);
    //         } else {
    //             swal.fire({
    //                 icon: 'error',
    //                 title: 'Error',
    //                 timer: 2000,
    //                 text: 'Jenis file yang diunggah tidak valid !!. Harap pilih file dengan ekstensi PNG, JPG, atau JPEG',
    //             });
    //             // input.innerHTML =
    //             //     'Jenis file yang diunggah tidak valid. Harap pilih file dengan ekstensi PNG, JPG, atau JPEG.';
    //             // alert('Jenis file yang diunggah tidak valid. Harap pilih file dengan ekstensi PNG, JPG, atau JPEG.');
    //             input.value = ''; // Menghapus nilai input file jika jenis file tidak valid
    //         }
    //     }
    // }
    // validasi type_image
    function validasi_type() {
        var rows = document.getElementsByName("type_image[]");
        var typ_gambar = rows[rows.length - 1].value;
        var alreadyExists = false;

        for (var i = 0; i < rows.length - 1; i++) {
            var rowData = rows[i].value; // Mengambil nilai dari elemen type_image pada setiap baris
            if (rowData === typ_gambar) { // Membandingkan dengan data pada baris yang baru diinput
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
            var rows = document.getElementsByName("type_image[]");
            var lastRow = rows[rows.length - 1];
            lastRow.value = "";
        } else {
            // // Lakukan tindakan jika data tidak ada yang sama
            var rows = document.getElementsByName("type_image[]");
            var typ_gambar = rows[rows.length - 1].value;
            var name_mesin = document.getElementById("mesin_create").value;
            var type_create = document.getElementById("type_create").value;
            // Lakukan validasi atau lakukan tindakan berdasarkan nilai typ_gambar
            // console.log(typ_gambar); // Contoh: Menampilkan nilai typ_gambar di console
            // alert(typ_gambar);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('validasi_typegambar') }}",
                type: "POST",
                data: {
                    typ_gambar: typ_gambar,
                    name_mesin: name_mesin,
                    type_create: type_create
                },
                dataType: 'json',
                success: function(data) {
                    if (data == '') {
                        // alert('data belum ada');

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: 'Data Type Submit',
                        });
                        var rows = document.getElementsByName("type_image[]");
                        var lastRow = rows[rows.length - 1];
                        lastRow.value = "";
                    }
                }


            });

            // Lanjutkan dengan tindakan selanjutnya jika tidak ada data yang sama
        }



    }


    function previewImage(event, imageId, image_output) {
        var input = event.target;
        var file = input.files[0];

        if (file) {
            var fileExtension = file.name.split('.').pop().toLowerCase();
            var allowedExtensions = ['png', 'jpg', 'jpeg'];

            if (allowedExtensions.indexOf(fileExtension) !== -1) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById(imageId);
                    output.src = reader.result;
                    // Mengonversi gambar menjadi base64
                    var base64Image = reader.result.split(',')[1];
                    // console.log(base64Image);

                    var inputElement = document.getElementById(image_output);
                    inputElement.value = base64Image;
                    // console.log(inputElement);
                };
                reader.readAsDataURL(file);
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'Error',
                    timer: 2000,
                    text: 'Jenis file yang diunggah tidak valid !!. Harap pilih file dengan ekstensi PNG, JPG, atau JPEG',
                });
                input.value = ''; // Menghapus nilai input file jika jenis file tidak valid
            }
        }
    }


    // delete row
    $(document).on('click', '.destroy', function() {
        var row = $(this).closest('tr');
        var table = $('#upload-image').DataTable();
        table.row(row).remove().draw();
    });

    function get_master_data() {
        $('#get-masterdata').click(function() {
            $('#ItemModalAdd1').modal('show');
            var lookUpdataItem1 = $('#lookUpdataItem1').DataTable();
            lookUpdataItem1.destroy();
            var lookUpdataItem1 = $('#lookUpdataItem1').DataTable({
                // your DataTable initialization code here
                "pagingType": "numbers",
                ajax: {
                    url: "{{ route('get_master_data') }}",
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
                        width: '20%', // mengatur lebar kolom menjadi 20%
                        className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                        "render": function(data, type, row,
                            meta) { // mengatur ukuran font pada kolom
                            return '<span style="font-size: 13px">' + data +
                                '</span>';
                        }
                    },
                    {
                        data: 'type',
                        name: 'Type',
                        width: '20%', // mengatur lebar kolom  menjadi 20%
                        className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                        "render": function(data, type, row,
                            meta) { // mengatur ukuran font pada kolom
                            return '<span style="font-size: 13px">' + data +
                                '</span>';
                        }
                    },
                    {
                        data: 'descript',
                        name: 'Descript',
                        width: '30%', // mengatur lebar kolom menjadi 30%
                        className: 'text-center', // mengatur alignment teks pada kolom menjadi left
                        "render": function(data, type, row,
                            meta) { // mengatur ukuran font pada kolom
                            return '<span style="font-size: 13px">' + data +
                                '</span>';
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
                            document.getElementById("mesin_create")
                                .value = value[
                                    "name_mesin"];
                            document.getElementById("type_create")
                                .value = value[
                                    "type"];
                            $('#ItemModalAdd1').modal('hide');
                            // $('#pic_create').focus();

                        });
                    });

                },

            });


        });
    }

    function clear_Masteradd() {
        var input1 = document.getElementById('mesin_create');
        input1.value = '';
        var input2 = document.getElementById('type_create');
        input2.value = '';
        var output = document.getElementById('output');
        output.src = '';
        // var input3 = document.getElementById('image_create');
        // input3.value = '';
        var table = $('#upload-image').DataTable();
        table.clear().draw();
    }

    $('.modal-footer').on('click', '.addMaster_data', function() {
        //validasi inputan tidak boleh kosong
        var inputs = [{
                name: 'mesin_create',
                label: 'Mesin Create'
            },
            {
                name: 'type_create',
                label: 'Type Create'
            },
            {
                name: 'type_image[]',
                label: 'Type Image'
            },
            // {
            //     name: 'output[]',
            //     label: 'Output'
            // },
            {
                name: 'image_create[]',
                label: 'Image Create'
            }
        ];
        var hasError = false;

        // Iterate over the input elements and perform validation
        for (var i = 0; i < inputs.length; i++) {
            var inputElements = document.querySelectorAll('[name="' + inputs[i].name + '"]') ||
                document.querySelectorAll('[id="' + inputs[i].name + '"]');

            for (var j = 0; j < inputElements.length; j++) {
                var input = inputElements[j];

                if (!input || input.value === undefined || input.value === null || input.value.trim() === '') {
                    hasError = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Please fill in the "' + inputs[i].label + '" field for element ' + (j +
                            1) + '.'
                    });
                    break;
                }
            }
            if (hasError) {
                break; // Exit the outer loop if any field is invalid
            }
        }

        // var name = $('#mesin_create').val();
        // var type = $('#type_create').val();
        // // var image = $('#image_create').val();

        // // var output = $('#output').val();
        // var condtion = !name || !type
        // if (condtion) {
        //     swal.fire({
        //         icon: 'warning',
        //         title: 'Perhatian',
        //         timer: 2500,
        //         text: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!',
        //     });
        //     // })
        // } else {
        // alert('sukses');
        if (!hasError) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('AddStore_masterimage') }}",
                type: "POST",
                data: $('#form-masterimage').serialize(),
                // {
                //     name: name,
                //     type: type,
                //     image: image,
                //     output: output
                // },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    clear_Masteradd();
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully!',
                        text: 'Data berhasil ditambahkan',
                        timer: 3000
                    }).then(function() {
                        $('#createModalMasterdata_image').modal('hide');
                        $('#masterdata-image-datatables').DataTable().ajax.reload();
                    });
                }
            });
        }
    });
</script>
