@extends('RolesAndPermissions::app')

@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Edit Role</div>

	                <div class="panel-body">
						
						<form class="form-horizontal" action="{{ url(config('RolesAndPermissions.route_group_name').'/role/'.$role->id) }}" method="POST">

                            <input type="hidden" name="_method" value="PUT">
                                    
                            @include('RolesAndPermissions::role.form')

                        </form>
	                
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@endsection