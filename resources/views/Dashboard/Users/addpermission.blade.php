@extends('Dashboard.layouts.app')
@section('content')


<form action="{{route('add_per_user.store')}}" method="post" autocomplete="off"  class="icons-tab-steps wizard-circle">
   @csrf
<h6><i class="step-icon ft-home"></i> {{__('main.step_1')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="fullName">{{__('main.name')}} :</label>

        <select name="user_id" class="form-control @error('user_id') is-invaild @enderror" >
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
        @error('user_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>

<h6><i class="step-icon ft-message-circle"></i>{{__('main.step_2')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="emailAddress">{{__('main.permissions')}} :</label>
        @foreach($permissions as $permission)
        <input type="checkbox" class="form-control @error('permission_id') is-invaild @enderror" name="permissions[]"  value="{{$permission->id}}">{{$permission->slug}}
        @endforeach
        
        @error('permission_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>


<button type="submit"class="btn btn-success">{{ trans('main.submit') }}</button>

</form>
@endsection