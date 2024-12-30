<div class="modal fade-out bd-example-modal-lg modalVoidmaster" tabindex="-1" id="ModalVoidmaster" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body">
                        <form id="form-master-void" method="post" action="javascript:void(0)">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_master_void" name="id_master">
                            <div class="form-group row">
                                <label for="type" class="col-2 col-form-label">Type</label>
                                <div class="col-9">
                                    <input type="text" readonly value="VOID" name="id"
                                        class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-2 col-form-label">Code</label>
                                <div class="col-9">
                                    <input type="text" readonly name="master_void"
                                        class="form-control form-control-sm master_void" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exception_note" class="col-2 col-form-label">Exception Note</label>
                                <div class="col-9">
                                    <input type="text" autocomplete="off" name="note" id="not_void"
                                        class="form-control form-control-sm" placeholder="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-flat btn-sm "
                                    data-dismiss="modal">Cancel</button>
                                <button type="button" id="ok-button" disabled
                                    class="btn btn-primary btn-flat btn-sm void_submit"><i class="ti-check"></i>
                                    Ok</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.voided', function(e) {
        e.preventDefault();
        var id = $(this).attr('row-id');
        // console.log(id);
        var master = $(this).attr('data-id');
        // console.log(master);
        $('#id_master_void').val(id);
        $('.modal-title').html('Master Staff (VOID)')
        $('.master_void').val(master);
        $('#ModalVoidmaster').modal('show');
        $('#not_void').focus();
        voidedData(master);

    });
    var input1 = document.getElementById("not_void");
    var okButton = document.getElementById("ok-button");

    function checkInputs() {
        if (input1.value) {
            okButton.disabled = false;
        } else {
            okButton.disabled = true;
        }
    }
    input1.addEventListener("input", checkInputs);

    function voidedData(master) {
        // $('.modal-footer').on('click', '.void_submit', function() {
        $('.modal-footer').off('click', '.void_submit').on('click', '.void_submit', function() {
            var route = "{{ route('void_master_check', ':id') }}";
            route = route.replace(':id', master);
            $.ajax({
                url: route,
                type: "POST",
                data: $('#form-master-void').serialize(),
                success: function(data) {
                    swal.fire({
                        icon: 'success',
                        title: 'success',
                        timer: 2000,
                        text: 'Data berhasil divoid',
                    });
                    $('#not_void').val("");
                    $('#ModalVoidmaster').modal('hide');
                    $('#masterdata-image-datatables').DataTable().ajax.reload();
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Something went wrong!',
                    })
                    $('#not_void').val("");
                    $('#not_void').val("");
                    $('#ModalVoidmaster').modal('hide');
                }
            });
        });
    }
</script>
