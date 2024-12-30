<div class="modal fade bd-example-modal-lg modaleditmasterpic" data-backdrop="static" data-keyboard="false"
    style="z-index: 1041" tabindex="-1" id="editModalMasterdata_pic" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Masterdata PIC --Edit--</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" onclick="clear_value_edit_page()"><span>&times;</span></button> --}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body edit-modal">
                        <div class="alert alert-danger print-error-msg" role="alert" style="display: none">
                            <ul></ul>
                        </div>
                        <form id="form-masterpic-edit" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_pic" name="id_master_pic">
                            @include('master-data-pic.edit.form')
                            <div class="modal-footer">
                                {{-- <button type="button" data-toggle="tooltip"  data-placement="top" title="Add Item" class="btn btn-info" id="addRow"> Add Item</button> --}}
                                <button type="button" style="background:rgb(16, 130, 175)" class="btn btn-secondary "
                                    data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;Close</button>
                                <button type="button" style="background:rgb(16, 130, 175)"
                                    class="btn btn-secondary updateMasterPic"><i class="fa-solid fa-floppy-disk"></i>
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
    // EDIT PAGE
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        // document.getElementById('types_edit_jtype').focus();
        var id = $(this).attr('row-id');
        // console.log(id);
        // alert(id);
        $('#id_master_pic').val(id);
        $('#editModalMasterdata_pic').modal('show');
        // $('.modal-title').text('Master Data PIC (Edit)');

        Editdata(id);
    });
    //  VIEW DATA EDIT FROM AJAX
    function Editdata(id) {
        var route = "{{ route('edit_master_pic', ':id') }}";
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

                $('#name_edit').val(data.name);
                $('#nik_edit').val(data.Nik);
                $('#shift_edit').val(data.shift);
                $('#section_edit').val(data.section);
            }
        });
    }

    //update data ajax
    $('.modal-footer').on('click', '.updateMasterPic', function() {

        var id = document.getElementById('id_master_pic').value;
        var route = "{{ route('update_master_pic', ':id') }}";
        route = route.replace(':id', id);
        var name = $('#name_edit').val();
        var nik = $('#nik_edit').val();
        var shift = $('#shift_edit').val();
        var section = $('#section_edit').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $.ajax({
        //     url: "{{ route('validasi_nik2') }}",
        //     type: "POST",
        //     data: {
        //         nik: nik // Pass the value of the input field, not the jQuery object
        //     },
        //     dataType: 'json',
        //     success: function(data) {
        // if (data == '') {
        $.ajax({
            url: route,
            type: "POST",
            dataType: 'json',
            data: {
                id: id,
                name: name,
                nik: nik,
                shift: shift,
                section: section
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {
                // console.log(data); // Use console.log() for debugging
                // clear_Masteradd();
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully!',
                    text: 'Data berhasil di update',
                    timer: 3000
                }).then(function() {
                    $('#editModalMasterdata_pic').modal('hide');
                    $('#masterdata-pic-datatables').DataTable().ajax
                        .reload();
                });
            },
            error: function(data) {
                // console.log(data); // Use console.log() for debugging
            }
        });
        // } else {
        //     // alert('eror');
        //     swal.fire({
        //         icon: 'warning',
        //         title: 'Perhatian',
        //         timer: 2500,
        //         text: 'NIK Tidak Boleh Sama!',
        //     });
        // }
        //     },

        // });
    });
</script>
