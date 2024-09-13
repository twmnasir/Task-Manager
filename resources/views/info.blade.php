@extends('layout')
@section('title')
    Info
@endsection
@section('info_active')
text-blue-500 
@endsection
@section('content')
<div class="max-w-screen-xl px-4 mx-auto mt-8 bg-white rounded-lg shadow-md sm:px-6 lg:px-8">
    <div class="overflow-hidde">
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Lifetime total task created: {{ $total_id }}</h2>
      </div>
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Total completed tasks: {{ $completed }}</h2>
      </div>
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Total incompleted tasks: {{ $not_completed }}</h2>
      </div>
      </div>
    </div>
  </div>
  @endsection