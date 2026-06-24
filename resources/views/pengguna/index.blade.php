@extends('layouts.admin')

@section('title', 'Data Pengguna')

@section('content')
<style>
    thead { background-color: blue; color: aliceblue; }
</style>

<div class="page-header">
    <h3 class="font-weight-bold">Data Pengguna</h3><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Admin/user</button>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengguna.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Sebagai</label>
                            <div class="form-inline">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" value="admin">
                                        <label class="custom-label text-black">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" value="user">
                                        <label class="custom-label text-black">user</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Sebagai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            @foreach($pengguna as $index => $row)
                            <tr>
                                <td style="text-align: center;">{{ $index + 1 }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->password_plain ?? '********' }}</td>
                                <td>{{ $row->level }}</td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-warning" style="padding: 10px 20px; font-size: 20px;" data-toggle="modal" data-target="#editModal{{ $row->id }}"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <a title="hapus" class="btn btn-danger" style="padding: 10px 20px; font-size: 20px;" href="{{ route('pengguna.destroy', $row->id) }}" onclick="event.preventDefault(); if(confirm('Anda yakin akan menghapus data ini?')) document.getElementById('hapus-form-{{ $row->id }}').submit();"><i class="fa-solid fa-trash-can"></i></a>
                                    <form id="hapus-form-{{ $row->id }}" action="{{ route('pengguna.destroy', $row->id) }}" method="post" style="display: none;">@csrf @method('DELETE')</form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $row->id }}">Edit Pengguna</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pengguna.update', $row->id) }}" method="post">
                                                @csrf @method('PUT')
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="{{ $row->nama }}" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" value="{{ $row->username }}" required>
                                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak diubah">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Sebagai</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="level" value="admin" {{ $row->level == 'admin' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Admin</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="level" value="user" {{ $row->level == 'user' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">user</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
@endsection
