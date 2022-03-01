<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet">
<title>waste management system</title>
<link rel="stylesheet" type="text/css" href="style.css">
 <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style type="text/css">
    .successMessage{
      background-color: #fff;
    }


    </style>


    <?php include('js.php'); ?>

</head>

<body class="authentication">
<section class="popup-graybox" >

<div class="ebook-popup-sec" style="border-radius: 6px;" >
 <img src="images/logo.png" alt="" style="width: 200px;height: 200px; border-radius: 100px;">
  <h2 data-edit="text">Login</h2>

   <div class="alert2 successMessage" style="display: none; background-color: #fff; color: #aaa;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Success
</div> 

   <div class="alert errorMessage" style="display: none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  error
</div> 
            <br>
 
  <form   method="Post" id="login_form">
  <div class="ebook-email-sec">
    <input type="text" name="email" id="email" class="ebookemail-input1" data-edit="placeholder" placeholder="User Name | E-mail">
    <input type="Password" name="password" id="password" class="ebookemail-input2" data-edit="placeholder" placeholder="Password">
  <div class="actions">
                  <a href="forgetPassword" style="color: #999999;
padding-right: 10px;cursor: pointer;text-decoration: none; ">Recover password</a>
                  <button type="submit" class="btn btn-info">Login</button>
                </div><!--     <button class="ebook-cls-btn close-btn">X</button>
 -->  </div>
 </form>
</div>    
</section>
</body>
</html>
<style>
   /* The alert message box */
.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}
.alert2 {
  padding: 20px;
  background-color: #00d0b7; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
} 
</style>
