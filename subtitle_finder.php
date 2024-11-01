<?php
/*
Plugin Name: Subtitle Finder
Plugin URI: https://wordpress.org/plugins/subtitle-finder/
Description: This plugin can search Online in subscene.com and give to your users Subtitle of movies
Version: 1.6
Author: Mohammadreza Dehqany
Author URI: http://parsgraph.net/subtitle_finder/
License: Copy Right bY ParsGraph.net on 2016
*/
function get_name($name){
$text = explode("\n",$name);
for($i=3;$i<count($text);$i++){
    $txt = trim($text[$i]);
    if(!empty($txt) && $txt != $lang){
    $text = $txt;
    break;
    }
}
return $text;
}
function subt_setting(){
if(isset($_POST['save'])){
update_option("subt_lang",$_POST['language']);
update_option("subt_direct",$_POST['direct']);
update_option("subt_accept",$_POST['subt_accept']);
echo "<br>";
_e("Settings are changed Successfully","subt");
}
$lang[get_option("subt_lang")]="selected";
$direct[get_option("subt_direct")] = "selected";
$langs = '<select name="language">
<option>Please select</option>
<option value="Albanian" '.$lang['Albanian'].'>Albanian</option>
<option value="Arabic" '.$lang['Arabic'].'>Arabic</option>
<option value="Azerbaijani" '.$lang['Azerbaijani'].'>Azerbaijani</option>
<option value="Bengali" '.$lang['Bengali'].'>Bengali</option>
<option value="Big-5-code" '.$lang['Big-5-code'].'>Big 5 code</option>
<option value="Bosnian" '.$lang['Bosnian'].'>Bosnian</option>
<option value="Brazillian-Portuguese" '.$lang['Brazillian-Portuguese'].'>Brazillian Portuguese</option>
<option value="Bulgarian" '.$lang['Bulgarian'].'>Bulgarian</option>
<option value="Bulgarian_English" '.$lang['Bulgarian_English'].'>Bulgarian/ English</option>
<option value="Burmese" '.$lang['Burmese'].'>Burmese</option>
<option value="Catalan" '.$lang['Catalan'].'>Catalan</option>
<option value="Chinese-BG-code" '.$lang['Chinese-BG-code'].'>Chinese BG code</option>
<option value="Croatian" '.$lang['Croatian'].'>Croatian</option>
<option value="Czech" '.$lang['Czech'].'>Czech</option>
<option value="Danish" '.$lang['Danish'].'>Danish</option>
<option value="Dutch" '.$lang['Dutch'].'>Dutch</option>
<option value="Dutch_English" '.$lang['Dutch_English'].'>Dutch/ English</option>
<option value="English" '.$lang['English'].'>English</option>
<option value="English_German" '.$lang['English_German'].'>English/ German</option>
<option value="Esperanto" '.$lang['Esperanto'].'>Esperanto</option>
<option value="Estonian" '.$lang['Estonian'].'>Estonian</option>
<option value="Farsi_Persian" '.$lang['Farsi_Persian'].'>Farsi/Persian</option>
<option value="Finnish" '.$lang['Finnish'].'>Finnish</option>
<option value="French" '.$lang['French'].'>French</option>
<option value="Georgian" '.$lang['Georgian'].'>Georgian</option>
<option value="German" '.$lang['German'].'>German</option>
<option value="Greek" '.$lang['Greek'].'>Greek</option>
<option value="Greenlandic" '.$lang['Greenlandic'].'>Greenlandic</option>
<option value="Hebrew" '.$lang['Hebrew'].'>Hebrew</option>
<option value="Hindi" '.$lang['Hindi'].'>Hindi</option>
<option value="Hungarian" '.$lang['Hungarian'].'>Hungarian</option>
<option value="Hungarian_English" '.$lang['Hungarian_English'].'>Hungarian/ English</option>
<option value="Icelandic" '.$lang['Icelandic'].'>Icelandic</option>
<option value="Italian"  '.$lang['Italian'].'>Italian</option>
<option value="Japanese"  '.$lang['Japanese'].'>Japanese</option>
<option value="Korean"  '.$lang['Korean'].'>Korean</option>
<option value="Kurdish"  '.$lang['Kurdish'].'>Kurdish</option>
<option value="Latvian"  '.$lang['Latvian'].'>Latvian</option>
<option value="Lithuanian"  '.$lang['Lithuanian'].'>Lithuanian</option>
<option value="Macedonian"  '.$lang['Macedonian'].'>Macedonian</option>
<option value="Malay"  '.$lang['Malay'].'>Malay</option>
<option value="Malayalam"  '.$lang['Malayalam'].'>Malayalam</option>
<option value="Manipuri"  '.$lang['Manipuri'].'>Manipuri</option>
<option value="Norwegian"  '.$lang['Norwegian'].'>Norwegian</option>
<option value="Polish"  '.$lang['Polish'].'>Polish</option>
<option value="Portuguese"  '.$lang['Portuguese'].'>Portuguese</option>
<option value="Romanian"  '.$lang['Romanian'].'>Romanian</option>
<option value="Russian"  '.$lang['Russian'].'>Russian</option>
<option value="Serbian"  '.$lang['Serbian'].'>Serbian</option>
<option value="Sinhala"  '.$lang['Sinhala'].'>Sinhala</option>
<option value="Slovak"  '.$lang['Slovak'].'>Slovak</option>
<option value="Slovenian"  '.$lang['Slovenian'].'>Slovenian</option>
<option value="Spanish"  '.$lang['Spanish'].'>Spanish</option>
<option value="Swedish"  '.$lang['Swedish'].'>Swedish</option>
<option value="Tagalog"  '.$lang['Tagalog'].'>Tagalog</option>
<option value="Tamil"  '.$lang['Tamil'].'>Tamil</option>
<option value="Telugu"  '.$lang['Telugu'].'>Telugu</option>
<option value="Thai"  '.$lang['Thai'].'>Thai</option>
<option value="Turkish"  '.$lang['Turkish'].'>Turkish</option>
<option value="Ukranian"  '.$lang['Ukranian'].'>Ukranian</option>
<option value="Urdu"  '.$lang['Urdu'].'>Urdu</option>
<option value="Vietnamese"  '.$lang['Vietnamese'].'>Vietnamese</option>
</select>';
if(get_option("subt_accept") == 1)
$radio1 = "checked";
else 
$radio0 = "checked";
echo '<form method="post">';
echo "<br>".__("this plugin Powered By attributions Did You accept this ?","subt")." : ".__("yes","subt")." <input type='radio' name='subt_accept' ".$radio1." value='1'> - ".__("no","subt")."<input type='radio' name='subt_accept' ".$radio0." value='0'> (".__("If you dont accept this , plugin cant work Correctly","subt").")<br>\n";
echo "<br>".__("Select your language","subt")." : ".$langs;
echo '<br>'.__("Users download Directly on your web site","subt").' : <select name="direct"><option value="1" '.$direct[1].'>True</option><option value="0" '.$direct[0].'>False</option></select>';
echo '<br><input type="submit" name="save" value="'.__("save","subt").'"></form>';
}
function subt_setpanell(){
add_submenu_page('options-general.php',__("Subtitle Finder","subt"), __("Subtitle Finder","subt"), 'manage_options','subt-public-setting', 'subt_setting'); 
}
add_action('admin_menu', 'subt_setpanell'); 
function subtitle_finder($name,$lang=null){
if(!empty($name) && get_option("subt_accept") == 1){
	$lang = strtolower($lang);
if(empty($lang)){
	$lang = strtolower(get_option("subt_lang"));
}
$s = curl_init(); 
if($lang == "all")
curl_setopt($s,CURLOPT_URL,"https://subscene.com/subtitles/".strtolower($name)); 
else
curl_setopt($s,CURLOPT_URL,"https://subscene.com/subtitles/".strtolower($name)."/".$lang);
curl_setopt($s,CURLOPT_RETURNTRANSFER,true); 
$codes = curl_exec($s); 
if(curl_error($s)){
$exit = __("Cannot Connect to Subscene.com","subt");
}
curl_close($s); 
preg_match_all("#<table>(.*)</table>#s",$codes,$code);
$code = preg_replace("#<thead>(.*)</thead>#s","",$code[0]);
$code = $code[0];
$dom = new DOMDocument;
@$dom->loadHTML('<?xml encoding="utf-8" ?>'.$code);
$links = $dom->getElementsByTagName('a');
$exit = '<div class="subtitle_finder">';
foreach ($links as $link) {
$text = $link->nodeValue;
$url = $link->getAttribute('href');
$text = get_name($text);
if(!preg_match("#/u/#",$url) && $text != "upload"){
$filename = base64_encode(str_replace(" ","-",$text).".zip");
$url = base64_encode($url);
$exit.='<li><a href="'.get_bloginfo("url").'/?url='.$url.'&filename='.$filename.'&subtdl" title="'.$text.'">'.$text.'</a></li>';
$finded = 1;
}
}
$exit.="</div>";
if(empty($finded)){
$exit = __("Subtitle Not Found","subt");
}
}

return $exit;
}
function subt_search($movie,$lang=null){
	if(!empty($movie) && get_option("subt_accept") == 1){
$s = curl_init(); 
$results = array();
curl_setopt($s,CURLOPT_URL,"https://subscene.com/subtitles/title?q=".str_replace(" ","+",$movie)); 
curl_setopt($s,CURLOPT_RETURNTRANSFER,true); 
$codes = curl_exec($s); 
if(curl_error($s)){
$results[0] = __("Cannot Connect to Subscene.com","subt");
}
curl_close($s);

$dom = new DOMDocument;
@$dom->loadHTML('<?xml encoding="utf-8" ?>'.$codes);
$xpath = new DOMXPath($dom);
$div = $xpath->query('//div[@class="search-result"]');
$div = $div->item(0);
$result = $dom->saveXML($div);
preg_match_all("#<ul>(.*)</ul>#Us",$result,$matches);
$result = $matches[0][0];
$dom = new DOMDocument;
@$dom->loadHTML('<?xml encoding="utf-8" ?>'.$result);
$links = $dom->getElementsByTagName('a');
foreach($links as $link){
$text = $link->nodeValue;
$url = $link->getAttribute('href');
if(!empty($lang))
$results[] = '<li><a href="'.get_bloginfo("url").'/subtitles/'.get_the_id().'/'.base64_encode(str_replace("subtitles/","",$url)).'/'.$lang.'">'.$text."</a></li>\n";
else
$results[] = '<li><a href="'.get_bloginfo("url").'/subtitles/'.get_the_id().'/'.base64_encode(str_replace("subtitles/","",$url)).'">'.$text."</a></li>\n";
}

if(empty($results)){
$results[0] = __("Subtitle Not Found","subt");
return $results;
} else { 
return $results;
}
	}
}
function subt_shortcode( $atts ) {
	if(!isset($_GET['movie'])){
    $movies = subt_search($atts['movie']);
	foreach($movies as $movie){
	$res.= $movie;
	}
	return $res;
	}
	else
	echo subtitle_finder(base64_decode($_GET['movie']));
}
function subt_searchform(){
global $post,$wp_query;

if(isset($_POST['language']))	
$lang[$_POST['language']]="selected";
else if (!empty($wp_query->query_vars['lang']))
$lang[$wp_query->query_vars['lang']] = "selected";
else
$lang[get_option("subt_lang")]="selected";
?>
<div class="subtitle_finder">
<form method="post" action="<?php the_permalink(); ?>">
<input type="text" name="movie" placeholder="<?php _e("Enter Your Movie Name","subt"); ?>" value="<?php echo $_POST['movie'] ? $_POST['movie'] : substr(base64_decode($wp_query->query_vars['movie']),1); ?>">
<select name="language">
<option value="all"><?php echo __("All Language","subt"); ?></option>
<option value="Albanian" <?php echo $lang['Albanian']; ?>>Albanian</option>
<option value="Arabic" <?php echo $lang['Arabic']; ?>>Arabic</option>
<option value="Azerbaijani" <?php echo $lang['Azerbaijani']; ?>>Azerbaijani</option>
<option value="Bengali" <?php echo $lang['Bengali']; ?>>Bengali</option>
<option value="Big-5-code" <?php echo $lang['Big-5-code']; ?>>Big 5 code</option>
<option value="Bosnian" <?php echo $lang['Bosnian']; ?>>Bosnian</option>
<option value="Brazillian-Portuguese" <?php echo $lang['Brazillian-Portuguese']; ?>>Brazillian Portuguese</option>
<option value="Bulgarian" <?php echo $lang['Bulgarian']; ?>>Bulgarian</option>
<option value="Bulgarian_English" <?php echo $lang['Bulgarian_English']; ?>>Bulgarian/ English</option>
<option value="Burmese" <?php echo $lang['Burmese']; ?>>Burmese</option>
<option value="Catalan" <?php echo $lang['Catalan']; ?>>Catalan</option>
<option value="Chinese-BG-code" <?php echo $lang['Chinese-BG-code']; ?>>Chinese BG code</option>
<option value="Croatian" <?php echo $lang['Croatian']; ?>>Croatian</option>
<option value="Czech" <?php echo $lang['Czech']; ?>>Czech</option>
<option value="Danish" <?php echo $lang['Danish']; ?>>Danish</option>
<option value="Dutch" <?php echo $lang['Dutch']; ?>>Dutch</option>
<option value="Dutch_English" <?php echo $lang['Dutch_English']; ?>>Dutch/ English</option>
<option value="English" <?php echo $lang['English']; ?>>English</option>
<option value="English_German" <?php echo $lang['English_German']; ?>>English/ German</option>
<option value="Esperanto" <?php echo $lang['Esperanto']; ?>>Esperanto</option>
<option value="Estonian" <?php echo $lang['Estonian']; ?>>Estonian</option>
<option value="Farsi_Persian" <?php echo $lang['Farsi_Persian']; ?>>Farsi/Persian</option>
<option value="Finnish" <?php echo $lang['Finnish']; ?>>Finnish</option>
<option value="French" <?php echo $lang['French']; ?>>French</option>
<option value="Georgian" <?php echo $lang['Georgian']; ?>>Georgian</option>
<option value="German" <?php echo $lang['German']; ?>>German</option>
<option value="Greek" <?php echo $lang['Greek']; ?>>Greek</option>
<option value="Greenlandic" <?php echo $lang['Greenlandic']; ?>>Greenlandic</option>
<option value="Hebrew" <?php echo $lang['Hebrew']; ?>>Hebrew</option>
<option value="Hindi" <?php echo $lang['Hindi']; ?>>Hindi</option>
<option value="Hungarian" <?php echo $lang['Hungarian']; ?>>Hungarian</option>
<option value="Hungarian_English" <?php echo $lang['Hungarian_English']; ?>>Hungarian/ English</option>
<option value="Icelandic" <?php echo $lang['Icelandic']; ?>>Icelandic</option>
<option value="Italian"  <?php echo $lang['Italian']; ?>>Italian</option>
<option value="Japanese"  <?php echo $lang['Japanese']; ?>>Japanese</option>
<option value="Korean"  <?php echo $lang['Korean']; ?>>Korean</option>
<option value="Kurdish"  <?php echo $lang['Kurdish']; ?>>Kurdish</option>
<option value="Latvian"  <?php echo $lang['Latvian']; ?>>Latvian</option>
<option value="Lithuanian"  <?php echo $lang['Lithuanian']; ?>>Lithuanian</option>
<option value="Macedonian"  <?php echo $lang['Macedonian']; ?>>Macedonian</option>
<option value="Malay"  <?php echo $lang['Malay']; ?>>Malay</option>
<option value="Malayalam"  <?php echo $lang['Malayalam']; ?>>Malayalam</option>
<option value="Manipuri"  <?php echo $lang['Manipuri']; ?>>Manipuri</option>
<option value="Norwegian"  <?php echo $lang['Norwegian']; ?>>Norwegian</option>
<option value="Polish"  <?php echo $lang['Polish']; ?>>Polish</option>
<option value="Portuguese"  <?php echo $lang['Portuguese']; ?>>Portuguese</option>
<option value="Romanian"  <?php echo $lang['Romanian']; ?>>Romanian</option>
<option value="Russian"  <?php echo $lang['Russian']; ?>>Russian</option>
<option value="Serbian"  <?php echo $lang['Serbian']; ?>>Serbian</option>
<option value="Sinhala"  <?php echo $lang['Sinhala']; ?>>Sinhala</option>
<option value="Slovak"  <?php echo $lang['Slovak']; ?>>Slovak</option>
<option value="Slovenian"  <?php echo $lang['Slovenian']; ?>>Slovenian</option>
<option value="Spanish"  <?php echo $lang['Spanish']; ?>>Spanish</option>
<option value="Swedish"  <?php echo $lang['Swedish']; ?>>Swedish</option>
<option value="Tagalog"  <?php echo $lang['Tagalog']; ?>>Tagalog</option>
<option value="Tamil"  <?php echo $lang['Tamil']; ?>>Tamil</option>
<option value="Telugu"  <?php echo $lang['Telugu']; ?>>Telugu</option>
<option value="Thai"  <?php echo $lang['Thai']; ?>>Thai</option>
<option value="Turkish"  <?php echo $lang['Turkish']; ?>>Turkish</option>
<option value="Ukranian"  <?php echo $lang['Ukranian']; ?>>Ukranian</option>
<option value="Urdu"  <?php echo $lang['Urdu']; ?>>Urdu</option>
<option value="Vietnamese"  <?php echo $lang['Vietnamese']; ?>>Vietnamese</option>
</select>
<input type="submit" name="send" value="<?php _e("Search","subt"); ?>">
</form>
<div style="direction:ltr;text-align:left;margin:10px 0;">
<?php
if(isset($_POST['send'])){
$_POST['movie']=str_replace(" ","-",$_POST['movie']);
if(!empty($_POST['movie']) && preg_match('/^[\-\a-z0-9]/i',$_POST['movie'])){
$_POST['movie']=str_replace("+","-",$_POST['movie']);
$movies = subt_search($_POST['movie'],$_POST['language']);
foreach($movies as $movie){
	echo $movie;
}
}
}
if(!empty($wp_query->query_vars['movie']) && !isset($_POST['send'])){
echo subtitle_finder(base64_decode($wp_query->query_vars['movie']),$wp_query->query_vars['lang']);
}
?> <br><a href="http://parsgraph.net/subtitle_finder" target="_blank">Powered By Subtitle Finder</a></div></div> <?php
}
add_shortcode('subtitle_finder', 'subt_shortcode');
add_shortcode('subtitle_finder_searchform', 'subt_searchform');
function subt_init() {
 global $wp_rewrite;
 load_plugin_textdomain( 'subt', false, 'subtitle-finder/langs' );
 add_rewrite_tag('%movie%', '(.*)');
 add_rewrite_tag('%lang%', '(.*)');
 add_rewrite_rule('^subtitles/([0-9]+)/(.*)/(.*)/?', 'index.php?page_id=$matches[1]&movie=$matches[2]&lang=$matches[3]', 'top');
 $wp_rewrite->flush_rules( false );
}
function header_function_subt(){
	echo "<link rel='stylesheet' href='".plugins_url()."/subtitle-finder/style.css' type='text/css' media='all' />\n";
}
require_once('download.php');
add_action('wp_head', 'header_function_subt');
add_action('init', 'subt_download');
add_action('init', 'subt_init');
?>