@extends('admin.master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>Posttypes
					</div>
					<div class="tools">
						<div class="dt-buttons">
						<a class="dt-button buttons-print btn default" tabindex="0" aria-controls="sample_2" href="{!! route('admin.posttype.create') !!}"><span>Add posttype</span></a>
						<a class="dt-button buttons-pdf buttons-html5 btn default" tabindex="0" aria-controls="sample_2" href="#"><span>PDF</span></a><a class="dt-button buttons-excel buttons-html5 btn default" tabindex="0" aria-controls="sample_2" href="#"><span>Excel</span></a><a class="dt-button buttons-csv buttons-html5 btn default" tabindex="0" aria-controls="sample_2" href="#"><span>CSV</span></a><a class="dt-button btn default" tabindex="0" aria-controls="sample_2" href="#"><span>Reload</span></a></div>
					</div>
				</div>
				<div class="portlet-body">

					<table class="table table-striped table-bordered table-hover" id="sample_3">
						<thead>
							<tr>
								<th> STT </th>
								<th> Name </th>
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
								<td> {!! $item->pname !!} </td>
								<td> {!! $item->created_at !!} </td>
								<td> {!! $item->uname !!} </td>
								<td> <a onclick="return confirmDelete('Are you sure Delete?')" href="{{ URL::route('admin.posttype.delete',$item->id) }}"> Delete</a> </td>
								<td> <a href="{{ URL::route('admin.posttype.edit',$item->id) }}">Edit</a> </td>
                      		</tr>
                      	@endforeach()
                      	</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


@endsection()
