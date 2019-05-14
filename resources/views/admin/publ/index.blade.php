@extends('layouts.dash')

@section('content')

	<!-- TO DO List -->
	<div class="box box-primary">
		<div class="box-header">
			<i class="ion ion-clipboard"></i>

			<h3 class="box-title ">Create publication</h3>
			<div class="pull-right">{{$pubs->links()}}</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
			<ul class="todo-list">
				@foreach($pubs as $pub)
					<li>
						<!-- drag handle -->
						<span class="handle">
                       <img src="/{{$pub->image}}" style="max-width: 30px">
                      </span>

						<span class="text">{{$pub->title}}</span>
						<!-- Emphasis label -->
						<small class="label label-info"><i class="fa fa-clock-o btn btn-lg"></i>{{date('j.m.Y',strtotime($pub->updated_at))}}</small>
						<!-- General tools such as edit or delete-->
						<div class="tools">
							<div class="col-sm-3">
								<a href="{{route('pub.dup',$pub->id)}}"><i class="fa fa-copy btn btn-bitbucket btn-sm">duplicate</i></a>
							</div>
							<div class="col-sm-2">
							</div>
							<div class="col-sm-3">
								<a href="{{route('pub.edit',$pub->id)}}"><i class="fa fa-edit btn btn-info btn-sm"></i></a>
							</div>

							<div class="col-sm-3">
								<form class="delete" onsubmit="return confirm('Do you want to delete this ?')" action="{{route('pub.destroy',$pub->id)}}" method="post">
									@csrf
									@method('delete')
									<button type="submit"  class="fa fa-trash-o btn btn-info btn-sm"></button>
								</form>
							</div>
						</div>
					</li>
				@endforeach

			</ul>
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix no-border">
			<a href="{{route('pub.create')}}"><button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add product</button></a>
		</div>
	</div>
	<!-- /.box -->

@endsection
