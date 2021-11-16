<div class="col mb-5">
    <form id="form">

        {{ csrf_field() }}

        <label for="name">Name</label>
        <div class="mb-3">
            <input type="text" class="form-control" value="{{ $pet->name ?? '' }}">
            <span class="name_error"></span>
        </div>
        
        <label for="name">Nickname</label>
        <div class="mb-3">
            <input type="text" class="form-control" value="{{ $pet->nickname ?? '' }}">
            <span class="nickname_error"></span>
        </div>

        <label for="quantity">Weight</label>
        <div class="mb-3">
            <input type="text" class="form-control" value="{{ $pet->weight ?? '' }}">
            <span class="weight_error"></span>
        </div>
    

        <label for="quantity">Height</label>
        <div class="mb-3">
            <input type="text" class="form-control" value="{{ $pet->height ?? '' }}">
            <span class="height_error"></span>
        </div>
              
        <label for="quantity">Gender</label>
        <div class="mb-3">
            <select  class="form-control" value="">
                <option value="">Select</option>
                <option value="male" @if(isset($pet->gender) && $pet->gender == 'Male') {{ 'selected' }}  @endif >Male</option>
                <option value="female" @if(isset($pet->gender) == 'Female') {{ 'selected' }}  @endif >Female</option>
            </select>
            <span class="gender_error"></span>
        </div>
        

        <label for="quantity">Color</label>
        <div class="mb-3">
            <input type="text" class="form-control" value="{{ $pet->color ?? '' }}">
            <span class="color_error"></span>
        </div>

        <label for="quantity">Friendliness</label>
        <div class="mb-3">
            <select  class="form-control" value="">
                <option value="">Select</option>
                <option value="friendly" @if(isset($pet->friendliness) && $pet->friendliness == 'Friendly') {{ 'selected' }}  @endif >Friendly</option>
                <option value="not friendly" @if(isset($pet->friendliness) && $pet->friendliness == 'Not Friendly') {{ 'selected' }} @endif >Not Friendly</option>
            </select>
            <span class="friendliness_error"></span>
        </div>

        <label for="quantity">Birthday</label>
        <div class="mb-3">
            <input type="text" id="datepicker" class="form-control" value="{{ $pet->birthday ?? '' }}">
            <span class="birthday_error"></span>
        </div>

        <button type="submit" class="btn btn-primary">Submit</a>

    </form>
</div>