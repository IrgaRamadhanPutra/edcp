@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', 'Daily Check Point Mesin')
@section('judul')
    <font color="SteelBlue"><b>DAILY CHECK POINT</b></font><span class="text-warning"><b> MESIN</b></span>
@endsection(judul')
@section('content')
    <div class="col-16">
        <div class="main-content-inner">
            <div class="row">
                <div class="col-12 text-left">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header" style="background: rgb(22, 95, 163)">
                        </div> --}}
                        <div class="card-body card-hidden" id="cardBody">
                            <div class="row mt-0">
                                <div class="col">
                                    <div class="datatable datatable-primary">
                                        <div class="table-responsive">
                                            <table id="CheckPoint-datatables"
                                                class="table table-striped table-bordered table-hover" style="width:100%">
                                                <thead class="text-center"
                                                    style="text-transform: uppercase; background-color: rgb(170, 21, 21);">
                                                    <tr>
                                                        <td class="text-white" style="width: 10%; font-size: 12px;">check
                                                            point no</td>
                                                        <td class="text-white" style="width: 5%; font-size: 12px;">shift
                                                        </td>
                                                        <td class="text-white" style="width: 10%; font-size: 12px;">PIC</td>
                                                        <td class="text-white"
                                                            style="width: 10%; font-size: 12px; text-align: center;">date
                                                        </td>
                                                        <td class="text-white"
                                                            style="width: 10%; font-size: 12px; text-align: center;">name
                                                            machine</td>
                                                        <td class="text-white"
                                                            style="width: 15%; font-size: 12px; text-align: center;">type
                                                            machine</td>
                                                        <td class="text-white" style="width: 2%; font-size: 12px;">ACTION
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-0">
                    <div class="row">
                        <div class="col-12 mt-0">
                            <div class="card">
                                <div>
                                    <button id="btnToggleCard" class="btn btn-lg btn-block" style="background: #20598f">
                                        <i class="fa-solid fa-filter text-white"></i>
                                        <span class="text-white"> VIEW TABEL </span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row mt-0">
                                        <div class="col">
                                            <h6>KODE PENGISIAN</h6>
                                            <div class="status">
                                                <h6 class="text-danger" style="font-size: 20px;"><i
                                                        class="fas fa-times"></i>&nbsp;= Rusak</h6>
                                                <h6 class="text-warning" style="font-size: 20px;">&#x25B3; = Abnormal</h6>
                                                &nbsp;
                                                <h6 class="text-success"style="font-size: 20px;"><i
                                                        class="far fa-circle"></i>=
                                                    OK</h6>
                                                <h6 class="text-primary"style="font-size: 20px;"><i
                                                        class="fa-solid fa-minus"></i>&nbsp;= Tidak ada</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('DAILY-NEW.modal.pop-up-getdata.getdata')
        @include('DAILY-NEW.modal.pop-up-getdata.getdata_pic')
        @include('DAILY-NEW.create-data.create')
        @include('DAILY-NEW.modal.view-data.view')
        {{-- <script rel="stylesheet" href="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
        <script>
            document.getElementById("btnToggleCard").addEventListener("click", function() {
                var cardBody = document.getElementById("cardBody");
                if (cardBody.classList.contains("fade-out")) {
                    // Show the element
                    cardBody.classList.remove("fade-out");
                    cardBody.style.display = "block";
                } else {
                    // Hide the element with fade-out effect
                    cardBody.classList.add("fade-out");
                    // Set a timeout to hide the element after the animation is completed
                    setTimeout(function() {
                        cardBody.style.display = "none";
                    }, ); // 1000ms is the duration of the slow-motion fade animation (same as the CSS transition duration)
                }
            });

            $(document).ready(function() {
                $('#CheckPoint-datatables').DataTable({
                    serverSide: true,
                    paging: true,
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100],
                    ajax: {
                        url: "{{ route('Get_checkpoint_datatables') }}",
                        type: 'GET'
                    },
                    columns: [{
                            data: 'daily_no',
                            className: "text-center",
                        },
                        {
                            data: 'shift',
                            className: "text-center",
                        },
                        {
                            data: 'name',
                            className: "text-center",
                        },
                        {
                            data: 'created_date',
                            className: "text-center",
                        },
                        {
                            data: 'name_mesin',
                            className: "text-center",

                        },
                        {
                            data: 'type',
                            className: "text-center",

                        },
                        {
                            data: 'action',
                            className: "text-center",
                        }
                    ],
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries per page",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "No data available",
                        infoFiltered: "(filtered from _MAX_ total entries)",
                        paginate: {
                            first: "First",
                            last: "Last",
                            next: "Next",
                            previous: "Previous"
                        }
                    },
                    dom: '<"datatable-header"lfr><"datatable-scroll"t><"datatable-footer"ip>',
                    columnDefs: [{
                            targets: '_all',
                            className: 'align-middle'
                        },
                        {
                            targets: [0, 3],
                            className: 'text-center'
                        },
                        {
                            targets: '_all',
                            orderable: false
                        }
                    ],

                });

            });
        </script>
        {{-- @include('Daily-check.ajax') --}}
        {{-- <script rel="stylesheet" href="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
    @endsection('conten')
