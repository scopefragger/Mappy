@extends('admin::layout')
@section('content')
	<div class="uk-container uk-container-center" >
		<div >
			<ul class="uk-breadcrumb" >
				<li class="uk-active" >
					<span >Settings</span >
				</li >
			</ul >
		</div >
		<div class="uk-grid uk-grid-gutter uk-grid-match uk-grid-width-medium-1-4 uk-text-center" >
			<div >
				<div class="uk-panel uk-panel-box uk-panel-card" >
					<img src="/fellow_repo/cms/assets/app/media/icons/settings.svg" width="50" height="50" alt="Settings" >
					<div class="uk-text-truncate uk-margin" >
						{{trans('admin::core.label_settings')}}
					</div >
					<a class="uk-position-cover" href="/fellow_repo/cms/settings/edit" ></a >
				</div >
			</div >
			<div >
				<div class="uk-panel uk-panel-box uk-panel-card" >
					<img src="/fellow_repo/cms/assets/app/media/icons/accounts.svg" width="50" height="50" alt="Accounts" >
					<div class="uk-text-truncate uk-margin" >
						Accounts
					</div >
					<a class="uk-position-cover" href="/fellow_repo/cms/accounts/index" ></a >
				</div >
			</div >
		</div >
	</div >
@endsection