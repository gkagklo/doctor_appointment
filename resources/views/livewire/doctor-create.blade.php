<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                    <form wire:submit="register" class="p-4">
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text"
                                name="name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email"
                                name="email" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Bio -->
                        <div>
                            <x-input-label for="bio" :value="__('Bio/About')" />
                            <x-text-input wire:model="bio" id="bio" class="block mt-1 w-full" type="text"
                                name="bio" required autofocus autocomplete="bio" />
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        <!-- Hospital Name -->
                        <div>
                            <x-input-label for="hospital_name" :value="__('Hospital Name')" />
                            <x-text-input wire:model="hospital_name" id="hospital_name" class="block mt-1 w-full" type="text"
                                name="hospital_name" required autofocus autocomplete="hospital_name" />
                            <x-input-error :messages="$errors->get('hospital_name')" class="mt-2" />
                        </div>

                        <!-- Speciality -->
                        <div>
                            <x-input-label for="speciality" :value="__('Specialities')" />
                            <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option selected="">Choose Speciality</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                                name="password" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input wire:model="password_confirmation" id="password_confirmation"
                                class="block mt-1 w-full" type="password" name="password_confirmation" required
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Twitter -->
                        <div>
                            <x-input-label for="twitter" :value="__('Twitter')" />
                            <x-text-input wire:model="twitter" id="twitter" class="block mt-1 w-full" type="text"
                                name="twitter" required autofocus autocomplete="twitter" />
                            <x-input-error :messages="$errors->get('twitter')" class="mt-2" />
                        </div>

                        <!-- Instagram -->
                        <div>
                            <x-input-label for="instagram" :value="__('Instagram')" />
                            <x-text-input wire:model="instagram" id="instagram" class="block mt-1 w-full" type="text"
                                name="instagram" required autofocus autocomplete="instagram" />
                            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="/admin/doctors">
                                Cancel
                            </a>
                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
