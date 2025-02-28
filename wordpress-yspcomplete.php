<?php
/*
Plugin Name: YSPComplete!
Plugin URI: http://blog.nashbrooklyn.com
Description: A WordPress Widget that allows to display items in the sidebar from a unique seller of any auction site that is powered by YSPComplete!
Version: 2012.06.04
Author: NashWorks
Author URI: http://nashbrooklyn.com
Donate URI: http://blog.nashbrooklyn.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/
class YSPCGet {
static function httpget($query) {
$ch = curl_init();
$timeout = 5;
curl_setopt($ch,CURLOPT_URL,$query);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
public static function search($site,$uname,$nbitems,$kwords) {
$query = strtolower($site.'/rssall.php?type=auctiononly&uname='.strtolower($uname).'&nbitems='.$nbitems.'kwords='.$kwords);
$xmlString = self::httpget($query);
$itemList = simplexml_load_string($xmlString);
return $itemList->channel->item;
}}
class YSPComplete extends WP_Widget {
function YSPComplete() {
$opts = array('classname' => 'widg-yspcomplete','description' => __('Display items in the sidebar from a unique seller of any auction site that is powered by YSPComplete!'));
parent::WP_Widget(false,$name = 'YSPComplete!',$opts);
}
function widget($args,$instance) {
extract($args);
$title = apply_filters('widget_title',$instance['title']);
echo $before_widget;
if ($title) echo $before_title.$title.$after_title;
$this->displayItems($instance['site'],$instance['uname'],$instance['nbitems'],$instance['kwords']);
echo $after_widget;
}
function displayItems($site,$uname,$nbitems,$kwords) {
if ($kwords!="") $kwords = explode('|',$kwords);
$item = YSPCGet::search($site,$uname,$nbitems,$kwords);
if (count($item)>0) {	
foreach($item as $itm) printf("<div class='widgetblock'>%s</div>",$itm->description);
} else {
echo "--no items--<br/>";
}}
function update($new_instance,$old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['site'] = strtolower(strip_tags($new_instance['site']));
$instance['uname'] = strtolower(strip_tags($new_instance['uname']));
$instance['nbitems'] = intval($new_instance['nbitems'],10);
$instance['kwords'] = strtolower(strip_tags($new_instance['kwords']));
return $instance;
}
function widget_FormTextBox($fieldId,$label,$hint,$value) {
echo "  <p>\n  <label for='".$this->get_field_id($fieldId)."'>"._e($label)."</label>\n <input class='widefat' id='".$this->get_field_id($fieldId)."' name='".$this->get_field_name($fieldId)."' title='"._e($hint)."' type='text' value='".$value."'/>\n  </p>\n" ;
}
function form($instance) {
$title = 'YSPComplete!';
$site = '';
$uname = '';
$nbitems = 3;
$kwords = '';
if ($instance) {
$title = esc_attr($instance['title']);
$site = esc_attr($instance['site']);
$uname = esc_attr($instance['uname']);
$nbitems = esc_attr($instance['nbitems']);
$kwords = esc_attr($instance['kwords']);
} else {
$defaults = array('title' => $title,'site' => '','uname' => '','nbitems' => 3,'kwords' => '');
$instance = wp_parse_args((array)$instance,$defaults);
}
$this->widget_FormTextBox('title','Widget Title:','',$title);
$this->widget_FormTextBox('site','Site URL:','',$site);
$this->widget_FormTextBox('uname','Username:','',$uname);
$this->widget_FormTextBox('nbitems','Number of Items:','',$nbitems);
$this->widget_FormTextBox('kwords', 'Keywords (optional):','',$kwords);
}}
add_action('widgets_init','yspcomplete_widget_init');
function yspcomplete_widget_init() {
register_widget('YSPComplete');
}