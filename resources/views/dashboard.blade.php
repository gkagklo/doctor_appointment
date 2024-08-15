<x-app-layout>
    <div class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:featured-doctors :speciality_id="0"/>
                <livewire:specialist-cards/>
                <livewire:featured-articles/>
                <livewire:recent-appointments/>
            </div>
        </div>
    </div>
</x-app-layout>
