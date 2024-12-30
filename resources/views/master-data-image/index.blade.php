@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', 'Master Data Image')
@section('judul')
    <font color="SteelBlue"><b>MASTER DATA</b></font><span class="text-warning"><b> IMAGE</b></span>
@endsection(judul')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn btn-lg-12 btn-flat mr-3 text-white" id="AddMasterdata"
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
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="datatable datatable-primary">
                                    <div class="table-responsive">
                                        <table id="masterdata-image-datatables"
                                            class="table datatable table-striped table-hover" style="width:100%">
                                            <thead class="text-center"
                                                style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
                                                <tr>
                                                    {{-- <tr> --}}
                                                    <th class="text-white width="0%">No</th>
                                                    <th class="text-white width="10%">Name Mesin</th>
                                                    <th class="text-white width="10%">Type</th>
                                                    <th class="text-white width="10%">Type Image</th>
                                                    <th class="text-white width="20%" class="text-center">Image
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
            $('#masterdata-image-datatables').DataTable({
                // processing: true,
                serverSide: true,
                paging: true,
                pageLength: 5,
                ajax: {
                    url: "{{ route('GetDatatablesImage') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'No',
                        className: "text-center"
                    },
                    {
                        data: 'name_mesin',
                        name: 'name mesin',
                        className: "text-center"
                    },
                    {
                        data: 'type',
                        name: 'type',
                        className: "text-center"
                    },
                    {
                        data: 'type_img',
                        name: 'type_img',
                        className: "text-center"
                    },
                    {
                        data: 'img_daily',
                        name: 'Image',
                        className: "text-center",
                        render: function(data, type, full, meta) {
                            if (type === 'display') {
                                return '<img src="data:image/png;base64,' + data +
                                    '" alt="Image" style="width: 100px; height:100px;">';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });
    </script>
    @include('master-data-image.modal.create-image.create')
    @include('master-data-image.modal.pop-up-getdata.getdata')
    @include('master-data-image.modal.pop-up-getdata.getdata2')
    @include('master-data-image.modal.edit-image.edit')
    @include('master-data-image.modal.void.void')
@endsection('section')
