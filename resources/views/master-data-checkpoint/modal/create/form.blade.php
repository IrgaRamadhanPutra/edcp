<div class="form-group row">
    <label for="name_create" style="font-size:15px;" class="col-sm-2 col-form-label"><b>Name Mesin</b></label>
    <div class="col-sm-3">
        <input type="text" onclick="Getdatamesin()" name="name_create" autocomplete="off"
            class="form-control form-control-sm uppercase-input" id="name_create">
    </div>
</div>
<div class="form-group row">
    <label for="type_create" style="font-size:15px;" class="col-sm-2 col-form-label"><b>Type</b></label>
    <div class="col-sm-4">
        <input type="text" value="" name="type" class="form-control form-control-sm uppercase-input"
            id="type_create" placeholder="" readonly>
    </div>
</div>
<div class="form-group row">
    <label for="kategori_create" style="font-size:15px;" class="col-sm-2 col-form-label"><b>Kategori</b></label>

    <div class="col-lg-5">
        <div class="input-group-append">
            <input type="text" onclick="Getdatakategori()"
                name="kategori"class="form-control form-control-sm uppercase-input" id="kategori_create" placeholder="">
        </div>
    </div>
</div>
