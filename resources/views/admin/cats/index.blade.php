@extends('layouts.dash')
@section('content')

	<div class="row">
		@foreach($cats as $cat)
			<div class="col-md-4">
				<div class="box box-solid">
					<div class="box-body text-center">
						<h5>{{$cat->name_ru}}</h5>
					</div>
					<div class="box-body text-center">
						<img src="/{{ $cat->image }}" class="img-thumbnail" style="height: 300px; width: 100%;">
					</div>

					<a  href="{{route('c.edit',$cat->id)}}" class="fa fa-edit btn btn-info btn-sm " ></a>


					<span class="{{($cat->status == 1)? 'label label-success':'label label-danger'}}" style="margin-right: 3em"  >
                        {{($cat->status == 1)? 'Published':'Unpublished'}}
                    </span>
					<div class="pull-right">
						<form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('c.destroy',$cat->id)}}" method="post">
							@csrf
							@method('delete')
							<button type="submit"  class="fa fa-trash-o btn btn-info btn-sm"></button>
						</form>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		@endforeach
	</div>

	<button type="button" class="btn btn-default btn-info" data-toggle="modal" data-target="#modal-default">
		create category
	</button>


	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{route('c.store')}}" enctype="multipart/form-data">

					<div class="modal-header">

						<button type="button" class="close " data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Create category</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="box box-primary">
								<div class="box-body">
									<div class="form-group">
										<label for="exampleInputEmail1">Header </label>
										<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter header">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Body</label>
										<textarea class="form-control" rows="3" id="editor" name="body" placeholder="Enter ..." required></textarea>
									</div>
									@csrf
									<div class="form-group">
										<label for="exampleInputFile">Image </label>
										<input type="file" id="exampleInputFile" required name="image">
									</div>
									<div class="checkbox">
										<h5><b>Status</b></h5>
										<label class="switch" style="margin-right: 20px" >
											<input type="checkbox" id="status" value="1"  name="status">
											<span class="slider"></span>
										</label>
									</div>
								</div>
								<!-- /.box-body -->


							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>
						<button type="submit" class="btn btn-primary">Сохранить изменения</button>
					</div>
				</form>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
@endsection