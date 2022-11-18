
@extends('Dashboard.layouts.app')

@section('content')
@guest
  visitor
@else
  @if(auth('admin')->check())
   <p> {{__('messages.admin')}}</p>
  @else
  <p> {{__('messages.user')}}</p>  
  @endif
@endguest
@endsection