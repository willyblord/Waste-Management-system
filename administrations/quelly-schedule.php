
                             <?php
                                 include("../connection_e_wasterManagement.php");
                              if (isset($_POST['submit'])) {
                                // $selectID = $db->prepare("SELECT employee_phone FROM schedule WHERE employee_phone = '".$_POST['employee_phone']."'");
                                // $selectID->execute();
                                // if($IDFound = $selectID->fetch()){
                                // die("<script>
                                //     alert('Employee exist');
                                //     window.location= 'schedule.php';
                                // </script>");
                                // }
                                $name=$_POST['name'];
                                $employee_phone=$_POST['employee_phone'];
                                $sector=$_POST['sector'];
                                $cell=$_POST['cell'];
                                $added_by=$_POST['added_by'];
                                $message=$_POST['message'];
                                $stmt= $db->prepare("
                                INSERT INTO schedule (
                                    name,
                                    employee_phone, 
                                    sector,
                                    cell, 
                                    added_by,
                                    message

                                ) 
                                VALUES(
                                    '".$_POST['name']."',
                                    '".$_POST['employee_phone']."', 
                                    '".$_POST['sector']."', 
                                    '".$_POST['cell']."', 
                                    '".$_POST['added_by']."',
                                    '".$_POST['message']."'
                                ) 
                            ");
                               $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mista.io/sms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('to' => '25'.$_POST['employee_phone'],'from' => 'WASTEMGT','unicode' => '0','sms' => $_POST['message'],'action' => 'send-sms'),
  CURLOPT_HTTPHEADER => array(
    'x-api-key: 70f9523c-53d1-9eaf-b304-94d74d92cb5c-fe53d017'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

if($stmt->execute()){
header("location:schedule.php");
}
else{

echo 'not inserted';
}

}
?>
