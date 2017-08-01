@extends('admin.master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>Configs
					</div>
					<div class="tools">
						<div class="dt-buttons">
						<a class="dt-button buttons-print btn default" tabindex="0" aria-controls="sample_2" href="#"><span>Add config</span></a>
						<a class="dt-button buttons-pdf buttons-html5 btn default" tabindex="0" aria-controls="sample_2" href="#"><span>PDF</span></a><a class="dt-button buttons-excel buttons-html5 btn default" tabindex="0" aria-controls="sample_2" href="#"><span>Excel</span></a><a class="dt-button buttons-csv buttons-html5 btn default" tabindex="0" aria-controls="sample_2" href="#"><span>CSV</span></a><a class="dt-button btn default" tabindex="0" aria-controls="sample_2" href="#"><span>Reload</span></a></div>
					</div>
				</div>
				<div class="portlet-body">

					<table class="table table-striped table-bordered table-hover" id="">
						<thead>
							<tr>
								<th> STT </th>
								<th> Name </th>
								<th> Value </th>
								<th> Created at </th>
								<th> Created by </th>
								<th> Edit </th>
								<th> Delete </th>
							</tr>
                      	</thead>
                      	<tbody>
                      	<?php $stt = 0; ?>
                      	@foreach($data as $item)
                      	<?php $stt = $stt + 1; ?>
                      		<tr>
								<td> {!! $stt !!} </td>
								<td> {!! $item->cname !!} </td>
								<td> {!! $item->value !!} </td>
								<td> {!! $item->created_at !!} </td>
								<td> {!! $item->uname !!} </td>
								<td> <a onclick="return confirmDelete('Are you sure Delete?')" href="{{ URL::route('admin.config.delete',$item->id) }}"> Delete</a> </td>
								<td> <a href="{{ URL::route('admin.config.edit',$item->id) }}">Edit</a> </td>
                      		</tr>
                      	@endforeach()
                      	</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


@endsection()
