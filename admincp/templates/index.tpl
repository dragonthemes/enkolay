<div class="Heading">{$LANG.admin_dashborad}</div>
<div class="dashbordInner">
	<div class="row-fluid">
		<div class="span6">
			<div class="dashbdTopUser">
				<div class="dashbdTopUserHead">User</div>
				<div class="dashbdTopUserCont">
					<div class="dashbdTopUserContIcon colblue">
						<i class="fa fa-user"></i>
					</div>
					<div class="dashbdTopUserContCount">
						<span>Visitors</span>
                        <span class="viewBg">{$objAdmin->getUsersCount()}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="dashbdTopBlog">
				<div class="dashbdTopUserHead">Blog</div>
				<div class="dashbdTopUserCont">
					<div class="dashbdTopUserContIcon colred">
						<i class="fa fa-rss"></i>
					</div>
					<div class="dashbdTopUserContCount">
					 <span> Total</span>
                   
                   <span class="viewBg">{$objAdmin->getBlogCount()}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid marTop20">
		<div class="span6">
			<div class="dashbdTopSite">
				<div class="dashbdTopUserHead">Site</div>
				<div class="dashbdTopUserCont">
					<div class="dashbdTopUserContIcon colblue">
						<i class="fa fa-globe"></i>
					</div>
					<div class="dashbdTopUserContCount">
					 <span>Total</span>
                        <span class="viewBg">{$objAdmin->getSiteCount()}</span>
					</div>
				</div>
			</div>
		</div>
        {*<div class="span6">
			<div class="dashbdTopStore">
				<div class="dashbdTopUserHead">Store</div>
				<div class="dashbdTopUserCont">
					<div class="dashbdTopUserContIcon colblue">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="dashbdTopUserContCount">
					 <span>Total</span>
                        <span class="viewBg">{$objAdmin->getStoreCount()}</span>
					</div>
				</div>
			</div>
		</div> *}
	</div>
</div>