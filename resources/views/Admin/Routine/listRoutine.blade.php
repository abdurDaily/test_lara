@extends('layouts.app')
@section('general-report')
  
<div class="container mt-5">
  <div class="row">
    <div class="col-8 mx-auto">
        <table class="table table-responsive hover table-striped">
            <tr align="center">
                <th>Sn</th>
                <th>Download PDF</th>
                <th>Action</th>
            </tr>


            @forelse ($allRecord as $key=>$data)
             
            <tr align="center">
                <td>{{ ++$key }}</td>
                <td>
                    <a href="{{ $data->routine_image }}">{{ date('d-M-Y', strtotime($data->created_at)) }} PDF</a>
                </td>
                <td>
                    <a href="{{ route('routine.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
                
            @empty
                
            @endforelse

        </table>
    </div>

  </div>
</div>
@endsection