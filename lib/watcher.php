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


class OC_Share_Watcher {

	static public function post_shared(array $param) {
	
                $itemType=$param['itemType'];
                $itemSource=$param['itemSource'];
                $itemTarget=$param['itemTarget'];
                $parent=$param['parent'];
                $shareType=$param['shareType'];
                $shareWith=$param['shareWith'];
                $uidOwner=$param['uidOwner'];
                $permissions=$param['permissions'];
                $fileSource=$param['fileSource'];
                $fileTarget=str_replace("/","",$param['fileTarget']);
                $id=$param['id'];
                $token=$param['token'];

                if (isset($shareWith)) {                
            	    if (preg_match("/[^a-z][^0-9][^A-Z]/",$shareWith)) {
            		self::log(''.$uidOwner.' SHARED a '.$itemType.' called as \''.$fileTarget.'\' (ID:'.$itemSource.', PERM:'.$permissions.') as a link ('.$token.') with token ('.$shareWith.')');
            	    } else {
            		self::log(''.$uidOwner.' SHARED a '.$itemType.' called as \''.$fileTarget.'\' (ID:'.$itemSource.', PERM:'.$permissions.') with '.$shareWith.'');
            	    }
            	} else {
            	    self::log(''.$uidOwner.' SHARED a '.$itemType.' called as \''.$fileTarget.'\' (ID:'.$itemSource.', PERM:'.$permissions.') as a link ('.$token.')');
            	}

		
	}

	static public function post_unshare(array $param) {

                $itemType=$param['itemType'];
                $itemSource=$param['itemSource'];
                $shareType=$param['shareType'];
                $shareWith=$param['shareWith'];
                $itemParent=$param['itemParent'];
                
                if (isset($shareWith)) {
            	    self::log('Previously shared '.$itemType.' (ID:'.$itemSource.') with '.$shareWith.' UNSHARED right now');
        	} else {
        	    self::log('Previously shared '.$itemType.' (ID:'.$itemSource.') as a link, UNSHARED right now');
        	}

	}
	
	static protected function log($msg) {
		OCP\Util::writeLog('file_share_watcher', $msg, OCP\Util::INFO);
	}
}
