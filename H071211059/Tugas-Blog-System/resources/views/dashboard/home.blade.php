@extends('layouts.dashboard.master')

@section('page-title')
    Dashboard - {{ auth()->user()->name }}
@endsection

@section('module-title')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
@endsection
