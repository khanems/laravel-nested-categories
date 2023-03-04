<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    <a href="/create" class="btn btn-success mb-3">Create Category</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Parent Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ isset($category->id) ? $category->id : 'N/A' }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>@if ($category->parent) {{ $category->parent->name }} @else None @endif</td>
                                    <td>
                                        <a href="edit/{{$category->id}}" class="btn btn-sm btn-primary">Edit</a>
                                        <!-- Add the delete form here -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Category Treeview</div>

                <div class="card-body">
                    <ul id="category-treeview">
                        @foreach($categories as $category)
                            @if($category->parent_id == null)
                                @include('category-treeview-child', ['category' => $category])
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>