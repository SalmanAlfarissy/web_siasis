@extends('layouts.login.login')
@section('content')

@if (session()->has('LoginError'))
<div class="alert bg-pink alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    {{ session('LoginError') }}
</div>
@endif

<div class="card">
    <div class="body">
        <form id="sign_in" method="POST" action="{{ route('staf.aut') }}">
            @csrf
            <div class="logo">
                <a href="javascript:void(0);"><img src="{{ asset('images/logo.png') }}" alt="IMG" height="20%" width="30%"></a>
                <small style="color: maroon"><h4>Sistem Akademik Siswa</h4></small>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">person</i>
                </span>
                <div class="form-line @error('nip') focused error @enderror">
                    <input type="text" class="form-control" name="nip" placeholder="NIP" required autofocus value="{{ old('nip') }}">
                </div>
                @error('nip')
                    <label class="error">{{ $message }}</label>
                @enderror
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line @error('password') focused error @enderror">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                @error('password')
                    <label class="error">{{ $message }}</label>
                @enderror
            </div>
            <div class="row">
                {{-- <div class="col-xs-8 p-t-5">
                    <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                    <label for="rememberme">Remember Me</label>
                </div> --}}
                <div class="col-xs-12">
                    <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                    <label for="rememberme">Remember Me</label>
                    <button class="btn btn-block bg-pink waves-effect" type="submit">Login</button>
                </div>
            </div>
            <div class="row m-t-15 m-b--20">
                {{-- <div class="col-xs-6">
                    <a href="sign-up.html">Register Now!</a>
                </div> --}}
                <div class="col-xs-12 align-center">
                    <a href="#">Forgot Password?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

