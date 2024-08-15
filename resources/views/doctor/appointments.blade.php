<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All My Appointments') }}
        </h2>
    </x-slot>
    <livewire:my-appointments-component/>
</x-app-layout>