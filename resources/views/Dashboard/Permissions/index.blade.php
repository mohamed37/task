@extends('Dashboard.layouts.app')
@section('content')
<div class="table-responsive">
    <table class="table table-hover">

    <thead>
            <tr>
                <th>{{__('main.name')}}</th>
                <th>{{__('main.permission_slug')}}</th>
                <th>{{__('main.actions')}}</th>

            </tr>
        </thead>

        <tbody>
            @foreach($permissions as $index=>$permission)
            <tr>
            <td>{{$permission->name}}</td>
            <td>{{$permission->slug}}</td>
            <td>
               {{--  <a class="btn btn-info btn-sm" href="{{route('permissions.edit',encrypt($permission->id)) }}"
                    title="{{ trans('main.edit') }}">{{ trans('main.edit') }}<i class="fa fa-edit"></i></a>

                --}}
                    <form action="{{route('permissions.destroy','test')}}" method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
    
                            <input type="hidden" name="id" value="{{$permission->id}}">
                            <button type="submit"class="btn btn-danger">{{ trans('main.delete') }}</button>
                        
                    </form>
            </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection