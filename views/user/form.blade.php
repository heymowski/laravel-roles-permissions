{{ csrf_field() }}

{{-- Roles --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        		<div class="col-md-12">
				    <div class="panel panel-primary panel-border top">
				        <div class="panel-heading">
				            <span class="panel-title">{{ $user->name }} - Roles :</span>
				        </div>
				        <div class="panel-body">
				            
				           @foreach( $roles as $role )

		        				<div class="checkbox-custom">
							    	<input name="roles[]" id="{{ $role->name }}" type="checkbox" value="{{ $role->id }}"
									
							    	@if($user->hasRole($role->name))

								    	checked="" 

								    @endif
									
							    	>
							    	<label for="{{ $role->name }}"">{{ $role->label }} <small>({{ $role->name }})</small> </label>
								</div>

		        			@endforeach
		        			
				        </div>
				    </div>
				</div>					        				

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



                                    
