<!-- Modal -->
<div class="modal fade" id="view-modal-daily" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title1 formM"></h4>
                {{-- <button type="button" class="close" pic-dismiss="modal"><span>>&times;</span></button> --}}
            </div>
            <div class="modal-body">
                <!-- Your form code here -->
                <form id="form" method="post" action="javascript:void(0)">
                    @csrf
                    @method('POST')
                    <div class="row">
                        {{-- <div class="col-12"> --}}
                        <div class="col-12 mt-0">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                                    <span><b>Daily No</b></span>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                                    <input type="type" value="" name="Daily_view"
                                                        class="form-control form-control-lg-6" id="Daily_view"
                                                        aria-describedby="" placeholder="" readonly>
                                                </div>

                                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                                    <span><b>Date</b></span>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                                    <input type="type" value="" name="Date_view"
                                                        class="form-control form-control-lg-6" id="Date_view"
                                                        aria-describedby="" placeholder="" readonly>
                                                </div>
                                            </div>
                                            {{-- <br> --}}
                                            <div class="form-row">
                                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                                    <span><b>Mesin</b></span>
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-3 mb-1">
                                                    <div class="input-group">
                                                        <input type="text" name="mesin_view" class="form-control"
                                                            id="mesin_view" placeholder="" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-2 col-md-1 mb-1">
                                                    <span><b>Type</b></span>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                                    <input type="type" value="" name="type_view"
                                                        class="form-control form-control-lg-6" id="type_view"
                                                        aria-describedby="" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-1 mb-1">
                                                    <label>
                                                        <span><b>PIC</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                                    <input type="text" name="pic_view" class="form-control"
                                                        id="pic_view" placeholder="" readonly>
                                                </div>
                                                <div class="col-1 mb-1">
                                                    <label>
                                                        <span><b>Shift</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-2 mb-1">
                                                    <input type="text" name="shift_view" class="form-control"
                                                        id="shift_view" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-1 mb-1">
                                                    <label>
                                                        <span><b>NIK</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-3 mb-1">
                                                    <input type="text" name="nik_view" class="form-control"
                                                        id="nik_view" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <br>
                                            <div id="carousel" class="carousel slide" data-ride="carousel"
                                                data-interval="false">
                                                <div class="carousel-inner" id="card-carousel">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="modal-footer"> --}}

                                </div>
                                <button type="button" style="background: #20598f" class="btn btn-secondary"
                                    data-dismiss="modal">Done</button>
                            </div>
                            {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Button click to go to previous slide in first carousel
        // Button click to open modal and show detail data
        $(document).on('click', '.view', function(e) {
            e.preventDefault();
            var id = $(this).attr('row-id');
            var daily_no = $(this).attr('data-id');
            // alert(daily_no);
            $('#view-modal-daily').modal('show');
            $('.modal-title1').text('Daily Check Point Mesin (View)');
            getDetail(id, daily_no, 'VIEW')
        });

        function getDetail(id, daily_no, method) {
            var route = "{{ route('view_daily_data') }}";
            route = route.replace(':id', id);
            // alert(route);
            $.ajax({
                url: route,
                method: 'get',
                dataType: 'json',
                data: {
                    id: id,
                    daily_no: daily_no
                },
                success: function(data) {
                    // console.log(data);

                    //header view
                    var uniqueData = {}; // Object to store unique data

                    // Iterate over the data array and keep only the unique entries based on daily_no
                    data.forEach(function(item) {
                        if (!uniqueData.hasOwnProperty(item.daily_no)) {
                            uniqueData[item.daily_no] = item;
                        }
                    });

                    var uniqueEntry = Object.values(uniqueData)[0]; // Get the first unique entry

                    $('#Daily_view').val(uniqueEntry.daily_no);
                    $('#Date_view').val(uniqueEntry.created_date);
                    $('#mesin_view').val(uniqueEntry.name_mesin);
                    $('#type_view').val(uniqueEntry.type);
                    $('#pic_view').val(uniqueEntry.name);
                    $('#shift_view').val(uniqueEntry.shift);
                    $('#nik_view').val(uniqueEntry.Nik);

                    //input radio view
                    var carouselHTML = '';
                    var previousKategori = '';
                    var activeIndex = 0;
                    var answerArray = [];

                    for (var i = 0; i < data.length; i++) {
                        answerArray.push(data[i].answer);
                    }
                    data.forEach(function(item, index) {

                        // console.log(answerArray);
                        var kategori = item.kategori;
                        var standard = item.standard;
                        var id_kategori = item.id_kategori;
                        var id_quiz = item.id_quiz;
                        var answer = item.answer;
                        console.log(answer);
                        // if (kategori !== previousKategori) {
                        //     var carouselClass = (activeIndex === 0) ?
                        //         'carousel-item active' : 'carousel-item';

                        //     carouselHTML += '<div class="' + carouselClass + '">';
                        //     carouselHTML += '<div class="card">';
                        //     carouselHTML += '<div class="card-body">';
                        //     carouselHTML += '<h5 class="card-title"><b>' + kategori +
                        //         '</b></h5>';
                        //     carouselHTML += '<div class="card-text">';
                        // }
                        if (kategori !== previousKategori) {
                            carouselHTML += '<div class="card">';
                            carouselHTML += '<div class="card-body">';
                            carouselHTML += '<h5 class="card-title"><b>' + kategori +
                                '</b></h5>';
                            carouselHTML += '<div class="card-text">';
                        }
                        carouselHTML += '<h6>' + standard + '</h6>';
                        carouselHTML += '&nbsp; &nbsp;';
                        carouselHTML += '&nbsp; &nbsp;';
                        carouselHTML += '<input type="radio" id="result' + (index + 1) +
                            '_Rusak" name="result[]' + (index + 1) + '" value="R"' + (
                                answer === "R" ? " checked" : "") + ' readonly>';
                        carouselHTML += '&nbsp;';
                        carouselHTML += '<label for="result' + (index + 1) +
                            '_Rusak" style="font-size: 30px;' + (answer === "R" ?
                                " color: blue;" : "") +
                            '" class="text-danger"><i class="fa-solid fa-xmark"></i></label>';
                        carouselHTML += '&nbsp;&nbsp;';
                        carouselHTML += '&nbsp;&nbsp;';
                        carouselHTML += '<input type="radio" id="result' + (index + 1) +
                            '_Abnormal" name="result[]' + (index + 1) + '" value="A"' + (
                                answer === "A" ? " checked" : "") + ' readonly>';
                        carouselHTML += '&nbsp;';
                        carouselHTML += '<label for="result' + (index + 1) +
                            '_Abnormal" style="font-size: 30px;' + (answer === "A" ?
                                " color: blue;" : "") +
                            '" class="text-warning">&#x25B3;</label>';
                        carouselHTML += '&nbsp;';
                        carouselHTML += '&nbsp;&nbsp;';
                        carouselHTML += '&nbsp;&nbsp;';
                        carouselHTML += '<input type="radio" id="result' + (index + 1) +
                            '_OK" name="result[]' + (index + 1) + '" value="O"' + (
                                answer === "O" ? " checked" : "") + ' readonly>';
                        carouselHTML += '&nbsp;';
                        carouselHTML += '<label for="result' + (index + 1) +
                            '_OK" style="font-size: 28px;' + (answer === "O" ?
                                " color: blue;" : "") +
                            '" class="text-success"><i class="fa-regular fa-circle"></i></label>';
                        carouselHTML += '&nbsp;';
                        carouselHTML += '&nbsp;&nbsp;';
                        carouselHTML += '&nbsp;&nbsp;';
                        carouselHTML += '<input type="radio" id="result' + (index + 1) +
                            '_TidakAda" name="result[]' + (index + 1) + '" value="T"' + (
                                answer === "T" ? " checked" : "") + ' readonly>';
                        carouselHTML += '&nbsp;';
                        carouselHTML += '<label for="result' + (index + 1) +
                            '_TidakAda" style="font-size: 28px;' + (answer === "T" ?
                                " color: blue;" : "") +
                            '" class="text-primary"><i class="fa-solid fa-minus"></i></label>';
                        carouselHTML += '<br>';
                        // ... (remaining radio button and label code)
                        previousKategori = kategori;
                        if (index === data.length - 1 || data[index + 1].kategori !==
                            kategori) {
                            carouselHTML += '</div>';
                            carouselHTML += '</div>';
                            carouselHTML += '</div>';
                            carouselHTML += '</div>';

                            activeIndex++;
                        }
                    });
                    $(document).ready(function() {
                        // Set radio buttons to readonly
                        // $('input[type="radio"]').prop('readonly', true);
                        $('input[type="radio"]').on('click', function(e) {
                            e.preventDefault();
                            return false;
                        });
                    });
                    // document.getElementById('card-carousel').innerHTML = carouselHTML;
                    $('#carousel').html(carouselHTML);

                    // var cardHTML = '';
                    // data.forEach(function(item, index) {
                    //     var kategori = item.kategori;
                    //     var standard = item.standard;
                    //     var id_kategori = item.id_kategori;
                    //     var id_quiz = item.id_quiz;
                    //     cardHTML += '<h5 class="card-title"><b>' + kategori +
                    //         '</b></h5>';
                    //     cardHTML += '<div class="card-text">';
                    //     cardHTML += '<h6>' + standard + '</h6>';
                    //     cardHTML += '&nbsp; &nbsp;';
                    //     cardHTML += '<input type="radio" id="result' + (index + 1) +
                    //         '_Rusak" name="result[]' + (index + 1) + '" value="R">';
                    //     cardHTML += '&nbsp;';
                    //     cardHTML += '<label for="result' + (index + 1) +
                    //         '_Rusak" style="font-size: 30px;" class="text-danger"><i class="fa-solid fa-xmark"></i></label>';
                    //     cardHTML += '&nbsp;&nbsp;';
                    //     cardHTML += '&nbsp;&nbsp;';
                    //     cardHTML += '<input type="radio" id="result' + (index + 1) +
                    //         '_Abnormal" name="result[]' + (index + 1) + '" value="A">';
                    //     cardHTML += '&nbsp;';
                    //     cardHTML += '<label for="result' + (index + 1) +
                    //         '_Abnormal" style="font-size: 30px;" class="text-warning">&#x25B3;</label>';
                    //     cardHTML += '&nbsp;';
                    //     cardHTML += '&nbsp;&nbsp;';
                    //     cardHTML += '&nbsp;&nbsp;';
                    //     cardHTML += '<input type="radio" id="result' + (index + 1) +
                    //         '_OK" name="result[]' + (index + 1) + '" value="O">';
                    //     cardHTML += '&nbsp;';
                    //     cardHTML += '<label for="result' + (index + 1) +
                    //         '_OK" style="font-size: 28px;" class="text-success"><i class="fa-regular fa-circle"></i></label>';
                    //     cardHTML += '&nbsp;';
                    //     cardHTML += '&nbsp;&nbsp;';
                    //     cardHTML += '&nbsp;&nbsp;';
                    //     cardHTML += '<input type="radio" id="result' + (index + 1) +
                    //         '_TidakAda" name="result[]' + (index + 1) + '" value="T">';
                    //     cardHTML += '&nbsp;';
                    //     cardHTML += '<label for="result' + (index + 1) +
                    //         '_TidakAda" style="font-size: 28px;" class="text-primary"><i class="fa-solid fa-minus"></i></label>';
                    //     cardHTML += '<br>';
                    //     if (index === data.length - 1 || data[index + 1].kategori !==
                    //         kategori) {
                    //         cardHTML += '</div>';
                    //         cardHTML += '</div>';
                    //         cardHTML += '</div>';
                    //         cardHTML += '</div>';
                    //     }
                    // });

                    // Append the generated HTML code to the desired element on your webpage
                    // document.getElementById('card1').innerHTML = cardHTML;
                    // // console.log(cardHTML);
                    // // $('#card-carousel').html(cardHTML);

                    // function nextCarouselItem() {
                    //     $('.carousel').carousel('next');
                    // }

                    // // Fungsi untuk menggerakkan carousel ke item sebelumnya
                    // function prevCarouselItem() {
                    //     $('.carousel').carousel('prev');
                    // }

                    // // Mengaitkan fungsi dengan button "Next" dan "Previous"
                    // $(document).ready(function() {
                    //     $('#btnNext').click(function() {
                    //         nextCarouselItem();
                    //     });

                    //     $('#btnPrev').click(function() {
                    //         prevCarouselItem();
                    //     });
                    // });
                    // Tambahkan fungsi previous dan next
                    // var carousel = $("#card-carousel");
                    // var currentIndex = 0

                    // var items = carousel.find(".carousel-item");
                    // var totalItems = items
                    // var totalItems = items.length;

                    // // Fungsi untuk menampilkan slide berikutnya
                    // function showNextSlide() {
                    //     var nextIndex = (currentIndex + 1) % totalItems;
                    //     items.eq(currentIndex).removeClass("active");
                    //     items.eq(nextIndex).addClass("active");
                    //     currentIndex = nextIndex;
                    // }

                    // // Fungsi untuk menampilkan slide sebelumnya
                    // function showPreviousSlide() {
                    //     var prevIndex = (currentIndex - 1 + totalItems) % totalItems;
                    //     items.eq(currentIndex).removeClass("active");
                    //     items.eq(prevIndex).addClass("active");
                    //     currentIndex = prevIndex;
                    // }

                    // // Memanggil fungsi showNextSlide() ketika tombol next diklik
                    // $("#btnNext").on("click", function() {
                    //     showNextSlide();
                    // });

                    // // Memanggil fungsi showPreviousSlide() ketika tombol previous diklik
                    // $("#btnPrev").on("click", function() {
                    //     showPreviousSlide();
                    // });
                }

            });
        }
    });
</script>
