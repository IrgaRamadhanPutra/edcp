<div class="modal fade bd-example-modal-lg modalcreatemasterpic" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="createModalMasterdata_pic" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata PIC --Create--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" onclick="clear_value_create_page()"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-masterpic" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_pic" name="id_master_pic">
                            @include('master-data-pic.create.form')
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                                <button type="button" style="background:  rgb(16, 130, 175);"
                                    class="btn
                                    btn-secondary "
                                    onclick="clear_Masteradd()" data-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i>&nbsp;Close</button>
                                <button type="button" style="background:  rgb(16, 130, 175);"
                                    class="btn btn-secondary addMaster_data"><i class="fa-solid fa-floppy-disk"></i>
                                    Save</button>
                                {{-- @php $counter @endphp --}}
                                {{-- <input type="hidden" id="jml_row" name="jml_row" value=""> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // ADD DISPLAY MODAL CREATE
    $(document).on('click', '#AddMasterdata', function(e) {
        e.preventDefault();
        $('#createModalMasterdata_pic').modal('show');
        document.getElementById("name_create").focus();
        // $('.modal-title').text('Masterdata PIC (New)');
        $('#name_create').focus();
    });

    // $('#createModalMasterdata_pic').on('shown.bs.modal', function() {
    //     document.getElementById("name_create").focus();
    //     $('#name_create').focus();
    // });
    $(document).ready(function() {
        $('#createModalMasterdata_pic').on('shown.bs.modal', function() {
            document.getElementById("name_create").focus();
        });
    });

    function clear_Masteradd() {
        $('#name_create').val("");
        $('#shift_create').val("");
        $('#section_create').val("");
        $('#nik_create').val("");
    }

    $('.modal-footer').on('click', '.addMaster_data', function() {
        //validasi inputan tidak boleh kosong
        var name = $('#name_create').val();
        var shift = $('#shift_create').val();
        var nik_create = $('#nik_create').val();
        var sec = $('#section_create').val();
        var condtion = !name || !shift || !nik_create || !sec
        if (condtion) {
            swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                timer: 2500,
                text: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!',
            });


            // })
        } else {
            var nikValue = $('#nik_create').val(); // Get the value of the input field
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('validasi_nik') }}",
                type: "POST",
                data: {
                    nik: nikValue // Pass the value of the input field, not the jQuery object
                },
                dataType: 'json',
                success: function(data) {
                    // Your success handling code here
                    if (data == '') {
                        // alert('lanjut add');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('AddStore_masterpic') }}",
                            type: "POST",
                            data: $('#form-masterpic').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                // console.log(data);
                                clear_Masteradd();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully!',
                                    text: 'Data berhasil ditambahkan',
                                    timer: 3000
                                }).then(function() {
                                    $('#createModalMasterdata_pic').modal(
                                        'hide');
                                    // $('##masterStaff-datatables').DataTable().ajax.reload();
                                    $('#masterdata-pic-datatables').DataTable()
                                        .ajax.reload();
                                });
                            }
                        });
                    } else {
                        // alert('eror');
                        swal.fire({
                            icon: 'warning',
                            title: 'Perhatian',
                            timer: 2500,
                            text: 'NIK Tidak Boleh Sama!',
                        });
                    }
                },

            });

        }
    });
</script>
