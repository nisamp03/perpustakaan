<?php
    // use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');

    // require APPPATH . 'libraries/REST_Controller.php';
    // require APPPATH . 'libraries/Format.php';

    class Companies extends BD_Controller {
        function __construct()
        {
            parent::__construct();
            $this->auth();
            $this->load->model('Companies_model', 'companies');
        }

        // Get Data
        public function index_get() {
            $id = $this->get('id');
            // jika id tidak ada id 
            if($id === null) {
                // maka panggil semua data
                $companies = $this->companies->getCompanies();
            } else {
                 // tapi jika id di panggil maka hanya id tersebut yang akan muncul pada data tersebut
                $companies = $this->companies->getCompanies($id);
            }
            if($companies) {
                $this->response([
                    'status' => REST_Controller::HTTP_OK,
                    'data' => $companies
                ]); 
            } else {
                $this->response([
                    'status' => REST_Controller::HTTP_NO_CONTENT,
                    'message' => 'Data Tersebut Tidak Ada'
                ]);             
            }
        }

        // Delete data
        public function index_delete() 
        {
            $id = $this->delete('id');
            if($id === null) {
                $this->response([
                    'status' => REST_Controller::HTTP_BAD_REQUEST,
                    'message' => 'Permintaan Tidak Valid'
                ]); 
            } else {
                if($this->companies->deleteCompanies($id) > 0) {
                    $this->response([
                        'status' => REST_Controller::HTTP_OK,
                        'id' => $id,
                        'message' => 'Data Berhasil Di Hapus'
                    ]);
                } else {
                    $this->response([
                        'status' => REST_Controller::HTTP_NO_CONTENT,
                        'message' => 'Data Tersebut Tidak Ada'
                    ]);                 
                }
            }
        }

        // post data
        public function index_post() {
            $data = [
                'nama_iuphhk'       => $this->post('nama_iuphhk'),
                'sk_izin'           => $this->post('sk_izin'),
                'tanggal_sk'        => $this->post('tanggal_sk'),
                'alamat_kantor'     => $this->post('alamat_kantor'),
                'telepon_kantor'    => $this->post('telepon_kantor'),
                'pic'               => $this->post('pic'),
                'telepon_pic'       => $this->post('telepon_pic'),
            ];
            if($data ['nama_iuphhk'] === null) {
                $this->response([
                    'status' => REST_Controller::HTTP_BAD_REQUEST,
                    'message' => 'Permintaan Tidak Valid'
                ]); 
            } else {
                if ($this->companies->createCompanies($data) > 0) {
                    $this->response([
                        'status' => REST_Controller::HTTP_CREATED,
                        'message' => 'Data Perusahaan Berhasil Dibuat'
                    ]);
                } 
            }
        }        

        // update data
        public function index_put() {
            $id = $this->put('id');
            $data = [
                'id'                => $this->put('id'),
                'nama_iuphhk'       => $this->put('nama_iuphhk'),
                'sk_izin'           => $this->put('sk_izin'),
                'tanggal_sk'        => $this->put('tanggal_sk'),
                'alamat_kantor'     => $this->put('alamat_kantor'),
                'telepon_kantor'    => $this->put('telepon_kantor'),
                'pic'               => $this->put('pic'),
                'telepon_pic'       => $this->put('telepon_pic'),
            ];
            if($data ['id'] === null) {
                $this->response([
                    'status' => REST_Controller::HTTP_BAD_REQUEST,
                    'message' => 'Permintaan Tidak Valid'
                ]); 
            } else {
                if ($this->companies->updateCompanies($data, $id) > 0) {
                    $this->response([
                        'status' => REST_Controller::HTTP_OK,
                        'id' => $id,
                        'message' => 'Data Perusahaan IUPHHK telah diupdate'
                    ]);
                } else {
                    $this->response([
                        'status' => REST_Controller::HTTP_NO_CONTENT,
                        'message' => 'Data Tersebut Tidak Ada'
                    ]);
                }
            }
        }
    }
?>