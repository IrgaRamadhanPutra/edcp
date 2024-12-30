<div class="modal fade bd-example-modal-lg edit-master_image" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="edit-master_image" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title formM"><i class="fa-brands fa-pix"></i> </h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        {{-- <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div> --}}
                        <form id="form-master-image-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('post')
                            <br>
                            @include('master-data-image.modal.edit-image.form')
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-primary addRowEdit" id="addRowEdit"> Add Item</button> --}}
                                <button type="button" class="btn btn-primary " data-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i>&nbsp;Close</button>

                                <button type="button" class="btn btn-primary updatemaster_image">
                                    <i class="fa-solid fa-floppy-disk"></i>
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
        $('#id_masterimage_edit').val(id);
        $('#edit-master_image').modal('show');
        // $('.modal-title').text(' Master image (Edit)');
        Editdata(id);
    });

    function Editdata(id) {
        var route = "{{ route('edit_daily_data', ':id') }}";
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
                var imgData = data.img_daily; // Mengambil data gambar dari properti "img_daily"
                // console.log(imgData);

                // Memeriksa apakah ada data gambar yang valid
                if (imgData) {
                    var dataURI = "data:image/png;base64," + imgData;

                    // Mengatur data URI sebagai sumber gambar
                    $('#output_edit').attr('src', dataURI);
                }
                $('#mesin_edit').val(data.name_mesin);
                $('#type_edit').val(data.type);

            }
        });
    }

    function get_master_data1() {
        $('#get-masterdata1').click(function() {
            $('#ItemModalEdit2').modal('show');
            var lookUpdataItem2 = $('#lookUpdataItem2').DataTable();
            lookUpdataItem2.destroy();
            var lookUpdataItem2 = $('#lookUpdataItem2').DataTable({
                // your DataTable initialization code here
                "pagingType": "numbers",
                ajax: {
                    url: "{{ route('get_master_data2') }}",
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
                    $('#lookUpdataItem2 tbody').on('dblclick', 'tr', function() {
                        var dataArrItem1 = [];
                        var rowItem1 = $(this);
                        var rowItem1 = lookUpdataItem2.rows(rowItem1).data();
                        $.each($(rowItem1), function(key, value) {
                            document.getElementById("mesin_edit")
                                .value = value[
                                    "name_mesin"];
                            document.getElementById("type_edit")
                                .value = value[
                                    "type"];
                            $('#ItemModalEdit2').modal('hide');
                            // $('#pic_create').focus();

                        });
                    });

                },

            });


        });
    }


    // // Event listener untuk perubahan pada input file
    // $('#image_edit').on('change', function(e) {
    //     var file = e.target.files[0]; // Mengambil file yang diunggah

    //     // Membaca file menggunakan FileReader
    //     var reader = new FileReader();
    //     reader.onload = function(e) {
    //         var imgData = e.target.result;
    //         // console.log(imgData);
    //         // Mengatur data URI sebagai sumber gambar
    //         // $('#output_edit').attr('src', imgData);

    //     };
    //     reader.readAsDataURL(file);
    // });

    // function validasi_file() {
    //     var fileInput = document.getElementById('image_edit');
    //     console.log(fileInput);
    //     var file = fileInput.files[0];

    //     var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    //     if (!allowedExtensions.exec(file.name)) {
    //         swal.fire({
    //             icon: 'error',
    //             title: 'Error',
    //             timer: 2000,
    //             text: 'Jenis file yang diunggah tidak valid !!. Harap pilih file dengan ekstensi PNG, JPG, atau JPEG',
    //         });
    //         fileInput.value = ''; // Menghapus nilai input file yang tidak valid
    //         return false;
    //     }
    //     return true;
    // }


    function validasi_file() {
        var input = event.target;
        var file = input.files[0];

        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(file.name)) {
            swal.fire({
                icon: 'error',
                title: 'Error',
                timer: 2000,
                text: 'Jenis file yang diunggah tidak valid !! Harap pilih file dengan ekstensi PNG, JPG, atau JPEG',
            });
            input.value = ''; // Menghapus nilai input file yang tidak valid
            return false;
        }

        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image_edit');
            output.src = reader.result;
            console.log(output);
            // Mengonversi gambar menjadi base64
            var base64Image = reader.result.split(',')[1]; // Mengambil bagian base64 dari data URL
            // console.log(base64Image); // Base64 string hasil konversi
            // Mengatur nilai input tersembunyi
            var hiddenInput = document.getElementById('output');
            hiddenInput.value = base64Image;
            console.log(hiddenInput);
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }

        return true;
    }


    $('.modal-footer').on('click', '.updatemaster_image', function() {
        // alert("masuk");
        var id = document.getElementById('id_masterimage_edit').value;
        var image = document.getElementById('image_edit');
        var src = image.src;
        console.log(src);
        // alert(src)
        // console.log(id);
        var route = "{{ route('update_master_image', ':id') }}";
        route = route.replace(':id', id);
        // $('.updateStout').html('Saving...');
        // $('.updateMaster').html('Saving...')
        $.ajax({
            url: route,
            type: "POST",
            dataType: 'json',
            data: $('#form-master-image-edit').serialize(),
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
                    $('#edit-master_image').modal('hide');
                    $('#masterdata-image-datatables').DataTable().ajax.reload();
                });

                // location.reload();
            },
            error: function(data) {
                // console.log(data);
            }
        });
    });
</script>
