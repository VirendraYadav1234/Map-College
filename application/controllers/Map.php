<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Map extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		        // Set a same-site cookie for first-party contexts
		// header('Set-Cookie: cookie1=value1; SameSite=Lax', false);
		// Set a cross-site cookie for third-party contexts
		// header('Set-Cookie: cookie2=value2; SameSite=None; Secure', false);
		$this->load->model('common_model');
		
    }

	public function index()
	{

	    $city = $this->input->post('city');
	   $data['lat_long'] =  $this->common_model->getAlData('map',array('city_id'=>$city));
	   //print_r($data['lat_long']);die;
	    $state_id = $this->input->post('id');
	    $data['iframe'] =  $this->common_model->getAlData('states',array('id'=>1));
       $data['states'] =  $this->common_model->getAlData('states',array('country_id'=>101,'status'=>1));
       $data['college_type'] =  $this->common_model->getAlData('category',array('status'=>1));
	   $this->load->view('index',$data);
	}
	// get city names
	
	function collegedetails(){
	    $college_id = $this->input->post('college_id');
	    $data= $this->common_model->collegedetails_byid($college_id);
	    echo json_encode($data);
	   
	    
	}
	function collegelist(){
	   $collegetypeid= $this->input->post('collegetypeid');
	   $state_id= $this->input->post('state_id');
	   $city_id= $this->input->post('city_id');
	   
	  if(!empty($state_id) && !empty($city_id)){
	    $data= $this->common_model->collegelist_by_cid_sid_cityid($collegetypeid,$state_id,$city_id);  

	  }else{
	    $data= $this->common_model->collegelist_byid($collegetypeid);  
	    
	  } 
	  
	  echo "<table id='college_tab'><tr><th>College Name</th><th>College Details</th></tr>";
	 foreach($data as $da){
	     echo "<tr><td class='sethand' onclick='get_col_iframe(".$da["college_id"].")'>".$da['clg_name']."</td><td><span class='text-success details' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='collegedetails(".$da["college_id"].")'>Veiw Details</span></td></tr>";
	 }
	 echo "</table>";
	}
function getcities()

	{
		$json = array();
	 $sid=	$this->common_model->setStateID($this->input->post('stateID'));
		$json = $this->common_model->getCity();
		echo json_encode($json);
	}
function getiframe()
	{

	if (!empty($_POST['state_id'])) {
			$where = array('id' => $_POST['state_id']);
			$map = $this->common_model->getAlData('states', $where);
			if (!empty($map)) {
				$res['iframe']     =  $map[0]->iframe;
				$res['status']       =  true;
			} else {
				$res['status']       =  false;
			}
			echo json_encode($res);
		}

	}
	
function city_getiframe(){
      	if (!empty($_POST['city_id'])) {
			$where = array('id' => $_POST['city_id']);
			$map = $this->common_model->getAlData('cities', $where);
			if (!empty($map)) {
				$res['iframe']     =  $map[0]->iframe;
				$res['status']       =  true;
			} else {
				$res['status']       =  false;
			}
			echo json_encode($res);
		}
}	

function get_col_iframe(){
      $json = array();
	 
		$res= $this->common_model->get_college_iframe($_POST['id']);
		echo json_encode($res[0]);
}	
	

}



