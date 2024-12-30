<div class="form-group row">
    <label for="name_create" class="col-sm-2 col-form-label"><b>Name User</b></label>
    <div class="col-sm-3">
        <input type="text" name="name_create" autocomplete="off" class="form-control form-control-sm uppercase-input"
            id="name_create">
    </div>
</div>
<div class="form-group row">
    <label for="group" class="col-sm-2 col-form-label"><b>Group</b></label>
    <div class="col-sm-3">
        <select name="group" class="form-control form-control-sm" id="group">
            <option value="">--PILIH--</option>
            <option value="Admin User">Admin User</option>
            <option value="User">User</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
    <div class="col-sm-4 input-group">
        <input type="password" name="password" autocomplete="off" class="form-control form-control-sm" id="password">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn">
                <i class="fas fa-eye"></i>
            </button>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const showPasswordBtn = document.getElementById("showPasswordBtn");

        showPasswordBtn.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    });
</script>
