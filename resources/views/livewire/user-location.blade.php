<div x-data="{ 
        popup(){
            console.log('popup!');
            setTimeout(()=> {
                $dispatch('open-modal-alexa');
            }, 1000);
        }
    }"
    x-init="popup()">
    <x-modals.modal-full ref="alexa">
        <div x-data="{ step: 'location' }">
            <div x-show="step =='location'"
                x-cloak
                class="text-left">
                <header>
                    <h3 class="text-xl font-bold text-gray-900">Where do you want to go?</h3>
                </header>
                <div class="py-8">
                    <button type="button" onclick="getLocation()" class="items-center w-full btn-primary">
                        <x-heroicon-m-map-pin class="w-6 h-6 mr-4 text-white"/> 
                        <span>My Current Location</span>
                    </button>
                    <div class="py-6 text-center">OR</div>
                    <div>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none">
                                <x-heroicon-m-magnifying-glass-circle class="w-6 h-6 text-yellow-600" />
                            </div>
                        <input class="block w-full py-2 pl-16 border border-yellow-300 rounded-full focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="Search a different location">
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </x-modals.modal-full>

    @push('scripts')
    <script>
        
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                window.location.replace("{{ url('wizard') }}?location=Iligan+City");
            } 
            else { 
                    console.log("Geolocation is not supported by this browser.");
                }
        }

        function showPosition(position) {
            console.log(position.coords.latitude + ",  " + position.coords.longitude);
            window.location.replace("{{ url('wizard') }}?location=Iligan+City");
        }
    </script>
    @endpush
</div>