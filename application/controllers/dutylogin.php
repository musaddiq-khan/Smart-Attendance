<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dutylogin extends CI_Controller {

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
        $this->load->library('session');
        no_cache();
        //echo sha1("f4ccd3fa146ff39c27e0bd2664a5077fd105783");
        $this->load->model('home_db');
        $this->data['header']=$this->load->view('header', NULL , TRUE);
        $this->data['left']=$this->load->view('left', $this->data , TRUE); 
        if($_SERVER['REQUEST_METHOD']==='POST' && $this->input->post('username')!='')
        {
            $db['username']=$this->input->post('username');
            $db['password']=sha1($this->input->post('password'));
            if($this->home_db->getlogin($db)) // login check
            {
                $this->session->set_userdata('BMSAdmin', $db['username']);
                
                $cookie = array(
                   'name'   => 'CBMSAdmin',
                   'value'  => $db['username'],
                   'expire' => 3600*24*7,
                   'domain' => '.ivarustech.com',
                   'path'   => '/',
                   'prefix' => 'bl_',
               );
 
				set_cookie($cookie); 
                $this->data['email']=$this->session->userdata('BMSAdmin');
            }
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                Invalid Credentials
                            </div>');    
               redirect('dutylogin');
            }                    
        }
        $cookies=get_cookie('bl_CBMSAdmin');
        if(!$this->session->userdata('BMSAdmin') && $cookies=="")
        {    
            $this->load->view('login',$this->data);
        }
    }
    
    public function index()
    {
    $cookies=get_cookie('bl_CBMSAdmin');
        if($this->session->userdata('BMSAdmin') || $cookies!="")
        {
            redirect('dutyadmin');
        }

    }    
    

    
   
    
}

/* End of file groclogin.php */
/* Location: ./application/controllers/hmAdmin.php */