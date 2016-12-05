{{ csrf_field() }}


{{-- Name --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	<input type="text" id="permission_name" name="name" class="form-control" placeholder="Insert Permission Name ..."
			
			@if(old('name'))

				value="{{ old('name') }}"

			@elseif(isset($permission))

				value="{{ $permission->name }}"

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
        	
        	<input type="text" id="permission_label" name="label" class="form-control" placeholder="Insert Permission Label ..."
			
			@if(old('label'))

				value="{{ old('label') }}"

			@elseif(isset($permission))

				value="{{ $permission->label }}"

			@endif
			>
			@if ($errors->has('label'))
              <em for="label" class="state-error">{{ $errors->first('label') }}</em>
            @endif

    	</div>
	</div>
</div>

{{-- Family Select--}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	<select id="permission_family_select" class="form-control" name="family">
			    
			    @foreach($families as $family)

			    	<option 

			    		@if(isset($permission))

			    			@if($permission->family === $family)
							
								selected="true"

							@endif

						@endif

			    	>{{ $family }}</option>
			    
			    @endforeach

			</select>

    	</div>
	</div>
</div>

{{-- Submit Button --}}

<div class="form-group">

	<div class="col-lg-12">
		<div class="bs-component">
        	
        	<button type="submit" class="btn ladda-button btn-primary" data-style="expand-down">
    			<span class="ladda-label">

    			@if(!isset($permission))

					Create
				
				@else

					Edit
				
				@endif
    			

    			</span>
			<span class="ladda-spinner"></span></button>
        	

    	</div>
	</div>
</div>



                                    
