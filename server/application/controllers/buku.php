<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Buku extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        $this->load->model('buku_model', 'buku');
    }
    public function index_get()
    {
       $id = $this->get('id');
        if ($id == '') {
            $buku = $this->db->get('buku')->result();
        } else {
            $this->db->where('id', $id);
            $buku = $this->db->get('buku')->result();
        }
        $this->response($buku, REST_Controller::HTTP_OK);
    }
	
	function index_post()
    {
        $data = array(
            'id'        => $this->post('id'),
            'judul'        => $this->post('judul'),
            'penulis'               => $this->post('penulis'),
			'tahun_terbit'               => $this->post('tahun_terbit'),
			'penerbit'               => $this->post('penerbit'),
            'jenis_buku'              => $this->post('jenis_buku'),
        );
        $insert = $this->db->insert('buku', $data);
        if ($insert) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
	public function index_put() {
            $id = $this->put('id');
            $data = [
                'id'       => $this->put('id'),
                'judul'       	=> $this->put('judul'),
                'penulis'       => $this->put('penulis'),
                'tahun_terbit'  => $this->put('tahun_terbit'),
                'penerbit'     	=> $this->put('penerbit'),
                'jenis_buku'    => $this->put('jenis_buku'),
                
            ];
            if($data ['id'] === null) {
                $this->response([
                    'status' => REST_Controller::HTTP_BAD_REQUEST,
                    'message' => 'Permintaan Tidak Valid'
                ]); 
            } else {
                if ($this->buku->updateBuku($data, $id) > 0) {
                    $this->response([
                        'status' => REST_Controller::HTTP_OK,
                        'id' => $id,
                        'message' => 'Data Buku telah diupdate'
                    ]);
                } else {
                    $this->response([
                        'status' => REST_Controller::HTTP_NO_CONTENT,
                        'message' => 'Data Tersebut Tidak Ada'
                    ]);
                }
            }
        }

	function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('buku');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'failed'), 502);
        }
    }
	
}
?>
