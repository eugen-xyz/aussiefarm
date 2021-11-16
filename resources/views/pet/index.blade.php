@extends('layouts.base')

@section('content')
@include('layouts.navigation')

<section class="py-5">

    <div class="container px-12 px-lg-12 mt-12">

        <div class="col-md-12">
            <a href="{{ route('pet.create') }}" style="float: right;">
                <button type="button" class="btn btn-dark">Add New</button>
            </a>
        </div>
    </div>

    <div class="clear-fix"><br><br></div>

    <div class="container px-4 px-lg-5 mt-5">

        <div id="dataGridContainer"></div>
    </div>
</section>

@endsection

@push('custom-scripts') 
    <script>
        var serviceUrl = `{{ route('pet.getList') }}`;
    </script>

    <script src="{{ URL::asset('js/data-grid.js') }}"></script>
@endpush