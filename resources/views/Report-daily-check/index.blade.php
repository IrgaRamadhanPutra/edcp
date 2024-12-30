@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', 'Daily Check Point Mesin Report')
@section('judul')
    <font color="SteelBlue"><b>DAILY CHECK POINT </b></font><span class="text-warning"><b> REPORT</b></span>
@endsection(judul')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    {{-- <div class="card-header" style="background: rgb(218, 136, 13)">
                    </div> --}}
                    <button class="btn" style="background: #20598f; pointer-events: none;"></button>
                    <div class="card-body">
                        <form id="form_export">
                            @csrf
                            <div class="form-row mb-12">
                                <div class="col-2 md-4 form-group">
                                    <label for="mesin_create">Name Mesin</label>
                                    <div class="input-group">
                                        <input type="text" name="mesin_create" class="form-control" id="mesin_create"
                                            placeholder="" style="height: 45px;">
                                        <div class="input-group-append">
                                            <button class="btn btn-default" onclick="get_masterdata()" type="button"
                                                id="get-masterdata" style="background-color: rgb(170, 21, 21);">
                                                <i class="fa fa-search text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 form-group">
                                    <label for="type_create">Type</label>
                                    <input type="type" value="" name="type_create"
                                        class="form-control form-control-lg-6" id="type_create" aria-describedby=""
                                        placeholder="" readonly style="height: 45px;">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="from_date">Date</label>
                                    <input type="date" class="form-control form-control-sm" id="from_date"
                                        name="from_date" style="width: 100%; height: 45px;">
                                </div>
                                <div class="col-2 form-group">
                                    <label for="to_date">To</label>
                                    <input type="date" class="form-control form-control-sm" id="to_date" name="to_date"
                                        style="width: 100%; height: 45px;">
                                </div>
                            </div>

                            <div class="form-row mb-12">
                                <div class="col-md-4 form-group">
                                    <label for="download_daily_pdf"></label>
                                    <div class="btn-group">
                                        <!-- Uncomment the buttons below if needed -->
                                        <!-- <a href="#" class="btn btn-success btn-sm download" id="download_daily_excel" style="font-size: 16px; padding: 10px 20px;">Print to Excel <i class="fa-solid fa-file"></i></a> -->
                                        <a href="#" class="btn text-white btn-sm download" id="download_daily_pdf"
                                            style="font-size: 16px; background:rgb(17, 76, 153); padding: 10px 20px;">Print
                                            to PDF <i class="fa-solid fa-file"></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    @include('Report-daily-check.getdata-popup.getdata_mesin')

@endsection
{{-- <script rel="stylesheet" href="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    function get_masterdata() {
        $('#ItemModalAdd1').modal('show');
        var lookUpdataItem1 = $('#lookUpdataItem1').DataTable();
        lookUpdataItem1.destroy();
        var lookUpdataItem1 = $('#lookUpdataItem1').DataTable({
            // your DataTable initialization code here
            "pagingType": "numbers",
            ajax: {
                url: "{{ route('get_master_mesin1') }}",
            },
            serverSide: true,
            deferRender: true,
            responsive: true,
            "bFilter": false,
            "order": [
                [1, 'asc']
            ],
            searching: true,
            columns: [{
                    data: 'name_mesin',
                    name: 'Name',
                    width: '20%',
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                },
                {
                    data: 'type',
                    name: 'Type',
                    width: '20%',
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                },
                {
                    data: 'descript',
                    name: 'Descript',
                    width: '30%',
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        return '<span style="font-size: 13px">' + data + '</span>';
                    }
                }
            ],
            initComplete: function(settings, json) {
                $('#lookUpdataItem1 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem1 = [];
                    var rowItem1 = $(this);
                    var rowItem1 = lookUpdataItem1.rows(rowItem1).data();
                    $.each($(rowItem1), function(key, value) {
                        $(document).ready(function() {
                            document.getElementById("mesin_create").value = value[
                                "name_mesin"];
                            document.getElementById("type_create").value = value[
                                "type"];
                        });
                        $('#ItemModalAdd1').modal('hide');
                    });
                });
            }
        });
    }

    $(document).ready(function() {
        $('#download_daily_pdf').on('click', function() {
            cekdata('pdf');
        });

        $('#download_daily_excel').on('click', function() {
            cekdata('excel');
        });

        function cekdata(type) {
            var name = document.getElementById('mesin_create').value;
            var Type = document.getElementById('type_create').value;
            var from_date = document.getElementById('from_date').value;
            var to_date = document.getElementById('to_date').value;
            if (name != "" && Type != "" && from_date != "" && to_date != "") {
                $.ajax({
                    url: "{{ route('checkData') }}",
                    type: "POST",
                    dataType: 'json',
                    data: $('#form_export').serialize(),
                    success: function(data) {
                        if (data.status == 200) {
                            window.open('/daily_report/' + name + '_' + Type + '_' +
                                from_date + '_' + to_date + '_' + type, '_blank');
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: data.message,
                            });
                        }
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Warning!',
                    text: 'Form cannot be empty!',
                });
            }
        }
    });
</script>
