@extends('layouts.dash')
@section('content')
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Update</h3>
		</div>
		<div class="box-body">
			<form role="form" action="{{route('pub.update',$pub->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<input type="text" class="form-control" value="{{$pub->title}}" placeholder="Enter title ..." name="title" >
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-5">
							<input type="text" class="form-control" value="{{$pub->header1}}" name="header1" placeholder="Криволинейная доска изготавливается" >
						</div>
						<div class="col-xs-5">
							<input type="text" class="form-control" value="{{$pub->header2}}" name="header2" placeholder="из различных экзотических пород" >
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-5">
							<input type="text" class="form-control" value="{{$pub->int1}}" name="int1" placeholder="25" >
						</div>
						<div class="col-xs-5">
							<input type="text" class="form-control" value="{{$pub->int2}}" name="int2" placeholder="04" >
						</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="3" id="editor" name="body" required>{{$pub->body}}</textarea>
				</div>
				<br>
				<div class="form-group">
					<img id="blah" alt="your image" class="pull-left" src="/{{$pub->image}}" style="height:260px;width:260px;border-color: #0b97c4">
					<br><br> <br><br> <br><br> <br><br> <br><br> <br>
					<input type="file" class="btn btn-info"    name="image"
					       onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Submit" name="" style="width: 100%;height: 35px">
				</div>

			</form>
		</div>
	</div>
@endsection