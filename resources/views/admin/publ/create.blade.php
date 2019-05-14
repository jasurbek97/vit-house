@extends('layouts.dash')
@section('content')
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Create</h3>
		</div>
		<div class="box-body">
			<form role="form" action="{{route('pub.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter title ..." name="title" required>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-5">
							<input type="text" class="form-control" name="header1" placeholder="Криволинейная доска изготавливается" required>
						</div>
						<div class="col-xs-5">
							<input type="text" class="form-control" name="header2" placeholder="из различных экзотических пород" required>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-5">
							<input type="number" class="form-control" name="int1" placeholder="25" required>
						</div>
						<div class="col-xs-5">
							<input type="number" class="form-control" name="int2" placeholder="04" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="3" id="editor" name="body" required>Enter body...</textarea>
				</div>
				<br>
				<div class="form-group">
					<img id="blah" alt="your image" class="pull-left" src="/vendor/admin/img/noimage.jpg" style="height:260px;width:260px;border-color: #0b97c4">
					<br><br> <br><br> <br><br> <br><br> <br><br> <br>
					<input type="file" class="btn btn-info"    name="image"
					       onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Submit" name="" style="width: 100%;height: 35px">
				</div>

			</form>
		</div>
	</div>
@endsection