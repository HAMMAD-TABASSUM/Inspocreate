<?php include 'processForm.php' ?>

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
        <form action="" method="post" enctype="multipart/form-data" class="flex flex-col gap-5">

            <?php if(!empty($msg)): ?>
            <div class="alert <?php echo $css_class; ?>">
            <?php echo $msg; ?>
            </div>
            <?php endif; ?>

            <div class="relative">
                <img src="assets/icons/avatar.svg" id="profileDisplay" class="h-28 w-28 rounded-full"  alt="" >
                <!-- <label for="profileImage">Profile-image</label> -->
                <input class="absolute top-0 right-0 font-light text-gray-500 text-sm opacity-0 outline-none bg-white cursor-pointer min-w-full min-h-full block" type="file" name="profileImage" onchange="displayImage(this)" id="profileImage">
            </div>

            <div class="flex flex-col">
                <label class="text-lg" for="bio">Bio</label>
                <textarea class="outline-none border p-2" name="bio" id="bio" cols="30" rows="10"></textarea>
            </div>
            <div class="flex flex-col">
                <label class="text-lg" for="blog">Blog</label>
                <input class="border rounded w-80 p-2" name="blog" id="blog" type="text" placeholder="url://">
            </div>
            <div>
                <button type="submit" name="save-user" class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 rounded p-5 text-white">Save User</button>
            </div>
        </form>
    </div>
    <script>
        // function triggerClick() {
        //     document.querySelector('#profileImage').click();
        // }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>
</html>