{{ csrf_field() }}


{{-- Name --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	<input type="text" id="role_name" name="name" class="form-control" placeholder="Insert Role Name ..."
			
			@if(old('name'))

				value="{{ old('name') }}"

			@elseif(isset($role))

				value="{{ $role->name }}"

			@endif
			>
			@if ($errors->has('name'))
              <em for="name" class="state-error">{{ $errors->first('name') }}</em>
            @endif

    	</div>
	</div>
</div>


{{-- Label --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	<input type="text" id="role_label" name="label" class="form-control" placeholder="Insert Role Label ..."
			
			@if(old('label'))

				value="{{ old('label') }}"

			@elseif(isset($role))

				value="{{ $role->label }}"

			@endif
			>
			@if ($errors->has('label'))
              <em for="label" class="state-error">{{ $errors->first('label') }}</em>
            @endif

    	</div>
	</div>
</div>

{{-- Permissions --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	@foreach( $permissions as $family => $permissions )

        		<div class="col-md-6">
				    <div class="panel panel-primary panel-border top">
				        <div class="panel-heading">
				            <span class="panel-title"> {{ $family }} Permissions:</span>
				        </div>
				        <div class="panel-body">
				            
				            @foreach($permissions as $permission)

		        				<div class="checkbox-custom mb5">
							    	<input name="permissions[]" id="{{ $permission['id'] }}" type="checkbox" value="{{ $permission['id'] }}"

							    	@if(isset($role))
								    	
								    	@if($role->checkIfRoleHasPermission($permission['id']))

								    		checked="" 

								    	@endif

								    @endif

							    	>
							    	<label for="{{ $permission['id'] }}"">{{ $permission['label'] }}</label>
								</div>

		        			@endforeach
		        			
				        </div>
				    </div>
				</div>					

        	@endforeach
        				

    	</div>
	</div>
</div>


{{-- Submit Button --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	<button type="submit" class="btn ladda-button btn-primary" data-style="expand-down">
    			<span class="ladda-label">

    			@if(!isset($role))

					Create
				
				@else

					Edit
				
				@endif
    			

    			</span>
			<span class="ladda-spinner"></span></button>
        	

    	</div>
	</div>
</div>



                                    
