@extends('AdminDashboard.Layout.adminBaseView')
@section('dashContent')
<form action="{{route('user.delete',['id'=>Request::segment(3)])}}" method="post">
    @csrf
    <div class="mb-3 w-50">
        <h6 class="form-label text-danger">Are you sure you want to delete this User?</h6>
        <p class="text-muted small">This action cannot be undone.</p>
    </div>
    <div class="mb-3 w-50">
        <a href="{{ route('user.all') }}" class="btn btn-secondary me-2">Cancel</a>
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
    </div>
</form>
@endsection