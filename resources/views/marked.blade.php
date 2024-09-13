@extends('layout')
@section('title')
    Marked
@endsection
@section('marked_active')
text-blue-500 
@endsection
<style>
    /* Optional: Custom styling */
    .hidden {
        display: none;
    }
    /* Custom fade-out effect */
    .fade-out {
        opacity: 1;
        transition: opacity 1s ease-out;
    }
    .fade-out.hidden {
        opacity: 0;
    }
</style>
@section('content')

<div class="max-w-3xl px-4 mx-auto mt-8 mb-4 bg-white">
    <h2 class="mb-4 text-2xl font-semibold text-center">Marked Tasks List</h2>
    
    @if (session('success'))
    <!-- Alert Message -->
    <div id="alert" class="fixed p-4 text-white bg-red-500 rounded-lg shadow-lg top-4 right-4 fade-out">
        <p>Your all tasks deleted successfully </p>
    </div>
    @endif

    <!-- Search Form -->
    @php
        $count = $tasks->count();
    @endphp
    @if ($count != 0)
    <div class="mb-4">
        <label for="search" class="block mb-2 text-lg font-normal">Search by Title:</label>
        <input type="text" id="search" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Title">
    </div>
    @endif
    <!-- List -->
    <ul id="item-list" class="space-y-4">
        @forelse ($tasks as $task)
        <li data-title="{{ $task->title }}" class="flex items-center justify-between p-4 rounded-lg shadow-sm bg-gray-50">
            <span class="text-md">{{ $loop->index +1}}. <s>{{ $task->title }}</s> </span>
            <a href="{{ route('tasks.show',['task' => $task->id]) }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                details
            </a>
        </li>
        @empty
            <p colspan="5" class="text-center">No completed tasks yet!</p>
        @endforelse
        <!-- Add more list items as needed -->
    </ul>
  @if ($count != 0)
  <div class="flex my-3">
    <a href="{{ route('marked.delete') }}" class="px-4 py-2 text-white bg-red-500 rounded ms-auto hover:bg-red-400">Delete Marked Tasks</a>
</div>
  @endif
</div>
@endsection
@section('js_footer')
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const items = document.querySelectorAll('#item-list li');
            
            items.forEach(item => {
                const itemTitle = item.getAttribute('data-title').toLowerCase();
                
                if (itemTitle.includes(searchValue) || searchValue === '') {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });

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
