<?php

require_once "DbModel.php";

class ScreenshotModel extends DbModel
{
    private int $pageSize = 9;

    /* Получает начальные скриншоты */
    function getFirstScreenshots(): array|false
    {
        $sql = <<< END
                SELECT id, uuid, src, upload_date
                FROM screenshot
                ORDER BY id DESC
                LIMIT $this->pageSize
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function getScreenshotByUUID(string $uuid)
    {
        $sql = <<< END
            SELECT description, upload_date, src, login, uuid
            FROM screenshot s
            LEFT JOIN user ON s.user_id = user.id
            WHERE uuid = ?
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(1, $uuid);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    /* Получает скриншоты по заданному отступу */
    function getScreenshotsByOffset($offset): array
    {
        $sql = <<< END
            SELECT s.id, uuid, src, upload_date, description, login
            FROM screenshot s
                LEFT JOIN user u ON s.user_id = u.id
            WHERE s.id < $offset
            ORDER BY s.id DESC
            LIMIT $this->pageSize;
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    function saveScreenshot($src, $extension, $userId, $description)
    {
        $uuid = uniqid();
        $sql = <<< END
            INSERT INTO screenshot(upload_date, uuid, src, extension, user_id, description)
            VALUES(NOW(), :uuid, :src, :extension, :userId, :description); 
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(":uuid", $uuid);
        $sth->bindParam(":src", $src);
        $sth->bindParam(":extension", $extension);
        $sth->bindParam(":userId", $userId);
        $sth->bindParam(":description", $description);
        $sth->execute();
    }

    /**
     * @param int $pageSize
     * размер страницы при выводе
     * Другими словами велечина limit в sql-запросе на выборку
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }
}