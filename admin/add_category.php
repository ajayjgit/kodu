<?php
session_start();
if (isset($_SESSION["kodu_admin_usertype"]) && ($_SESSION["kodu_admin_usertype"] == 'MASTER') && isset($_SESSION["kodu_admin_username"])) {
 
include("header.php");

?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Add Category</h3>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" name = "add_cat1" action="" method="post" enctype="multipart/form-data" onsubmit = "return validation()">
					 <div class="form-group">
					 <label class="form-check-label" for="form-sh1">Thumbnail image : </label>
					<input type="file" class="form-control" name="imageUpload" id="imageUpload" required>						
					</div>
                      <img id="selectedImage" src="#" alt="Selected Image" style="display: none; max-width: 100px;">	
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category : </label>
                        <input type="text" class="form-control" name = "chn_user" id="chn_user" required>
                      </div>
                      <button type="submit"  name="add_category" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			
<?php
if(isset($_POST['add_category'])) {
    $ad_user = trim($_POST['chn_user']);
	
    // Check if the category already exists
    $sql = "SELECT category_name FROM prd_category WHERE category_name = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $ad_user);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Category already exists. Try with another name');
        window.location.href='add_category.php';
        </script>");
    } else {
		
				if($_FILES['imageUpload']['name']){
		$time = date("d-m-Y")."-".time();
 
		$fileName = $_FILES['imageUpload']['name'];
		$fileName1 = $time."-".$fileName ;
 
		move_uploaded_file($_FILES['imageUpload']['tmp_name'], "../products_images/".$fileName1);
		
	}
	else{
		echo "Something went wrong";
	}
        // Insert the user with a prepared statement

        $sql1 = "INSERT INTO prd_category (category_name, images, created_by_id, created_date) 
		VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql1);
        $stmt->bind_param("ssis", $ad_user, $fileName1, $login_id ,$current_datetime);
		
        if ($stmt->execute()) {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_category.php';
            window.alert('Category Successfully Added');
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
                    <h4 class="card-title">View Category</h4>
<?php
$stmt = $con->prepare("SELECT id, category_name, images, created_date, updated_by_id, updated_date FROM prd_category ORDER BY id desc");
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
							<th> Images </th>
                            <th> Category </th>
                            <th> Created date </th>
                            <th> Updated date</th>
                            <th> Edit </th>
							 <th>Delete</th>
                          </tr>
                        </thead>
	<?php
		$counter = 0;
       while($row = $result->fetch_array()) {              
?>
                        <tbody>
                          <tr>
						    <td> <?php echo ++$counter; ?> </td>
							<td>
						<div class="preview-thumbnail">
                          <img src="<?php echo "../products_images/$row[images]"; ?>" alt="image" style="width:50px; height:50px;" class="rounded-circle" />
                        </div>
						</td>
                            <td> <?php echo $row['category_name']; ?> </td>
                            <td> <?php echo date("d-m-Y H:i", strtotime($row['created_date'])); ?> </td>
                            <td>
							<?php if ($row['updated_by_id'] != 0)
							{
								 echo date("d-m-Y H:i", strtotime($row['updated_date'])); 
							}
							?>
                            </td>
							<?php 
  echo "<td><a class='badge badge-outline-warning' onClick=\"javascript: return confirm('Confirm Edit');\" href=\"edit_category.php?ids=".$row["id"]."\">EDIT</a></td>";	

  echo "<td><a class='badge badge-outline-danger' onClick=\"javascript: return confirm('Confirm Delete');\" href=\"delete_category.php?ids=".$row["id"]."\">DELETE</a></td>";		
							?>
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
    echo "No Category added";	
}

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
    var category = document.getElementById("chn_user").value;
	var imageUpload = document.getElementById("imageUpload").value;

    // Regular expression to check if the category contains only letters, numbers, and spaces
    var categoryRegex = /^[a-zA-Z0-9 ]+$/;

    if (category === "") {
        alert("Category must be filled out");
        return false;
    }

    if (!category.match(categoryRegex)) {
        alert("Category should only contain letters, numbers, and spaces");
        return false;
    }
	    // Validate image name to not contain a comma ","
    if (imageUpload.includes(",")) {
        alert("Image name cannot contain a comma (,).");
        return false;
    }

    // You can add more validation rules here if needed
    return true; // Form will be submitted if all conditions are met
}

	  </script>
	  <script>
  document.getElementById("imageUpload").addEventListener("change", function(event) {
    var selectedImage = document.getElementById("selectedImage");
    selectedImage.style.display = "block";
    selectedImage.src = URL.createObjectURL(event.target.files[0]);
  });
</script>
<?php 
include("footer.php");  
}
else
{
header("Location:index.php");
}
?>