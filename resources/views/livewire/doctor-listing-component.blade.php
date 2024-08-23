<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  @if(session()->has('message'))
    <div class="mt-2 bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
       {{session('message')}}
    </div>
  @elseif(session()->has('error'))
    <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
       {{session('error')}}
    </div>
  @endif
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
          <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
              <!-- Input -->
              <div class="sm:col-span-1">
                <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                <div class="relative">
                  <input wire:model.live.debounce.300ms="search" type="text" id="hs-as-table-product-review-search" name="hs-as-table-product-review-search" class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search Doctor">
                  <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                    <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                  </div>
                </div>
              </div>
              <!-- End Input -->   
              <div>
                <div class="inline-flex gap-x-2">
                  <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/admin/create/doctor">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create
                  </a>
                </div>
              </div>           
            </div>
            <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-50 dark:bg-neutral-800">
              <tr>
               
                

                <th wire:click="doSort('name')" scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="name" />
                    </span>
                  </div>
                </th>

                <th wire:click="doSort('email')" scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="email" />
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Bio
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Speciality
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Hospital Name
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Experience
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Featured
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                      Actions
                    </span>
                  </div>
                </th>

              </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
              @if(count($doctors) > 0)
                  @foreach($doctors as $doctor)
                  <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                
                     
  
                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <span class="text-sm text-gray-600 dark:text-neutral-400">{{$doctor->user->name}}</span>
                        </div>
                      </td> 

                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <span class="text-sm text-gray-600 dark:text-neutral-400">{{$doctor->user->email}}</span>
                        </div>
                      </td> 

                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <span class="text-sm text-gray-600 dark:text-neutral-400">{{$doctor->bio}}</span>
                        </div>
                      </td> 

                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <span class="text-sm text-gray-600 dark:text-neutral-400">{{$doctor->speciality->speciality_name}}</span>
                        </div>
                      </td> 

                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <span class="text-sm text-gray-600 dark:text-neutral-400">{{$doctor->hospital_name}}</span>
                        </div>
                      </td> 
                
                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <span class="text-sm text-gray-600 dark:text-neutral-400">{{$doctor->experience}}</span>
                        </div>
                      </td>

                      <td class="size-px whitespace-nowrap align-top">
                        <div class="block p-6">
                          <input wire:click="featured({{$doctor->id}})" @if($doctor->is_featured == 1) checked @endif type="checkbox" id="hs-basic-usage" class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600
                          before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                          <label for="hs-basic-usage" class="sr-only">switch</label>
                        </div>
                      </td>
                                        
                      <td class="size-px whitespace-nowrap align-top">
                        <div class="flex p-6 gap-4">
                          <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                          href="/admin/edit/doctor/{{$doctor->id}}">
                            Edit
                          </a>
                          <button wire:confirm.prevent="Are you sure?" wire:click="delete({{$doctor->id}})" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Delete
                          </button>
                        </div> 
                      </td> 

                    </tr>
                  @endforeach
              @else  
              <tr>
                  <td colspan="9" class="text-center">
                      No data found
                  </td>
              </tr>
              @endif
             
            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
            <div class="max-w-sm space-y-3">
              <select wire:model.live="perPage" class="py-2 px-3 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <option selected>5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>25</option>
              </select>
            </div>

            <div>
                {{ $doctors->links() }}
            </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->
