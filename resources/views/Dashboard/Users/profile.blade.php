@extends('Dashboard.layouts.app')
@section('content')
<form action="{{route('users.update', 'test')}}" method="post" enctype="multipart/form-data" class="icons-tab-steps wizard-circle">
    {{ csrf_field() }}
    {{ method_field('patch') }}
 
<img src="{{$user->image_path}}" style="width: 100px;
height: 45px;
margin: 10px;">
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
        <label for="fullName">{{__('main.name')}} :</label>
        <input type="text" name="name" class="form-control @error('name') is-invaild @enderror"  value="{{$user->name}}">
        <input type="hidden" name="id" value="{{$user->id}}">
        
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-message-circle"></i>{{__('main.step_2')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="emailAddress">{{__('main.email')}} :</label>
        <input type="email" name="email" class="form-control @error('email') is-invaild @enderror" value="{{$user->email}}">
        
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-airplay"></i>{{__('main.step_3')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="eventName">{{__('main.mobile')}} :</label>
        <input type="tel" name="mobile" class="form-control @error('mobile') is-invaild @enderror" value="{{$user->mobile}}">
        
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

<button type="submit"class="btn btn-success">{{ trans('main.update') }}</button>

</form>
@endsection