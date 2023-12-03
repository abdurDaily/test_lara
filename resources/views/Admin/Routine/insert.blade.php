@extends('layouts.app')
@section('general-report')
  
<div class="container mt-5">
  <div class="row">
    <div class="col-6 mx-auto">
      <form action="{{ route('routine.insert.post') }}" method="post" enctype="multipart/form-data">
        @csrf
          <label for="inser-routine">Insert a new routine</label>
          <input type="file" class="form-control my-4" name="routine">
              @error('routine')
                <span style="color: red;">{{ $message }}</span>
              @enderror
          <button class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection