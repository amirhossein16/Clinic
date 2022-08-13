<!-- Info toast -->
<div x-data="{ showToast: true }" x-show="showToast" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-init="setTimeout(() => showToast = false, 10000)" class='flex items-center text-white max-w-sm w-full bg-blue-400 shadow-md rounded-lg overflow-hidden mx-auto'>
    <div class='w-10 border-r px-2'>
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>
    <div class='flex items-center px-2 py-3 w-full justify-between'>
        <div class='mx-3'>
            <p>{{message}}</p>
        </div>
        <button class="text-xl" @click="showToast = false">
            &times;
        </button>
    </div>
</div>
<!-- ./Info toast -->