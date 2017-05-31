@extends('admin::layout')
@section('content')
	<div class="app-main" >
		<div class="uk-container uk-container-center" >
			<style >
				.app-header {
					border-top: 8px #D8334A solid;
				}
			</style >
			<div >
				<ul class="uk-breadcrumb" >
					<li >
						<a href="/fellow_repo/cms/collections" >Collections</a >
					</li >
					<li class="uk-active" data-uk-dropdown="mode:'hover', delay:300" >
						<a >
							<i class="uk-icon-bars" ></i >
							{{$tax}}
						</a >
					</li >
				</ul >
			</div >
			<div class="uk-margin uk-text-center uk-text-muted" >
				{{-- ICON TO GO HERE --}}
			</div >
			<div class="uk-margin-top" data-is="view-f9963233" >
				<div >
					<div class="uk-clearfix uk-margin-top" >
						<div class="uk-float-left uk-width-1-2" >
							<div class="uk-form-icon uk-form uk-width-1-1 uk-text-muted" >
								<i class="uk-icon-search" ></i >
								<input class="uk-width-1-1 uk-form-large uk-form-blank" type="text" ref="txtfilter" placeholder="Filter items..." >
							</div >
						</div >
						<div class="uk-float-right" >
							<a class="uk-button uk-button-large uk-button-primary" href="{{url('admin/make')}}/{{$tax}}" >
								<i class="uk-icon-plus-circle uk-icon-justify" ></i >
								Entry
							</a >
						</div >
					</div >
					<div class="uk-margin-top" >
						<table class="uk-table uk-table-border uk-table-striped" >
							<thead >
								<tr >
									<th width="20" >
										<input type="checkbox" data-check="all" >
									</th >
									@foreach($builder_fields[$tax] as $builder)
										@if(!empty($builder['table']) && $builder['table'] == 'true')
											<th class="uk-text-small" >
												<a class="uk-link-muted " data-sort="{{$builder['label']}}" > {{$builder['label']}}</a >
											</th >
										@endif
									@endforeach
									<th width="20" ></th >
								</tr >
							</thead >
							<tbody >
								@if(!empty($data))
									@foreach($data as $row)
										<tr >
											<td >
												<input type="checkbox" data-check="" data-id="592453ac366f075cf52a65d1" >
											</td >
											@foreach($builder_fields[$tax] as $key => $builder)
												@if(!empty($builder['table']) && $builder['table'] == 'true')
													<td class="uk-text-truncate" >
														<a class="uk-link-muted" href="/fellow_repo/cms/collections/entry/Education/592453ac366f075cf52a65d1" >
															<raw content="neveryoumind" >{{$row->$key}}</raw >
														</a >
													</td >
												@endif
											@endforeach
											{{--<td style="font-size: 20px; text-align: right;">--}}
											{{--<a href="/admin/edit/{{$tax}}/?id={{$row->id}}"><i class="ti-settings"></i></a>--}}
											{{--<a href="/admin/duplicate/{{$tax}}/?id={{$row->id}}"><i--}}
											{{--class="ti-layers"></i></a>--}}
											{{--<a href="/admin/delete/{{$tax}}/?id={{$row->id}}"><i class="ti-trash"></i></a>--}}
											{{--</td>--}}
										</tr >
									@endforeach
								@endif
							</tbody >
						</table >
					</div >
				</div >
			</div >
		</div >
	</div >
@endsection