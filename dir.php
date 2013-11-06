<?php
//全查询，没有深度限制
function dirs($baseDir)
{
    $dirArr = scandir($baseDir);
    unset($dirArr[0],$dirArr[1]);
    echo $baseDir.'<br/>';
    foreach($dirArr as $v)
        if(is_dir($baseDir.DIRECTORY_SEPARATOR.$v))
            dirs($baseDir.DIRECTORY_SEPARATOR.$v);
    return 0;
}
//非全查询，有深度限制
function dirsDeep($baseDir, $deep = 2, $currentDeep = 0)
{
    $dirArr = scandir($baseDir);
    unset($dirArr[0],$dirArr[1]);
    echo $baseDir.'<br/>';
    if ($currentDeep < $deep)
    {
        foreach($dirArr as $v)
        if(is_dir($baseDir.DIRECTORY_SEPARATOR.$v))
            dirsDeep($baseDir.DIRECTORY_SEPARATOR.$v, $deep, $currentDeep++);
    }
    return 0;
}
dirsDeep(__DIR__);
?>
