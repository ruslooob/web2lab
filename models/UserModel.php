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

    public function save($name, $email, $phone, $password): bool
    {
        try {
            $save_name = htmlspecialchars($name);
            $save_email = htmlspecialchars($email);
            $save_phone = htmlspecialchars($phone);

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = <<< END
                INSERT INTO user(name, email, phone, password)
                values ($save_name, $save_email, $save_phone, $password_hash)
            END;

            $sth = $this->dbh->prepare($sql);

            $sth->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }
}