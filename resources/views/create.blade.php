@extends('layout')
@section('title')
    Create
@endsection
@section('create_active')
text-blue-500 
@endsection
@section('content')
<div class="max-w-3xl p-6 mx-auto mt-8 bg-white rounded-lg shadow-lg">
    <!-- Form Group Title -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold text-gray-900">Task Title</label>
            <input type="text" id="title" name="title" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter the title" required>
        </div>
    
        <!-- Form Group Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" id="description" name="description" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter a brief description" required>
        </div>
    
        <!-- Form Group Long Description -->
        <div class="mb-6">
            <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
            <textarea id="long_description" name="long_description" rows="4" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter a longer description"></textarea>
        </div>
    
        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
        </div>
    </form>
</div>
@endsection