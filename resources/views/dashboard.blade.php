@extends('layouts.home')
@section('title', 'Dashboard Page')
@section('content')
<div>
    <div class="bg-gray-50">
        
        <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="flex justify-end " >
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-[#9578EF] hover:bg-[#754cf1] text-white font-bold py-1 px-4 rounded">Logout</button>
                </form>
            </div>
          <div class="bg-gray-100 flex rounded-2xl p-5 shadow-lg max-w-3x1">
            <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-10 lg:text-left">
              <h2 class="text-3xl font-bold tracking-tight text-[#9578EF] sm:text-4xl">Verify Your Bank <br> Verification Number</h2>
              <p class="mt-6 text-lg leading-8 text-violent-20"><strong>{{Auth::user()->name}}</strong></p>
              
              <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                <form class="space-y-3" action="{{ route('verify') }}" method="POST">
                    @csrf
                      <div>
                        <label for="bvn" class="block text-sm font-medium leading-6 text-gray-900">Enter BVN</label>
                        <div class="mt-2">
                          <input id="bvn" name="bvn" type="number" autocomplete="bvn" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                      </div>
                
                      @error('message')
                          <div class="text-red-300">{{$message}}</div>
                      @enderror
                      
                      <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-[#9578EF] px-3 py-1.5 text-lg font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                      </div>
                    </form>
                
              </div>
            </div>
            <div class="relative mt-16 h-80 lg:mt-0 pb-4">
              @if (!empty($data)) 
                <div class="w-full">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                          <tr>
                            <th class="px-6 py-4 text-left bg-gray-100 border-b">
                              Key 
                            </th>
                            <th class="px-6 py-4 text-left bg-gray-100 border-b">
                              Values
                            </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="px-6 py-4 border-b">
                              Profile Picture
                            </td>
                            <td class="px-6 py-4 border-b">
                              <img width="150px" src="{{$data['image']}}" alt="user-profile-picture">
                            </td>
                           
                          </tr>
                          
                          <tr>
                              <td class="px-6 py-4 border-b">Respose Status: </td>
                              <td class="px-6 py-4 border-b">{{$data['status']}}</td>
                          </tr>
                          <tr>
                              <td class="px-6 py-4 border-b">Name: </td>
                              <td class="px-6 py-4 border-b">{{$data['firstName']." ".$data['middleName']." ".$data['lastName']}}</td>
                          </tr>
                          <tr>
                              <td class="px-6 py-4 border-b">Date of Birth: </td>
                              <td class="px-6 py-4 border-b">{{$data['dateOfBirth']}}</td>
                          </tr>
                          <tr>
                              <td class="px-6 py-4 border-b">Phone Number: </td>
                              <td class="px-6 py-4 border-b">{{$data['mobile']}}</td>
                          </tr>
                          <tr>
                              <td class="px-6 py-4 border-b">NIN: </td>
                              <td class="px-6 py-4 border-b">{{$data['nin']}}</td>
                          </tr>
                          
                        </tbody>
                      </table>
                </div>
              
              
              @endif
            </div>
          </div>
        </div>
      </div>
   
    
</div> 
@endsection

