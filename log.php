<?php
/*
$filename = dirname(__FILE__).'/post-logs/log-post-mail.txt';
if (!empty($_POST)) {
    $dh = fopen($filename, 'a+');
    fwrite($dh, var_export($_POST, true));
    fclose($dh);
}
*/
if(isset($_POST) && count($_POST)>0){
        $data="";
        foreach($_POST as $key=>$val){
                if(is_string($val) && strlen($val)>2000 )
                        $val=substr($val,0,2000);
                $data.=$key."=>".$val."\n";
        }
        //вместо /home/user/data/www/site.ru/ указываем свой путь от корня сервера, куда должен писаться лог
        $fp=fopen(dirname(__FILE__).'/post-logs/'."--".date("Y-m-d H:i:s").".log","a");
        fwrite($fp,date("Y-m-d H:i:s")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['SCRIPT_FILENAME']."\n"." ---------------- ".$data."---------------------------\n");
        fclose($fp);
        $data="";
        reset($_POST);
}