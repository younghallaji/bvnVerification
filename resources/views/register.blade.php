@extends('layouts.home')
@section('title', 'Login Page')
@section('content')
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <div class="bg-gray-100 flex rounded-2xl p-5 shadow-lg max-w-3x1">
            <div class="sm:w-1/2 items-center px-16">
                <h2 class="font-bold text-6xl text-center pt-4 pb-2 text-[#9578EF]">Register</h2>
                <p class="text-sm text-center mt-4">If you already a member,  
                    <a href="/" class="font-semibold text-[#9578EF] hover:text-[#b684f3cf]">Login</a>
                </p>
                
                <form class="space-y-3" action="{{route('add-user')}}" method="POST">
                    @csrf
                    <div>
                      <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                      <div class="mt-2">
                        <input id="name" value="{{ old('name') }}" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                      @error('name')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                          <input id="email" value="{{ old('email') }}" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('email')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                      </div>
              
                    <div>
                      <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                      </div>
                      <div class="mt-2 relative">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-0 -translate-y-1/2 right-3" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                          </svg>
                      </div>
                    @error('password')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                        </div>
                        <div class="mt-2 relative">
                          <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-0 -translate-y-1/2 right-3" viewBox="0 0 16 16">
                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </div>
                      </div>
              
                    <div>
                      <button type="submit" class="flex w-full justify-center rounded-md bg-[#9578EF] px-3 py-1.5 text-lg font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign Up</button>
                    </div>
                  </form>
            </div>

            <div class="w-1/2 p-5 sm:block hidden">
                <img class=" rounded-lg " src="{{asset('image/login-img.jpg')}}" alt="">
            </div>
        </div>
    </section>
@endsection