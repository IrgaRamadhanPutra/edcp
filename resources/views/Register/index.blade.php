@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('title', ' Register Account')
@section('judul')
    <font color="SteelBlue"><b>REGISTER</b></font><span class="text-warning"><b> ACCOUNT</b></span>
@endsection(judul')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="d-flex align-items-center">
                    {{-- <button type="button" class="btn btn-primary btn-lg-6 btn-flat mr-3" id="AddMasterdata">
                        <i class="fa fa-plus"></i> Add New Data
                    </button> --}}
                    {{-- <button type="button" class="btn btn btn-lg-6 btn-flat mr-3 text-white" id="AddMasterdata"
                    style="background: rgb(22, 95, 163)">
                    <i class="fa fa-plus"></i> Add New Data
                </button> --}}
                    {{-- <button type="button" id="checkStockItem" class="btn btn-flat btn-sm btn-danger">
                    <i class="fa fa-check"></i> Stock
                </button> --}}
                    {{-- <button class="btn" style="background: #20598f; pointer-events: none;"></button> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-0">
                <div class="card border-primary bg-light rounded-lg">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col">
                                <form id="formRegister" method="post" action="javascript:void(0)">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" id="id_register" name="id_register">
                                    <!-- Tabel dan isinya dihapus untuk tujuan rapihkan kode -->
                                    <div class="form-group row">
                                        <span for="name_create" class="col-sm-2 col-form-span"><b>Name User</b></span>
                                        <div class="col-sm-3">
                                            <input type="text" name="name_create" autocomplete="off"
                                                class="form-control form-control-sm uppercase-input custom-input"
                                                id="name_create" required style="border: 1px solid #000000;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span for="group" class="col-sm-2 col-form-span"><b>Group</b></span>
                                        <div class="col-sm-3">
                                            <select name="group" class="form-control form-control-sm custom-input"
                                                id="group_create" required style="border: 1px solid #000000;">
                                                <option value="">--PILIH--</option>
                                                <option value="Admin User">Admin User</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span for="email" class="col-sm-2 col-form-span"><b>Email</b></span>
                                        <div class="col-sm-3">
                                            <input type="email" name="email" autocomplete="off"
                                                class="form-control form-control-sm" id="email_create" required
                                                style="border: 1px solid #000000;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span for="password" class="col-sm-2 col-form-span"><b>Password</b></span>
                                        <div class="col-sm-3 input-group">
                                            <input type="password" name="password" autocomplete="off"
                                                class="form-control form-control-sm" id="password_create" required
                                                style="border: 1px solid #000000;">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="showPasswordBtn">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                            style="background: rgb(16, 130, 175); width: 150px; height: 40px;"
                                            class="btn btn-secondary btn-sm addMaster_data">
                                            <i class="fa-solid fa-floppy-disk"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password_create');
        const togglePassword = document.getElementById('showPasswordBtn');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            // Ganti ikon mata sesuai keadaan password
            if (type === 'password') {
                togglePassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
        $('#name_create').focus();
        $('.modal-footer').on('click', '.addMaster_data', function() {
            //validasi inputan tidak boleh kosong
            var name = $('#name_create').val();
            var group_create = $('#group_create').val();
            var password_create = $('#password_create').val();
            var email_create = $('#email_create').val();
            var condtion = !name || !group_create || !password_create || !email_create
            if (condtion) {
                swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    timer: 2500,
                    text: 'Perhatikan Inputan anda, Form tidak boleh ada yang kosong!',
                });
                // })
            } else {
                alert('next');
                $.ajax({
                    url: "{{ route('Add_Register') }}",
                    type: "POST",
                    data: $('#formRegister').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        // clear_Masteradd();
                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'Successfully!',
                        //     text: 'Data berhasil ditambahkan',
                        //     timer: 3000
                        // }).then(function() {
                        //     $('#createModalMasterdata_pic').modal(
                        //         'hide');
                        //     // $('##masterStaff-datatables').DataTable().ajax.reload();
                        //     $('#masterdata-pic-datatables').DataTable()
                        //         .ajax.reload();
                        // });
                    }
                });

            }

        });
    </script>
    {{-- <script rel="stylesheet" href="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            //get data from datatables
            var table = $('#masterdata-pic-datatables').DataTable({
                // processing: true,
                // serverSide: true,
                processing: true,
                serverSide: true,
                deferRender: true,
                responsive: true,
                paging: true,
                pageLength: 5,
                ajax: {
                    url: "{{ route('get_masterpic_datatables') }}",
                },
                // order: [
                // [0, 'desc']
                // ],
                // responsive: true,
                language: {
                    // <i class="fa-duotone fa-spinner-third"></i>
                    // <i class="fa-regular fa-loader"></i>
                    processing: '<i class="fa fa-duotone fa-spinner fa-spin fa-4x"></i> Loading...' // menampilkan spinner berupa ikon
                    // FontAwesome
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'No',
                        className: "text-center",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'Name PIC',
                        className: "text-left",
                    },
                    {
                        data: 'Nik',
                        name: 'NIK',
                        className: "text-left",
                    },
                    {
                        data: 'shift',
                        name: 'Shift',
                        className: "text-center",
                    },
                    {
                        data: 'section',
                        name: 'Section',
                        className: "text-left",
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }

                ]
            });
        });
    </script> --}}
    {{-- @include('Register.create.create') --}}
@endsection('content')
