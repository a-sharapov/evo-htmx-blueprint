<?php
if( ! defined('IN_MANAGER_MODE') || IN_MANAGER_MODE !== true) {
    die("<b>INCLUDE_ORDERING_ERROR</b><br /><br />Please use the EVO Content Manager instead of accessing this file directly.");
}

// action list
$GLOBALS['action_list'] = array(
	'1'	=> 'Loading a frame(set)',
	'2'	=> 'Viewing dashboard',
	'3'	=> 'Viewing data for resource',
	'4'	=> 'Creating a resource',
	'5'	=> 'Saving resource',
	'6'	=> 'Deleting resource',
	'7'	=> 'Waiting while EVO cleans up',
	'8'	=> 'Logged out',
	'9'	=> 'Viewing help',
	'10'	=> 'Viewing/ composing messages',
	'11'	=> 'Creating a user',
	'12'	=> 'Editing user',
	'13'	=> 'Viewing logging',
	'14'	=> 'Editing a parser',
	'15'	=> 'Saving a parser',
	'16'	=> 'Editing template',
	'17'	=> 'Editing settings',
	'18'	=> 'Viewing Credits :)',
	'19'	=> 'Creating a new template',
	'20'	=> 'Saving template',
	'21'	=> 'Deleting template',
	'22'	=> 'Editing Snippet',
	'23'	=> 'Creating a new Snippet',
	'24'	=> 'Saving Snippet',
	'25'	=> 'Deleting Snippet',
	'26'	=> 'Refreshing site',
	'27'	=> 'Editing resource',
	'28'	=> 'Changing password',
	'29'	=> 'Error',
	'30'	=> 'Saving settings',
	'31'	=> 'Using file manager',
	'32'	=> 'Saving user',
	'33'	=> 'Deleting user',
	'34'	=> 'Saving new password',
	'35'	=> 'Editing role',
	'36'	=> 'Saving role',
	'37'	=> 'Deleting role',
	'38'	=> 'Creating new role',
	'40'	=> 'Editing Access Permissions',
	'41'	=> 'Editing Access Permissions',
	'42'	=> 'Editing Access Permissions',
	'43'	=> 'Editing Access Permissions',
	'44'	=> 'Editing Access Permissions',
	'45'	=> 'Idle',
	'46'	=> 'Editing Access Permissions',
	'47'	=> 'Editing Access Permissions',
	'48'	=> 'Editing Access Permissions',
	'49'	=> 'Editing Access Permissions',
	'50'	=> 'Editing Access Permissions',
	'51'	=> 'Moving resource',
	'52'	=> 'Moved resource',
	'53'	=> 'Viewing system info',
	'54'	=> 'Optimizing a table',
	'55'	=> 'Empty logs',
	'56'	=> 'Refresh resource tree',
	'57'	=> 'Refresh menu',
	'58'	=> 'Logged in',
	'59'    => 'About EVO',
	'60'	=> 'Emptying Recycle Bin',
	'61'	=> 'Publishing a resource',
	'62'	=> 'Un-publishing a resource',
	'63'	=> 'Un-deleting a resource',
	'64'	=> 'Removing deleted content',
	'65'	=> 'Deleting a message',
	'66'	=> 'Sending a message',
	'67'	=> 'Removing locks',
	'68'	=> 'Viewing site logging',
	'69'	=> 'Viewing online visitors',
	'70'	=> 'Viewing site schedule',
	'71'	=> 'Searching',
	'72'	=> 'Adding a weblink',
	'73'	=> 'Editing a weblink',
		//case "74" : return "Changing personal preferences"; break;
	'75'	=> 'User/ role management',
	'76'	=> 'Element management',
	'77'	=> 'Creating a new Chunk (HTML Snippet)',
	'78'	=> 'Editing Chunk (HTML Snippet)',
	'79'	=> 'Saving Chunk (HTML Snippet)',
	'80'	=> 'Deleting Chunk (HTML Snippet)',
	'83'	=> 'Exporting a resource to HTML',
	'84'	=> 'Load Element Selector',
	'85'	=> 'Create Folder',
	'86'	=> 'Role management',
	'87'	=> 'Create new web user',
	'88'	=> 'Editing web user',
	'89'	=> 'Saving web user',
	'90'	=> 'Deleting web user',
	'91'	=> 'Editing Web Access Permissions',
	'92'	=> 'Editing Access Permissions',
	'93'	=> 'Backup Manager',
	'94'	=> 'Duplicate resource',
	'95'	=> 'Importing resources from HTML',
	'96'	=> 'Duplicate Template',
	'97'	=> 'Duplicate Chunk (HTML Snippet)',
	'98'	=> 'Duplicate Snippet',
	'99'	=> 'Manage Web Users',
	'100'	=> 'Previewing resource',
	'101'	=> 'Create new plugin',
	'102'	=> 'Edit plugin',
	'103'	=> 'Saving plugin',
	'104'	=> 'Delete plugin',
	'105'	=> 'Duplicate plugin',
	'106'	=> 'Viewing Modules',
	'107'	=> 'Create new module',
	'108'	=> 'Edit module',
	'109'	=> 'Saving module',
	'110'	=> 'Delete module',
	'111'	=> 'Duplicate module',
	'112'	=> 'Execute module',
	'113'	=> 'Manage module dependencies',
	'114'	=> 'View event log',
	'115'	=> 'View event log details',
	'116'	=> 'Delete event log',
	'117'   => 'Editing tv rank',
	'118'   => 'Call settings ajax include',
	'119'   => 'Login Fail (Temporary Block)',
	'120'   => 'Categories manager',

	'300'	=> 'Create Template Variable',
	'301'	=> 'Edit Template Variable',
	'302'	=> 'Save Template Variable',
	'303'	=> 'Delete Template Variable',
	'304'	=> 'Duplicate Template Variable',

	'200'	=> 'Viewing phpInfo()',
	'501'   => 'Delete category',
	'998'	=> 'Viewing web page',
	'999'	=> 'Viewing test page',
);

/**
 * @param string $actionId
 * @param string $itemid
 * @return string
 */
function getAction($actionId, $itemid='') {
	global $action_list;

	$ret = sprintf($action_list[$actionId], $itemid);
	if (!$ret) $ret = "Idle (unknown)";

	return $ret;
}
