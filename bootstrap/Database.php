<?php


namespace Bootstrap;
use \PDO;

/**
 * Class Database
 * @package Bootstrap
 */
class Database
{
    public static function query(string $query, array $params = []): \PDOStatement
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($query);
        if ($params != []) {
            self::setParams($stmt, $params);
        }
        $stmt->execute();
        return $stmt;
    }

    private static function setParams(\PDOStatement $stmt, array $params): void
    {
       foreach ($params as $key => $value)
       {
           $stmt->bindParam($key, $value);
       }
    }

    private static function getConnection(): \PDO
    {
        try {
            return new \PDO(
                SGBD . ':host=' . HOST . ';dbname=' . DB_NAME . ';charset=utf8',
                USERNAME,
                PASSWORD
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

}