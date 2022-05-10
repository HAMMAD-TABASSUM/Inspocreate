<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <?php foreach ($posts as $post): ?>
  <div class="post-info">
      	<i <?php if (userLiked($post['id'])): ?>
      		  class="fa fa-heart like-btn"
      	  <?php else: ?>
      		  class="fa fa-heart-o like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
          
      	<span class="likes"><?php echo getLikes($post['id']); ?></span>
   	</div>
   <?php endforeach ?>
  <script src="scripts.js"></script>
</body>
</html>