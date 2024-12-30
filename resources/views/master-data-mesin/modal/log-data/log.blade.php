<div class="modal fade bd-example-modal-lg logModalMasterData" id="logModalMasterData" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-80">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title log"></h4>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="datatable datatable-primary">
                                    <table id="tbl-log-masterdata" class="table table-bordered table-hover"
                                        width="100%">

                                        <thead class="text-center">
                                            {{-- style="background-color: #D3D3D3" --}}
                                            <tr>
                                                {{-- <tr style="width: 10%; background-color:rgb(0, 204, 255)" class="text-dark"> --}}
                                                {{-- <th width="10%">Date</th>
                                                <th width="10%">Time</th>
                                                <th width="10%">Type</th>
                                                <th width="20%">Note</th> --}}
                                                <th width="10%">Date</th>
                                                <th width="10%">Time</th>
                                                <th width="10%">Type</th>
                                                <th width="10%">User</th>
                                                <th width="25%">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Esc</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    // LOG ACTIVITY
    // $(document).on('click', '.log', function(e) {
    //     e.preventDefault();
    //     var itemcode = $(this).attr('data-id');
    //     console.log(itemcode);
    //     $('#logModalMasterData').modal('show');
    //     $('.modal-title').text('View Master Data Mesin Log');
    //     var route = "{{ route('log_master_data', ':id') }}";
    //     route = route.replace(':id', itemcode);
    $(document).on('click', '.log', function(e) {
        e.preventDefault();
        // document.getElementById('types_create_jtype').focus();
        var id = $(this).attr('row-id');
        console.log(id);
        // alert(id);
        $('#logModalMasterData').modal('show');
        $('.modal-title').text('View Master Data Mesin Log');

        // Editdata(id);
    });
    // $.ajax({
    //     url: route,
    //     method: 'get',
    //     dataType: 'json',
    //     success: function(data) {
    //         // console.log(data);
    //         var detailDataset = [];
    //         for (var i = 0; i < data.length; i++) {
    //             detailDataset.push([
    //                 formatDate(data[i].date), data[i].time, data[i].status_change,
    //                 data[i].user, data[i].note
    //             ]);
    //         }
    //         // console.log(detailDataset);
    //         $('#tbl-log-masterItem').DataTable().clear().destroy();
    //         $('#tbl-log-masterItem').DataTable({
    //             data: detailDataset,
    //             columns: [{
    //                     title: 'Date'
    //                 },
    //                 {
    //                     title: 'Time'
    //                 },
    //                 {
    //                     title: 'Type'
    //                 },
    //                 {
    //                     title: 'User'
    //                 },
    //                 {
    //                     title: 'Note'
    //                 }
    //             ]
    //         });
    //     },
    // })
    // });
</script>
