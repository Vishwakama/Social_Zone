<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['admin_unique_id'];
    $output = "";
    $query = mysqli_query($conn,"SELECT * FROM `admin_dtls` where admin_unique_id in (SELECT outgoing_msg_id FROM `messages` where incoming_msg_id='$outgoing_id') or admin_unique_id in (SELECT incoming_msg_id FROM `messages` where outgoing_msg_id='$outgoing_id')")or die(mysql_error());
    while($row = mysqli_fetch_assoc($query)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_unique_id']}
            OR outgoing_msg_id = {$row['admin_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if(isset($row2['outgoing_msg_id']))
    {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    }
    else
    {
        $you = "";
    }
    ($row['admin_status'] == "Offline now") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['admin_unique_id']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '<a href="chat.php?user_id='. $row['admin_unique_id'] .'">
                <div class="content">
                <img src="images/user3.jpg" alt="">
                <div class="details">
                    <span>'. $row['admin_fname']." ". $row['admin_lname']. '</span>
                    <p>'. $you . $msg .'</p>
                </div>
                </div>
                <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
            </a>';
        }
        echo $output;
       /* if($outgoing_id == true)
        {
            $query = mysqli_query($conn,"SELECT * FROM `admin_dtls` where admin_unique_id in (SELECT outgoing_msg_id FROM `messages` where incoming_msg_id='$outgoing_id') or admin_unique_id in (SELECT incoming_msg_id FROM `messages` where outgoing_msg_id='$outgoing_id')")or die(mysql_error());
            while($row = mysqli_fetch_assoc($query)){
                $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_unique_id']}
                        OR outgoing_msg_id = {$row['admin_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if(isset($row2['outgoing_msg_id']))
                {
                    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                }
                else
                {
                    $you = "";
                }
                ($row['admin_status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['admin_unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
                $output .= '<a href="chat.php?user_id='. $row['admin_unique_id'] .'">
                            <div class="content">
                            <img src="images/user3.jpg" alt="">
                            <div class="details">
                                <span>'. $row['admin_fname']." ". $row['admin_lname']. '</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
            }
        }
        else
        {
            $follower = mysqli_query($conn,"SELECT * FROM `admin_dtls` where admin_unique_id in (SELECT outgoing_msg_id FROM `messages` where incoming_msg_id='$outgoing_id') or admin_unique_id in (SELECT incoming_msg_id FROM `messages` where outgoing_msg_id='$outgoing_id')")or die(mysql_error());
            while($row = mysqli_fetch_assoc($follower)){
                $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_unique_id']}
                        OR outgoing_msg_id = {$row['admin_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if(isset($row2['outgoing_msg_id']))
                {
                    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                }
                else
                {
                    $you = "";
                }
                ($row['admin_status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['admin_unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
                $output .= '<a href="chat.php?user_id='. $row['admin_unique_id'] .'">
                            <div class="content">
                            <img src="images/user3.jpg" alt="">
                            <div class="details">
                                <span>'. $row['admin_fname']." ".$row['admin_lname']. '</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
            }
        }
    */    
        /*-------------------------------------------------------------------------------------------------
    $outgoing_id = $_SESSION['admin_unique_id'];
    $output = "";
    $post = mysqli_query($conn,"SELECT * FROM follow_system WHERE follower_id = '$outgoing_id' OR following_id = '$outgoing_id' ")or die(mysql_error());
    $num_rows  =mysqli_num_rows($post);
    if ($num_rows != 0 )
    {
        while($row1 = mysqli_fetch_array($post)){
        $following_id = $row1['following_id'];
        $follower_id = $row1['follower_id'];
        if($following_id == $outgoing_id)
        {
            $query = mysqli_query($conn,"SELECT * FROM admin_dtls WHERE admin_unique_id = '$follower_id'")or die(mysql_error());
            while($row = mysqli_fetch_assoc($query)){
                $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_unique_id']}
                        OR outgoing_msg_id = {$row['admin_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if(isset($row2['outgoing_msg_id']))
                {
                    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                }
                else
                {
                    $you = "";
                }
                ($row['admin_status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['admin_unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
                $output .= '<a href="chat.php?user_id='. $row['admin_unique_id'] .'">
                            <div class="content">
                            <img src="images/user3.jpg" alt="">
                            <div class="details">
                                <span>'. $row['admin_fname']." ". $row['admin_lname']. '</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
            }
        }
        else
        {
            $follower = mysqli_query($conn,"SELECT * FROM admin_dtls WHERE admin_unique_id = '$following_id'")or die(mysql_error());
            while($row = mysqli_fetch_assoc($follower)){
                $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['admin_unique_id']}
                        OR outgoing_msg_id = {$row['admin_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                $query2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($query2);
                (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if(isset($row2['outgoing_msg_id']))
                {
                    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                }
                else
                {
                    $you = "";
                }
                ($row['admin_status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['admin_unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
                $output .= '<a href="chat.php?user_id='. $row['admin_unique_id'] .'">
                            <div class="content">
                            <img src="images/user3.jpg" alt="">
                            <div class="details">
                                <span>'. $row['admin_fname']." ".$row['admin_lname']. '</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
            }
        }
    }
}
    else
    {
        echo "<h4 align='center'>You don't have any friends  </h4>";
    }
    echo $output;*/
?>