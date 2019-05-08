<div class="sidebar-top">
	<form method="post" class="searchform" id="search-results">
		<input type="text" class="form-control" name="keyword" placeholder="Search...">
	</form>
	<div class="userlogged clearfix">
		<i class="icon icons-faces-users-01"></i>
		<div class="user-details">
			<h4>{{ Auth::user()->human->name }}</h4>
			<div class="dropdown user-login">
				<button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
					<i class="online"></i><span>Online</span><i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="busy"></i><span>Busy</span></a></li>
					<li><a  href="#"><i class="turquoise"></i><span>Invisible</span></a></li>
					<li><a href="#"><i class="away"></i><span>Away</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>