@extends('Dashboard.layouts.app')
@section('content')


<form action="{{route('roles.update', 'test')}}" method="post" class="icons-tab-steps wizard-circle">
    {{ csrf_field() }}
   {{ method_field('patch') }}

   <h6><i class="step-icon ft-home"></i> {{__('main.step_1')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="fullName">{{__('main.role_name')}} :</label>
        <input type="text" name="name" class="form-control @error('name') is-invaild @enderror" value="{{$role->name}}">
        <input type="hidden" name="id"  value="{{$role->id}}">
        
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-message-circle"></i>{{__('main.step_2')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="emailAddress">{{__('main.role_slug')}} :</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invaild @enderror"  value="{{$role->slug}}">
        
        @error('slug')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<button type="submit"class="btn btn-success">{{ trans('main.update') }}</button>

</form>
@endsection