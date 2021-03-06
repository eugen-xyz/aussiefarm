@extends('layouts.base')

@section('content')
@include('layouts.navigation')

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @forelse ($data['pets'] as $pet)
           
                <div class="col mb-5">
                    <div class="card h-100">
                
                        @if(strtolower($pet->friendliness) == 'friendly')
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{ $pet->friendliness  }}</div>
                        @endif
                 
                        <img class="card-img-top" src="{{ URL::asset('assets/default-kangaroo.png') }}" alt="default" />
                
                        <div class="card-body p-4">
                            <div class="text-center">
                                
                                <h5 class="fw-bolder">{{ $pet->name ?? '' }}</h5>
                                
                                <div class="d-flex justify-content-center small text-success mb-2">
                                   <strong>{{ $pet->gender ?? '' }}</strong>
                                </div>
                            
                            </div>
                        </div>
                       
                       
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('pet.show', str_replace(' ', '-', strtolower($pet->name))) }}">More Details</a></div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="bg-danger text-white p-1" style="text-align:center;">No pets on the farm</p>
            @endforelse    
           
        </div>
    </div>
</section>

@endsection