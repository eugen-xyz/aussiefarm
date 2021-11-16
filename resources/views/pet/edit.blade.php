@extends('layouts.base')

@section('content')
@include('layouts.navigation')

{{-- content --}}

<section class="py-5">

    <div class="container px-12 px-lg-12 mt-12">

        <div class="col-md-12">
            <a href="{{ route('pet.index') }}" style="float: right;">
                <button type="button" class="btn btn-dark">Back to List</button>
            </a>
        </div>
    </div>

    <div class="clear-fix">
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>

    </div>

    <div class="container px-4 px-lg-5 mt-5">

        @if(session()->has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
           
            @include('pet.partials.form')

        </div>
    </div>
</section>

@endsection

@push('custom-scripts')
    <script>
        var action = '{{ route('pet.update', $pet) }}';
        var type = 'put';
        var option = 'edit';

        var pet = `{!! $data['pet']->toJson() !!}`;
        var pet = JSON.parse(pet);
    </script>

    <script src="{{ URL::asset('js/pet.js') }}"></script>
@endpush