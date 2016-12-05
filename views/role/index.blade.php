@extends('RolesAndPermissions::app')

@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Roles</div>

	                <div class="panel-body">
						
						<div class="pull-right">
                			<a href="{{ url(config('RolesAndPermissions.route_group_name').'/role/create') }}" class="btn btn-xs btn-primary">
		                    	Add Role
		                    </a>
		                </div>
						
						<div class="clearfix"></div>
						
						<table class="table table-striped">
								
								<thead>
		                            <tr>
		                                <th>Id</th>
		                                <th>Name</th>
		                                <th>Label</th>
		                                <th class="text-center">Permissions</th>
		                                <th>Actions</th>
		                            </tr>
		                        </thead>
		                       
		                        <tbody>

		                            @foreach($roles as $role)

		                                <tr>
		                                    <td>{{ $role->id }}</td>
		                                    <td>{{ $role->name }}</td>
		                                    <td>{{ $role->label }}</td>
		                                    <td class="text-center">{{ $role->permissions->count() }}</td>
		                                    <td>
			                                    @if($role->permissions->count() == 0)
			                                        <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/role/{{ $role->id }}/edit" class="btn btn-xs btn-info">Edit</a>
			                                        
			                                        <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/role/{{ $role->id }}" class="btn btn-xs btn-danger"
			                                            onclick="	event.preventDefault();
			                                            			console.log('Prevenido');
			                                                     	document.getElementById('delete-role-{{ $role->id }}-form').submit();">
			                                        	Delete
			                                        </a>

			                                        <form id="delete-role-{{ $role->id }}-form" action="{{ url(config('RolesAndPermissions.route_group_name')) }}/role/{{ $role->id }}" method="POST" style="display: none;">
			                                            {{ csrf_field() }}
			                                            <input type="hidden" name="_method" value="DELETE">
			                                        </form>

			                                    @else
			                                        <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/role/{{ $role->id }}/edit" class="btn btn-xs btn-info">Edit</a>
			                                    @endif
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