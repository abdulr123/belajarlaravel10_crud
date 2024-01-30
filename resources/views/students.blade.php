<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <div class="p-2 text-gray-900">
                    <h4>Students Data</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Students</th>
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
                                            <i class="fa fa-pencil-square-o"  aria-hidden="true" > | 
                                            <i class="fa fa-trash" aria-hidden="true"></i>                                              
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
