<?php


class RemoveFiles{
    //get back to the main direcory wherever you are
    public static function backPath(){
        $currentPath = getcwd(); // get current path
        $CPArray = explode('\\', $currentPath); //split it into an array
        $cut1 = array_slice($CPArray, 3); // remove c:/xampp/htdocs
        foreach ($cut1 as $key => $value) { $cut1[$key] = "..";} //
        $path = implode("/", $cut1)."/";
        return $path;
    }
    //delete folder and it's contents
    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            //throw new InvalidArgumentException("$dirPath must be a directory");
            return false;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
    //delete specific file
    public static function deleteFile($filePath){
        if (!unlink($filePath)) { 
             return false;
        } 
        else { 
            return true;
        } 
    }
    //Removes guest folder and it's contents
    public static function removeGuest($guestID){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."guests/$guestID";
        $result = removeFiles::deleteDir($fullPath);
        return $result;
    }
    //Removes user folder and it's contents
    public static function removeUser($userID){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."users/$userID";
        $result = removeFiles::deleteDir($fullPath);
        return $result;
    }
    // Removes hotel folder and it's contents
    public static function removeHotel($userID,$hotelID){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."users/$userID/hotels/$hotelID";
        $result = removeFiles::deleteDir($fullPath);
        return $result;
    }
    // Removes user folder and it's contents
    public static function removeRoom($userID,$hotelID,$roomID){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."users/$userID/hotels/$hotelID/rooms/$roomID";
        $result = removeFiles::deleteDir($fullPath);
        if ($result) {return true;}
        else{return false;}
        
    }
    //remove room specific photo
    public static function removeHotelRoomPhoto($userID,$hotelID,$roomID,$photoName){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."users/$userID/hotels/$hotelID/rooms/$roomID/photos/$photoName";
        $result = removeFiles::deleteFile($fullPath);
        return $result;
    }
    //remove hotel specific photo
    public static function removeHotelPhoto($userID,$hotelID,$photoName){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."users/$userID/hotels/$hotelID/photos/$photoName";
        $result = removeFiles::deleteFile($fullPath);
        return $result;
    }
    //remove user specific photo
    public static function removeUserPhoto($userID,$photoName){
        $backPath = removeFiles::backPath();
        $fullPath = $backPath."users/$userID/hotels/$hotelID/photos/$photoName";
        $result = removeFiles::deleteFile($fullPath);
        return $result;
    }
}

// removeFiles::removeHotelPhoto("20","20","photo1.jpg");

?>