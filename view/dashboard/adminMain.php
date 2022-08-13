            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

                    <div class="mt-4">
                        <div class="flex flex-wrap -mx-6">
                            <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">
                                            <?= $userdata['doctorsCount']->count?></h4>
                                        <div class="text-gray-500">Doctor count</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">
                                            <?= $userdata['sectionsCount']?></h4>
                                        <div class="text-gray-500">Section count</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z"
                                                fill="currentColor" stroke="currentColor" stroke-width="2"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                                stroke="currentColor" stroke-width="2"></path>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">
                                            <?= $userdata['appointmentsCount']->count?></h4>
                                        <div class="text-gray-500">Appointment</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">

                    </div>
                    <div class="flex justify-between">
                        <h3 class="text-gray-700 text-2xl font-medium">sections</h3>
                        <button
                            onclick="$('#addSectionModal').css({ opacity: 0, display: 'flex' }) .animate( { opacity: 1, }, 200 );"
                            class="inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-rose-400 rounded-lg focus:shadow-outline hover:bg-rose-600">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col mt-8">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                doctors</th>
                                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">
                                        <?php foreach ($userdata['sections'] as $key => $section) : ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                                            <?= $section->name ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-900">
                                                    <?= $section->sectionDoctorsCount ?></div>
                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium flex justify-evenly">
                                                <div class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
                                                    onclick="showEditModal('<?= $section->name?>', <?= $section->id?>)">
                                                    edit
                                                </div>
                                                <div class="text-rose-600 hover:text-rose-900 cursor-pointer"
                                                    onclick="$('#removeSectionModal').css({ opacity: 0, display: 'flex' }) .animate( { opacity: 1, }, 200 );">
                                                    remove
                                                </div>
                                                <a href="./../dashboard/section?<?= $section->id?>" class="text-teal-600 hover:text-teal-900 cursor-pointer">more</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <!-- add section modal -->
            <div class="bg-gray-700 transition duration-150 ease-in-out z-10 absolute inset-0 grid" id="addSectionModal"
                style="display: none">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg m-auto">
                    <form method="post"
                        class="relative py-8 px-5 md:px-10 bg-gray-800 shadow-md rounded-xl border border-gray-400">
                        <div class="w-full flex justify-start text-gray-600 mb-3">
                        </div>
                        <h1 class="text-white font-lg font-bold tracking-normal leading-tight mb-4">Enter Section
                            Details</h1>
                        <label for="name"
                            class="text-white text-sm font-bold leading-tight tracking-normal">Name</label>
                        <input name="sectionName" id="name"
                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"
                            placeholder="James" />
                        <div class="flex items-center justify-center w-full">
                            <button
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-700 transition duration-150 ease-in-out hover:bg-sky-600 bg-sky-700 rounded text-white px-8 py-2 text-sm">Create</button>
                            <div class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-red-500 ml-3 bg-red-200 transition duration-150 text-red-700 ease-in-out hover:border-red-500 hover:bg-red-300 border rounded px-8 py-2 text-sm"
                                onclick="$('#addSectionModal').fadeOut()">Cancel</div>
                        </div>
                        <div class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                            onclick="$('#addSectionModal').fadeOut()" role="button">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </form>
                </div>
            </div>


            <!-- remove section modal -->
            <div class="bg-gray-700 transition duration-150 ease-in-out z-10 absolute inset-0 grid"
                id="removeSectionModal" style="display: none">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg m-auto">
                    <form method="post"
                        class="relative py-8 px-5 md:px-10 bg-gray-800 shadow-md rounded-xl border border-gray-400">
                        <input type="hidden" name="_method" value="delete">
                        <div class="w-full flex justify-start text-gray-600 mb-3">
                        </div>
                        <h2 class="text-red-500 font-lg font-extrabold tracking-normal leading-tight mb-4 capitalize">if
                            delete section delete it for all doctors</h2>
                        <label for="name" class="text-white text-sm font-bold leading-tight tracking-normal">Enter
                            section name</label>
                        <input name="sectionName" id="name"
                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border text-center" />
                        <div class="flex items-center justify-center w-full">
                            <button
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700 transition duration-150 ease-in-out hover:bg-red-600 bg-red-700 rounded text-white px-8 py-2 text-sm">delete</button>
                            <div class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-red-500 ml-3 bg-blue-200 transition duration-150 text-blue-700 ease-in-out hover:border-blue-500 hover:bg-blue-300 border rounded px-8 py-2 text-sm"
                                onclick="$('#removeSectionModal').fadeOut()">Cancel</div>
                        </div>
                        <div class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                            onclick="$('#removeSectionModal').fadeOut()" role="button">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </form>
                </div>
            </div>
            <!-- remove section modal -->


            <!-- edit section modal -->
            <div class="bg-gray-700 transition duration-150 ease-in-out z-10 absolute inset-0 grid"
                id="editSectionModal" style="display: none">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg m-auto">
                    <form method="post"
                        class="relative py-8 px-5 md:px-10 bg-gray-800 shadow-md rounded-xl border border-gray-400">
                        <input type="hidden" name="_method" value="put">
                        <input id="modalSectionID" type="hidden" name="sectionID" value="">
                        <div class="w-full flex justify-start text-gray-600 mb-3">
                        </div>
                        <h1 class="text-white font-lg font-bold tracking-normal leading-tight mb-4">Section
                            Details</h1>
                        <label for="name"
                            class="text-white text-sm font-bold leading-tight tracking-normal">Name</label>
                        <input name="sectionName" id="modalEditName" value=""
                            class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" />
                        <div class="flex items-center justify-center w-full">
                            <button
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-700 transition duration-150 ease-in-out hover:bg-sky-600 bg-sky-700 rounded text-white px-8 py-2 text-sm">edit</button>
                            <div class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-red-500 ml-3 bg-red-200 transition duration-150 text-red-700 ease-in-out hover:border-red-500 hover:bg-red-300 border rounded px-8 py-2 text-sm"
                                onclick="$('#editSectionModal').fadeOut()">Cancel</div>
                        </div>
                        <div class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                            onclick="$('#editSectionModal').fadeOut()" role="button">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </form>
                </div>
            </div>
            <!-- edit section modal -->

            <script>
                function showEditModal(name, id) {
                    $('#editSectionModal').css({
                        opacity: 0,
                        display: 'flex'
                    }).animate({
                        opacity: 1,
                    }, 200);
                    $('#modalEditName').val(name);
                    $('#modalSectionID').val(id);
                }
            </script>