<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="<?= base_url('assets/img/user/' . $profil->foto . '?timestamp=' . time()) ?>" alt="Profile" class="rounded-circle">
                    <h2><?= $profil->nama ?></h2>
                    <h3><?= $profil->role == 1 ? "Admin Utama" : "" ?></h3>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Alamat</h5>
                            <p class="small fst-italic"><?= $profil->alamat ?></p>

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8"><?= $profil->nama ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?= $profil->email ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Telp</div>
                                <div class="col-lg-9 col-md-8"><?= $profil->telp ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Username</div>
                                <div class="col-lg-9 col-md-8"><?= $profil->username ?></div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <form action="<?= base_url('admin/Profil/update') ?>" method="POST" enctype="multipart/form-data">
                                <!-- Profile Image -->
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?= base_url('assets/img/user/' . $profil->foto . '?timestamp=' . time()) ?>" alt="Profile" class="img-thumbnail">
                                        <div class="pt-2">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control form-control-sm" name="foto" accept="image/png, image/jpeg, image/jpg">
                                            <small>( Kosongkan jika tidak ingin mengganti foto )</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control" id="fullName" value="<?= htmlspecialchars($profil->nama, ENT_QUOTES, 'UTF-8') ?>" required>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="alamat" class="form-control" id="about" style="height: 100px" required><?= htmlspecialchars($profil->alamat, ENT_QUOTES, 'UTF-8') ?></textarea>
                                    </div>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telp</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="telp" type="number" class="form-control" id="Phone" value="<?= htmlspecialchars($profil->telp, ENT_QUOTES, 'UTF-8') ?>" required pattern="\d+" title="Hanya boleh angka">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email" value="<?= htmlspecialchars($profil->email, ENT_QUOTES, 'UTF-8') ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="username" type="text" class="form-control" id="username" value="<?= htmlspecialchars($profil->username, ENT_QUOTES, 'UTF-8') ?>" required>
                                    </div>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <form action="<?= base_url('admin/profil/change_password') ?>" method="POST">
                                <!-- Current Password -->
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="current_password" type="password" class="form-control" id="currentPassword" required>
                                    </div>
                                </div>

                                <!-- New Password -->
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="new_password" type="password" class="form-control" id="newPassword" required minlength="8">
                                    </div>
                                </div>

                                <!-- Re-enter New Password -->
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="re_new_password" type="password" class="form-control" id="renewPassword" required minlength="4">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>