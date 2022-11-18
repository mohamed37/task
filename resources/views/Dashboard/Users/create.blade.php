@extends('Dashboard.layouts.app')
@section('content')


<form action="{{route('users.store')}}" method="post" autocomplete="off" enctype="multipart/form-data" class="icons-tab-steps wizard-circle">
   @csrf
<h6><i class="step-icon ft-home"></i> {{__('main.step_1')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="fullName">{{__('main.name')}} :</label>
        <input type="text" name="name" class="form-control @error('name') is-invaild @enderror" >
        
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-message-circle"></i>{{__('main.step_2')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="emailAddress">{{__('main.email')}} :</label>
        <input type="email" name="email" class="form-control @error('email') is-invaild @enderror" >
        
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-airplay"></i>{{__('main.step_3')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="eventName">{{__('main.mobile')}} :</label>
        <input type="tel" name="mobile" class="form-control @error('mobile') is-invaild @enderror" maxlength="11">
        
        @error('mobile')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-layout"></i>{{__('main.step_4')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="meetingName">{{__('main.password')}} :</label>
        <input type="password" name="password" class="form-control @error('password') is-invaild @enderror" >
        
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-layout"></i>{{__('main.step_5')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="meetingName">{{__('main.avatar')}} :</label>
        <input type="file" name="avatar" class="form-control @error('avatar') is-invaild @enderror" >
        
        @error('avatar')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<button type="submit"class="btn btn-success">{{ trans('main.submit') }}</button>

</form>
@endsection