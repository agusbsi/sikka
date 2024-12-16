<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
	public function index()
	{
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
		$data['bupati'] = $this->db->query("SELECT * from tb_bupati order by id desc")->result();
		$data['bupati_last'] = $this->db->query("SELECT * from tb_bupati order by id desc limit 1")->row();
		$data['berita_terbaru'] = $this->db->query("SELECT * from tb_berita order by id desc limit 4")->result();
		$data['berita_all'] = $this->db->query("SELECT * from tb_berita order by id desc")->result();
		$data['wisata'] = $this->db->query("SELECT * from tb_wisata order by id desc")->result();
		$data['splash'] = $this->db->get_where('tb_splash', ['status' => 1])->row();
		$this->templatefront->load('utama', 'konten/depan', $data);
	}
	public function getEvents()
	{
		$events = $this->db->query("SELECT * FROM tb_event ORDER BY id DESC")->result();
		echo json_encode($events);
	}
	public function tentang()
	{
		$data['bupati'] = $this->db->query("SELECT tb.nama as bupati, tb.foto, tb.jabatan from tb_pengaturan tp
        LEFT JOIN tb_bupati tb on tp.bupati_id = tb.id
        where tp.id = ?", ["1"])->row();
		$data['wakil'] = $this->db->query("SELECT tb.nama as wakil, tb.foto, tb.jabatan from tb_pengaturan tp
        LEFT JOIN tb_bupati tb on tp.wakil_id = tb.id
        where tp.id = ?", ["1"])->row();
		$data['bupati_all'] = $this->db->query("
		SELECT * 
		FROM tb_bupati 
		WHERE id NOT IN (SELECT bupati_id FROM tb_pengaturan) 
		  AND id NOT IN (SELECT wakil_id FROM tb_pengaturan) 
		ORDER BY id DESC")->result();

		$data['berita_all'] = $this->db->query("SELECT * from tb_berita where kategori = ? order by id desc", ["kontribusi"])->result();
		$data['visi'] = $this->db->query("SELECT * from tb_visi where id = ?", ["1"])->row();
		$data['sejarah'] = $this->db->query("SELECT * FROM tb_sejarah ORDER BY id ASC")->result();
		$data['lambang'] = $this->db->query("SELECT * FROM tb_lambang ORDER BY id ASC")->result();
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$this->load->view('tentang', $data);
	}
	public function kelembagaan()
	{
		$data['bupati'] = $this->db->query("SELECT tb.nama as bupati, tb.foto, tb.jabatan from tb_pengaturan tp
        LEFT JOIN tb_bupati tb on tp.bupati_id = tb.id
        where tp.id = ?", ["1"])->row();
		$data['dinas'] = $this->db->query("SELECT * FROM tb_kelembagaan where kategori = ? ORDER BY id ASC", ["dinas"])->result();
		$data['sekretariat'] = $this->db->query("SELECT * FROM tb_kelembagaan where kategori = ? ORDER BY id ASC", ["daerah"])->result();
		$data['kecamatan'] = $this->db->query("SELECT * FROM tb_kelembagaan where kategori = ? ORDER BY id ASC", ["kecamatan"])->result();
		$data['kelurahan'] = $this->db->query("SELECT * FROM tb_kelembagaan where kategori = ? ORDER BY id ASC", ["kelurahan"])->result();
		$data['desa'] = $this->db->query("SELECT * FROM tb_kelembagaan where kategori = ? ORDER BY id ASC", ["desa"])->result();
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$this->load->view('kelembagaan', $data);
	}
	public function harga_pasar()
	{
		$data['pasar'] = $this->db->query("SELECT * from tb_pasar order by id desc")->result();
		$data['periode'] = $this->db->query("SELECT * from tb_harga GROUP BY periode order by id desc")->result();
		$data['kategori'] = $this->db->query("SELECT * from tb_barang GROUP BY kategori order by id desc")->result();
		$this->load->view('pasar', $data);
	}
	public function exportPdf()
	{
		// Query data barang
		$barang = $this->db->query("
        SELECT 
            tb_barang.barang, 
            tb_barang.kategori, 
            tpd1.harga AS harga_bulan_ini, 
            tpd2.harga AS harga_bulan_lalu,
            (tpd1.harga - tpd2.harga) / tpd2.harga * 100 AS persentase_perubahan,
            tpd1.stok
        FROM 
            tb_pasar_detail tpd1
        JOIN 
            tb_pasar tp1 ON tpd1.id_pasar = tp1.id
        LEFT JOIN 
            tb_pasar_detail tpd2 ON tpd1.id_barang = tpd2.id_barang AND tpd2.id_pasar = (
                SELECT id FROM tb_pasar WHERE tanggal < tp1.tanggal ORDER BY tanggal DESC LIMIT 1
            )
        JOIN 
            tb_barang ON tpd1.id_barang = tb_barang.id
        WHERE 
            tp1.id = (SELECT id FROM tb_pasar ORDER BY id DESC LIMIT 1)
        ORDER BY 
            tb_barang.barang ASC
		")->result();

		// Inisialisasi library MPDF
		$mpdf = new \Mpdf\Mpdf();

		// Pengaturan watermark
		$mpdf->SetWatermarkText('SIKKA', 0.05);
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSans-Bold';
		$mpdf->watermarkTextAlpha = 0.05;
		$html = '
			<style>
				body {
					font-family: Arial, sans-serif;
					font-size: 10px; /* Ukuran font kecil untuk PDF */
				}
				h1 {
					text-align: center;
					font-size: 16px; /* Ukuran font judul */
					margin-bottom: 20px;
				}
				table {
					width: 100%;
					border-collapse: separate;
					border-spacing: 0;
					margin-top: 20px;
				}
				th, td {
					padding: 6px; /* Padding kecil agar tabel lebih kompak */
					text-align: left;
					border-bottom: 1px solid #e0e0e0;
				}
				th {
					background-color: #3498db;
					color: white;
					text-align: center; /* Judul kolom rata tengah */
					font-size: 11px; /* Ukuran font sedikit lebih besar dari isi */
				}
				td {
					font-size: 10px; /* Ukuran font kecil untuk isi tabel */
				}
				tr:nth-child(even) {
					background-color: #f9f9f9; /* Baris dengan warna berbeda untuk kontras */
				}
				tr:hover {
					background-color: #f1f1f1; /* Highlight baris saat di-hover */
				}
			</style>

			<h1>Daftar Harga Barang</h1>
			<table>
				<thead>
					<tr>
						<th style="text-align: center; width: 5%;">No</th>
						<th style="width: 25%;">Barang</th>
						<th style="width: 20%;">Kategori</th>
						<th style="text-align: right; width: 15%;">Harga Kemarin</th>
						<th style="text-align: right; width: 15%;">Harga Sekarang</th>
						<th style="text-align: right; width: 15%;">Persentase</th>
						<th style="text-align: center; width: 5%;">Stok</th>
					</tr>
				</thead>
				<tbody>';

		// Tambahkan data ke tabel
		$no = 1;
		foreach ($barang as $item) {
			$persentase = is_numeric($item->persentase_perubahan) ?
				(($item->persentase_perubahan >= 0 ? '+' : '') . number_format($item->persentase_perubahan, 2) . '%') : '-';
			$html .= "
				<tr>
					<td style='text-align: center;'>{$no}</td>
					<td>{$item->barang}</td>
					<td>{$item->kategori}</td>
					<td style='text-align: right;'>Rp " . number_format($item->harga_bulan_lalu, 0, ',', '.') . "</td>
					<td style='text-align: right;'>Rp " . number_format($item->harga_bulan_ini, 0, ',', '.') . "</td>
					<td style='text-align: right;'>{$persentase}</td>
					<td style='text-align: center;'>{$item->stok}</td>
				</tr>";
			$no++;
		}
		$html .= '
				</tbody>
			</table>';

		// Tambahkan HTML ke PDF
		$mpdf->WriteHTML($html);

		// Output file PDF
		$mpdf->Output('Daftar-Barang.pdf', 'D');
	}

	public function berita_all()
	{
		$data['setting'] = $this->db->query("SELECT * FROM tb_pengaturan WHERE id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * FROM tb_layanan ORDER BY id DESC")->result();
		$data['populer'] = $this->db->query("SELECT * FROM tb_berita ORDER BY dibaca DESC LIMIT 5")->result();

		// Pagination setup
		$limit = 9; // Jumlah berita per halaman
		$page = $this->input->get('page') ? (int) $this->input->get('page') : 1; // Ambil parameter `page`
		$offset = ($page - 1) * $limit; // Hitung offset

		// Query data berita dengan limit dan offset
		$data['berita'] = $this->db->query("SELECT * FROM tb_berita ORDER BY id DESC LIMIT $limit OFFSET $offset")->result();

		// Total berita untuk pagination
		$total_berita = $this->db->query("SELECT COUNT(*) as total FROM tb_berita")->row()->total;

		// Generate pagination links
		$data['pagination'] = $this->generate_pagination(base_url('Utama/berita_all'), $total_berita, $limit, $page);

		$this->templatefront->load('utama', 'konten/berita_all', $data);
	}

	private function generate_pagination($base_url, $total_rows, $per_page, $current_page)
	{
		$total_pages = ceil($total_rows / $per_page);
		$pagination = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';

		// Previous button
		if ($current_page > 1) {
			$prev_page = $current_page - 1;
			$pagination .= '<li class="page-item"><a class="page-link" href="' . $base_url . '?page=' . $prev_page . '">Previous</a></li>';
		} else {
			$pagination .= '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
		}

		// Page numbers
		for ($i = 1; $i <= $total_pages; $i++) {
			if ($i == $current_page) {
				$pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
			} else {
				$pagination .= '<li class="page-item"><a class="page-link" href="' . $base_url . '?page=' . $i . '">' . $i . '</a></li>';
			}
		}

		// Next button
		if ($current_page < $total_pages) {
			$next_page = $current_page + 1;
			$pagination .= '<li class="page-item"><a class="page-link" href="' . $base_url . '?page=' . $next_page . '">Next</a></li>';
		} else {
			$pagination .= '<li class="page-item disabled"><span class="page-link">Next</span></li>';
		}

		$pagination .= '</ul></nav>';

		return $pagination;
	}

	public function berita($id)
	{
		$data['berita'] = $this->db->query("SELECT * from tb_berita where id = ?", [$id])->row();
		if (!$data['berita']) {
			show_404();
		}
		$this->db->set('dibaca', 'dibaca + 1', FALSE)
			->where('id', $id)
			->update('tb_berita');
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
		$data['berita_all'] = $this->db->query("SELECT * from tb_berita order by id desc")->result();
		$data['populer'] = $this->db->query("SELECT * FROM tb_berita ORDER BY dibaca DESC LIMIT 5")->result();
		$this->templatefront->load('utama', 'konten/berita', $data);
	}
	public function pengumuman()
	{
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
		$data['pengumuman'] = $this->db->query("SELECT * from tb_pengumuman order by id desc")->result();
		$this->templatefront->load('utama', 'konten/pengumuman', $data);
	}
	public function pengumuman_detail($id)
	{
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
		$data['pengumuman'] = $this->db->query("SELECT * from tb_pengumuman where id = ?", [$id])->row();
		$this->templatefront->load('utama', 'konten/pengumuman_detail', $data);
	}
	public function dokumen()
	{
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
		$data['dokumen'] = $this->db->query("SELECT * from tb_dokumen order by id desc")->result();
		$this->templatefront->load('utama', 'konten/dokumen', $data);
	}
	public function dokumen_detail($id)
	{
		$data['setting'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ["1"])->row();
		$data['layanan'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
		$data['dokumen'] = $this->db->query("SELECT * from tb_dokumen where id = ?", [$id])->row();
		$this->templatefront->load('utama', 'konten/dokumen_detail', $data);
	}
	public function lapor()
	{
		$this->load->view('lapor');
	}
	public function lapor_kirim()
	{
		$nama_berkas = "laporan_" . date('Ymd_his');
		$config['file_name'] = $nama_berkas;
		$config['upload_path'] = 'assets/laporan/';
		$config['allowed_types'] = 'doc|docx|xls|xlsx|pdf|jpg|jpeg|png|mp4|mov|avi';
		$config['max_size'] = 20240;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$nama = $this->input->post('nama');
		$telp = $this->input->post('telp');
		$isi_laporan = $this->input->post('isi_laporan');
		$files = $_FILES;

		$uploaded_files = [];
		foreach ($files['berkas']['name'] as $key => $file_name) {

			$_FILES['berkas']['name'] = $files['berkas']['name'][$key];
			$_FILES['berkas']['type'] = $files['berkas']['type'][$key];
			$_FILES['berkas']['tmp_name'] = $files['berkas']['tmp_name'][$key];
			$_FILES['berkas']['error'] = $files['berkas']['error'][$key];
			$_FILES['berkas']['size'] = $files['berkas']['size'][$key];

			if ($this->upload->do_upload('berkas')) {
				$uploaded_files[] = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		// Save to database (example code, replace with actual logic)
		$this->db->insert('tb_lapor', ['nama' => $nama, 'telp' => $telp, 'laporan' => $isi_laporan, 'berkas' => json_encode($uploaded_files)]);
		$id_lapor = $this->db->insert_id();
		tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
		redirect(base_url('utama/lapor_selesai/' . $id_lapor));
	}
	public function lapor_selesai($id)
	{
		$data['lapor'] = $this->db->query("SELECT id from tb_lapor where id = ?", [$id])->row();
		if (!$data['lapor']) {
			show_404();
		}
		$this->load->view('lapor_selesai');
	}
	public function eror_404()
	{
		$this->load->view('errors/html/error_404');
	}
}
