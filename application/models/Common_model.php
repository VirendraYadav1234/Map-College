<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model
{
  // set country id
  public function setStateID($stateID) {
    return $this->_stateID = $stateID;
}
// get state method
// get city method
public function getCity() {
    $this->db->select(array('c.id as city_id', 'c.name as city_name', 'c.state_id'));
    $this->db->from('cities as c');
    $this->db->where('c.state_id',$this->_stateID);
    $this->db->where('c.status',1);
    $query = $this->db->get();
    return $query->result_array();
}

public function collegelist_by_cid_sid_cityid($collegetypeid,$state_id,$city_id){
    $this->db->select(array('clg_name','category_id','id as college_id'));
    $this->db->from('college');
    $this->db->where('category_id',$collegetypeid);
    $this->db->where('state_id',$state_id);
    $this->db->where('city_id',$city_id);
    $query = $this->db->get();
    return $query->result_array();
}
public function collegedetails_byid($college_id){
        $this->db->select('college.*,college_details.*');
        $this->db->from('college');
        $this->db->join('college_details', 'college.id = college_details.clg_id'); 
        $this->db->where('college.id',$college_id);
        $query = $this->db->get();
        return $query->row();
}
public function collegelist_byid($collegetypeid){
    $this->db->select(array('clg_name','category_id','id as college_id'));
    $this->db->from('college');
    $this->db->where('category_id',$collegetypeid);
    $query = $this->db->get();
    return $query->result_array();
}

public function get_college_iframe($college_id){
    $this->db->select(array('iframe'));
    $this->db->from('college');
    $this->db->where('id',$college_id);
    $query = $this->db->get();
    return $query->result_array();
}

public function getiframe() {
    $this->db->select(array('s.id', 's.name', 's.iframe'));
    $this->db->from('states as s');
    $this->db->where('s.id',$this->_stateID);
    $query = $this->db->get();
    return $query->result_array();
}
 	function getAlData($tableName, $where_data=array(), $where_in = array(), $like = array()){
        try{
			if (isset($tableName) && isset($where_data)) {
				
				$this->db->trans_start();
				if(!empty($where_data)){
					$this->db->where($where_data);
				}
				if(!empty($where_in)){
					$this->db->where_in($where_in['field'],$where_in['in_array']);
				}
				if(!empty($like)){
					$this->db->like($like['field'], $like['keyword']);
				}
				$query = $this->db->get($tableName);
                               
				$this->db->trans_complete();
				if ($query->num_rows() > 0){
					$rows = $query->result();
					return $rows;
				}else{
					return false;
				} 
			}else{
				return false;
			}
		} catch (Exception $e){
			return false;
		}
	}  
 



}