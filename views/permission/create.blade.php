@extends('RolesAndPermissions::app')

@section('header')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">Create Permission</div>

	                <div class="panel-body">
						
						<form class="form-horizontal" action="{{ url(config('RolesAndPermissions.route_group_name').'/permission') }}" method="POST">
                        	
                        	@include('RolesAndPermissions::permission.form')

                        </form>
	                
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@endsection

@section('footer')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        
        $('#permission_family_select').select2({
            tags: true,
            createTag: function (params) {
                return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                }
            }
        });

    </script>

@endsection