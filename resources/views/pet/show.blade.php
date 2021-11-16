@extends('layouts.base')

@section('content')
@include('layouts.navigation')


<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ URL::asset('assets/default-kangaroo.png') }}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">{{ $pet->gender ?? '' }} @if($pet->friendliness ?? '') / @endif {{ $pet->friendliness ?? '' }}</div>
                <h1 class="display-5 fw-bolder">{{ $pet->name ?? ''}}</h1>
                <div class="fs-5 mb-5">
                    @if($pet->nickname ?? '')
                        <span>also know as {{ $pet->nickname ?? '' }}</span>
                    @endif
                </div>

                <p class="lead">This lovely marsupial was born on <strong> {{ $pet->birthday ?? '' }} </strong></p>

                @if($pet->color)
                    <p class="lead">@if(strtolower($pet->gender) == 'male') {{ 'His '}} @else {{ 'Her '}} @endif fur is short and can be seen as color  <strong> {{ $pet->color ?? '' }} </strong></p>
                @endif

                <p class="lead">Weighing <strong>{{ $pet->weight ?? '' }}</strong> and with height of <strong>{{ $pet->height ?? '' }}</strong> you can see @if(strtolower($pet->gender) == 'male') {{ 'him '}} @else {{ 'her '}} @endif hopping around the <strong>AussieFarm</strong> all day long.</p>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related Pets by Gender</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @forelse ($related as $pet)
           
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
                <p class="bg-danger text-white p-1" style="text-align:center;">No related pets found</p>
            @endforelse    
        </div>
    </div>
</section>

@endsection
