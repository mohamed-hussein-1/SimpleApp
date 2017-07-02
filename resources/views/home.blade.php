@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in {{$user->name}}!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
<h3>Users of same Role</h3>
  <table class="table">
      <thead>
        <tr>

          <th>User Name</th>
          <th>User Email</th>

        </tr>
      </thead>
      <tbody>

        @foreach ($users as $us)
            <tr>
                <th>{{$us->name}}</th>
                <th>{{$us->email}}</th>
            </tr> 
        @endforeach
    
      </tbody>
  </table>
</div>
@endsection
