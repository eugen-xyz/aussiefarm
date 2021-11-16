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

            {{-- <div class="col mb-5">
                <form id="form">
            
                    {{ csrf_field() }}
            
                    <label for="name">Name</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="{{ $pet->name ?? '' }}">
                        <span class="name_error"></span>
                    </div>
                    
                    <label for="name">Nickname</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="">
                        <span class="nickname_error"></span>
                    </div>
            
                    <label for="quantity">Weight</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="">
                        <span class="weight_error"></span>
                    </div>
                

                    <label for="quantity">Height</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="">
                        <span class="height_error"></span>
                    </div>
                          
                    <label for="quantity">Gender</label>
                    <div class="mb-3">
                        <select  class="form-control" value="">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="gender_error"></span>
                    </div>
                    

                    <label for="quantity">Color</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="">
                        <span class="color_error"></span>
                    </div>

                    <label for="quantity">Friendliness</label>
                    <div class="mb-3">
                        <select  class="form-control" value="">
                            <option value="">Select</option>
                            <option value="friendly">Friendly</option>
                            <option value="not friendly">Not Friendly</option>
                        </select>
                        <span class="friendliness_error"></span>
                    </div>
            
                    <label for="quantity">Birthday</label>
                    <div class="mb-3">
                        <input type="text" id="datepicker" class="form-control" value="">
                        <span class="birthday_error"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</a>
            
                </form>
            </div> --}}
        </div>
    </div>
</section>

@endsection

@push('custom-scripts')
    <script>
        var action = '{{ route('pet.store') }}';
        var type = 'post';
        var option = '';
    </script>

    <script src="{{ URL::asset('js/pet.js') }}"></script>
@endpush