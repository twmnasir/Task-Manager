@extends('layout')
@section('title')
    Details
@endsection
@section('home_active')
text-blue-500 
@endsection
@section('content')

<div class="max-w-5xl px-4 mx-auto mt-8 mb-4 bg-white">
    <a href="{{ route('tasks.index') }}" class="fixed px-4 py-2 font-bold text-white bg-blue-500 rounded-3xl bottom-10 left-10"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div class="max-w-3xl mx-auto overflow-hidden bg-white rounded-lg shadow-lg">
        <!-- Card Header -->
        <div class="p-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900">{{ $task->title }}</h2>
        </div>

        <!-- Card Body -->
        <div class="p-4">
            <p class="mb-2 text-gray-700">{{ $task->description }}</p>
            <p class="mb-4 text-gray-600">{{ $task->long_description }}</p>
            <p class="text-sm text-gray-500">Created at: <time datetime="2024-09-12T12:00:00Z">{{ $task->created_at->diffForHumans() }}</time></p>
            <p class="mt-4">
                @if ($task->completed == true)
                <p class="text-green-500">
                    <i class="fa-solid fa-check"></i> Completed
                </p>
                @else
                <p class="text-red-500">
                    <i class="fa-solid fa-xmark"></i> Not completed!
                </p>
                @endif
            </p>
        </div>

        <!-- Card Footer -->
        <div class="flex p-4 border-t border-gray-200">
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="px-4 py-2 mx-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Edit</a>
            <a href="{{ route('marked.toggle',['task' => $task->id]) }}" class="px-4 py-2 mx-2 text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                @if ($task->completed)
                Mark as Not completed
                @else
                Mark as completed!             
                @endif
            </a>
            <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="POST">
                @csrf
                @method('Delete')
                <input type="submit" value="Delete" class="px-4 py-2 mx-2 text-white bg-red-500 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
            </form>
        </div>
    </div>
    @if (session('success'))
    <!-- Alert Message -->
    <div id="alert" class="fixed p-4 text-white bg-blue-500 rounded-lg shadow-lg top-4 right-4 fade-out">
        <p>{{ session('success') }}</p>
    </div>
    @endif
</div>
@endsection
@section('js_footer')
    <script>
                // Function to hide the alert message after 5 seconds
                function hideAlert() {
            const alertElement = document.getElementById('alert');
            setTimeout(() => {
                alertElement.classList.add('hidden');
            }, 5000); // 5 seconds
        }

        // Call the function to start the timer
        hideAlert();
    </script>
@endsection
