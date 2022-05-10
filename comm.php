<?php
session_start();
$cons = new mysqli('localhost', 'root', '', 'inspocreate');
if (isset($_POST['addComment'])) {
  $comment = $cons->real_escape_string($_POST['comment']);
  // echo $_SESSION['id'];

  $cons->query("INSERT INTO comments (userID, comment, createdOn) VALUES ('".$_SESSION['id']."','$comment',NOW())");
  exit('success');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>comment systems</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<style>
  .user {
    font-weight: bold;
    color: black;
  }
  .time {
    color: gray;
  }
  .userComment {
    color: #000;
  }

  .replies .comment {
    margin-top: 20px;
  }
  .replies {
    margin-left: 20px;
  }

  .combtn {
    margin-top: 20px;
  }
</style>
<body>
  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-12" align="right">
        <button class="btn btn-primary">Register</button>
        <button class="btn btn-success">Log in</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" align="center" style="margin: 20px 0;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ckxlnISsa88" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <textarea class="form-control mainComment" name="" cols="30" rows="2" placeholder="Add Public Comment"></textarea>
        <button style="float: right;" class="btn-primary btn combtn addComment">Add Comment</button>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h2><b>335 Comments</b></h2>
        <div class="userComments">
          <div clr
            <div class="user">Senaid B <span class="time">2019-07-15</span></div>
            <div class="userComment">this is my comment</div>
            <div class="replies">
              <div clasr
                <div class="user">Senaid B <span class="time">2019-07-15</span></div>
                <div class="userComment">this is my comment</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".addComment").on('click', function () {
        var comment = $(".mainComment").val();
        // console.log(comment);
        if (comment.length > 5) {
          $.ajax({
            url: 'comm.php',
            method: 'POST',
            dataType: 'text',
            data: {
              'addComment': 1,
              'comment':comment
            }, success: function (response) {
              console.log (response,"response");
            }
          });
        } else{
          alert('please check your input');
        }
        
      });
    });
  </script>
</body>
</html>