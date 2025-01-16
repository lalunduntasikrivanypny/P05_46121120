<?php

class tawar extends controller
{
    public function index()
    {
        $jimm['tawar'] = $this->gunakan_model("m_tawar")->semua_barang();
        $this->tampilkan_view("f_tawar/v_daftar_tawar_120", $jimm);
    }

    public function input($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->satu_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_input_tawar_120", $jimm);
    }

    public function tampil($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->satu_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_tampil_tawar_120", $ciaw);
    }

    public function edit($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->satu_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_edit_tawar_120", $ciaw);
    }

    public function hapus($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->satu_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_hapus_tawar_120", $jimm);
    }

    public function ask_data($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->based_data($ciaw);
        echo json_encode($jimm);
    }
    // input barang
    public function proses_input()
    {
        // cetak_var($_POST);
        $jimm = $this->gunakan_model("m_tawar")->save($_POST);

        // simpan detail
        foreach ($_POST['detail'] as $miw => $isi) :
            $isi['mtawar']= $jimm;
            $this->gunakan_model("m_detail_tawar")->save($isi);
            // echo "simpami ini<br>";
        endforeach;


        header("location:" . APLIKASI . "/tawar");
    }

    public function proses_edit()
    {
        // cetak_var($_POST);
        $jimm = $this->gunakan_model("m_tawar")->edit($_POST);

        // simpan detail 
        foreach($_POST['detail'] as $miw => $isi) :
            $this->gunakan_model("m_detail_tawar")->edit($isi);
        endforeach;

        header("location:" . APLIKASI . "/tawar");
    }
    public function proses_delete()
    {
        
        $jimm = $this->gunakan_model("m_tawar")->delete($_POST);
        $jimm = $this->gunakan_model("m_detail_tawar")->delete($_POST);
        // cetak_var($_POST);

        header("location:" . APLIKASI . "/tawar");
    }
}
