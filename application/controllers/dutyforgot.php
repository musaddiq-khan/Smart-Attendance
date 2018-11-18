<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dutyforgot extends CI_Controller {

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
        no_cache();
        $this->load->model('home_db');
		$this->load->model('master_db');
     }
    
    
    public function forgotpass()
    {
    	$this->data['header']=$this->load->view('header', NULL , TRUE);
    	$this->data['left']=$this->load->view('left', $this->data , TRUE);
    	if($this->input->post('emailid')!='')
    	{
    		$db=$this->input->post('emailid');
    		$em=$this->home_db->getemailId($db);
    		if($em=="1") // login check
    		{
    			$newpass=$this->home_db->updatepassword($db);
				$settings = $this->master_db->getRecords("settings",array());
    			$res = $this->mail_duty_to_prof($settings,$db,$newpass);
				if($res){
					$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>Your New Password has been mailed to your email Id</div>');
					redirect('dutyforgot/forgot');
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>Failed..!! Check Internet Connection..</div>');
					redirect('dutyforgot/forgot');
				}
    		}    			
    		else 
    		{   
    			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>Invalid Email ID!!! Please Contact Your Administrator.</div>');
    			redirect('dutyforgot/forgot');
    		}				
				
    		}
    		else
    		{    			///echo "bbbb";
    		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>Invalid Email ID</div>');
    			redirect('dutyforgot/forgot');
    			
    		}
    	
    
    }
    
    public function forgot()
    {
    	
    	//$this->session->set_flashdatas('message','no message');
    	$this->load->view('forgot');    
    }


	function mail_duty_to_prof($settings,$to,$newpass){


		require_once "Mail/Mail.php";

		$from = $settings[0]->from_email;

		$subject = "Your Room Supervision Allocation System Account Password";
		$body = $body='Hi, <br><br>Your Room Supervision Allocation System Account Details are below: <br><br><strong>User Name</strong> : '.$to.'<br><strong>Password</strong> : '.$newpass.' <br><br><a href="'.base_url().'">Click Here</a> to Login.';
		$pass = $settings[0]->email_password;

		$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject,
			'MIME-Version' => 1,
			'Content-type' => 'text/html;charset=iso-8859-1'
		);

		$smtp = @Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => $from,
			'password' => $pass
		));

		$mail = @$smtp->send($to, $headers, $body);

		if (@PEAR::isError($mail)) {
			return ('<p>' . $mail->getMessage() . '</p>');
		} else {
			return 1;
		}
	}
    
}

/* End of file blueadmin.php */
/* Location: ./application/controllers/blueadmin.php */