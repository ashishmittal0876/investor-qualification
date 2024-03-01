<form class="px-12 py-20">
    <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Let us know how to contact you</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <x-input-label for="first_name" class="block text-sm font-medium leading-6 text-gray-900" :value="__('First Name')" />
                    <div class="mt-2">
                        <x-text-input wire:model="firstName" id="first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="first_name" autofocus autocomplete="first_name" />
                        <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <x-input-label for="last_name" class="block text-sm font-medium leading-6 text-gray-900" :value="__('Last Name')" />
                    <div class="mt-2">
                        <x-text-input wire:model="lastName" id="last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="last_name" autofocus autocomplete="last_name" />
                        <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <div class="mt-2">
                        <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" autocomplete="username" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                    <div class="mt-2">
                        <label for="countryId"></label>
                        <select id="countryId" name="countryId" autocomplete="country-name" wire:model="countryId"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="">Select a country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('countryId')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <x-input-label for="mobile_number" class="block text-sm font-medium leading-6 text-gray-900" :value="__('Mobile Number')" />
                    <div class="mt-2">
                        {{--                        <x-tel-input--}}
                        {{--                            wire:model="mobileNumber"--}}
                        {{--                            id="mobile_number"--}}
                        {{--                            name="mobile_number"--}}
                        {{--                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"--}}
                        {{--                        />--}}
                        <x-text-input wire:model="mobileNumber" id="mobile_number" class="block mt-1 w-full" type="tel" name="mobile_number" autocomplete="tel" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                        <x-input-error :messages="$errors->get('mobileNumber')" class="mt-2" />
                    </div>
                </div>

            </div>

        </div>
    <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Create a Password for your account</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Let us know how to contact you</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <!-- Password -->
                <div class="sm:col-span-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="mt-2">
                        <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="sm:col-span-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="mt-2">
                        <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        @if($this->hasPreviousStep())
            <button
                wire:click.prevent="previous"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Previous
            </button>
        @endif
        @if($this->hasNextStep())
        <button
            wire:click.prevent="next"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Next
        </button>
        @endif

    </div>
</form>
