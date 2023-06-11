<?php 


function check_login($con,$user_id){
    $id = $user_id;
    $query = "select * from users where id = '$id' limit 1 ";
    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) > 0){

        $user_data = mysqli_fetch_assoc($result);
        return $user_data;

    }
    return NULL;
}



function get_user_by_id($con,$user_id)
{
	$query = "select * from users where id = '$user_id' ";
	$result = mysqli_query($con,$query);
	$user_data = mysqli_fetch_assoc($result);
	return $user_data;
}

function get_user_by_email($con,$email){
    $query = "select * from users where email = '$email' ";
	$result = mysqli_query($con,$query);
	$user_data = mysqli_fetch_assoc($result);
	return $user_data;
}

function get_comment_by_id_user($con,$user_id)
{
	$query = "select * from commentaires where id_user = '$user_id' ";
	$result = mysqli_query($con,$query);
	$user_data = mysqli_fetch_assoc($result);
	return $user_data;
}



