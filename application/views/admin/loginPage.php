
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                Admin Login
            </div>
            <div class="card-body">
                <form action="<?= base_url('prosesLogin') ?>" method="post">
                    <div class="form-group py-3">
                        <label for="" class="mb-2">Username</label>
                        <input type="text" name="username" id="" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group py-3">
                        <label for="" class="mb-2">Password</label>
                        <input type="password" name="password" id="" placeholder="Password" class="form-control">
                    </div>

                    <button class="bg-dark text-white">
                        Login
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>