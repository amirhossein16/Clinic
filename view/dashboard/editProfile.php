<!-- Alpine Plugins -->
<script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
<!-- Alpine Core -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<section class="w-full p-6 mx-auto bg-indigo-500 dark:bg-gray-800 overflow-auto">
    <div class="flex justify-between">
        <h1 class="text-4xl font-bold text-white capitalize dark:text-white">Profile</h1>
        <div
            class="w-40 h-40 top-10 right-5 bg-rose-400 m-5 rounded-tl-[100px] rounded-tr-[150px] rounded-br-[250px] rounded-bl-[70px] -mb-20 grid">
            <img src="<?= storage_url . "/avatars/$_SESSION[id].jpg"?>" alt=""
                class="w-32 h-32 m-auto rounded-xl object-cover object-center hover:scale-150 transition duration-300">
        </div>
    </div>
    <div class="w-full p-6 mx-auto bg-indigo-600 dark:bg-gray-800 overflow-auto rounded-xl">
        <div>
            <h3 class="text-xl font-bold text-white capitalize dark:text-white">Personal Information</h3>
            <form class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2" method="post" enctype="multipart/form-data"
                action="./../dashboard/editProfile">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="field" value="personal" />
                <div class="mt-5">
                    <label class="text-white dark:text-gray-200" for="name">First Name</label>
                    <input id="name" type="text" name="firstName" placeholder="First Name"
                        value="<?= $userData->firstName ?? null?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <label class="text-white dark:text-gray-200" for="name">Last Name</label>
                    <input id="name" type="text" name="lastName" placeholder="Last Name"
                        value="<?= $userData->lastName ?? null?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="mt-5">
                    <label class="block text-sm font-medium text-white">
                        Image
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span class="p-1">Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1 text-white">or drag and drop</p>
                            </div>
                            <p class="text-xs text-white">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2">
                    <label x-data="{telegram: false}" for="" class="flex items-center gap-2">
                        <i @click="telegram = ! telegram"
                            class="fa-brands fa-telegram text-blue-400 bg-gray-100 rounded-full text-4xl items-center my-auto"></i>
                        <input x-show="telegram" x-transition.duration.500ms type="text" name="social[telegram]"
                            placeholder="telegram ID" class="p-2 rounded" style="display: none">
                    </label>
                    <label x-data="{instagram: false}" for="" class="flex items-center gap-2">
                        <i @click="instagram = ! instagram"
                            class="fa-brands fa-instagram-square text-rose-400 rounded-full text-4xl items-center my-auto"></i>
                        <input x-show="instagram" x-transition.duration.500ms type="text" name="social[instagram]"
                            placeholder="instagram ID" class="p-2 rounded" style="display: none">
                    </label>
                </div>

                <div class="flex justify-end mt-2">
                    <button
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
                </div>

            </form>

            <hr class="my-5">
            <?php if ($_SESSION['role'] == 'doctor'): ?>
            <h3 class="text-xl font-bold text-white capitalize dark:text-white">Education & Job</h3>
            <form class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2" action="./../dashboard/editProfile" method="post">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="field" value="education" />
                <div>
                    <label class="text-white dark:text-gray-200" for="education">education</label>
                    <input id="education" type="text" name="education" placeholder="education"
                        value="<?= $userData->education ?? null?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="meNumber">ME number</label>
                    <input id="meNumber" type="text" name="meNumber" placeholder="meNumber"
                        value="<?= $userData->meNumber ?? null?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <table
                    class="bg-blue-50 w-3/4 m-auto col-span-2 text-center rounded table-auto border-collapse leading-10">
                    <div class="text-white font-bold text-xl m-auto">
                        schedules
                    </div>
                    <thead class="text-blue-600">
                        <tr class="border-b border-gray-700">
                            <td>day</td>
                            <td>morning</td>
                            <td>evening</td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <tr class="border-b border-gray-700">
                            <td>sat</td>
                            <td>
                                <input type="text" name="visit_time[sat][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->sat->am) ? $userData->visit_time->sat->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[sat][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->sat->pm) ? $userData->visit_time->sat->pm : null ?>">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td>sun</td>
                            <td>
                                <input type="text" name="visit_time[sun][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->sun->am) ? $userData->visit_time->sun->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[sun][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->sun->pm) ? $userData->visit_time->sun->pm : null ?>">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td>mon</td>
                            <td>
                                <input type="text" name="visit_time[mon][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->mon->am) ? $userData->visit_time->mon->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[mon][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->mon->pm) ? $userData->visit_time->mon->pm : null ?>">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td>tue</td>
                            <td>
                                <input type="text" name="visit_time[tue][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->tue->am) ? $userData->visit_time->tue->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[tue][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->tue->pm) ? $userData->visit_time->tue->pm : null ?>">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td>wed</td>
                            <td>
                                <input type="text" name="visit_time[wed][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->wed->am) ? $userData->visit_time->wed->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[wed][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->wed->pm) ? $userData->visit_time->wed->pm : null ?>">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td>thu</td>
                            <td>
                                <input type="text" name="visit_time[thu][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->thu->am) ? $userData->visit_time->thu->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[thu][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->thu->pm) ? $userData->visit_time->thu->pm : null ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>fri</td>
                            <td>
                                <input type="text" name="visit_time[fri][am]" class="text-center"
                                    value="<?= !empty($userData->visit_time->fri->am) ? $userData->visit_time->fri->am : null ?>">
                            </td>
                            <td>
                                <input type="text" name="visit_time[fri][pm]" class="text-center"
                                    value="<?= !empty($userData->visit_time->fri->pm) ? $userData->visit_time->fri->pm : null ?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <label class="text-white dark:text-gray-200" for="visit_cost">visit cost</label>
                    <input id="visit_cost" type="text" name="visit_cost" placeholder="visit_cost"
                        value="<?= $userData->visit_cost ?? null?>"
                        class="w-1/2 block px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="flex justify-end mt-8">
                    <button
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>
            <hr class="my-5">
            <?php endif;?>

            <h3 class="text-xl font-bold text-white capitalize dark:text-white">Account settings</h3>
            <form class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2" action="./../dashboard/editProfile" method="post">
                <input type="hidden" name="_method" value="put" />
                <input type="hidden" name="field" value="account" />
                <div>
                    <label class="text-white dark:text-gray-200" for="username">username</label>
                    <input id="username" type="text" name="username" placeholder="username"
                        value="<?= $userData->username ?? null?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="emailAddress">Email Address</label>
                    <input id="emailAddress" type="email" name="email" placeholder="email"
                        value="<?= $userData->email ?? null?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="confPassword">Confirm Password</label>
                    <input id="confPassword" type="password" name="confirmPassword" placeholder="confirm password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>

                </div>
                <div class="flex justify-end mt-6">
                    <button
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>

        </div>
    </div>
</section>