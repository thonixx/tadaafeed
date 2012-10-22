<?php
	
	// manipulate tadaa feed
	// scripted by Michael Tanner
	//
	// NOTES
	// - more features may be added later (only if needed to manipulate more things on tadaa feed
	// 
	//
	// https://github.com/thonixx/tadaafeed
	//
	// License: CC-BY-SA
	// https://creativecommons.org/licenses/by-sa/3.0/ch/
	//
        //////////////////////////////////////
    
    
	
	//////////////////////////////
	////// EDIT THIS TO YOUR NEEDS
	// where to save the final rss
	$rssfile = $_GET['user'].'.rss';
	///////////////////////////////
	
	// set right header (content type things)
	header("Content-Type: application/rss+xml; charset=utf-8");
	
	// twitter search api url
	$tadaa_url = 'http://www.tadaa.net/'.$rssfile;
	// get the results
	$tadaa = file_get_contents($tadaa_url);
	
	// replace m800le with m1200le
	// for higher resolution in tadaa's rss feed
	$output = str_replace('m800le', 'm1200le', $tadaa);
	
	// now write the stuff to the rss feed
	file_put_contents($rssfile, $tadaa)

?>
