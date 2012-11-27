<?php
/**
* @copyright (C) 2007 OsJoomla Solution
* @author OsJoomla
* @license http://joomseller.com
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onPrepareContent', 'botOjaccess' );

/**
* Access Plugin
*
* <b>Usage:</b>
* <code>{ojaccess [!]group[,group]}...some content...{/ojaccess}</code>
*
* One ore more group name should be passed, you can expressly deny access by putting a '!'
* before the group name in question.  It will keep looping through the list provided until
* it finds a 'true' value so strange results may occur with conflicting group access. The
* standard Joomla! hierarchy applies so an Editor, would be allowed to see content secured
* by the Registered or Author group names.
*
* Valid group names are:
*
* - guest
* - registered
* - author
* - editor
* - publisher
* - manager
* - administrator
* - super administrator
* - special (administrator or super administrator)
*
* Examples:
*
* {ojaccess guest}shows only to guest users{/ojaccess}
* {ojaccess !guest}shows to all users who are not a guest{/ojaccess}
* {ojaccess registered}shows to all users who are registered{/ojaccess}
* {ojaccess guest,!editor}shows to all guests and members who are NOT editors{/ojaccess}
* {ojaccess editor,special}shows to editors, administrators, and superadministrators{/ojaccess}
*
*/
function botOjaccess( &$row, &$params, $page=0 ) {
	// define the regular expression for the bot
	$regex = "#{ojaccess(.*?)}(.*?){/ojaccess}#s";

	$row->text = preg_replace_callback( $regex, 'botOjaccess_replacer', $row->text );

	return true;
}
/**
* Replaces the matched tags an image
* @param array An array of matches (see preg_match_all)
* @return string
*/
function botOjaccess_replacer( &$matches ) {
	$user =& JFactory::getUser();

	$text = $matches[2];
	if (@$matches[1]) {
		$accessLevels = explode(",", trim($matches[1]));
		foreach ($accessLevels as $access) {
			$negoffset = strpos($access, '!');
			if ($negoffset === false) {
				//no mods needed
			} else {
				$access = substr($access, $negoffset+1);
			}
			if (hasAccessLevel(strtolower($user->usertype), trim($access), $negoffset)) return $text;
		}

	}

	return "";
}

function hasAccessLevel($userType, $level, $operator=true) {


	if (!isset($userType) or $userType=="") $userType = "guest";

	$allLevels = array( 'guest'=>'guest',
						'registered'=>'registered',
						'author'=>'registered,author',
						'editor'=>'registered,author,editor',
						'publisher'=>'registered,author,editor,publisher',
						'manager'=>'manager',
						'administrator'=>'manager,administrator,special',
						'super administrator'=>'manager,administrator,super administrator,special');

			if (in_array($userType, array_keys($allLevels))) {
				if ($operator === false) {
					if (in_array(strtolower($level),explode(",", $allLevels[$userType]))) return true;
				} else {
					if (!in_array(strtolower($level),explode(",", $allLevels[$userType]))) return true;
				}
			}
		return false;
}

?>
