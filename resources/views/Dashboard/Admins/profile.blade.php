@extends('Dashboard.layouts.app')
@section('content')
<form action="{{route('admins.update', 'test')}}" method="post" enctype="multipart/form-data" class="icons-tab-steps wizard-circle">
   @csrf
   {{ method_field('patch') }}
   
<img src="{{asset($admin->avatar)}}">
<fieldset>
    <div class="form-group">
        
        <input type="file" name="avatar" class="form-control @error('avatar') is-invaild @enderror">
        
        @error('avatar')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>
<h6><i class="step-icon ft-home"></i> {{__('main.step_1')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="fullName">Full Name :</label>
        <input type="text" name="name" class="form-control @error('name') is-invaild @enderror"  value="{{$admin->name}}">
        <input type="hidden" name="id" value="{{$admin->id}}">
        
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-message-circle"></i>{{__('main.step_2')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="emailAddress">Email Address :</label>
        <input type="email" name="email" class="form-control @error('email') is-invaild @enderror" value="{{$admin->email}}">
        
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-airplay"></i>{{__('main.step_3')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="eventName">Event Name :</label>
        <input type="tel" name="mobile" class="form-control @error('mobile') is-invaild @enderror" value="{{$admin->mobile}}">
        
        @error('mobile')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-layout"></i>{{__('main.step_4')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="meetingName">Name of Meeting :</label>
        <input type="password" name="password" class="form-control @error('password') is-invaild @enderror" >
        
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<button type="submit"class="btn btn-success">{{ trans('main.update') }}</button>

</form>
@endsection