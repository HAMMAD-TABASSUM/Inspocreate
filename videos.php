<?php

 include 'processFormpost.php';
 $usid = $_SESSION["id"];

 // user table

 $sql = "SELECT * FROM users where id={$usid}";
 $result = mysqli_query($conn, $sql);
 $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

 $sqli = "SELECT * FROM post";
 $results = mysqli_query($conn, $sqli);

 // like sction

 if (isset($_POST['post_id'])) {
    $get_post_id = $_POST['post_id'];
    $get_likes_sql = "SELECT * FROM post WHERE id={$get_post_id}";
    $post_likes_results = mysqli_query($conn, $get_likes_sql);
    $post_record = $post_likes_results->fetch_assoc();
    $get_likes_by_users = $post_record['is_like'];
    echo $get_likes_by_users;
    $liked = $get_likes_by_users.",".$usid ;
    // $id = $_SESSION['id'];
    $update_post_likes="UPDATE post SET is_like=\"{$liked}\"  WHERE id={$get_post_id}";
    $update_post_likes=mysqli_query($conn,$update_post_likes);
}

// follow section

if (isset($_POST["to_follow_user"])) {
    $get_follow_id = $_POST["to_follow_user"];
    $get_followers_id = $_POST["logged_in_user"];
    $get_follow_sql = "SELECT * FROM users WHERE id={$usid} ";
    $follow_results = mysqli_query($conn, $get_follow_sql);
    $follow_record = $follow_results->fetch_assoc();
    $get_follow_by_users = $follow_record['following'];
    $get_followers_by_users = $follow_record['followers'];
    echo $get_followers_by_users;
    $follow = $get_follow_by_users.",".$get_follow_id;
    $followers = $get_followers_by_users.",".$usid;
    $update_follow="UPDATE users SET following=\"{$follow}\" WHERE id={$usid}";
    $update_follow=mysqli_query($conn,$update_follow);
    $update_follow="UPDATE users SET followers=\"{$followers}\" WHERE id={$get_follow_id}";
    $update_follow=mysqli_query($conn,$update_follow);
}

// following display queries

$sqlis = "SELECT * FROM users WHERE id!={$usid}";
$resultusers = mysqli_query($conn, $sqlis);
?>

<!-- comment section -->

<?php
$cons = new mysqli('localhost', 'root', '', 'inspocreate');

if (isset($_POST['getAllComments'])) {
    $start = $cons->real_escape_string($_POST['start']);
    $response = "";
    $sqls = $cons->query("SELECT comments.id, fname, profile_image, comment, DATE_FORMAT(comments.createdOn, '%y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.id ORDER BY comments.id DESC LIMIT $start, 20");
    while($data = $sqls->fetch_assoc())
    $response .= createCommentRow($data);
    exit($response);
}

function createCommentRow($data) {
    global $cons;
    $response = '
        <div class="comment mb-4">
            <div class="user font-bold"><span class="time text-gray-600"><img class="w-8 h-8 rounded-full" src="images/'.$data['profile_image'].'" alt=""></span>'.$data['fname'].'<span class="time text-gray-600">'.$data['createdOn'].'</span></div>
            <div class="userComment">'.$data['comment'].'</div>
            <div class="reply text-sky-500"><button data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</button></div>
            <div class="replies ml-4 pt-2.5">';
                $sqls = $cons->query("SELECT replies.id, fname, profile_image, comment, DATE_FORMAT(replies.createdOn, '%y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC LIMIT 1");
                while($dataR = $sqls->fetch_assoc())
                $response .= createCommentRow($dataR);

                $response .= '
            </div>
        </div>
    ';
    return $response;
}

// reply section

if (isset($_POST['addComment'])) {
$comment = $cons->real_escape_string($_POST['comment']);
$isReply = $cons->real_escape_string($_POST['isReply']);

$commentID = $cons->real_escape_string($_POST['commentID']);
if ($isReply){
$cons->query("INSERT INTO replies (comment, commentID, userID, createdOn) VALUES ('$comment', '$commentID', '".$_SESSION['id']."', NOW())");
$sqls = $cons->query("SELECT replies.id, fname, profile_image, comment, DATE_FORMAT(replies.createdOn, '%y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id ORDER BY replies.id DESC LIMIT 1");
}else{
    $cons->query("INSERT INTO comments (userID, comment, createdOn) VALUES ('".$_SESSION['id']."','$comment',NOW())");
    $sqls = $cons->query("SELECT comments.id, fname, profile_image, comment, DATE_FORMAT(comments.createdOn, '%y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.id ORDER BY comments.id DESC LIMIT 1");
}
$data = $sqls->fetch_assoc();
exit(createCommentRow($data));
}
$sqlNumComments = $conn->query("SELECT id FROM comments");
$numComments = $sqlNumComments->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/videos.css">
</head>

<body class="bg-gray-50">

    <!-- header part -->

    <div class="w-full bg-white">
        <div class="custom-container flex justify-between py-2 items-center">
            <div class="flex items-center cursor-pointer gap-x-2.5">
                <img src="assets/icons/logo.svg" alt="">
                <span class="text-3xl font-bold roboto">Inspocreate</span>
            </div>

            <div class="flex gap-x-4">
                <div class="cursor-pointer">
                    <a href="activity.php">
                        <div class="flex items-center gap-x-2 ">
                            <img src="assets/icons/home.svg" alt="">
                            <span class="text-lg font-light text-gray-600 roboto">Activity</span>
                        </div>
                    </a>
                </div>
                <a href="videos.php">
                    <div class="flex items-center gap-2 cursor-pointer relative">
                        <img class="w-4" src="assets/icons/video.svg" alt="">
                        <span class=" text-lg font-light roboto">Video</span>
                    </div>
                    <img class="w-16 pt-1 absolute" src="assets/icons/border.svg" alt="">
                </a>
                <a href="images.php">
                    <div class="flex items-center gap-x-2 cursor-pointer">
                        <img class="w-4" src="assets/icons/image.svg" alt="">
                        <span class="text-lg font-light text-gray-600 roboto">Images</span>
                    </div>
                </a>
                <a href="Blog.php">
                    <div class="flex items-center gap-x-2 cursor-pointer ">
                        <img class="w-4" src="assets/icons/Blog.svg" alt="">
                        <span class="text-lg font-light text-gray-600 roboto">Blog</span>
                    </div>
                </a>
            </div>

            <div class="border-2 flex w-56 h-9 rounded h-10">
                <input class="w-full text-xs pl-4 roboto" type="text" placeholder="Try Women Empowerment">
                <img class="w-6 pr-2.5" src="assets/icons/search.svg" alt="">
            </div>

            <div class="relative cursor-pointer">
                <img class="w-5" src="assets/icons/sms.svg" alt="">
                <div
                    class="absolute py-px w-3.5 h-3.5 bg-orange-500 rounded-full flex justify-center items-center text-white text-xs -top-2 -right-2">
                    6</div>
            </div>

            <div class="relative cursor-pointer">
                <img class="w-4" src="assets/icons/bell.svg" alt="">
                <div
                    class="absolute py-px w-3.5 h-3.5 bg-green-600 rounded-full flex justify-center items-center text-white text-xs -top-2 -right-1.5">
                    8</div>
            </div>

            <!-- modal post -->

            <div>
                <!-- Button trigger modal -->
                <div class="flex items-center justify-center h-full">
                    <button
                        class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 p-2.5 text-white text-sm flex items-center rounded roboto"
                        data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">
                        <img class="pr-2" src="assets/icons/plus.svg" alt="">Add Post
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade fixed z-10 top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto rgba py-10"
                    id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel"
                    aria-hidden="true">

                    <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">

                        <div
                            class="modal-content border-none relative flex flex-col modal-width m-auto pointer-events-auto p-5 bg-white bg-clip-padding rounded-md outline-none text-current">

                            <div class="flex items-center justify-end">
                                <button type="button" data-bs-dismiss="modal">
                                    <img src="assets/icons/close-red.svg" alt="">
                                </button>
                            </div>

                            <div class="px-14">
                                <h1 class="text-3xl font-medium text-center pt-2 roboto">Add New Post</h1>
                                <div class=" pt-6 pb-8">
                                    <ul class="flex justify-center gap-x-11">
                                        <li id="video" class=" cursor-pointer active select-video">
                                            <span class="text-2xl roboto text-gray-500 font-light">Video</span>
                                        </li>

                                        <li id="image" class=" cursor-pointer select-image">
                                            <span class="text-2xl roboto text-gray-500 font-light">Images</span>
                                        </li>
                                        <li id="blog" class=" cursor-pointer select-blog">
                                            <span class="text-2xl roboto text-gray-500 font-light">Blog</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- videos post -->

                                <div class="videos">
                                    <div class="flex gap-x-9">

                                        <div id=""
                                            class="videos-post select-video-active flex justify-center items-center cursor-pointer">
                                            <img class="tickgreen-video" src="assets/icons/tick-green.svg" alt="">
                                            <div class="w-4 h-4 border rounded-full d-none circle-video"></div>
                                            <img class="pl-1.5 pr-2.5" src="assets/icons/video.svg" alt="">
                                            <span class="font-light text-gray-500 text-sm">Add Video</span>
                                        </div>

                                        <div id=""
                                            class="url-post select-url-active flex justify-center items-center cursor-pointer">
                                            <div class="w-4 h-4 border rounded-full circle"></div>
                                            <img class="d-none tick-green" src="assets/icons/tick-green.svg" alt="">
                                            <img class="pl-1.5 pr-2.5" src="assets/icons/url.svg" alt="">
                                            <span class="font-light text-gray-500 text-sm">Add Video from
                                                URL</span>
                                        </div>
                                    </div>

                                    <!-- video post modal -->

                                    <div class="select-video-post d-none">
                                        <div class="pt-8 flex gap-x-9">
                                            <div
                                                class="btn-file overflow-hidden relative border w-36 h-36 flex flex-col justify-center items-center rounded">
                                                <img class="w-5" src="assets/icons/add.svg" alt="">
                                                <span class="font-light text-gray-500 text-lg roboto">Add
                                                    Post</span>
                                                <input
                                                    class="absolute top-0 right-0 font-light text-gray-500 text-sm opacity-0 outline-none bg-white cursor-pointer min-w-full min-h-full block"
                                                    type="file">
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-y-6 pt-6">
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="name">Tital</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Any Text Here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="email">Category</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Some text here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Description</label>
                                                <textarea class="border rounded p-3.5 roboto text-sm" name="" id=""
                                                    cols="30" rows="5" placeholder="Heloo!"></textarea>
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Add Tags</label>
                                                <div class="h-12 w-full border rounded h-10 flex gap-x-5 p-2.5">
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex pt-5 gap-x-14">
                                            <div class="flex justify-between">
                                                <label for="toogleA" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleA" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3.5 text-gray-500 roboto">Add to
                                                        Collection</div>

                                                </label>
                                            </div>
                                            <div class="flex justify-between">
                                                <label for="toogleB" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleB" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border   dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3 text-gray-500 roboto">Public
                                                    </div>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-12">
                                            <button
                                                class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 roboto text-base text-white py-4 px-28 rounded">I
                                                Would Like to Post Now
                                            </button>
                                        </div>
                                    </div>

                                    <!-- url post modal -->

                                    <div class="select-url-post">
                                        <div class="pt-12">
                                            <input class="border h-10 px-3.5 rounded w-full text-sm roboto"
                                                placeholder="url://" type="text">
                                        </div>
                                        <div class="pt-4 flex gap-x-9">

                                            <div
                                                class="btn-file overflow-hidden relative border w-36 h-36 flex flex-col justify-center items-center rounded">
                                                <img class="w-5" src="assets/icons/add.svg" alt="">
                                                <span class="font-light text-gray-500 text-lg roboto">Add
                                                    Post</span>
                                                <input
                                                    class="absolute top-0 right-0 font-light text-gray-500 text-sm opacity-0 outline-none bg-white cursor-pointer min-w-full min-h-full block"
                                                    type="file">
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-y-6 pt-6">
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="name">Tital</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Any Text Here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="email">Category</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Some text here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Description</label>
                                                <textarea class="border rounded p-3.5 roboto text-sm" name="" id=""
                                                    cols="30" rows="5" placeholder="Heloo!"></textarea>
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Add Tags</label>
                                                <div class="h-12 w-full border rounded h-10 flex gap-x-5 p-2.5">
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex pt-5 gap-x-14">
                                            <div class="flex justify-between">
                                                <label for="toogleA" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleA" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3.5 text-gray-500 roboto">Add to
                                                        Collection</div>

                                                </label>
                                            </div>
                                            <div class="flex justify-between">
                                                <label for="toogleB" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleB" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border   dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3 text-gray-500 roboto">Public
                                                    </div>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-12">
                                            <button
                                                class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 roboto text-base text-white py-4 px-28 rounded">I
                                                Would Like to Post Now
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- images post -->

                                <div class="images d-none">
                                    <div class="flex gap-x-9">

                                        <div
                                            class="image-posts select-video-active flex justify-center items-center cursor-pointer">
                                            <img class="tickgreen-videos" src="assets/icons/tick-green.svg" alt="">
                                            <div class="w-4 h-4 border rounded-full d-none circle-videos"></div>
                                            <img class="pl-1.5 pr-2.5" src="assets/icons/video.svg" alt="">
                                            <span class="font-light text-gray-500 text-sm">Add Image</span>
                                        </div>

                                        <div class="image-url-posts select-url-active flex justify-center items-center cursor-pointer">
                                            <div class="w-4 h-4 border rounded-full circles"></div>
                                            <img class="d-none tick-greens" src="assets/icons/tick-green.svg" alt="">
                                            <img class="pl-1.5 pr-2.5" src="assets/icons/url.svg" alt="">
                                            <span class="font-light text-gray-500 text-sm">Add Image from
                                                URL</span>
                                        </div>
                                    </div>

                                    <!-- image post modal -->

                                    <div class="select-video-posts d-none">
                                        <div class="pt-8 flex gap-x-9">
                                            <div
                                                class="btn-file overflow-hidden relative border w-36 h-36 flex flex-col justify-center items-center rounded">
                                                <img class="w-5" src="assets/icons/add.svg" alt="">
                                                <span class="font-light text-gray-500 text-lg roboto">Add
                                                    Post</span>
                                                <input
                                                    class="absolute top-0 right-0 font-light text-gray-500 text-sm opacity-0 outline-none bg-white cursor-pointer min-w-full min-h-full block"
                                                    type="file">
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-y-6 pt-6">
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="name">Tital</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Any Text Here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="email">Category</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Some text here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Description</label>
                                                <textarea class="border rounded p-3.5 roboto text-sm" name="" id=""
                                                    cols="30" rows="5" placeholder="Heloo!"></textarea>
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Add Tags</label>
                                                <div class="h-12 w-full border rounded h-10 flex gap-x-5 p-2.5">
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex pt-5 gap-x-14">
                                            <div class="flex justify-between">
                                                <label for="toogleA" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleA" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3.5 text-gray-500 roboto">Add to
                                                        Collection</div>

                                                </label>
                                            </div>
                                            <div class="flex justify-between">
                                                <label for="toogleB" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleB" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border   dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3 text-gray-500 roboto">Public
                                                    </div>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-12">
                                            <button
                                                class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 roboto text-base text-white py-4 px-28 rounded">I
                                                Would Like to Post Now
                                            </button>
                                        </div>
                                    </div>

                                    <!-- url post modal -->

                                    <div class="select-url-posts">
                                        <div class="pt-12">
                                            <input class="border h-10 px-3.5 rounded w-full text-sm roboto"
                                                placeholder="url://" type="text">
                                        </div>
                                        <div class="pt-4 flex gap-x-9">

                                            <div
                                                class="btn-file overflow-hidden relative border w-36 h-36 flex flex-col justify-center items-center rounded">
                                                <img class="w-5" src="assets/icons/add.svg" alt="">
                                                <span class="font-light text-gray-500 text-lg roboto">Add
                                                    Post</span>
                                                <input
                                                    class="absolute top-0 right-0 font-light text-gray-500 text-sm opacity-0 outline-none bg-white cursor-pointer min-w-full min-h-full block"
                                                    type="file">
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-y-6 pt-6">
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="name">Tital</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Any Text Here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="email">Category</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Some text here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Description</label>
                                                <textarea class="border rounded p-3.5 roboto text-sm" name="" id=""
                                                    cols="30" rows="5" placeholder="Heloo!"></textarea>
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Add Tags</label>
                                                <div class="h-12 w-full border rounded h-10 flex gap-x-5 p-2.5">
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex pt-5 gap-x-14">
                                            <div class="flex justify-between">
                                                <label for="toogleA" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleA" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3.5 text-gray-500 roboto">Add to
                                                        Collection</div>

                                                </label>
                                            </div>
                                            <div class="flex justify-between">
                                                <label for="toogleB" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleB" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border   dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3 text-gray-500 roboto">Public
                                                    </div>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-12">
                                            <button
                                                class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 roboto text-base text-white py-4 px-28 rounded">I
                                                Would Like to Post Now
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- blog post -->

                                <div class="blogs d-none">
                                    <div class="select-url-posts">
                                        <div class="flex flex-col gap-y-2">
                                            <label class="text-sm roboto" for="name">Post</label>
                                            <textarea class="border p-3.5 rounded w-full text-sm roboto" name="" id=""
                                                cols="30" rows="5" placeholder="Write The Status"></textarea>
                                        </div>

                                        <div class="flex flex-col gap-y-6 pt-6">
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="name">Tital</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Any Text Here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="email">Category</label>
                                                <input class="border h-10 rounded px-3.5 roboto text-sm" type="text"
                                                    placeholder="Some text here">
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Description</label>
                                                <textarea class="border rounded p-3.5 roboto text-sm" name="" id=""
                                                    cols="30" rows="5" placeholder="Heloo!"></textarea>
                                            </div>
                                            <div class="flex flex-col gap-y-2">
                                                <label class="text-sm roboto" for="password">Add Tags</label>
                                                <div class="h-12 w-full border rounded h-10 flex gap-x-5 p-2.5">
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                    <div class="flex items-center rounded bg-zinc-200 p-2.5">
                                                        <span class="roboto text-sm pr-2">Empowerment</span>
                                                        <img class="cursor-pointer" src="assets/icons/close-tag.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex pt-5 gap-x-14">
                                            <div class="flex justify-between">
                                                <label for="toogleA" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleA" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3.5 text-gray-500 roboto">Add to
                                                        Collection</div>

                                                </label>
                                            </div>
                                            <div class="flex justify-between">
                                                <label for="toogleB" class="flex items-center cursor-pointer">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleB" type="checkbox" class="sr-only" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-300 rounded-full"></div>
                                                        <!-- dot -->
                                                        <div
                                                            class="border   dot absolute w-6 h-6 bg-gray-500 rounded-full -left-1 -top-1 transition">
                                                        </div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="text-base pl-3 text-gray-500 roboto">Public
                                                    </div>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-12">
                                            <button
                                                class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 roboto text-base text-white py-4 px-28 rounded">I
                                                Would Like to Post Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- profile logout -->

            <div>
                <div class="relative">
                    <input type="checkbox" id="sortbox" class="hidden absolute">
                    <label for="sortbox" class="flex items-center space-x-1 cursor-pointer">
                        <span class="text-lg flex items-center gap-x-2.5 ">
                        <?php foreach($users as $user): ?>
                        <img class="w-11 h-11 rounded-full" src="images/<?php echo $user['profile_image']; ?>" alt="">
                        <?php endforeach; ?>
                            <img class="w-2.5" src="assets/icons/aerrow-d.svg" alt="">
                        </span>
                        <div class="absolute w-2 h-2 bg-green-600 rounded-full right-6 bottom-1"></div>
                    </label>

                    <div id="sortboxmenu"
                        class="absolute mt-1 right-1 top-full min-w-max opacity-0 transition delay-75 ease-in-out z-10 bg-gray-200  rounded">
                        <ul class="block text-right text-gray-900">
                            <li><a href="profile.html" class="block px-3 py-2 hover:bg-gray-200 roboto">Profile</a></li>
                            <li><a href="settings.html" class="block px-3 py-2 hover:bg-gray-200 roboto">Settings</a>
                            </li>
                            <li><a href="index.html" class="block px-3 py-2 hover:bg-gray-200 roboto">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header content part -->

    <section class="pt-7">
        <div class="custom-container">

            <div class="relative custom-container">

                <span class="click">
                    <img class="w-16 cursor-pointer absolute -left-20 -top-2"  src="assets/icons/aerrow-l.svg" alt="">
                </span>
                <span class="click">
                    <img class="w-16 cursor-pointer absolute -right-20 -top-1" src="assets/icons/aerrow-r.svg" alt="">
                </span>

                <div class="flex justify-center gap-x-5 custom-container overflow-auto over">

                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>
                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>
                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>
                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>
                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>
                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>
                   <div class="tags relative">
                    <aside>
                        <label>
                            <input class="hidden" type="checkbox">
                            <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                <span class="text-sm roboto">Muhammad</span>
                            </span>
                        </label>
                    </aside>
                   </div>

                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Hammad</span>
                                </span>
                            </label>
                        </aside>
                    </div>

                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Tabassum</span>
                                </span>
                            </label>
                        </aside>
                    </div>

                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Empowerment</span>
                                </span>
                            </label>
                        </aside>
                    </div>

                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Successfull</span>
                                </span>
                            </label>
                        </aside>
                    </div>
                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Successfull</span>
                                </span>
                            </label>
                        </aside>
                    </div>
                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Successfull</span>
                                </span>
                            </label>
                        </aside>
                    </div>
                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Successfull</span>
                                </span>
                            </label>
                        </aside>
                    </div>

                    <div class="tags relative">
                        <aside>
                            <label>
                                <input class="hidden" type="checkbox">
                                <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                                    <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                                    <span class="text-sm roboto">Empowerment</span>
                                </span>
                            </label>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- post part -->

    <div class="w-full pb-36">
        <div class="custom-container flex gap-x-7">
            <div class="w-4/6 pt-20 flex flex-col gap-y-10">

                <!-- video card -->

                <?php if(mysqli_num_rows($results) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                    <div class="border rounded-2xl post-section" data-id="<?php echo $row['id']; ?>">
                    <div class="flex items-center justify-center">
                        <div class="bg-white rounded-2xl w-full">
                            <div class="flex justify-between items-center p-5">
                            <div class="flex">
                                    <?php foreach($users as $user): ?>
                                        <img class="w-11 h-11 rounded-full" src="images/<?php echo $user['profile_image'] ?>" alt="">
                                        <?php endforeach; ?>
                                    <div class="pl-5">
                                        <?php foreach($users as $user): ?>
                                        <h1 class="text-base cursor-pointer roboto"><?php echo $user['fname']; ?><?php echo $user['lname']; ?></h1>
                                        <?php endforeach; ?>
                                        <?php foreach($users as $user): ?>
                                        <span class="text-sm cursor-pointer text-gray-500 pt-4"><?php echo $user['email']; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-gray-400 text-sm font-light roboto" id="momenttd"></span>
                                </div>
                            </div>
                            
                                
                            <div>
                                <video class="w-full height object-cover" controls src="images/<?php echo $row['post_video']; ?>"></video>
                                <!-- <img class="w-full height object-cover" src="images/<?php echo $row['post_video']; ?>" alt="" /> -->
                            </div>
                            
                            <div class="p-5">
                                <div class="border-b pb-3">
                                    <h1 class="text-xl font-medium pb-1.5 roboto"><?php echo $row['tital']; ?>
                                    </h1>
                                    <p class="text-gray-500 text-sm roboto"><?php echo $row['discription']; ?></p>
                                </div>
                                <div class="flex pt-5">
                                    <div class="flex items-center pr-5 border-r relative">
                                        <img class="w-13 pl-8 pr-3" src="assets/images/heart.png" alt="">
                                            






                                        <!-- <input type="button" value="Like" id="like_<?php echo $postid; ?>" class="like">(<span id="likes_<?php echo $postid; ?>">23) -->

                                       <div class="btn btn-counter cursor-pointer" data-count="0">  
                                       <?php echo $row['is_like']; ?>
                                       <?php echo $usid; ?>
                                            <!-- <input type="hidden" name="id" value="<?php echo $id;?>"> -->
                                            <input class="text-gray-600 text-sm font-light cursor-pointer" onclick="likes(this);" data-id="<?php echo $row['id']; ?>" type="button" name="like" value="Like">
                                        </div> 

                                        <!-- if (isset($array1[$object->id])) {
                                            // object exists in array; do something
                                        } else {
                                            // object does not exist in array; do something else
                                        }

                                        if ($usid in array){
                                            dislike thhis post
                                        }else{
                                            like this post
                                        } -->
                                        
                                            
                                        <!-- <div id="" class="count p-1 w-5 h-5 text-xs text-white bg-green-600 rounded-full flex justify-center items-center">0</div>

                                        <button class="like__btn flex items-center"><span class="pr-2.5 icon"></span><span class="text-gray-600 text-sm font-light cursor-pointer">Like</span></button> -->
                                    </div>
                                    <div class="flex items-center px-5 border-r cursor-pointer comment">
                                        <img class="w-4" src="assets/icons/sms.svg" alt="">
                                        <button class="text-gray-600 text-sm font-light pl-2.5" data-target="$_POST['post_id'];">Comment</button>
                                    </div>
                                    <div class="flex items-center pl-5 cursor-pointer">
                                        <img class="w-4" src="assets/icons/add.svg" alt="">
                                        <span class="text-gray-600 text-sm font-light pl-2.5">Add to Collection</span>
                                    </div>
                                </div>
                                <div class="comment-section mt-3 d-none">
                                    <p class="text-sm py-2">Add Comment</p>
                                    <div class="border rounded-xl h-7 overflow-hidden">
                                        <input id="mainComment" class="outline-none px-4 w-4/5" type="text">
                                        <button class="float-right bg-blue-500 hover:bg-blue-700 text-white py-px px-2" id="addComment" onclick="isReply = false;">send</button>
                                    </div>
                                    <div>
                                        <h2 class="py-3"><b id="numComments"><?php echo $numComments ?> Comments</b></h2>
                                        <div class="userComments">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                
                <?php } ?>
                <?php } ?>
                <div class=" replyRow d-none">
                <div class="border rounded-xl h-7 overflow-hidden">
                    <input id="replyComment" class="outline-none px-4 w-4/5 text-black" type="text">
                    
                    <button class="float-right bg-blue-500 hover:bg-blue-700 text-white py-px px-2 outline-none" id="addReply" onclick="isReply=true;">Add Reply</button>
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-px px-2 rounded mt-1" onclick="$('.replyRow').hide()">Close</button>
                </div>

            <!-- follow section -->

            <div class="pt-7">
                <div class="w-96 border rounded p-5 ">

                    <h1 class="text-2xl text-center pb-3.5 font-medium roboto">You Should Follow</h1>

                    <div class="flex justify-between py-5 border-t">
                        <div class="flex ">
                            <img class="w-12 cursor-pointer" src="assets/images/profile.jpg" alt="">
                            <div class="pl-5">
                                <h1 class="text-base cursor-pointer roboto">Hammad Tabassum</h1>
                                <span class="text-sm cursor-pointer text-gray-500 pt-4">@hammad</span>
                            </div>
                        </div>
                        <div>
                            <button
                                class="bg-rose-300 rounded text-white px-5 py-2.5 text-xs hover:bg-red-400 active:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 roboto">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer secton -->

    <footer class="w-full footer-color py-10">
        <div class="custom-container">


            <div class="flex items-center justify-between">
                <div class="flex items-center cursor-pointer gap-2.5">
                    <img src="assets/icons/logo.svg" alt="">
                    <span class="text-3xl font-bold roboto">Inspocreate</span>
                </div>

                <div>
                    <ul class="flex flex-col gap-y-3">
                        <li class="cursor-pointer text-sm roboto">
                            Useful Links
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            About Us
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            Whoe We are
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            Contact Us
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="flex flex-col gap-y-3">
                        <li class="cursor-pointer text-sm roboto">
                            Terms & Conditions
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            Privacy Polisy
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            Others
                        </li>

                    </ul>
                </div>
                <div>
                    <ul class="flex flex-col gap-y-3">
                        <li class="cursor-pointer text-sm roboto">
                            Terms & Conditions
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            Privacy Polisy
                        </li>

                        <li class="cursor-pointer text-sm roboto">
                            Others
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </footer>
    <div class="flex justify-center p-3">
        <p class="text-sm roboto">Copyright 2019 all rights are reserved</p>
    </div>
    <script src="assets/js/videos.js"></script>
    <script src="scripts.js"></script>
    <script>

        // search bar

        // $(document).ready(function () {
        //     $("#search").on("keyup",function(){
        //         var search_term = $(this).val();

        //         $.ajax({
        //             url: "ajax-live-search.php",
        //             type:"POST",
        //             data:{search:search_term},
        //             success:function(data){
        //                 $("#table-data").html(data);
        //             }
        //         })
        //     });
        // });

        // likes function

    function likes($this) {
        let post_id = $this.dataset.id;
        $.ajax({
            url: 'videos.php',
            method: 'POST',
            dataType: 'text',
            data: {
            'post_id': post_id,
            }, success: function (response) {
                console.log(response)
            // $(".userComments").append(response);
            // getAllComments((start + 20), max);
            }
        });
    }

        // follow section
    
    function follow($this){
        let to_follow_user = $this.dataset.id;
        let logged_in_user = $this.dataset.loggedUser;
        // console.log(to_follow_user);
        
        $.ajax({
            url: 'videos.php',
            method: 'POST',
            dataType: 'text',
            data: {
            'to_follow_user': to_follow_user,
            'logged_in_user': logged_in_user,
            }, success: function (response) {
                console.log(response)
            // $(".userComments").append(response);
            // getAllComments((start + 20), max);
            }
        });
    }  

        // Ajax Comment Section

        var isReply = false, commentID = 0, max = <?php echo $numComments ?>;
        $(document).ready(function () {
        $("#addComment, #addReply").on('click', function () {
        var comment;

        if (!isReply)
        comment = $("#mainComment").val();
        else
        comment = $("#replyComment").val();

        $("#mainComment").val();
        if (comment.length > 5) {
            $.ajax({
                url: 'videos.php',
                method: 'POST',
                dataType: 'text',
                data: {
                'addComment': 1,
                'comment':comment,
                isReply: isReply,
                commentID:commentID
                }, success: function (response) {
                    max++;
                    $("#numComments").text(max + " Comments");

                    if (!isReply) {
                        $(".userComments").prepend(response);
                        $("#mainComment").val("");
                    }else {
                        commentID = 0;
                        $("#replyComment").val("");
                        $(".replyRow").hide();
                        $(".replyRow").parent().next().append(response);
                    }
                }
            });
        } else{
          alert('please check your input');
        }
        
      });
      getAllComments(0, max);
    });

    function reply(caller) {
        commentID = $(caller).attr('data-commentID');
        $(".replyRow").insertAfter($(caller));
        $('.replyRow').show();
    }

    function getAllComments(start, max) {
        if (start > max) {
            return;
        }

        $.ajax({
            url: 'videos.php',
            method: 'POST',
            dataType: 'text',
            data: {
            'getAllComments': 1,
            'start':start
            }, success: function (response) {
            $(".userComments").append(response);
            getAllComments((start+20),max);
            }
        });
    }
    function addTags(text){
        console.log(text,"fsadf");
        let input = document.createElement("input");
        input.type = "hidden";
        input.name = 'tagsText[]';
        console.log(input);
        // $this.innerHTML += input;
    }
    </script>
</body>

</html>