
@extends('admin.layout.base')
@section('title', 'Dashboard')
@section('data-page-id', 'adminDashboard')

@section('content')
    <div class="dashbaord">
        <div class="row expanded">
            <h2>Dashboard</h2>
            {{ \App\Classes\CSRFToken::_token() }}
            <br>
            {{ \App\Classes\Session::get('token') }}
        </div>
    </div>
@endsection