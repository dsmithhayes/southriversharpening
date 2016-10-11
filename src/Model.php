<?php

namespace SouthRiverSharpening;

/**
 * The base class for every model in the application. It holds a instanciated
 * PDO object and makes arbitrary calls to a specific table that represents
 * the data within the model.
 */
class Model
{
    /**
     * @var \PDO
     *      The instanciated PDO objects representing the model
     */
    private $pdo;

    /**
     * @param \Interop\Container\ContainerInterface $container
     *      The container that will hold the PDO instance. The PDO instance
     *      must have the key 'pdo' within the container
     * @param string $tableName
     *      Used to override what the table name is for the model. By default
     *      this class breaks down 'ModelName' to 'model_name'
     */
    public function __cosntruct(Container $container, string $tableName = null)
    {
        $this->pdo = $container->get('pdo');
        $this->tableName = ($tableName) ?? $this->buildTableName();
    }

    /**
     * @param string $tableName
     *      The name of the table to get data from
     */
    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    /**
     * @return string
     *      The current name of the table
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param int $id
     *      The primary key of the model data in the database
     * @return array
     *      An array of the column names and data
     */
    public function get(int $id): array
    {

    }

    /**
     * @return string
     *      Formats the class name into a table name
     */
    protected function buildTableName(): string
    {

    }
}
