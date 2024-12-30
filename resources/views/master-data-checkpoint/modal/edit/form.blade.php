<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <label for="name_edit" style="font-size:15px;" class="col-sm-2 col-form-label"><b> Mesin</b></label>
            <div class="col-sm-4">
                <input type="text" onclick="getdata_mesin2()" name="name_edit" autocomplete="off"
                    class="form-control form-control-sm uppercase-input" id="name_edit">
            </div>
        </div>
        <div class="form-group row">
            <label for="type_edit" style="font-size:15px;" class="col-sm-2 col-form-label"><b>Type</b></label>
            <div class="col-sm-4">
                <input type="text" value="" name="type" class="form-control form-control-sm uppercase-input"
                    id="type_edit" placeholder="" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori_edit" style="font-size:15px;" class="col-sm-2 col-form-label"><b>Kategori</b></label>
            <div class="col-lg-5">
                <div class="input-group-append">
                    <input type="text" onclick="getdata_kategori2()" name="kategori"
                        class="form-control form-control-sm uppercase-input" id="kategori_edit" placeholder="">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="standart_edit" style="font-size:15px;" class="col-sm-2 col-form-label"><b>Standart</b></label>
            <div class="col-lg-5">
                <div class="input-group-append">
                    <textarea name="standart_edit" rows="3" class="form-control form-control-sm uppercase-input" id="standart_edit"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
