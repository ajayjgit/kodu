<?php
session_start();
include("../conn1.php");

if (isset($_SESSION["kodu_admin_usertype"]) && ($_SESSION["kodu_admin_usertype"] == 'MASTER') && isset($_SESSION["kodu_admin_username"])) {
    $id = (isset($_GET['ids'])) ? intval($_GET['ids']) : 0;
    
    if ($id > 0) {
        // Check if there is at least one user with cur_status = 'ACTIVE' other than the selected user
        $sqlCheckActiveUsers = "SELECT COUNT(*) FROM admin_login WHERE cur_status = 'ACTIVE' AND id != ?";
        $stmtCheckActiveUsers = $con->prepare($sqlCheckActiveUsers);
        $stmtCheckActiveUsers->bind_param("i", $id);
        
        if ($stmtCheckActiveUsers->execute()) {
            $stmtCheckActiveUsers->store_result();
            $stmtCheckActiveUsers->bind_result($activeUserCount);
            $stmtCheckActiveUsers->fetch();
            
            if ($activeUserCount > 0) {
                // There is at least one user with cur_status = 'ACTIVE' other than the selected user
                $sql2 = "SELECT cur_status FROM admin_login WHERE id = ?";
                $stmt2 = $con->prepare($sql2);
                $stmt2->bind_param("i", $id);
                
                if ($stmt2->execute()) {
                    $stmt2->store_result();
                    
                    if ($stmt2->num_rows > 0) {
                        $stmt2->bind_result($cur_status);
                        $stmt2->fetch();
                        
                        $new_status = ($cur_status === 'INACTIVE') ? 'ACTIVE' : 'INACTIVE';
                        
                        $sql1 = "UPDATE admin_login SET cur_status = ? WHERE id = ?";
                        $stmt1 = $con->prepare($sql1);
                        $stmt1->bind_param("si", $new_status, $id);
                        
                        if ($stmt1->execute()) {
                            echo ("<script LANGUAGE='JavaScript'>
                            window.location.href='add_user.php';
                            window.alert('User Status changed Successfully');
                            </script>");
                        } else {
                            die('Could not update user status: ' . $stmt1->error . ' (' . $stmt1->errno . ')');
                        }
                    } else {
                        echo ("<script LANGUAGE='JavaScript'>
                            window.location.href='add_user.php';
                            window.alert('User not found');
                            </script>");
                    }
                } else {
                    die('Could not retrieve user status: ' . $stmt2->error . ' (' . $stmt2->errno . ')');
                }
                
                $stmt2->close();
                $stmt1->close();
            } else {
                echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='add_user.php';
                    window.alert('Atleast one User should present as ACTIVE');
                    </script>");
            }
        } else {
            die('Could not check active users: ' . $stmtCheckActiveUsers->error . ' (' . $stmtCheckActiveUsers->errno . ')');
        }
        
        $stmtCheckActiveUsers->close();
    } else {
        echo ("<script LANGUAGE='JavaScript'>
            window.location.href='add_user.php';
            window.alert('Invalid user ID');
            </script>");
    }
    $con->close(); 
} else {
    header("Location:index.php");
}
?>
