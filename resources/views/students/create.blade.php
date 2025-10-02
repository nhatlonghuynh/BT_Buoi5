@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tạo sinh viên mới</h2>

    {{-- Hiển thị thông báo lỗi chung --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="age">Tuổi</label>
            <input type="number" class="form-control" name="age" value="{{ old('age') }}">
            @error('age')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender">Giới tính</label>
            <select class="form-control" name="gender">
                <option value="">-- Chọn --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gender')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
</div>
@endsection