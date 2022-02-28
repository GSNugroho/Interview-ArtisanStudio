<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class cart extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('test_model');
        $this->load->helper('url');
	}

    function index(){
        $data['data']=$this->test_model->getData()->result();
        $this->load->view('cart/cart',$data);
    }
 
    function addcart(){ 
        $data = array(
            'id_barang' => $this->input->post('id_barang'), 
            'nama_barang' => $this->input->post('nama_barang'), 
            'harga_barang' => $this->input->post('harga_barang'), 
            'qty' => $this->input->post('qty'), 
        );
        $this->cart->insert($data) ;
        echo $this->show_cart(); 
    }
 
    function showcart(){ 
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['nama_barang'].'</td>
                    <td>'.number_format($items['harga_barang']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }
 
    function loadcart(){ 
        echo $this->showCart();
    }
 
    function deletecart(){ 
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->showCart();
    }
}