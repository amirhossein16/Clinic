<div class="bg-gray-100">
    {{Navbar}}
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex md:-mx-2 space-y-5 md:space-y-0">
            <!-- Left Side -->
            <div class="md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <?php if (file_exists("storage/avatars/$doctor->doctor_id.jpg")): ?>
                        <img class="w-full h-auto rounded-full object-cover"
                            src="<?= storage_url . "avatars/$doctor->doctor_id.jpg"?>" alt="" />
                        <?php else: ?>
                        <div class="w-full h-auto rounded-full"
                            style="background-color: rgb(<?= rand(0, 255)?>, <?= rand(0, 255)?>, <?= rand(0, 255)?>)">
                        </div>
                        <?php endif ?>
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?= $doctor->firstName ?>
                        <?= $doctor->lastName ?></h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6"><?= $doctor->education ?></h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">section</p>

                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
                <!-- Friends card -->
                <div class="bg-white p-3 hover:shadow">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-green-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span>Similar Profiles</span>
                    </div>
                    <div class="grid grid-cols-3 box-border">
                        <?php foreach ($similar as $case) : ?>
                        <a href="/profile?<?= $case->doctor_id; ?>" class="text-main-color m-auto">
                            <div class="my-2 text-center">
                                <?php if (file_exists("storage/avatars/$case->doctor_id.jpg")): ?>
                                <img class="h-12 w-12 rounded-full object-cover"
                                    src="<?= storage_url . "avatars/$case->doctor_id.jpg"?>" alt="" />
                                <?php else: ?>
                                <div class="h-12 w-12 rounded-full flex justify-center items-center font-bold"
                                    style="background-color: rgb(<?= rand(0, 255)?>, <?= rand(0, 255)?>, <?= rand(0, 255)?>)">
                                    <?= substr($case->lastName, 0, 1)?></div>
                                <?php endif ?>
                                <?= $case->lastName ?>
                            </div>
                            <?php endforeach; ?>
                        </a>
                    </div>
                </div>
                <!-- End of friends card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 md:mx-2">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <i class="fa-solid fa-user-large"></i>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2"><?= $doctor->firstName ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2"><?= $doctor->lastName ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Me number</div>
                                <div class="px-4 py-2"><?= $doctor->meNumber ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800"
                                        href="mailto:<?= $doctor->email ?>"><?= $doctor->email ?></a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Visit cost</div>
                                <div class="px-4 py-2"><?= $doctor->visit_cost ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Phone</div>
                                <div class="px-4 py-2"><?= $doctor->phone ?></div>
                            </div>
                        </div>
                        <div>
                            <div class="px-4 py-2 font-semibold">Address</div>
                            <div class="px-8 py-2"><?= $doctor->address ?></div>
                        </div>
                        <div class="flex justify-center gap-5">
                            <?php foreach ($doctor->social as $social => $id) :
                                $style = ($social == 'telegram' ? 'hover:text-blue-600 border-blue-600' : ($social == 'instagram' ? 'hover:text-rose-500 border-rose-500' : 'gray'));
                            ?>
                            <a href="/" class="duration-200 hover:border-b-2 <?= $style ?>">
                                <i class="fa-brands fa-<?= $social ?> text-xl"></i>
                                <?= $id ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm mt-4">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <i class="fa-solid fa-microscope"></i>
                                </span>
                                <span class="tracking-wide">Section</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Owner at Her Company Inc.</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </span>
                                <span class="tracking-wide">Education</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600"><?= $doctor->education ?></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>

                <!-- schedules -->
                <div class="bg-white p-3 shadow-sm rounded-sm mt-4">

                    <div>
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                            <span clas="text-green-500">
                                <i class="fa-solid fa-calendar"></i>
                            </span>
                            <span class="tracking-wide">schedules</span>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <form method="post" action="profile?<?= array_keys($_GET)[0]?>"
                                class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden rounded border border-gray-200">
                                    <table class="min-w-full text-center">
                                        <thead class="border-b bg-gray-800">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    Week
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    morning
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                    evening
                                                </th>
                                            </tr>
                                        </thead class="border-b">
                                        <tbody>
                                            <?php foreach ($doctor->visit_time as $day => $visit_time) : ?>
                                            <input type="hidden" name="day" value="<?= $day?>">
                                            <tr class="border-b text-lg odd:bg-white even:bg-green-50">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 capitalize">
                                                    <?= $day ?></td>
                                                <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <?php if ($visit_time->am !== null) : ?>
                                                    <div
                                                        class="m-auto w-1/2 hover:bg-sky-500 hover:text-sky-100 hover:scale-125 transition rounded-full px-5 py-2">
                                                        <?= $visit_time->am ?>
                                                    </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <?php if ($visit_time->pm !== null) : ?>
                                                    <div
                                                        class="m-auto w-1/2 hover:bg-sky-500 hover:text-sky-100 hover:scale-125 transition rounded-full px-5 py-2">
                                                        <?= $visit_time->pm ?>
                                                    </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr class="bg-white border-b">
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="grid md:grid-cols-2 grid-cols-1 my-2">
                                    <div class="flex px-1 items-center">
                                        <label>
                                            <input type="radio" name="time" value="am" class="hidden peer">
                                            <div
                                                class="bg-sky-200 p-2 rounded peer-checked:bg-sky-400 peer-checked:ring transition mx-1">
                                                morning</div>
                                        </label>
                                        <label>
                                            <input type="radio" name="time" value="pm" class="hidden peer">
                                            <div
                                                class="bg-red-200 p-2 rounded peer-checked:bg-red-400 peer-checked:ring transition">
                                                evening</div>
                                        </label>
                                        <input type="date" name="date" min="<?= date('Y-m-d') ?>"
                                            class="border border-gray-400 my-2 w-1/2 m-auto p-2 rounded">
                                    </div>
                                    <button type="submit" x-data="{ table: false }" x-on:click="table = ! table"
                                        class="w-1/2 md:w-full bg-green-400 mx-auto my-2 p-1 rounded text-center text-lg text-green-700 cursor-pointer flex justify-center items-center">
                                        Make an appointment
                                    </button>
                                </div>
                                <input type="hidden" name="role" value="<?= $_SESSION['role'] ?? null ?>" />
                                <input type="hidden" name="patient_id" value="<?= $_SESSION['id'] ?? null ?>" />
                            </form>
                        </div>
                        <!-- End of schedules -->
                    </div>
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>