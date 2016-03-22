<div class="main_pagePage" id="subPage">
	<div class="main_arrowTop_page"></div>
	<div class="row-fluid">	
		<div class="mainLeftSideToggle">
			<div class="addPage clearfix">
				<a class="addPageTabSec">{$LANG.main_choose_sub_page}</a>
			</div>
			<div class="mainLeftPageScroll nano">
				<ul class="menuUl marTop20 mainLeftPanelScrollActive contentNanoScroll LeftNone">
					{section name="pages" loop="$pagelist"}
						<li id="page_{$pagelist[pages].page_id}">
							<a {if $smarty.get.pageid eq 0 and $smarty.section.pages.index eq 0}class="active"{/if} onclick="showAddSubPage('{$pagelist[pages].page_id}');">{$pagelist[pages].pagename}</a>
						</li>
					{/section}
				</ul>
			</div>
		</div>
		<div class="span6 mainRightSideToggle marTop10">
			<div class="chooseFile">
				<div class="chooseFileLft">
					<div class="chooseFileLftImg"></div>
					<div class="chooseFileLftTxt">{$LANG.choose_any_one_file}</div>
				</div>
				<div class="chooseFileMidImg"></div>
				<div class="chooseFileRht">
					<div class="chooseFileRhtImg"></div>
					<div class="chooseFileRhtTxt">{$LANG.add_sub_pages}</div>
				</div>
			</div>
		</div>
	</div>
</div>