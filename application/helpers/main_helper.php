<?php

function status_permintaan($id)
{

    if ($id == 0) {
        echo "<span class='badge badge-warning'>Diproses Leader..</span>";
    } elseif ($id == 1) {
        echo "<span class='badge badge-warning'>Diproses MV..</span>";
    } elseif ($id == 2) {
        echo "<span class='badge badge-info'>Disetujui</span>";
    } elseif ($id == 3) {
        echo "<span class='badge badge-info'>Disiapkan</span>";
    } elseif ($id == 4) {
        echo "<span class='badge badge-info'>Dikirim</span>";
    } elseif ($id == 6) {
        echo "<span class='badge badge-success'>Selesai</span>";
    } elseif ($id == 7) {
        echo "<span class='badge badge-secondary'>Ditunda</span>";
    } else {
        echo "<span class='badge badge-danger'>Ditolak</span>";
    }
}
function tampil_alert($type, $title, $text)
{
    $CI = &get_instance();
    $data = array(
        'type'  => $type,
        'title' => $title,
        'text'  => $text
    );

    $CI->session->set_flashdata($data);
}
