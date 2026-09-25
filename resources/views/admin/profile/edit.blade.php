@extends('admin.layout')

@section('title', 'My Profile')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">Change Password</div>
      <div class="card-body">
        <p class="text-muted small">Logged in as <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})</p>
        <form method="post" action="{{ route('admin.profile.password') }}">
          @csrf
          @method('put')

          <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password" required>
            @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <div class="form-text">At least 8 characters.</div>
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
          </div>

          <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
