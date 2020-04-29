@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        Employee Availability Check
    </div>

    <div class="links">
        <form method="POST" action="{{ route('checkAvailablity') }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">Select Day</label>

                <select name="day" class="form-control" required>
                    @foreach(\App\WeekDay::all() as $day)
                        <option value="{{ $day->id }}">{{ $day->day }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">Select Employee</label>

                <select name="emp_id" class="form-control" required>
                    @foreach(\App\Employee::all() as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach
                </select>                            
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">Enter Time Slot</label>

                <input class="form-control" type="number" name="slot" id="slot" min="1" max="5" required="" />
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </div>
        </form>
    </div>
@endsection
