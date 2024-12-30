<div class="modal fade bd-example-modal-lg modalcreatekategori" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="create_kategori" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white border-bottom">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Masterdata Kategori --Create--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" onclick="clear_value_create_page()"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body create-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-master-kategori" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_kategori" name="id_master_kategori">
                            @include('kategori.modal.create.form')
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                                <button type="button" style="background: rgb(16, 130, 175);" class="btn btn-secondary "
                                    onclick="clear_Masteradd()" data-dismiss="modal"> <i class="fa-solid fa-xmark"></i>
                                    &nbsp;Close</button>
                                <button type="button" style="background: rgb(16, 130, 175);"
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
        $('#create_kategori').modal('show');
        document.getElementById("name_kategori").focus();
        // $('.modal-title').text('Masterdata Kategori (New)');
    });
    $(document).ready(function() {

        $('#create_kategori').on('shown.bs.modal', function() {
            document.getElementById("name_kategori").focus();
        });
    });

    function clear_Masteradd() {
        $('#name_kategori').val("");
    }
    $('.modal-footer').on('click', '.addMaster_data', function() {
        //validasi inputan tidak boleh kosong
        var name = $('#name_kategori').val();

        var condtion = !name
        if (condtion) {
            swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                timer: 2500,
                text: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!',
            });
            // })
        } else {
            // alert('sukses');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('validasi_kategori') }}",
                type: "POST",
                data: {
                    name: name // Pass the value of the input field, not the jQuery object
                },
                dataType: 'json',
                success: function(data) {
                    if (data == '') {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ route('Add_kategori') }}",
                            type: "POST",
                            data: $('#form-master-kategori').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                // // console.log(data);
                                clear_Masteradd();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully!',
                                    text: 'Data berhasil ditambahkan',
                                    timer: 3000
                                }).then(function() {
                                    $('#create_kategori').modal('hide');
                                    // $('##masterStaff-datatables').DataTable().ajax.reload();
                                    $('#masterdata-kategori-datatables')
                                        .DataTable().ajax.reload();
                                });
                            }
                        });
                    } else {
                        // alert('eror');
                        swal.fire({
                            icon: 'warning',
                            title: 'Perhatian',
                            timer: 2500,
                            text: 'Kategori Tidak Boleh Sama!',
                        });
                    }
                }
            });
        }
    });
</script>
