<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Lapor | SIKKA</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('') ?>utama/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            /* font-family: 'Poppins', sans-serif; */
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: relative;
            padding: 20px;
        }

        /* Batik background */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('<?= base_url('') ?>utama/assets/img/custom/batik-footer.jpg') repeat;
            background-size: 150px 150px;
            opacity: 0.5;
            z-index: 1;
        }

        .form-container {
            position: relative;
            z-index: 2;
            /* Ensures form is above background */
            background: #fff;
            color: #333;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .form-container h1 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #6e8efb;
        }

        .form-container .form-control {
            border-radius: 5px;
        }

        .form-container .btn {
            background: #6e8efb;
            color: #fff;
            border: none;
            transition: 0.3s;
        }

        .form-container .btn:hover {
            background: #a777e3;
        }

        .form-container .icon {
            font-size: 1rem;
            margin-right: 0.5rem;
        }

        .form-container .animate-container {
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="form-container animate-container">
        <h1>
            <a href="<?= base_url('') ?>"><i class="fas fa-arrow-left" style="margin-right: 15px;"></i></a> Form Lapor | SIKKA
        </h1>
        <form action="<?= base_url('Utama/lapor_kirim') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="nama"><i class="fas fa-user icon"></i> Nama Lengkap *</label>
                <input type="text" id="nama" name="nama" class="form-control form-control-sm" placeholder="Masukkan nama Anda" maxlength="100" required>
                <small class="text-muted">Maksimal 100 karakter.</small>
            </div>
            <div class="mb-3">
                <label for="telp"><i class="fas fa-phone icon"></i> Telepon *</label>
                <input type="number" id="telp" name="telp" class="form-control form-control-sm" placeholder="Masukkan nomor telepon" maxlength="13" required>
                <small class="text-muted">Maksimal 13 karakter.</small>
            </div>
            <div class="mb-3">
                <label for="isi_laporan"><i class="fas fa-comment-alt icon"></i> Isi Laporan *</label>
                <textarea id="isi_laporan" name="isi_laporan" class="form-control" rows="5" placeholder="Tuliskan laporan Anda" maxlength="1000" required></textarea>
                <small class="text-muted">Maksimal 1000 karakter.</small>
            </div>
            <div class="mb-3">
                <label for="berkas" class="form-label"><i class="fas fa-paperclip icon"></i> Unggah Berkas *</label>
                <input type="file" id="berkas" name="berkas[]" class="form-control form-control-sm" accept=".doc,.docx,.xls,.xlsx,.pdf,.jpg,.jpeg,.png,.mp4,.mov,.avi" multiple required>
                <small class="text-muted">Format yang didukung: Word, Excel, PDF, Foto, Video. (maks : 20mb / file)</small>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i> Kirim</button>
        </form>
    </div>
</body>

</html>