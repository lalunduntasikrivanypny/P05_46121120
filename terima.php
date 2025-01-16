<?php

class terima extends controller
{
    public function index()
    {
        $jimm['terima'] = $this->gunakan_model("m_terima")->semua_barang();
        $this->tampilkan_view("f_terima/v_daftar_terima_120", $jimm);
    }


    public function input($ciaw)
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        // $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['terimaid'] = $this->gunakan_model("m_tawar")->satu_barang($ciaw);
        $jimm['detail_terima'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        // cetak_var($jimm);
        $this->tampilkan_view("f_terima/v_input_terima_120", $jimm);
    }

    public function tampil($ciaw)
    {
        // $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        // $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_terima'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        $jimm['terimaid'] = $this->gunakan_model("m_terima")->satu_barang($ciaw);
        $this->tampilkan_view("f_terima/v_tampil_terima_120", $jimm);
    }

    public function edit($ciaw)
    {
        // $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        // $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_terima'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        $jimm['terimaid'] = $this->gunakan_model("m_terima")->satu_barang($ciaw);
        // cetak_var($jimm);
        $this->tampilkan_view("f_terima/v_edit_terima_120", $jimm);
    }

    public function hapus($ciaw = " ")
    {
        // $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang($ciaw);
        // $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_terima'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        $jimm['terimaid'] = $this->gunakan_model("m_terima")->satu_barang($ciaw);
        $this->tampilkan_view("f_terima/v_hapus_terima_120", $jimm);
    }

    public function ask_data($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->based_data($ciaw);
        echo json_encode($jimm);
    }

    // input pesanan
    public function proses_input()
    {
        // simpan master
        $jimm = $this->gunakan_model("m_terima")->save($_POST);
        // cetak_var($_POST);

        foreach ($_POST['detail'] as $miw => $isi) :
            // cetak_var($isi);
            $isi['mterima'] = $jimm;
            // cetak_var($isi);
            $this->gunakan_model("m_detail_terima")->save($isi);
        // // echo "simpami ini<br>";
        endforeach;


        header("location:" . APLIKASI . "/terima/index");
    }

    public function proses_edit()
    {
        // simpan master
        $jimm = $this->gunakan_model("m_terima")->edit($_POST);
        // cetak_var($_POST);

        //simpan detail
        foreach ($_POST['detail_terima'] as $urutan => $isi) :
            $this->gunakan_model("m_detail_terima")->edit($isi);
        endforeach;
        header("location:" . APLIKASI . "/terima/index");
    }

    public function proses_delete()
    {
        // simpan master
        $jimm = $this->gunakan_model("m_terima")->delete($_POST);
        $jimm = $this->gunakan_model("m_detail_terima")->delete($_POST);
        // cetak_var($_POST);

        header("location:" . APLIKASI . "/terima");
    }
}
