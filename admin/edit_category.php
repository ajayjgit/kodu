<?php
session_start();
include("../conn1.php");
if (isset($_SESSION["kodu_admin_usertype"]) && ($_SESSION["kodu_admin_usertype"] == 'MASTER') && isset($_SESSION["kodu_admin_username"])) {
 
		
include("header.php");  
    $id = (isset($_GET['ids'])) ? intval($_GET['ids']) : 0;
    
    if ($id > 0) {

        $sql3 = "SELECT * FROM prd_category WHERE id = ?";
        $stmt3 = $con->prepare($sql3);
        $stmt3->bind_param("i", $id);
        $stmt3->execute();
        $result3 = $stmt3->get_result();

        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_array();
            $name = $row3['category_name'];
			$image= $row3['images'];

if (isset($_POST['edit_category'])) {
    $ed_cat_name = trim($_POST['cat_name']);
    $fileName1 = $image; // Set to the existing image by default

    if (isset($_FILES['imageUpload']) && is_uploaded_file($_FILES['imageUpload']['tmp_name'])) {
        // Upload the new image
        $time = date("d-m-Y") . "-" . time();
        $fileName = $time . "-" . $_FILES['imageUpload']['name'];
        move_uploaded_file($_FILES['imageUpload']['tmp_name'], "../products_images/" . $fileName);

        // Delete the old image
        $path = "../products_images";
        if (file_exists($path . "/" . $image)) {
            unlink($path . "/" . $image) or die("Failed to delete file");
        }

        $fileName1 = $fileName; // Set the new image name
    }

    // Check if the category name is not changed
    if ($ed_cat_name == $name) {
                  // Update only image
            $sql1 = "UPDATE prd_category SET images = ?, updated_by_id = ?, updated_date = ? WHERE id = ?";
            $stmt1 = $con->prepare($sql1);
            $stmt1->bind_param("sisi", $fileName1, $login_id,$current_datetime , $id);

            if ($stmt1->execute()) {
                $stmt1->close(); // Close the prepared statement
                echo ("<script LANGUAGE='JavaScript'>
                window.location.href='add_category.php';
                window.alert('Category Successfully Updated');
                </script>");
            } else {
                // Handle the case where the update failed
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Error updating category. Please try again.');
                </script>");
            }
    } else {
        // Perform category name validation
        $sql2 = "SELECT * FROM prd_category WHERE category_name = ?";
        $stmt2 = $con->prepare($sql2);
        $stmt2->bind_param("s", $ed_cat_name);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $count = $result2->num_rows;

        if ($count == 0) {
            // Update the category name
            $sql1 = "UPDATE prd_category SET category_name = ?, images = ?, updated_by_id = ?, updated_date = ? WHERE id = ?";
            $stmt1 = $con->prepare($sql1);
            $stmt1->bind_param("ssisi", $ed_cat_name, $fileName1, $login_id, $current_datetime, $id);

            if ($stmt1->execute()) {
                $stmt1->close(); // Close the prepared statement
                echo ("<script LANGUAGE='JavaScript'>
                window.location.href='add_category.php';
                window.alert('Category Successfully Updated');
                </script>");
            } else {
                // Handle the case where the update failed
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Error updating category. Please try again.');
                </script>");
            }
        } else {
			       // Update only image
            $sql1 = "UPDATE prd_category SET images = ?, updated_by_id = ?, updated_date = ? WHERE id = ?";
            $stmt1 = $con->prepare($sql1);
            $stmt1->bind_param("sisi", $fileName1, $login_id ,$current_datetime , $id);

            if ($stmt1->execute()) {
			
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Category already exists. Try with another name.');
            window.location.href='add_category.php';
            </script>");
			}
        }
        $stmt2->close(); // Close the prepared statement
    }
}


            $stmt3->close(); // Close the prepared statement
        } 
		else {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_category_1.php';
            window.alert('Invalid user ID');
            </script>");
        }
         
?>			   
			      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Edit Category</h3>

            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" name = "edit_cat" action="" method="post" enctype="multipart/form-data" onsubmit = "return validation()">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" class="form-control" name = "cat_name" id="cat_name" value="<?php echo $name; ?>" required>
                      </div>
					  	 <div class="form-group">
						<div class="col-md-3 col-6 my-auto"><img src='<?php echo "../products_images/$image"; ?>' class="w-100"> </div> 
							<label >Replace image if required</label>
					 <input type="file" class="form-control" name="imageUpload" id="imageUpload"/>
					</div>
                      <button type="submit"  name="edit_category" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			</div>
			
		  <script>
function validation() {
    var category = document.getElementById("cat_name").value;
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
<?php
}
else
{
 echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_category.php';
            window.alert('Invalid user ID');
            </script>");
}
$con->close(); 
include("footer.php");
    }
else
{
header("Location:index.php");
}
?> 
 
 
 
