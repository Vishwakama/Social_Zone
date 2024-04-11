<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['admin_unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM admin_dtls WHERE NOT admin_unique_id = {$outgoing_id} AND (admin_fname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_unique_id']}
                OR outgoing_msg_id = {$row['admin_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['admin_status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['admin_unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['admin_unique_id'] .'">
                    <div class="content">
                    <img src="images/user3.jpg" alt="">
                    <div class="details">
                        <span>'. $row['admin_fname']." ".$row['admin_lname'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>