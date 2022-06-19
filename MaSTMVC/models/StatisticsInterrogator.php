<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class StatisticsInterrogator extends Model
{

    public function getLastStampsPosted()
    {
        $dataPoints = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,
        ];
        $userId = Application::$app->user->id;
        $statement = Application::$app->db->prepare("select DAYNAME(posted_datetime) AS day, count(*) as post_count
        from stamps
        where owner_id=$userId
        group by DAYNAME(posted_datetime)
        limit 7");
        $statement->execute();
        $stampsPostedThisWeek = $statement->fetchAll(\PDO::FETCH_OBJ);

        foreach ($stampsPostedThisWeek as $row) {
            $dataPoints[$row->day] = $row->post_count;
        }


        $graphData = [];

        foreach ($dataPoints as $day => $value) {
            $graphData[] = array("label" => $day, "y" => $value);
        }

        return $graphData;
    }

    public function getLikedStamps()
    {
        $userId = Application::$app->user->id;
        $userName = Application::$app->user->username;
        $statement = Application::$app->db->prepare("select posted_datetime AS day, count(*) as like_count
        from catalogue
        where id_user=$userId AND name='$userName`s Liked Stamps'
        group by created_datetime
        limit 30");
        $statement->execute();
//        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
//
//        echo '<pre>';
//        var_dump($result);
//        echo '<pre/>';
//        exit;

//        $graphData = [];
//
//        foreach($result as $row){
//            $graphData[] = array("x" => $row->day, "y" => $row->like_count);
//        }

//        return $graphData;

    }

    public function rules(): array
    {
        return [];
    }
}