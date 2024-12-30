<div style="text-align: center; ">
    <div class="btn-group">
        <p type="" style="color: rgb(0, 47, 255);" class="outline-warning dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-search fa-magnifying-glass-arrow-right"></i>
        </p>
        <div class="dropdown-menu">
            <a class="dropdown-item view" href="#" style="color: rgb(15, 128, 143);" data-toggle="tooltip"
                row-id="{{ $model->id_mesin }}" data-placement="top" title="View"><i class="fa fa-eye"></i> View</a>

            <a href="#" style="color: rgb(88, 152, 248);" data-toggle="tooltip" row-id="{{ $model->id_mesin }}"
                data-id="{{ $model->name_mesin }}" data-placement="top" title="Edit" class="dropdown-item edit">
                <i class="fa fa-pen-to-square"></i> Edit</a>

            <a href="#" style="color: red;" data-toggle="tooltip" row-id="{{ $model->id_mesin }}"
                data-id={{ $model->name_mesin }} data-target="" data-placement="top" title="Void"
                class="dropdown-item voided"> <i class="fa fa-trash"></i> Void</a>
            {{-- <a href="#" data-toggle="tooltip" style="color: rgb(0, 0, 0);" row-id="{{ $model->id_mesin }}"
                data-id="{{ $model->name_mesin }}" data-placement="top" title="Log" class="dropdown-item log"><i
                    class="fa fa-share"></i> Log</a> --}}
        </div>
    </div>
</div>
<script>
    // alert([$model->id)
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
