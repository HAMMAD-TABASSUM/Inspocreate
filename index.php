<?php
include_once('index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspocreate</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

    <!-- header part -->

    <div class="w-full shadow-lg">
        <div class="custom-container flex justify-between py-2 items-center">
            <div class="flex items-center cursor-pointer gap-2.5">
                <img src="assets/icons/logo.svg" alt="">
                <span class="text-3xl font-bold roboto">Inspocreate</span>
            </div>
            <div class="border-2 flex w-5/12 rounded h-9">
                <input class="w-full outline-0 pl-4 roboto text-xs" type="text" placeholder="Try Women Empowerment">
                <img class="w-7 pr-3.5" src="assets/icons/search.svg" alt="">
            </div>

            <div class="flex items-center">
                <div class="flex items-center cursor-pointer " onclick="toggleLogin()">
                    <img src="assets/icons/lock.svg" alt="">
                    <span class="pl-2 text-sm font-light">Login</span>
                </div>

                <!-- modal Login -->

                <div>
                    <div class="fixed z-10 hidden overflow-auto w-full h-full" id="login">
                        <div class="min-height-100vh text-center">

                            <div class="fixed inset-0 transition-opacity pt-20">

                                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>

                                <span class="hidden">&#8203;</span>

                                <div class="inline-block bg-white p-5 modal-width rounded-lg text-left overflow-hidden shadow-xl transform  transition-all"
                                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                                    <button type="button" class="float-right" onclick="toggleLogin()">
                                        <i class="fas fa-times"></i>
                                        <img src="assets/icons/close.svg" alt="">
                                    </button>

                                    <div class="px-14">
                                        <h1 class="text-3xl font-medium text-center pt-2">Login</h1>
                                        <div class="flex justify-between pt-8 pb-11  border-b relative">

                                            <button class="bg-sky-700 py-3.5 px-4 rounded flex items-center">
                                                <img class="w-3" src="assets/icons/f.svg" alt="">
                                                <span class="text-white pl-2 text-sm roboto font-medium">Sign Up With
                                                    Facebook</span>
                                            </button>

                                            <button class="bg-red-600 py-3.5 px-4 rounded flex items-center">
                                                <img class="w-6" src="assets/icons/g.svg" alt="">
                                                <span class="text-white pl-2 text-sm roboto font-medium">Sign Up With
                                                    Google</span>
                                            </button>
                                            <img class="absolute -bottom-10 left-44" src="assets/icons/or.svg" alt="">
                                        </div>

                                        <h1 class="text-xl font-medium pt-14 roboto">Login with Email</h1>
                                        
                                        <form class="flex flex-col gap-y-6 pt-3.5 pb-14" action="login_code.php" method="POST">

                                            <div class="flex flex-col gap-y-4">
                                                <label class="text-base roboto" for="email">Email Address</label>
                                                <input class="border h-14 rounded pl-4" name="email" type="email"
                                                placeholder="example@gmail.com" required>
                                            </div>

                                            <div class="flex flex-col gap-y-4">
                                                <label class="text-base roboto" for="password">Password</label>
                                                <input class="border h-14 rounded pl-4" name="password" type="password">
                                                <span class="roboto text-xs text-gray-500" required>Password must includes
                                                    alpha-numeric string and an uppercase letter
                                                </span>
                                            </div>
                                        

                                            <div class="flex justify-between items-center">

                                                <img class="w-52 h-14" src="assets/icons/Bitmap.svg" alt="">

                                                <button name="save-user" type="submit"
                                                    class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 px-16 py-4 rounded text-white">
                                                    <i class="fas fa-plus"></i>Continue
                                                </button>

                                            </div>
                                            <div class="text-center pt-10 pb-4">
                                                <a class="underline text-violet-500" href="">Forgot Password</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pl-9">
                    <div>
                        <button
                            class="roboto bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 px-5 py-2 rounded text-white"
                            onclick="toggleRegister()">Join Community</button>
                    </div>

                    <!-- modal registration -->

                    <div class="fixed z-10 hidden" id="register">
                        <div class="min-height-100vh text-center">

                            <div class="fixed inset-0 transition-opacity pt-20">

                                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                                <span class="hidden">&#8203;</span>

                                <div class="inline-block bg-white p-5 modal-width rounded-lg text-left overflow-hidden shadow-xl transform  transition-all"
                                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                                    <button type="button" class="float-right" onclick="toggleRegister()">
                                        <i class="fas fa-times"></i>
                                        <img src="assets/icons/close.svg" alt="">
                                    </button>

                                    <div class="px-14">

                                        <h1 class="text-3xl font-medium text-center pt-2">Join Our Community</h1>

                                        <div class="flex justify-between pt-8 pb-11  border-b relative">

                                            <button class="bg-sky-700 py-3.5 px-4 rounded flex items-center">
                                                <img class="w-3" src="assets/icons/f.svg" alt="">
                                                <span class="text-white pl-2 text-sm roboto font-medium">Sign Up With
                                                    Facebook</span>
                                            </button>

                                            <button class="bg-red-600 py-3.5 px-4 rounded flex items-center">
                                                <img class="w-6" src="assets/icons/g.svg" alt="">
                                                <span class="text-white pl-2 text-sm roboto font-medium">Sign Up With
                                                    Google</span>
                                            </button>
                                            <img class="absolute -bottom-10 left-44" src="assets/icons/or.svg" alt="">
                                        </div>

                                        <h1 class="text-xl font-medium pt-14 roboto">Sign Up with Email</h1>

                                        <form action="registration_code.php" method="POST">

                                            <div class="flex flex-col gap-y-6 pt-3.5 pb-14">

                                                <div class="flex gap-x-2.5">
                                                    <div class="flex flex-col gap-y-4 w-1/2">
                                                        <label class="text-base roboto" for="fname">First Name</label>
                                                        <input class="border h-14 rounded pl-4"  name="fname" type="text"
                                                            placeholder="Hammad" required>
                                                    </div>

                                                    <div class="flex flex-col gap-y-4 w-1/2">
                                                        <label class="text-base roboto" for="lname">Last Name</label>
                                                        <input class="border h-14 rounded pl-4" name="lname" type="text"
                                                            placeholder="Tabassum" required>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col gap-y-4">
                                                    <label class="text-base roboto" for="email">Email Address</label>
                                                    <input class="border h-14 rounded pl-4" name="email" type="email"
                                                        placeholder="example@gmail.com" required>
                                                </div>

                                                <div class="flex flex-col gap-y-4">
                                                    <label class="text-base roboto" for="password">Password</label>
                                                    <input onkeyup="triger()" class="input border h-14 rounded pl-4" name="password"  type="password"
                                                        placeholder="********" required>
                                                    <div class="flex justify-between indicator">
                                                        <div class="w-24 h-1.5 bg-orange-100 rounded weak"></div>
                                                        <div class="w-24 h-1.5 bg-orange-100 rounded medium"></div>
                                                        <div class="w-24 h-1.5 bg-orange-100 rounded strong"></div>
                                                        <div class="w-24 h-1.5 bg-orange-100 rounded strongest"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="flex justify-between items-center">

                                                <img class="w-52 h-14" src="assets/icons/Bitmap.svg" alt="">

                                                <button name="save-user" type="submit"
                                                    class="bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 px-16 py-4 rounded text-white">
                                                    <i class="fas fa-plus"></i>Continue
                                                </button>

                                            </div>
                                            <div class="pt-10 pb-4 flex justify-center">
                                                <label class="flex items-center cursor-pointer">
                                                    <input type="checkbox">
                                                    <span class="roboto text-sm pl-2.5">I agree to</span>
                                                </label>
                                                <a class="underline text-violet-700 text-sm roboto" href="">Terms and
                                                    Conditions </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header content part -->
    
    <section class="shadow-md w-full">
        <div class="custom-container flex flex-col items-center header-background bg-no-repeat bg-cover pt-14">

            <h1 class="text-5xl font-bold roboto">Empowering Women Worldwide</h1>
            <p class="text-2xl font-light pt-2 pb-14 roboto">To Become The Best Version Of Themselvess</p>

            <div class="relative custom-container">

                <span class="click">
                    <img class="w-16 cursor-pointer absolute -left-20 -top-1"  src="assets/icons/aerrow-l.svg" alt="">
                </span>
                <span class="click">
                    <img class="w-16 cursor-pointer absolute -right-20 -top-1" src="assets/icons/aerrow-r.svg" alt="">
                </span>

                <div class="flex justify-center gap-x-5 custom-container overflow-hidden pb-7 pl-20">

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

    <!-- gallry part -->

    <div class="w-full pt-10">
        <div class="custom-container">
            <ul class="flex justify-center gap-x-12">
                <li>
                    <a href="">
                        <span class="text-2xl font-medium roboto">Treding</span>
                        <img class="w-20 pt-3.5" src="assets/icons/border.svg" alt="">
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="text-2xl text-gray-500 roboto">Latest</span>
                        <img class="opacity-0 w-16" src="assets/icons/border.svg" alt="">
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="text-2xl text-gray-500 roboto">Only for you</span>
                        <img class="opacity-0 w-32" src="assets/icons/border.svg" alt="">
                    </a>
                </li>
            </ul>

            <!-- post -->

            <div class="cards w-full grid grid-cols-3 gap-8 py-16">

                <!-- left side -->

                <div class="flex flex-col gap-y-8">
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img1.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img9.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img8.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img7.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- middle side -->

                <div class=" flex flex-col gap-y-8">
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img4.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img5.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img6.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- right side -->

                <div class=" flex flex-col gap-y-8">
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img1.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img2.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card post border rounded-xl overflow-hidden">
                        <div class="card-img post">
                            <img class="rounded-xl w-full" src="assets/images/img3.jpeg" alt="">
                        </div>
                        <div class="overlay rounded-xl">
                            <div class="flex flex-row-reverse pt-5 pr-5">
                                <button class="bg-yellow-100 rounded px-4 py-2 text-sm font-medium">Follow</button>
                            </div>
                            <div class="w-full bg-white flex justify-between p-2.5">
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-7" src="assets/images/profile.jpg" alt="">
                                    <span class="text-sm pl-2">Harrison Phillips</span>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/icons/add.svg" alt="">
                                    <span class="text-sm text-gray-500">Add to Collection</spanc>
                                </div>
                                <div class="flex items-center cursor-pointer">
                                    <img class="w-6 pr-2" src="assets/images/heart.png" alt="">
                                    <spa class="text-sm text-gray-500">Liked</span>
                                </div>
                            </div>
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
    <script src="/assets/js/masnory.js"></script>
    <script src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/js/password metter.js"></script>
    <script>

        // password metter

        function passwordCheck(password) {
        if (password.length >= 8)
            strength += 1;
        if (password.match(/(?=.*[0-9])/))
            strength += 1;
        if (password.match(/(?=.*[!,%,&,@,#,$,^,*,?,_,~,<,>,])/))
            strength += 1;
        if (password.match(/(?=.*[a-z])/))
            strength += 1;

        displayBar(strength);
        }

        function displayBar(strength) {
        $(".password-strength-group").attr('data-strength', strength);
        }

        $("#signupInputPassword").keyup(function () {
        strength = 0;
        var password = $(this).val();
        passwordCheck(password);
        });

        // slide
        
        var span = document.getElementsByClassName('click');
        var div = document.getElementsByClassName('tags');
        var l=0;
        span[1].onclick = ()=>{
            l++;
            for(var i of div){
                if (l==0){i.style.left = "0px";}
                if (l==1){i.style.left = "-740px";}
                if (l==2){i.style.left = "-1480px";}
                if (l==3){i.style.left = "-2220px";}
                if (l==4){i.style.left = "-2960px";}
                if (l>4){l=4;}
            }
        }
        span[0].onclick = ()=>{
            l--;
            for(var i of div) {
                if (l==0){i.style.left = "0px";}
                if (l==1){i.style.left = "-740px";}
                if (l==2){i.style.left = "-1480px";}
                if (l==3){i.style.left = "-2220px";}
                if (l<0){l=0;}
            }
        }
    </script>
</body>

</html>