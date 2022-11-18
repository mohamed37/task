@extends('Dashboard.layouts.app')
@section('content')
<div class="table-responsive">
    <table class="table table-hover">

        <thead>
            <tr>
                <th>{{__('main.name')}}</th>
                <th>{{__('main.email')}}</th>
                <th>{{__('main.mobile')}}</th>
                <th>{{__('main.avatar')}}</th>
                <th>{{__('main.actions')}}</th>

            </tr>
        </thead>

        <tbody>
            @foreach($admins as $index=>$admin)
            <tr>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->mobile}}</td>
            <td><img src="{{$admin->image_path}}" style="width: 100px;
                height: 45px;
                margin: 10px;"></td>
            <td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('admins.edit',encrypt($admin->id)) }}"
                    title="{{ trans('main.edit') }}">{{ trans('main.edit') }}<i class="fa fa-edit"></i></a>

                <a class="btn btn-info btn-sm" href="{{route('admins.show',encrypt($admin->id)) }}"
                    title="{{ trans('main.show') }}">{{ trans('main.show') }}<i class="fa fa-eye"></i></a>

                    <form action="{{route('admins.destroy','test')}}" method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
    
                            <input type="hidden" name="id" value="{{$admin->id}}">
                            <button type="submit"class="btn btn-danger">{{ trans('main.delete') }}</button>
                        
                    </form>
            </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection