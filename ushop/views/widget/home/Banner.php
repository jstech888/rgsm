
		
		<!-- Hight-Light-Banner  -->
		<?php
			foreach( $arr_Banner AS $Banner )
			{
		?>
			<section class=" box-element " >
				<div class="container"><div class="row">
					<div class="vc_col-sm-12 wpb_column vc_column_container">
						<div class="wpb_wrapper">
							<div class="wpb_single_image wpb_content_element overlay-full vc_align_left">
								<div class="wpb_wrapper">				
									<a href="<?php echo $Banner['value']['href'];?>" target="<?php echo $Banner['value']['target'];?>"><img class="vc_box_border_grey " src="<?php echo $Banner['value']['src'];?>" width="100%" alt="<?php echo $Banner['value']['alt'];?>" /></a>
								</div> 
							</div> 
						</div> 
					</div> 
				</div></div>
			</section>
		<?php
			}
		?>
		<!-- Hight-Light-Banner  -->
			