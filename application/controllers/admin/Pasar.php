<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pasar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('download');
    }
    public function index()
    {
        $data['title'] = 'Pasar';
        $data['list'] = $this->db->query("SELECT * from tb_pasar order by id desc")->result();
        $this->template->load('template', 'admin/pasar', $data);
    }
    public function harga()
    {
        $status = $this->session->userdata('status');
        if ($status != "login") {
            tampil_alert('error', 'SESSION EXPIRED', 'Sesi anda habis, silahkan login kembali.');
            redirect(base_url(''));
        }
        $data['title'] = 'Pasar';
        $data['list'] = $this->db->query("SELECT * from tb_harga order by id desc")->result();
        $data['pasar'] = $this->db->query("SELECT * from tb_pasar order by id desc")->result();
        $this->template->load('template', 'admin/pasar_harga', $data);
    }
    public function harga_baru()
    {
        $status = $this->session->userdata('status');
        if ($status != "login") {
            tampil_alert('error', 'SESSION EXPIRED', 'Sesi anda habis, silahkan login kembali.');
            redirect(base_url(''));
        }
        $data['title'] = 'Pasar';
        $data['list_b'] = $this->db->query("SELECT * from tb_barang order by id desc")->result();
        $this->template->load('template', 'admin/pasar_baru', $data);
    }
    public function harga_detail($id)
    {
        $data['title'] = 'Pasar';
        $data['harga'] = $this->db->query("SELECT * from tb_harga where id = ?", [$id])->row();
        $data['list_b'] = $this->db->query("
            SELECT tpd.*, tb.barang, tb.kategori, tp.nama as pasar_nama
            FROM tb_harga_detail tpd
            JOIN tb_barang tb on tpd.barang_id = tb.id
            JOIN tb_pasar tp on tpd.pasar_id = tp.id
            WHERE tpd.harga_id = ? 
            ORDER BY tp.id, tb.barang", [$id])->result();
        $this->template->load('template', 'admin/pasar_detail', $data);
    }


    public function harga_simpan()
    {
        $barangId = $this->input->post('id_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');
        $pembuat = $this->session->userdata('nama');
        $jumlah    = count($barangId);
        $dataHarga = array(
            'keterangan' => $keterangan,
            'pembuat'   => $pembuat
        );
        $this->db->trans_start();
        $this->db->insert('tb_harga', $dataHarga);
        $id_pasar  = $this->db->insert_id();
        for ($i = 0; $i < $jumlah; $i++) {
            $detail_data[] = [
                'id_pasar' => $id_pasar,
                'id_barang' => $barangId[$i],
                'harga' => preg_replace('/[^0-9]/', '', $harga[$i]),
                'stok' => $stok[$i],
            ];
        }
        $this->db->insert_batch('tb_harga_detail', $detail_data);
        $this->db->trans_complete();
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "menambah data harga pasar"
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar'));
    }
    public function barang()
    {
        $data['title'] = 'Pasar';
        $data['list'] = $this->db->query("SELECT * from tb_barang order by id desc")->result();
        $this->template->load('template', 'admin/barang', $data);
    }
    public function pasar_baru()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat
        );

        $this->db->insert('tb_pasar', $data);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Menambah data pasar baru." . $nama
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar'));
    }
    public function barang_edit()
    {
        $id = $this->input->post('id');
        $barang = $this->input->post('barang');
        $kategori = $this->input->post('kategori');
        $data = array(
            'barang' => $barang,
            'kategori' => $kategori
        );

        $this->db->update('tb_barang', $data, ['id' => $id]);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Mengedit data barang " . $barang
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar/barang'));
    }
    public function pasar_edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('pasar');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat
        );

        $this->db->update('tb_pasar', $data, ['id' => $id]);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Mengedit data pasar " . $nama
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar'));
    }
    public function barang_baru()
    {
        $barang = $this->input->post('barang');
        $kategori = $this->input->post('kategori');
        $data = array(
            'barang' => $barang,
            'kategori' => $kategori
        );

        $this->db->insert('tb_barang', $data);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Menambah data barang baru." . $barang
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar/barang'));
    }
    public function import_harga()
    {
        $file = $_FILES['berkas']['tmp_name'];
        $reader = IOFactory::createReader('Xlsx');

        try {
            $spreadsheet = $reader->load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Data dari form
            $keterangan = $this->input->post('keterangan');
            $pasar_ids = $this->input->post('pasar_ids'); // Ambil ID pasar dari input checkbox
            $user_aktivitas = $this->session->userdata('nama');

            // Simpan data ke tb_harga
            $data_harga = [
                'keterangan' => $keterangan,
                'pembuat' => $user_aktivitas,
            ];
            $this->db->insert('tb_harga', $data_harga);
            $harga_id = $this->db->insert_id();
            foreach (array_slice($rows, 1) as $row) {
                $barang_nama = $row[1];
                $kategori_nama = $row[2];
                $harga = $row[3];
                $stok = $row[4];
                // Cek dan tambahkan barang jika belum ada
                $barang = $this->db->get_where('tb_barang', ['barang' => $barang_nama])->row();
                if (!$barang) {
                    $this->db->insert('tb_barang', [
                        'barang' => $barang_nama,
                        'kategori' => $kategori_nama,
                    ]);
                    $barang_id = $this->db->insert_id();
                } else {
                    $barang_id = $barang->id;
                }

                // Simpan data ke tb_harga_detail untuk setiap pasar
                foreach ($pasar_ids as $pasar_id) {
                    $this->db->insert('tb_harga_detail', [
                        'barang_id' => $barang_id,
                        'pasar_id' => $pasar_id,
                        'harga_id' => $harga_id,
                        'harga' => $harga,
                        'stok' => $stok,
                    ]);
                }
            }

            // Log aktivitas
            $log = [
                'user' => $user_aktivitas,
                'aksi' => "Mengimport data harga barang.",
            ];
            $this->db->insert('tb_log', $log);

            // Redirect ke halaman harga dengan notifikasi sukses
            tampil_alert('success', 'Berhasil', 'Data harga berhasil diimpor.');
            redirect(base_url('admin/Pasar/harga'));
        } catch (Exception $e) {
            tampil_alert('danger', 'Error', 'Gagal mengimpor barang: ' . $e->getMessage());
            redirect(base_url('admin/Pasar/harga'));
        }
    }

    public function import_barang()
    {
        // Process the uploaded file
        $file = $_FILES['file']['tmp_name'];
        $reader = IOFactory::createReader('Xlsx');

        try {
            $spreadsheet = $reader->load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            $lastRowIndex = count($rows) - 1;

            for ($i = 1; $i <= $lastRowIndex; $i++) {
                $barang = isset($rows[$i][1]) ? trim($rows[$i][1]) : '';
                $kategori = isset($rows[$i][2]) ? trim($rows[$i][2]) : '';

                if (empty($barang) || empty($kategori)) {
                    tampil_alert('warning', 'DATA KOSONG', 'Data pada baris ' . ($i + 1) . ' memiliki kolom yang kosong, tidak akan disimpan.');
                    continue;
                }
                $barang = $this->db->escape_str($barang);
                // Check if product exists
                $existing_produk = $this->db->get_where('tb_barang', array('barang' => $barang))->row();
                if ($existing_produk) {
                    $data = array(
                        'barang' => $barang,
                        'kategori' => $kategori
                    );
                    $this->db->update('tb_barang', $data, array('barang' => $barang));
                    tampil_alert('success', 'Berhasil', 'Barang sudah ada & Data berhasil Update!');
                } else {
                    // Add the new product to the database
                    $data = array(
                        'barang' => $barang,
                        'kategori' => $kategori
                    );
                    $this->db->insert('tb_barang', $data);
                    tampil_alert('success', 'Berhasil', 'Barang berhasil ditambahkan!');
                }
            }
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Mengimport data barang."
            );
            $this->db->insert('tb_log', $log);
            redirect(base_url('admin/Pasar/barang'));
        } catch (Exception $e) {
            tampil_alert('danger', 'Error', 'Gagal mengimpor barang: ' . $e->getMessage());
            redirect(base_url('admin/Pasar/barang'));
        }
    }
    public function download_harga()
    {
        $file_path = FCPATH . 'assets/excel/template_import_harga.Xlsx'; // Path file

        if (file_exists($file_path)) {
            force_download($file_path, NULL); // Proses download file
        } else {
            show_404(); // Tampilkan error jika file tidak ditemukan
        }
    }
    public function download_barang()
    {
        $file_path = FCPATH . 'assets/excel/template_import_barang.Xlsx'; // Path file

        if (file_exists($file_path)) {
            force_download($file_path, NULL); // Proses download file
        } else {
            show_404(); // Tampilkan error jika file tidak ditemukan
        }
    }
    public function hapus_barang($id)
    {

        $this->db->delete('tb_barang', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data barang."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Pasar/barang'));
    }
    public function hapus_pasar($id)
    {

        $this->db->delete('tb_pasar', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data  pasar."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Pasar'));
    }
    public function hapus_harga($id)
    {

        $this->db->delete('tb_harga', ['id' => $id]);
        $this->db->delete('tb_harga_detail', ['pasar_id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data harga pasar."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Pasar/harga'));
    }
    // api harga pasar
    public function get_harga_pasar()
    {
        // Query data
        $query = $this->db->query("
        SELECT 
            b.barang,
            b.kategori,
            h.periode,
            hd.harga AS hargaKini,
            COALESCE((
                SELECT hd2.harga
                FROM tb_harga_detail hd2
                JOIN tb_harga h2 ON h2.id = hd2.harga_id
                WHERE hd2.barang_id = hd.barang_id
                AND hd2.pasar_id = hd.pasar_id
                AND h2.periode < h.periode
                ORDER BY h2.periode DESC
                LIMIT 1
            ), 0) AS hargaLalu,
            hd.stok,
            p.nama AS pasar,
            hd.harga - COALESCE((
                SELECT hd2.harga
                FROM tb_harga_detail hd2
                JOIN tb_harga h2 ON h2.id = hd2.harga_id
                WHERE hd2.barang_id = hd.barang_id
                AND hd2.pasar_id = hd.pasar_id
                AND h2.periode < h.periode
                ORDER BY h2.periode DESC
                LIMIT 1
            ), 0) AS perubahanHarga
        FROM tb_harga_detail hd
        JOIN tb_harga h ON h.id = hd.harga_id
        JOIN tb_barang b ON b.id = hd.barang_id
        JOIN tb_pasar p ON p.id = hd.pasar_id
    ");

        // Process data
        $result = [];
        $no = 1;
        foreach ($query->result() as $row) {
            $perubahan = $row->perubahanHarga > 0 ? 'naik' : ($row->perubahanHarga < 0 ? 'turun' : 'tetap');

            // Pastikan hargaLalu tidak 0 untuk menghindari pembagian dengan nol
            $presentase = 0;
            if ($row->hargaLalu != 0) {
                $presentase = (($row->hargaKini - $row->hargaLalu) / $row->hargaLalu) * 100;
            }

            $result[] = [
                'no' => $no++,
                'barang' => $row->barang,
                'kategori' => $row->kategori,
                'hargaLalu' => $row->hargaLalu,
                'hargaKini' => $row->hargaKini,
                'stok' => $row->stok ? 'Tersedia' : 'Kosong',
                'pasar' => $row->pasar,
                'periode' => $row->periode,
                'perubahan' => $perubahan,
                'presentase' => $presentase,
            ];
        }


        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
