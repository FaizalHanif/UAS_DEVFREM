@extends('layouts.app')

@section('content')
    <h1>Daftar Pengguna</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">Lihat</a>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection