<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <h1 class="mb-4">Item List</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add New Item</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Code</th><th>Name</th><th>Quantity</th><th>Expired</th><th>Note</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->expired_date }}</td>
                <td>{{ $item->note }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                     <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
