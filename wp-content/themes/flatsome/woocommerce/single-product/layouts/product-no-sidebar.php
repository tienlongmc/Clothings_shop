<div class="product-container">
  <div class="product-main">
    <div class="row content-row mb-0">

    	<div class="product-gallery large-<?php echo flatsome_option('product_image_width'); ?> col">
    	<?php
    		/**
    		 * woocommerce_before_single_product_summary hook
    		 *
    		 * @hooked woocommerce_show_product_sale_flash - 10
    		 * @hooked woocommerce_show_product_images - 20
    		 */
    		do_action( 'woocommerce_before_single_product_summary' );
    	?>
    	</div>

    	<div class="product-info summary col-fit col entry-summary <?php flatsome_product_summary_classes();?>">

    		<?php
    			/**
    			 * woocommerce_single_product_summary hook
    			 *
    			 * @hooked woocommerce_template_single_title - 5
    			 * @hooked woocommerce_template_single_rating - 10
    			 * @hooked woocommerce_template_single_price - 10
    			 * @hooked woocommerce_template_single_excerpt - 20
    			 * @hooked woocommerce_template_single_add_to_cart - 30
    			 * @hooked woocommerce_template_single_meta - 40
    			 * @hooked woocommerce_template_single_sharing - 50
    			 */
    			do_action( 'woocommerce_single_product_summary' );
    		?>
			<div class="pd-static-group">
                <div class="item">
                    <i class="icons icon-truck"></i>
                    <p class="text">Freeship toàn quốc đơn &gt;500k</p>
                </div>
                <div class="item">
                    <i class="icons icon-box"></i>
                    <p class="text">Kiểm hàng trước khi thanh toán</p>
                </div>
                <div class="item">
                    <i class="icons icon-support"></i>
                    <p class="text">Hỗ trợ đóng gói miễn phí</p>
                </div>
            </div>
			<div class="pd-summary-group">
                <div class="pd-summary-title d-flex align-items-center justify-content-between">
                    <p class="title">Đặc điểm nổi bật</p>
                </div>
                <div class="pd-summary-list" id="js-summary-list">
                    <div class="item">Chất liệu lụa satin cao cấp mềm mướt, sang trọng</div>
					<div class="item">Kiểu dáng tay dài, quần dài thanh lịch</div>
					<div class="item">Họa tiết hoa rực rỡ, gây ấn tượng mạnh mẽ về mặt thị giác</div>
                </div>
            </div>

    	</div>

    	<div id="product-sidebar" class="mfp-hide">
    		<div class="sidebar-inner">
    			<?php
    				do_action('flatsome_before_product_sidebar');
    				/**
    				 * woocommerce_sidebar hook
    				 *
    				 * @hooked woocommerce_get_sidebar - 10
    				 */
    				if (is_active_sidebar( 'product-sidebar' ) ) {
    					dynamic_sidebar('product-sidebar');
    				} else if(is_active_sidebar( 'shop-sidebar' )) {
    					dynamic_sidebar('shop-sidebar');
    				}
    			?>
    		</div>
    	</div>

    </div>
  </div>

  <div class="product-footer">
  	<div class="container">
    		<?php
    			/**
    			 * woocommerce_after_single_product_summary hook
    			 *
    			 * @hooked woocommerce_output_product_data_tabs - 10
    			 * @hooked woocommerce_upsell_display - 15
    			 * @hooked woocommerce_output_related_products - 20
    			 */
    			do_action( 'woocommerce_after_single_product_summary' );
    		?>
    </div>
  </div>
</div>