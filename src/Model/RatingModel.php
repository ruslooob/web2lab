<?php

namespace App\Model;

use PDO;

class RatingModel extends DbModel
{
    function getScreenshotLikes(int $screenshotId): int
    {
        $sql = <<< END
            SELECT count(screenshot_id) AS rating
            FROM likes
            WHERE screenshot_id = $screenshotId
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }


    function addLike(int $screenshotId, int $userId)
    {
        $sql = <<< END
        INSERT INTO likes(screenshot_id, user_id)
        VALUES ($screenshotId, $userId);
        END;
    }
}