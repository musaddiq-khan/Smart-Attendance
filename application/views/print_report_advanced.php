<?php

function getEndTime($time,$hrs){


    $date = new DateTime($time);
    $date->add(new DateInterval("PT{$hrs}H"));
    return $date->format('h:i A');


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Report</title>
    <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>


    <style>
        *{
            font-family: monospace;
            text-transform: uppercase;
            /*letter-spacing: 0.5px;*/
            background:#FFFFFF;

        }



        .table{
            width: 100%;
            background:#FFFFFF;
            line-height: 30px;
        }

        table{
            table-layout: fixed;
        }

        td{
            width: 30%;
            text-align: left;
            white-space: -o-nowrap;
            word-wrap: normal;
            white-space: nowrap;
            white-space: -moz-nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media screen
        {
            .main{
                text-align: center;
                margin: auto 15%;
                overflow: hidden;
            }
            table{
                table-layout: fixed;
            }
            td{
                width: 30%;
                text-align: left;
                white-space: -o-nowrap;
                word-wrap: normal;
                white-space: nowrap;
                white-space: -moz-nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media print
        {
            .main{
                text-align: center;
                margin: auto 1%;
                overflow: hidden;
            }
            td{
                width: 30%;
                text-align: left;
                white-space: -o-nowrap;
                word-wrap: normal;
                white-space: nowrap;
                white-space: -moz-nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            table{
                table-layout: fixed;
            }
        }

        @media print {
            .main {
                page-break-inside: avoid;

            }
        }

        .table {
            border-collapse: collapse;
        }

        .table, th, td {
            border-left: 1px dashed black;
            border-right: 1px dashed black;
        }

        #tb th,#tb td{
            border-bottom: 1px dashed black;
        }

        *{
            font-weight: bolder;
        }




    </style>
</head>
<body>
<div class="no_report">
    <?php
    if(is_array($report) && count($report)>=1){
        $abbr=array("RS"=>"Room Superintendent","RLS"=>"Relieving Superintendent","DS"=>"Deputy Superintendent");
        $match = array("1"=>array("m3"=>$report[0]->m3start_time,"m4"=>$report[0]->m4start_time,"a3"=>$report[0]->a3start_time,"a4"=>$report[0]->a4start_time),
            "2"=> array("m3"=>$report[0]->m3start_time),
            "3"=> array("m4"=>$report[0]->m4start_time),
            "4"=> array("a3"=>$report[0]->a3start_time),
            "5"=> array("a4"=>$report[0]->a4start_time),
            "6"=> array("m3"=>$report[0]->m3start_time,"m4"=>$report[0]->m4start_time),
            "7"=> array("a3"=>$report[0]->a3start_time,"a4"=>$report[0]->a4start_time));
        foreach($match[$session] as $key=>$value){

            foreach($abbr as $abbr_key=>$loop){
                $rand = "rand".rand();
                $br = -1;
                $rs_count=1;
                $count_prof=array();


                while($br!=0){


                    ?>
                    <div class="main" style="background:#FFFFFF;" id="<?php echo $rand;?>">

                        <div class="header" >
                            <h4>B.M.S College of Engineering, Bangalore - 560019<br>
                                <?php echo $loop;?> List For Theory Examination <?php echo $exam_id?> On <?php echo $ex_date; ?> At <?php echo $value;?></h4>
                        </div>
                        <div class="name" style="float: left">
                            <span style="float: left;">Date : </span>
                            <span style="float: left"> <?php echo $ex_date; ?></span>
                            <br>
                            <span style="float: left;">Time : </span>
                            <span style="float: left"> <?php echo $value;?></span>
                        </div>
                        <div class="Dept" style="float: right">
                            <span style="float: left;">Duty Designation :</span>
                            <span style="float: left"><?php echo $loop;?></span>
                        </div><br><br><br>
                        <span style="white-space: pre !important;;">-------------------------------------------------------------------------------------------------------------------------------</span>
                        <table class="table">

                            <tr>
                                <td style="width: 10%;text-align: center;"><label>SL #</label></td>
                                <td style="width: 30%;text-align: center;"><label>Name</label></td>
                                <td style="width: 12%;text-align: center;"><label>Department</label></td>
                                <td style="width: 17%;text-align: center;"><label>Designation</label></td>
                                <td style="width: 17%;text-align: center;"><label>Mobile Number</label></td>
                                <td style="width: 19.6%;text-align: center;"><label>Signature</label></td>
                            </tr>

                        </table>
                        <span style="white-space: pre !important;;">-------------------------------------------------------------------------------------------------------------------------------</span>


                        <table class="table" id="tb">
                            <tbody rand="<?php echo $rand;?>" class="tbody">

                            <?php
                            $all_count=0;
                            foreach($report as $rkey=>$rp){
                                $pos_key = $key."_designation";
                                if($rp->$key == 1 && $rp->$pos_key == $abbr_key){
                                    $all_count++;
                                    if($rs_count %23 != 0 && !(in_array($rp->prof_name,$count_prof))){

                                        ?>
                                        <tr>
                                            <td style="width: 10%;text-align: center;"><label><?php echo count($count_prof)+1;?></label></td>
                                            <td style="width: 30%;text-align: left;"><label style="margin-left: 30px;"><?php echo $rp->prof_name;?></label></td>
                                            <td style="width: 12%;text-align: left"><label style="margin-left: 19px;"><?php echo $rp->dept_name;?></label></td>
                                            <td style="width: 17%;text-align: left"><label style="margin-left: 15px;"><?php echo $rp->desig_name;?></label></td>
                                            <td style="width: 17%;text-align: left"><label style="margin-left: 15px;"><?php echo $rp->phone;?></label></td>
                                            <td style="width: 19.6%"><label></label></td>
                                        </tr>
                                        <?php $rs_count++; $count_prof[]=$rp->prof_name;}}}?>

                            </tbody>
                        </table>





                        <br><br> <br><br>

                        <div style="float: right;">
                    <span>
                        Signature
                    </span>
                        </div><br>
                        <hr>

                    </div>



                    <?php $rs_count+=1; if(count($count_prof) == $all_count){
                        $br=0;

                    }}}}}?>
</div>




<script src="<?php echo asset_url();?>js/spiner.js"></script>
<script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>

<script>
    $( document ).ready(function() {
        $(".tbody").each(function(){
            if($(this).html().trim() == ""){
                $("#"+$(this).attr("rand")).remove();
            }
        });
        if($(".no_report").html().trim() == ""){
            $(".no_report").html("<span style='color: red;'> No Reports To Display</span>");
        }

    });
</script>






</body>
</html>