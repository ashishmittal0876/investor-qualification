<form class="px-12 py-20">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900">Profile</h2>
            
            <div class="mt-10">
                <fieldset>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Investor Type</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">What Type of Investor are you?</p>
                    <div class="-space-y-px rounded-md bg-white pt-4">
                        @foreach($investorTypes as $key => $investorType)
                            <label
                                class="relative flex cursor-pointer border p-4 focus:outline-none rounded-bl-md">
                                <input type="radio" id="{{$key}}" wire:model="investorType" name="investorType" value="{{$investorType['slug']}}"
                                       class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-indigo-600 border-gray-300 focus:ring-indigo-600 active:ring-2 active:ring-offset-2 active:ring-indigo-600"
                                       aria-labelledby="investor-type-{{ $key }}-label"
                                       aria-describedby="investor-type-{{ $key }}-description">
                                <span class="ml-3 flex flex-col">
                                    <span id="investor-type-{{ $key }}-label" class="block text-sm font-medium">{{ $investorType['name'] }}</span>
                                    <span id="investor-type-{{ $key }}-description" class="block text-sm">{{ $investorType['description'] }}</span>
                                </span>
                            </label>
                        @endforeach
                        <x-input-error :messages="$errors->get('investorType')" class="pt-4" />
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <div class="flex justify-center mt-4">
            <a href="/login" wire:navigate class="text-blue-500 hover:underline text-sm font-semibold">Already a member? Sign in</a>
        </div>
        @if($this->hasNextStep())
        <button
            wire:click.prevent="next"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Next
        </button>
        @endif
    </div>
</form>
