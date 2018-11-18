<?php
if (!function_exists('getEndTime')) {
    function getEndTime($time, $hrs)
    {
        $date = new DateTime($time);
        $date->add(new DateInterval("PT{$hrs}H"));
        return $date->format('h:i A');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Print Report</title>
        <script type="text/javascript" src="<?php echo asset_url();?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url();?>js/html2canvas.js"></script>
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
            }

            @media screen
            {
                .main{
                    text-align: center;
                    margin: auto 16%;
                    overflow: hidden;
                }
            }



            .table {
                border-collapse: collapse;
            }

            .table, th, td {
                border-left: 1px dashed black;
                border-right: 1px dashed black;
            }






        </style>
    </head>
    <body>
    <div class="main error" style="color: red;">

    </div>

<!--    <div class="main" style="text-align: left;">-->
<!--        -->
<!--    </div>-->
            <?php if(is_array($report) && count($report)>=1){
                foreach($report as $counter=>$rep){

                ?>


            <div class="main <?php echo "img".$counter;?>" style="background:#FFFFFF;">
                <div class="header" style="border-bottom: 1px solid; margin-bottom: 10px;border-top: 1px solid;">
                    <?php echo $head_text;?>
                </div>
                <div class="name" style="float: left">
                    <span style="float: left;">Name : </span>
                    <span style="float: left"> <?php echo "&nbsp;".$rep[0]->prof_name;?></span>
                    <br>
                    <span style="float: left;">Designation : </span>
                    <span style="float: left"> <?php echo "&nbsp;".$rep[0]->desig_name;?></span>
                </div>
                <div class="Dept" style="float: right">
                    <span style="float: left;">Department :</span>
                    <span style="float: left"><?php echo "&nbsp;".$rep[0]->dept_name;?></span>
                </div><br><br><br>
                <span style="white-space: pre !important;;">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>
                <table class="table">
                    <tbody id="p">
                        <tr>
                            <td style="width: 9%"><label>SL #</label></td>
                            <td style="width: 13%"><label>Date</label></td>
                            <td style="width: 13%"><label>M Reporting Time</label></td>

                            <td style="width: 13%"><label>M desig.</label></td>
                            <td style="width: 13%"><label>A Reporting Time</label></td>

                            <td style="width: 13%"><label>A desig.</label></td>
                        </tr>
                    </tbody>
                </table>
                <span style="white-space: pre !important;;">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>


                    <table class="table">
                        <tbody id="p">


                             <?php foreach($rep as $key=>$value){?>
                                 <tr style="line-height: 20px;">

                             <?php
                                 $m_start="-";
                                 $a_start="-";
                                 $m_hr=0;
                                 $a_hr=0;
                                 $m_end="-";
                                 $a_end="-";
                                 $m_desig="-";
                                 $a_desig="-";


                                if($value->m3 != 0){
                                    $m_start=getEndTime($value->m3start_time,0);
                                    $m_hr=3;
                                    $m_end=getEndTime($m_start,$m_hr);
                                    $m_desig=$value->m3_designation;
                                } else if($value->m4 != 0){
                                    $m_start=getEndTime($value->m4start_time,0);
                                    $m_hr=4;
                                    $m_end=getEndTime($m_start,$m_hr);
                                    $m_desig=$value->m4_designation;
                                }

                                 if($value->a3 != 0){
                                     $a_start=getEndTime($value->a3start_time,0);
                                     $a_hr=3;
                                     $a_end=getEndTime($a_start,$a_hr);
                                     $a_desig=$value->a3_designation;
                                 } else if($value->a4 != 0){
                                     $a_start=getEndTime($value->a4start_time,0);
                                     $a_hr=4;
                                     $a_end=getEndTime($a_start,$a_hr);
                                     $a_desig=$value->a4_designation;
                                 }

                                if($value->m3 == 1 && $value->m4 == 1){
                                    $m_start="<span style='color: red'>ERROR</span>";
                                    $m_hr="<span style='color: red'>ERROR</span>";
                                    $m_end="<span style='color: red'>ERROR</span>";
                                    $m_desig="<span style='color: red'>ERROR</span>";
                                    $a_start="<span style='color: red'>ERROR</span>";
                                    $a_hr="<span style='color: red'>ERROR</span>";
                                    $a_end="<span style='color: red'>ERROR</span>";
                                    $a_desig="<span style='color: red'>ERROR</span>";
                                }

                                 if($value->a3 == 1 && $value->a4 == 1){
                                     $a_start="<span style='color: red'>ERROR</span>";
                                     $a_hr="<span style='color: red'>ERROR</span>";
                                     $a_end="<span style='color: red'>ERROR</span>";
                                     $a_desig="<span style='color: red'>ERROR</span>";
                                     $m_start="<span style='color: red'>ERROR</span>";
                                     $m_hr="<span style='color: red'>ERROR</span>";
                                     $m_end="<span style='color: red'>ERROR</span>";
                                     $m_desig="<span style='color: red'>ERROR</span>";
                                 }

                             ?>
                             <td style="width: 9%"><label><?php echo $key+1;?></label></td>
                             <td style="width: 13%"><label><?php echo $value->date;?></label></td>
                            <td style="width: 13%"><label><?php echo $m_start;?></label></td>

                             <td style="width: 13%"><label><?php echo $m_desig;?></label></td>
                            <td style="width: 13%"><label><?php echo $a_start;?></label></td>

                             <td style="width: 13%"><label><?php echo $a_desig;?></label></td>
                        </tr>
                                 <?php if($m_start == "<span style='color: red'>ERROR</span>"){?>
                                     <div>
                                        <span style="color: red;">
                                            Error Reason :: <?php echo $value->prof_name." ";?> is assigned for both M3 and M4 session or both A3 and A4 session <br>Dated: <?php echo $value->date;?>
                                        </span>
                                     </div>
                                     <script>
                                         alert("Error Reason :: <?php echo $value->prof_name." ";?> is assigned for both M3 and M4 session or both A3 and A4 session \n\nDated: <?php echo $value->date;?>");
                                         $(".error").append("Error Reason :: <?php echo $value->prof_name." ";?> is assigned for both M3 and M4 session or both A3 and A4 session <br>Dated: <?php echo $value->date;?>")
                                     </script>
                                 <?php }?>

                        <?php }?>

                        </tbody>
                    </table>
                <span style="white-space: pre !important;;">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>


                <div>
                    <span>
                        <?php echo $note_text;?>
                    </span>
                </div>






                <hr>
                <div id="footer">
                    <p style="background: lavender;"> <?php echo fottertitle; ?> </p>
                </div>
                <hr>

            </div>


            <?php }}    ;?>
    <script src="<?php echo asset_url();?>js/spiner.js"></script>
    <script src="<?php echo asset_url();?>js/loadingoverlay.js"></script>
    <script>


        var count = <?php echo count($report);?>;

        function img(id) {
            $(".main").hide();

            $("."+id).show();
            html2canvas($("."+id), {
                type:"view",
                onrendered: function(canvas) {
                    $.post("<?php echo base_url()?>master/saveImg", {img: canvas.toDataURL('image/png').replace(/.*,/, ''),id: id}, function(result){
                    });
                    $(".main").show();
                    count--;
                    if(count == -1){
                        $.LoadingOverlay("hide", true);
                    }

//
                }

            });
        }


        function call__(){

            window.setTimeout(function() {
                $.LoadingOverlay("show");
            }, 0);

            $(".main").each(function(index){

                var cls = $(this).attr("class");
                setTimeout( function(){ img(cls.substring(5)); }, index*1000);


            });
            //$.LoadingOverlay("hide", true);
        }
//        $("html").css("overflow", "hidden");
    </script>


    </body>
</html>