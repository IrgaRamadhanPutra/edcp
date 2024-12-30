<div class="form-row">
    <div class="col-12 col-sm-2 col-md-1 mb-1">
        <h6><b>Mesin</b></h6>
    </div>
    <div class="col-12 col-sm-12 col-md-3 mb-1">
        <div class="input-group">
            <input type="text" name="mesin_create" class="form-control" id="mesin_create" placeholder="">
            <div class="input-group-append">
                <button onclick="get_master_data()" class="btn btn-default" type="button" id="get-masterdata"
                    style="background-color: rgb(170, 21, 21);">
                    <i class="fa fa-search text-white"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="col-12 col-sm-2 col-md-1 mb-1">
        <h6><b>Type</b></h6>
    </div>
    <div class="col-12 col-sm-4 col-md-3 mb-1">
        <input type="type" value="" name="type_create" class="form-control " id="type_create"
            aria-describedby="" placeholder="" readonly>
    </div>
</div>
<div class="form-row">
    <div class="col-12 col-sm-2 col-md-1 mb-1">
        <h6><b>Image</b></h6>
    </div>
</div>
<table id="upload-image" class="table table-striped table-hover" style="width:100%">
    <thead class="text-center" style="text-transform: uppercase; font-size: 14px; background-color:rgb(170, 21, 21)">
        <tr>
            <th class="text-white" width="2%">No</th>
            <th class="text-white" width=2%">Type Image</th>
            <th class="text-white" width=5%">Upload</th>
            <th class="text-white" width="5%">Image</th>
            <th class="text-white" width="1%"></th>
            <th class="text-white" width="1%"></th>
        </tr>
    </thead>
    <tbody style="max-height: 300px; overflow-y: auto;"></tbody>
</table>
{{-- <img id="output" type="text" name="output[]" src=""> --}}
<input type="hidden" name="outputImage[]" id="output">

{{-- <div class="form-group row">

    <input type="file" name="image_create" id="image_create" onchange="previewImage(event)" placeholder="">
</div> --}}
