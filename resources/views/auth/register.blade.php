@extends('layouts.AuthLayout')

@section('title', 'Register')

@section('content')
    <div class="auth-form">
        <div class="card my-5">
            <div class="card-body">
                <div class="text-center">
                     <h4>KANTOR WILAYAH</h4> <h4>KEMENKUMHAM</h4>
                    <img src="{{ URL::asset('image/kemenkumham.png') }}" alt="images"  class="img-fluid w-25 mb-3">
                    <h4 class="f-w-500 mb-1">Registrasi Pengguna Baru</h4>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama Pengguna">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email Pengguna">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password" placeholder="Masukkan Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Konfirmasi Password">
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
@endsection
