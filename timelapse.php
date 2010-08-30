<?

if($argc < 2)
{
    die("'compile' to compile, 'start [screenshot interval in seconds]' to start. ;)..\n");
}

if($argv[1] == "compile")
{
//    `ffmpeg -shortest -qscale 3 -ab 192k -r 10 -i %04d.jpg -i music.mp3 video.mp4`; // <-- music version
    `ffmpeg -shortest -qscale 3 -ab 192k -r 10 -i %04d.jpg video.mp4`;
}

if($argv[1] = "go")
{
    $interval = isset($argv[2]) ? $argv[2] : 10;
    $frame = 0;
    
    while(true)
    {
        echo "Beginning frame $frame\n";
        `scrot screen.png`;
        $filename = sprintf("%04d.jpg", $frame);
        `convert -quality 100 -resize 800x screen.png $filename`;
        echo "Finished frame $frame\n";
        `sleep $interval`;
        ++$frame;
    }
}

?>