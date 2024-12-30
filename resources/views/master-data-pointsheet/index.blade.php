@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', ' Master Data Pointsheet')
@section('judul')
    <font color="SteelBlue"><b>MASTER DATA</b></font><span class="text-warning"><b> POINTSHEET</b></span>
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
                                        <table id="masterdata-point-datatables"
                                            class="table table-striped table-bordered table-hover" style="width:100%">
                                            <thead class="text-center text-white"
                                                style="text-transform: uppercase; font-size: 10px; background-color:rgb(170, 21, 21)">
                                                <tr>
                                                    <th class="text-white width="1%">No</th>
                                                    <th class="text-white width="5%">Name</th>
                                                    <th class="text-white width="5%">Type</th>
                                                    <th class="text-white width="5%">Kategori</th>
                                                    <th class="text-white width="20%">Standart</th>
                                                    <th class="text-white width="2%">ACTION</th>
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
    <script>
        $(document).ready(function() {
            //get data from datatables
            var table = $('#masterdata-point-datatables').DataTable({
                // processing: true,
                // serverSide: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                responsive: true,
                paging: true,
                pageLength: 10,
                ajax: {
                    url: "{{ route('Get_master_pointsheet') }}",
                },
                columns: [{
                        "data": 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        "data": "name_mesin"
                    },
                    {
                        "data": "type"
                    },
                    {
                        "data": "kategori"
                    },
                    {
                        "data": "standard"
                    },
                    {
                        "data": "action",
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
    </script>
    @include('master-data-pointsheet.modal.create-point.create')
    @include('master-data-pointsheet.modal.getdata-popup.getdata_mesin')
    @include('master-data-pointsheet.modal.getdata-popup.getdata_desc')
    @include('master-data-pointsheet.modal.edit-point.edit')
    @include('master-data-pointsheet.modal.getdata-popup.getdata_mesin2')
    @include('master-data-pointsheet.modal.getdata-popup.getdata_desc2')
    @include('master-data-pointsheet.modal.void-point.void')
@endsection(content)
