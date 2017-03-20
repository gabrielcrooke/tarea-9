<?php

/**
 *
 */
//build a conexion and do things
class userModel extends conexion
{
  private $user_Id;

  //method construct??
  function __construct()
  {
    parent::__construct();
  }

  // select the user from the BD
  function select_User($data)
{
   $have_User = false;
  //  check if the values are empty did this before i don't what is doing this here but i left it
   if (!empty($data['user']) AND !empty($data['pass']) )
   {
     $user = $this->real_escape_string($data["user"]);
     $pass = $data["pass"];

    //  query
    $query = $this->query("SELECT * FROM users WHERE (user = '$user' OR email = '$user') AND pass = '$pass' LIMIT 1");

    // check the query
    if ($this->rows($query) > 0)
    {
      //user exist
      $have_User = true;
      $this->user_Id = $this->fetch_A($query)[0];
    }

    else
    {
      //Don't exist user
      $have_User = false;
    }

    // free result php function
    $this->free_R($query);

   }

   return $have_User;
 }

 public function new_User($data)
 {
   $OK = false;
   $user = $this->real_escape_string($data['user']);
   $email = $this->real_escape_string($data['email']);
   $pass = $data['pass'];

    $query = $this->query("SELECT * FROM users WHERE (user = '$user' OR email = '$email') LIMIT 1");

    if ($this->rows($query) > 0)
    {
      echo '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>ERROR:</strong> Usuario Existe!!!.
            </div>';

      return $OK = false;
    }

    else
    {
      $query2 = $this->query("INSERT INTO users (user, email, pass) VALUES ('$user', '$email', '$pass') ;");
      return $OK = true;
    }
 }

 public function getUserId()
 {
  //  get the int value
   return intval($this->user_Id);
 }

// get the info of the user form the BD
 public function userInfo($id)
 {
   $query = $this->query("SELECT * FROM users");

   if ($this->rows($query) > 0)
   {
    //  storage the info of the user
     while ($u = $this->fetch_A($query))
     {
       $userInfo[$u['id_user']] = array(
         'id' => $u['id_user'],
         'user' => $u['user'],
         'pass' => $u['pass'],
         'email' => $u['email']
       );
     }
   }

   else
   {
    $userInfo = false;
   }
    return $userInfo;
 }
 // um??
 public function getLastId()
 {
   return $this->insert_id;
 }

 // get the comments with answers
 public function getComments()
 {
   $sql = "SELECT comments.comment,  comments.date, comments.id_user,comments.id_comment AS comment_id,
           users.user FROM comments INNER JOIN users ON comments.id_user = users.id_user ORDER BY comments.date DESC";

    $sql2 = "SELECT replies.id_user, replies.id_Rcomment, replies.replieContent, replies.dateReplie, comments.id_comment,
            users.user FROM replies LEFT JOIN users ON replies.id_user = users.id_user LEFT JOIN
            comments ON replies.id_Rcomment = comments.id_comment;";

           $query2 = $this->query($sql2);
           $query = $this->query($sql);

           if ($this->rows($query) >0 )
           {
              while ($row = $this->fetch_A($query))
              {
                $comments [] = $row;
              }
           }

           if ($this->rows($query2) >0 )
           {
              while ($row2 = $this->fetch_A($query2))
              {
                $replies [] = $row2;
              }
            }
            // do the same with the id of the comment
            foreach ($comments as $comment)
            {
              echo '<div class="comment-main-level">
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                    <!-- comment-box -->
                    <div class="comment-box">
                    <div class="comment-head">
                    <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">'.$comment['user'].'</a></h6>
                    <span>'.$comment['date'].'</span>
                    <i class="fa fa-reply"></i>
                    <i class="fa fa-heart"></i>
                    </div>
                    <div class="comment-content">'.$comment['comment'].'</div></p>
                    <textarea name="" id="comment'.$comment['comment_id'].'" rows="2" cols="95" placeholder="responder"></textarea>
                    <button type="submit" class="btn btn-success" onclick = "userReply('.$comment['comment_id'].')" name="button">Responder</button>
                    </div>
                    </div></p>';
                foreach ($replies as $replie)
                  {

                  if ($comment['comment_id'] === $replie['id_Rcomment'])
                    {
                      echo '<!-- replies comment -->
                            <ul class="comments-list reply-list">
                            <li>
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                            <!-- comment-box -->
                            <div class="comment-box">
                            <div class="comment-head">
                            <h6 class="comment-name"><a href="http://creaticode.com/blog">'.$replie['user'].'</a></h6>
                            <span>'.$replie['dateReplie'].'</span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">'.$replie['replieContent'].'</div></p>
                            </div>
                            </li>
                            </ul>';

                      }
                    }
                  }
}

public function comment($c)
{
  $comment = $this->real_escape_string($c);
  $this->query("INSERT INTO comments (id_user, comment) VALUES ('$_SESSION[user_id]','$comment')");

  echo 1;
}
public function reply($c,$id)
{
  $comment = $this->real_escape_string($c);
  $this->query("INSERT INTO replies (id_Rcomment, id_user, replieContent) VALUES ('$id', '$_SESSION[user_id]', '$comment')");

  echo 1;
}

// close the conection of the BD for query injections
 public function closeDB()
 {
   $this->close();
 }
}

?>
