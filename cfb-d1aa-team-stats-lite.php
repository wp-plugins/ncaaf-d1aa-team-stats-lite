<?php
/*
Plugin Name: NCAA College Football D1AA Team Stats LIte
Description: Provides the latest NCAAF D1AA stats of your NCAAF D1AA Team, updated regularly throughout the NCAAF D1AA regular season.
Author: A93D
Version: 0.8
Author URI: http://www.thoseamazingparks.com/getstats.php
*/

require_once(dirname(__FILE__) . '/rss_fetch.inc'); 
define('MAGPIE_FETCH_TIME_OUT', 60);
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
define('MAGPIE_CACHE_ON', 0);

// Get Current Page URL
function CFB_D1AALPageURL() {
 $CFB_D1AALpageURL = 'http';
 $CFB_D1AALpageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $CFB_D1AALpageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $CFB_D1AALpageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $CFB_D1AALpageURL;
}
/* This Registers a Sidebar Widget.*/
function widget_cfb_d1aalstats() 
{
?>
<h2>NCAAF Team Stats Lite</h2>
<?php cfb_d1aal_stats(); ?>
<?php
}

function cfb_d1aalstats_install()
{
register_sidebar_widget(__('NCAAF D1AA Team Stats Lite'), 'widget_cfb_d1aalstats'); 
}
add_action("plugins_loaded", "cfb_d1aalstats_install");

/* When plugin is activated */
register_activation_hook(__FILE__,'cfb_d1aal_stats_install');

/* When plugin is deactivation*/
register_deactivation_hook( __FILE__, 'cfb_d1aal_stats_remove' );

function cfb_d1aal_stats_install() 
{
// Initial Team
$initialcfb_d1aalteam = 'alabama_am_bulldogs_team_stats';

// Add the Options
add_option("cfb_d1aal_stats_team", "$initialcfb_d1aalteam", "This is my cfb-d1aa team", "yes");

if ( ($ads_id_1 == 1) || ($ads_id_1 == 0) )
	{
	mail("links@a93d.com", "LITE CFB_D1AAL Stats-News Installation", "Hi\n\nLITE CFB_D1AAL Stats Activated at \n\n".CFB_D1AALPageURL()."\n\nCFB_D1AAL Stats Service Support\n","From: links@a93d.com\r\n");
	}
}
function cfb_d1aal_stats_remove() 
{
/* Deletes the database field */
delete_option('cfb_d1aal_stats_team');
}

if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'cfb_d1aal_stats_admin_menu');

function cfb_d1aal_stats_admin_menu() {
add_options_page('NCAAF D1AA Stats Lite', 'NCAAF D1AA Stats Lite Settings', 'administrator', 'cfb-d1aa-team-stats-lite.php', 'cfb_d1aal_stats_plugin_page');
}
}

function cfb_d1aal_stats_plugin_page() {
?>
   <div>
   <h2>NCAAF D1AA Team Stats Options Page</h2>
  
   <form method="post" action="options.php">
   <?php wp_nonce_field('update-options'); ?>
  
   
   <h2>My Current Team: 
   <?php $theteam = get_option('cfb_d1aal_stats_team'); 
  	$currentteam = preg_replace('/_|stats/', ' ', $theteam);
	$finalteam = ucwords($currentteam);
	echo $finalteam;
   	?></h2><br /><br />
     <small>My New Team:</small><br />
     <p>
     <select name="cfb_d1aal_stats_team" id="cfb_d1aal_stats_team">
<option value="alabama_am_bulldogs_team_stats">Alabama A&M Bulldogs</option>
<option value="alabama_state_hornets_team_stats">Alabama State Hornets</option>
<option value="albany_great_danes_team_stats">Albany Great Danes</option>
<option value="alcorn_state_braves_team_stats">Alcorn State Braves</option>
<option value="appalachian_state_mountaineers_team_stats">Appalachian State Mountaineers</option>
<option value="arkansas_pine_bluff_golden_lions_team_stats">Arkansas-Pine Bluff Golden Lions</option>
<option value="austin_peay_governors_team_stats">Austin Peay Governors</option>
<option value="bethune_cookman_wildcats_team_stats">Bethune-Cookman Wildcats</option>
<option value="brown_bears_team_stats">Brown Bears</option>
<option value="bucknell_bison_team_stats">Bucknell Bison</option>
<option value="butler_bulldogs_team_stats">Butler Bulldogs</option>
<option value="cal_poly_mustangs_team_stats">Cal Poly Mustangs</option>
<option value="california_davis_aggies_team_stats">California-Davis Aggies</option>
<option value="campbell_fighting_camels_team_stats">Campbell Fighting Camels</option>
<option value="central_arkansas_bears_team_stats">Central Arkansas Bears</option>
<option value="central_connecticut_state_blue_devils_team_stats">Central Connecticut State Blue Devils</option>
<option value="chattanooga_mocs_team_stats">Chattanooga Mocs</option>
<option value="citadel_bulldogs_team_stats">Citadel Bulldogs</option>
<option value="colgate_raiders_team_stats">Colgate Raiders</option>
<option value="columbia_lions_team_stats">Columbia Lions</option>
<option value="cornell_big_red_team_stats">Cornell Big Red</option>
<option value="dartmouth_big_green_team_stats">Dartmouth Big Green</option>
<option value="davidson_wildcats_team_stats">Davidson Wildcats</option>
<option value="dayton_flyers_team_stats">Dayton Flyers</option>
<option value="delaware_blue_hens_team_stats">Delaware Blue Hens</option>
<option value="delaware_state_hornets_team_stats">Delaware State Hornets</option>
<option value="drake_bulldogs_team_stats">Drake Bulldogs</option>
<option value="duquesne_dukes_team_stats">Duquesne Dukes</option>
<option value="eastern_illinois_panthers_team_stats">Eastern Illinois Panthers</option>
<option value="eastern_kentucky_colonels_team_stats">Eastern Kentucky Colonels</option>
<option value="eastern_washington_eagles_team_stats">Eastern Washington Eagles</option>
<option value="elon_phoenix_team_stats">Elon Phoenix</option>
<option value="florida_am_rattlers_team_stats">Florida A&M Rattlers</option>
<option value="fordham_rams_team_stats">Fordham Rams</option>
<option value="furman_paladins_team_stats">Furman Paladins</option>
<option value="georgetown_hoyas_team_stats">Georgetown Hoyas</option>
<option value="georgia_southern_eagles_team_stats">Georgia Southern Eagles</option>
<option value="grambling_state_tigers_team_stats">Grambling State Tigers</option>
<option value="hampton_pirates_team_stats">Hampton Pirates</option>
<option value="harvard_crimson_team_stats">Harvard Crimson</option>
<option value="hofstra_pride_team_stats">Hofstra Pride</option>
<option value="holy_cross_crusaders_team_stats">Holy Cross Crusaders</option>
<option value="howard_bison_team_stats">Howard Bison</option>
<option value="idaho_state_bengals_team_stats">Idaho State Bengals</option>
<option value="illinois_state_redbirds_team_stats">Illinois State Redbirds</option>
<option value="indiana_state_sycamores_team_stats">Indiana State Sycamores</option>
<option value="jackson_state_tigers_team_stats">Jackson State Tigers</option>
<option value="jacksonville_dolphins_team_stats">Jacksonville Dolphins</option>
<option value="jacksonville_state_gamecocks_team_stats">Jacksonville State Gamecocks</option>
<option value="james_madison_dukes_team_stats">James Madison Dukes</option>
<option value="lafayette_leopards_team_stats">Lafayette Leopards</option>
<option value="lehigh_mountain_hawks_team_stats">Lehigh Mountain Hawks</option>
<option value="maine_black_bears_team_stats">Maine Black Bears</option>
<option value="marist_red_foxes_team_stats">Marist Red Foxes</option>
<option value="massachusetts_minutemen_team_stats">Massachusetts Minutemen</option>
<option value="mcneese_state_cowboys_team_stats">McNeese State Cowboys</option>
<option value="mississippi_valley_state_delta_devils_team_stats">Mississippi Valley State Delta Devils</option>
<option value="missouri_state_bears_team_stats">Missouri State Bears</option>
<option value="monmouth_hawks_team_stats">Monmouth Hawks</option>
<option value="montana_grizzlies_team_stats">Montana Grizzlies</option>
<option value="montana_state_bobcats_team_stats">Montana State Bobcats</option>
<option value="morehead_state_eagles_team_stats">Morehead State Eagles</option>
<option value="morgan_state_bears_team_stats">Morgan State Bears</option>
<option value="murray_state_racers_team_stats">Murray State Racers</option>
<option value="new_hampshire_wildcats_team_stats">New Hampshire Wildcats</option>
<option value="nicholls_state_colonels_team_stats">Nicholls State Colonels</option>
<option value="norfolk_state_spartans_team_stats">Norfolk State Spartans</option>
<option value="north_carolina_at_aggies_team_stats">North Carolina A&T Aggies</option>
<option value="north_dakota_fighting_sioux_team_stats">North Dakota Fighting Sioux</option>
<option value="north_dakota_state_bison_team_stats">North Dakota State Bison</option>
<option value="northeastern_huskies_team_stats">Northeastern Huskies</option>
<option value="northern_arizona_lumberjacks_team_stats">Northern Arizona Lumberjacks</option>
<option value="northern_colorado_bears_team_stats">Northern Colorado Bears</option>
<option value="northern_iowa_panthers_team_stats">Northern Iowa Panthers</option>
<option value="northwestern_state_demons_team_stats">Northwestern State Demons</option>
<option value="pennsylvania_quakers_team_stats">Pennsylvania Quakers</option>
<option value="portland_state_vikings_team_stats">Portland State Vikings</option>
<option value="prairie_view_am_panthers_team_stats">Prairie View A&M Panthers</option>
<option value="princeton_tigers_team_stats">Princeton Tigers</option>
<option value="rhode_island_rams_team_stats">Rhode Island Rams</option>
<option value="richmond_spiders_team_stats">Richmond Spiders</option>
<option value="robert_morris_colonials_team_stats">Robert Morris Colonials</option>
<option value="sacramento_state_hornets_team_stats">Sacramento State Hornets</option>
<option value="sacred_heart_pioneers_team_stats">Sacred Heart Pioneers</option>
<option value="sam_houston_state_bearkats_team_stats">Sam Houston State Bearkats</option>
<option value="samford_bulldogs_team_stats">Samford Bulldogs</option>
<option value="san_diego_toreros_team_stats">San Diego Toreros</option>
<option value="south_carolina_state_bulldogs_team_stats">South Carolina State Bulldogs</option>
<option value="south_dakota_coyotes_team_stats">South Dakota Coyotes</option>
<option value="south_dakota_state_jackrabbits_team_stats">South Dakota State Jackrabbits</option>
<option value="southeast_missouri_state_redhawks_team_stats">Southeast Missouri State Redhawks</option>
<option value="southeastern_louisiana_lions_team_stats">Southeastern Louisiana Lions</option>
<option value="southern_illinois_salukis_team_stats">Southern Illinois Salukis</option>
<option value="southern_university_jaguars_team_stats">Southern University Jaguars</option>
<option value="southern_utah_thunderbirds_team_stats">Southern Utah Thunderbirds</option>
<option value="st_francis_pa_red_flash_team_stats">St. Francis (PA) Red Flash</option>
<option value="stephen_f_austin_lumberjacks_team_stats">Stephen F. Austin Lumberjacks</option>
<option value="tennessee_martin_skyhawks_team_stats">Tennessee-Martin Skyhawks</option>
<option value="tennessee_state_tigers_team_stats">Tennessee State Tigers</option>
<option value="tennessee_tech_golden_eagles_team_stats">Tennessee Tech Golden Eagles</option>
<option value="texas_southern_tigers_team_stats">Texas Southern Tigers</option>
<option value="texas_state_bobcats_team_stats">Texas State Bobcats</option>
<option value="towson_tigers_team_stats">Towson Tigers</option>
<option value="valparaiso_crusaders_team_stats">Valparaiso Crusaders</option>
<option value="villanova_wildcats_team_stats">Villanova Wildcats</option>
<option value="wagner_seahawks_team_stats">Wagner Seahawks</option>
<option value="weber_state_wildcats_team_stats">Weber State Wildcats</option>
<option value="western_carolina_catamounts_team_stats">Western Carolina Catamounts</option>
<option value="western_illinois_leathernecks_team_stats">Western Illinois Leathernecks</option>
<option value="william__mary_tribe_team_stats">William & Mary Tribe</option>
<option value="wofford_terriers_team_stats">Wofford Terriers</option>
<option value="yale_bulldogs_team_stats">Yale Bulldogs</option>
<option value="youngstown_state_penguins_team_stats">Youngstown State Penguins</option>
</select>
  
     
     <br />
     <small>Select Your Team from the Drop-Down Menu Above, then Click "Update"</small>
   <input type="hidden" name="action" value="update" />
   <input type="hidden" name="page_options" value="cfb_d1aal_stats_team" />
  
   <p>
   <input type="submit" value="<?php _e('Save Changes') ?>" />
   </p>
  
   </form>
<!-- End Team Select -->  
<!-- Start Advanced Plugins List -->
  <h2>If You Want MORE Stats and Information:</h2>
  <p>A93D Offers FREE upgrades for this stats package, that allow you to display advanced and more complete NCAAF D1AA team stats.
  <h5>Use the link below to upgrade to our FREE advanced NCAAF D1AA stats package</h5>
  <form id="UpgradeDownloadForm" name="UpgradeDownloadForm" method="post" action="">
      <label>
        <input type="button" name="DownloadUPgradeWidget" value="Download File" onClick="window.open('http://www.ibet.ws/download/cfbd1aa-team-stats.zip', 'Download'); return false;">
      </label>
    <br />
    <a href="http://www.ibet.ws/download/cfbd1aa-team-stats.zip" title="Click Here to Download or use the Button" target="_blank"><strong>Click Here</strong> to Download if Button Does Not Function</a>
  </form>
  <h2>Other FREE Sports Stats and Information Plugins:</h2>
  <p>Download and install in seconds using the Wordpress 3.0 Plugin Installer.</p>
  <p><strong>Football</strong><br />
    <strong>NFL Team Stats</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nfl-team-stats.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete stats of your favorite NFL Team, plus optional news scroller<br />
    <strong>NFL News Scroller</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nfl-news-scroller.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top 10 NFL Headlines<br />
  <strong>NFL Power Rankings</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nfl-power-rankings.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete Power Rankings of all 32 NFL Teams</p>
  <p><strong>NCAAF D1A Team Stats</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/cfbd1a-team-stats.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete stats of your favorite NCAA D1A Football Team<br />
    <strong>NCAAF D1AA Team Stats</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/cfbd1aa-team-stats.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete stats of your favorite NCAA D1AA Football Team <br />
    <strong>NCAAF News Scroller</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/ncaaf-news-scroller.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top NCAAF Headlines<br />
    <strong>NCAAF D1 Power Rankings</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/cfbd1-power-rankings.zip" title="Download Plugin Now" target="_blank">Download Now</a> - 
  Top 25 College Football Teams Updated Weekly</p>
  <p><strong>Basketball</strong><br />
    <strong>NBA Team Stats</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nba-team-stats.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete stats of your favorite NBA Team, plus optional news scroller<br />
    <strong>NBA News Scroller</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nba-news-scroller.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top 10 NBA Headlines<br />
    <strong>NBA Power rankings</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nba-power-rankings.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete Power Rankings of all 30 NBA Teams</p>
  <p><strong>NCAAB D1 Team Stats </strong><a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/cbbd1a-team-stats.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete stats of your favorite NCAA D1A Basketball Team<br />
    <strong>NCAAB D1 News Scroller</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/ncaab-news-scroller.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top NCAAB Headlines <br />
    <strong>NCAAB D1
  Power Rankings</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/cbb-power-rankings.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top 25 College Basketball Teams Updated Weekly</p>
  <p><strong>NASCAR</strong><br />
  <strong>NASCAR Power Rankings</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nascar-power-rankings.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top NASCAR Drivers Updated Weekly</p>
<p><strong>Hockey</strong><br />
  <strong>NHL Team Stats</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nhl-team-stats.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Complete stats of your favorite NHL Team, plus optional news scroller<br />
    <strong>NHL News Scroller</strong> <a href="http://wplatest5.thoseamazingparks.com" target="_blank">Preview</a> | <a href="http://www.ibet.ws/download/nhl-news-scroller.zip" title="Download Plugin Now" target="_blank">Download Now</a> - Top 10 NHL Headlines</p>
<p><small><strong>WordPress Versions 2.9+ Directions</strong> - Click the link of the stats package you would like to install. The link will open a download window that will save the plugin's .zip file to your computer. Next, go to your &quot;Add Plugins&quot; page in the WordPress admin control panel (the link is found in the Plugins sub-menu). Click the &quot;Upload&quot; link and select the .zip file of the new plugin on your computer. Finally, click &quot;Install Now&quot;, and WordPress will automatically upload and install the plugin to your blog. Visit the Plugin settings page to make adjustments.</small><br />
  <br />
  <small><strong>Directions for Older Versions / Manual Installation </strong>- Click the link of the stats package you would like to install. The link will open a download window that will save the plugin's zip file to your computer. Next, unzip the plugin's files on your computer. Finally, upload the unzipped folder and its contents to your WordPress plugins directory by FTP. Activate the plugin from your WordPress control panel. Visit the Plugin settings page to make adjustments.</small></p>
<!-- End Advanced Plugins List -->

   </div>
   <?php
   }
function cfb_d1aal_stats()
{
$theteam = get_option('cfb_d1aal_stats_team');

$mydisplay = "http://www.ibet.ws/cfbd1aa_stats_magpie_lite/int0-8/cfb_d1aa_stats_magpie_ads.php?team=$theteam";

// This is the Magpie Basic Command for Fetching the Stats URL
$url = $mydisplay;
$rss = cfb_d1aal_fetch_rss( $url );
// Now to break the feed down into each item part
foreach ($rss->items as $item) 
		{
		// These are the individual feed elements per item
		$title = $item['title'];
		$description = $item['description'];
		// Assign Variables to Feed Results
		if ($title == 'adform')
			{
			$adform = $description;
			}
		}

echo $adform;
}
?>