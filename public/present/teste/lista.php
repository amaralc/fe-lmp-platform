<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
function get_dirlist($start_dir) {
exec("ls -R $start_dir",$f_list);
$dir_str = $start_dir;
$filelist[0] = $start_dir; $i = 1;
for ($count=0; $count<count($f_list); $count++) {
if ($f_list[$count] == "") { continue; }
if (substr($f_list[$count],strlen($f_list[$count])-1,1) == ":") {
$dir_str = substr($f_list[$count],0,strlen($f_list[$count])-1);
$filelist[$i] = $dir_str;
$i++;
} else {
$file_str = "$dir_str/$f_list[$count]";
if (is_file($file_str)) {
$filelist[$i] = $file_str;
$i++;
}
}
}
return $filelist;
}


//Example
$start_dir ="/home/public_html/teste";
$filelist = get_dirlist($start_dir);
for ($c=0; $c<count($filelist); $c++) {
echo $filelist[$c] . "<br>";

}

?> 
<body>
</body>
</html>
