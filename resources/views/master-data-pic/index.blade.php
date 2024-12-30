@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', 'Master Data PIC')
@section('judul')
    <font color="SteelBlue"><b>MASTER DATA</b></font><span class="text-warning"><b> PIC</b></span>
@endsection(judul')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="d-flex align-items-center">
                    {{-- <button type="button" class="btn btn-primary btn-lg-6 btn-flat mr-3" id="AddMasterdata">
                        <i class="fa fa-plus"></i> Add New Data
                    </button> --}}
                    <button type="button" class="btn btn btn-lg-6 btn-flat mr-3 text-white" id="AddMasterdata"
                        style="background: rgb(22, 95, 163)">
                        <i class="fa fa-plus"></i> Add New Data
                    </button>
                    {{-- <button type="button" id="checkStockItem" class="btn btn-flat btn-sm btn-danger">
                        <i class="fa fa-check"></i> Stock
                    </button> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    {{-- <div class="card-header" style="background: rgb(22, 95, 163)">
                    </div> --}}
                    <button class="btn" style="background: #20598f; pointer-events: none;"></button>
                    {{-- <hr style="border-color:  rgb(22, 95, 163); border-width: 10px; margin-top: 0;"> --}}
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="datatable datatable-primary">
                                    <div class="table-responsive">
                                        <table id="masterdata-pic-datatables" class="table table-striped table-hover"
                                            style="width:100%">
                                            <thead class="text-center"
                                                style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                <tr>
                                                    {{-- <tr> --}}
                                                    <th class="text-white width="0%">No</th>
                                                    <th class="text-white width="10%">Name </th>
                                                    <th class="text-white width="10%">Nik </th>
                                                    <th class="text-white width="10%">Shift</th>
                                                    <th class="text-white width="20%" class="text-center">Section
                                                    </th>
                                                    <th class="text-white width="10%">ACTION</th>
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
        </div>
    </div>
    <script rel="stylesheet" href="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            //get data from datatables
            var table = $('#masterdata-pic-datatables').DataTable({
                // processing: true,
                // serverSide: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                responsive: true,
                paging: true,
                pageLength: 5,
                ajax: {
                    url: "{{ route('get_masterpic_datatables') }}",
                },
                // order: [
                // [0, 'desc']
                // ],
                // responsive: true,
                language: {
                    // <i class="fa-duotone fa-spinner-third"></i>
                    // <i class="fa-regular fa-loader"></i>
                    processing: '<i class="fa fa-duotone fa-spinner fa-spin fa-4x"></i> Loading...' // menampilkan spinner berupa ikon
                    // FontAwesome
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'No',
                        className: "text-center",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'Name PIC',
                        className: "text-left",
                    },
                    {
                        data: 'Nik',
                        name: 'NIK',
                        className: "text-left",
                    },
                    {
                        data: 'shift',
                        name: 'Shift',
                        className: "text-center",
                    },
                    {
                        data: 'section',
                        name: 'Section',
                        className: "text-left",
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }

                ]
            });
        });
    </script>

    @include('master-data-pic.create.create')
    @include('master-data-pic.view-data.view')
    @include('master-data-pic.edit.edit')
    @include('master-data-pic.void.void')
@endsection(content)
