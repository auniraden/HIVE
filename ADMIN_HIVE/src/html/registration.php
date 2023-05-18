<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {//internal php to communicate with AJAX
        $con = mysqli_connect('localhost', 'root', '', 'hive');
        if(isset($_POST['email_check'])){
            $email = $_POST['email'];
            $sql = "SELECT * FROM admin WHERE Email = '$email'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) > 0){
                echo "not_available";
            }else{
                echo "available";
            }
            exit();
        }
        if(isset($_POST['save'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            //.md5(). to encrypt pass
            // Check if password and confirm password match
            if ($password1 !== $password2) {
              echo 'Password and Confirm Password do not match!';
              exit; // Stop execution if passwords don't match
            }

            // Generate auto-incremented admin ID
            $query = "SELECT MAX(AdminID) AS max_id FROM admin";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $max_id = $row['max_id'];
            $admin_id = 'A' . str_pad((intval(substr($max_id, 1)) + 1), 2, '0', STR_PAD_LEFT);

            $sql = "INSERT INTO admin (AdminID, Name, Email, Password) VALUES ('$admin_id','$username','$email','".md5($password2)."')";
            $store = mysqli_query($con,$sql);
            if($store){
              echo 'Successfully signed up!';
              exit();
            }else
              echo "Error: " . mysqli_error($con);
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/HIVE-logo_Tbg.png" width="120" alt="">
                </a>
                <h1 style="font-weight:bold" class="text-center">HIVE</h1>
                <p class="text-center">Welcoming a new comrade!</p>
                <form method="post">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="textHelp" name="admin_name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="admin_email">
                    <span id="msg" style="color:red;"></span>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password1" name="admin_password">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="admin_passConfirm">
                  </div>
                  <button type="button" name="signUpBtn" id="signup" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
                //to load jquery
                $('document').ready(function(){
                var email_state= false;
                $('#email').blur(function(){
                    var emailAdd = $('#email').val();
                    if(emailAdd == ''){
                        email_state = false;
                        return;
                    }
                    //to call external php
                    $.ajax({
                        url:'',
                        type: 'post',
                        data:{
                            'email_check':1, //to pass into php
                            'email':emailAdd,
                        },
                        //if email is entered then validate
                        success: function(response){
                            if(response == 'not_available'){
                                email_state = false;
                                $('#msg').text("Email already exist!");
                            }else if(response == ('available')){
                                email_state = true;
                                $('#msg').text("");
                            }
                        }
                    });
                });

            $('#signup').click( function(){//user click register button
                var user_name = $('#username').val();
                var emailAdd = $('#email').val();
                var pass_word1 = $('#password1').val();
                var pass_word2 = $('#password2').val();
                if(user_name === '' || emailAdd === '' || pass_word1 === '' || pass_word2 === '') {
                    alert('Please fill in all fields!');
                    return;
                }else if(email_state == false){
                    alert('Please use another email address!');
                    $('#email').val('');
                    $('#msg').text('');
                }
                else{
                    $('#error_msg').text('');
                    //proceed with submission
                    $.ajax({
                        url:'',
                        type:'post',
                        data:{
                            'save': 1,//to pass into php
                            'email': emailAdd,
                            'username': user_name,
                            'password1': pass_word1,
                            'password2': pass_word2,
                        },
                        success:function(response){
                            alert(response);
                            $('#email').val('');
                            $('#password1').val('');
                            $('#password2').val('');
                        }
                    });
                }
            });
        });  
  </script>

</body>

</html>