<?php

class pelanggan extends controller
{
  public function index()
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
    $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function tampil($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);

    echo json_encode($jimm);
    // $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function input($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);

    echo json_encode($jimm);
    $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function edit($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);

    echo json_encode($jimm);
    // $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function hapus($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);

    echo json_encode($jimm);
    // $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function proses_input()
  {
    // cetak_var($_POST);
    $this->gunakan_model("m_pelanggan")->save($_POST);
    
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();

    echo json_encode($jimm);
  }

  public function proses_edit()
  {
    $this->gunakan_model("m_pelanggan")->edit($_POST);

    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();

    echo json_encode($jimm);
  }

  public function proses_delete()
  {
    $this->gunakan_model("m_pelanggan")->delete($_POST);

    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();

    echo json_encode($jimm);
  }
}
