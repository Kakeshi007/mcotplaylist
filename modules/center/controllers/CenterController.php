<?php

namespace app\modules\center\controllers;

use Yii;
use app\Models\playlist_detail;
use yii\helpers\Url;

class CenterController extends \yii\web\Controller
{
    public function actionIndex($id="")
    {
        $where = $id == "" ? "" : "WHERE playlistid = {$id}";
        $sql = "
            SELECT 
                playlist.playlist,
                filename,
                url,
                `order` 
            FROM playlist_detail 
            LEFT JOIN playlist ON playlist_detail.playlistid = playlist.id
            LEFT JOIN files ON playlist_detail.fileid = files.id
            LEFT JOIN link ON playlist_detail.linkid = link.id
            {$where}
            ORDER BY playlist_detail.`order` ASC
        ";
        $rs = Yii::$app->db->createCommand($sql)->queryAll();
        $data['datas'] = $rs;
       
        return $this->render('index', $data);
    }

    public function actionGetlist($id)
    {
        $id = Yii::$app->request->post('id');
        $where = $id == "" ? "" : "WHERE playlistid = {$id}";
        $sql = "
        SELECT 
            playlist.playlist,
            filename,
            url,
            `order` 
        FROM playlist_detail 
        LEFT JOIN playlist ON playlist_detail.playlistid = playlist.id
        LEFT JOIN files ON playlist_detail.fileid = files.id
        LEFT JOIN link ON playlist_detail.linkid = link.id
        {$where}
        ORDER BY playlist_detail.`order` ASC
    ";
    $rs = Yii::$app->db->createCommand($sql)->queryAll();

        $html = "";
        $i = 1;
        foreach($rs as $data){
            $filename = $data['filename']=="0"?$data['url']:$data['filename'];
            $path = $data['filename']=="0" ? $data['url'] : Url::to('@web/mp3/'.$data['filename']);
          
            if($i==1)
            {
                $html .= "<li class=\"current-song\"><a href=\"{$path}\">{$filename}</a></li>";
            }
            else{
                $html .= "<li><a href=\"{$path}\">{$filename}</a></li>";
            }
            $i++;
        }
        return $html;
    }

}
