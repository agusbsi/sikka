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
        $status = $this->session->userdata('status');
        if ($status != "login") {
            tampil_alert('error', 'SESSION EXPIRED', 'Sesi anda habis, silahkan login kembali.');
            redirect(base_url(''));
        }
    }
    public function index()
    {
        $data['title'] = 'Pasar';
        $data['list'] = $this->db->query("SELECT * from tb_pasar order by id desc")->result();
        $this->template->load('template', 'admin/pasar', $data);
    }
    public function harga_baru()
    {
        $data['title'] = 'Pasar';
        $data['list_b'] = $this->db->query("SELECT * from tb_barang order by id desc")->result();
        $this->template->load('template', 'admin/pasar_baru', $data);
    }
    public function harga_detail($id)
    {
        $data['title'] = 'Pasar';
        $data['harga'] = $this->db->query("SELECT * from tb_pasar where id = ?", [$id])->row();
        $data['list_b'] = $this->db->query("SELECT * from tb_pasar_detail tpd
        JOIN tb_barang tb on tpd.id_barang = tb.id
        WHERE tpd.id_pasar = ? order by tb.barang asc", [$id])->result();
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
        $this->db->insert('tb_pasar', $dataHarga);
        $id_pasar  = $this->db->insert_id();
        for ($i = 0; $i < $jumlah; $i++) {
            $detail_data[] = [
                'id_pasar' => $id_pasar,
                'id_barang' => $barangId[$i],
                'harga_baru' => preg_replace('/[^0-9]/', '', $harga[$i]),
                'stok' => $stok[$i],
            ];
        }
        $this->db->insert_batch('tb_pasar_detail', $detail_data);
        $this->db->trans_complete();
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar'));
    }
    public function barang()
    {
        $data['title'] = 'Pasar';
        $data['list'] = $this->db->query("SELECT * from tb_barang order by id desc")->result();
        $this->template->load('template', 'admin/barang', $data);
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
        tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
        redirect(base_url('admin/Pasar/barang'));
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
            redirect(base_url('admin/Pasar/barang'));
        } catch (Exception $e) {
            tampil_alert('danger', 'Error', 'Gagal mengimpor barang: ' . $e->getMessage());
            redirect(base_url('admin/Pasar/barang'));
        }
    }
}
