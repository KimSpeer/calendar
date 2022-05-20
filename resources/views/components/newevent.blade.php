@extends('layout.layout')

@section('head')
<div class="flex justify-center">
    <div class="max-w-xs mx-8 mt-8 ">
    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
        <div class="mb-4">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="subject">
            Subject
        </label>
        <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="subject" type="text" placeholder="Subject">
        </div>
        <div class="mb-6">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="startEvent">
            Start Event:
        </label>
        <input class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="startEvent" type="datetime-local" placeholder="dd.mm.jjjj">
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="endEvent">
            End Event:
            </label>
            <input class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="endEvent" type="datetime-local" placeholder="dd.mm.jjjj">
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-bold text-gray-700">Body: </label>
            <textarea type="text" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="eventBody" rows="3"></textarea>
        </div>
        <div class="flex items-center justify-between">
        <button class="px-4 py-2 font-bold text-black rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
            Create
        </button>
        <a class="inline-block text-sm font-bold text-blue-500 align-baseline hover:text-blue-800" href="#">
            Cancel
        </a>
        </div>
    </form>
    </div>
</div>

@endsection
