<form class="px-12 py-20">
    <!-- a Box component -->
    <div class="p-8 border">
        <label class="text-2xl font-semibold text-gray-900">{{$question->body}}</label>
        <p class="pt-2 text-sm text-gray-500">{{$this->getAnswerInstruction()}}</p>
        @if($question->type === 'radio')
        <fieldset class="mt-4">
            <div class="space-y-4">
                @foreach($question->options as $option)
                <div class="flex items-center p-2">
                    <input id="{{$option->id}}" name="notification-method" type="radio" wire:model="answers" value="{{$option->id}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="{{$option->id}}" class="ml-3 block text-md font-medium leading-6 text-gray-900">{{$option->body}}</label>
                </div>
                @endforeach
            </div>
        </fieldset>
        <div>
            <x-input-error :messages="$errors->get('answers')" class="mt-2" />
        </div>
        @elseif($question->type === 'checkbox')
            <fieldset class="mt-4">
                @foreach($question->options as $option)
                <div class="space-y-4 p-4">
                    <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input id="{{$option->id}}"  type="checkbox" wire:model="answers" value="{{$option->id}}" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="ml-3 text-md leading-6">
                            <label for="{{$option->id}}" class="font-medium text-gray-900">{{$option->body}}</label>
                        </div>
                    </div>
                </div>
                @endforeach
            </fieldset>
            <div>
                <x-input-error :messages="$errors->get('answers')" class="mt-2" />
            </div>
        @elseif($question->type === 'textarea')
            <div class="mt-4">
                <label for="answer" class="block text-sm font-medium text-gray-700"></label>
                <textarea wire:model="answers" id="answer" class="block pt-4 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="3" placeholder="Write your response here"></textarea>
            </div>
            <div>
                <x-input-error :messages="$errors->get('answers')" class="mt-2" />
            </div>

            <div>
                <!-- a input text component -->
                <div class="mt-4">
                    <label for="about" class="block text-sm font-medium text-gray-900">WHO REFERRED YOU</label>
                    <div class="mt-1">
                        <input wire:model="referredBy" type="text" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>
        @endif
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
            @else
            <button
                wire:click.prevent="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Submit
            </button>
        @endif
    </div>
</form>
