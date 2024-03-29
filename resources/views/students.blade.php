<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <div class="card">
                    <div class="card-header">
                        <button type="button " class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/create') }}'" >
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Data
                        </button>
                    </div>
                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!!!</strong> {{ session('msg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Genre</th>
                                    <th>Adress</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $row)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $row->idstudents }}</td>
                                        <td>{{ $row->fullname }}</td>
                                        <td>{{ $row->gender == 'M' ? 'Male' : 'Female' }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->emailaddress }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>
                                            <button onclick="window.location='{{ url('students/edit/' . $row->idstudents) }}'" type="button"
                                                class="btn btn-sm btn-info" title="Edit Data">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                            <form onsubmit="return deleteData('{{ $row->fullname }}')" style="display: inline"
                                                method="POST" action="{{ url('students/' . $row->idstudents) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Data" class="btn btn-sm btn-info">
                                                    <i class="fa fa-trash"></i> 
                                                </button>
                                            </form>
                                             
                                                                                         
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
