<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAge Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header  text-center bg-primary text-white text-uppercase">
							Multiple Images in Single Colomn from Multiple Input Field
						</div>
						<div class="card-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Name</label>
								<input type="text" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 1</label>
								<input type="file" name="img" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 2</label>
								<input type="file" name="img" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 3</label>
								<input type="file" name="img" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 4</label>
								<input type="file" name="img" class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary
									">
								</div>
								
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
	include 'config.php';
	$name=$_POST['id'];
	$location="upload/";
	$file=$_FILES['img']['name'];
	$file_tmp=$_FILES['img']['tmp_name'];
	$data=[];
	$data=[$file];
	$images=implode(' ',$data);
	$query="UPDATE test SET images=\"{$_FILES}\" WHERE id={$name}";
	$fire=mysqli_query($con,$query);
	// if($fire)
	// {
	// 	move_uploaded_file($file_tmp1, $location.$file1);
	// 	move_uploaded_file($file_tmp2, $location.$file2);
	// 	move_uploaded_file($file_tmp3, $location.$file3);
	// 	move_uploaded_file($file_tmp4, $location.$file4);
	// 	echo "success";
	// }
	// else
	// {
	// 	echo "failed";
	// }
}

?>