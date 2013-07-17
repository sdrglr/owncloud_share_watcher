<?php
/**
* ownCloud - files_share_watcher
*
* @author Serdar GÜLER - http://twitter.com/sdrglr
* @copyright 2013 Serdar GÜLER serdar.guler{at}gmail.com
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/


// CLASSPATH
OC::$CLASSPATH['OC_Share_Watcher'] = 'apps/files_share_watcher/lib/watcher.php';

// HOOK CONNECTS
OCP\Util::connectHook('OCP\Share', 'post_shared', 'OC_Share_Watcher', 'post_shared');
OCP\Util::connectHook('OCP\Share', 'post_unshare', 'OC_Share_Watcher', 'post_unshare');

