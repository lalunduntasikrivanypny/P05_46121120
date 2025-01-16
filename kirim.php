<?php

class kirim extends controller
{
    public function index()
    {
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->semua_barang();
        $this->tampilkan_view("f_kirim/v_daftar_kirim_120", $jimm);
    }


    public function input($kiw=" ")
    {
        // $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        // $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['detail_terima'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        $jimm['terimaid'] = $this->gunakan_model("m_terima")->satu_barang($ciaw);
        $this->tampilkan_view("f_kirim/v_input_kirim_120", $jimm);
    }

    public function tampil($ciaw=" ")
    {
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['kirimid'] = $this->gunakan_model("m_kirim")->take_based_detail($ciaw);
        // cetak_var($jimm);
         $this->tampilkan_view("f_kirim/v_tampil_kirim_120", $jimm);
    }

   
    public function edit($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['kirimid'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        // cetak_var($jimm);
        $this->tampilkan_view("f_kirim/v_edit_kirim_120", $jimm);
    }

    public function hapus($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['kirimid'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        // cetak_var($jimm);
        $this->tampilkan_view("f_kirim/v_hapus_kirim_120", $jimm);
    }

    public function ask_data($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->based_data($ciaw);
        echo json_encode($jimm);
    }

    // input kirim
    public function proses_input()
    {
       cetak_var($_POST);
        // $this->gunakan_model("m_kirim")->save($_POST);

        // header("location:" . APLIKASI . "/kirim");
    }

    public function proses_edit()
    {
        $this->gunakan_model("m_kirim")->edit($_POST);

        header("location:" . APLIKASI . "/kirim");
    }

    public function proses_delete()
    {
        $this->gunakan_model("m_kirim")->delete($_POST);

        header("location:" . APLIKASI . "/kirim");
    }
}
