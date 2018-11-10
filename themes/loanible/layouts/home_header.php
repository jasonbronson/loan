<?php
$headerSection = new \Controllers\HeaderSection();
$page = get_page_by_path( 'home' );
$data = $headerSection->get($page->ID);

?>
		<header class="header_pnl clearfix">
			<div class="top_part_banner ">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<div class="logo">
								<a href="/"><img src="<?php echo $data->main_logo['sizes']['large'] ?>" alt="<?php echo $data->main_logo['alt'] ?>"></a>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="menu_pnl text-right">
								<nav class="main_menu">
									<ul id="navigation" class="slimmenu">
										<li class="active">
											<a href="/blog">Blog</a>
										</li>
										<li>
											<a href="Javascript:void(0);">Social</a>
<?php /*
<pre><?php var_dump($data->social_icons) ?></pre>
<pre><?php echo var_dump($value); ?></pre>
*/ ?>
											<ul>
<?php 
foreach ($data->social_icons as $key => $value) {
?>
												<li>
													<a href="<?php echo $value['social_url'] ?>" target="_blank">
														<span>
															<i class="fab fa-<?php echo $value['icon'] ?>"></i>
														</span><?php echo $value['social_text'] ?>
													</a>
												</li>
<?php
}
 ?>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
