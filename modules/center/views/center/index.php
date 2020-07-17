<?php
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\Models\Playlist;
?>

<style>
        #playlist{
            list-style: none;
        }
        #playlist li a{
            color:black;
            text-decoration: none;
        }
        #playlist .current-song a{
            color:blue;
        }
    </style>
<?php
/* @var $this yii\web\View */
?>
<h1>Playlist </h1>

<p>



<?php
echo Select2::widget([
	'name' => 'state_10',
	'data' => ArrayHelper::map(Playlist::find()->all(), "id", "playlist"),
	'options' => [
		'placeholder' => 'เลือกรายการเพลง',
	],
	'pluginEvents' => [
		"select2:select" => "function(){setplaylist(this.value)}",
	],
]);
?>
</p>

    <audio src="" controls id="audioPlayer">
        Sorry, your browser doesn't support html5!
    </audio>
    <ul id="playlist">
        <?php $i=1; foreach($datas as $data): ?>
            <?php $filename = $data['filename']=="0"?$data['url']:$data['filename']?>
            <?php $path = $data['filename']=="0"?$data['url']:Url::to('@web/mp3/'.$data['filename'])?>
            <li class="<?php echo $i==1 ? "current-song" : ""?>"><a href="<?php echo $path;?>"><?php echo $filename?></a></li>

        <?php $i++; endforeach;?>
    </ul>
    <?php
        $this->registerJs('audioPlayer();');
    ?>   
   

<script>
function setplaylist(playlistid)
{
    var url = "<?php echo Url::to(['center/index']) ?>";
    window.location.href = url+"&id="+playlistid;
    // var url = "<?php echo Url::to(['center/getlist']) ?>";
    // var data = {id: playlistid};
    // $.post(url, data, function(res) {
    //         $("#playlist").append(res);
    // });
}

function audioPlayer(){
            var currentSong = 0;
            $("#audioPlayer")[0].src = $("#playlist li a")[0];
            $("#audioPlayer")[0].play();
            $("#playlist li a").click(function(e){
               e.preventDefault(); 
               $("#audioPlayer")[0].src = this;
               $("#audioPlayer")[0].play();
               $("#playlist li").removeClass("current-song");
                currentSong = $(this).parent().index();
                $(this).parent().addClass("current-song");
            });
            
            $("#audioPlayer")[0].addEventListener("ended", function(){
               currentSong++;
                if(currentSong == $("#playlist li a").length)
                    currentSong = 0;
                $("#playlist li").removeClass("current-song");
                $("#playlist li:eq("+currentSong+")").addClass("current-song");
                $("#audioPlayer")[0].src = $("#playlist li a")[currentSong].href;
                $("#audioPlayer")[0].play();
            });
        }
</script>