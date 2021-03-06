@extends('admin.layouts.app')

@section('css')
	<style type="text/css">
		
	</style>
@endsection

@section('content')
	<div class="box box-primary">
    <div class="box-header with-border">
    	<div class="row">
    		
    		<div class="col-sm-6 col-md-7">
	      	<h3 class="box-title mb-4">{{ Auth::user()->subModule() }}</h3>
    		</div>
    		{{-- /.col --}}

    		<div class="col-sm-6 col-md-5">
		      <div class="box-tools pull-right">

						<!-- Action Dropdown -->
						@component('admin.components.action')
							@slot('btnCreate')
								{{route('admin.main_menu.create')}}
							@endslot
						@endcomponent

		        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		      </div>
    		</div>
    		{{-- /.col --}}
    	
    	</div>
			{{-- /.row --}}

			<!-- Error Message -->
			@component('admin.components.errorSMS')
			@endcomponent
    </div>
    <!-- /.box-header -->


    <div class="box-body">
      <table id="dataTable{{ ((!session('locale'))? '': ((session('locale')=='kh')? '-kh':'' )) }}" class="table table-bordered table-hover">
        <thead>
	        <tr>
	          <th width="5%">N&deg;</th>
	          <th>Name</th>
	          <th>index</th>
	          <th>URL</th>
	          <th>Status</th>
	          <th>Sub Menu</th>
	          <th width="10%">Action</th>
	        </tr>
        </thead>
        <tbody>
        	@foreach($main_menus as $i => $main_menu)
						<tr>
							<td class="text-center">{{ ++$i }}</td>
							<td>{{ $main_menu->name_en .' : '. $main_menu->name_kh .' : '. $main_menu->name_my .' : '. $main_menu->name_sa }}</td>
							<td>{{ $main_menu->index}}</td>
							<td>{{ $main_menu->url}}</td>
							<td class="text-center">{!! $main_menu->StatusIcon($main_menu->status) !!}</td>
							<td class="text-center"><span class="label label-primary">{{ $main_menu->SubMenu->count()}}</span></td>
							<td class="td-action text-right">
								{{-- Edit Button --}}
								<a href="{{ route('admin.main_menu.edit',$main_menu->id) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
								{{-- Delete Button --}}
								<button class="btn btn-danger BtnDelete" value="{{ $main_menu->id }}"><i class="fa fa-trash-alt"></i></button>
								{{ Form::open(['url'=>route('admin.main_menu.destroy', $main_menu->id), 'id' => 'form-item-'.$main_menu->id, 'class' => 'sr-only']) }}
								{{ Form::hidden('_method','DELETE') }}
								{{ Form::close() }}

							</td>
						</tr>
        	@endforeach
        </tbody>
      </table>
    </div>
    <!-- ./box-body -->
  </div>
	<!-- /.box -->
	
	
@endsection

@section('js')
	<script type="text/javascript">


	</script>
@endsection
