@extends('layouts.dash')
@section('content')
	<!-- general form elements disabled -->
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Create</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form role="form" action="{{route('p.store')}}" method="POST" enctype="multipart/form-data">
				<!-- text input -->
				@csrf
				<div class="form-group">
					<label>Product name</label>
					<input type="text" class="form-control" placeholder="Enter ..." name="name" required>
				</div>
				<div class="form-group">
					<label>Product title</label>
					<input type="text" class="form-control" placeholder="Enter ..." name="title" required>
				</div>
				<div class="form-group">
					<label>Product category</label>
					<select name="cat_id" class="form-control">
						@foreach($cats as $cat)
							<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="1">Publish</option>
						<option value="0">Unpublish</option>
					</select>
				</div>

				<div class="form-group">
					<label>Body</label>
					<textarea class="form-control" rows="3" id="editor" name="body" placeholder="Enter ..." required></textarea>
				</div>
				<br>
				<label>Image product</label>
				<div class="form-group">
					<img id="blah" alt="your image" class="pull-left" src="/vendor/admin/img/noimage.jpg" style="height:260px;width:260px;border-color: #0b97c4">
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