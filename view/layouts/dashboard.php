<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic</title>
    <link rel="icon" href="/images/logo.svg">
    <link rel="stylesheet" href="/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
<div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
             class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
        <!-- sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
               class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <a href="./../" class="flex items-center">
                    <img class="w-14 hover:scale-125 duration-300" src="/images/logo.svg" alt="">
                    <div class="text-white text-2xl mx-2 font-semibold hover:scale-125 duration-300">Clinic</div>
                </a>
            </div>

            <nav class="mt-10">
                <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 <?= preg_match('/dashboard\/.*Main/', $path) ? 'bg-gray-700 text-gray-100' : null ?>"
                   href="./../dashboard">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="mx-3">dashboard</span>
                </a>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                    <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100  <?= $path == 'dashboard/requests' ? 'bg-gray-700 text-gray-100' : null ?>"
                       href="./../dashboard/requests">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>

                        <span class="mx-3">Requests</span>
                    </a>
                <?php elseif ($_SESSION['role'] == 'patient'): ?>

                    <a href="./../dashboard/appointment"
                       class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 <?= $path == 'dashboard/appointment' ? 'bg-gray-700 text-gray-100' : null ?>"
                       href="/tables">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span class="mx-3">appointment</span>
                    </a>
                <?php endif; ?>
            </nav>
        </aside>
        <!-- ./sidebar -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <navbar class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>

                </div>

                <div class="flex items-center">


                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen"
                                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                            <?php if (file_exists('storage/avatars/' . $_SESSION['id'] . '.jpg')) : ?>
                                <img class="h-full w-full object-cover"
                                     src="/storage/avatars/<?php $_SESSION['id'] ?> .jpg" alt="Your avatar">
                            <?php endif ?>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                             class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                        <div x-show="dropdownOpen"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                             style="display: none;">
                            <a href="./../dashboard/editProfile"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                                <i class="fa-solid fa-address-card"></i>
                                Profile
                            </a>
                            <a href="/logout"
                               class="block px-4 py-2 text-sm text-red-700 hover:bg-indigo-600 hover:text-white">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </navbar>
            <!-- ./Navbar -->
            {{Message}}
            {{Contact}}
        </div>
    </div>
</div>
</body>

</html>