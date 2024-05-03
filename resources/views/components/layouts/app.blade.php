 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--        <link rel="stylesheet" href="/app.css">--}}
        <title>{{ $title ?? 'Page Title' }}</title>
        <style>
            .current {
                font-weight: bold;
                font-size: 16px;
            }
            .archived {
                background: #ddd;
            }
            button.fi-btn.relative.grid-flow-col.items-center.justify-center.font-semibold.outline-none.transition.duration-75.focus-visible\:ring-2.rounded-lg.fi-color-custom.fi-btn-color-primary.fi-color-primary.fi-size-md.fi-btn-size-md.gap-1\.5.px-3.py-2.text-sm.inline-grid.shadow-sm.bg-custom-600.text-white.hover\:bg-custom-500.focus-visible\:ring-custom-500\/50.dark\:bg-custom-500.dark\:hover\:bg-custom-400.dark\:focus-visible\:ring-custom-400\/50.fi-ac-action.fi-ac-btn-action{
                background-color: green;
            }
            a.fi-btn.relative.grid-flow-col.items-center.justify-center.font-semibold.outline-none.transition.duration-75.focus-visible\:ring-2.rounded-lg.fi-color-custom.fi-btn-color-primary.fi-color-primary.fi-size-md.fi-btn-size-md.gap-1\.5.px-3.py-2.text-sm.inline-grid.shadow-sm.bg-custom-600.text-white.hover\:bg-custom-500.focus-visible\:ring-custom-500\/50.dark\:bg-custom-500.dark\:hover\:bg-custom-400.dark\:focus-visible\:ring-custom-400\/50.fi-ac-action.fi-ac-btn-action {
                background-color: rgb(79 70 229 / var(--tw-bg-opacity));
            }
            .text-danger-600{
                color: #dc2626;
            }
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/@alpinejs/ui@3.13.1-beta.0/dist/cdn.min.js"></script>
{{--        <script defer src="http://alpine.test/packages/ui/dist/cdn.js"></script>--}}
        <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    </head>
    <body>
        <main class="mx-auto flex justify-center px-8 lg:px-16">
            <div class="py-12 w-full max-w-[50rem]">
                    <div class="grid gap-8">
                        <div class="grid gap-4">
                            <h2 class="text-5xl font-bold">Separator</h2>

                            <x-separator id="foo" class="!bg-cyan-500"/>

                            <div class="flex gap-4">
                                <div>
                                    <b><a wire:navigate href="/program-account" @class(['current' => request()->is('/program-account')])>Program Account</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a href="/store/1/orders" @class(['current' => request()->is('page')])>Page Orders</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/" @class(['current' => request()->is('/')])>Todos</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/counter" @class(['current' => request()->is('counter')])>Counter</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/hello-world" @class(['current' => request()->is('hello-world')])>Hello World</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/posts" @class(['current' => request()->is('show-posts')])>Posts</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/create-post" @class(['current' => request()->is('create-post')])>Create Post</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/edit-profile" @class(['current' => request()->is('edit-profile')])>Edit Profile</a></b>
                                </div>

                                <x-separator vertical />

                                <div>
                                    <b><a wire:navigate href="/signup" @class(['current' => request()->is('signup')])>Sign Up</a></b>
                                </div>
                            </div>
                            <x-separator class="!bg-cyan-500" />
                        </div>
                    </div>
                {{ $slot }}
            </div>
        </main>
    </body>
</html>
