<?php
//
//class QueryBuilder
//{
//    private array $select = [];
//    private array $from = [];
//    private array $where = [];
//
////вызываем чрез объект -> так как у объекта есть эти методы
//    public function select(array $select): QueryBuilder
//    {
//        $this->select = $select;
//        return $this;
//    }
//
//    public function from(array $from): QueryBuilder
//    {
//        $this->from = $from;
//        return $this;
//    }
//
//    public function where(array $where): QueryBuilder
//    {
//        $this->where = $where;
//        return $this;
//    }
//
//    public function get(): string
//    {
//        return sprintf('SELECT %s FROM %s WHERE %s',
//        implode(', ', $this->select),
//        implode(', ', $this->from),
//        implode(', ', $this->where),
//        );
//    }
//}
//
//$queryBuilder = new QueryBuilder();
//
//$query = $queryBuilder->select(['title', 'id'])->from((array)'posts')->where((array)'view_id')->get();
//
//var_dump($query);