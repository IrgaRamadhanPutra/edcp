<div class="modal fade" id="ItemModalAdd1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Master data Mesin</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> --}}
                <p class="text-danger">Klik 2x untuk memilih</p>
                {{-- </button> --}}
            </div>
            <div class="modal-body">
                <table id="lookUpdataItem1" class="table table-striped table-bordered table-hover" width="100%">
                    <thead style="text-transform: uppercase; font-size: 14px; background-color: rgb(180, 33, 33);">
                        <tr>
                            <th class="text-white" style="width: 30%">Name</th>
                            <th class="text-white" style="width: 30%">Type</th>
                            <th class="text-white" style="width: 40%">Desc</th>
                            {{-- <th class="text-white" style="width: 40%"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <!-- table rows will be dynamically generated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
