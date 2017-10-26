@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">

    <div class="breadcrumb">Origin Message: {{ $message->name }}</div>

    <form method="POST" action="{{ url('messages/'.$message->id) }}">
        {{ csrf_field() }}
          {{ method_field('PATCH') }}
        <div class="form-group">
            <textarea name="body" class="form-control">{{ $message->name }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Comment</button>
        </div>
    </form>

</div>
</div>
</div>
@endsection