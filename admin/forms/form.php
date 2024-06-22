<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}

$regid = secureData($_GET['studentid'], 'd');
// echo $regid;
$qr = mysqli_query($db_connection, "SELECT * FROM tblregistrations WHERE regid='$regid'");
$rw = mysqli_fetch_array($qr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Form</title>

    <style>
        body {
            /* font-family: Arial, sans-serif; */
            padding: 10px;
        }

        .container {
            width: 8.5in;
            height: 13in;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-sizing: border-box;
            page-break-after: always;
        }

        .header{
            display: flex;
            /* justify-content: center; */
            /* margin-top: 20px; */
            margin-left: 50px;
        }

        table td{
            font-size: 10px;
            vertical-align:top;
        }
    </style>
</head>
<body>
    
<div class="container">
    <table width="22%" align="right" style="font-size: 12px;">
        <tr>
            <td width="30%">Control No. 2023C1-C</td>
            <td width="5%" style="border-bottom: 1px solid black;"></td>
            <td width="5%" style="border-bottom: 1px solid black;"></></td>
            <td width="5%" style="border-bottom: 1px solid black;"></></td>
            <td width="5%" style="border-bottom: 1px solid black;"></></td>
        </tr>
    </table>

    <table width="80%" align="left">
        <tr>
            <td width="20%">LGU MEEAP FORM</td>
            <td width="65%" style="text-align: center;">Republic of the Philippines</td>
        </tr>
        <tr>
            <td style="font-size: 8px;">2023 VERSION (NOT FOR SALE)</td>
            <td style="text-align: center;">Province of Batangas</td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;">MUNICIPALITY OF SAN JOSE</td>
        </tr>
        <tr>
            <td><img style="height: 100px; margin-left: 80px; position: absolute; top: 80px;" src="../../admin/images/logo_u.png" alt=""></td>
            <td style="text-align: center; font-weight: bold; font-size: 13px">MUNICIPAL EXPANDED <br> EDUCATIONAL ASSISTANCE <br> PROGRAM</td>
            <td><img style="height: 100px; position: absolute; margin-left: -90px; top: 80px;" src="../../admin/images/dswd_u.png" alt=""></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold; font-size: 15px;">CATEGORY <?=htmlspecialchars($rw['categoryid'])?></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold; color: blue; font-size: 15px;"><?if($rw['levelid'] == 1) {echo 'ELEMENTARY/HIGH SCHOOL';}else{echo 'COLLEGE';}?> STUDENT APPLICATION FORM</td>
        </tr>

        <tr>
            <td ></td>
            <td style="text-align: center;">SY/AC: <span style="text-decoration: underline;">2023-2024</span></td>
        </tr>

        <?
            if($rw['levelid'] == 2){
                echo '
                    <tr>
                        <td>
                            <table width="50%" style="position: absolute; top: 150px;">
                                <tr>
                                    <td></td>
                                    <td>SEMESTER:</td>
                                </tr>
                                <tr>
                                    <td height="10px;" width="10px;" style="border: 1px solid black;">';
                                    if($rw['semid'] == 1){
                                        echo '<img height="10px" src="../images/check_.png">';
                                    }
                                    echo '</td>
                                    <td>FIRST</td>
                                </tr>
                                <tr>
                                    <td height="10px;" width="10px;" style="border: 1px solid black;">';
                                    if($rw['semid'] == 2){
                                        echo '<img height="10px" src="../images/check_.png">';
                                    }
                                    echo '</td>
                                    <td>SECOND</td>
                                </tr>
                                <tr>
                                    <td height="10px;" width="10px;" style="border: 1px solid black;">';
                                    if($rw['semid'] == 3){
                                        echo '<img height="10px" src="../images/check_.png">';
                                    }
                                    echo '</td>
                                    <td>THIRD</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                ';
            }

        ?>
        <!-- <tr>
            <td>
                <table width="50%" style="position: absolute; top: 150px;">
                    <tr>
                        <td></td>
                        <td>SEMESETER:</td>
                    </tr>
                    <tr>
                        <td height="10px;" width="10px;" style="border: 1px solid black;"><? if($rw['semid'] == 1){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>FIRST</td>
                    </tr>
                    <tr>
                        <td height="10px;" width="10px;" style="border: 1px solid black;"><? if($rw['semid'] == 2){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>SECOND</td>

                    </tr>
                    <tr>
                        <td height="10px;" width="10px;" style="border: 1px solid black;"><? if($rw['semid'] == 3){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>THIRD</td>
                    </tr>
                </table>
            </td>
        </tr> -->

    </table>

    <table width="20%" align="right">
        <tr>
            <td width="100%" style="height: 150px; border: 1px solid black; text-align: center; font-size: 14px;">
                <span>Picture</span><br>
                <span>2x2</span><br>
                <span style="color: red">*White or Blue Background</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
           <td style="font-size: 14px;">Instructions: <span style="font-weight: lighter;">Fill all the required information. DO NOT leave an item blank and use Black Ballpen.</span></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse; border-bottom: none;" border="1">
        <tr>
            <td style="font-size: 10px; background-color: #ccc;">I. PERSONAL INFORMATION</td>
        </tr>
    </table>
    
    <table width="100%" style="border-collapse:collapse; border-bottom: none;" border="1">
        <tr align="top">
            <td width="28%" height="40px;"><span>Surname<span style="color: red;">*</span></span><br><br>&nbsp;<span style="font-size: 14px;"><?=htmlspecialchars($rw['lastname'])?></span></td>
            <td width="28%"><span>First Name<span style="color: red;">*</span></span><br><br><span style="font-size: 14px;">&nbsp;<?=htmlspecialchars($rw['firstname'])?></span></td>
            <td width="28%"><span>Middle Name<span style="color: red;">*</span></span><br><br><span style="font-size: 14px;">&nbsp;<?=htmlspecialchars($rw['middlename'])?></span></td>
            <td width="16%"><span>Name EXT.<span style="color: red;">*</span></span><br>
                <span>(Jr., Sr.)*</span><br>&nbsp;<span style="font-size: 14px;"><?=htmlspecialchars(NameExt($rw['namextid']))?></span>
            </td>
        </tr>

    </table>

    <table width="100%" style="border-collapse:collapse;  border-bottom: none;" border="1">
        <tr>
            <td width="40%" height="40px;"><span>Address<span style="color: red;">*</span></span><br>
                &nbsp;&nbsp;&nbsp;<span>Barangay</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>San Jose, Batangas</span>
            </td>
            <td width="20%"><span>Date of Birth<span style="color: red;">*</span></span><br>&nbsp;<span style="font-size: 14px;"><br>&nbsp;<?=htmlspecialchars($rw['dob'])?></span></td>
            <td width="40%"><span>Place of Birth<span style="color: red;">*</span></span><br>&nbsp;<span style="font-size: 14px;"><br>&nbsp;<?=htmlspecialchars(ucwords($rw['birthplace']))?></span></td>
        </tr>
    </table>

    <table width="100%" style="border-collapse:collapse; border-bottom: 3px solid black;" border="1">
        <tr>
            <td width="40%" height="40px;">
                <span>Citizenship<span style="color: red;">*</span></span><br>
                <table width="100%" style="margin-left: 50px;">
                    <tr>
                        <td>FILIPINO</td>
                        <td width="10px;" height="10px;" style="border: 1px solid black;"><? if($rw['citizenshipid'] == 1){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>by birth</td>
                        <td width="10px;" height="10px;" style="border: 1px solid black;"><? if($rw['citizenshipid'] == 2){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>by naturalization</td>
                    </tr>
                </table>
            </td>
            <td width="20%"><span>Civil Status<span style="color: red;">*</span></span><br>
                <table width="100%">
                    <tr>
                        <td width="10px;" height="10px;" style="border: 1px solid black;"><? if($rw['civil'] == 1){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>Single</td>
                        <td width="10px;" height="10px;" style="border: 1px solid black;"><? if($rw['civil'] == 2){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>Married</td>
                    </tr>
                </table>
            </td>
            <td width="20%"><span>Sex<span style="color: red;">*</span></span><br>
                <table width="100%">
                    <tr>
                        <td width="10px;" height="10px;" style="border: 1px solid black;"><? if($rw['sexid'] == 1){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>Male</td>
                        <td width="10px;" height="10px;" style="border: 1px solid black;"><? if($rw['sexid'] == 2){echo '<img height="10px" src="../images/check_.png">';}?></td>
                        <td>Female</td>
                    </tr>
                </table>
            </td>
            <td width="20%"><span>Contact Number<span style="color: red;">*</span></span><br><br>&nbsp;<span style="font-size: 14px;"><?=htmlspecialchars($rw['contact'])?></span></td>
        </tr>
    </table><br>

    <table width="100%" border="1" style="border-collapse: collapse; border-bottom: none;">
        <tr>
            <td style="font-size: 10px; background-color: #ccc;">II. FAMILY BACKGROUND: Information of Parents, Unmarried / Breadwinner Brother and Sister and Child/Children (if applicable)</td>
        </tr>

    </table>
    
    <table width="100%" border="1" style="border-collapse: collapse; text-align: center;">
        <tr>
            <td width="40%" height="60px">
                <span>Surname<span style="color: red;">*</span></span>&nbsp;
                <span>Firstname<span style="color: red;">*</span></span>&nbsp;
                <span>MI<span style="color: red;">*</span></span><br><br><br>
                <span style="font-size: 10px;">(Ex. DELA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CRUZ JUAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; B.)</span>
            </td>
            <td width="10%">Relationship<span style="color: red;">*</span><br>
                <span style="font-size: 10px;">(Father/Mother/Brother/</span>
                <span style="font-size: 10px;">Sister/Guardian)</span>
            </td>
            <td width="5%">Age<span style="color: red;">*</span></td>
            <td width="10%">Civil Status<span style="color: red;">*</span><br>
                <span style="font-size: 10px;">(Single/Married/Widow/<span>
                <span>Widower/Annuled)</span>
            </td>
            <td width="10%">Educational Attainment<span style="color: red;">*</span><br>
                <span style="font-size: 10px;">(Elementary/High School/Vocatinal/College)</span>
            </td>
            <td width="15%">Occupation<span style="color: red;">*</span></td>
            <td width="10%">Monthly Income<span style="color: red;">*</span><br>
                <span style="font-size: 10px; color:red;">(Take-home pay)</span>
            </td>
        </tr>

        <?
            $f_qr = mysqli_query($db_connection, 'select * from tblregistrations_family where regid='.$regid);
            while($f_rw = mysqli_fetch_array($f_qr)){
                echo '<tr>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars($f_rw['family_lastname'].' '.$f_rw['family_firstname'].' '.$f_rw['family_middleinitial']).'</td>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars(GetData('select relationship from tblrelationship where relationshipid='.$f_rw['relationshipid'])).'</td>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars($f_rw['family_age']).'</td>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars(GetData('select status from tblcivil where civilid='.$f_rw['familycivilid'])).'</td>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars(GetData('select educ from tbleducational_attainment where educid='.$f_rw['educationid'])).'</td>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars($f_rw['occupation']).'</td>';
                echo '<td style="font-size: 14px;">'.htmlspecialchars($f_rw['income']).'</td>';
                echo '</tr>';
            }
        
        ?>
        <tr>
            <td height="25px"></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td height="25px"></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td height="25px"></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table border="1" width="100%" style="border-collapse: collapse; border-top:none;">  
        <tr>
            <td width="100%" height="20px" style=" text-align:center; border-top: none; color: red; font-size:10px; border-bottom: 3px solid black;">(Continue on separate sheet if necessary)</td>
        </tr>
    </table><br>

    <table width="100%" border="1" style="border-collapse: collapse; border-bottom: none;">
        <tr>
            <td width="100%" style="font-size: 10px; background-color: #ccc;">III. EDUCATIONAL BACKGROUND</td>
        </tr>
    </table>

    <table width="100%" border="1" style="border-collapse: collapse; border-bottom: none; text-align:center; font-size: 10px;">
        <tr>
            <td width="35%">Level<span style="color: red;">*</span></td>
            <td>Name of School <span style="color: red;">* &nbsp;&nbsp; (Write in full)</span></td>
        </tr>
        <tr>
            <td width="35%">Elementary (Grade 1 - Grade 6)</td>
            <td style="font-size: 14px;"><?=htmlspecialchars(ucwords($rw['elementary']))?></td>
        </tr>

        <tr>
            <td width="35%">Junior High School (Grade 1 - Grade 6)</td>
            <td style="font-size: 14px;"><?=htmlspecialchars(ucwords($rw['junior']))?></td>
        </tr>
 
        <tr>
            <td width="35%">Senior High School (Grade 1 - Grade 6)</td>
            <td style="font-size: 14px;"><?=htmlspecialchars(ucwords($rw['senior']))?></td>
        </tr>

        <? if($rw['levelid'] == 2){
            echo '
            <tr style="border-bottom: 3px solid black;">
                <td width="35%">Vocational / College</td>
                <td style="font-size: 14px;">' . htmlspecialchars(ucwords($rw['college'])) . '</td>
            </tr>
            ';
        }?>

    </table>
    <table>
        <tr style="font-style:italic; font-size:10px;">
            <td><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    I hereby declare that the information given above are true and correct. Likewise, I hereby attest the veracity of all the documents and requirements attached to this application. 
                     Any false statement would cause automatic cancellation of the grant and I shall refund the amount recieved or pay damages to the Local Government Unit of San Jose, Batangas or other sanctions in  accrodance with law.
            </span></td>
        </tr>
        <tr style="font-style:italic; font-size:10px;">
            <td>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Furhermore, engagement in nay crime and violation of Laws and or Ordinance (Anti-Truancy, No Smoking, Curfe to Minors and Anti-Littering) and relating thereto shall be grounds for the termination of my educational assistance depending on the gravity of the offense/s.
                </span>
            </td>
        </tr>
    </table>

    <table width="90%" style="margin-top: 40px; margin-left: 40px;">
        <tr>
            <td width="40%" style="border-bottom: 1px solid black; text-align:center; font-size: 14px;"><?=htmlspecialchars($rw['firstname'].' '.$rw['middlename'].' '.$rw['lastname'])?></td>
            <td width="30%"></td>
            <td width="30%" style="border-bottom: 1px solid black;"></td>
        </tr>
        <tr style="text-align: center; font-size: 10px;">
            <td width="50%">Signature over Printed Name of Student / Applicant</td>
            <td width="10%"></td>
            <td width="30%">Date</td>
        </tr>
    </table>

    <table width="100%">
        <tr><td style="border-bottom: 3px solid black;"></td></tr>
        <tr><td style="border-bottom: 3px dashed black;"></td></tr>
        <tr><td><span style=" color:red; font-style:italic;">DO NOT FILL-OUT THIS PORTION (FOR MSWD OFFFICE USE ONLY)</span></td></tr>
    </table>

    <table width="100%" border="1" style="border-collapse: collapse;">
        <tr>
            <td style="font-size: 10px; background-color: #ccc;">IV. SOCIAL WORKER'S ASSESSMENT</td>
        </tr>
        <tr>
            <td height="60px;"></td>
        </tr>
        <tr>
            <td style="border-bottom: none;" height="50px">Assessed by:
                <table width="80%" style="margin-left: 60px; margin-top: 30px;">
                    <tr>
                        <td width="50%" style="border-bottom: 1px solid black;"></td>
                        <td width="20%"></td>
                        <td style="border-bottom: 1px solid black;"></td>
                    </tr>
                    <tr style="text-align:center;">
                        <td width="50%">Signature over Pinted Name</td>
                            <td width="20%"></td>
                            <td>Date of Assessment</td>
                        </tr>
                </table>
            </td>
        </tr>
    </table>

    <table align="left" width="100%">
        <tr>
            <td width="50%">Recommended for Approval</td>
            <td width="50%">Approved by:</td>
        </tr>
    </table>

    <table width="100%" style="text-align: center; margin-top: 45px;">
        <tr>
            <td width="50%">DULCESIMA B. SOLLESTRE, RSW</td>
            <td width="50%">VALENTINO R. PATRON</td>
        </tr>
        <tr>
            <td>MGDH I (MSWDO)</td>
            <td>Municipal Mayor</td>
        </tr>
    </table>
    

</div>
</body>
</html>