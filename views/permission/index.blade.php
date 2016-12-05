@extends('RolesAndPermissions::app')

@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Permission</div>

	                <div class="panel-body">
						
						<div class="pull-right">
                			<a href="{{ url(config('RolesAndPermissions.route_group_name').'/permission/create') }}" class="btn btn-xs btn-primary">
		                    	Add Permission
		                    </a>
		                </div>
						
						<div class="clearfix"></div>
						
							<table class="table table-striped">
		                        <thead>
		                            <tr>
		                                <th>Id</th>
		                                <th>Name</th>
		                                <th>Label</th>
		                                <th>Family</th>
		                                <th>In Roles</th>
		                                <th>Actions</th>
		                            </tr>
		                        </thead>
		                       
		                        <tbody>

		                            @foreach($permissions as $permission)

		                                <tr>
		                                    <td>{{ $permission->id }}</td>
		                                    <td>{{ $permission->name }}</td>
		                                    <td>{{ $permission->label }}</td>
		                                    <td>{{ $permission->family }}</td>
		                                    <td>{{ $permission->roles->count() }}</td>
		                                    <td>
			                                    @if( $permission->roles->count() == 0 )
			                                        <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/permission/{{ $permission->id }}/edit" class="btn btn-xs btn-info">Edit</a>
			                                        
			                                        <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/permission/{{ $permission->id }}" class="btn btn-xs btn-danger"
			                                            onclick="	event.preventDefault();
			                                            			console.log('Prevenido');
			                                                     	document.getElementById('delete-permission-{{ $permission->id }}-form').submit();">
			                                        	Delete
			                                        </a>

			                                        <form id="delete-permission-{{ $permission->id }}-form" action="{{ url(config('RolesAndPermissions.route_group_name')) }}/permission/{{ $permission->id }}" method="POST" style="display: none;">
			                                            {{ csrf_field() }}
			                                            <input type="hidden" name="_method" value="DELETE">
			                                        </form>
			                                    @else
			                                        <a href="{{ url(config('RolesAndPermissions.route_group_name')) }}/permission/{{ $permission->id }}/edit" class="btn btn-xs btn-info">Edit</a>
			                                    @endif
		                                    </td>
		                                </tr>

		                            @endforeach
		                           		
		                        </tbody>
		                    </table>

						
	                
	                </div>
	            </div>
				
				<div class="panel panel-default">
				    <div class="panel-heading">Permission Use Example</div>
				    	<div class="panel-body">
							
							<table class="table">
		                        <thead>
		                        	<tr>
			                            <th>Type</th>
			                            <th>Example</th>
		                            </tr>
		                        </thead>
		                       
		                        <tbody>

		                        	<tr>
		                        		<td>Blade Can</td>
		                        		<td>
		                        			{!! '@' !!}{!! 'can' !!}{!! "('permission_name')" !!}
										   	<br>
										   	<br>
										   		The Current User Can ...
										   	<br>
										   	<br>
										   	{!! '@' !!}{!! 'endcan' !!}
										</td>
		                        	</tr>

		                            <tr>
		                                <td>Blade CanNot</td>
		                                <td>
		                                	{!! '@' !!}{!! 'cannot' !!}{!! "('permission_name')" !!}
										   	<br>
										   	<br>
										   		The Current User Can't ...
										   	<br>
										   	<br>
										   	{!! '@' !!}{!! 'endcannot' !!}
		                                </td>
		                            </tr>
									
									<tr>
										<td>Gate Allows</td>
		                                <td>
		                                	if (Gate::allows('permission_name')) {
		                                	<br>
		                                	<br>
											    The current user can ...
											<br>
											<br>
											}
		                                </td>
									</tr>

									<tr>
										<td>Gate Denies</td>
		                                <td>
		                               		if (Gate::denies('permission_name')) {
		                               		<br>
		                               		<br>
											    The current user can't ...
											<br>
											<br>
											}	                                	
		                                </td>

		                            </tr>
	
		                        </tbody>
		                    </table>
						   	
						   	

				    	</div>
				</div>

	        </div>
	    </div>
	</div>

@endsection