<?php include('../includes/authentication.php'); 
    // // Prepare the SQL statement with a placeholder for the email parameter
    // $stmt = $con->prepare('SELECT COUNT(*) as count FROM user WHERE email = ?');

    // // Bind the email parameter to the placeholder and execute the statement
    // $stmt->bind_param('s', $_POST['email']);
    // $stmt->execute();

    // // Fetch the result as an associative array
    // $result = $stmt->get_result()->fetch_assoc();

    // // Return the result as JSON
    // header('Content-Type: application/json');
    // echo json_encode(array('exists' => ($result['count'] > 0)));

    // Prepare the SQL statement with placeholders for the email, phone, and reference_number parameters
    $stmt = $con->prepare('SELECT COUNT(*) as count FROM user WHERE email = ? OR phone = ? OR student_id = ?');

    // Bind the parameters to the placeholders and execute the statement
    $stmt->bind_param('sss', $_POST['email'], $_POST['phone'], $_POST['student_id']);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->get_result()->fetch_assoc();

    // Return the result as JSON
    header('Content-Type: application/json');
    echo json_encode(array('exists' => ($result['count'] > 0)));
?>