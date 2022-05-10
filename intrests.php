<?php
require_once('connection.php');
session_start();
$usid = $_SESSION['id']; 
$sql = "SELECT * FROM users where id={$usid}";
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intrestes</title>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/intrests.css">
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
                    <a href="activity.html">
                        <div class="flex items-center gap-x-2 ">
                            <img src="assets/icons/home.svg" alt="">
                            <span class="text-lg font-light text-gray-600 roboto">Activity</span>
                        </div>
                    </a>
                </div>
                <a href="videos.html">
                    <div class="flex items-center gap-x-2 cursor-pointer">
                        <img class="w-4" src="assets/icons/video.svg" alt="">
                        <span class="text-lg font-light text-gray-600 roboto">Video</span>
                    </div>
                </a>
                <a href="images.html">
                    <div class="flex items-center gap-x-2 cursor-pointer">
                        <img class="w-4" src="assets/icons/image.svg" alt="">
                        <span class="text-lg font-light text-gray-600 roboto">Images</span>
                    </div>
                </a>
                <a href="Blog.html">
                    <div class="flex items-center gap-2 cursor-pointer">
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

                                        <div
                                            class="image-url-posts select-url-active flex justify-center items-center cursor-pointer">
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

    <!-- profile part -->

    <div class="w-full pt-8 pb-96">
        <div class="custom-container flex flex-col items-center justify-center">
            <div class="pb-12">

                <h1 class="text-center text-5xl font-medium roboto">Settings</h1>

                <ul class="flex justify-center gap-x-9 pt-10">
                    <li>
                        <a class="flex-col" href="settings.html">
                            <span class="text-2xl text-gray-500 font-light roboto">Account</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex-col" href="Notification.html">
                            <span class="text-2xl text-gray-500 font-light roboto">Notification</span>
                        </a>
                    </li>

                    <li>
                        <a class="flex-col" href="intrests.html">
                            <span class="text-2xl roboto font-medium">Interests</span>
                            <img class="w-24 pt-3.5" src="assets/icons/border.svg" alt="">
                        </a>
                    </li>

                    <li>
                        <a class="flex-col" href="">
                            <span class="text-2xl text-gray-500 font-light roboto">Privacy</span>
                        </a>
                    </li>
                </ul>
            </div>

            <form action="chackbox.php" method="post" enctype="multipart/form-data" class="border w-8/12 rounded p-7 text-center">
                <div class="flex gap-5 flex-wrap">
                <aside>
                        <label for="mobile">
                        <input class="hidden" id="mobile" name="prodname[]" value="Mobile" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">Mobile</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="car">
                        <input class="hidden" id="car" name="prodname[]" value="car" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">car</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="bike">
                        <input class="hidden" id="bike" name="prodname[]" value="bike" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">bike</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="laptop">
                        <input class="hidden" id="laptop" name="prodname[]" value="laptop" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">laptop</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="mouse">
                        <input class="hidden" id="mouse" name="prodname[]" value="mouse" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">mouse</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="equipment">
                        <input class="hidden" id="equipment" name="prodname[]" value="equipment" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">equipment</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="lahore">
                        <input class="hidden" id="lahore" name="prodname[]" value="lahore" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">lahore</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="Pakistan">
                        <input class="hidden" id="Pakistan" name="prodname[]" value="Pakistan" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">Pakistan</span>
                        </span>
                        </label>
                    </aside>
                    <aside>
                        <label for="Punjab">
                        <input class="hidden" id="Punjab" name="prodname[]" value="Punjab" type="checkbox">
                        <span class="cursor-pointer flex items-center border-2 rounded px-5 py-3.5">
                            <img class="pr-2 hidden chack" src="assets/icons/tick.svg" alt="">
                            <span class="text-sm roboto">Punjab</span>
                        </span>
                        </label>
                    </aside>
                </div>
                <div class="pt-16 pb-7">
                    <button type="submit" name="submit" class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 text-white text-base py-4 px-32 rounded">Save
                        Settings
                    </button>
                </div>
            </form>
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
    <script src="assets/js/intrests.js"></script>
</body>

</html>