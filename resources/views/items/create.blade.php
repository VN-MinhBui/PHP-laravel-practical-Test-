<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <h1>Add New Item</h1>
    <form method="POST" action="{{ route('items.store') }}">
        @csrf
        <div class="mb-3">
            <label>Item Code</label>
            <input name="item_code" class="form-control" value="{{ old('item_code') }}">
            @error('item_code') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Item Name</label>
            <input name="item_name" class="form-control" value="{{ old('item_name') }}">
            @error('item_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input name="quantity" type="number" step="0.01" class="form-control">
        </div>

        <div class="mb-3">
            <label>Expired Date</label>
            <input name="expired_date" type="date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Note</label>
            <input name="note" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
