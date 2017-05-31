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
						<a href="{{url('admin')}}" >Collections</a >
					</li >
					<li data-uk-dropdown="mode:'hover', delay:300" aria-haspopup="true" aria-expanded="false" class="" >
						<a href="{{url('admin/index/')}}/{{$tax}}" >
							<i class="uk-icon-bars" ></i >
							{{$tax}}
						</a >
					</li >
				</ul >
			</div >
			<div class="uk-margin-top-large" data-is="view-bda1f176" >
				<h3 class="uk-flex uk-flex-middle uk-text-bold" >
					New Entry
				</h3 >
				<div class="uk-grid" >
					<div class="uk-grid-margin uk-width-medium-1-1" >
						<form class="uk-form" action="{{url('admin/create/')}}/{{$tax}}" >
							<ul class="uk-tab uk-margin-large-bottom uk-flex uk-flex-center" style="display: none;" >
								<li class="false" >
									<a class="uk-text-capitalize" >All</a >
								</li >
								<li class="uk-active" >
									<a class="uk-text-capitalize" >main</a >
								</li >
							</ul >
							<div class="uk-grid uk-grid-match uk-grid-gutter" >
								@if(!empty($builder_tabs))
									@foreach($builder_tabs[$tax] as $tab => $val)
										<div class="tab-pane active" id="{{$tab}}" >
											{{-- Loops Each builder Field for the current Model --}}
											@foreach($builder_fields[$tax] as $key => $builder)
												@if(!empty($builder['hidden']) && $builder['hidden'] == 'true' )
													{{-- Handels the fact that not all inputs need to be made visable--}}
												@else
													{{-- Check that each item has the current Tab Parent --}}
													@if(!empty($builder['parent']) && $builder['parent'] == $tab)
														<div class="uk-width-medium-1-1" >
															<div class="uk-panel" >
																<label class="uk-text-bold" >{{$builder['label']}}</label >
																<div class="uk-margin uk-text-small uk-text-muted" ></div >
																<div class="uk-margin" >
																	<cp-field type="text" bind="entry.grade" >
																		<div ref="field" data-is="field-text" bind="entry.grade" >
																			<input ref="input" class="uk-width-1-1" bind-event="change" bind="entry.grade" name="{{$key}}" type="text" >
																		</div >
																	</cp-field >
																</div >
															</div >
														</div >
													@endif
												@endif
											@endforeach
											{{-- End of the loop within the current Model --}}
										</div >
									@endforeach
								@endif
							</div >
							<div class="uk-margin-top" >
								<button class="uk-button uk-button-large uk-button-primary uk-margin-right" >Save</button >
								<a href="{{url('admin/index/')}}/{{$tax}}" >
									<span >Cancel</span >
									<span style="display: none;" >Close</span >
								</a >
							</div >
						</form >
					</div >
				</div >
			</div >
		</div >
	</div >
@endsection
