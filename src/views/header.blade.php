<div class="app-header" data-uk-sticky="{animation: 'uk-animation-slide-top', showup:true}" >
	<div class="app-header-topbar" >
		<div class="uk-container uk-container-center" >
			<div class="uk-grid uk-flex-middle" >
				<div >
					<div class="uk-display-inline-block" data-uk-dropdown="delay:400" >
						<a href="{{url('admin')}}" class="uk-link-muted uk-text-bold" >
							<i class="uk-icon-bars" ></i >
							<span class="app-name" >Admin</span >
						</a >
					</div >
				</div >
				<div class="uk-flex-item-1" riot-mount >
					<cp-search ></cp-search >
				</div >
				<div class="uk-hidden-small" >
					<ul class="uk-subnav app-modulesbar" >
						<li >
							<a class="uk-svg-adjust " href="{{url('admin')}}collections" title="Collections" data-uk-tooltip="offset:10" >
								<img src="{{url('admin')}}modules/Collections/icon.svg" alt="Collections" data-uk-svg width="20px" height="20px" />
							</a >
						</li >
					</ul >
				</div >
				<div >
					<div data-uk-dropdown="delay:150" >
						<a class="uk-display-block" href="{{url('admin')}}accounts/account" style="width:30px;height:30px;" riot-mount >
							<cp-gravatar email="admin@yourdomain.de" size="30" alt="Admin" ></cp-gravatar >
						</a >
						<div class="uk-dropdown uk-dropdown-navbar uk-dropdown-flip" >
							<ul class="uk-nav uk-nav-navbar" >
								<li class="uk-nav-header uk-text-truncate" >Admin</li >
								<li >
									<a href="{{url('admin')}}accounts/account" >Account</a >
								</li >
								<li class="uk-nav-divider" ></li >
								<li >
									<a href="{{url('admin')}}auth/logout" >Logout</a >
								</li >
							</ul >
						</div >
					</div >
				</div >
			</div >
		</div >
	</div >
</div >
