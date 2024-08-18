<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white" id="specialities">Our specialities</h2>
      </div>
      <!-- End Title -->
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-6">

      @foreach($specialist_cards as $speciality)
      <!-- Card -->
      <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800" href="/filter-by-speciality/{{$speciality->id}}">
        <div class="p-4 md:p-5">
          <div class="flex justify-between items-center gap-x-3">
            <div class="grow">
              <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                {{$speciality->speciality_name}}
              </h3>
              <p class="text-sm text-gray-500 dark:text-neutral-500">
                {{$speciality->doctors->count()}}
              </p>
            </div>
            <div>
              <svg class="shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </a>
      <!-- End Card -->
      @endforeach
  
     
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Section -->