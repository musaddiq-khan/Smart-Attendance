<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
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


    }

    function duty_SMS()
    {
        $phone = array();
        $sms = array();

        $all_db = $this->master_db->getRecords("exam_id", array(), " exam_id ");
        if(is_array($all_db) && count($all_db)>=1){
            foreach($all_db as $db){
                $exam_date = $this->master_db->getRecords("time_table_{$db->exam_id}", array("db_date" => date("Y/m/d"), "sms" => 0), "db_date ");
                $msg_text = $this->master_db->getRecords("settings", array(), "msg_text");
                if (is_array($msg_text))
                    $msg_text = preg_replace("/\s|&nbsp;/", ' ', strip_tags($msg_text[0]->msg_text));
                $date = date('Y/m/d');

                if (is_array($exam_date) && count($exam_date) >= 1) {
                    ignore_user_abort(True);
                    set_time_limit(0);
                    $to_be_sent = "SELECT DISTINCT (
					a.prof_id
					) AS pid, p.email
					FROM assigned_duties_{$db->exam_id} a,prof_{$db->exam_id} p
					WHERE a.prof_id=p.id AND a.db_date='{$date}' ORDER BY p.dept";
                    $time_data = $this->master_db->execSQL($to_be_sent);

                    if (is_array($time_data) && count($time_data) >= 1) {
                        foreach ($time_data as $time) {
                            $sql = "SELECT a.exam_id, b.email, b.phone, a.date, e.m3start_time, e.m4start_time, e.a3start_time, e.a4start_time,a.m3, a.m4, a.a3, a.a4, a.m3_designation, a.m4_designation, a.a3_designation, a.a4_designation, b.name AS prof_name, c.name AS desig_name, d.name AS dept_name
				FROM assigned_duties_{$db->exam_id} a, prof_{$db->exam_id} b, designation c, dept d, time_table_{$db->exam_id} e
				WHERE a.prof_id = b.id
				AND b.designation = c.id
				AND b.dept = d.id
				AND a.exam_id = e.exam_id
				AND a.date = e.date
				AND a.db_date = '{$date}'
				AND a.prof_id = {$time->pid} ";

                            $d = $this->master_db->execSQL($sql);
                            if (is_array($d) && count($d) >= 1) {
                                foreach ($d as $d_val) {
                                    $msg_to_send = $this->attachVariable($msg_text, $d_val);
                                    $phone[] = $d_val->phone;
                                    $sms[] = $msg_to_send;
                                }

                            }
                        }
                    }


            }
        }


            if(count($phone)==0){
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button>No Exam Today <b>Or</b> SMS Already Sent..!!</div>');
            } else {
                $res = $this->sendWay2SMS($phone, $sms);
                if ($res == 1) {

                    //$this->master_db->updateRecord("time_table", array("sms" => 1), $date, "db_date");
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button>SMS Sent..!!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button>Failed..!! Check SMS Password / Internet Connection</div>');
                }
            }


        }




        redirect("master/timetable");
//		echo "<pre>";
//		print_r($phone);
//		echo "</pre>";

//		echo "<pre>--------------------------------------------------------------------------------------------<br>";
//		print_r($sms);
//		echo "</pre>";
    }


    function attachVariable($to_be_attached, $value)
    {
        $m_start = "-";
        $a_start = "-";
        $m_hr = 0;
        $a_hr = 0;
        $m_end = "-";
        $a_end = "-";
        $m_desig = "-";
        $a_desig = "-";


        if ($value->m3 != 0) {
            $m_start = $this->getEndTime($value->m3start_time, 0);
            $m_hr = 3;
            $m_end = $this->getEndTime($m_start, $m_hr);
            $m_desig = $value->m3_designation;
        } else if ($value->m4 != 0) {
            $m_start = $this->getEndTime($value->m4start_time, 0);
            $m_hr = 4;
            $m_end = $this->getEndTime($m_start, $m_hr);
            $m_desig = $value->m4_designation;
        }

        if ($value->a3 != 0) {
            $a_start = $this->getEndTime($value->a3start_time, 0);
            $a_hr = 3;
            $a_end = $this->getEndTime($a_start, $a_hr);
            $a_desig = $value->a3_designation;
        } else if ($value->a4 != 0) {
            $a_start = $this->getEndTime($value->a4start_time, 0);
            $a_hr = 4;
            $a_end = $this->getEndTime($a_start, $a_hr);
            $a_desig = $value->a4_designation;
        }

        if ($value->m3 == 1 && $value->m4 == 1) {
            $m_start = "<span style='color: red'>ERROR</span>";
            $m_hr = "<span style='color: red'>ERROR</span>";
            $m_end = "<span style='color: red'>ERROR</span>";
            $m_desig = "<span style='color: red'>ERROR</span>";
            $a_start = "<span style='color: red'>ERROR</span>";
            $a_hr = "<span style='color: red'>ERROR</span>";
            $a_end = "<span style='color: red'>ERROR</span>";
            $a_desig = "<span style='color: red'>ERROR</span>";
        }

        if ($value->a3 == 1 && $value->a4 == 1) {
            $a_start = "<span style='color: red'>ERROR</span>";
            $a_hr = "<span style='color: red'>ERROR</span>";
            $a_end = "<span style='color: red'>ERROR</span>";
            $a_desig = "<span style='color: red'>ERROR</span>";
            $m_start = "<span style='color: red'>ERROR</span>";
            $m_hr = "<span style='color: red'>ERROR</span>";
            $m_end = "<span style='color: red'>ERROR</span>";
            $m_desig = "<span style='color: red'>ERROR</span>";
        }

        $tags = array("[EXAM_ID]",
            "[DATE]",
            "[M_START_TIME]",
            "[M_END_TIME]",
            "[A_END_TIME]",
            "[A_START_TIME]",
            "[M_DESIGNATION]",
            "[A_DESIGNATION]",
            "[PROF_EMAIL]",
            "[PROF_NAME]",
            "[PROF_DESIG]",
            "[PROF_DEPT]");
        $rep_tags = array($value->exam_id,
            $value->date,
            $m_start,
            $m_end,
            $a_end,
            $a_start,
            $m_desig,
            $a_desig,
            $value->email,
            $value->prof_name,
            $value->desig_name,
            $value->dept_name);

        return str_replace("- and", "", str_replace("and -", "", str_replace($tags, $rep_tags, $to_be_attached)));
    }

    function getEndTime($time, $hrs)
    {
        $date = new DateTime($time);
        $date->add(new DateInterval("PT{$hrs}H"));
        return $date->format('h:i A');
    }

    function sendWay2SMS($phone, $msg, $uid = "9449751831", $pwd = "8884040443")
    {
        $this->load->library('curl');
        $this->load->library('WAY2SMSClient', "sms");
        $client = new WAY2SMSClient();
        if ($client->login($uid, $pwd)) {
            if (is_array($phone) && is_array($msg) && count($phone) >= 1 && count($msg) >= 1 && count($phone) == count($msg)) {
                foreach ($phone as $key => $val) {
                    $client->send($val, $msg[$key]);
                    sleep(8);
                }
            }
            $client->logout();
            return 1;
        } else {
            return 0;
        }

    }




}
