@extends('layouts.blog')

@section('content')
    <!--Title-->
    <div class="font-sans">
        <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $article->descr }}</h1>
        <p class="text-sm md:text-base font-normal text-gray-600">Published {{ $article->created_at }}</p>
    </div>
    <!-- Content -->
    <p class="py-2">{!!  Str::markdown($article->content)  !!}</p>
    <p class="text-base md:text-sm text-green-500 font-bold">
        <a href="{{ route('welcome') }}" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">На главную</a>
    </p>
@endsection
