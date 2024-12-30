@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', ' Master Data Check Point')
@section('judul')
    Master Data Check Point
@endsection(judul')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn btn-lg-6 btn-flat mr-3 text-white" id="AddMasterdata"
                        style="background: rgb(22, 95, 163)">
                        <i class="fa fa-plus"></i> Add New Data
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    {{-- <hr style="border-color:  rgb(22, 95, 163); border-width: 10px; margin-top: 0;"> --}}
                    <button class="btn" style="background: #20598f; pointer-events: none;"></button>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="datatable datatable-primary">
                                    <div class="table-responsive">
                                        <table id="masterdata-checkpoint-datatables"
                                            class="table table-striped table-bordered table-hover" style="width:100%">
                                            <thead class="text-center text-white"
                                                style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                <tr>
                                                    <th class="text-white width="0%">No</th>
                                                    <th class="text-white width="5%">Name Mesin</th>
                                                    <th class="text-white width="5%">Type</th>
                                                    <th class="text-white width="5%">Kategori</th>
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
    {{-- <script rel="stylesheet" href="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            //get data from datatables
            var table = $('#masterdata-checkpoint-datatables').DataTable({
                // processing: true,
                // serverSide: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                responsive: true,
                paging: true,
                pageLength: 10,
                ajax: {
                    url: "{{ route('get_masterdata_checkpoint_datatables') }}",
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
                        searchable: false
                    },
                    {
                        data: 'name_mesin',
                        name: 'Name Mesin',
                        className: "text-left",
                        // orderable: true,
                        searchable: true
                    },
                    {
                        data: 'type',
                        name: 'Type',
                        className: "text-center",
                        // orderable: true,
                        searchable: true
                    },
                    {
                        data: 'kategori',
                        name: 'Kategori',
                        className: "text-left",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
    @include('master-data-checkpoint.modal.create.create')
    @include('master-data-checkpoint.getdata-popup.getdata_mesin')
    @include('master-data-checkpoint.getdata-popup.getdata_kategori')
    @include('master-data-checkpoint.modal.view-data.view')
    @include('master-data-checkpoint.modal.edit.edit')
    @include('master-data-checkpoint.getdata-popup.getdata_mesin2')
    @include('master-data-checkpoint.getdata-popup.getdata_kategori2')
    @include('master-data-checkpoint.modal.void.void')
@endsection(content)
