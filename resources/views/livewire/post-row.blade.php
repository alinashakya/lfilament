<tr @class(['archived' => $post->is_archived])>
    <td>{{$post->title}}</td>
    <td>{{str($post->content)->words(2)}}</td>
    <td>
        @unless($post->is_archived)
        <button
            type="button"
            wire:click="archive"
            wire:confirm="Are you sure?"
        >
            Archive
        </button>
        @endunless
            <button
                    wire:click="$parent.delete({{ $post->id }})"
                    wire:confirm="Are you sure you want to delete this Post?"
                    class="text-lg text-center rounded-xl bg-red-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">Delete</button>

{{--            <x-dialog>--}}
{{--                <x-dialog.button>--}}
{{--                    <button type="button" class="font-medium text-red-600">--}}
{{--                        Delete--}}
{{--                    </button>--}}
{{--                </x-dialog.button>--}}

{{--                <x-dialog.panel>--}}
{{--                    <div class="flex flex-col gap-6" x-data="{ confirmation: '' }">--}}
{{--                        <h2 class="font-semibold text-3xl">Are you sure you?</h2>--}}
{{--                        <h2 class="text-lg text-slate-700">This operation is permanant and can't be reversed. This post will be deleted forever.</h2>--}}

{{--                        <label class="flex flex-col gap-2">--}}
{{--                            Type "CONFIRM"--}}
{{--                            <input x-model="confirmation" class="px-3 py-2 border border-slate-300 rounded-lg" placeholder="CONFIRM">--}}
{{--                        </label>--}}

{{--                        <x-dialog.footer>--}}
{{--                            <x-dialog.close-button>--}}
{{--                                <button class="text-lg text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">Cancel</button>--}}
{{--                            </x-dialog.close-button>--}}

{{--                            <x-dialog.close-button>--}}
{{--                                <button :disabled="confirmation !== 'CONFIRM'" wire:click="delete({{ $post->id }})" class="text-lg text-center rounded-xl bg-red-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">Delete</button>--}}
{{--                            </x-dialog.close-button>--}}
{{--                        </x-dialog.footer>--}}
{{--                    </div>--}}
{{--                </x-dialog.panel>--}}
{{--            </x-dialog>--}}
    </td>
</tr>

{{--<tr @class(['archived' => $post->is_archived])>--}}
{{--    <td>{{ $post->title }}</td>--}}
{{--    <td>{{ str($post->content)->words(8) }}</td>--}}
{{--    <td>--}}
{{--        @unless($post->is_archived)--}}
{{--            <button--}}
{{--                type="button"--}}
{{--                wire:click="archive"--}}
{{--                wire:confirm="Are you sure you want to archive this Post?"--}}
{{--            >--}}
{{--                Archive--}}
{{--            </button>--}}
{{--        @endunless--}}

{{--        <button--}}
{{--            type="button"--}}
{{--            wire:click="$parent.delete({{ $post->id }})"--}}
{{--            wire:confirm="Are you sure you want to delete this Post?"--}}
{{--        >--}}
{{--            Delete--}}
{{--        </button>--}}
{{--    </td>--}}
{{--</tr>--}}
