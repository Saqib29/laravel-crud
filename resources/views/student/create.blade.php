@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Create Student') }}</h5>
                    <a href="{{ route('student.index') }}" class="btn btn-light">Students</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6 offset-3">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            <form action="{{ route('student.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for=""><b>Student Name</b></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Email</b></label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-secondary">Create</button>
                                </div>
                            </form>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
