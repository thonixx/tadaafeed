<?php
	
	// manipulate tadaa feed
	// scripted by Michael Tanner
	//
	// NOTES
	// - more features may be added later (only if needed to manipulate more things on tadaa feed)
	// 
	//
	// https://github.com/thonixx/tadaafeed
	//
	// License: CC-BY-SA
	// https://creativecommons.org/licenses/by-sa/3.0/ch/
	//
        //////////////////////////////////////
    
    
	// user variable
	$user = $_GET['user'];
	
	// set to user thonixx (me) if no user provided
	if(empty($user)) $user = 'thonixx';
	
	//////////////////////////////
	////// EDIT THIS TO YOUR NEEDS
	// where to save the final rss
	$rssfile = $user.'.rss';
	///////////////////////////////

	// set right header (content type things)
	// header("Content-Type: application/rss+xml; charset=utf-8");
	
	// twitter search api url
	$tadaa_url = 'http://www.tadaa.net/'.$rssfile;
	// get the results
	$tadaa = file_get_contents($tadaa_url);
	
	// replace m800le with m1200le
	// for higher resolution in tadaa's rss feed
	$output = str_replace('m800le', 'm1200le', $tadaa);
	// also replace annoying special char (which is not really ASCII)
	$output = str_replace('➹', 'Location: ', $output);
	// and replace some äöü
	$output = str_replace('ä', 'ae', $output);
	$output = str_replace('ö', 'oe', $output);
	$output = str_replace('ü', 'ue', $output);
	$output = str_replace('Ä', 'Ae', $output);
	$output = str_replace('Ö', 'Oe', $output);
	$output = str_replace('Ü', 'Ue', $output);

	// now write the stuff to the rss feed
	// file_put_contents($output, $tadaa); // disabled due to insufficient rights
	echo $output;

	// echo "Your high resolution tadaa feed is placed here:<br />";
	// echo "<a href=\"$user.rss\">$user's Tadaa feed</a>";

?>
