<div class="form-row">
    <div class="col-12 col-sm-2 col-md-1 mb-1">
        <h6><b>Mesin</b></h6>
    </div>
    <div class="col-12 col-sm-12 col-md-3 mb-1">
        <div class="input-group">
            <input type="text" name="mesin_edit" class="form-control" id="mesin_edit" placeholder="">
            <div class="input-group-append">
                <button class="btn btn-default" onclick="get_master_data1()" type="button" id="get-masterdata1"
                    style="background-color: rgb(228, 153, 13);">
                    <i class="fa fa-search"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="col-12 col-sm-2 col-md-1 mb-1">
        <h6><b>Type</b></h6>
    </div>
    <div class="col-12 col-sm-4 col-md-3 mb-1">
        <input type="type" value="" name="type_edit" class="form-control " id="type_edit" aria-describedby=""
            placeholder="" readonly>
    </div>
</div>
<div class="form-row">
    <div class="col-12 col-sm-2 col-md-1 mb-1">
        <h6><b>Image</b></h6>
    </div>
</div>
{{-- <label for="image_edit" class="col-sm-2 col-form-label"><b>Image </b></label> --}}
<img id="output_edit" height="150" width="150">
<input type="file" name="image_edit" id="image_edit" onchange="validasi_file()">
<input type="hidden" name="outputImage" id="output" value="">
