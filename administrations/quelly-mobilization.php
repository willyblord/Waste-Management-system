
                     <?php
                         include("../connection_e_wasterManagement.php");
                      if (isset($_POST['submit'])) {
                    $message=$_POST['message'];
                    $chk=$_POST['chk'];
        

                    $stmt= $db->prepare("
                                INSERT INTO mobilization (
                                    message, 
                                    chk
                                    
                                ) 
                                VALUES(
                                    '".$_POST['message']."', 
                                    '".$_POST['chk']."'
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

            if($stmt->execute())
            {
            ?>
            <script>
                alert("new mobilization successfully Uploaded");
                window.location.href=('send-compaign.php');
            </script>
            <?php
            }else
 
                 {
             ?>
            <script>
                alert("Error");
                window.location.href=('populationManagement.php');
            </script>
            <?php
             }
           
            
            }

     ?>