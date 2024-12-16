<?php
$lapor = $this->db->query("SELECT id FROM tb_lapor WHERE status = 0 ")->num_rows();
?>
<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item ">
        <a class="nav-link <?= ($title == "Dashboard") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Dashboard') ?>">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <?php if ($this->session->userdata('role') == 1) { ?>
        <li class="nav-heading">Menu Konten</li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "Bupati") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Bupati') ?>">
                <i class="bi bi-person-bounding-box"></i>
                <span>Profil Pimpinan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "Wisata") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Wisata') ?>">
                <i class="bi bi-pin-map-fill"></i>
                <span>Objek Wisata</span>
            </a>
        </li>
    <?php } ?>
    <li class="nav-heading">Menu Publikasi</li>
    <li class="nav-item">
        <a class="nav-link <?= ($title == "Pasar") ? '' : 'collapsed' ?>" data-bs-target="#Pasar-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-clipboard-data"></i><span>Harga Pasar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Pasar-nav" class="nav-content <?= ($title == "Pasar") ? '' : 'collapsed' ?> " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?= base_url('admin/Pasar') ?>">
                    <i class="bi bi-circle"></i><span>Pasar</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Pasar/barang') ?>">
                    <i class="bi bi-circle"></i><span>Barang</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/Pasar/harga') ?>">
                    <i class="bi bi-circle"></i><span>Harga</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($title == "Event") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Event') ?>">
            <i class="bi bi-calendar2-check-fill"></i>
            <span>Event</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($title == "Berita") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Berita') ?>">
            <i class="bi bi-card-checklist"></i>
            <span>Berita</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($title == "pengumuman") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Pengumuman') ?>">
            <i class="bi bi-megaphone-fill"></i>
            <span>Pengumuman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($title == "dokumen") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Dokumen') ?>">
            <i class="bi bi-book-half"></i>
            <span>Dokumen Public</span>
        </a>
    </li>
    <?php if ($this->session->userdata('role') == 1) { ?>
        <li class="nav-heading">Pengaturan</li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "user") ? '' : 'collapsed' ?>" href="<?= base_url('admin/User') ?>">
                <i class="bi bi-people-fill"></i>
                <span>User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "Sejarah" || $title == "lambang") ? '' : 'collapsed' ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Tentang SIKKA</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content <?= ($title == "Sejarah" || $title == "lambang") ? '' : 'collapsed' ?> " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('admin/Tentang/sejarah') ?>">
                        <i class="bi bi-circle"></i><span>Sejarah</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/Tentang/lambang') ?>">
                        <i class="bi bi-circle"></i><span>Lambang Daerah</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/Tentang/visi') ?>">
                        <i class="bi bi-circle"></i><span>Visi Misi</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "dinas" || $title == "daerah" || $title == "kecamatan") ? '' : 'collapsed' ?>" data-bs-target="#kelembagaan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button"></i><span>Kelembagaan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="kelembagaan-nav" class="nav-content <?= ($title == "dinas" || $title == "daerah" || $title == "kecamatan") ? '' : 'collapsed' ?> " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('admin/Kelembagaan/dinas') ?>">
                        <i class="bi bi-circle"></i><span>Dinas</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/Kelembagaan/daerah') ?>">
                        <i class="bi bi-circle"></i><span>Seketariat Desa</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/Kelembagaan/kecamatan') ?>">
                        <i class="bi bi-circle"></i><span>Kecamatan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/Kelembagaan/kelurahan') ?>">
                        <i class="bi bi-circle"></i><span>Kelurahan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/Kelembagaan/desa') ?>">
                        <i class="bi bi-circle"></i><span>Desa</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "layanan") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Layanan') ?>">
                <i class="bi bi-ui-checks"></i>
                <span>Layanan</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link <?= ($title == "Lapor") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Lapor') ?>">
                <i class="bi bi-chat-square-dots-fill"></i>
                <span>Lapor</span>
                <?php if ($lapor != 0) { ?>
                    <span class="badge bg-primary text-white" style="margin-left: 40px;"><?= $lapor ?></span>
                <?php } ?>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link <?= ($title == "Splash") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Splash') ?>">
                <i class="bi bi-tv"></i>
                <span>Splash Screen</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "Tentang") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Tentang') ?>">
                <i class="bi bi-tv-fill"></i>
                <span>Umum</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($title == "Backup Database") ? '' : 'collapsed' ?>" href="<?= base_url('admin/Backup') ?>">
                <i class="bi bi-database-fill-down"></i>
                <span>Backup Database</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin/Log') ?>">
                <i class="bi bi-info-circle-fill"></i>
                <span>Log Informasi</span>
            </a>
        </li>
    <?php } ?>

</ul>