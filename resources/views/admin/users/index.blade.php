@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                    <span>/</span>
                    <span>Registered Users</span>
                </h4>
            </div>

        </div>
        <!-- Heading -->

        <div class="row">
            {{-- filtering data --}}
            <div class="col-md-6">
                <form action="{{ url('registered-user') }}" method="GET">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="roles" class="form-control">
                                    @if (isset($_GET['roles']))
                                        <option value="{{ $_GET['roles'] }}">{{ $_GET['roles'] }}</option>
                                        <option value="all">All</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                    @else
                                        <option value="all">All</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary py-2">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- end filtering data --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    {{-- <th class="text-center">Online/Offline</th> --}}
                                    <th class="text-center">IsBan/UnBan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role_as }}</td>
                                        {{-- <td> --}}
                                            {{-- @if ( $item->isUserOnline() )
                                                <label class="py-2 px-3 badge btn-success">Online</label>
                                            @else
                                                <label class="py-2 px-3 badge btn-warning">Offline</label>
                                            @endif --}}
                                        {{-- </td> --}}
                                        <td>
                                            @if ($item->isban == '0')
                                                <label class="py-2 px-3 badge btn-primary">Not banned</label>
                                            @elseif($item->isban == '1')
                                                <label class="py-2 px-3 badge btn-danger">Banned</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('role-edit/' . $item->id) }}"
                                                class="badge badge-pill btn-primary px-3 py-2">Edit</a>
                                            <a href="" class="badge badge-pill btn-danger  px-3 py-2">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{-- {!! $users->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
