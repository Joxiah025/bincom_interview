<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polling_model extends CI_Model {

	//polling units
    public function get_polling_units()
    {
        $query = $this->db->get_where('polling_unit', array('polling_unit_number !=' => ''));
        return $query->result();
    }
    public function get_polling_unit_Result($poll_unit_id)
    {
        $query = $this->db->get_where('announced_pu_results', array('polling_unit_uniqueid' => $poll_unit_id));
        return $query->result();
    }

    //local government
    public function get_lga()
    {
        $query = $this->db->get_where('lga', array('state_id' => 25));
        return $query->result();
    }
    public function get_lga_Result($lg_id)
    {
        $lg = $this->db->get_where('polling_unit', array('lga_id' => $lg_id));
        $data = array();
        foreach($lg->result() as $rows){
            $this->db->where('polling_unit_uniqueid',$rows->uniqueid);
            $this->db->select_sum('party_score');
            $poll = $this->db->get('announced_pu_results');
            $res = $poll->row();
            array_push($data, [
                'polling_unit' => $rows->polling_unit_name, 'score' => $res->party_score
            ]);
        }
        return $data;
    }

    //adding results for parties

    public function get_pol_parties()
    {
        $query = $this->db->get('party');
        return $query->result();
    }
    public function add_party_Result($data)
    {
        $query = $this->db->insert('announced_pu_results',$data);
        return TRUE;
    }
}
