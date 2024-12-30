<div style="text-align: center; ">
    {{-- <div class="btn-group">
        <p type="" style="color: rgb(0, 47, 255);" class="outline-warning dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-search fa-magnifying-glass-arrow-right"></i>
        </p>
        <div class="dropdown-menu">

        </div>
    </div> --}}
    <a class="dropdown-item view" href="#" style="color: rgb(15, 128, 143);" data-toggle="tooltip"
        row-id="{{ $model->id_answer }}" data-id="{{ $model->daily_no }}"data-placement="top" title="View"><i
            class="fa fa-eye"></i>
        View</a>
</div>
<script>
    // alert([$model->id)
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
