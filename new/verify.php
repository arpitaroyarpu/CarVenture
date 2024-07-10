<?php
require 'config.php';

if (isset($_GET['r_email']) && isset($_GET['v_code'])) {
    $r_email = mysqli_real_escape_string($conn, $_GET['r_email']);
    $v_code = mysqli_real_escape_string($conn, $_GET['v_code']);

    $query = "SELECT * FROM `register` WHERE `db_email` = '$r_email' AND `verification_code` = '$v_code'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['is_verified'] == 0) {
                $update = "UPDATE `register` SET `is_verified` = '1' WHERE `db_email` = '$r_email'";
                if (mysqli_query($conn, $update)) {
                    echo "
                        <script>
                        alert('Email verification successful');
                        location.href='login.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                        alert('Cannot run update query: " . mysqli_error($conn) . "');
                        location.href='registration.php';
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                    alert('Email already registered');
                    location.href='login.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                alert('Email or verification code is incorrect.');
                location.href='registration.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
            alert('Cannot run select query: " . mysqli_error($conn) . "');
            location.href='registration.php';
            </script>
        ";
    }
}
?>