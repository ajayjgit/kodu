<?php
session_start();
include("../conn1.php");
if (isset($_SESSION["kodu_admin_usertype"]) && ($_SESSION["kodu_admin_usertype"] == 'MASTER') && isset($_SESSION["kodu_admin_username"])) {
include("header.php");

?>


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Add Login User</h3>

            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Login User</h4>
                    <form class="forms-sample" name = "add_user" action="" method="post" onsubmit = "return validation()">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" name = "chn_user" id="chn_user" placeholder="Username" required>
                      </div>
					  <div class="form-group">
                        <label for="exampleInputUsername1">User Control</label>
                            <select class="form-control" id="user_type" name="user_type">
					                                  <option>--SELECT USER TYPE--</option>
					                                   <option value="MASTER">MASTER</option>
					                                   <option value="ENDUSER">END USER</option>
				                                       </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" class="form-control" name = "chn_pass" id="chn_pass" placeholder="Password" required>
                      </div>
                      <button type="submit"  name="add_user" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			
<?php
if(isset($_POST['add_user'])) {
    $ad_user = trim($_POST['chn_user']);
    $ad_pass = trim($_POST['chn_pass']);
	$user_type = trim($_POST['user_type']);

    // Check if the username already exists
    $sql = "SELECT admin_username FROM admin_login WHERE admin_username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $ad_user);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Username already exists. Try with another name');
        window.location.href='add_user.php';
        </script>");
    } else {
        // Function to encrypt the password
        function encryptPassword($ad_pass) {
            // Choose an appropriate encryption algorithm (e.g., bcrypt)
            $hashedPassword = password_hash($ad_pass, PASSWORD_DEFAULT);
            return $hashedPassword;
        }
        
        $encryptedPassword = encryptPassword($ad_pass);

        // Insert the user with a prepared statement

        $sql1 = "INSERT INTO admin_login (admin_username, admin_password, user_type, cur_status, created_date) 
		VALUES (?, ?, ?, 'ACTIVE', ?)";
        $stmt = $con->prepare($sql1);
        $stmt->bind_param("ssss", $ad_user, $encryptedPassword, $user_type, $current_datetime);
		

        
        if ($stmt->execute()) {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_user.php';
            window.alert('User Successfully Added');
            </script>");
        } else {
           die('Could not enter data: ' . $stmt->error . ' (' . $stmt->errno . ')');

        }
    }
    $stmt->close();
}
?>


	
			 <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">View Login User</h4>
<?php
	$stmt = $con->prepare("SELECT id, admin_username, user_type, cur_status, created_date FROM admin_login ORDER BY cur_status");
$stmt->execute();
$result = $stmt->get_result();
if(! $result)
{
  die('Could not enter data: ' . mysqli_error($con));
}

if ($result->num_rows > 0) {
?>
                       <div class="table-responsive" style="height: 300px;">
                      <table class="table">
                        <thead>
                          <tr>
						     <th> No. </th>
                            <th> Username </th>
                            <th> User Control </th>
                            <th> Created date</th>
                            <th> Current Status </th>
							<th>Change To</th>
                          </tr>
                        </thead>
	<?php
		$counter = 0;
       while($row = $result->fetch_array()) {              
?>
                        <tbody>
                          <tr>
						    <td> <?php echo ++$counter; ?> </td>
                            <td> <?php echo $row['admin_username']; ?> </td>
                            <td> <?php echo $row['user_type']; ?> </td>
                            <td> <?php echo date("d-m-Y H:i", strtotime($row['created_date'])); ?> </td>
                            <td><?php echo $row['cur_status']; ?></td>
							<td>
							<?php if ($row['cur_status'] == 'ACTIVE')
							{
  echo "<a class='badge badge-outline-success' onClick=\"javascript: return confirm('Confirm User Inactive');\" href=\"change_user_status.php?ids=".$row["id"]."\">CHANGE TO INACTIVE</a>";	
							}
							else
							{
  echo "<a class='badge badge-outline-danger' onClick=\"javascript: return confirm('Confirm User Active');\" href=\"change_user_status.php?ids=".$row["id"]."\">CHANGE TO ACTIVE</a>";		
							}
							?>
                            </td>
							
                          </tr>
                        </tbody>
						<?php
	   }

?>
                      </table>
                    </div>
<?php
}
else {
    echo "No user added";	
}
// Close the database connection
$con->close();
?>
					
                  </div>
                </div>
              </div>
            </div>		
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../partials/_footer.html -->
<script>
function validation() {
    var username = document.forms["add_user"]["chn_user"].value;
    var password = document.forms["add_user"]["chn_pass"].value;
    var userType = document.forms["add_user"]["user_type"].value;

    // Regular expression to check if the username contains only letters, numbers, and spaces
    var usernameRegex = /^[a-zA-Z0-9\s]+$/;

    if (username === "") {
        alert("Username must be filled out");
        return false;
    }

    if (!username.match(usernameRegex)) {
        alert("Username should only contain letters, numbers, and spaces");
        return false;
    }

    if (userType === "--SELECT USER TYPE--") {
        alert("Please select a user type");
        return false;
    }

    if (password === "") {
        alert("Password must be filled out");
        return false;
    }

    // You can add more validation rules here if needed

    return true; // Form will be submitted if all conditions are met
}

</script>


<?php 
include("footer.php");  
}
else
{
header("Location:index.php");
}
?>