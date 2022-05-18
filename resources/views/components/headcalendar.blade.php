@extends('layout.layout')

@section('head')

@livewire('calendar', ['month' => $month, 'year'=>$year])

@endsection
