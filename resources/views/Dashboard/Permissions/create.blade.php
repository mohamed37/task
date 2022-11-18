@extends('Dashboard.layouts.app')
@section('content')


<form action="{{route('permissions.store')}}" method="post" class="icons-tab-steps wizard-circle">
   @csrf
   <h6><i class="step-icon ft-home"></i> {{__('main.step_1')}}</h6>
<fieldset>
    <div class="form-group">
        <label for="fullName">{{__('main.permission_name')}} :</label>
        <input type="text" name="name" class="form-control @error('name') is-invaild @enderror" >
        
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror 

    </div>
</fieldset>


<button type="submit"class="btn btn-success">{{ trans('main.submit') }}</button>

</form>
@endsection