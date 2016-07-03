<?php
namespace Monolog\Handler;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use PDO;

class MysqlHandler extends AbstractProcessingHandler {

	protected $pdo;
	protected $tableName;
	protected $pdoStatement;

	/**
     * Constructor
     *
     * @param PDO $pdo PDO Connector for the database
     * @param bool $tableName Table in the database to store the logs in
     * @param bool|int $level Debug level which this handler should store
     * @param bool $bubble
     */
	public function __construct(PDO $pdo = null, $tableName, $level = Logger::DEBUG, $bubble = true) {
		$this->pdo = $pdo;
		$this->tableName = $tableName;
		parent::__construct($level, $bubble);
	}

	/**
     * Insert the data to the logger table
     *
     * @param  array $data
     * @return bool
     */
	protected function insert(array $data) {
		if ($this->pdoStatement === null) {
			$sql = "INSERT INTO {$this->tableName} (message, context, level, level_name, channel, datetime)";
			$sql .= " VALUES (:message, :context, :level, :level_name, :channel, :datetime)";
			$this->pdoStatement = $this->pdo->prepare($sql);
		}
		return $this->pdoStatement->execute($data);
	}

	/**
     * Writes the record down to the log
     *
     * @param  array $record
     * @return void
     */
	protected function write(array $record) {
		$this->insert([
			':message' => $record['message'],
			':context' => json_encode($record['context']),
			':level' => $record['level'],
			':level_name' => $record['level_name'],
			':channel' => $record['channel'],
			':datetime' => $record['datetime']->format('Y-m-d H:i:s')
		]);
	}

}
