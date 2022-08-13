<?php


namespace App\Core\DB;

use App\Core\DB\Connection\ConnectionInterface;
use App\Core\DB\Connection\MySqlConnection;
use PDO;

class MySqlDatabase implements DatabaseInterface
{
    private PDO $db;
    private string $table;
    private string $query = "";
    private array $fields = [];

    public function __construct(ConnectionInterface $connection)
    {
        $this->db = $connection->getConnection();
    }

    public static function do ()
    {
        return new self(MySqlConnection::getInstance());
    }

    // Add table name in the first place
    public function table(string $table): DatabaseInterface
    {
        $this->table = $table;
        return $this;
    }

    // Create table then exec
    public function create()
    {
        $this->query = "CREATE TABLE {$this->table}";
        return $this;
    }

    // Drop table then exec
    public function drop()
    {
        $this->query = "DROP TABLE {$this->table}";
        return $this;
    }

    // SELECT array $cols from table then fetch or fetchAll
    public function select(array $cols = ['*']): DatabaseInterface
    {
        $this->query =
            "SELECT " . implode(",", $cols) .
            " FROM " . $this->table;
        return $this;
    }

    // SELECT array $cols from table then fetch or fetchAll
    public function insert(array $fields): DatabaseInterface
    {
        $this->fields = $fields;
        $params = array_map(fn($v) => ":$v", array_keys($fields));
        $this->query =
            "INSERT INTO " . $this->table .
            "(" . implode(",", array_keys($fields)) . ") " .
            "VALUES (" . implode(",", $params) . ")";
        return $this;
    }

    public function update(array $fields): DatabaseInterface
    {
        $this->fields = $fields;

        $arr = array_map(
        fn($key) => "$key = :$key",
            array_keys($fields),
        );

        $this->query = "UPDATE " . $this->table . " SET " . implode(",", $arr);

        return $this;
    }

    public function where(string|null $val1, string|null $val2, string|null $operation = '=', string $operator = 'AND'): DatabaseInterface
    {
        if ($val1 === null) {
            return $this;
        }

        $this->where = [
            $val1, $val2, $operation
        ];

        if ($val2 != 'NULL') {
            $val2 = "'$val2'";
        }

        if (strpos($this->query, 'WHERE')) {
            $this->query .= " $operator $val1 $operation $val2";
        }
        else {
            $this->query .= " WHERE $val1 $operation $val2";
        }
        return $this;

    }

    private function prepare($query)
    {
        $statement = $this->db->prepare($query);
        foreach ($this->fields as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement;
    }

    public function fetch()
    {
        $statement = $this->prepare($this->query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function fetchAll()
    {
        $statement = $this->prepare($this->query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function exec(): bool
    {
        $statement = $this->prepare($this->query);
        return $statement->execute();
    }
    public function delete()
    {
        $this->query = "DELETE FROM $this->table";
        return $this;
    }
    /**
     * 
     * @return PDO
     */
    function getDb(): PDO
    {
        return $this->db;
    }

    // SORT BY input argument
    public function sort(string|null $sort, string|null $desc = 'ASC'): DatabaseInterface
    {
        if ($sort == null) {
            return $this;
        }
        if (strpos($this->query, 'ORDER BY')) {
            $this->query .=
                ", $sort $desc";
        }
        else {
            $this->query .=
                " ORDER BY $sort $desc";
        }
        return $this;
    }

    // SORT BY input argument
    public function count(): DatabaseInterface
    {
        $this->query =
            "SELECT COUNT(*) as doctorsCount FROM $this->table";
        return $this;
    }

    public function group(string $group): DatabaseInterface
    {
        if ($group === null) {
            return $this;
        }

        $this->query .= " GROUP BY " . $group;
        return $this;
    }

    public function limit(int|null $limit)
    {
        if ($limit === null) {
            return $this;
        }

        $this->query .= " LIMIT " . $limit;
        return $this;
    }

    public function exists($query)
    {
        $this->query = "SELECT EXISTS($query)";
        return $this;
    }
    /**
     * 
     * @return string
     */
    function getQuery(): string
    {
        return $this->query;
    }

    public function between(string $col, string $val1, string $val2): DatabaseInterface
    {
        if ($val1 === null || $val2 === null) {
            return $this;
        }
        if (strpos($this->query, 'WHERE')) {
            $this->query .= " AND $col BETWEEN '$val1' AND '$val2'";
        }
        else {
            $this->query .= " WHERE $col BETWEEN '$val1' AND '$val2'";
        }
        return $this;
    }

    public function join(string $target = null, array $on = null, string |null $joinType = 'INNER'): DatabaseInterface
    {
        if (is_null($target) || is_null($on)) {
            return $this;
        }

        $this->query .=
            " $joinType JOIN `$target`
            on $on[0] = $on[1]";

        return $this;
    }
}