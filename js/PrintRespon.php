<?php
$nama_dokumen='Customer Feedback'; 
define('_MPDF_PATH','mpdf60/'); 
include(_MPDF_PATH . "mpdf.php"); 
$mpdf=new mPDF('utf-8', 'A4', 8, 'arial'); 
ob_start();
$id=$_GET['id'];
require_once('pages\config.php');
main_o();
    $tickets_query = "SELECT t.*,cs.*,sc.*, p.priority, s.status, c.category, ta.fromdept,t.createdate AS tgl_ticket, GROUP_CONCAT(ta.todept SEPARATOR ', ') AS todept, ta.username FROM ticket t
        LEFT OUTER JOIN ticketassign ta ON t.ticketid = ta.ticketid
        LEFT OUTER JOIN priority p ON t.priorityid = p.priorityid
        LEFT OUTER JOIN category c ON t.categoryid = c.categoryid
        LEFT OUTER JOIN status s ON t.statusid = s.statusid
        LEFT OUTER JOIN customer cs ON t.ticketid = cs.ticketid
        LEFT OUTER JOIN source sc ON t.sourceid = sc.sourceid
        WHERE t.ticketid = '".$id."'
                    ORDER BY t.createdate DESC";
    $tickets_exec = mysql_query($tickets_query);
    $tickets_res = mysql_fetch_array($tickets_exec);

    $response_query = "SELECT t.ticketid, r.*, r.fromdept, r.username as responseuser, r.createdate as respondate FROM ticket t
                        LEFT JOIN respond r on t.ticketid = r.ticketid
                        WHERE t.ticketid = '".$id."'
                        ORDER BY r.createdate ASC";
    $responseQA_query = "SELECT t.ticketid,t.statusid,t.closeremark, r.*, r.fromdept, r.username as responseuser, r.createdate as respondate FROM ticket t
                        LEFT JOIN respond r on t.ticketid = r.ticketid
                        WHERE t.ticketid = '".$id."' AND r.username ='Yenny Hartono' and t.statusid=3
                        ORDER BY r.createdate desc";                        
    $responseQA_exec = mysql_query($responseQA_query);
    $response_exec2 = mysql_query($response_query);
?> 
<style>    
    td,th{padding: 2px;text-align: center; #width: 190px}
    h3{text-align: center; padding-top:87px; font-family: "Times New Roman", Georgia, Serif;}
    h5{text-align: center; font-family: "Times New Roman", Georgia, Serif;}
    th{background-color: #00c0ef; padding: 5px;color: #fff}
</style>
<div style="position:absolute;top:40px;right:180px;display:none;"><table>
    <td></td><tr>
    <td align="left" colspan="2"><font size="2">FORM.FRONTOFFICE.001</font></td><tr>
    <td align="left"><font size="2">Rev </td><td align="left"><font size="2">: 1</td><tr>
    <td align="left"><font size="2">Tgl.</td><td align="left"><font size="2">: 22 Januari 19</td>
</table></div>
<div width="100%"><img src="img/kop_atas.jpg"></div>
<br></br>
<div align="center" style="padding-top:17px; font-size:16px; text-align: center; font-family: "Times New Roman", Georgia, Serif;"><b>CUSTOMER FEEDBACK</b></div>
<div style="position:absolute;top:120;right:80;">
        <b><font size="2">PPN.006<br>
        Rev. : 5<br>
        Tgl. : 2 Januari 2021</font></b>
</div>
<div align="left" style="position: absolute;top:176px;width:220px;">
    <table border="1">
        <tr>
            <th align="left" colspan="2" style="background-color:#00c0ef; color:black;font-size:11px;">1. Ticket Details</th>      
        </tr>
        <tr>
            <td align="left">ID Ticket</td>
            <td align="left"><?php echo ($tickets_res['ticketid'])?></td>
        </tr>
        <tr>
            <td align="left">Client</td>
            <td align="left"><?php echo ($tickets_res['todept'])?></td>
        </tr>
        <tr>
            <td align="left">Ticket Date</td>
            <td align="left"><?php echo date('d-m-Y H:i:s', strtotime($tickets_res['tgl_ticket']));?></td>
        </tr>
        <tr>
            <td align="left">Category</td>
            <td align="left"><?php echo ($tickets_res['category'])?></td>
        </tr>
        <tr>
            <td align="left">Source</td>
            <td align="left"><?php echo ($tickets_res['sourcename'])?></td>
        </tr>
        <tr>
            <td align="left">Subject</td>
            <td align="left"><?php echo ($tickets_res['subject'])?></td>
        </tr>
        <tr>
            <td align="left">Priority</td>
            <td align="left">
                <?php 
                    if ($tickets_res['priority'] == 'High/Merah (Berhubungan dengan polisi/pengadilan, mengancam sistem/organisasi, kerugian material)'){
                        echo '<span class="label label-danger">';echo"High";echo'</span>';
                    } else if ($tickets_res['priority'] == 'Medium/Kuning (Berhubungan dengan pemberitaan media, kerugian inmaterial)'){
                        echo '<span class="label label-warning">';echo"Medium";echo'</span>';
                    } else if ($tickets_res['priority'] == 'Non Grading'){
                            echo '<span class="label label-default">';echo"Non Grading";echo'</span>';
                    } else {
                        echo '<span class="label label-success">';echo"Low";echo'</span>';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td align="left">Status</td>
            <td align="left">
                <?php 
                    if ($tickets_res['status'] == 'New'){
                        echo '<span class="label label-danger">';echo($tickets_res['status']);echo'</span>';
                    } else if ($tickets_res['status'] == 'Closed'){
                        echo '<span class="label label-success">';echo($tickets_res['status']);echo'</span>';
                    }
                ?> <br><?php if($tickets_res['closedate']=='0000-00-00 00:00:00'){}else{?> (<?php echo date('d-m-Y H:i:s', strtotime($tickets_res['closedate']));?>)<?php } ?>
            </td>
        </tr>
        <tr>
            <td align="left">Assigned User</td>
            <td align="left"><?php echo ($tickets_res['username'])?></td>
        </tr>
    </table>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////-->
<div align="left" style="position: absolute;top:463px;width:220px;">
    <table border="1">
        <tr>
            <th align="left" colspan="2" style="background-color:#00c0ef; color:black;font-size:11px;">2. Patient Details</th>      
        </tr>
        <tr>
        <td align="left">Patient Type</td>
        <td align="left">
            <?php 
                if ($tickets_res['patienttype'] == 0){
                    echo "Inpatient";
                } else {
                    echo "Outpatient";
                }
            ?>
        </td>
        </tr>
        <tr>
            <td align="left">UHID</td>
            <td align="left"><?php echo ($tickets_res['uhid'])?></td>
        </tr>
        <tr>
            <td align="left">Patient Name</td>
            <td align="left"><?php echo ($tickets_res['patientname'])?></td>
        </tr>
        <tr>
            <td align="left">Date Taken Care</td>
            <td align="left"><?php echo date('d-m-Y', strtotime($tickets_res['startdate'])); 
                echo " s/d "; echo date('d-m-Y', strtotime($tickets_res['enddate']));?></td>
        </tr>
        <tr>
            <td align="left">Respondent</td>
            <td align="left"><?php echo ($tickets_res['respondentname'])?></td>
        </tr>
        <tr>
            <td align="left">Relation</td>
            <td align="left"><?php echo ($tickets_res['relation'])?></td>
        </tr>
        <tr>
            <td align="left">Home Phone</td>
            <td align="left"><?php echo ($tickets_res['homephone'])?></td>
        </tr>
        <tr>
            <td align="left">Handphone</td>
            <td align="left"><?php echo ($tickets_res['handphone'])?></td>
        </tr>
    </table>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////-->
<div style="margin-top:20px; width:670px;margin-left:230px;">
    <table width="100%" border="1">
        <tr>
            <th align="left" style="background-color:#00c0ef; color:black;font-size:11px;">Feedback</th>      
        </tr>
        <tr>
            <td align="left"><?php echo ($tickets_res['description'])?></td>
        </tr>
        <tr>
            <th align="left" style="background-color:#00c0ef; color:black;font-size:11px;">Customer Service Feedback</th>
        </tr>
        <tr>
            <td align="left"><pre style="font-family:arial;"><?php echo ($tickets_res['cs_feedback'])?></pre></td>
        </tr>
        <tr>
            <th align="left" style="background-color:#00c0ef; color:black;font-size:11px;">Follow Up</th>
        </tr>
        <tr>
            <td align="left">
                <hr>
                <?php while($response_res2 = mysql_fetch_array($response_exec2)) {
                // if($response_res2['responseuser']!='Yenny Hartono'){?>
                <div><h3 style="color:green;"><?php echo ($response_res2['responseuser'])?> - <?php echo ($response_res2['fromdept'])?></h3> 
                    <?php if($response_res2['responseuser']=='Yenny Hartono'){ ?>
                        <b>Pembahasan Unit Mutu :</b><br>
                            <?php echo ($response_res2['respond'])?><br>
                    <?php }else{ ?>
                        <b>Kronologis :</b><br>
                            <?php echo ($response_res2['respond'])?><br>
                        <b>Telaah / Analisa Permasalahan : </b><br>
                            <?php echo ($response_res2['penyebab'])?><br>
                        <b>Tindakan Perbaikan :</b><br>
                            <?php echo ($response_res2['fix_act'])?>
                        <h6>
                            <?php echo ($response_res2['respondate'])?>
                        </h6>
                    <?php } ?>               
                </div><hr>
                <?php //}
                }?>
            </td>
        </tr>
    </table>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////-->
<div align="left" style="margin-top:10px;width: 670px;margin-left: 230px;">
    <table width="100%" border="1">
        <tr>
            <th align="left" style="background-color:#00c0ef; color:black;font-size:11px;">Remark Close Quality Ansurance</th>      
        <tr>
            <td align="left">
                <?php $response_res = mysql_fetch_array($responseQA_exec);
                if($response_res['responseuser']=='Yenny Hartono'){?>
                <div><h3 style="color:green;"><?php echo ($response_res['responseuser'])?> - <?php echo ($response_res['fromdept'])?></h3>     
                            <?php echo ($response_res['closeremark'])?>
                        <h6>
                            <?php echo ($response_res['respondate'])?>
                        </h6>           
                </div><hr>
                <?php }?>
            </td>
        </tr>
        <!--<tr>
            <td align="left">Remark Closed : <?php echo ($tickets_res['closeremark'])?></td>
        </tr>-->
    </table>
</div>

<?php 
$mpdf->setFooter('Page {PAGENO} / {nb}');
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->AddPage('P','','','','',8,8,8,10,10,10);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>