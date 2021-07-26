@extends('layout.master')

@section('title', 'Subscribers')

@section('content')

  <div class="alert"></div>
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col">
          <h5>Subscribers</h5>
        </div>
        <div class="col">
          <div class="float-right">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Create New Subscriber</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="tblSubscribers" style="width:100%" class="table table-bordered hover">
        <thead>
          <tr>
            <th style="display:none">id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th>Subcription Date</th>
            <th>Subcription Time</th>
            <th width="150px">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>  
      </table>
    </div>
  </div>

  @include('modal/add')
  @include('modal/edit')
@stop

@push('head')
<!-- Scripts -->
<script src="{{ asset('js/subscribers/subscribers.js')}}"></script>
@endpush