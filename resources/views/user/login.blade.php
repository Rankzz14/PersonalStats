@extends('layout.app')


@section('content')

<section id="login" class="px-52">
    <form class="mx-auto px-80 mt-6 rounded-lg" action="{{ route('loginin') }}" method="POST">
        @method('POST')
        @csrf
        <div class="rounded-lg shadow-md p-6 dark:bg-slate-700 text-slate-900 dark:text-gray-300 space-y-4">
            <h1 class="text-3xl font-medium text-center">Login</h1>
            <div class="flex flex-col">
                <label for="email" class="font-semibold">Email Adress</label>
                <input type="email" name="email" id="email" class="rounded-lg shadow-sm ring-blue-500 text-black" required>
            </div>
            <div class="flex flex-col">
                <label for="password" class="font-semibold">Password</label>
                <input type="password" name="password" id="password" class="rounded-lg shadow-sm ring-blue-500 text-black" required>
            </div>
            <div class="flex">
                <small class="">Dont have an account? <a href="/register" class="text-mavi-light hover:text-mavi transition-colors duration-200">Register</a></small>
                <button class="ml-auto flex px-4 py-2 bg-mavi hover:bg-mavi-dark text-white rounded-md shadow-sm transition-colors duration-200">Login</button>
            </div>
        </div>
    </form>
</section>

@endsection



@section('script')

@endsection
