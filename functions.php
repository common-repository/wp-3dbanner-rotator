<?php
function rotator_get_def_settings()
{
	$rotator_settings = array('slideshow_width' => '600',
	'slideshow_height' => '240',
	'navbar_color' => 'FFFFFF',
	'navbar_height' => '30',
	'navbar_alpha' => '0.6',
	'navbar_but_color' => '222222',
	'progressbar_height' => '3',
	'progressbar_color' => '222222',
	'progressbar_alpha' => '0.9',
	'slideshow_shadeclr1' => 'FFF000',
	'slideshow_shadeclr2' => 'FF0000',
	'preloader_color' => 'FF0000',
	'play_button_color' => 'DDDDDD',
	'slideshowcorner_radious' => '0',
	'navcorner_radious' => '0',
	'slide_trans_effect' => 'random',
	'navbar_pos' => 'B',
	'navbar_autohide' => 'yes',
	'slidetransition_time' => '5',
	'auto_play' => 'yes',
	'slide_solid' => 'yes',
	'slideshow_font' => 'Arial',
	'title_size' => '20',
	'title_color' => 'FFFFFF',
	'desc_pos' => 'BR',
	'desc_size' => '15',
	'desc_color' => 'FFFFFF',
	'descbox_bgcolor' => '000000',
	'descbox_bgcolor_alpha' => '0.7',
	'descbox_bgvertmargin' => '50',
	'descbox_bghorzmargin' => '50',
	'desc_vertmargin' => '10',
	'desc_horzmargin' => '10',
	'scale_image' => 'false',
	'wmode' => 'transparent',
	'target' => '_self'	
			);
	return $rotator_settings;
}
function __get_rotator_xml_settings()
{
	$ops = get_option('rotator_settings', array());
	$xml_settings = '<general>
  
    <areaWidth 					value="'.$ops['slideshow_width'].'"/>
    <areaHeight 				value="'.$ops['slideshow_height'].'"/>
	<bannerWidth 				value="'.$ops['slideshow_width'].'"/>
    <bannerHeight 				value="'.$ops['slideshow_height'].'"/>
	<navigationBarThickness 	value="'.$ops['navbar_height'].'"/>
	<timeBarThickness 			value="'.$ops['progressbar_height'].'"/>
    
	<shaderColor1 			value="0x'.$ops['slideshow_shadeclr1'].'"/>
	<shaderColor2 			value="0x'.$ops['slideshow_shadeclr2'].'"/>

	<preloaderColor 		value="0x'.$ops['preloader_color'].'"/>
	<bannerBgColor 			value="0xFFFFFF"/>
	<navigationBarColor 	value="0x'.$ops['navbar_color'].'"/>
	<navigationBarAlpha 	value="'.$ops['navbar_alpha'].'"/>
	<timeBarColor 			value="0x'.$ops['progressbar_color'].'"/>
	<timeBarAlpha 			value="'.$ops['progressbar_alpha'].'"/>
	<scrollButtonColor 		value="0x'.$ops['navbar_but_color'].'"/>
	<playButtonColor 		value="0x'.$ops['play_button_color'].'"/>
	
	<bannerRoundCorners			value="'.$ops['slideshowcorner_radious'].'"/>

	<scrollButtonRoundCorners	value="'.$ops['navcorner_radious'].'"/>
	
	<slideResize 			value="no"/>
	<slideAlign 			value="C"/>
	<slideTransitionEffect	value="'.$ops['slide_trans_effect'].'"/>
	<navigationBarAlign 	value="'.$ops['navbar_pos'].'"/>
	<navigationBarAutoHide 	value="'.$ops['navbar_autohide'].'"/>
	<delayTime 				value="'.$ops['slidetransition_time'].'"/>
	<autoPlay 				value="'.$ops['auto_play'].'"/>
	<solid 					value="'.$ops['slide_solid'].'"/>                     

	
	<textStyles				value="p {font-family:Arial; leading:-4; }
								  .smallDark {color:'.$ops['desc_color'].'; font-size:'.$ops['desc_size'].';}

								  .bigDark {font-size:'.$ops['title_size'].'; color:'.$ops['title_color'].';}
								   "/>
  </general>';
	return $xml_settings;
}
function rotator_get_album_dir($album_id)
{
	global $grtr;
	$album_dir = RTR_PLUGIN_UPLOADS_DIR . "/{$album_id}_uploadfolder";
	return $album_dir;
}
/**
 * Get album url
 * @param $album_id
 * @return unknown_type
 */
function rotator_get_album_url($album_id)
{
	global $grtr;
	$album_url = RTR_PLUGIN_UPLOADS_URL . "/{$album_id}_uploadfolder";
	return $album_url;
}
function rotator_get_table_actions(array $tasks)
{
	?>
	<div class="bulk_actions">
		<form action="" method="post" class="bulk_form">Bulk action
			<select name="task">
				<?php foreach($tasks as $t => $label): ?>
				<option value="<?php print $t; ?>"><?php print $label; ?></option>
				<?php endforeach; ?>
			</select>
			<button class="button-secondary do_bulk_actions" type="submit">Do</button>
		</form>
	</div>
	<?php 
}
function shortcode_display_rotator_gallery($atts)
{
	$vars = shortcode_atts( array(
									'cats' => '',
									'imgs' => '',
								), 
							$atts );
	//extract( $vars );
	
	$ret = display_rotator_gallery($vars);
	return $ret;
}
function display_rotator_gallery($vars)
{
	global $wpdb, $grtr;
	$ops = get_option('rotator_settings', array());
	//print_r($ops);
	$albums = null;
	$images = null;
	$cids = trim($vars['cats']);
	if (strlen($cids) != strspn($cids, "0123456789,")) {
		$cids = '';
		$vars['cats'] = '';
	}
	$imgs = trim($vars['imgs']);
	if (strlen($imgs) != strspn($imgs, "0123456789,")) {
		$imgs = '';
		$vars['imgs'] = '';
	}
	$categories = '';
	$xml_filename = '';
	if( !empty($cids) && $cids{strlen($cids)-1} == ',')
	{
		$cids = substr($cids, 0, -1);
	}
	if( !empty($imgs) && $imgs{strlen($imgs)-1} == ',')
	{
		$imgs = substr($imgs, 0, -1);
	}
	//check for xml file
	if( !empty($vars['cats']) )
	{
		$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';	
	}
	elseif( !empty($vars['imgs']))
	{
		$xml_filename = "image_".str_replace(',', '', $imgs) . '.xml';
	}
	else
	{
		$xml_filename = "rotator_all.xml";
	}
	//die(RTR_PLUGIN_XML_DIR . '/' . $xml_filename);

	$imageContainer = "";
	
	if( !empty($vars['cats']) )
	{
		$query = "SELECT * FROM {$wpdb->prefix}rotator_albums WHERE album_id IN($cids) AND status = 1 ORDER BY `order` ASC";
		//print $query;
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $grtr->rotator_get_album_images($album['album_id']);
			if ($images && !empty($images) && is_array($images)) {
				$album_dir = rotator_get_album_url($album['album_id']);//RTR_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				foreach($images as $key => $img)
				{
					if( $img['status'] == 0 ) continue;
					
					$imageContainer .= "<slide scale=\"".$ops['scale_image']."\" 
					src=\"".$album_dir."/big/".$img['image']."\" 
					url=\"{$img['link']}\"
					target=\"".$ops['target']."\"
					resize = \"no\"
					align = \"C\"
					transitionEffect = \"".$ops['slide_trans_effect']."\"><text bgColor=\"0x".$ops['descbox_bgcolor']."\" bgAlpha=\"".$ops['descbox_bgcolor_alpha']."\" bgMarginV=\"".$ops['desc_vertmargin']."\" bgMarginH=\"".$ops['desc_horzmargin']."\" align=\"".$ops['desc_pos']."\" alignMarginH=\"".$ops['descbox_bghorzmargin']."\" alignMarginV=\"".$ops['descbox_bgvertmargin']."\"><title color=\"0x".$ops['title_color']."\" size=\"".$ops['title_size']."\" font=\"Arial\"><![CDATA[".$img['title']."]]></title><description color=\"0x".$ops['desc_color']."\" size=\"".$ops['desc_size']."\" font=\"Arial\"><![CDATA[".($ops['show_desc']=='no'||$img['description']==""?"":$img['description'])."]]>
     </description></text></slide>";
				}
			}
		}
		//$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';
	}
	elseif( !empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}rotator_images WHERE image_id IN($imgs) AND status = 1 ORDER BY `order` ASC";
		$images = $wpdb->get_results($query, ARRAY_A);
		if ($images && !empty($images) && is_array($images)) {
			foreach($images as $key => $img)
			{
				$album = $grtr->rotator_get_album($img['category_id']);
				$album_dir = rotator_get_album_url($album['album_id']);//RTR_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				if( $img['status'] == 0 ) continue;
				
					$imageContainer .= "<slide scale=\"".$ops['scale_image']."\" 
					src=\"".$album_dir."/big/".$img['image']."\" 
					url=\"{$img['link']}\"
					target=\"".$ops['target']."\"
					resize = \"no\"
					align = \"C\"
					transitionEffect = \"".$ops['slide_trans_effect']."\"><text bgColor=\"0x".$ops['descbox_bgcolor']."\" bgAlpha=\"".$ops['descbox_bgcolor_alpha']."\" bgMarginV=\"".$ops['desc_vertmargin']."\" bgMarginH=\"".$ops['desc_horzmargin']."\" align=\"".$ops['desc_pos']."\" alignMarginH=\"".$ops['descbox_bghorzmargin']."\" alignMarginV=\"".$ops['descbox_bgvertmargin']."\"><title color=\"0x".$ops['title_color']."\" size=\"".$ops['title_size']."\" font=\"Arial\"><![CDATA[".$img['title']."]]></title><description color=\"0x".$ops['desc_color']."\" size=\"".$ops['desc_size']."\" font=\"Arial\"><![CDATA[".($ops['show_desc']=='no'||$img['description']==""?"":$img['description'])."]]>
     </description></text></slide>";
			}
		}
	}
	//no values paremeters setted
	else//( empty($vars['cats']) && empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}rotator_albums WHERE status = 1 ORDER BY `order` ASC";
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $grtr->rotator_get_album_images($album['album_id']);
			$album_dir = rotator_get_album_url($album['album_id']);//RTR_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
			if ($images && !empty($images) && is_array($images)) {
				foreach($images as $key => $img)
				{
					if($img['status'] == 0 ) continue;
					
					$imageContainer .= "<slide scale=\"".$ops['scale_image']."\" 
					src=\"".$album_dir."/big/".$img['image']."\" 
					url=\"{$img['link']}\"
					target=\"".$ops['target']."\"
					resize = \"no\"
					align = \"C\"
					transitionEffect = \"".$ops['slide_trans_effect']."\"><text bgColor=\"0x".$ops['descbox_bgcolor']."\" bgAlpha=\"".$ops['descbox_bgcolor_alpha']."\" bgMarginV=\"".$ops['desc_vertmargin']."\" bgMarginH=\"".$ops['desc_horzmargin']."\" align=\"".$ops['desc_pos']."\" alignMarginH=\"".$ops['descbox_bghorzmargin']."\" alignMarginV=\"".$ops['descbox_bgvertmargin']."\"><title color=\"0x".$ops['title_color']."\" size=\"".$ops['title_size']."\" font=\"Arial\"><![CDATA[".$img['title']."]]></title><description color=\"0x".$ops['desc_color']."\" size=\"".$ops['desc_size']."\" font=\"Arial\"><![CDATA[".($ops['show_desc']=='no'||$img['description']==""?"":$img['description'])."]]>
     </description></text></slide>";
				}
			}
		}
		//$xml_filename = "rotator_all.xml";
	}
	
	$xml_tpl = __get_rotator_xml_template();
	$settings = __get_rotator_xml_settings();
	$xml = str_replace(array('{settings}', '{image_container}'), 
						array($settings, $imageContainer), $xml_tpl);
	//write new xml file
	$fh = fopen(RTR_PLUGIN_XML_DIR . '/' . $xml_filename, 'w+');
	fwrite($fh, $xml);
	fclose($fh);
	//print "<h3>Generated filename: $xml_filename</h3>";
	//print $xml;
	if( file_exists(RTR_PLUGIN_XML_DIR . '/' . $xml_filename ) )
	{
		$fh = fopen(RTR_PLUGIN_XML_DIR . '/' . $xml_filename, 'r');
		$xml = fread($fh, filesize(RTR_PLUGIN_XML_DIR . '/' . $xml_filename));
		fclose($fh);
		//print "<h3>Getting xml file from cache: $xml_filename</h3>";
		$ret_str = "
		<script language=\"javascript\">AC_FL_RunContent = 0;</script>
<script src=\"".RTR_PLUGIN_URL."/js/AC_RunActiveContent.js\" language=\"javascript\"></script>

		<script language=\"javascript\"> 
	if (AC_FL_RunContent == 0) {
		alert(\"This page requires AC_RunActiveContent.js.\");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '".$ops['slideshow_width']."',
			'height', '".$ops['slideshow_height']."',
			'src', '".RTR_PLUGIN_URL."/js/3Dbanner_rotator',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', '".$ops['wmode']."',
			'devicefont', 'false',
			'id', 'xmlswf_vmrtr',
			'bgcolor', '".$ops['backgroundColor']."',
			'name', 'xmlswf_vmrtr',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', '".RTR_PLUGIN_URL."/js/3Dbanner_rotator',
			'salign', '',
			'flashVars','settingsPath=".RTR_PLUGIN_URL."/xml/$xml_filename'
			); //end AC code
	}
</script>
";
//echo RTR_PLUGIN_UPLOADS_URL."<hr>";
//		print $xml;
		return $ret_str;
	}
	return true;
}
function __get_rotator_xml_template()
{
	$xml_tpl = '<?xml version="1.0" encoding="utf-8" ?>
				
					<settings>{settings}<!-- end settings -->
					<slides>{image_container}					    
					</slides></settings><!-- end images -->
				';
	return $xml_tpl;
}
?>