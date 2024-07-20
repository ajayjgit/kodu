<?php
session_start();    
    include("../conn1.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>kodu  </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form name = "add_login" action="" method="post">
                  <div class="form-group">
                    <label>Username *</label>
                    <input type="text" class="form-control p_input" id ="user" name ="user" required> 
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" id ="pass" name ="pass" required> 
                  </div>

                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
<?php
		if(isset($_POST['login'])){
		
    $username = $_POST['user'];  
    $password = $_POST['pass']; 
	
	// Function to encrypt the password
function encryptPassword($password) {
    // Choose an appropriate encryption algorithm (e.g., bcrypt)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashedPassword;
}
$encryptedPassword = encryptPassword($password);

    // Query the database to fetch the user's encrypted password
$sql = "SELECT id,admin_username, admin_password, user_type FROM admin_login WHERE admin_username = ? AND cur_status='ACTIVE'";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

	
if(! $result )
{
  die('Could not enter data: ' . mysqli_error($con));
}

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $encryptedPassword = $row["admin_password"];
	
        // Verify the entered password against the stored encrypted password
        if (password_verify($password, $encryptedPassword)) {
$_SESSION["kodu_admin_id"] = $row['id'];
$_SESSION["kodu_admin_username"] = $row['admin_username'];
$_SESSION["kodu_admin_usertype"] = $row['user_type'];

if($_SESSION["kodu_admin_usertype"] == 'MASTER') {	

    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='add_user.php';
    </script>");
	// Password matches
			
		}
		if($_SESSION["kodu_admin_usertype"] == 'ENDUSER')
		{	

	 echo ("<script LANGUAGE='JavaScript'>
    window.location.href='add_user.php';
    </script>");
	// Password matches
			
		}

        } 
		else 
		{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Login failed. Invalid username or password');
    window.location.href='index.php';
    </script>");  // Password does not match
        }
    } else {
     echo ("<script LANGUAGE='JavaScript'>
    window.alert('Login failed. Invalid username or password');
    window.location.href='index.php';
    </script>");  // No matching user found
    }
// Close the database connection
$con->close();	
	}		
	?>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>