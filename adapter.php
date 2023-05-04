<?php
interface MediaPlayer{
    public function play($audioType, $filename);
}

interface AdvancedMediaPlayer{
    public function playVlc($filename);
    public function playMp4($filename);
}

class VlcPlayer implements AdvancedMediaPlayer{
    public function playMp4($filename){
        // do nothing
    }

    public function playVlc($filename){
        echo "Playing vlc filename ".$filename."\n";
    }
}

class Mp4player implements AdvancedMediaPlayer
{
    public function playMp4($filename){
        echo "Playing mp4 filename ".$filename."\n";
    }

    public function playVlc($filename){
        // do nothing
    }
}

class MediaAdapter implements MediaPlayer{
    public $advancedMusicPlayer;

    public function __construct($audioType){
        if ($audioType == 'vlc'){
            $this->advancedMusicPlayer = new VlcPlayer();
        }
        elseif($audioType == 'mp4'){
            $this->advancedMusicPlayer = new Mp4player();
        }
    }

    public function play($audioType, $filename){
        if ($audioType == 'vlc'){
            $this->advancedMusicPlayer->playVlc($filename);
        }
        elseif($audioType == 'mp4'){
            $this->advancedMusicPlayer->playMp4($filename);
        }
    }
}

class AudioPlayer implements MediaPlayer{
    public $mediaAdapter;

    public function play($audioType, $filename){
        $mediaAdapter = new MediaAdapter($audioType);
        $mediaAdapter->play($audioType, $filename);
    }
}

$audio = new AudioPlayer();
$audio->play("mp4", 'alone.mp4');
$audio->play('vlc', 'far_far_away.vlc');
?>