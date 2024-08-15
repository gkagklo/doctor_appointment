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
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Schedules
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                Available Schedules.
                            </p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="/doctor/create/schedule">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    Create
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-start">
                                <span
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                    S/N
                                </span>
                              </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <span
                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                        Available Day
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <span
                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                        From Time
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <span
                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                        To Time
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <span
                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                        Actions
                                    </span>
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                          @if(count($schedules) > 0)
                            @foreach ($schedules as $schedule)
                            <tr>
                              <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span
                                        class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</span>
                                </div>
                              </td>      
                                <td class="h-px w-auto whitespace-nowrap">
                                    <div class="px-6 py-2">
                                        <span
                                            class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{ $daysOfWeek[$schedule->available_day] }}</span>
                                    </div>
                                </td>
                                <td class="h-px w-auto whitespace-nowrap">
                                    <div class="px-6 py-2">
                                        <span
                                            class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{ $schedule->from }}</span>
                                    </div>
                                </td>
                                <td class="h-px w-auto whitespace-nowrap">
                                    <div class="px-6 py-2">
                                        <span
                                            class="font-semibold text-sm text-gray-800 dark:text-neutral-200">{{ $schedule->to }}</span>
                                    </div>
                                </td>
                                
                                <td class="h-px w-auto whitespace-nowrap">
                                  <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                      href="/doctor/edit/schedule/{{$schedule->id}}">
                                      Edit
                                  </a>
                                  <button wire:confirm.prevent="Are you sure?" wire:click="delete({{$schedule->id}})" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                      Delete
                                  </button>
                                </td>
                            </tr>
                            @endforeach
                          @else 
                          <tr>
                            <td colspan="3" class="text-center">No data found!</td>
                          </tr>
                          @endif

                        </tbody>
                    </table>
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Table Section -->
