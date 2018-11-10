<?php
$headerSection = new \Controllers\HeaderSection();
$data = $headerSection->get(get_the_ID());
?>
		<footer class="footer_pnl" id="ft_pnl">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="ft_social text-center">
							
							<ul class="list-inline">
<?php
foreach ($data->social_icons as $key => $value) {
	?>
								<li>
									<a href="<?php echo $value['social_url'] ?>" target="_blank">
										<i class="fab fa-<?php echo $value['icon'] ?>"></i>
									</a>
								</li>
<?php

}
?>
							</ul>

							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</footer>

<div class="row footer_links">
<?php
// $args = [
// 	'theme_location'  => 'footer_left',
// 	'menu_class'      => 'list-unstyled footer-menu',
// 	'container'       => 'div',
// 	'container_class' => 'col-6 col-md-2',
// ];
// wp_nav_menu( $args );
$args = [
	'theme_location'  => 'footer_right',
	'menu_class'      => 'list-unstyled footer-menu',
	'container'       => 'div',
	'container_class' => '',
];
wp_nav_menu( $args );
?>
</div>

<div class="copyright text-center">©<?php echo date("Y");?>. All Rights Reserved.</div>
