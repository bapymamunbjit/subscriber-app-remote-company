@extends('layout.master')
 
@section('content')
  <div class="row mb-2">
      <div class="col-6">
          <h2>Key List</h2>
      </div>
      <div class="col-6">
          <div class="float-right">
              <a class="btn btn-success" href="{{ route('key.create') }}"> Create New Key</a>
          </div>
      </div>
  </div>
  
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Key</th>
        <th width="280px">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($keys as $k=>$key)
      
      <tr>
        <td>{{ $k+1 }}</td>
        <td>{{ $key->key }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('key.edit',$key->id) }}">Edit</a>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>
      
@endsection