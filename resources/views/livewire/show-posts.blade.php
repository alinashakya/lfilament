<div>
    <h2>Posts:</h2>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>
{{--                    <livewire:add-post-dialog @added="$refresh"></livewire:add-post-dialog>--}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <livewire:post-row  :key="$post->id" :post="$post">
            @endforeach
        </tbody>
    </table>
</div>
