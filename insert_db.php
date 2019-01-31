<?php
    //header("Content-Type: application/json; charset=utf-8");
    require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );

    if(isset($_POST["submit"])) {

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    $firstname=sanitize_text_field($_POST["firstname"]);
    $lastname=sanitize_text_field($_POST["lastname"]);
    $email=sanitize_text_field($_POST["email"]);
    $message=sanitize_text_field($_POST["message"]);
    
    $firstname=test_input($firstname);
    $lastname=test_input($lastname);
    $email=test_input($email);
    $message=test_input($message);

    global $wpdb;
    
    $tablename = $wpdb->prefix.'table_test';
    
    $data=array(
    'firstname'=>$firstname,
    'lastname'=>$lastname,
    'email'=>$email,
    'message'=>$message
    );
    $format=array('%s','%s','%s','%s');

    $insert=$wpdb->insert($tablename,$data,$format);
    if($insert){
        echo "\nInsert Done";
        header('Refresh: 3; URL=/wordpress/');
    }else
    {
        $wpdb->show_errors();
    }
    
    }
?>