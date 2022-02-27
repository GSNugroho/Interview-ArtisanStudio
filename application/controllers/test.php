<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class test extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('test_model');
		$this->load->helper('url');
	}
 
	function index(){
		$data['barang'] = $this->test_model->getData()->result();
		$this->load->view('crud_barang/test',$data);
	}

    function tambah(){
		$this->load->view('crud_barang/test_tambah.php');
	}

    function tambah_aksi(){
		$nama_barang = $this->input->post('nama_barang');
		$stock_barang = $this->input->post('stock_barang');
		$harga_barang = $this->input->post('harga_barang');
 
		$data = array(
			'nama_barang' => $nama_barang,
			'stock_barang' => $stock_barang,
			'harga_barang' => $harga_barang
			);
		$this->test_model->putData($data,'barang');
		redirect('test/index');
	}

    function hapus($id){
        $where = array('id_barang' => $id);
		$this->test_model->deleteData($where,'barang');
		redirect('test/index');
    }

    function edit($id){
		$where = array('id_barang' => $id);
		$data['barang'] = $this->test_model->editData($where,'barang')->result();
		$this->load->view('crud_barang/test_edit',$data);
	}

    function update(){
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $stock_barang = $this->input->post('stock_barang');
		$harga_barang = $this->input->post('harga_barang');
     
        $data = array(
            'nama_barang' => $nama_barang,
            'stock_barang' => $stock_barang,
			'harga_barang' => $harga_barang
        );
     
        $where = array(
            'id_barang' => $id_barang
        );
     
        $this->test_model->updateData($where,$data,'barang');
        redirect('test/index');
    }
}