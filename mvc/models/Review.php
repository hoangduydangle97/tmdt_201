<?php
class Review extends Database{
    public function get_all_reviews($id_item){
        $sql = "SELECT rating_user_item.*, user.username_user, user.fname_user,".
        " user.lname_user, user.avatar_user".
        " FROM rating_user_item LEFT JOIN user". 
        " ON rating_user_item.username_user_rating=user.username_user". 
        " WHERE id_item_rating='".$id_item."';";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function insert_review($username, $item, $rating, $comment){
        $sql = "INSERT INTO rating_user_item (username_user_rating, id_item_rating,".
        " rating, review, date_rating) VALUES ('".$username."', '".$item."', '".
        $rating."', '".$comment."', CURRENT_TIMESTAMP());";
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            header("location: http://localhost".$_SESSION['path']);
        }
    }

    public function update_review($username, $item, $date ,$rating, $comment){
        $sql = "UPDATE rating_user_item SET rating='".$rating.
        "', review='".$comment."', date_rating=CURRENT_TIMESTAMP() WHERE username_user_rating='".
        $username."' AND id_item_rating='".$item."' AND date_rating='".$date."';";
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            header("location: http://localhost".$_SESSION['path']);
        }
    }

    public function delete_review($username, $item, $date){
        $sql = "DELETE FROM rating_user_item WHERE username_user_rating='".
        $username."' AND id_item_rating='".$item."' AND date_rating='".$date."';";
        //echo $sql;
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            header("location: http://localhost".$_SESSION['path']);
        }
    }
}
?>