@extends('layouts.dash')
@section('content')
	<!-- general form elements disabled -->
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Update</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form role="form" action="{{route('p.update',$product->id)}}" method="POST" enctype="multipart/form-data">
				<!-- text input -->
				@csrf
				@method('PUT')
				<div class="form-group">
					<label>Product name</label>
					<input type="text" class="form-control" value="{{$product->name}}" placeholder="Enter ..." name="name">
				</div>
				<div class="form-group">
					<label>Product title</label>
					<input type="text" class="form-control" value="{{$product->title}}" placeholder="Enter ..." name="title">
				</div>

				<div class="form-group">
					<label>Category</label>
					<select name="cat_id" class="form-control">
						@foreach($cats as $cat)
							<option value="{{$cat->id}}" {{($cat->id == $product->category_id)? 'selected':''}} >{{($cat->id == $product->category_id)? $cat->name :$cat->name}}</option>
						@endforeach
					</select>
				</div>
{{--				<div class="form-group">--}}
{{--					<label>Язык продукта</label>--}}
{{--					@if($product->locale == 'ru')--}}
{{--						<select name="locale" class="form-control">--}}
{{--							<option value="uz">Узбекский</option>--}}
{{--							<option value="ru" selected>Русский</option>--}}
{{--						</select>--}}
{{--					@else--}}
{{--						<select name="locale" class="form-control">--}}
{{--							<option value="uz" selected>Узбекский</option>--}}
{{--							<option value="ru" >Русский</option>--}}
{{--						</select>--}}
{{--					@endif--}}
{{--				</div>--}}
				<div class="form-group">
					<label>Status</label>
					@if($product->status == 1)
						<select name="status" class="form-control">
							<option value="1" selected>Publish</option>
							<option value="0">Unpublish</option>
						</select>
					@else
						<select name="status" class="form-control">
							<option value="1" >Publish</option>
							<option value="0"selected>Unpublish</option>
						</select>
					@endif

				</div>
				<!-- textarea -->
				<div class="form-group">
					<label>Body</label>
					<textarea class="form-control" rows="3" id="editor" name="body" placeholder="Enter ...">{!! $product->body !!}</textarea>
				</div>
				<br>
				<!-- select -->
				<label>Image product</label>
				<div class="form-group">
					<img id="blah" alt="your image" class="pull-left" src="/{{$product->image}}" style="height:260px;width:260px;border-color: #0b97c4">
					<br><br> <br><br> <br><br> <br><br> <br><br> <br>
					<input type="file" class="btn btn-info"    name="image"
					       onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Submit" name="" style="width: 100%;height: 35px">
				</div>

			</form>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
@endsection