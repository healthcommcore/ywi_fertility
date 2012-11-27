--
-- Database query file
-- For manual update
--
-- @package     Sourcerer
-- @version     2.7.0
--
-- @author      Peter van Westen <peter@nonumber.nl>
-- @link        http://www.nonumber.nl
-- @copyright   Copyright (C) 2010 NoNumber! All Rights Reserved
-- @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
--

--
-- NOTE: The queries assume you are using 'jos_' as the prefix.
--       Please change that if you are using another prefix.
--

--
-- Rename old plugin name
--
UPDATE `jos_plugins`
	SET `name` = 'System - Sourcerer'
	WHERE `name` = 'System - Sourcerer!';

--
-- Rename old plugin name
--
UPDATE `jos_plugins`
	SET `name` = 'Editor Button - Sourcerer'
	WHERE `name` = 'Editor Button - Sourcerer!';

--
-- Rename old module name
--
UPDATE `jos_modules`
	SET `title` = 'Sourcerer Module'
	WHERE `title` = 'Sourcerer! Module';

--
-- Change old Sourcerer modules to normal custom HTML modules (because Sourcerer modules won't work anymore!)
--
UPDATE `jos_modules`
	SET `module` = 'mod_custom',
		`content` = replace( replace( `params`, 'text=', '' ), '\\n', '\n' ),
		`params` = ''
	WHERE `module` = 'mod_sourcerer';

--
-- Insert the system plugin record for NoNumber! Elements (if not exists)
--
INSERT IGNORE INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
( ( SELECT `id` FROM `jos_plugins` as x WHERE x.`element` = 'nonumberelements' ), 'System - NoNumber! Elements', 'nonumberelements', 'system', 0, 0, 1, 0, 0, 0, 0, '');
--
-- If above line causes an error, try this instead:
--
-- DELETE FROM `jos_plugins` WHERE `element` = 'nonumberelements'
-- INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
-- ( NULL, 'System - NoNumber! Elements', 'nonumberelements', 'system', 0, 0, 1, 0, 0, 0, 0, '');