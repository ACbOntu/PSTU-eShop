@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Doctors</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.doctor.index') }}">Doctor</a></li>
          <li class="breadcrumb-item active">Edit Doctor</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('backend.partials.message')

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Details Of Doctor</span>
      </div>

      <div class="card-body">
        <form class="" action="{{ route('admin.doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $doctor->first_name }}" placeholder="First Name" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $doctor->last_name }}" placeholder="Last Name">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" id="phone" value="{{ $doctor->phone }}" placeholder="Phone number of the staff" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ $doctor->email }}" placeholder="Email of the staff">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="department_id">Department</label>
              <select class="form-control" name="department_id" id="department_id" required>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}" {{ ($department->id == $doctor->department_id) ? 'selected' : '' }}>{{ $department->department_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="branch_id">Branch</label>
              <select class="form-control" name="branch_id" id="branch_id" required>
                @foreach ($branches as $branch)
                  <option value="{{ $branch->id }}" {{ ($branch->id == $doctor->branch_id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $doctor->address }}" id="address" placeholder="Home address">
            </div>
            <div class="col-md-6 form-group">
              <label for="chember">Chember</label>
              <input type="text" class="form-control" name="chember" id="chember" value="{{ $doctor->chamber }}" placeholder="eg. (floor,room number)">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="image">Image @if($doctor->image) <a href="{{ asset('public/images/doctors/'.$doctor->image) }}" target="_blank" class="">Existing Image</a> @endif</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="col-md-6 form-group">
              <label for="status">Existing Doctor</label>
              <input type="checkbox" class="form-control" name="status" id="status" value="1" {{ ($doctor->status == 1) ? 'checked' : '' }}>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="qualification">Qualification / Education / Degree</label>
              <textarea name="qualification" id="qualification" class="form-control" rows="8" cols="80" required>
                {{ $doctor->qualification }}
              </textarea>
            </div>
            <div class="col-md-6 form-group">
              <label for="time_schedule">Time Schedule </label>
              <textarea name="time_schedule" id="time_schedule" class="form-control" rows="8" cols="80" required>
                {{ $doctor->time_schedule }}
              </textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-success" name="button">Save Doctor</button>
        </form>
      </div><!-- end card-->
    </div>
  </div>

  @endsection
