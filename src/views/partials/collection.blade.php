{{--
	@Template 	: Admin/Partial/Collection
	@Variables 	: $collections
	@Author 	: Mark Jones
	@Version 	: 0.1.0
--}}


@if(!empty($builder_fields))
	@foreach($builder_fields as $name => $collection)
		<div class="uk-width-1-4 ">
			<div class="uk-panel uk-panel-box uk-panel-card" >
				<div class="uk-panel-teaser uk-position-relative" >
					<canvas width="600" height="350" ></canvas >
					<a class="uk-position-cover uk-flex uk-flex-middle uk-flex-center" href="{{url('admin/index')}}/{{$name}}"  >
						<div class="uk-width-1-4 uk-svg-adjust" style="color:#D8334A" ></div >
					</a >
				</div >
				<div class="uk-grid uk-grid-small" >
					<div data-uk-dropdown="delay:300" >
						<div class="uk-dropdown" >
							<ul class="uk-nav uk-nav-dropdown" >
								<li class="uk-nav-header" >{{trans('admin.action')}}</li >
								<li >
									<a  href="{{url('admin/index')}}/{{$name}}"  >{{$name}}</a >
								</li >
								<li ></li >
							</ul >
						</div >
					</div >
					<a class="uk-text-bold uk-flex-item-1 uk-text-center uk-link-muted" href="{{url('admin/index')}}/{{$name}}" >{{$name}}</a >
				</div >
			</div >
		</div >
	@endforeach
@endif