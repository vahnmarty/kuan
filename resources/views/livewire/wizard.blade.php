<div>
    <div x-data="app()" 
    class="px-4 py-6">
    
    <header class="flex items-center justify-between gap-4 pb-4 border-b-2">
        <div class="flex-1 py-4 pl-6 border border-yellow-400 rounded-full">
            <div class="flex">
                <x-heroicon-m-map-pin class="w-6 h-6 mr-4 text-yellow-500"/>
                <p class="text-xl font-bold">{{ $location }}</p>
            </div>
        </div>
        <div class="w-10">
            <x-heroicon-o-bars-3 class="w-10 h-10 text-gray-900"/>
        </div>
    </header>

    <div class="py-4">

        <div id="timeframe"
            x-show="step ==  'timeframe'"
            x-cloak
            x-data="{ timeframe: @entangle('timeframe')}">
            <p>When do you want to go?</p>

            <div class="flex flex-col mt-8 space-y-4">
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="today" x-model="timeframe">
                    Today ({{ date('F, d Y') }})
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="custom" x-model="timeframe">
                    Different Day
                </label>
                <div x-show="timeframe == 'custom'" x-cloak>
                    <label>Select Date</label>
                    <input type="date" class="w-full">
                </div>
            </div>

            <div class="mt-8">
                <button type="button" class="btn-primary" x-on:click="next('mood')">Next</button>
            </div>
        </div>

        <div id="mood"
            x-show="step ==  'mood'"
            x-cloak
            x-data="{ moods: @entangle('moods')}">
            <p>Mood?</p>

            <div class="flex flex-col mt-8 space-y-4">
                <label for="moodAdventure"  class="flex items-center px-4 py-8 text-white bg-red-300 rounded-md">
                    <input id="moodAdventure" type="checkbox" class="mr-4" value="adventure" wire:model="moods">
                    <span class="text-2xl font-bold">Adventure</span>
                </label>
                <label for="moodChill"  class="flex items-center px-4 py-8 text-white bg-red-300 rounded-md">
                    <input id="moodChill" type="checkbox" class="mr-4" value="chill" wire:model="moods">
                    <span class="text-2xl font-bold">Chill & Party </span>
                </label>
                <label for="moodDinner"  class="flex items-center px-4 py-8 text-white bg-red-300 rounded-md">
                    <input id="moodDinner" type="checkbox" class="mr-4" value="dinner" wire:model="moods">
                    <span class="text-2xl font-bold">Dinner</span>
                </label>
                <label for="moodWork"  class="flex items-center px-4 py-8 text-white bg-red-300 rounded-md">
                    <input id="moodWork" type="checkbox" class="mr-4" value="work" wire:model="moods">
                    <span class="text-2xl font-bold">Work</span>
                </label>
                <label for="moodPleasure"  class="flex items-center px-4 py-8 text-white bg-red-300 rounded-md">
                    <input id="moodPleasure" type="checkbox" class="mr-4" value="pleasure" wire:model="moods">
                    <span class="text-2xl font-bold">Pleasure</span>
                </label>
            </div>

            <div class="mt-8">
                <button type="button" class="btn-primary" x-on:click="next('group')">Next</button>
            </div>
        </div>

        <div id="group"
            x-show="step ==  'group'"
            x-data="{ group: @entangle('group')}">
            <p>How many?</p>

            <div class="flex flex-col mt-8 space-y-4">
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="me" x-model="group">
                    Just me
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="couple" x-model="group">
                    Couple
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="family" x-model="group">
                    Family
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="friends" x-model="group">
                    Friends
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="custom" x-model="group">
                    Custom
                </label>
                <div x-show="group == 'custom'" x-cloak>
                    <label>Enter number of people</label>
                    <input type="number" class="w-full" value="0" wire:model.defer="people_count">
                </div>
            </div>

            <div class="flex gap-2 mt-8">
                <button type="button" class="btn-secondary" x-on:click="prev('mood')">Back</button>
                <button type="button" class="btn-primary" x-on:click="next('budget')">Next</button>
            </div>
        </div>

        <div id="budget"
            x-show="step ==  'budget'"
            x-data="{ budget: @entangle('budget')}">
            <p>Budget?</p>

            <div class="flex flex-col mt-8 space-y-4">
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="low" x-model="budget">
                    Low Budget (< ₱1,500)
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="average" x-model="budget">
                    K langs ( ₱1,500 ~  ₱5,000)
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="high" x-model="budget">
                    R1Ch K3dzz (IDGAF)
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="high" x-model="budget">
                    With Sugar Daddy
                </label>
                <label class="flex items-center">
                    <input type="radio" class="mr-4" value="custom" x-model="budget">
                    Custom
                </label>
                <div x-show="group == 'custom'" x-cloak>
                    <label>Enter Budget Amount</label>
                    <input type="number" class="w-full" value="0" wire:model.defer="budget_amount">
                </div>
            </div>

            <div class="flex gap-2 mt-8">
                <button type="button" class="btn-secondary" x-on:click="prev('mood')">Back</button>
                <button type="button" class="btn-primary" x-on:click="next('end')">Next</button>
            </div>
        </div>
        
        <div id="result"
            x-show="step ==  'result'">
        
            <div x-show="loading" x-cloak>
                <div class="relative flex items-center justify-center">
                    <div class="absolute">
                        <x-heroicon-m-map-pin class="w-24 h-24 text-yellow-500"/>
                    </div>
                    <svg class="w-56 h-56 text-yellow-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                </div>
    
                <p class="mt-5 text-2xl text-center">Generating results...</p>
            </div>
            <div class="grid grid-cols-1 gap-2">
                <p>10 journeys found</p>
                @foreach($results as $index => $result)
                <div wire:key="{{ $index }}"
                    class="relative flex p-4 duration-200 ease-in scale-95 border rounded-md hover:scale-100 hover:shadow-lg">
                    <div class="w-24 h-24 sm:w-32 sm:h-32">
                        <div class="w-24 h-24 bg-gray-200 sm:w-32 sm:h-32 grow animate-pulse">
                        </div>
                    </div>
                    <div class="ml-3 mr-16 space-y-1 grow-0">
                        <div>
                            <h3 class="text-lg font-bold">{{ $result['title'] }}</h3>
                        </div>
                        <div class="flex">
                            <x-heroicon-s-user-circle class="w-4 h-4 text-gray-400"/>
                            <p class="ml-1 text-xs"> {{ $result['author'] }}</p>
                        </div>
                        <div class="flex">
                            @foreach(range(1,5) as $score)
                                @if($result['rating'] >= $score)
                                <x-heroicon-s-star class="w-4 h-4 text-green-500"/>
                                @else
                                <x-heroicon-o-star class="w-4 h-4 text-green-500"/>
                                @endif
                            @endforeach
                            <span class="ml-1 text-sm">{{ number_format($result['rating'], 1) }}</span>
                        </div>
                        <p class="text-xs">Summary: {{ $result['summary'] }}</p>
                    </div>
                    <div class="absolute top-2 right-2">
                        @if($result['accuracy'] >= 90)
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-green-600 rounded-full">
                            {{ $result['accuracy'] }}%
                        </div>
                        @elseif($result['accuracy'] >= 80)
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-green-500 rounded-full">
                            {{ $result['accuracy'] }}%
                        </div>
                        @elseif($result['accuracy'] >= 70)
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-green-300 rounded-full">
                            {{ $result['accuracy'] }}%
                        </div>
                        @elseif($result['accuracy'] >= 40)
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-yellow-400 rounded-full">
                            {{ $result['accuracy'] }}%
                        </div>
                        @elseif($result['accuracy'] >= 0)
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-red-400 rounded-full">
                            {{ $result['accuracy'] }}%
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function app(){
        return {
            step: 'result',
            loading: true,
            init(){
                this.loading = false;
            },

            next(step){
                if(step == 'end'){
                    this.generateResults();
                }else{
                    this.step = step;
                }
                
            },
            back(step){
                this.step = step;
            },
            generateResults(){
                this.step = 'result';
                setTimeout(() => {
                    this.loading = false;
                }, 3000);
            }
        }
    }
</script>
</div>