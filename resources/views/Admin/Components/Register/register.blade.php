@if (session('success'))
    <div class="alert  z-3 " role="alert">
        <div class="setmolder alert-success">
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" data-toggle="modal" aria-labelledby="judulModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create') }}" method="POST" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name" id="name" name="name" value="">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" name="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="position-relative">
                        <label for="password" class="d-block">Password</label>
                        <div class="d-flex position-relative">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                            <span id="togglePassword" onclick="togglePassword('password', 'togglePassword')" class="position-absolute eyes far fa-eye-slash">
                            </span>
                        </div>
                     <div>
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="position-relative">
                        <label for="password2" class="d-block">Password confirm</label>
                        <div class="d-flex  position-relative">
                            <input id="password2" type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" tabindex="2" required>
                            <span id="togglePassword2" onclick="togglePassword('password2', 'togglePassword2')" class="position-absolute eyes far fa-eye-slash">
                            </span>
                        </div>
                        <div>
                            @error('password_confirm')
                                <div class="text-danger">
                                    {{ $message }}
                                    @foreach(['Password harus minimal', 'Password harus mengandung'] as $rule)
                                        @if(strpos($message, $rule) !== false)
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="role">Status</label>
                        <select id="role" name="role" class="form-control selectric">
                            <option value="manager">Manager</option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearFormFields()">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




{{-- edit  --}}
@foreach($users as $user)
    <div class="modal fade" id="edit-modal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit-user', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name-{{ $user->id }}">Name</label>
                            <input type="text" class="form-control" placeholder="name" id="name-{{ $user->id }}" name="name"
                                value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="username-{{ $user->id }}">Username</label>
                            <input id="username-{{ $user->id }}" type="text" class="form-control" placeholder="username"
                                name="username" value="{{ $user->username }}">
                        </div>

                        <div class="form-group">
                            <label for="email-{{ $user->id }}">email</label>
                            <input id="email-{{ $user->id }}" type="email" class="form-control" placeholder="email"
                                name="email" value="{{ $user->email }}">
                        </div>

                        <div class="position-relative">
                            <label for="password-{{ $user->id }}" class="d-block">Password</label>
                            <div class="d-flex position-relative">
                                <input id="password-{{ $user->id }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                                <span id="togglePassword-{{ $user->id }}" onclick="togglePassword('password-{{ $user->id }}', 'togglePassword-{{ $user->id }}')" class="position-absolute eyes far fa-eye-slash">
                                </span>
                            </div>
                        </div>

                        <div class="position-relative">
                            <label for="password2-{{ $user->id }}" class="d-block">Password confirm</label>
                            <div class="d-flex  position-relative">
                                <input id="password2-{{ $user->id }}" type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" tabindex="2" required>
                                <span id="togglePassword2-{{ $user->id }}" onclick="togglePassword('password2-{{ $user->id }}', 'togglePassword2-{{ $user->id }}')" class="position-absolute eyes far fa-eye-slash">
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role-{{ $user->id }}">Status</label>
                            <select id="role-{{ $user->id }}" name="role" class="form-control selectric">
                                <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager
                                </option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="karyawan" {{ $user->role == 'karyawan' ? 'selected' : '' }}>Karyawan
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@extends('layouts.app')
@section('title', 'Create New User')
@section('logoText', 'Admin Gudang')
@section('logoTextSub','AG')
@include('Admin.AdminDashboard._side')
@section('main')

@section('main')
    <div class="card">
        <div class="col-12 col-md-6 col-lg-12">
            <div>
                <div class="card-header justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                        Tambah Users
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="data-tables" class="table table-striped table-bordered" style="width:100%">
                            @csrf
                            <thead>
                                <th class="centerText">No</th>
                                <th class="centerText">User Name</th>
                                <th class="centerText">Role</th>
                                <th class="centerText">Aksi</th>
                            </thead>
                            @foreach ($users as $user)
                                @if ($user->role !== 'admin')
                                    <tr class="centerText">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td style="text-align:center">
                                            @csrf
                                            <button href="#" class="btn btn-warning" style="width:100px"
                                                data-toggle="modal" data-target="#edit-modal-{{ $user->id }}"><i
                                                    class="far fa-edit mr-3"></i>Edit</button>


                                            <button class="btn btn-danger " style="width:100px">
                                                <a href="{{ route('hapus-user', $user->id) }}"
                                                    class='text-white confirm-delete'> <i class="far fa-trash-alt mr-2"
                                                        id="delete"></i>Hapus</a>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
