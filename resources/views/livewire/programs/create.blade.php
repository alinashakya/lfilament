<div>
    <div class="container max-w-2xl mt-4 mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-5">
        <div class="flex">
            <div class="w-full">
                <div class="flex flex-row mt-4">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{$title}}</h3>
                        <p class="mt-1 text-sm text-gray-500">Enter the details</p>
                    </div>
                </div>
                <form wire:submit.prevent="create">
                    {{$this->form}}
                    <div class="flex flex-row mt-4 justify-end">
                        <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
