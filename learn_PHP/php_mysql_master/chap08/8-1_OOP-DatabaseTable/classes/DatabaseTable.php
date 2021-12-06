<?php

class DatabaseTable {
    private $pdo;
    private $table;
    private $primaryKey;

	public function __construct(PDO $pdo, string $table, string $primaryKey) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
	}

    /**
     * 쿼리 실행
     */
    private function query($sql, $parameters = []) {
        $query = $this->pdo->prepare($sql);
        $query->execute($parameters);
        return $query;
    }

    /**
     * 테이블의 전체 로우 개수 구하기
     */
    public function total() {
        $query = $this->query("SELECT COUNT(*) FROM `{$this->table}`");
        $row = $query->fetch();
        return $row[0];
    }

    /**
     * ID로 테이블 데이터 가져오기
     */
    public function findById($value) {
        $query = "SELECT * FROM `{$this->table}` WHERE `{$this->primaryKey}` = :value";
        $parameters = [
            'value' => $value
        ];
        $query = $this->query($query, $parameters);
        return $query->fetch();
    }

    /**
     * 테이블 데이터 삽입
     */
    private function insert($fields) {
        $query = "INSERT INTO `{$this->table}` (";

        foreach ($fields as $key => $value) {
            $query .= "`{$key}`,";
        }

        $query = rtrim($query, ',');
        $query .= ') VALUES (';

        foreach ($fields as $key => $value) {
            $query .= ":{$key},";
        }

        $query = rtrim($query, ',');
        $query .= ')';

        $fields = $this->processDates($fields);
        $this->query($query, $fields);
    }

    /**
     * 테이블 데이터 수정
     */
    private function update($fields) {
        $query = "UPDATE `{$this->table}` SET ";

        foreach ($fields as $key => $value) {
            $query .= "`{$key}` = :{$key},";
        }

        $query = rtrim($query, ',');
        $query .= " WHERE `{$this->primaryKey}` = :primaryKey";

        // :primaryKey 변수 설정
        $fields['primaryKey'] = $fields['id'];

        $fields = $this->processDates($fields);

        $this->query($query, $fields);
    }

    /**
     * 테이블 데이터 삭제
     */
    public function delete($id) {
        $parameters = [':id' => $id];
        $this->query("DELETE FROM `{$this->table}` WHERE `{$this->primaryKey}` = :id", $parameters);
    }

    /**
     * 테이블의 모든 데이터 가져오기
     */
    public function findAll() {
        $result = $this->query("SELECT * FROM `{$this->table}`");
        return $result->fetchAll();
    }

    /**
     * 날짜 형식 처리
     */
    private function processDates($fields) {
        foreach ($fields as $key => $value) {
            if ($value instanceof DateTime) {
                $fields[$key] = $value->format('Y-m-d H:i:s');
            }
        }
        return $fields;
    }

    /**
     * 데이터 삽입 또는 수정을 선택적으로 처리하는 메서드
     */
    public function save($record) {
        try {
            if ($record[$this->primaryKey] == '') {
                $record[$this->primaryKey] = null;
            }
            // 새로운 글 등록시, 이미 등록된 글 데이터가 있다면 '중복 키' 오류 발생
            $this->insert($record);

        } catch (PDOException $e) {
            // 중복 키가 있다면 글 데이터를 수정한다.
            $this->update($record);
        }
    }
}
