@extends('Dashboard.layouts.app')
@section('content')


<form action="{{route('roles.store')}}" method="post" class="icons-tab-steps wizard-circle">
   @csrf
<h6><i class="step-icon ft-home"></i> {{__('main.step_1')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="fullName">{{__('main.role_name')}} :</label>
        <input type="text" name="name" class="form-control @error('name') is-invaild @enderror" >
        
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-message-circle"></i>{{__('main.step_2')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="emailAddress">{{__('main.role_slug')}} :</label>
        <input type="slug" name="slug" class="form-control @error('slug') is-invaild @enderror" >
        
        @error('slug')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<button type="submit"class="btn btn-success">{{ trans('main.submit') }}</button>
                    
</form>
@endsection