<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <h1>Edit Item</h1>
    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Item Code</label>
            <input name="item_code" class="form-control" value="{{ $item->item_code }}">
            @error('item_code') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Item Name</label>
            <input name="item_name" class="form-control" value="{{ $item->item_name }}">
            @error('item_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input name="quantity" type="number" step="0.01" class="form-control" value="{{ $item->quantity }}">
        </div>

        <div class="mb-3">
            <label>Expired Date</label>
            <input name="expired_date" type="date" class="form-control" value="{{ $item->expired_date }}">
        </div>

        <div class="mb-3">
            <label>Note</label>
            <input name="note" class="form-control" value="{{ $item->note }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>
