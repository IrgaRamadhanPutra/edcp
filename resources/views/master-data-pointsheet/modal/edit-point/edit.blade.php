<div class="modal fade bd-example-modal-lg edit-master-pointsheet" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="edit-master-pointsheet" role="dialog">
    <div class="modal-dialog modal-lg" style="max-width: 900px; width: 100%">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata PointSheet --Edit--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        {{-- <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div> --}}
                        <form id="form-masterdata-pointsheet-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('post')
                            <input type="hidden" name="edit_master_pointsheet" id="edit_master_pointsheet">
                            <br>
                            @include('master-data-pointsheet.modal.edit-point.form')
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-primary addRowEdit" id="addRowEdit"> Add Item</button> --}}
                                <button type="button"class="btn btn-secondary" style="background: rgb(16, 130, 175)"
                                    onclick="clearedit()" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                                    &nbsp;Close</button>

                                <button type="button" style="background: rgb(16, 130, 175)"
                                    class="btn btn-secondary updateMasterdata"><i class="fa-solid fa-floppy-disk"></i>
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
    //select data master mesin
    function Getdatamesinedit() {
        $('#ItemModaledit1').modal('show');
        var lookUpdataItem3 = $('#lookUpdataItem3').DataTable();
        lookUpdataItem3.destroy();
        var lookUpdataItem3 = $('#lookUpdataItem3').DataTable({
            // your DataTable initialization code here
            "pagingType": "numbers",
            ajax: {
                url: "{{ route('Get_master_mesin_edit') }}",
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
                    "data": "name_mesin"
                },
                {
                    "data": "type"
                },
            ],
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpdataItem3 tbody').on('dblclick', 'tr', function() {
                    var dataArrItem1 = [];
                    var rowItem1 = $(this);
                    var rowItem1 = lookUpdataItem3.rows(rowItem1).data();
                    $.each($(rowItem1), function(key, value) {
                        $(document).ready(function() {
                            document.getElementById("mesin_edit").value = value[
                                "name_mesin"];
                            document.getElementById("type_edit").value = value[
                                "type"];
                        });
                        $('#ItemModaledit1').modal('hide');

                    });
                });

            },

        });
    }

    // get desc kategori and standard
    function Getdescedit() {
        $('#ItemModaledit2').modal('show');
        var lookUpdataItemdescedit = $('#lookUpdataItemdescedit').DataTable();
        lookUpdataItemdescedit.destroy();
        var lookUpdataItemdescedit = $('#lookUpdataItemdescedit').DataTable({
            // your DataTable initialization code here
            "pagingType": "numbers",
            ajax: {
                url: "{{ route('Get_master_desc2') }}",
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
                    "data": "kategori"
                },
                {
                    "data": "standard"
                },
            ],
            "initComplete": function(settings, json) {
                // $('div.dataTables_filter input').focus();
                $('#lookUpdataItemdescedit tbody').on('dblclick', 'tr', function() {
                    var dataArrItem1 = [];
                    var rowItem1 = $(this);
                    var rowItem1 = lookUpdataItemdescedit.rows(rowItem1).data();
                    $.each($(rowItem1), function(key, value) {
                        $(document).ready(function() {
                            document.getElementById(
                                    "Kategori_edit").value =
                                value[
                                    "kategori"];
                            document.getElementById(
                                    "standart_edit").value =
                                value[
                                    "standard"];


                        });
                        $('#ItemModaledit2').modal('hide');

                    });
                });

            },

        });
    }
    // clear edit
    function clearedit() {
        $('#mesin_edit').val("");
        $('#type_edit').val("");
        $('#Kategori_edit').val("");
        $('#standart_edit').val("");
    }
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        // document.getElementById('types_create_jtype').focus();
        var id = $(this).attr('row-id');
        // console.log(id);
        // alert(id);
        $('#edit_master_pointsheet').val(id);
        $('#edit-master-pointsheet').modal('show');
        // $('.modal-title').text('Master Data Point (Edit)');
        Editdata(id)
    });

    function Editdata(id) {
        var route = "{{ route('Edit_master_pointsheet', ':id') }}";
        route = route.replace(':id', id);
        $.ajax({
            url: route,
            method: 'get',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                // console.log(data);
                $('#mesin_edit').val(data.name_mesin);
                $('#type_edit').val(data.type);
                $('#Kategori_edit').val(data.kategori);
                $('#standart_edit').val(data.standard);
            }
        });
    }

    //update data for edit master data pointsheet
    $('.modal-footer').on('click', '.updateMasterdata', function() {
        // alert("masuk");
        var id = document.getElementById('edit_master_pointsheet').value;
        // console.log(id);
        var route = "{{ route('update_master_pointsheet', ':id') }}";
        route = route.replace(':id', id);
        $.ajax({
            url: route,
            type: "POST",
            dataType: 'json',
            data: $('#form-masterdata-pointsheet-edit').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // console.log(data);
                clearedit();
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully!',
                    text: 'Data berhasil di update',
                    timer: 3000
                }).then(function() {
                    $('#edit-master-pointsheet').modal('hide');
                    $('#masterdata-point-datatables').DataTable().ajax.reload();
                });
                $('#mesin_edit').val("");
                $('#type_edit').val("");
                $('#Kategori_edit').val("");
                $('#standart_edit').val("");

                // location.reload();
            },
            error: function(data) {
                // console.log(data);
            }
        });
        // }
        // return false;
    });
</script>
