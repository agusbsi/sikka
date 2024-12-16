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
    <div class="container mt-5">
        <div class="card shadow-lg p-4 text-center" style="z-index: 2;">
            <div class="card-body">
                <i class="fas fa-check-circle text-success mb-3" style="font-size: 4rem;"></i>
                <h1 class="text-success mb-3">Laporan Berhasil Dikirim</h1>
                <p class="text-muted">
                    Terima kasih telah mengirimkan laporan Anda. Kami akan segera menindaklanjuti laporan yang telah Anda kirimkan.
                    Jika diperlukan, kami akan menghubungi Anda melalui informasi yang telah diberikan.
                </p>
                <a href="<?= base_url('') ?>" class="btn btn-primary mt-4">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
                <a href="<?= base_url('Utama/lapor') ?>" class="btn btn-outline-secondary mt-4">
                    <i class="fas fa-paper-plane"></i> Kirim Laporan Lain
                </a>
            </div>
        </div>
    </div>

</body>

</html>