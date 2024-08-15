<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                    <form wire:submit="save" class="p-4">
                        <!-- Available day -->
                        <div>
                            <x-input-label for="available_day" :value="__('Days of the week')" />
                            <select wire:model="available_day" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 mb-2">
                                <option selected="">Choose Available day of the week</option>
                                @foreach($daysOfWeek as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('available_day')" class="mt-2" />    
                        </div>

                        <!-- Available From -->
                        <div>
                            <x-input-label for="from" :value="__('Available From')" />
                            <x-text-input wire:model="from" id="from" class="block mt-1 w-full mb-2" type="time"
                                name="from" />
                            <x-input-error :messages="$errors->get('from')" class="mt-2" />
                        </div>

                        <!-- Available To -->
                        <div>
                            <x-input-label for="to" :value="__('Available to')" />
                            <x-text-input wire:model="to" id="to" class="block mt-1 w-full mb-2" type="time"
                                name="to" />
                            <x-input-error :messages="$errors->get('to')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="/doctor/schedules">
                                Cancel
                            </a>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
