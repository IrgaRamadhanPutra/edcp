@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', ' Dahsboard | Daily Check Point')
@section('judul')
    DASHBOARD
@endsection(judul')
@section('content')
    <div class="analytics-sparkle-area card" style="background: #20598f;">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-2x fa-clock mr-2 text-white"></i>

            <h5 class="card-title m-0 text-white" id="clock"></h5>
        </div>

        {{-- <div id="class" class="row">

        </div> --}}
        <div id="row2" class="row">

        </div>

    </div>

    <div class="analytics-sparkle-area card">
        <hr style="border-color: #20598f; border-width: 10px; margin-top: 0;">
        <div class="card-header d-flex align-items-center">

            <h3 class="text-center">
                <font color="SteelBlue"><b>DAILY CHECK </b></font><span class="text-warning"><b>CALCULATION</b></span>
            </h3>
        </div>

        <div id="row3" class="row">


        </div>

        {{-- <div class="row chart-row justify-content-center align-items-center">
            <canvas id="seolinechart8" class="chartjs-render-monitor mt-0"></canvas>
        </div> --}}

    </div>
    {{-- <div class="analytics-sparkle-area card" id="chartCard">
        <hr style="border-color: #20598f; border-width: 10px; margin-top: 0;">
        <div class="card-header d-flex align-items-center">
        </div>

        <div id="pieChart"></div>

    </div> --}}
    <script>
        function displayTime() {
            var options = {
                hour12: true,
                hourCycle: 'h12',
                timeZone: 'Asia/Jakarta'
            };
            var date = new Date();
            var hours = date.getHours().toString().padStart(2,
                '0'); // Menggunakan padStart untuk menambahkan angka nol jika kurang dari 10
            var minutes = date.getMinutes().toString().padStart(2,
                '0'); // Menggunakan padStart untuk menambahkan angka nol jika kurang dari 10
            var seconds = date.getSeconds().toString().padStart(2,
                '0'); // Menggunakan padStart untuk menambahkan angka nol jika kurang dari 10
            var time = hours + ':' + minutes + ':' + seconds + ' ' + date.toLocaleTimeString('en-US', options).split(' ')[
                1]; // Menambahkan format waktu AM/PM
            document.getElementById("clock").textContent = time;
        }

        setInterval(displayTime, 1000);

        //yang dah bisa
        $(document).ready(function() {
            // ngambil data kalkulasi

            $.ajax({
                url: "{{ route('countdata_mesin') }}",
                type: 'GET',
                success: function(data) {
                    // console.log(data);

                    var html = "";
                    // console.log(html)
                    data.forEach(function(mesin) {
                        html +=
                            '<div class="col-lg-3 col-md-5 col-sm-6 col-xs-12 mb-4" style="margin:15px;">' +
                            '<div class="card bg-white" style="font-size: 15px;background:rgb(245, 255, 250);">' +
                            '<div class="card-header" style="background-color: #ccc;">' +
                            '<h6 class="card-subtitle mb-2 text-dark text-center">' +
                            '<span class="counter">' + mesin.name_mesin + '&nbsp;' + mesin
                            .type +
                            '</span>' +
                            '</h6>' +
                            '</div>' + // Closing </div> tag for card-header
                            '<div class="card-body d-flex justify-content-between">' +
                            '<div style="width: 100%;">' +
                            '<span class="tuition-fees text-dark" style="font-size: 15px;">' +
                            'PIC &nbsp;&nbsp;&nbsp; =>  ' + mesin.name_pic +
                            '</p>' +
                            '<span class="tuition-fees text-dark" style="font-size: 15px;">' +
                            'SHIFT => ' + mesin.shift +
                            '</p>' +
                            '<p class="card-text">' +
                            '<div class="progress">' +
                            '<span class="text-dark">100%</span>' +
                            '<div class="progress-bar progress-bar-success" role="progressbar" style="width: 100% ; background:rgb(37, 65, 145)" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">20% Complete</span></div>' +
                            '</div>' +
                            '<div class="flex-containser " ">' +
                            '<span class="text-warning" style="font-size: 17"> &#x25B3;  = ' +
                            mesin.abnormal + '%</span>' +
                            '</div>' +
                            '<div class="flex-containe " ">' +
                            '<span class="text-danger" style="font-size: 17"><i class="fa-sharp fa-solid fa-xmark" style="font-size: 15"></i>   = ' +
                            mesin.rusak + '%</span>' +
                            '</div>' +
                            '<div class="flex-containe " ">' +
                            '<span class="text-success" style="font-size: 15"><i class="far fa-circle" style="font-size: 15"></i> = ' +
                            mesin.ok + '%</span>' +
                            '</div>' +
                            '<div class="flex-container " ">' +
                            '<span class="text-primary" style="font-size: 15"><i class="fa-solid fa-minus" style="font-size: 15px;"></i> = ' +
                            mesin.tidak_ada + '%</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });
                    $("#row2").html(html);

                }
            });
            $.ajax({
                url: "{{ route('calculation') }}",
                type: 'GET',
                success: function(data) {
                    // console.log(data);
                    // var html2 = "";
                    // // console.log(html)
                    // data.forEach(function(mesin) {

                    // });

                    $("#row3").html(html2);

                    var html2 = "";
                    // console.log(html)
                    data.forEach(function(result) {
                        // console.log(data);
                        html2 +=
                            '<div class="col-lg-12 col-md-12 col-12">' +
                            '<div class="card bg-swage" style="font-size: 15px;background:#20598f;">' +
                            '<div class="card-body d-flex justify-content-between">' +
                            '<div style="width: 100%;">' +
                            '</p>' +
                            '<p class="card-text text">' +


                            '<div class="flex-containser " ">' +
                            '<span class="text-warning" style="font-size: 37px;"> &#x25B3;  = ' +
                            result.abnormal + '%</span>' +
                            '</div>' +
                            '<div class="flex-containe " ">' +
                            '<span class="text-danger" style="font-size: 37px;"><i class="fa-sharp fa-solid fa-xmark" style="font-size: 15"></i>   = ' +
                            result.rusak + '%</span>' +
                            '</div>' +
                            '<div class="flex-containe " ">' +
                            '<span class="text-success" style="font-size: 35px;"><i class="far fa-circle" style="font-size: 35px;"></i> = ' +
                            result.ok + '%</span>' +
                            '</div>' +
                            '<div class="flex-container " ">' +
                            '<span class="text-primary" style="font-size: 35px;"><i class="fa-solid fa-minus" style="font-size: 35px;"></i> = ' +
                            result.tidak_ada + '%</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="align-self-center" style="width: 100%;">' +
                            '<div class="progress">' +
                            '<span class="text-dark">100%</span>' +
                            '<div class="progress-bar progress-bar-success" role="progressbar" style="width: 100% ; background:rgb(37, 65, 145)" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">20% Complete</span></div>' +
                            '</div>' +
                            '<span class="sr-only">100% Selesai</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });

                    $("#row3").html(html2);


                    // var chartContainers = document.querySelectorAll(".chart-row");

                    // data.forEach(function(result, index) {
                    //     // Create the doughnut chart for the current data item
                    //     var ctx = document.createElement("canvas");
                    //     ctx.classList.add("chartjs-render-monitor");

                    //     var doughnutChart = new Chart(ctx, {
                    //         type: 'doughnut',
                    //         data: {
                    //             labels: ["OK", "ABNORMAL", "RUSAK", "TIDAK ADA"],
                    //             datasets: [{
                    //                 data: [
                    //                     result.ok,
                    //                     result.abnormal,
                    //                     result.rusak,
                    //                     result.tidak_ada
                    //                 ],
                    //                 backgroundColor: [
                    //                     "#12C498",
                    //                     "#F8CB3F",
                    //                     "#E36D68",
                    //                     "#4E4EFD",
                    //                 ],
                    //                 borderColor: "#fff"
                    //             }]
                    //         },
                    //         options: {
                    //             plugins: {
                    //                 legend: {
                    //                     labels: {
                    //                         font: {
                    //                             family: "'Nunito', 'Segoe UI', 'Arial'",
                    //                         }
                    //                     }
                    //                 }
                    //             }
                    //             // Add any other chart options you want to customize
                    //         }
                    //     });


                    //     var chartContainer = document.createElement("div");
                    //     chartContainer.classList.add("col-lg-4", "col-md-6", "col-12", "mb-4",
                    //         "d-flex", "justify-content-center", "align-items-center");
                    //     chartContainer.appendChild(ctx);

                    //     chartContainers[index % chartContainers.length].appendChild(
                    //         chartContainer);
                    // });

                }
            });
        });


        // document.addEventListener("DOMContentLoaded", () => {
        //     new ApexCharts(document.querySelector("#pieChart"), {
        //         series: [44, 55, 13, 43],
        //         chart: {
        //             height: 350,
        //             type: 'pie',
        //             toolbar: {
        //                 show: true
        //             }
        //         },
        //         labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E']
        //     }).render();
        // });
    </script>

@endsection
