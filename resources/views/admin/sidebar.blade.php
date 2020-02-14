<div>
	<div class="container-fluid">
	    <div class="row">
	        <div class="collapse show d-md-flex bg-light pt-2 pl-0 min-vh-100" id="sidebar">
	            <ul class="nav flex-column flex-nowrap overflow-hidden">
	                <li class="nav-item">
	                    <a class="nav-link text-truncate" href="{{ route('admin.home') }}">
	                    	<i class="fa fa-home"></i> 
	                    	<span class="d-none d-sm-inline">
	                    		Users
	                    	</span>
	                    </a>
                	</li>
                	<li class="nav-item">
	                    <a class="nav-link text-truncate" href="{{ route('admin.roles') }}">
	                    	<i class="fa fa-home"></i> 
	                    	<span class="d-none d-sm-inline">
	                    		Roles
	                    	</span>
	                    </a>
                	</li>
                	<li class="nav-item">
	                    <a class="nav-link text-truncate" href="{{ route('admin.permissions') }}">
	                    	<i class="fa fa-home"></i> 
	                    	<span class="d-none d-sm-inline">
	                    		Permissions
	                    	</span>
	                    </a>
                	</li>
                	<li class="nav-item">
	                    <a class="nav-link text-truncate" href="{{ route('admin.manage_posts') }}">
	                    	<i class="fa fa-home"></i> 
	                    	<span class="d-none d-sm-inline">
	                    		Manage Posts
	                    	</span>
	                    </a>
                	</li>
                	<li class="nav-item">
	                    <a class="nav-link text-truncate" href="{{ route('admin.manage_pages') }}">
	                    	<i class="fa fa-home"></i> 
	                    	<span class="d-none d-sm-inline">
	                    		Manage Pages
	                    	</span>
	                    </a>
                	</li>
	            </ul>
	        </div>
	    </div>
	</div>
	{{ $slot }}
</div>