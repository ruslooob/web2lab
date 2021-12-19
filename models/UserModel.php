<?php

require "DbModel.php";

class UserModel extends DbModel
{
    public function getUserById(int $id)
    {
        $sql = <<< END
            SELECT * 
            FROM user
            WHERE id = $id
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    // fixme
    public function getUserByEmail(string $email)
    {
        $sql = <<< END
            SELECT * 
            FROM user
            WHERE email = $email
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }


    /**
     * Returns user if password is correct, otherwise false
     * @param $login - user login
     * @param $password - user password
     * @return mixed
     */
    public function getUserIfPasswordVerify($login, $password): mixed
    {
        $user = $this->getUserByLogin($login);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        // пароль не верный
        return false;
    }

    public function getUserIdByLogin(string $login): int
    {
        $sql = <<< END
            SELECT *
            FROM user
            WHERE login = ?
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(1, $login);
        $sth->execute();
        return $sth->fetch()['id'];
    }

    public function isEmailFree(string $email): bool
    {
        $sql = <<< END
            SELECT * 
            FROM user
            WHERE email = $email
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC) === false;
    }

    public function getUserByLogin(string $login)
    {
        $sql = <<< END
            SELECT * 
            FROM user
            WHERE login = ?
        END;
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(1, $login);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function save($login, $email, $phone, $password): int|bool
    {
        try {
            $saveLogin = htmlspecialchars($login);
            $saveEmail = htmlspecialchars($email);
            $savePhone = htmlspecialchars($phone);
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sql = <<< END
                INSERT INTO user(login, email, phone, password)
                values (?, ?, ?, ?)
            END;
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(1, $saveLogin);
            $sth->bindValue(2, $saveEmail);
            $sth->bindValue(3, $savePhone);
            $sth->bindValue(4, $passwordHash);
            $sth->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return $this->getUserIdByLogin($login);
    }
}