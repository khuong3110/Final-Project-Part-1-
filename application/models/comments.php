<?php
class Comments extends Model{

    function getComments($postID){

        $sql =  'SELECT * from comments WHERE postID = ' . $postID . ' ORDER BY date desc';

        // perform query
        $results = $this->db->execute($sql);

        $comments = $results;

        return $comments;

    }

    function addComment($data){
        $sql='INSERT INTO comments (commentText,date,postID,uID) VALUES (?,?,?,?)';
        $this->db->execute($sql,$data);
        $message = 'Post added.';
        return $message;
    }

    function deleteComment($cID){
        $sql='DELETE from comments WHERE commentID=?';
        $this->db->execute($sql, array($cID));
        $message = 'Comment Removed';
        return $message;
    }






}