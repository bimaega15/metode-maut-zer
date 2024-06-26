<div class="item">
    <h4>Account</h4>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-floating">
                <input type="text" class="form-control username" id="floatingInput" placeholder="Username..."
                    name="username">
                <small class="error_username text-danger"></small>
                <label for="floatingInput">Username</label>
            </div>
        </div>
    </div>
    <div style="height: 10px;"></div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-floating">
                <input type="password" class="form-control password" id="floatingInput" placeholder="Password..."
                    name="password">
                <small class="error_password text-danger"></small>
                <label for="floatingInput">Password</label>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-floating">
                <input type="password" class="form-control password_confirm" id="floatingInput"
                    placeholder="Username..." name="password_confirm">
                <small class="error_password_confirm text-danger"></small>
                <label for="floatingInput">Confirm password</label>
            </div>
        </div>
    </div>
    <div style="height: 10px;"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-floating">
                <select type="text" class="form-control role_id" id="floatingInput" name="role_id">
                    <option value="">-- Role --</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_roles }}
                        </option>
                    @endforeach
                </select>
                <small class="error_role_id text-danger"></small>
                <label for="floatingInput">Role user</label>
            </div>
        </div>
    </div>
    <div style="height: 25px;"></div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="text-end">
                <button type="button" class="btn btn-outline-dark m-b-xs customNextBtn"><i
                        data-feather="arrow-right"></i> Selanjutnya</button>
            </div>
        </div>
    </div>
</div>
