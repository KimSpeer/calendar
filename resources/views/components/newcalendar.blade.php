@extends('layout.layoutnew')

@section('new')

<!-- This example requires Tailwind CSS v2.0+ -->

<div class="mx-20">
 @livewire('calendar-new')
</div>
<div class="my-20"></div>
<div class="mx-96">
    @livewire('calendar')

</div>


<div class="mb-20"></div>

@endsection
