<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_db extends CI_Model
{


    function runSQL($sql)
    {
        //echo $sql;
        $this->db->query($sql);

    }

    function execSQL($sql){
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0)

            return $q->result();

        else

            return null;
    }

    function updateRecord($table, $db, $id,$id_col="id")
    {
        $this->db->where($id_col, $id);
        $q = $this->db->update($table, $db);
        $total = $this->db->affected_rows();
        if ($total >= 1)
            return 1;
        else
            return 0;
    }

    function insertRecord($table, $db = array())

    {

        $q = $this->db->insert($table, $db);

        $total = $this->db->insert_id();

        if ($total > 0)

            return $total;

        else

            return 0;

    }

    function getRecords($table, $db = array(), $select = "*", $ordercol = '', $group = '', $start = '', $limit = '')
    {
        $this->db->select($select);
        if (!empty($ordercol)) {
            $this->db->order_by($ordercol);
        }
        if ($limit != '' && $start != '') {
            $this->db->limit($limit, $start);
        }
        if ($group != '') {
            $this->db->group_by($group);
        }
        $q = $this->db->get_where($table, $db);
        //echo $this->db->last_query();
        if ($q->num_rows() > 0)

            return $q->result();

        else

            return 0;
    }

    function changeStatus($table,$db=array())

    {

        $sql="update $table set status=".$db['status']." WHERE id IN ('".$db['items']."')";

        $q=$this->db->query($sql);

        $total = count(explode(",",$db['items']));

        $total = $this->db->affected_rows();

        header("Content-type: application/json");

        $json = "";

        $json .= "{";

        $json .= '"query": "'.$sql.'",';

        $json .= '"total": "'.$total.'"';

        $json .= "}";

        return $json;

    }

    function changePri($table,$db=array())

    {

        $sql="update $table set priority=".$db['status']." WHERE id IN ('".$db['items']."')";

        $q=$this->db->query($sql);

        $total = count(explode(",",$db['items']));

        $total = $this->db->affected_rows();

        header("Content-type: application/json");

        $json = "";

        $json .= "{";

        $json .= '"query": "'.$sql.'",';

        $json .= '"total": "'.$total.'"';

        $json .= "}";

        return $json;

    }

    function countRec($fname,$tname,$where)

    {

        $sql = "SELECT * FROM $tname $where";

        $q=$this->db->query($sql);

        return $q->num_rows();

    }

    function gettable_prof($db=array())
    {
        $table = "prof_{$db['ex_id']} p,designation d,dept dp";
        $page = $db['page'];

        $rp = $db['rp'];

        $sortname = $db['sortname'];

        $sortorder = $db['sortorder'];



        if($db['query']!=''){

            $where = ' WHERE  p.dept=dp.id and p.designation=d.id and '.$db['qtype'].' LIKE "%'.$db['query'].'%"';

        } else {

            $where =' where p.dept=dp.id and p.designation=d.id';

        }

        if($db['letter_pressed']!=''){

            $where = ' WHERE  p.dept=dp.id and p.designation=d.id and '.$db['qtype'].' LIKE "'.$db['letter_pressed'].'%"';

        }

        if($db['letter_pressed']=='#'){

            $where = ' WHERE p.dept=dp.id and p.designation=d.id and '.$db['qtype'].' REGEXP "[[:digit:]]" ';

        }


        if($sortorder != "" || $sortname != ""){
            $sort = "ORDER BY $sortname $sortorder";
        } else{
            $sort = "";
        }




        if (!$page) $page = 1;

        if (!$rp) $rp = 10;



        $start = (($page-1) * $rp);



        $limit = "LIMIT $start, $rp";



        $sql = "SELECT p.*,d.name as desig,dp.name as dept FROM  $table $where $sort $limit";

//        echo $sql;





        $result = $this->db->query($sql);

        $tempsql=" ".$table." ".$where." ".$sort." ".$limit;



        $total = $this->countRec('p.id',$table,$where);



        header("Content-type: application/json");



        $json = '';

        $json .= '{';

        $json .= '"page": '.$page.',';

        $json .= '"total": '.$total.',';

        $json .= '"rows": [';

        $rc = false;

        $counter123=1;



        foreach($result->result() as $row) {



            if($row->status=='1')

            {

                $status="<span class='btn btn-success btn-sm btn-grad'>Active</span>";

                $chng="<button class='btn btn-danger btn-sm btn-grad' onclick='changestatus(0,".$row->id.")'><i class='icon-remove'></i> Deactivate </button>";

            }

            else

            {

                $status="<span class='btn btn-danger btn-sm btn-grad'>In-Active</span>";

                $chng="<button class='btn btn-success btn-sm btn-grad' onclick='changestatus(1,".$row->id.")'><i class='icon-ok'></i> Activate </button>";

            }

            if($row->priority =='1') {
                $pri="<button class='btn btn-danger btn-sm btn-grad' onclick='changepri(0,".$row->id.")'><i class='icon-remove'></i> Remove Priority </button>";
            } else {
                $pri="<button class='btn btn-success btn-sm btn-grad' onclick='changepri(1,".$row->id.")'><i class='icon-ok'></i> Set Priority  </button>";
            }

            if($this->session->userdata('BMSAdmin')){
                $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
                if($det[0]->login_type != "US"){

                    $edit="<button class='btn btn-info btn-sm btn-grad' onclick='edit(".$row->id.")'><i class='icon-pencil icon-white'></i> Edit </button>";
                } else {
                    $edit = "";
                }
            }


            $finalquery=str_replace(" ","~",$tempsql);

            if ($rc) $json .= ',';

            $json .= '{';

            $json .= '"id":"'.$row->id.'","';



            $json .= 'cell":["'.$counter123.'","'.addslashes(str_replace("'","`",$row->usn)).'","'.addslashes(str_replace("'","`",$row->name)).'","'.addslashes(str_replace("'","`",$row->dept)).'","'.addslashes(str_replace("'","`",$row->desig)).'","'.addslashes(str_replace("'","`",$row->email)).'","'.addslashes(str_replace("'","`",$row->phone)).'"';

            if($this->session->userdata('BMSAdmin')){
                $det=$this->home_db->getdetails($this->session->userdata('BMSAdmin'));
                if($det[0]->login_type != "US"){
                    $json .= ',"'.$status.'","'.$pri.'","'.$chng.'  '.$edit.'"]';
                } else {
                    $json .= ',"'.$status.'"]';
                }
            }



            $json .= "}";

            $rc = true;


            $counter123++;

        }

        $json .= "]";

        $json .= "}";

        return $json;

    }

    function getstudent_table($db=array())
    {
        $table = "student";
        $page = $db['page'];

        $rp = $db['rp'];

        $sortname = $db['sortname'];

        $sortorder = $db['sortorder'];



        if($db['query']!=''){

            $where = ' WHERE  1 and '.$db['qtype'].' LIKE "%'.$db['query'].'%"';

        } else {

            $where =' where 1 ';

        }

        if($db['letter_pressed']!=''){

            $where = ' WHERE  1 and '.$db['qtype'].' LIKE "'.$db['letter_pressed'].'%"';

        }

        if($db['letter_pressed']=='#'){

            $where = ' WHERE 1 and '.$db['qtype'].' REGEXP "[[:digit:]]" ';

        }


        if($sortorder != "" || $sortname != ""){
            $sort = "ORDER BY $sortname $sortorder";
        } else{
            $sort = "";
        }

        $group_by = "";




        if (!$page) $page = 1;

        if (!$rp) $rp = 10;



        $start = (($page-1) * $rp);



        $limit = "LIMIT $start, $rp";



        $sql = "SELECT * FROM  $table $where $group_by $sort $limit";

//        echo $sql;





        $result = $this->db->query($sql);

        $tempsql=" ".$table." ".$where.$group_by." ".$sort." ".$limit;



        $total = $this->countRec('id',$table,$where.$group_by);



        header("Content-type: application/json");



        $json = '';

        $json .= '{';

        $json .= '"page": '.$page.',';

        $json .= '"total": '.$total.',';

        $json .= '"rows": [';

        $rc = false;

        $counter123=1;




        foreach($result->result() as $row) {
            $edit="<button class='btn btn-info btn-sm btn-grad' onclick='edit(`".$row->id."`)'><i class='icon-pencil icon-white'></i> Edit </button>";
            $finalquery=str_replace(" ","~",$tempsql);

            if ($rc) $json .= ',';

            $json .= '{';

            $json .= '"id":"'.$row->id.'","';



            $json .= 'cell":["'.$counter123.'","'.addslashes(str_replace("'","`",$row->name)).'"';

            $json .= ',"'.$edit." ".'"]';


            $json .= "}";

            $rc = true;


            $counter123++;

        }

        $json .= "]";

        $json .= "}";

        return $json;

    }
}
?>