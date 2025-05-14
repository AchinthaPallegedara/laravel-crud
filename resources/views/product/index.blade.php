<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    @vite(['resources/js/app.js'])
</head>
<body class="container">
    <div class="product-header">
        <h1>Products</h1>
        <div class="create-button">
            <a href="{{ route('product.create') }}">Create Product</a>
        </div>
    </div>
    @if(session()->has('success'))
        <div id="toast-success" class="toast">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span>{{ session('success') }}</span>
            <button onclick="closeToast()">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <script>
            function closeToast() {
                document.getElementById('toast-success').style.display = 'none';
            }
            // Auto-dismiss after 5 seconds
            setTimeout(() => {
                const toast = document.getElementById('toast-success');
                if (toast) toast.style.display = 'none';
            }, 5000);
        </script>
    @endif
    <div class="product-table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Price(Rs.)</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['product' =>$product]) }}"
                               class="edit-button">
                                Edit
                            </a>
                            <form action="{{ route('product.destroy',['product'=>$product]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
