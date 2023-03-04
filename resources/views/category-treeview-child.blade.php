<li>
    {{ $category->name }}
    @if(count($category->children))
        <ul>
            @foreach($category->children as $child)
                @include('category-treeview-child', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>git init