<div x-data="{ isOpen: false }"
    x-show="isOpen"
    x-on:open-modal-{{ $ref }}.window="isOpen = true;"
    x-on:close-modal-{{ $ref }}.window="isOpen = false"
    x-cloak
    class="fixed inset-0 z-10 overflow-y-auto"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="isOpen"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-start justify-center p-4 text-center sm:items-center sm:p-0">

        <div x-show="isOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            class="w-full relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
          <div>
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
  </div>
  