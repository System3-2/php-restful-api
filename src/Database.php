<?php

class Database
{
  public function __construct(
    public string $host,
    public string $port,
    public string $name,
    public string $user,
    public string $password
  ) {
  }

  public function getConnection(): PDO
  {
    $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->name};charset=utf8";

    return new PDO($dsn, $this->user, $this->password, [
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_STRINGIFY_FETCHES => false
  ]);
  }
}
