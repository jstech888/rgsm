<?php

function ini_web() { 
	$setting = parse_ini_file( ROOTPATH . "web.ini");
	
	define('DEFAULTLANG', "en" );
	//var_dump($setting);
}

function write_ini_file($assoc_arr, $path, $has_sections=FALSE) { 
	$CTRL 	 	= (SYSTEMOS === "WIN")?"\r\n":"\n";
    $content 	= ""; 
    if ($has_sections) { 
        foreach ($assoc_arr as $key=>$elem) { 
            $content .= "[".$key."]$CTRL"; 
            foreach ($elem as $key2=>$elem2) { 
                if(is_array($elem2)) 
                { 
                    for($i=0;$i<count($elem2);$i++) 
                    { 
                        $content .= $key2."[] = \"".$elem2[$i]."\"$CTRL"; 
                    } 
                } 
                else if($elem2=="") $content .= $key2." = $CTRL"; 
                else $content .= $key2." = \"".$elem2."\"$CTRL"; 
            } 
        } 
    } 
    else { 
        foreach ($assoc_arr as $key=>$elem) { 
            if(is_array($elem)) 
            { 
                for($i=0;$i<count($elem);$i++) 
                { 
                    $content .= $key."[] = \"".$elem[$i]."\"$CTRL"; 
                } 
            } 
            else if($elem=="") $content .= $key." = $CTRL"; 
            else $content .= $key." = \"".$elem."\"$CTRL"; 
        } 
    } 

    if (!$handle = fopen($path, 'w')) { 
        return false; 
    }

    $success = fwrite($handle, $content);
    fclose($handle); 

    return $success; 
}
?>