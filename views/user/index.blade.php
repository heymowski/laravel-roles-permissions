@extends('RolesAndPermissions::app')

@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Users & Roles</div>

	                <div class="panel-body">
						
						<table class="table table-striped">
								
								<thead>
		                            <tr>
		                                <th>User Name</th>
		                                <th>User Email</th>
		                                <th class="text-center">Roles</th>
		                                <th>Actions</th>
		                            </tr>
		                        </thead>
		                       
		                        <tbody>

		                            @foreach($users as $user)

		                                <tr>
		                                    <td>{{ $user->name }}</td>
		                                    <td>{{ $user->email }}</td>
		                                    <td class="text-center">{{ $user->rolesNames() }}</td>
		                                    <td>
			                                    <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/user/{{ $user->id }}/edit" class="btn btn-xs btn-info">Edit Roles</a>
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

@endsection