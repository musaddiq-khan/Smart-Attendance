<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dutyadmin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/pthome
     *    - or -  
     *         http://example.com/index.php/blueadmin/index
     *    - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/pthome
     <method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
     
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
        $this->load->helper('cookie');
        no_cache();

        $this->load->model('master_db');
		$this->load->model('home_db');
        $this->load->model('insert_model');
        $this->data['detail'] = '';
		$cookie=get_cookie('bl_CBMSAdmin')  ;
        
        if(!$this->session->userdata('BMSAdmin') && $cookie=="")
        {    
            redirect('dutylogin','refresh');
        }
        else
        {
        if($this->session->userdata('BMSAdmin')){
            $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
        }
        else if($cookie!=""){
        $det=$this->home_db->getdetails($cookie);
        }
            $this->data['detail']=$det;
        }   
		//echo "dsafdsfsdafdfas".$this->data['detail'];

		$this->data['header']=$this->load->view('header', NULL , TRUE);
		$this->data['left']=$this->load->view('left', $this->data , TRUE);
        $this->data['adminleft']=$this->load->view('adminleft', $this->data , TRUE);
		$this->data['jsfile']=$this->load->view('jsfile', NULL , TRUE);
		$this->load->model('insert_model');


    }


    public function csv_upload(){
        if($_FILES['csv']['error'] == 0) {
            $name = $_FILES['csv']['name'];
            $arr = explode('.', $_FILES['csv']['name']);
            $ext = strtolower(end($arr));
            $type = $_FILES['csv']['type'];
            $tmpName = $_FILES['csv']['tmp_name'];
            $success = true;
            if ($ext === 'csv') {
                if (($handle = fopen($tmpName, 'r')) !== FALSE) {
                    set_time_limit(0);
                    $row = 0;

                    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        if($row!=0){
                            $res = $this->master_db->insertRecord("student",array("name"=>$data[0],"sem"=>$data[1],"elect1"=>$data[2],"elect2"=>$data[3],"elect3"=>$data[4],));
                            if(!$res){
                                $success = false;
                            }
                        }
                        $row++;
                    }
                    fclose($handle);
                } else {
                    $success = false;
                }
            } else {
                $success= false;
            }
        } else{
            $success=false;
        }
        if(!$success){
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Fail...!!!</div>');
            redirect(base_url()."dutyadmin/index");
        } else{
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Success...!!!</div>');
            redirect(base_url()."dutyadmin/index");
        }

    }

    public function index()
    {

//		$this->data['RS'] = $this->master_db->getRecords("prof", array("designation !=" => 2, "designation != " => 3, "status" => 1));
//		$this->data['RLS']  = $this->master_db->getRecords("prof", array("designation" => 2, "status" => 1));
//		$this->data['DS'] =  $this->master_db->getRecords("prof", array("designation" => 3, "status" => 1));

		$this->data['RS'] = array();
		$this->data['RLS']  = array();
		$this->data['DS'] =  array();

        $cookies=get_cookie('bl_CBMSAdmin');
        if ($this->session->userdata('BMSAdmin')) {
            $det = $this->home_db->getdetails($this->session->userdata('BMSAdmin'));
            if ($det[0]->login_type == "AD") {
                $this->load->view('adminlogin', $this->data);
            } else {
                $this->load->view('home', $this->data);
            }

        }

    }
    public function course_disp()
    {
        $sql="SELECT * FROM fifth_sem";
        $res=$this->master_db->execSQL($sql);
        if(is_array($res) && count($res)>=1)
        {
            $this->data["data"]=$res;
        }
        else
        {
            $this->data["data"]=array();
        }
        $this->load->view("fifth_view",$this->data);
    }


    public function add_sub()
    {
        $data_sub=array(
            'course_code'=>$this->input->post('code'),
        'course_name'=>$this->input->post('cname'),
        'category'=>$this->input->post('cat')
        );
        $this->insert_model->form_insert($data_sub);


    }
   public function add_course()
    {
        $this->load->view('add_course',$this->data);
    }
    public function sheets()
    {
        $this->data["sem"] = 5;
        $this->data["select"] = $this->input->get("select");
        $this->load->view('attendance',$this->data);
    }



    public function logout()
    {
    	$this->updatelogin();
        $this->session->unset_userdata('BMSAdmin');
         
	    $cookie = array(
                   'name'   => 'CBMSAdmin',
                   'value'  => '',
                   'expire' => '0',
                   'domain' => '.ivarustech.com',
                   'path'   => '/',
                   'prefix' => 'bl_',
               );
		delete_cookie($cookie);
        redirect(base_url());

    }
    
    
    public function updatelogin(){
    	$cookie=$this->data['detail'];
    	if(!empty($cookie))
    	{
    		$id=$cookie[0]->id;
    		$last_login=$cookie[0]->last_login;
    		$db = array(
    				'logout_time'   => date('Y-m-d H:i:s')
    		);
    		$this->home_db->updatelogin($db,$id,$last_login);
    	}
    }
	
	//My profile

	public function myprofile()

	{
		$cookie=$this->data['detail'];
		if(!empty($cookie))
		{				
			$this->data['details']=$cookie;	
	    	$this->load->view('myprofile',$this->data);
		}
		else{
			redirect(base_url());
		}
	}

		

	public function myprofile_edit_save()

	{
		$cookie=$this->data['detail'];
		if(!empty($cookie))
		{
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
			$id=$cookie[0]->id;
			$img = $cookie[0]->profile_img;
			$option=$this->input->post('optionsRadios');
	
			if($option==1)
	
	    		{
	    			
	    			$image=$_FILES['imag']['name'];
					$image = str_replace(" ","_",$image);
					$image = str_replace(" ","_",$image);
					$image = str_replace("  ","_",$image);
					$ext = explode(".", $image);
					
					$name='p'.$ext[0].time().'.'.$ext[1];
	
	    			$file="assets/profile_images/".$name;
	
	    			$config['upload_path'] = 'assets/profile_images/';
	
	    			$config['allowed_types'] = 'gif|jpg|png|ico|jpeg';
	
	    			$config['file_name']=$name;
	
	    			$this->load->library('upload', $config);
	    			
	    			if($this->upload->do_upload('imag'))
					{
						if(!empty($img)){
							unlink(''.$img);
						}
	    				$db=array(
							'name'=>trim(preg_replace('!\s+!', ' ',$this->input->post('name'))),
	    					'email'=>trim(preg_replace('!\s+!', ' ',$this->input->post('email'))),
	    					'contact'=>trim(preg_replace('!\s+!', ' ',$this->input->post('contact'))),
	    					'profile_img'=>$file,
							'modified_date'=>date('Y-m-d H:i:s')	
	    				);	
	    				$this->home_db->resizeImage($file,50, 50);
	    			}
	    			else	    			
	    			{	    			
	    				$db=array(
	    						'name'=>trim(preg_replace('!\s+!', ' ',$this->input->post('name'))),
	    						'email'=>trim(preg_replace('!\s+!', ' ',$this->input->post('email'))),
	    						'contact'=>trim(preg_replace('!\s+!', ' ',$this->input->post('contact'))),
	    						'modified_date'=>date('Y-m-d H:i:s')
	    				);	    			
	    			}	
	    		}	
	    		else	
	    		{	
	    			$db=array(
	    						'name'=>trim(preg_replace('!\s+!', ' ',$this->input->post('name'))),
	    						'email'=>trim(preg_replace('!\s+!', ' ',$this->input->post('email'))),
	    						'contact'=>trim(preg_replace('!\s+!', ' ',$this->input->post('contact'))),
	    						'modified_date'=>date('Y-m-d H:i:s')
	    				);	 
	    		}
	
	    		$res=$this->home_db->profile_edit_save($db,$id);
	    		$det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
	    		$this->data['detail'] = $det;
	    		if($res)	
	    		{	
	    			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Updated Successfully</div>');
        			redirect('dutyadmin/myprofile');
	    		}	
	    		else	
	    		{	
	    			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Updation not Successfull</div>');
        			redirect('dutyadmin/myprofile');
	    		}
		}
		}

	}	

	
	public function check_password(){
	if($_SERVER['REQUEST_METHOD']=='GET'){
    		$oldpass = $this->input->get('oldpass');
    		$det = $this->data['detail'];
    		$id = $det[0]->passwrd;
    		if(strcmp(sha1($oldpass),$id) == 0){   
    			echo 1;
    		}
    		else{
    			echo 0;
    		}
    		//echo $this->account_db->check_password(sha1($oldpass),$id);
    	}
    	else{
    		echo 0;
    	}
	}
	

	public function changepass()
	{

		$cookie=$this->data['detail'];
		if(!empty($cookie))
		{		
			
			$this->data['details']=$cookie;
	
	    	$this->load->view('changepass',$this->data);
		}
		else{
			redirect(base_url());
		}
	}
	public function course_box()
    {
        $this->load->view('course_box',$this->data);
    }
		

	public function edit_changepass()
	{
		if($_SERVER['REQUEST_METHOD']=='POST'){
    		$new_pass=$this->input->post('new_pass');
    		$old_pass=$this->input->post('old_pass');
    		
    		$det = $this->data['detail'];
    		$pid = $det[0]->passwrd;
    		$id = $det[0]->id;
    		
    		if(strcmp(sha1($old_pass),$pid) == 0){
    			if(!empty($new_pass)){
	    			$db = array(
	    					'passwrd'=>sha1($new_pass),
	    					'modified_date'=>date('Y-m-d H:i:s')
	    			);
	    			$this->home_db->profile_edit_save($db,$id);
	    			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Password has been changed successfully.</div>');
	    			redirect("dutyadmin/changepass");
    			}
    			else{
    				$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Enter required details.</div>');
    				redirect("dutyadmin/changepass");
    			}
    		}
    		else{
    			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Invalid Old Password.</div>');
    			redirect("dutyadmin/changepass");
    		}
    	}
    	else{
    		redirect(base_url());
    	}	

	}



    



	
}

/* End of file hmAdmin.php */
/* Location: ./application/controllers/hmAdmin.php */