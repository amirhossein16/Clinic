<!-- Error toast -->
<div x-data="{ showToast: true }" x-show="showToast" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-init="setTimeout(() => showToast = false, 10000)" class='flex items-center text-white max-w-sm w-full bg-red-400 shadow-md rounded-lg overflow-hidden mx-auto'>
    <div class='w-10 border-r px-2'>
        <svg class="w-6 h-6 animate-ping" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
            </path>
        </svg>
    </div>
    <div class='flex justify-between items-center px-2 py-3 w-full'>
        <div class='mx-3'>
            <p>{{message}}</p>
        </div>
        <button class="text-xl" @click="showToast = false">
            &times;
        </button>
    </div>
</div>
<!-- ./Error toast -->