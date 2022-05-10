<?php 

include 'processForm.php';

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image preview and upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-96 mx-auto mt-20">
    <table class="table-auto">
  <thead>
      <th class="pr-4">Profile Image</th>
      <th>Bio</th>
  </thead>
  <tbody>
      <?php foreach($users as $user): ?>

        <tr class="pr-4">
            <td>
                <img src="images/<?php echo $user['profile_image']; ?> "width="80 rounded=full" />
            </td>
            <td>
                <?php echo $user['bio']; ?>
            </td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    </div>
</body>
</html>