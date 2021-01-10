<?php
Class Buku extends CI_Controller{
    var $api ="";
    function __construct() {
        parent::__construct();
        $this->api="http://localhost/rest-server/server/";
        // $this->load->model("user_model");
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        // if($this->user_model->isNotLogin()) redirect(site_url('login'));
        // $this->curl->http_header("Authorization", "Bearer " .$this->user_model->getSessionToken());
    }

    function index(){
        $data = json_decode($this->curl->simple_get($this->api.'/buku'));
        $this->load->view('buku/v_list',$data);
    }

    function detail(){
        $params = array('id' => $this->uri->segment(3));
        $data = json_decode($this->curl->simple_get($this->api . '/buku', $params));
        $this->load->view('buku/v_detail', $data);
    }

    function simpan() {
        if (isset($_POST['submit'])) {
            $data = array(
                'judul'           => $this->input->post('judul'),
                'penulis'               => $this->input->post('penulis'),
                'tahun_terbit'            => $this->input->post('tahun_terbit'),
                'penerbit'         => $this->input->post('penerbit'),
                'jenis_buku'        => $this->input->post('jenis_buku')); 
            $insert = $this->curl->simple_post($this->api . '/buku', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('info', 'data berhasil disimpan.');
            } else {
                $this->session->set_flashdata('info', 'data gagal disimpan.');
            }
            redirect('buku');
        } else {
            $this->load->view('buku/v_form');
        }
    }

    // edit data produk
    function edit() {
        if (isset($_POST['submit'])) {
            $data = array(
                'id'                    => $this->input->post('id'),
                'judul'                 => $this->input->post('judul'),
                'penulis'               => $this->input->post('penulis'),
                'tahun_terbit'          => $this->input->post('tahun_terbit'),
                'penerbit'              => $this->input->post('penerbit'),
                'jenis_buku'            => $this->input->post('jenis_buku')); 
            $update = $this->curl->simple_put($this->api . '/buku', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('info', 'Data Berhasil diubah');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal diubah');
            }
            redirect('buku');
        } else {
            $params = array('id' => $this->uri->segment(3));
            $data = json_decode($this->curl->simple_get($this->api . '/buku', $params));
            $this->load->view('buku/v_edit', $data);
        }
    }

    
 // hapus data produk berdasarkan id
 function delete($id) {
    if (empty($id)) {
        redirect('buku');
    } else {
        $delete = $this->curl->simple_delete($this->api . '/buku', array('id' => $id), array(CURLOPT_BUFFERSIZE => 10));
        if ($delete) {
            $this->session->set_flashdata('info', 'Data Berhasil dihapus');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal dihapus');
        }
        redirect('buku');
    }
}

}
























// use Restserver\Libraries\REST_Controller;

// defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . '/libraries/REST_Controller.php';
// class Buku extends REST_Controller
// {
//     public function __construct()
//     {
//         parent::__construct();
//         //inisialisasi model Produk_model.php dengan nama produk
//         $this->load->model('buku_model', 'buku');
//     }
//     public function index_get()
//     {
//        $id = $this->get('id');
//         if ($id == '') {
//             $buku = $this->db->get('buku')->result();
//         } else {
//             $this->db->where('id', $id);
//             $buku = $this->db->get('buku')->result();
//         }
//         $this->response($buku, REST_Controller::HTTP_OK);
//     }
	
// 	function index_post()
//     {
//         $data = array(
//             'id'        => $this->post('id'),
//             'judul'        => $this->post('judul'),
//             'penulis'               => $this->post('penulis'),
// 			'tahun_terbit'               => $this->post('tahun_terbit'),
// 			'penerbit'               => $this->post('penerbit'),
//             'jenis_buku'              => $this->post('jenis_buku'),
//         );
//         $insert = $this->db->insert('buku', $data);
//         if ($insert) {
//             $this->response($data, REST_Controller::HTTP_OK);
//         } else {
//             $this->response(array('status' => 'fail', 502));
//         }
//     }
	
// 	public function index_put() {
//             $id = $this->put('id');
//             $data = [
//                 'id'       => $this->put('id'),
//                 'judul'       	=> $this->put('judul'),
//                 'penulis'       => $this->put('penulis'),
//                 'tahun_terbit'  => $this->put('tahun_terbit'),
//                 'penerbit'     	=> $this->put('penerbit'),
//                 'jenis_buku'    => $this->put('jenis_buku'),
                
//             ];
//             if($data ['id'] === null) {
//                 $this->response([
//                     'status' => REST_Controller::HTTP_BAD_REQUEST,
//                     'message' => 'Permintaan Tidak Valid'
//                 ]); 
//             } else {
//                 if ($this->buku->updateBuku($data, $id) > 0) {
//                     $this->response([
//                         'status' => REST_Controller::HTTP_OK,
//                         'id' => $id,
//                         'message' => 'Data Buku telah diupdate'
//                     ]);
//                 } else {
//                     $this->response([
//                         'status' => REST_Controller::HTTP_NO_CONTENT,
//                         'message' => 'Data Tersebut Tidak Ada'
//                     ]);
//                 }
//             }
//         }

// 	function index_delete()
//     {
//         $id = $this->delete('id');
//         $this->db->where('id', $id);
//         $delete = $this->db->delete('buku');
//         if ($delete) {
//             $this->response(array('status' => 'success'), 201);
//         } else {
//             $this->response(array('status' => 'failed'), 502);
//         }
//     }
	
// }

