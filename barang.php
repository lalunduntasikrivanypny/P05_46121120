<?php

class barang extends controller
{
    public function index()
    {
        $jimm['barang'] = $this->gunakan_model("m_barang")->all_data();
        $this->tampilkan_view("f_barang/v_daftar_barang_120", $jimm);
    }


    public function input()
    {
        $this->tampilkan_view("f_barang/v_input_barang_120");
    }

    public function tampil($ciaw)
    {
        $jimm['barang'] = $this->gunakan_model("m_barang")->based_id($ciaw);
        $this->tampilkan_view("f_barang/v_tampil_barang_120", $jimm);
    }

    public function edit($ciaw)
    {
        $jimm['barang'] = $this->gunakan_model("m_barang")->based_id($ciaw);
        $this->tampilkan_view("f_barang/v_edit_barang_120", $jimm);
    }

    public function hapus($ciaw)
    {
        $jimm['barang'] = $this->gunakan_model("m_barang")->based_id($ciaw);
        $this->tampilkan_view("f_barang/v_hapus_barang_120", $jimm);
    }

    // buat metode baru
    public function proses_input()
    {
        $this->gunakan_model("m_barang")->save($_POST);

        header("location:" . APLIKASI . "/barang");
    }

    public function proses_edit()
    {
        $jimm= $this->gunakan_model("m_barang")->edit($_POST);
        // cetak_var($jimm);

        header("location:" . APLIKASI . "/barang");
    }

    public function proses_delete()
    {
        $yuno = $this->gunakan_model("m_barang")->delete($_POST);
        // cetak_var($jimm);

        header("location:" . APLIKASI . "/barang");
    }
}
