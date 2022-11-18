@extends('Dashboard.layouts.app')
@section('content')
<div class="table-responsive">
    <table class="table table-hover">

    <thead>
            <tr>
                <th>{{__('main.name')}}</th>
                <th>{{__('main.permissions')}}</th>
                <th>{{__('main.actions')}}</th>

            </tr>
        </thead>

        <tbody>
            @foreach($users as $index=>$user)
            @foreach($user->permissions as $index=>$permission)
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$permission->slug}}</td>
            <td>
                
                <a href="{{route('permission.delete',$user->id)}}"  class="btn btn-danger">{{ trans('main.delete') }}</a>
            </td>

            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>    
@endsection