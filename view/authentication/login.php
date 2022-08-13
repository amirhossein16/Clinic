<section class="min-h-screen flex items-stretch text-white ">
    <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0" style="background-color: #161616;">
        <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center" style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);">
            <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        </div>
        <form class="w-full py-6 z-20" method="post" action="login">
            <h1 class="my-6 text-6xl text-blue-200">
                <a href='./'>Clinic</a>
            </h1>
            <p class="text-gray-100 my-2">
                choose your rule
            </p>
            <div class="grid m-auto grid-cols-3 w-1/2 space-x-2 rounded-xl p-2">
                <div>
                    <input type="radio" name="role" value="admin" id="1" class="peer hidden" required oninvalid="alert('Please choose role')"/>
                    <label for="1" class="block cursor-pointer select-none rounded-xl p-2 text-center border-2 border-gray-800 hover:bg-gray-800 hover:text-white peer-checked:bg-violet-400 peer-checked:font-bold peer-checked:text-gray-200">Admin</label>
                </div>

                <div>
                    <input type="radio" name="role" value="doctor" id="2" class="peer hidden" />
                    <label for="2" class="block cursor-pointer select-none rounded-xl p-2 text-center border-2 border-gray-800 hover:bg-gray-800 hover:text-white peer-checked:bg-green-400 peer-checked:font-bold peer-checked:text-gray-640">Doctor</label>
                </div>

                <div>
                    <input type="radio" name="role" value="patient" id="3" class="peer hidden" />
                    <label for="3" class="block cursor-pointer select-none rounded-xl p-2 text-center border-2 border-gray-800 hover:bg-gray-800 hover:text-white peer-checked:bg-rose-400 peer-checked:font-bold peer-checked:text-gray-604">Patient</label>
                </div>
            </div>
            <div action="" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                <div class="pb-2 pt-4">
                    <input type="name" name="username" id="username" placeholder="Username" class="block w-full p-4 text-lg rounded bg-black">
                </div>
                <div class="pb-2 pt-4">
                    <input class="block w-full p-4 text-lg rounded bg-black" type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="px-4 pb-2 pt-4">
                    <button class="uppercase block w-full p-4 text-lg rounded-full bg-pink-500 hover:bg-pink-600 focus:outline-none">login</button>
                </div>
            </div>
            <div class="mt-2">don't have an account? <a href="register" class="font-bold px-2 py-2 rounded-xl ring ring-indigo-400 text-indigo-400 hover:text-indigo-600 hover:ring-indigo-600">register</a></div>
        </form>
    </div>
    <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(https://images.unsplash.com/photo-1577495508048-b635879837f1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=675&q=80);">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="w-full px-24 z-10">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
                <g>
                    <path style="fill:#CCD1D9;" d="M95.789,65.188c-10.179-5.883-23.195-2.398-29.078,7.789L2.852,183.578
		c-5.875,10.188-2.383,23.203,7.797,29.078l405.553,234.156c10.188,5.875,23.203,2.391,29.078-7.797l63.859-110.609
		c5.891-10.172,2.391-23.203-7.797-29.062L95.789,65.188z" />
                    <path style="fill:#CCD1D9;" d="M10.649,299.344c-10.18,5.859-13.672,18.891-7.797,29.062l63.859,110.609
		c5.883,10.188,18.898,13.672,29.078,7.781l405.554-234.141c10.188-5.875,13.688-18.891,7.797-29.078l-63.86-110.6
		c-5.875-10.188-18.891-13.672-29.078-7.789L10.649,299.344z" />
                </g>
                <path style="fill:#E6E9ED;" d="M341.156,21.844c0-11.758-9.547-21.281-21.297-21.281H192.141c-11.758,0-21.281,9.523-21.281,21.281
	v468.297c0,11.75,9.523,21.297,21.281,21.297H319.86c11.75,0,21.297-9.547,21.297-21.297V21.844H341.156z" />
                <path style="fill:#ED5564;" d="M255.938,64.422c-5.875,0-10.648,4.766-10.648,10.641v361.875c0,5.875,4.773,10.641,10.648,10.641
	c5.875,0,10.633-4.766,10.633-10.641V75.062C266.57,69.188,261.812,64.422,255.938,64.422z" />
                <g>
                    <path style="fill:#DA4453;" d="M279.125,383.891c-0.109-0.016-12.102-2.297-23.672-9.25c-13.938-8.391-21-19.734-21-33.719
		c0-7.938,3.305-12.609,10.836-16.828v-23.531c-5.969,2.453-11.727,5.297-16.727,9.094c-10.211,7.766-15.391,18.281-15.391,31.266
		c0,21.906,11.039,39.984,31.93,52.344c14.828,8.719,29.602,11.453,30.227,11.562c0.641,0.125,1.281,0.172,1.906,0.172
		c5.031,0,9.516-3.594,10.453-8.734C288.719,390.484,284.891,384.969,279.125,383.891z" />
                    <path style="fill:#DA4453;" d="M266.57,151.336c0.109-0.016,0.203-0.039,0.312-0.055c11.336-2.039,20.492-1.727,20.555-1.727
		c5.875,0.234,10.828-4.336,11.062-10.203c0.234-5.883-4.328-10.828-10.219-11.062c-0.797-0.039-9.812-0.336-21.711,1.484
		L266.57,151.336L266.57,151.336z" />
                    <path style="fill:#DA4453;" d="M292.109,235.094c-8.906-5.875-20.031-8.898-30.812-11.82
		c-23.758-6.453-37.195-11.086-37.227-31.156c-0.031-11.031,3.352-19.664,10.305-26.391c3.195-3.078,6.953-5.547,10.914-7.555
		v-23.109c-9.102,3.281-18.195,8.133-25.633,15.289c-11.227,10.82-16.914,24.883-16.883,41.805
		c0.031,16.555,6.375,29.375,18.836,38.094c10.023,7.023,22.273,10.344,34.109,13.562C278.672,250.047,288,253.945,288,267.625
		c0,12.922-6.641,18.688-21.43,24.828v22.859c9.289-3.422,18.68-7.141,26.461-13.281c10.781-8.484,16.25-20.062,16.25-34.406
		C309.281,253.562,303.5,242.609,292.109,235.094z" />
                </g>F
        </div>
        <div class="bottom-0 absolute p-4 text-center right-0 left-0 flex justify-center space-x-4">
            <span>
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
            </span>
            <span>
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
            </span>
            <span>
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
            </span>
        </div>
    </div>
</section>