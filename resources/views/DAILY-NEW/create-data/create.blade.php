<form id="form" method="post" action="javascript:void(0)">
    @csrf
    @method('POST')
    <div class="row">
        {{-- <div class="col-12"> --}}
        <div class="col-12 mt-0">
            <div class="card">
                {{-- <hr style="border-color:  rgb(22, 95, 163); border-width: 10px; margin-top: 0;"> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-row">
                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                    <h6><b>Daily No</b></h6>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                    <input type="type" value="{{ $data_Check }}" name="Daily_create"
                                        class="form-control form-control-lg-6" id="Date_create" aria-describedby=""
                                        placeholder="" readonly>
                                </div>

                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                    <h6><b>Date</b></h6>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                    <input type="type" value="{{ $getDate }}" name="Date_create"
                                        class="form-control form-control-lg-6" id="Date_create" aria-describedby=""
                                        placeholder="" readonly>
                                </div>

                                {{-- <div class="form-row"> --}}
                            </div>
                            {{-- <br> --}}
                            <div class="form-row">
                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                    <h6><b>Mesin</b></h6>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 mb-1">
                                    <div class="input-group">
                                        <input type="text" name="mesin_create" class="form-control" id="mesin_create"
                                            placeholder="">
                                        <div class="input-group-append">
                                            <button class="btn btn-default" type="button" id="get-masterdata"
                                                style="background-color: rgb(170, 21, 21);">
                                                <i class="fa fa-search text-white"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                    <h6><b>Type</b></h6>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                    <input type="type" value="" name="type_create"
                                        class="form-control form-control-lg-6" id="type_create" aria-describedby=""
                                        placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                    <h6><b>PIC</b></h6>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 mb-1">
                                    <div class="input-group">
                                        <input type="text" name="pic_create" class="form-control" id="pic_create"
                                            placeholder="">
                                        <div class="input-group-append">
                                            <button class="btn btn-default" type="button" id="get-masterdata1"
                                                style="background-color:  rgb(170, 21, 21);">
                                                <i class="fa fa-search text-white"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 mb-1">
                                    <label>
                                        <h6><b>Shift</b></h6>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                    <input type="text" value="" name="shift_create"
                                        class="form-control form-control-lg-6" id="shift_create" aria-describedby=""
                                        placeholder="" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-1 mb-1">
                                    <label>
                                        <h6><b>NIK</b></h6>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                    <input type="text" value="" name="nik_create"
                                        class="form-control form-control-lg-6" id="nik_create" aria-describedby=""
                                        placeholder="" readonly>
                                </div>
                            </div>
                            <br>

                            {{-- WIRECUT --}}
                            <div id="card-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        {{-- <div class="card" id="card1">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <button id="btnPrev"
                                        style="font-size: 30px; background: #20598f;"class="btn btn-secondary btn-sm
                                        btn-block"><i
                                            class="fa-solid fa-arrow-left"></i></button>
                                </div>
                                <div class="col-md-1 offset-md-10">
                                    <button id="btnNext" style="background: #20598f"
                                        class="btn btn-secondary btn-sm btn-block"><i style="font-size: 30px;"
                                            class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="BtnSave" class="btn btn-secondary btn-right"
                    style="background: #20598f">SIMPAN</button>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</form>
<script>
    $(document).ready(function() {
        // document.getElementById("BtnSave").disabled = true;
        // Function to get master data
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

                            width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                            className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                            "render": function(data, type, row,
                                meta) { // mengatur ukuran font pada kolom
                                return '<span style="font-size: 13px">' + data +
                                    '</span>';
                            }
                        },
                        {
                            data: 'type',

                            width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                            className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                            "render": function(data, type, row,
                                meta) { // mengatur ukuran font pada kolom
                                return '<span style="font-size: 13px">' + data +
                                    '</span>';
                            }
                        },
                        {
                            data: 'descript',

                            width: '30%', // mengatur lebar kolom DESCRIPT menjadi 30%
                            className: 'text-center', // mengatur alignment teks pada kolom menjadi left
                            "render": function(data, type, row,
                                meta) { // mengatur ukuran font pada kolom
                                return '<span style="font-size: 13px">' + data +
                                    '</span>';
                            }
                        },


                    ],

                    "initComplete": function(settings, json) {
                        // $('div.dataTables_filter input').focus();
                        $('#lookUpdataItem1 tbody').on('dblclick', 'tr', function() {
                            var dataArrItem1 = [];
                            var rowItem1 = $(this);
                            var rowItem1 = lookUpdataItem1.rows(rowItem1).data();
                            $.each($(rowItem1), function(key, value) {
                                var mesinCreateInput = document
                                    .getElementById("mesin_create");
                                var typeCreateInput = document
                                    .getElementById("type_create");

                                mesinCreateInput.value = value[
                                    "name_mesin"];
                                typeCreateInput.value = value["type"];
                                // alert(typeCreateInput);
                                $('#ItemModalAdd1').modal('hide');
                                // $('#pic_create').focus();

                                var mesin_create = value["name_mesin"];
                                var type_create = value["type"];

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]'
                                        ).attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ route('validasi1') }}",
                                    type: "POST",
                                    data: {
                                        mesin_create: mesin_create,
                                        type_create: type_create
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        var cardHTML = '';
                                        var hiddenInputHTML =
                                            ''; // Declare the hidden input variable
                                        var hiddenInputHTML1 =
                                            '';
                                        data.forEach(function(
                                            item, index
                                        ) {
                                            var kategori =
                                                item
                                                .kategori;
                                            var standard =
                                                item
                                                .standard;


                                            var id_point =
                                                item
                                                .id_point;

                                            var id_quiz =
                                                item.id;
                                            if (index ===
                                                0 ||
                                                data[
                                                    index -
                                                    1]
                                                .kategori !==
                                                kategori
                                            ) {
                                                cardHTML
                                                    +=
                                                    '<div class="carousel-item ' +
                                                    (index ===
                                                        0 ?
                                                        'active' :
                                                        ''
                                                    ) +
                                                    '" id="card' +
                                                    (index +
                                                        1
                                                    ) +
                                                    '">';
                                                cardHTML
                                                    +=
                                                    '<div class="card">';
                                                cardHTML
                                                    +=
                                                    '<div class="card-body">';
                                                cardHTML
                                                    +=
                                                    '<h5 class="card-title"><b>' +
                                                    kategori +
                                                    '</b></h5>';
                                                cardHTML
                                                    +=
                                                    '<div class="card-text">';
                                            }
                                            cardHTML +=
                                                '<h6>' +
                                                standard +
                                                '</h6>';
                                            cardHTML +=
                                                '&nbsp; &nbsp;';
                                            cardHTML +=
                                                '<input type="radio" id="result' +
                                                (index +
                                                    1) +
                                                '_Rusak" name="result[]' +
                                                (index +
                                                    1) +
                                                '" value="R">';
                                            cardHTML +=
                                                '&nbsp;';
                                            cardHTML +=
                                                '<label for="result' +
                                                (index +
                                                    1) +
                                                '_Rusak" style="font-size: 30px;" class="text-danger mr-3"><i class="fa-solid fa-xmark"></i></label>';
                                            cardHTML +=
                                                '&nbsp;&nbsp;';
                                            cardHTML +=
                                                '&nbsp;&nbsp;';
                                            cardHTML +=
                                                '<input type="radio" id="result' +
                                                (index +
                                                    1) +
                                                '_Abnormal" name="result[]' +
                                                (index +
                                                    1) +
                                                '" value="A">';
                                            cardHTML +=
                                                '&nbsp;';
                                            cardHTML +=
                                                '<label for="result' +
                                                (index +
                                                    1) +
                                                '_Abnormal" style="font-size: 30px;" class="text-warning mr-3">&#x25B3;</label>';
                                            cardHTML +=
                                                '&nbsp;';
                                            cardHTML +=
                                                '&nbsp;&nbsp;';
                                            cardHTML +=
                                                '&nbsp;&nbsp;';
                                            cardHTML +=
                                                '<input type="radio" id="result' +
                                                (index +
                                                    1) +
                                                '_OK" name="result[]' +
                                                (index +
                                                    1) +
                                                '" value="O">';
                                            cardHTML +=
                                                '&nbsp;';
                                            cardHTML +=
                                                '<label for="result' +
                                                (index +
                                                    1) +
                                                '_OK" style="font-size: 28px;" class="text-success mr-3"><i class="fa-regular fa-circle"></i></label>';
                                            cardHTML +=
                                                '&nbsp;';
                                            cardHTML +=
                                                '&nbsp;&nbsp;';
                                            cardHTML +=
                                                '&nbsp;&nbsp;';
                                            cardHTML +=
                                                '<input type="radio" id="result' +
                                                (index +
                                                    1) +
                                                '_TidakAda" name="result[]' +
                                                (index +
                                                    1) +
                                                '" value="T">';
                                            cardHTML +=
                                                '&nbsp;';
                                            cardHTML +=
                                                '<label for="result' +
                                                (index +
                                                    1) +
                                                '_TidakAda" style="font-size: 28px;" class="text-primary mr-3"><i class="fa-solid fa-minus"></i></label>';
                                            cardHTML +=
                                                '<br>';
                                            hiddenInputHTML
                                                +=
                                                '<input type="hidden" id="id+kategori' +
                                                (
                                                    index +
                                                    1) +
                                                '" name="id_point[]' +
                                                (index +
                                                    1) +
                                                '" value="' +
                                                id_point +
                                                '">'; // Add hidden input with the corresponding value
                                            // console.log(hiddenInputHTML1);
                                            hiddenInputHTML1
                                                +=
                                                '<input type="hidden" id="id_quiz' +
                                                (
                                                    index +
                                                    1) +
                                                '" name="id_quiz[]' +
                                                (index +
                                                    1) +
                                                '" value="' +
                                                id_quiz +
                                                '">';
                                            // var result = $('input[name="result[]"]:checked').val();
                                            // console.log(result);
                                            if (index ===
                                                data
                                                .length -
                                                1 ||
                                                data[
                                                    index +
                                                    1]
                                                .kategori !==
                                                kategori
                                            ) {
                                                cardHTML
                                                    +=
                                                    '</div>';
                                                cardHTML
                                                    +=
                                                    '</div>';
                                                cardHTML
                                                    +=
                                                    '</div>';
                                                cardHTML
                                                    +=
                                                    '</div>';
                                            }
                                        });
                                        // Append the hidden input HTML after the loop
                                        cardHTML +=
                                            hiddenInputHTML;
                                        cardHTML +=
                                            hiddenInputHTML1;

                                        // console.log(dataArray);
                                        // console.log(cardHTML);
                                        $('#card-carousel')
                                            .html(cardHTML);

                                        // Tambahkan fungsi previous dan next
                                        var carousel = $(
                                            "#card-carousel"
                                        );
                                        var currentIndex = 0

                                        var items = carousel
                                            .find(
                                                ".carousel-item"
                                            );
                                        var totalItems = items
                                        var totalItems = items
                                            .length;

                                        // Fungsi untuk menampilkan slide berikutnya
                                        function showNextSlide() {
                                            var nextIndex = (
                                                    currentIndex +
                                                    1) %
                                                totalItems;
                                            items.eq(
                                                    currentIndex
                                                )
                                                .removeClass(
                                                    "active");
                                            items.eq(nextIndex)
                                                .addClass(
                                                    "active");
                                            currentIndex =
                                                nextIndex;
                                        }

                                        // Fungsi untuk menampilkan slide sebelumnya
                                        function showPreviousSlide() {
                                            var prevIndex = (
                                                    currentIndex -
                                                    1 +
                                                    totalItems
                                                ) %
                                                totalItems;
                                            items.eq(
                                                    currentIndex
                                                )
                                                .removeClass(
                                                    "active");
                                            items.eq(prevIndex)
                                                .addClass(
                                                    "active");
                                            currentIndex =
                                                prevIndex;
                                        }

                                        // Memanggil fungsi showNextSlide() ketika tombol next diklik
                                        $("#btnNext").on(
                                            "click",
                                            function() {
                                                showNextSlide
                                                    ();
                                            });

                                        // Memanggil fungsi showPreviousSlide() ketika tombol previous diklik
                                        $("#btnPrev").on(
                                            "click",
                                            function() {
                                                showPreviousSlide
                                                    ();
                                            });
                                    }
                                })
                            });
                        });

                    },

                });


            });
        }
        // Function to get master data 1
        function get_master_data1() {
            $('#get-masterdata1').click(function() {
                $('#ItemModalAdd2').modal('show');
                var lookUpdataItem2 = $('#lookUpdataItem2').DataTable();
                lookUpdataItem2.destroy();
                var lookUpdataItem2 = $('#lookUpdataItem2').DataTable({
                    // your DataTable initialization code here
                    "pagingType": "numbers",
                    ajax: {
                        url: "{{ route('get_master_pic') }}",
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
                            data: 'name',

                            width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                            className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                            "render": function(data, type, row,
                                meta) { // mengatur ukuran font pada kolom
                                return '<span style="font-size: 13px">' + data +
                                    '</span>';
                            }
                        },
                        {
                            data: 'shift',

                            width: '20%', // mengatur lebar kolom ITEM CODE menjadi 20%
                            className: 'text-center', // mengatur alignment teks pada kolom menjadi center
                            "render": function(data, type, row,
                                meta) { // mengatur ukuran font pada kolom
                                return '<span style="font-size: 13px">' + data +
                                    '</span>';
                            }
                        },
                        {
                            data: 'Nik',

                            width: '30%', // mengatur lebar kolom DESCRIPT menjadi 30%
                            className: 'text-center', // mengatur alignment teks pada kolom menjadi left
                            "render": function(data, type, row,
                                meta) { // mengatur ukuran font pada kolom
                                return '<span style="font-size: 13px">' + data +
                                    '</span>';
                            }
                        },
                        {
                            data: 'section',

                            width: '30%', // mengatur lebar kolom DESCRIPT menjadi 30%
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
                            var dataArrItem2 = [];
                            var rowItem2 = $(this);
                            var rowItem2 = lookUpdataItem2.rows(rowItem2).data();
                            $.each($(rowItem2), function(key, value) {
                                document.getElementById("pic_create")
                                    .value = value[
                                        "name"];
                                document.getElementById("shift_create")
                                    .value = value[
                                        "shift"];
                                document.getElementById("nik_create")
                                    .value = value[
                                        "Nik"];
                                $('#ItemModalAdd2').modal('hide');
                            });

                        });

                    },

                });


            });
        }

        // Bind button click event to get master data
        $('#get-masterdata').click(function() {
            get_master_data();
        });
        // Bind button click event to get master data 1
        $('#get-masterdata1').click(function() {
            get_master_data1();
        });
    });


    // btn save for add data
    $('#BtnSave').click(function() {

        var name = $('#mesin_create').val();
        var type = $('#type_create').val();
        var shift = $('#shift').val();
        var pic = $('#pic_create').val();
        if (pic == '' || pic == 0 || shift == '' || shift == 0 || name == '' || name == 0 || type ==
            '' || type == 0

        ) {
            // Display error message and prevent user from going to next slide
            swal.fire({
                icon: 'error',
                timer: 2000,
                title: 'Error',
                text: 'Inputan dan Checklist Tidak Boleh Ada yang Kosong',
            });
        } else {
            $.ajax({
                url: "{{ route('validasipoint_length') }}",
                type: 'POST',
                data: $('#form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status === 'success') {
                        // Tampilkan pesan sukses
                        // alert(data.message);
                        validateAndSaveData();
                        // validasi mesin and pic

                    } else {
                        // Tampilkan pesan error
                        // alert(data.message);
                        swal.fire({
                            icon: 'error',
                            timer: 2000,
                            title: 'Error',
                            text: 'Inputan dan Checklist Tidak Boleh Ada yang Kosong',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error jika ada masalah saat melakukan permintaan AJAX
                    swal.fire({
                        icon: 'warning',
                        timer: 2000,
                        title: 'Warning',
                        text: 'PointSheet Tidak ada ',
                    });
                }
            });




        }

        function validateAndSaveData() {
            $.ajax({
                url: "{{ route('validasi_point') }}",
                type: 'POST',
                data: $('#form').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data == '') {
                        $.ajax({
                            url: "{{ route('validasi_shift') }}",
                            type: 'POST',
                            data: $('#form').serialize(),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                if (data.length === 0) {
                                    $.ajax({
                                        url: "{{ route('add_Check_Point_answer') }}",
                                        type: 'POST',
                                        data: $('#form')
                                            .serialize(),
                                        headers: {
                                            'X-CSRF-TOKEN': $(
                                                    'meta[name="csrf-token"]')
                                                .attr('content')
                                        },
                                        success: function(response) {
                                            if (response.status ===
                                                'Sukses') {
                                                swal.fire({
                                                    icon: 'success',
                                                    title: 'Success',
                                                    timer: 2000,
                                                    text: 'Data Berhasil di Simpan',
                                                }).then(function() {
                                                    $('#nik_create')
                                                        .val("");
                                                    $('#shift_create')
                                                        .val("");
                                                    $('#CheckPoint-datatables')
                                                        .DataTable()
                                                        .ajax
                                                        .reload();

                                                });

                                                // Generate random characters
                                                var randomChars = '';
                                                var possibleChars =
                                                    'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                                for (var i = 0; i <
                                                    3; i++) {
                                                    randomChars +=
                                                        possibleChars
                                                        .charAt(Math.floor(
                                                            Math
                                                            .random() *
                                                            possibleChars
                                                            .length));
                                                }

                                                // Generate random numbers
                                                var randomNumbers = '';
                                                var possibleNumbers =
                                                    'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                                for (var i = 0; i <
                                                    3; i++) {
                                                    randomNumbers +=
                                                        possibleNumbers
                                                        .charAt(Math.floor(
                                                            Math
                                                            .random() *
                                                            possibleNumbers
                                                            .length));
                                                }

                                                var newCheckPointNo =
                                                    moment().format(
                                                        'YYMM') +
                                                    randomChars +
                                                    '-' + randomNumbers;


                                                document
                                                    .getElementById(
                                                        "Date_create"
                                                    )
                                                    .value =
                                                    newCheckPointNo;
                                                $("#card1")
                                                    .hide();
                                                // var checkPointNo = data['check_point_no'];
                                                $('#mesin_create')
                                                    .val(
                                                        ""
                                                    );
                                                $('#type_create')
                                                    .val(
                                                        ""
                                                    );
                                                $('#pic_create')
                                                    .val(
                                                        ""
                                                    );
                                                $('#shift_create')
                                                    .val(
                                                        ""
                                                    );
                                                $('#nik_create')
                                                    .val(
                                                        ""
                                                    );
                                                // console.log(checkPointNo);
                                                // $("#msg").html(data.msg);
                                            } else {
                                                // Handle error response here
                                                swal.fire({
                                                    icon: 'error',
                                                    timer: 2000,
                                                    title: 'Error',
                                                    text: 'Inputan dan Checklist Tidak Boleh Ada yang Kosong',
                                                });
                                            }
                                        }
                                    });
                                } else {
                                    // alert('eror karna data ada')
                                    //2
                                    swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        timer: 2000,
                                        text: 'Data sudah submit',
                                    }).then(function() {

                                        $("#card1")
                                            .hide();
                                        $("#card1")
                                            .hide();
                                        $("#card1")
                                            .hide();
                                        // var checkPointNo = data['check_point_no'];
                                        $('#mesin_create')
                                            .val("");
                                        $('#type_create')
                                            .val("");
                                        $('#pic_create')
                                            .val("");
                                        $('#shift_create')
                                            .val("");
                                        $('#nik_create')
                                            .val("");
                                        $('#nik_create')
                                            .val("");
                                    });
                                }

                            }

                        });
                        // Send form data to server using AJAX
                    } else {
                        // alert('eror karna data ada')
                        //2
                        swal.fire({
                            icon: 'error',
                            title: 'Error',
                            timer: 2000,
                            text: 'Data sudah submit',
                        }).then(function() {

                            $("#card1").hide();
                            // var checkPointNo = data['check_point_no'];
                            $('#mesin_create').val("");
                            $('#type_create').val("");
                            $('#pic_create').val("");
                            $('#shift_create').val("");
                            $('#nik_create').val("");
                            $('#nik_create').val("");
                        });
                    }
                }
            });
        }

    });
</script>
