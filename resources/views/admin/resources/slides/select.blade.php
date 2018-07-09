@extends('admin.resources.template')

@section('title')
	Choose all slides
@endsection

@section('form')
	{{ Form::open(['action' => 'SlidesController@updateAll', 'method' => 'post']) }}
@stop

@section('controls')
	<button type="submit" class="m-1 btn btn-success">Select</button>
	<button type="reset" class="m-1 btn btn-secondary">Reset</button>
@stop

@section('affichage')
<div class="row" data-toggle="buttons">
	@foreach ($photos as $photo)
		<div class="col-6 col-md-4 col-lg-3 px-1">
			<label class="btn btn-select w-100 {{ in_array($photo->id, $slides) ? 'active' : '' }}">
				<div class="card shadow">
					<div class="card-img-top" style="background-image: url('{{ asset($photo->path) }}'); height: 200px; 
						background-size: cover; background-position: center;"></div>
					<div class="card-block">
						<h4 class="card-title form-check-label">
							<input type="checkbox" class="checkbox-card form-check-input card-check" name="photo-{{ $photo->id }}" id="photo-{{ $photo->id }}"
								value="{{ $photo->id }}" {{ in_array($photo->id, $slides) ? 'checked' : '' }}>
							{{ $photo->caption }}
						</h4>
					</div>
				</div>
			</label>
		</div>
	@endforeach
</div>
{{ Form::close() }}
@endsection