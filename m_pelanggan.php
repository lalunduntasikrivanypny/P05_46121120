<<?php
class m_pelanggan
{
    private $dataku;
    private $x = "SELECT pelanggan.*,
    IFNULL(yah.frekuensi_penawaran,0) AS frekuensi_penawaran 
    FROM pelanggan
    LEFT JOIN (
        SELECT master_penawaran.id_pelanggan,
        COUNT(master_penawaran.id_pelanggan) AS frekuensi_penawaran
        FROM master_penawaran
        GROUP BY id_pelanggan) 
        yah ON pelanggan.id=yah.id_pelanggan";

    public function __construct()
    {
        $this->dataku  = new database;
    }

    public function all_data()
    {
        $sql =$this->x. '';
        $this->dataku->isi_sql($sql);
        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }

    public function based_data($data)
    {
        $sql =$this->x. '  WHERE pelanggan.id= :x ';
        $this->dataku->isi_sql($sql);
        $this->dataku->isi_parameter("x", $data);

        $saya = $this->dataku->ambil_satu_baris();
        return $saya;
    }

    public function save($nilaiku)
    {
        $sql = "INSERT INTO pelanggan(kode_pelanggan, nama_pelanggan, alamat, no_telp_pelanggan) VALUES(:a, :b, :c, :d)";
        $this->dataku->isi_sql($sql);

        $this->dataku->isi_parameter("a", $nilaiku['kodew']);
        $this->dataku->isi_parameter("b", $nilaiku['namaw']);
        $this->dataku->isi_parameter("c", $nilaiku['alamaw']);
        $this->dataku->isi_parameter("d", $nilaiku['ntp']);
      

        $this->dataku->jalankan_sql();
    }

    public function edit($nilaiku)
    {
        $sql = "UPDATE pelanggan 
        SET kode_pelanggan= :a,  nama_pelanggan= :b, alamat= :c, no_telp_pelanggan= :d WHERE id= :x";
        $this->dataku->isi_sql($sql);

        $this->dataku->isi_parameter("a", $nilaiku['kp']);
        $this->dataku->isi_parameter("b", $nilaiku['np']);
        $this->dataku->isi_parameter("c", $nilaiku['al']);
        $this->dataku->isi_parameter("d", $nilaiku['kb']);
        $this->dataku->isi_parameter("x", $nilaiku['id_pelanggan']);

        $this->dataku->jalankan_sql();
    }

    public function delete($nilaiku)
    {
        $sql = "DELETE FROM pelanggan WHERE id= :x";
        $this->dataku->isi_sql($sql);

        $this->dataku->isi_parameter("x", $nilaiku['id_pelanggan']);

        $this->dataku->jalankan_sql();
    }
}

