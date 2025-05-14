<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      @vite( "resources/css/app.css", "resources/scss/app.scss", "resources/js/app.js",)
</head>
<body class="mx-auto container mt-10">
    <div class="flex items-center justify-between mb-10" >
        <h1 class="font-bold text-5xl">Products</h1>
        <div class="py-2 px-4 cursor-pointer bg-blue-800 text-white shadow-lg rounded-4xl hover:bg-blue-700">
            <a class="text-lg" href="{{ route('product.create') }}">Create Product</a>
        </div>
    </div>
    @if(session()->has('success'))
        <div id="toast-success" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg z-50 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span>{{ session('success') }}</span>
            <button onclick="closeToast()" class="ml-4 text-white focus:outline-none">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
    <div class="w-full" >
        <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-center">ID</th>
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Stock</th>
                    <th class="py-3 px-4 text-center">Price(Rs.)</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="border-t border-gray-200 text-center py-2">{{ $product->id }}</td>
                        <td class="border-t border-gray-200 px-4 py-2">{{ $product->name }}</td>
                        <td class="border-t border-gray-200 px-4 py-2">{{ $product->description }}</td>
                        <td class="border-t border-gray-200 px-4 py-2">{{ $product->stock }}</td>
                        <td class="border-t border-gray-200 px-4 py-2 text-right">{{ $product->price }}</td>
                        <td class="border-t border-gray-200 px-4 py-2 flex items-center justify-center gap-2">
                            <a href="{{ route('product.edit', ['product' =>$product]) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white text-sm py-1 px-3 rounded transition duration-150">
                                Edit
                            </a>
                            <form action="{{ route('product.destroy',['product'=>$product]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white text-sm py-1 px-3 rounded transition duration-150 cursor-pointer"
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
