<div class="form-group text-right">
	<button type="submit" class="btn btn-primary">{{ $text }}</button>
	@if ($text === 'Update' && isset($modelName) && isset($model))
		<a href="{{ route($modelName .'.destroy', $model) }}" class="btn btn-outline-danger">Delete</a>
	@endif
</div>