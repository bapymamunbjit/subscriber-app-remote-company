@extends('layout.master')
   
@section('content')
  <div class="row mb-5">
    <div class="col-6">
      <h2>Eidt Key</h2>
    </div>
    <div class="col-6">
      <div class="float-right">
        <a class="btn btn-primary" href="{{ route('key.index') }}"> Back</a>
      </div>
    </div>
  </div>
   
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('key.update',$key->id) }}" method="POST">
      @csrf
      @method('PUT')
  
        <div class="row">
          <div class="col-12">
              <div class="form-group">
                  <input type="text" name="key" value="{{ $key->key }}" class="form-control" placeholder="Key" />
              </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </div>
  
  </form>

@endsection