<?php
require ('../config/db.php');
require_once ('../controllers/emailControl.php');

function sessionData(){
  global $conn;

  $id = $_SESSION['usersid'];
  $sql = "SELECT `*` FROM `users` WHERE `id` = '$id' LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['referralcode'] = $user['referralid'];

  }
}

############# IF PIGGY WALLET ONE (1) #######################
if(isset($_POST['piggy1btn'])){

  // DECLADE VARIABLES
  sessionData();
  $amount = mysqli_real_escape_string($conn, $_POST['amount1']);

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/plan');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"name\": \"Piggy Wallat One (1)\", \"description\": \"Piggy Wallet 1 is 30 days saver this (works like Ajor, Akawo or Esusu,\", \"interval\": \"monthly\", \"amount\": $amount}");

  $headers = array();
  $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
  $headers[] = 'Content-Type: application/json';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);

  //print $data->data->plan_code;
  if ($result) {

    $plandata = json_decode($result);
    $plan_code = $plandata->data->plan_code;
    $email = $_SESSION['usersemail'];
    //$url ='https://api.paystack.co/customer/'.$email;

    // GET THE CUSTOMER CODE FROM REFERENCE DATA
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/customer/'.$email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if($result){
      $customerdata = json_decode($result);
      $customer_code = $customerdata->data->customer_code;
      header('Location: ?success=plancreated&planCode='.$plan_code.'&cusCode='.$customer_code);
    }
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

  }
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);

}


############# IF PIGGY WALLET TWO (2) #######################
if(isset($_POST['piggy2btn'])){

  // DECLADE VARIABLES
  sessionData();
  $amount = mysqli_real_escape_string($conn, $_POST['amount2']);

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/plan');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"name\": \"Piggy Wallat Two (2)\", \"description\": \"90 days daily savings with interest Here you save your choice amount daily for 90 days.\", \"interval\": \"monthly\", \"invoice_limit\": \"90\", \"amount\": $amount}");

  $headers = array();
  $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
  $headers[] = 'Content-Type: application/json';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);

  //print $data->data->plan_code;
  if ($result) {

    $plandata = json_decode($result);
    $plan_code = $plandata->data->plan_code;
    $email = $_SESSION['usersemail'];
    //$url ='https://api.paystack.co/customer/'.$email;

    // GET THE CUSTOMER CODE FROM REFERENCE DATA
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/customer/'.$email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if($result){
      $customerdata = json_decode($result);
      $customer_code = $customerdata->data->customer_code;
      header('Location: ?success=plancreated&planCode='.$plan_code.'&cusCode='.$customer_code);
    }
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

  }
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);

}



// GET CUSTOMER PLAN DATA FUNCTION
function getcustomerplanData($planCode, $cusCode){
  global $conn;

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/plan/'.$planCode);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


  $headers = array();
  $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);

  if($result){
    $plandata = json_decode($result);
    // $plandata->{0}->status
    $plan = $plandata;
    $_SESSION['plan'] = $plan;
    $planname = $plandata->data->name;
    $amount = $plandata->data->amount;
    $interval = $plandata->data->interval;
    $createdAt = $plandata->data->createdAt;

    //DATA TO INSERT INTO DATABASE
    $plan_code = $plandata->data->plan_code;
    $sub_code = $plandata->data->subscription_code;

    //INSERT INTO SAVINGSDATA
    $email = $_SESSION['usersemail'];

    $sql = "SELECT `*` FROM `users` WHERE `email` = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($user = mysqli_fetch_assoc($result)){
        $id = $user['id'];

        $sql = "INSERT INTO `savingsData` (usersid, cus_code, plan_code, sub_code) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isss', $id, $cusCode, $plan_code, $sub_code);
        $stmt->execute();
      }
    } else {
      header('Location: ?error=nouserfound'.$email);
    }

    header('Location: ?planname='.$planname.'&amount='.$amount.'&interval='.$interval.'&createdAt='.$createdAt);
  }

  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);

}



//FOR EVERYTIME A USER LOGIN
function getcustomerplanData2($planCode){

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/plan/'.$planCode);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


  $headers = array();
  $headers[] = 'Authorization: Bearer sk_test_f89bb31f1bda1cdb1f77d255987843b82f1a8e56';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);

  if($result){
    $plandata = json_decode($result);
    // $plandata->{0}->status
    $plan = $plandata;
    $_SESSION['plan'] = $plan;
    $planname = $plandata->data->name;
    $amount = $plandata->data->amount;
    $interval = $plandata->data->interval;
    $createdAt = $plandata->data->createdAt;

    //DATA TO INSERT INTO DATABASE
    $plan_code = $plandata->data->plan_code;
    $sub_code = $plandata->data->subscription_code;

    header('Location: ?planname='.$planname.'&amount='.$amount.'&interval='.$interval.'&createdAt='.$createdAt);
  }

  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);
}
