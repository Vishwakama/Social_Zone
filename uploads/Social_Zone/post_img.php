<?php

include('php/config.php');
$res = mysqli_query($conn,"SELECT * FROM admin_post WHERE post_action = '1'");
while($rows = $res->fetch_array()){
    $image = $rows['post'];
    echo "<img src='images/".$image."' />";
}
?>