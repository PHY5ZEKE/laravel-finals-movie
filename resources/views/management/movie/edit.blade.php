<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h1>Add Movie</h1>
                  <hr/>
                  <br/>
                  <form action="{{ route('management.movie.update', $movie->id) }}" method="POST">
        @csrf
        @method('PATCH')
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Movie Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Fill out the details below to insert the movie in the website</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Movie Title</label>
            <div class="mt-2">
              <input type="text" 
              name="title" 
              id="title" 
              value="{{ $movie->title }}" 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="title" />
          </div>
  
          <div class="sm:col-span-3">
            <label for="genre" class="block text-sm font-medium leading-6 text-gray-900">Genre</label>
            <div class="mt-2">
              <input type="text" 
              name="genre" 
              id="genre" 
              value="{{ $movie->genre }}"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="genre" />
          </div>
  
          <div class="sm:col-span-3">
            <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Duration (In Minutes)</label>
            <div class="mt-2">
              <input type="number" 
              name="duration" 
              id="duration" 
              value="{{ $movie->duration }}"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="duration" />
          </div>
  
          <div class="sm:col-span-3">
            <label for="releaseDate" class="block text-sm font-medium leading-6 text-gray-900">Release Date</label>
            <div class="mt-2">
              <input 
              type="date" 
              name="releaseDate" 
              id="releaseDate" 
              value="{{ $movie->releaseDate }}"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <x-form-error name="releaseDate" />
          </div>
    
          <div class="col-span-full">
            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                <textarea 
                name="description" 
                id="description"
                 rows="4" 
                value="{{ $movie->description }}"
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-y"></textarea>
            </div>
            <x-form-error name="description" />
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
