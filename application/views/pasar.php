<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publikasi Harga Barang Pasar</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('') ?>utama/assets/img/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.27/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(135deg, #6366f1 0%, #3b82f6 100%);
            padding: 1.5rem 1rem;
            color: white;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .header p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .container {
            max-width: 1200px;
            margin: 1.5rem auto;
            padding: 0 1rem;
        }

        .filters {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px -1px rgb(0 0 0 / 0.1);
            margin-bottom: 1.5rem;
        }

        .search-and-buttons {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            background-color: #f8fafc;
            padding: 0.5rem;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            margin-top: 15px;
        }

        .search-box-container {
            flex: 1;
            min-width: 200px;
            position: relative;
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            color: #64748b;
            width: 16px;
            height: 16px;
        }

        .search-box {
            width: 100%;
            padding: 0.5rem 0.75rem 0.5rem 2.25rem;
            border: none;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .search-box:focus {
            outline: none;
            box-shadow: 0 0 0 2px #3b82f6;
        }

        .buttons-container {
            display: flex;
            gap: 0.5rem;
            margin-top: 10px;
            justify-content: flex-end;
            /* Menempatkan tombol-tombol di sebelah kanan */
            align-items: center;
            /* Menjaga tombol tetap sejajar secara vertikal */
        }


        .btn {
            padding: 0.5rem 0.75rem;
            border: none;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            transition: all 0.2s;
            height: 32px;
        }

        .btn svg {
            width: 12px;
            height: 12px;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-success {
            background-color: #157347;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 0.75rem;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .filter-group label {
            font-size: 0.75rem;
            font-weight: 500;
            color: #4b5563;
        }

        .filter-group select,
        .filter-group input {
            padding: 0.375rem 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            font-size: 0.875rem;
            color: #1e293b;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px -1px rgb(0 0 0 / 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.875rem;
        }

        th {
            background-color: #f8fafc;
            padding: 0.75rem;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }

        td {
            padding: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .price-change {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.875rem;
        }

        .price-change.positive {
            color: #16a34a;
        }

        .price-change.negative {
            color: #dc2626;
        }

        .category-badge {
            background-color: #f1f5f9;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            color: #475569;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stock-status {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
        }

        .stock-status.in-stock {
            color: #16a34a;
        }

        .stock-status.low-stock {
            color: #eab308;
        }

        .stock-status.out-stock {
            color: #dc2626;
        }

        .location-info {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            color: #64748b;
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            color: #64748b;
            font-size: 0.75rem;
            background-color: white;
            margin-top: 3rem;
            border-top: 1px solid #e2e8f0;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .header-left {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .header-center {
            text-align: center;
        }

        .btn-back {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            color: white;
            font-size: 0.875rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-back:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .search-and-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .buttons-container {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 0.5rem;
            }

            .btn {
                justify-content: center;
            }

            .header-left {
                position: static;
                transform: none;
                margin-bottom: 1rem;
            }

            .header-content {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding: 0 1rem;
            }

            .header-center {
                width: 100%;
            }
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            background-color: #f0f0f0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination button:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination button.active {
            font-weight: bold;
            color: white;
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <a href="<?= base_url('') ?>" class="btn-back">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    Beranda
                </a>
            </div>
            <div class="header-center">
                <h1>Publikasi Harga Barang Pasar</h1>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="filters">
            <div class="filters-grid">
                <div class="filter-group">
                    <label for="pasar-filter">Lokasi Pasar</label>
                    <select id="pasar-filter">
                        <?php if (!empty($pasar)): ?>
                            <?php foreach ($pasar as $index => $p): ?>
                                <option value="<?= $p->nama ?>" <?= $index === 0 ? 'selected' : '' ?>><?= $p->nama ?></option>
                            <?php endforeach ?>
                        <?php else: ?>
                            <option value="">Semua</option>
                        <?php endif ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="periode-filter">Periode</label>
                    <select id="periode-filter">
                        <?php if (!empty($periode)): ?>
                            <?php foreach ($periode as $index => $p): ?>
                                <option value="<?= $p->periode ?>" <?= $index === 0 ? 'selected' : '' ?>><?= date('d M Y', strtotime($p->periode)) ?></option>
                            <?php endforeach ?>
                        <?php else: ?>
                            <option value="">Semua</option>
                        <?php endif ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="kategori-filter">Kategori</label>
                    <select id="kategori-filter">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $p): ?>
                            <option value="<?= $p->kategori ?>"><?= $p->kategori ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="perubahan-filter">Perubahan Harga</label>
                    <select id="perubahan-filter">
                        <option value="">Semua</option>
                        <option value="naik">Kenaikan</option>
                        <option value="turun">Penurunan</option>
                        <option value="tetap">Tetap</option>
                    </select>
                </div>
            </div>
            <div class="search-and-buttons">
                <div class="search-box-container">
                    <input type="text" placeholder="Cari barang..." class="search-box">
                </div>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Barang</th>
                        <th rowspan="2">Lokasi Pasar</th>
                        <th colspan="2" style="text-align:center">Harga</th>
                        <th rowspan="2">Perubahan</th>
                        <th rowspan="2">Stok</th>
                    </tr>
                    <tr>
                        <th>Bulan lalu</th>
                        <th>Bulan ini</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="pagination"></div>
        <div class="buttons-container">
            <button id="download-pdf" class="action-btn btn btn-primary">Download PDF</button>
            <button id="download-excel" class="action-btn btn btn-success">Download Excel</button>
        </div>
    </main>

    <footer>
        <p>© <?= date('Y') ?> Harga Pasar | All rights reserved.</p>
    </footer>
    <script>
        const apiUrl = '<?= base_url('api/harga') ?>';
        let data = [];
        let filteredData = [];
        let currentPage = 1;
        const rowsPerPage = 10;

        const tableBody = document.querySelector("tbody");
        const searchBox = document.querySelector(".search-box");
        const paginationContainer = document.querySelector(".pagination");
        const filters = {
            pasar: document.querySelector("#pasar-filter"),
            periode: document.querySelector("#periode-filter"),
            kategori: document.querySelector("#kategori-filter"),
            perubahan: document.querySelector("#perubahan-filter"),
        };

        // Fungsi untuk mengambil data dari API
        async function fetchHargaPasar() {
            try {
                const response = await fetch(apiUrl);
                if (!response.ok) throw new Error('Gagal mengambil data dari API');
                data = await response.json();

                // Tetapkan nilai default pada filter
                if (filters.pasar.options.length > 0) filters.pasar.value = filters.pasar.options[0].value;
                if (filters.periode.options.length > 0) filters.periode.value = filters.periode.options[0].value;

                filterData(); // Jalankan filter awal
            } catch (error) {
                console.error('Error:', error);
                tableBody.innerHTML = `<tr><td colspan="7" style="text-align:center;">Gagal memuat data</td></tr>`;
            }
        }

        // Fungsi untuk merender tabel
        function renderTable() {
            tableBody.innerHTML = "";
            const startIndex = (currentPage - 1) * rowsPerPage;
            const paginatedData = filteredData.slice(startIndex, startIndex + rowsPerPage);

            if (paginatedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="7" style="text-align:center;">Tidak ada data ditemukan, silahkan pilih filter pencarian</td></tr>`;
                return;
            }

            paginatedData.forEach((item, index) => {
                const perubahanIcon = item.perubahan === "naik" ?
                    `<svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: green;"><path d="M12 19V5M5 12l7-7 7 7" /></svg>` :
                    item.perubahan === "turun" ?
                    `<svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: red;"><path d="M12 5v14m7-7l-7 7-7-7" /></svg>` :
                    'Tetap';

                const perubahanStyle = item.perubahan === "naik" ? "color: green;" :
                    item.perubahan === "turun" ? "color: red;" : "";

                const row = `
            <tr>
                <td>${startIndex + index + 1}</td>
                <td><small><strong>${item.barang}</strong><br>${item.kategori}</small></td>
                <td>${item.pasar}</td>
                <td>Rp. ${parseInt(item.hargaLalu || 0).toLocaleString()}</td>
                <td>Rp. ${parseInt(item.hargaKini || 0).toLocaleString()}</td>
                <td style="${perubahanStyle}">${perubahanIcon} ${item.presentase}%</td>
                <td>${item.stok}</td>
            </tr>
        `;
                tableBody.insertAdjacentHTML("beforeend", row);
            });
        }

        // Fungsi untuk merender pagination
        function renderPagination() {
            paginationContainer.innerHTML = "";

            const totalPages = Math.ceil(filteredData.length / rowsPerPage);
            if (totalPages <= 1) return;

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement("button");
                pageButton.textContent = i;
                pageButton.className = i === currentPage ? "active" : "";
                pageButton.addEventListener("click", () => {
                    currentPage = i;
                    renderTable();
                });
                paginationContainer.appendChild(pageButton);
            }
        }

        // Fungsi untuk menyaring data berdasarkan filter dan pencarian
        function filterData() {
            const searchTerm = searchBox.value.trim().toLowerCase();
            const selectedPasar = filters.pasar.value.trim();
            const selectedPeriode = filters.periode.value.trim();
            const selectedKategori = filters.kategori ? filters.kategori.value.trim() : "";
            const selectedPerubahan = filters.perubahan ? filters.perubahan.value.trim() : "";

            filteredData = data.filter(item => {
                return (
                    (selectedPasar === "" || item.pasar === selectedPasar) &&
                    (selectedPeriode === "" || item.periode === selectedPeriode) &&
                    (selectedKategori === "" || item.kategori === selectedKategori) &&
                    (selectedPerubahan === "" || item.perubahan === selectedPerubahan) &&
                    (item.barang.toLowerCase().includes(searchTerm))
                );
            });

            currentPage = 1;
            renderTable();
            renderPagination();
        }

        // Event listeners untuk filter dan pencarian
        searchBox.addEventListener("input", filterData);
        Object.values(filters).forEach(filter => filter.addEventListener("change", filterData));

        // Inisialisasi data
        fetchHargaPasar();
    </script>

    <script>
        document.getElementById("download-pdf").addEventListener("click", () => {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Header tabel PDF
            const headers = [
                ["No", "Barang", "Kategori", "Harga Bulan Lalu", "Harga Bulan Ini", "Perubahan", "Stok"]
            ];

            // Gunakan semua data dari `filteredData`
            const rows = filteredData.map((item, index) => [
                index + 1,
                item.barang,
                item.kategori,
                `Rp. ${parseInt(item.hargaLalu || 0).toLocaleString()}`,
                `Rp. ${parseInt(item.hargaKini || 0).toLocaleString()}`,
                item.presentase + "%",
                item.stok
            ]);

            // Ambil nilai filter lokasi pasar dan periode
            const lokasiPasar = filters.pasar.options[filters.pasar.selectedIndex]?.text || "Semua Pasar";
            const periode = filters.periode.options[filters.periode.selectedIndex]?.text || "Semua Periode";

            // Tambahkan judul laporan
            doc.text(`Data Barang - Lokasi: ${lokasiPasar}`, 10, 10);
            doc.text(`Periode: ${periode}`, 10, 20);

            // Tambahkan tabel data
            doc.autoTable({
                head: headers,
                body: rows,
                startY: 30,
                theme: "grid",
                styles: {
                    fontSize: 10
                }
            });

            // Tambahkan watermark
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(50);
                doc.setTextColor(150, 150, 150); // Warna abu-abu
                doc.text("SIKKA 2024", doc.internal.pageSize.width / 2, doc.internal.pageSize.height / 2, {
                    align: "center",
                    angle: 45
                });
            }

            // Simpan file PDF
            doc.save("data_barang.pdf");
        });



        document.getElementById("download-excel").addEventListener("click", () => {
            // Ambil lokasi pasar dan periode dari filter
            const lokasiPasar = filters.pasar.options[filters.pasar.selectedIndex]?.text || "Semua Pasar";
            const periode = filters.periode.options[filters.periode.selectedIndex]?.text || "Semua Periode";

            // Header tambahan untuk informasi lokasi pasar dan periode
            const headerInfo = [
                [`Data Barang`],
                [`Lokasi Pasar: ${lokasiPasar}`],
                [`Periode: ${periode}`],
                [] // Baris kosong untuk pemisah
            ];

            // Header kolom untuk tabel data
            const tableHeader = [
                ["No", "Barang", "Kategori", "Harga Bulan Lalu", "Harga Bulan Ini", "Perubahan", "Stok"]
            ];

            // Data tabel yang akan diisi
            const tableRows = filteredData.map((item, index) => [
                index + 1,
                item.barang,
                item.kategori,
                `Rp. ${parseInt(item.hargaLalu || 0).toLocaleString()}`,
                `Rp. ${parseInt(item.hargaKini || 0).toLocaleString()}`,
                item.perubahan.charAt(0).toUpperCase() + item.perubahan.slice(1) + ` (${item.presentase || 0}%)`,
                item.stok
            ]);

            // Gabungkan semua data
            const rows = [...headerInfo, ...tableHeader, ...tableRows];

            // Konversi data menjadi worksheet
            const worksheet = XLSX.utils.aoa_to_sheet(rows);

            // Buat workbook dan tambahkan worksheet
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Data Barang");

            // Simpan file Excel
            XLSX.writeFile(workbook, "data_barang.xlsx");
        });
    </script>
</body>

</html>