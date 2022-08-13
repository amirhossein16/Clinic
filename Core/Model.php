<?php /** @noinspection ALL */

namespace App\core;

use App\Core\DB\MySqlDatabase;

abstract class Model
{
    private $connection;
    private $table;

    abstract function getTable(): string;

    public function __construct()
    {
        $this->connection = MySqlDatabase::do();
        $this->table = $this->connection->table($this->getTable());
    }

    public function find(array $column = ['*'], $where = null, $sort = null, $join = null, $between = null, $group = null)
    {
        $query = $this->connection->select($column);
        if ($join !== null) {
            foreach ($join as $item) {
                $query->join($item[0], [$item[1], $item[2]], $item[3] ?? null);
            }
        }
        if ($where !== null) {
            foreach ($where as $key => $item) {
                $query->where($item[0], $item[1], $item[2] ?? null, $item[3] ?? $key != 0 ? 'AND' : 'OR');
            }
        }
        if ($sort !== null) {
            foreach ($sort as $item) {
                $query->sort($item[0], $item[1]);
            }
        }
        if ($between !== null) {
            foreach ($between as $item) {
                $query->between($item[0], $item[1], $item[2]);
            }
        }
        if ($group !== null)
            $query->group($group);

        return $query->fetchAll();
    }

    public function exist($column, $data)
    {
        $user = $this->connection->select(['count(*) as count'])->where($column, $data, '=')->fetch();
        $count = $user->count;
        return $count == 0 ? FALSE : TRUE;
    }

    public function save(array $data)
    {
        return $this->connection->insert($data)->exec();
    }

    public function get(string $column, string $data)
    {
        $user = $this->connection->select()->where($column, $data, '=')->fetch();
        return $this->convertor($user);
    }

    public function convertor(object $record): object
    {
        foreach ($record as $col => $value) {
            if (in_array($col, array_keys($this->convert))) {
                $value = json_decode($value);
            }
            $res[$col] = $value;
        }
        return (object)$res;
    }

    public function findAppointments(array $cols, array|null $join, array $id, array|null $where = null, array|null $order = null, array|null $between = null)
    {
        $query = $this->connection->select($cols);


        if (!is_null($join)) {
            foreach ($join as $key => $value) {

                $query->join($value[0], [$value[1], $value[2]]);
            }
        }

        $query = $query->where($id[0], $id[1]);
        if (!is_null($where)) {
            foreach ($where as $key => $value) {
                $query->where($value[0], $value[1], $value[2], $key != 0 ? "OR" : "AND");
            }
        }
        if (!is_null($order)) {
            foreach ($order as $key => $value) {
                $query->sort($value[0], $value[1]);
            }
        }
        if (!is_null($between)) {
            $query->between($between['col'], $between['from'], $between['to']);
        }
        return $query->fetchAll();
    }

    public function updateRow(string $id, array $data): bool
    {

        return $this->connection->update($data)->where('id', $id)->exec();
    }

    public function delete(array $where): bool
    {
        $query = $this->connection->delete();

        foreach ($where as $key => $value) {
            $query->where($value[0], $value[1], $value[2] ?? null, $value[3] ?? ($key != 0 ? "AND" : "OR"));
        }

        return $query->exec();
    }
}