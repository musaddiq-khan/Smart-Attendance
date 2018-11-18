<html lang="en" class=" -webkit-">
<head>
    <style id="stndz-style"></style>
    <meta charset="UTF-8">
    <title>Print Report</title>
    <script type="text/javascript"
            src="http://localhost/RoomSupervisionAllocationSystem/assets/js/jquery.min.js"></script>



    <style>
        * {
            font-family: monospace;
            text-transform: uppercase;
            /*letter-spacing: 0.5px;*/
            background: #FFFFFF;

        }

        .table {
            width: 100%;
            background: #FFFFFF;
            line-height: 30px;
        }

        table {
            table-layout: fixed;
        }

        td {
            width: 30%;
            text-align: left;
            white-space: -o-nowrap;
            word-wrap: normal;
            white-space: nowrap;
            white-space: -moz-nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media screen {
            .main {
                text-align: center;
                margin: auto 15%;
                overflow: hidden;
            }

            table {
                table-layout: fixed;
            }

            td {
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

        @media print {
            .main {
                text-align: center;
                margin: auto 1%;
                overflow: hidden;
            }

            td {
                width: 30%;
                text-align: left;
                white-space: -o-nowrap;
                word-wrap: normal;
                white-space: nowrap;
                white-space: -moz-nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            table {
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

        #tb th, #tb td {
            border-bottom: 1px dashed black;
        }

        * {
            font-weight: bolder;
        }


    </style>

</head>
<body>
<?php $fac_arr = array();
    $remu = array("RS" => $settings[0]->rs_remuneration, "RLS" => $settings[0]->rls_remuneration, "DS" => $settings[0]->ds_remuneration);
    if(is_array($fac_duty) && count($fac_duty)>=1) {


    foreach ($fac_duty as $val) {

        if (!array_key_exists($val->prof_id, $fac_arr)) {
            $rs_count = 0;
            $rls_count = 0;
            $ds_count = 0;
            $total = 0;
            if ($val->duty_desig == "RS") {
                $rs_count++;
            }
            if ($val->duty_desig == "RLS") {
                $rls_count++;
            }
            if ($val->duty_desig == "DS") {
                $ds_count++;
            }
            $total += $remu[$val->duty_desig];
            $fac_arr[$val->prof_id] = array($rs_count, $rls_count, $ds_count, $total, $val->p_name, $val->dept_name,$val->acc_num);

        } else {
            $rs_count = $fac_arr[$val->prof_id][0];
            $rls_count = $fac_arr[$val->prof_id][1];
            $ds_count = $fac_arr[$val->prof_id][2];
            $total = $fac_arr[$val->prof_id][3];
            if ($val->duty_desig == "RS") {
                $rs_count++;
            }
            if ($val->duty_desig == "RLS") {
                $rls_count++;
            }
            if ($val->duty_desig == "DS") {
                $ds_count++;
            }
            $total += $remu[$val->duty_desig];
            $fac_arr[$val->prof_id] = array($rs_count, $rls_count, $ds_count, $total, $val->p_name, $val->dept_name,$val->acc_num);
        }
    }
}?>

<?php if(is_array($fac_arr) && count($fac_arr)>=1) {
    $counter = 0;
    foreach($fac_arr as $key=>$val){
        if($counter % 23 == 0){ ?>
<div class="no_report">
    <div class="main" style="background:#FFFFFF;" id="rand12709">

        <div class="header">
            <h4>B.M.S College of Engineering, Bangalore - 560019<br>
                Faculty Remuneration List For Theory Examination <?php echo $ex_id?></h4>
        </div>

        <br>
        <span style="white-space: pre !important;;">-------------------------------------------------------------------------------------------------------------------------------</span>
        <table class="table">

            <tbody>
            <tr>
                <td style="width: 10%;text-align: center;"><label>SL #</label></td>
                <td style="width: 30%;text-align: center;"><label>Name</label></td>
                <td style="width: 32%;text-align: center;"><label>Account Number</label></td>
                <td style="width: 17%;text-align: center;"><label>Num. Duties</label></td>
                <td style="width: 10%;text-align: center;"><label>Amount</label></td>
            </tr>

            </tbody>
        </table>
        <span style="white-space: pre !important;;">-------------------------------------------------------------------------------------------------------------------------------</span>


        <table class="table" id="tb">
            <tbody rand="rand12709" class="tbody">
        <?php } ?>

        <tr>
            <td style="width: 10%;text-align: center;"><label><?php echo $counter+1;?></label></td>
            <td style="width: 30%;text-align: left;"><label style="margin-left: 30px;"><?php echo $val[4];?></label></td>
            <td style="width: 32%;text-align: center"><label><?php echo $val[6];?></label></td>
            <td style="width: 17%;text-align: center"><label><?php if($val[0] != 0) echo "[{$val[0]} x {$remu['RS']}]"; if($val[1] != 0) echo " [{$val[1]} x {$remu['RLS']}] "; if($val[2] != 0) echo "[{$val[2]} x {$remu['DS']}]";?></label></td>
            <td style="width: 10%;text-align: center"><label><?php echo $val[3];?></label></td>
        </tr>

        <?php $counter++; if($counter % 23 == 0 || count($fac_arr) == $counter){ ?>
            </tbody>
            </table>


            <br><br> <br><br>

            <div style="float: right;">
                    <span>
                        Signature
                    </span>
            </div>
            <br>
            <hr>

            </div>





            </div>
            <?php }?>

<?php
    }
}?>










<script src="http://localhost/RoomSupervisionAllocationSystem/assets/js/spiner.js"></script>
<script src="http://localhost/RoomSupervisionAllocationSystem/assets/js/loadingoverlay.js"></script>

<script>
    $(document).ready(function () {
        $(".tbody").each(function () {
            if ($(this).html().trim() == "") {
                $("#" + $(this).attr("rand")).remove();
            }
        });
        if ($(".no_report").html().trim() == "") {
            $(".no_report").html("<span style='color: red;'> No Reports To Display</span>");
        }

    });
</script>


</body>
</html>