<?php
session_start();
include("../conn1.php");

if (isset($_SESSION['kodu_admin_id'], $_SESSION['kodu_admin_user']) && isset($_SESSION['kodu_admin_control']) &&
    ($_SESSION['kodu_admin_control'] == 'MASTER' || $_SESSION['kodu_admin_control'] == 'ENDUSER')) {	
		
    $id = (isset($_GET['ids'])) ? intval($_GET['ids']) : 0;
    
    if ($id > 0) {

        // Check if the category is associated with category_2
        $sql2 = "SELECT category_id  FROM product_details WHERE category_id = ?";
        $stmt2 = $con->prepare($sql2);
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            echo ("<script LANGUAGE='JavaScript'>
                window.location.href='add_category.php';
                window.alert('This Category is associated with Product. Please delete Product with this Category.');
                </script>");
        } else {
            $stmt2->close(); // Close the prepared statement

         // Prepare a SELECT statement to retrieve primary_images
		$path = "../products_images";
		 
        $sql3 = "SELECT images FROM prd_category WHERE id = ?";
        $stmt3 = $con->prepare($sql3);
        $stmt3->bind_param("i", $id);
        $stmt3->execute();
        $stmt3->store_result();

        if ($stmt3->num_rows > 0) {
            $stmt3->bind_result($image);
            $stmt3->fetch();

            // Delete the file if it exists
            if (file_exists($path . "/" . $image)) {
                unlink($path . "/" . $image) or die("Failed to delete file");
            }

            // Prepare a DELETE statement
            $sql1 = "DELETE FROM prd_category WHERE id = ?";
            $stmt = $con->prepare($sql1);
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo ("<script LANGUAGE='JavaScript'>
                window.location.href='add_category.php';
                window.alert('Category deleted Successfully');
                </script>");
            } else {
                die('Could not delete data: ' . $stmt->error);
            }
        } else {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_category.php';
            window.alert('Invalid user ID');
            </script>");
        }
        }
// Close the database connection
$con->close();
    } 
	else {
 echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_category.php';
            window.alert('Invalid user ID');
            </script>");
    }
} else {
    header("Location:index.php");
}
?>
