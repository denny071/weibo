@extends('layouts.default')
@section('content')

    <div class="offset-md-2 col-md-8">
            <h5>所有用户</h5>
        @foreach($users as $user)
            @include('users._user', ['user' => $user])
        @endforeach

        {{ $users->links() }}
    </div>
@stop
