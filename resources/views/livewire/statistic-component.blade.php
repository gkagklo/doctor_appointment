<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    @if(auth()->user() && auth()->user()->role == 2)
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-yellow-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Users</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $users_count }}
          </h3>
        </div>
  
        <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
          <dt class="pe-3">
            <span class="text-yellow-600">
              <span class="inline-block text-sm">
                {{ $last_week_users_count }}
              </span>
            </span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
          </dt>
          <dd class="text-start ps-3">
            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $last_month_users_count }}</span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
          </dd>
        </dl>
      </div>
      <!-- End Card -->
  
      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Doctors</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $doctors_count }}
          </h3>
        </div>
  
        <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
          <dt class="pe-3">
            <span class="text-green-600">
              <span class="inline-block text-sm">
                {{ $last_week_doctors_count }}
              </span>
            </span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
          </dt>
          <dd class="text-start ps-3">
            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $last_month_doctors_count}}</span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
          </dd>
        </dl>
      </div>
      <!-- End Card -->
  
      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-red-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Patients</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $patients_count }}
          </h3>
        </div>
  
        <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
          <dt class="pe-3">
            <span class="text-red-600">
              <span class="inline-block text-sm">
                {{ $last_week_patients_count }}
              </span>
            </span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
          </dt>
          <dd class="text-start ps-3">
            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $last_month_patients_count }}</span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
          </dd>
        </dl>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-blue-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Appointments</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $appointments_count }}
          </h3>
        </div>
  
        <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
          <dt class="pe-3">
            <span class="text-blue-600">
              <span class="inline-block text-sm">
                {{ $admin_last_week_appointments_count }}
              </span>
            </span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
          </dt>
          <dd class="text-start ps-3">
            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $admin_last_month_appointments_count}}</span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
          </dd>
        </dl>
      </div>
      <!-- End Card -->

    </div>
    <!-- End Grid -->
    @elseif(auth()->user() && auth()->user()->role == 1)
      <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-yellow-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">All Appointments</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $doctor_appointments_count }}
          </h3>
        </div>
  
        <dl class="flex justify-center items-center divide-x divide-gray-200 dark:divide-neutral-800">
          <dt class="pe-3">
            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $last_week_appointments_count }}</span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last week</span>
          </dt>
          <dd class="text-start ps-3">
            <span class="text-sm font-semibold text-gray-800 dark:text-neutral-200"> {{ $last_month_appointments_count }} </span>
            <span class="block text-sm text-gray-500 dark:text-neutral-500">last month</span>
          </dd>
        </dl>
      </div>
      <!-- End Card -->
  
      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Upcomming Appointments</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $upcomming_appointments_count }}
          </h3>
        </div>
      </div>
      <!-- End Card -->
  
      <!-- Card -->
      <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
        <div class="inline-flex justify-center items-center">
          <span class="size-2 inline-block bg-red-500 rounded-full me-2"></span>
          <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Complete Appointments</span>
        </div>
  
        <div class="text-center">
          <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $complete_appointments_count }}
          </h3>
        </div>
      </div>
      <!-- End Card -->

    </div>
    <!-- End Grid -->
    @else 
    @endif
  </div>
  <!-- End Card Section -->