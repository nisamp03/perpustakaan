<?php
    class Companies_model extends CI_model {
        
        public function getCompanies($id = null) {
            if($id === null) {
                return $this->db->get('tbl_iuphhk')->result_array(); 
            } else {
                return $this->db->get_where('tbl_iuphhk', ['id' => $id])->result_array();

            }
        }

        public function deleteCompanies($id) {
            $this->db->delete('tbl_iuphhk', ['id' => $id]);
            return $this->db->affected_rows();
        }

        public function createCompanies($data) {
            $this->db->insert('tbl_iuphhk', $data);
            return $this->db->affected_rows();
        } 

        public function updateCompanies($data, $id) {
            $this->db->update('tbl_iuphhk', $data, ['id' => $id]);
            return $this->db->affected_rows();
        }
    }
?>