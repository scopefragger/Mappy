<!doctype html>
<html lang="en" data-base="/fellow_repo/cms/" data-route="/fellow_repo/cms/" data-version="0.3.1" data-locale="en" >
	@include('admin::head')
	@include('admin::header')
	<body >
		<div class="app-main" >
			<div class="uk-container uk-container-center" >
				<div id="dashboard" >
					<div class="uk-margin" ></div >
					<div class="uk-width-medium-1-1" data-area="aside-left" >
						<div class="uk-sortable uk-grid uk-grid-gutter uk-grid-width-medium-1-1" data-uk-sortable="{group:'dashboard',animation:false}" >
							<div data-widget="collections" >
								<div data-is="view-15575e33" >
									<div >
										<div class="uk-margin uk-clearfix" >
											<div class="uk-form-icon uk-form uk-text-muted" style="display:none;" >
												<i class="uk-icon-filter" ></i >
												<input class="uk-form-large uk-form-blank" type="text" ref="txtfilter" placeholder="Filter collections..." >
											</div >
										</div >
										@yield('content')
									</div >
								</div >
							</div >
						</div >
					</div >
				</div >
				<div class="uk-margin" ></div >
			</div >
			<style >
				#dashboard .uk-grid.uk-sortable {
					min-height: 30vh;
				}
			</style >
		</div >
		</div>
		<!-- RIOT COMPONENTS -->
		<script type="riot/tag" src="/fellow_repo/cms/modules/Collections/assets/field-collectionlink.tag" ></script >
	</body >
</html >
