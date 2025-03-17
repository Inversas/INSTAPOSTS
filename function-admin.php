<?php
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

wp_enqueue_media();


function mh_add_admin_page() {

	//Generate MH Admin Page
	add_menu_page( 'MH Theme Options', 'MH', 'manage_options', 'mh_options','mh_theme_create_page', 'dashicons-visibility', 6);

	//Activate Custom Settings
	add_action('admin_init', 'mh_custom_settings');
}

add_action( 'admin_menu', 'mh_add_admin_page' );

function mh_custom_settings() {
	register_setting('mh-settings-group','mh_texto1');
	register_setting('mh-settings-group','mh_logo');
	register_setting('mh-settings-group','mh_icondown');

	register_setting('mh-settings-group','mh_gifesq');
	register_setting('mh-settings-group','mh_gifdret');
	register_setting('mh-settings-group','mh_maskesq');
	register_setting('mh-settings-group','mh_maskdret');
	register_setting('mh-settings-group','mh_bkesq');
	register_setting('mh-settings-group','mh_bkdret');


	register_setting('mh-settings-group','mh_banner_esq');
	register_setting('mh-settings-group','mh_banner_esq_text');

	register_setting('mh-settings-group','mh_img_sec1');
	register_setting('mh-settings-group','mh_text_sec1');
	register_setting('mh-settings-group','mh_sec1_icon1');
	register_setting('mh-settings-group','mh_sec1_text1');
	register_setting('mh-settings-group','mh_sec1_desc1');
	register_setting('mh-settings-group','mh_sec1_icon2');
	register_setting('mh-settings-group','mh_sec1_text2');
	register_setting('mh-settings-group','mh_sec1_desc2');
	register_setting('mh-settings-group','mh_sec1_icon3');
	register_setting('mh-settings-group','mh_sec1_text3');
	register_setting('mh-settings-group','mh_sec1_desc3');
	register_setting('mh-settings-group','mh_sec1_icon4');
	register_setting('mh-settings-group','mh_sec1_text4');
	register_setting('mh-settings-group','mh_sec1_desc4');


	register_setting('mh-settings-group','mh_img_sec2');
	register_setting('mh-settings-group','mh_text_sec2');
	register_setting('mh-settings-group','mh_sec2_icon1');
	register_setting('mh-settings-group','mh_sec2_text1');
	register_setting('mh-settings-group','mh_sec2_desc1');
	register_setting('mh-settings-group','mh_sec2_icon2');
	register_setting('mh-settings-group','mh_sec2_text2');
	register_setting('mh-settings-group','mh_sec2_desc2');
	register_setting('mh-settings-group','mh_sec2_icon3');
	register_setting('mh-settings-group','mh_sec2_text3');
	register_setting('mh-settings-group','mh_sec2_desc3');
	register_setting('mh-settings-group','mh_sec2_icon4');
	register_setting('mh-settings-group','mh_sec2_text4');
	register_setting('mh-settings-group','mh_sec2_desc4');
	register_setting('mh-settings-group','mh_sec2_icon5');
	register_setting('mh-settings-group','mh_sec2_text5');
	register_setting('mh-settings-group','mh_sec2_desc5');
	register_setting('mh-settings-group','mh_sec2_icon6');
	register_setting('mh-settings-group','mh_sec2_text6');
	register_setting('mh-settings-group','mh_sec2_desc6');


	register_setting('mh-settings-group','mh_img_sec3');
	register_setting('mh-settings-group','mh_text_sec3');
	register_setting('mh-settings-group','mh_sec3_icon1');
	register_setting('mh-settings-group','mh_sec3_icon2');
	register_setting('mh-settings-group','mh_sec3_icon3');

	register_setting('mh-settings-group','mh_text_contact');

	register_setting('mh-settings-group','mh_banner_dret');
	register_setting('mh-settings-group','mh_banner_dret_text');

	register_setting('mh-settings-group','mh_xarxes_esq_icon1');
	register_setting('mh-settings-group','mh_xarxes_esq_icon2');
	register_setting('mh-settings-group','mh_xarxes_esq_icon3');

	register_setting('mh-settings-group','mh_xarxes_dret_icon1');
	register_setting('mh-settings-group','mh_xarxes_dret_icon2');
	register_setting('mh-settings-group','mh_xarxes_dret_icon3');





	add_settings_section('mh-template-options','Template Options', 'mh_template_options','mh_options');
	add_settings_field( 'texto1-name', 'Texto1', 'mh_texto1_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-logo-name', 'Image Logo', 'mh_logo_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-icondown-name', 'Icon Down', 'mh_icondown_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-gifesq-name', 'Image Gif Esq', 'mh_gifesq_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-gifdret-name', 'Image Gif Dret', 'mh_gifdret_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-maskesq-name', 'Image Mask Esq', 'mh_maskesq_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-maskdret-name', 'Image Mask Dret', 'mh_maskdret_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-bkesq-name', 'Image Back Esq', 'mh_bkesq_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-bkdret-name', 'Image Back Dret', 'mh_bkdret_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-banner-esq-name', 'Image Banner Esq', 'mh_banner_esq_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-banner-esq-text-name', 'Text Banner Esq', 'mh_banner_esq_text_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-img-sec1-name', 'Image Section1', 'mh_img_sec1_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-text-sec1', 'Text Section1', 'mh_text_sec1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-icon1', 'Icon1 Section1', 'mh_sec1_icon1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-text1', 'Text1 Section1', 'mh_sec1_text1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-desc1', 'Desc1 Section1', 'mh_sec1_desc1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-icon2', 'Icon2 Section1', 'mh_sec1_icon2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-text2', 'Text2 Section1', 'mh_sec1_text2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-desc2', 'Desc2 Section1', 'mh_sec1_desc2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-icon3', 'Icon3 Section1', 'mh_sec1_icon3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-text3', 'Text3 Section1', 'mh_sec1_text3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-desc3', 'Desc3 Section1', 'mh_sec1_desc3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-icon4', 'Icon4 Section1', 'mh_sec1_icon4', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-text4', 'Text4 Section1', 'mh_sec1_text4', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec1-desc4', 'Desc4 Section1', 'mh_sec1_desc4', 'mh_options', 'mh-template-options');

	add_settings_field( 'mh-img-sec2-name', 'Image Section2', 'mh_img_sec2_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-text-sec2', 'Text Section2', 'mh_text_sec2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-icon1', 'Icon1 Section2', 'mh_sec2_icon1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-text1', 'Text1 Section2', 'mh_sec2_text1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-desc1', 'Desc1 Section2', 'mh_sec2_desc1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-icon2', 'Icon2 Section2', 'mh_sec2_icon2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-text2', 'Text2 Section2', 'mh_sec2_text2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-desc2', 'Desc2 Section2', 'mh_sec2_desc2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-icon3', 'Icon3 Section2', 'mh_sec2_icon3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-text3', 'Text3 Section2', 'mh_sec2_text3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-desc3', 'Desc3 Section2', 'mh_sec2_desc3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-icon4', 'Icon4 Section2', 'mh_sec2_icon4', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-text4', 'Text4 Section2', 'mh_sec2_text4', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-desc4', 'Desc4 Section2', 'mh_sec2_desc4', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-icon5', 'Icon5 Section2', 'mh_sec2_icon5', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-text5', 'Text5 Section2', 'mh_sec2_text5', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-desc5', 'Desc5 Section2', 'mh_sec2_desc5', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-icon6', 'Icon6 Section2', 'mh_sec2_icon6', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-text6', 'Text6 Section2', 'mh_sec2_text6', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec2-desc6', 'Desc6 Section2', 'mh_sec2_desc6', 'mh_options', 'mh-template-options');


	add_settings_field( 'mh-img-sec3-name', 'Image Section3', 'mh_img_sec3_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-text-sec3', 'Text Section3', 'mh_text_sec3', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec3-icon1', 'Icon1 Section3', 'mh_sec3_icon1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec3-icon2', 'Icon2 Section3', 'mh_sec3_icon2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-sec3-icon3', 'Icon3 Section3', 'mh_sec3_icon3', 'mh_options', 'mh-template-options');

	add_settings_field( 'mh-text-contact', 'Text Contact', 'mh_text_contact', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-xarxes-esq-icon1', 'Xarxes Esq Icon1', 'mh_xarxes_esq_icon1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-xarxes-esq-icon2', 'Xarxes Esq Icon2', 'mh_xarxes_esq_icon2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-xarxes-esq-icon3', 'Xarxes Esq Icon3', 'mh_xarxes_esq_icon3', 'mh_options', 'mh-template-options');


	add_settings_field( 'mh-banner-dret-name', 'Image Banner Dret', 'mh_banner_dret_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-banner-dret-text-name', 'Text Banner Dret', 'mh_banner_dret_text_name', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-xarxes-dret-icon1', 'Xarxes Dret Icon1', 'mh_xarxes_dret_icon1', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-xarxes-dret-icon2', 'Xarxes Dret Icon2', 'mh_xarxes_dret_icon2', 'mh_options', 'mh-template-options');
	add_settings_field( 'mh-xarxes-dret-icon3', 'Xarxes Dret Icon3', 'mh_xarxes_dret_icon3', 'mh_options', 'mh-template-options');
}
function mh_template_options(){
	echo 'Set Images';
}
function mh_texto1_name(){
	$texto1= esc_attr(get_option('mh_texto1'));
	echo '<input type="text" name="mh_texto1" value="'.$texto1.'" />';
}
function mh_logo_name(){
	$image_logo= esc_attr(get_option('mh_logo'));

	//Comprovar si existeix imatge
	if( $image_logo == null){
		$image_logo =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_logo."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_logo" value=	<?php echo "'".$image_logo."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_icondown_name(){
	$image_icondown= esc_attr(get_option('mh_icondown'));

	//Comprovar si existeix imatge
	if( $image_icondown == null){
		$image_icondown =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_icondown."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_icondown" value=	<?php echo "'".$image_icondown."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_gifesq_name(){
	$image_gifesq= esc_attr(get_option('mh_gifesq'));

	//Comprovar si existeix imatge
	if( $image_gifesq == null){
		$image_gifesq =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_gifesq."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_gifesq" value=	<?php echo "'".$image_gifesq."'"; ?> />
			</div>

		</div>
	<?php
}
function mh_gifdret_name(){
	$image_gifdret= esc_attr(get_option('mh_gifdret'));

	//Comprovar si existeix imatge
	if( $image_gifdret == null){
		$image_gifdret =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_gifdret."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_gifdret" value=	<?php echo "'".$image_gifdret."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_maskesq_name(){
	$image_maskesq= esc_attr(get_option('mh_maskesq'));

	//Comprovar si existeix imatge
	if( $image_maskesq == null){
		$image_maskesq =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_maskesq."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_maskesq" value=	<?php echo "'".$image_maskesq."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_maskdret_name(){
	$image_maskdret= esc_attr(get_option('mh_maskdret'));

	//Comprovar si existeix imatge
	if( $image_maskdret == null){
		$image_maskdret =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_maskdret."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_maskdret" value=	<?php echo "'".$image_maskdret."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_bkesq_name(){
	$image_bkesq= esc_attr(get_option('mh_bkesq'));

	//Comprovar si existeix imatge
	if( $image_bkesq == null){
		$image_bkesq =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_bkesq."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_bkesq" value=	<?php echo "'".$image_bkesq."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_bkdret_name(){
	$image_bkdret= esc_attr(get_option('mh_bkdret'));

	//Comprovar si existeix imatge
	if( $image_bkdret == null){
		$image_bkdret =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_bkdret."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_bkdret" value=	<?php echo "'".$image_bkdret."'"; ?> />
			</div>
		</div>
	<?php
}

function mh_banner_esq_name(){
	$image_banner_esq= esc_attr(get_option('mh_banner_esq'));

	//Comprovar si existeix imatge
	if( $image_banner_esq == null){
		$image_banner_esq =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_banner_esq."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_banner_esq" value=	<?php echo "'".$image_banner_esq."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_banner_esq_text_name(){
	$banner_esq_text= esc_attr(get_option('mh_banner_esq_text'));
	echo '<input type="text" name="mh_banner_esq_text" value="'.$banner_esq_text.'" />';
}

function mh_img_sec1_name(){
	$img_sec1= esc_attr(get_option('mh_img_sec1'));

	//Comprovar si existeix imatge
	if( $img_sec1 == null){
		$img_sec1 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$img_sec1."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_img_sec1" value=	<?php echo "'".$img_sec1."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_text_sec1(){
	$text_sec1= esc_attr(get_option('mh_text_sec1'));
	echo '<input type="text" name="mh_text_sec1" value="'.$text_sec1.'" />';
}
function mh_sec1_icon1(){
	$sec1_icon1= esc_attr(get_option('mh_sec1_icon1'));

	//Comprovar si existeix imatge
	if( $sec1_icon1 == null){
		$sec1_icon1 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec1_icon1."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec1_icon1" value=	<?php echo "'".$sec1_icon1."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec1_text1(){
	$sec1_text1= esc_attr(get_option('mh_sec1_text1'));
	echo '<input type="text" name="mh_sec1_text1" value="'.$sec1_text1.'" />';
}
function mh_sec1_desc1(){
	$sec1_desc1= esc_attr(get_option('mh_sec1_desc1'));
	echo '<textarea type="text" name="mh_sec1_desc1">'.$sec1_desc1.'</textarea>';
}
function mh_sec1_icon2(){
	$sec1_icon2= esc_attr(get_option('mh_sec1_icon2'));

	//Comprovar si existeix imatge
	if( $sec1_icon2 == null){
		$sec1_icon2 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec1_icon2."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec1_icon2" value=	<?php echo "'".$sec1_icon2."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec1_text2(){
	$sec1_text2= esc_attr(get_option('mh_sec1_text2'));
	echo '<input type="text" name="mh_sec1_text2" value="'.$sec1_text2.'" />';
}
function mh_sec1_desc2(){
	$sec1_desc2= esc_attr(get_option('mh_sec1_desc2'));
	echo '<textarea type="text" name="mh_sec1_desc2">'.$sec1_desc2.'</textarea>';
}
function mh_sec1_icon3(){
	$sec1_icon3= esc_attr(get_option('mh_sec1_icon3'));

	//Comprovar si existeix imatge
	if( $sec1_icon3 == null){
		$sec1_icon3 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec1_icon3."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec1_icon3" value=	<?php echo "'".$sec1_icon3."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec1_text3(){
	$sec1_text3= esc_attr(get_option('mh_sec1_text3'));
	echo '<input type="text" name="mh_sec1_text3" value="'.$sec1_text3.'" />';
}
function mh_sec1_desc3(){
	$sec1_desc3= esc_attr(get_option('mh_sec1_desc3'));
	echo '<textarea type="text" name="mh_sec1_desc3">'.$sec1_desc3.'</textarea>';
}
function mh_sec1_icon4(){
	$sec1_icon4= esc_attr(get_option('mh_sec1_icon4'));

	//Comprovar si existeix imatge
	if( $sec1_icon4 == null){
		$sec1_icon4 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec1_icon4."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec1_icon4" value=	<?php echo "'".$sec1_icon4."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec1_text4(){
	$sec1_text4= esc_attr(get_option('mh_sec1_text4'));
	echo '<input type="text" name="mh_sec1_text4" value="'.$sec1_text4.'" />';
}
function mh_sec1_desc4(){
	$sec1_desc4= esc_attr(get_option('mh_sec1_desc4'));
	echo '<textarea type="text" name="mh_sec1_desc4">'.$sec1_desc4.'</textarea>';
}


function mh_img_sec2_name(){
	$img_sec2= esc_attr(get_option('mh_img_sec2'));

	//Comprovar si existeix imatge
	if( $img_sec2 == null){
		$img_sec2 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$img_sec2."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_img_sec2" value=	<?php echo "'".$img_sec2."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_text_sec2(){
	$text_sec2= esc_attr(get_option('mh_text_sec2'));
	echo '<input type="text" name="mh_text_sec2" value="'.$text_sec2.'" />';
}
function mh_sec2_icon1(){
	$sec2_icon1= esc_attr(get_option('mh_sec2_icon1'));

	//Comprovar si existeix imatge
	if( $sec2_icon1 == null){
		$sec2_icon1 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec2_icon1."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec2_icon1" value=	<?php echo "'".$sec2_icon1."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec2_text1(){
	$sec2_text1= esc_attr(get_option('mh_sec2_text1'));
	echo '<input type="text" name="mh_sec2_text1" value="'.$sec2_text1.'" />';
}
function mh_sec2_desc1(){
	$sec2_desc1= esc_attr(get_option('mh_sec2_desc1'));
	echo '<textarea type="text" name="mh_sec2_desc1">'.$sec2_desc1.'</textarea>';
}
function mh_sec2_icon2(){
	$sec2_icon2= esc_attr(get_option('mh_sec2_icon2'));

	//Comprovar si existeix imatge
	if( $sec2_icon2 == null){
		$sec2_icon2 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec2_icon2."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec2_icon2" value=	<?php echo "'".$sec2_icon2."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec2_text2(){
	$sec2_text2= esc_attr(get_option('mh_sec2_text2'));
	echo '<input type="text" name="mh_sec2_text2" value="'.$sec2_text2.'" />';
}
function mh_sec2_desc2(){
	$sec2_desc2= esc_attr(get_option('mh_sec2_desc2'));
	echo '<textarea type="text" name="mh_sec2_desc2">'.$sec2_desc2.'</textarea>';
}
function mh_sec2_icon3(){
	$sec2_icon3= esc_attr(get_option('mh_sec2_icon3'));

	//Comprovar si existeix imatge
	if( $sec2_icon3 == null){
		$sec2_icon3 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec2_icon3."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec2_icon3" value=	<?php echo "'".$sec2_icon3."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec2_text3(){
	$sec2_text3= esc_attr(get_option('mh_sec2_text3'));
	echo '<input type="text" name="mh_sec2_text3" value="'.$sec2_text3.'" />';
}
function mh_sec2_desc3(){
	$sec2_desc3= esc_attr(get_option('mh_sec2_desc3'));
	echo '<textarea type="text" name="mh_sec2_desc3">'.$sec2_desc3.'</textarea>';
}
function mh_sec2_icon4(){
	$sec2_icon4= esc_attr(get_option('mh_sec2_icon4'));

	//Comprovar si existeix imatge
	if( $sec2_icon4 == null){
		$sec2_icon4 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec2_icon4."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec2_icon4" value=	<?php echo "'".$sec2_icon4."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec2_text4(){
	$sec2_text4= esc_attr(get_option('mh_sec2_text4'));
	echo '<input type="text" name="mh_sec2_text4" value="'.$sec2_text4.'" />';
}
function mh_sec2_desc4(){
	$sec2_desc4= esc_attr(get_option('mh_sec2_desc4'));
	echo '<textarea type="text" name="mh_sec2_desc4">'.$sec2_desc4.'</textarea>';
}
function mh_sec2_icon5(){
	$sec2_icon5= esc_attr(get_option('mh_sec2_icon5'));

	//Comprovar si existeix imatge
	if( $sec2_icon5 == null){
		$sec2_icon5 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec2_icon5."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec2_icon5" value=	<?php echo "'".$sec2_icon5."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec2_text5(){
	$sec2_text5= esc_attr(get_option('mh_sec2_text5'));
	echo '<input type="text" name="mh_sec2_text5" value="'.$sec2_text5.'" />';
}
function mh_sec2_desc5(){
	$sec2_desc5= esc_attr(get_option('mh_sec2_desc5'));
	echo '<textarea type="text" name="mh_sec2_desc5">'.$sec2_desc5.'</textarea>';
}
function mh_sec2_icon6(){
	$sec2_icon6= esc_attr(get_option('mh_sec2_icon6'));

	//Comprovar si existeix imatge
	if( $sec2_icon6 == null){
		$sec2_icon6 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec2_icon6."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec2_icon6" value=	<?php echo "'".$sec2_icon6."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec2_text6(){
	$sec2_text6= esc_attr(get_option('mh_sec2_text6'));
	echo '<input type="text" name="mh_sec2_text6" value="'.$sec2_text6.'" />';
}
function mh_sec2_desc6(){
	$sec2_desc6= esc_attr(get_option('mh_sec2_desc6'));
	echo '<textarea type="text" name="mh_sec2_desc6">'.$sec2_desc6.'</textarea>';
}

function mh_img_sec3_name(){
	$img_sec3= esc_attr(get_option('mh_img_sec3'));

	//Comprovar si existeix imatge
	if( $img_sec3 == null){
		$img_sec3 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$img_sec3."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_img_sec3" value=	<?php echo "'".$img_sec3."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_text_sec3(){
	$text_sec3= esc_attr(get_option('mh_text_sec3'));
	echo '<input type="text" name="mh_text_sec3" value="'.$text_sec3.'" />';
}
function mh_sec3_icon1(){
	$sec3_icon1= esc_attr(get_option('mh_sec3_icon1'));

	//Comprovar si existeix imatge
	if( $sec3_icon1 == null){
		$sec3_icon1 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec3_icon1."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec3_icon1" value=	<?php echo "'".$sec3_icon1."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec3_icon2(){
	$sec3_icon2= esc_attr(get_option('mh_sec3_icon2'));

	//Comprovar si existeix imatge
	if( $sec3_icon2 == null){
		$sec3_icon2 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec3_icon2."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec3_icon2" value=	<?php echo "'".$sec3_icon2."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_sec3_icon3(){
	$sec3_icon3= esc_attr(get_option('mh_sec3_icon3'));

	//Comprovar si existeix imatge
	if( $sec3_icon3 == null){
		$sec3_icon3 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$sec3_icon3."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_sec3_icon3" value=	<?php echo "'".$sec3_icon3."'"; ?> />
			</div>
		</div>
	<?php
}

function mh_text_contact(){
	$text_contact= esc_attr(get_option('mh_text_contact'));
	echo '<input type="text" name="mh_text_contact" value="'.$text_contact.'" />';
}



function mh_xarxes_esq_icon1(){
	$xarxes_esq_icon1= esc_attr(get_option('mh_xarxes_esq_icon1'));

	//Comprovar si existeix imatge
	if( $xarxes_esq_icon1 == null){
		$xarxes_esq_icon1 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$xarxes_esq_icon1."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_xarxes_esq_icon1" value=	<?php echo "'".$xarxes_esq_icon1."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_xarxes_esq_icon2(){
	$xarxes_esq_icon2= esc_attr(get_option('mh_xarxes_esq_icon2'));

	//Comprovar si existeix imatge
	if( $xarxes_esq_icon2 == null){
		$xarxes_esq_icon2 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$xarxes_esq_icon2."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_xarxes_esq_icon2" value=	<?php echo "'".$xarxes_esq_icon2."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_xarxes_esq_icon3(){
	$xarxes_esq_icon3= esc_attr(get_option('mh_xarxes_esq_icon3'));

	//Comprovar si existeix imatge
	if( $xarxes_esq_icon3 == null){
		$xarxes_esq_icon3 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$xarxes_esq_icon3."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_xarxes_esq_icon3" value=	<?php echo "'".$xarxes_esq_icon3."'"; ?> />
			</div>
		</div>
	<?php
}

function mh_xarxes_dret_icon1(){
	$xarxes_dret_icon1= esc_attr(get_option('mh_xarxes_dret_icon1'));

	//Comprovar si existeix imatge
	if( $xarxes_dret_icon1 == null){
		$xarxes_dret_icon1 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$xarxes_dret_icon1."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_xarxes_dret_icon1" value=	<?php echo "'".$xarxes_dret_icon1."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_xarxes_dret_icon2(){
	$xarxes_dret_icon2= esc_attr(get_option('mh_xarxes_dret_icon2'));

	//Comprovar si existeix imatge
	if( $xarxes_dret_icon2 == null){
		$xarxes_dret_icon2 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$xarxes_dret_icon2."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_xarxes_dret_icon2" value=	<?php echo "'".$xarxes_dret_icon2."'"; ?> />
			</div>
		</div>
	<?php
}
function mh_xarxes_dret_icon3(){
	$xarxes_dret_icon3= esc_attr(get_option('mh_xarxes_dret_icon3'));

	//Comprovar si existeix imatge
	if( $xarxes_dret_icon3 == null){
		$xarxes_dret_icon3 =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$xarxes_dret_icon3."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_xarxes_dret_icon3" value=	<?php echo "'".$xarxes_dret_icon3."'"; ?> />
			</div>
		</div>
	<?php
}

function mh_banner_dret_text_name(){
	$banner_dret_text= esc_attr(get_option('mh_banner_dret_text'));
	echo '<input type="text" name="mh_banner_dret_text" value="'.$banner_dret_text.'" />';
}
function mh_banner_dret_name(){
	$image_banner_dret= esc_attr(get_option('mh_banner_dret'));

	//Comprovar si existeix imatge
	if( $image_banner_dret == null){
		$image_banner_dret =  get_template_directory_uri() . '/img/no-image.png';
	}
	?>
		<div class="form-group select_img">
			<img src=<?php echo "'".$image_banner_dret."'"; ?> class="getImage" >
			<div class='container_input'>
				<input type="button" class="form-control btnImage" name="btnImage" id="btnImage" value="Upload Image"/>
				<input type="hidden" class="saveImage" name="mh_banner_dret" value=	<?php echo "'".$image_banner_dret."'"; ?> />
			</div>
		</div>
	<?php
}

function mh_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/mh-settings.php' );
}










// 1. Registrar el Custom Post Type
function create_insta_post_type() {
    register_post_type('insta_post',
        array(
            'labels'      => array(
                'name'          => __('InstaPosts'),
                'singular_name' => __('InstaPost'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'), // Asegurarse de que el soporte para thumbnails está habilitado
            'rewrite'     => array('slug' => 'insta_post'),
            //'show_in_rest'=> true, // Habilitar API REST
        )
    );
}
add_action('init', 'create_insta_post_type');

// Registrar la taxonomía para las categorías
function create_insta_post_taxonomy() {
    register_taxonomy('insta_post_category', 'insta_post', array(
        'labels' => array(
            'name' => __('Categorias de InstaPost'),
            'singular_name' => __('Categoria de InstaPost'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'insta_post_category'),
    ));

    // Crear la categoría "Mosaic"
    if (!term_exists('Mosaic', 'insta_post_category')) {
        wp_insert_term('Mosaic', 'insta_post_category');
    }
}
add_action('init', 'create_insta_post_taxonomy');

// 2. Añadir soporte para hasta 10 imágenes o videos desde la Media Gallery
function add_insta_post_meta_boxes() {
    add_meta_box('insta_post_media', 'Media', 'render_insta_post_media_meta_box', 'insta_post', 'normal', 'default');
}
add_action('add_meta_boxes', 'add_insta_post_meta_boxes');

function render_insta_post_media_meta_box($post) {
    $media = get_post_meta($post->ID, '_insta_post_media', true);
    $thumb = get_post_meta($post->ID, '_insta_post_thumb', true); // Obtener la miniatura
    wp_nonce_field('save_insta_post_media', 'insta_post_media_nonce');
    echo '<div id="insta-post-media-fields">';
    for ($i = 0; $i < 10; $i++) {
        $value = isset($media[$i]) ? $media[$i] : '';
        echo '<p><label for="insta_post_media_'.$i.'">Media '.($i + 1).': </label>';
        echo '<input type="hidden" id="insta_post_media_'.$i.'" name="insta_post_media[]" value="'.esc_attr($value).'" />';
        echo '<button type="button" class="button select-media-button" data-target="#insta_post_media_'.$i.'" data-index="'.$i.'">Select Media</button>';
        if ($value) {
            if (preg_match('/\.(mp4|webm)$/i', $value)) {
                echo '<br><video src="'.esc_url($value).'" style="max-width:100px;" class="media-preview" autoplay loop muted></video>';
                // Mostrar la opción para seleccionar una miniatura si es un video
                if ($i == 0) {
                    echo '<br><label for="insta_post_thumb">Thumbnail: </label>';
                    echo '<input type="hidden" id="insta_post_thumb" name="insta_post_thumb" value="'.esc_attr($thumb).'" />';
                    echo '<button type="button" class="button select-thumbnail-button" data-target="#insta_post_thumb">Select Thumbnail</button>';
                    if ($thumb) {
                        echo '<br><img src="'.esc_url($thumb).'" style="max-width:100px;" class="thumb-preview" />';
                    }
                }
            } else {
                echo '<br><img src="'.esc_url($value).'" style="max-width:100px;" class="media-preview" />';
            }
        }
        echo '</p>';
    }
    echo '</div>';
}

function save_insta_post_media($post_id) {
    // Verificar nonce para seguridad
    if (!isset($_POST['insta_post_media_nonce']) || !wp_verify_nonce($_POST['insta_post_media_nonce'], 'save_insta_post_media')) {
        return;
    }
    // Evitar guardado automático
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Verificar permisos del usuario
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Guardar los medios
    if (isset($_POST['insta_post_media'])) {
        update_post_meta($post_id, '_insta_post_media', array_map('esc_url_raw', $_POST['insta_post_media']));
    }
    // Guardar la miniatura
    if (isset($_POST['insta_post_thumb'])) {
        update_post_meta($post_id, '_insta_post_thumb', esc_url_raw($_POST['insta_post_thumb']));
    }
}
add_action('save_post', 'save_insta_post_media');

// 3. Crear el shortcode para mostrar los posts
function insta_post_shortcode() {
    $query = new WP_Query(array(
        'post_type' => 'insta_post',
        'posts_per_page' => -1,
        'order' => 'DESC',
    ));
    if ($query->have_posts()) {
        $output = '<div class="insta-post-feed">';
        $mosaic_count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            $media = get_post_meta(get_the_ID(), '_insta_post_media', true);
            $thumb = get_post_meta(get_the_ID(), '_insta_post_thumb', true); // Obtener la miniatura
            $categories = wp_get_post_terms(get_the_ID(), 'insta_post_category', array('fields' => 'slugs'));

            $mosaic_class = '';
            if (in_array('mosaic', $categories)) {
                $mosaic_class = ' mosaic';
                // Manejar posts Mosaic
                $mosaic_position = $mosaic_count % 3;
                $mosaic_image_index = ($mosaic_position == 0) ? 0 : ($mosaic_position == 1 ? 1 : 2);
                $mosaic_count++;
            } else {
                // Manejar posts no Mosaic
                $mosaic_position = null;
                $mosaic_image_index = 0;
            }

            $first_media_url = isset($media[$mosaic_image_index]) ? $media[$mosaic_image_index] : '';
            $output .= '<div class="insta-post-item '.($mosaic_position !== null ? 'mosaic-'.$mosaic_position : '').$mosaic_class.'">';
            $output .= '<a href="'.esc_url($first_media_url).'" class="insta-post-link" data-media="'.esc_attr(json_encode($media)).'" data-content="'.get_the_content().'" data-post-id="'.get_the_ID().'">';
            // Mostrar la miniatura si el primer media es un video
            if (preg_match('/\.(mp4|webm)$/i', $first_media_url) && $thumb) {
                $output .= '<img src="'.esc_url($thumb).'" alt="'.get_the_title().'"/>';
            } else {
                $output .= '<img src="'.esc_url($first_media_url).'" alt="'.get_the_title().'"/>';
            }
            $output .= '</a>';
            $output .= '</div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No InstaPosts found</p>';
    }
}
add_shortcode('insta_posts', 'insta_post_shortcode');

// 4. Añadir scripts y estilos necesarios para el popup de galería y el Media Uploader
function enqueue_insta_post_scripts() {
    wp_enqueue_style('insta-post-gallery', get_template_directory_uri().'/css/insta-post-gallery.css');
    wp_enqueue_script('insta-post-gallery', get_template_directory_uri().'/js/insta-post-gallery.js', array('jquery'), null, true);
    wp_localize_script('insta-post-gallery', 'wpApiSettings', array(
        'root' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest')
    ));
    wp_enqueue_media();
    // Incluir Swiper JS
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

    // Incluir el nuevo archivo edit-insta-post.js
    wp_enqueue_script('edit-insta-post', get_template_directory_uri().'/js/edit-insta-post.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_insta_post_scripts');
add_action('wp_enqueue_scripts', 'enqueue_insta_post_scripts');
?>
