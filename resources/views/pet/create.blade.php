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
           
            <div class="col mb-5">
                <form id="form">
            
                    {{ csrf_field() }}
            
                    <label for="name">Name</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="">
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
                            <option value="male">Friendly</option>
                            <option value="female">Not Friendly</option>
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
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function(){

        $('[class*="error"]').css('color', 'red');
        
        $( function() {
            $( "#birthday" ).datepicker({
                changeYear: true
            });
        } );
 
        var action = '{{ route('pet.store') }}';

        var name = ['_token', 'name', 'nickname', 'weight', 'height', 'gender', 'color', 'friendliness', 'birthday'];
    
        $("#form :input").each(function(ndx){
            if(ndx >= name.length) return;
            this.setAttribute('name', name[ndx]);   
            this.setAttribute('id', name[ndx]);   
       
        });

        $('#form').validate({
            ignore: [],
            rules: {
                name: {
                    required: true,
                    remote: {
                        url:  window.location.origin + "/pet/validate",
                        type: "POST"
                    }
                },
                nickname: {
                    required: true,
                    minlength: 2
                },
                weight: {
                    required: true,
                    number: true
                },
                height: {
                    required: true,
                    number: true
                },
                gender: {
                    required: true,
                },
                color: {
                    minlength: 2
                },
                birthday: {
                    required: true,
                },
                
            },
            messages: {
                name: {
                    required: "Name is required",
                    remote: "Name is already taken",
                },
                nickname: {
                    minlength: "Nickname must be at least 2 characters",
                },

            },
            errorPlacement: function(error, element) {
                if (element.attr("id") == 'name') {
                    error.appendTo(".name_error");
                }
                if (element.attr("id") == 'nickname') {
                    error.appendTo(".nickname_error");
                }
                if (element.attr("id") == 'weight') {
                    error.appendTo(".weight_error");
                }
                if (element.attr("id") == 'height') {
                    error.appendTo(".height_error");
                }
                if (element.attr("id") == 'gender') {
                    error.appendTo(".gender_error");
                }
                if (element.attr("id") == 'color') {
                    error.appendTo(".color_error");
                }
                if (element.attr("id") == 'friendliness') {
                    error.appendTo(".friendliness_error");
                }
                if (element.attr("id") == 'birthday') {
                    error.appendTo(".birthday_error");
                }
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                $("#form :input").each(function(ndx){
                    if(ndx >= name.length) return;
                    this.setAttribute('name', name[ndx]);   
                    this.setAttribute('id', name[ndx]);   
        
                });

                console.log($("#form").serialize());

                $.ajax({
                    type: 'POST',
                    url: action,
                    data: $("#form").serialize(), 
                    success: function(response) { 

                       window.location.replace(response);
                    },
                });
            }
        });

    });
</script>

@endsection