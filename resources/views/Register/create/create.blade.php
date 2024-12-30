<div class="modal fade bd-example-modal-lg modalRegister" data-backdrop="static" data-keyboard="false" style="z-index: 1041"
    tabindex="-1" id="createModalRegister" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom text-white">
                <h4 class="modal-title"><i class="fa-brands fa-pix"></i> Form Register --Create--</h4>
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
                            <input type="hidden" id="id_register" name="id_register">
                            @include('Register.create.form')
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
        $('#createModalRegister').modal('show');
        document.getElementById("name_create").focus();
        // $('.modal-title').text('Masterdata PIC (New)');
        $('#name_create').focus();
    });
</script>
