<?php

class home extends controller
{
	public function index()
	{
		$this->tampilkan_view("halaman_kosong");
	}

	public function barang()
	{
		//menampilkan sebuah halaman penjualan
		$this->tampilkan_view("halaman_barang");
	}

	public function beli()
	{
		//menampilkan sebuah halaman pembelian
		$this->tampilkan_view("halaman_beli");
	}
}
