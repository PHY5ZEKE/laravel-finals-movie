<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h1>Edit Theater</h1>
                  <hr/>
                  <br/>
                  <form action="{{ route('management.theater.update', $theater->theater_id) }}" method="POST">
        @csrf
        @method('PATCH')
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Theater Information</h2>
     
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
              <input type="text" 
              name="name" 
              id="name" 
              value="{{ $theater->name }}" 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="name" />
          </div>
  
          <div class="sm:col-span-3">
            <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
            <div class="mt-2">
              <input type="text" 
              name="location" 
              id="location" 
              value="{{ $theater->location }}"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="location" />
          </div>
  
          <div class="sm:col-span-3">
            <label for="capacity" class="block text-sm font-medium leading-6 text-gray-900">Seat Capacity</label>
            <div class="mt-2">
              <input type="number" 
              name="capacity" 
              id="capacity" 
              value="{{ $theater->capacity }}"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="capacity" />
          </div>
  
          
    
        
  
        
        </div>
      </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
