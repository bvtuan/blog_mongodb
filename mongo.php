<?php
class mongoDBHelp
{
	public $connection;
	public $collection;

	public function __construct($host = 'localhost:27017')
	{
		$this->connection = new Mongo($host);
	}

	public function selectDB($c)
	{
		$this->db = $this->connection->selectDB($c);
                return $this;
	}

	public function selectCollection($c)
	{
		$this->collection = $this->db->selectCollection($c);
                return $this;
	}

	public function insert($f)
	{
		$this->collection->insert($f);
	}

	public function find($f = null)
	{
                if ($f == null)
                    $cursor = $this->collection->find();
                else
                    $cursor = $this->collection->find($f);

		$k = array();
		$i = 0;

		while( $cursor->hasNext())
		{
		    $k[$i] = $cursor->getNext();
			$i++;
		}

		return $k;
	}
        
        public function findOne($f = null , $option =null)
        {
             if ($f == null)
                    $item = $this->collection->findOne();
                else
             if ($option != null)       
                    $item = $this->collection->findOne($f , $option);
             else
                    $item = $this->collection->findOne($f);
             
            return $item;
        }

	public function update($f1, $f2)
	{
		$this->collection->update($f1, $f2);
	}

	public function getAll()
	{
		$cursor = $this->collection->find();
		foreach ($cursor as $id => $value)
		{
			echo "$id: ";
			var_dump( $value );
		}
	}

	public function remove($f, $one = TRUE)
	{
		$c = $this->collection->remove($f, $one);
		return $c;
	}

	public function ensureIndex($args)
	{
		return $this->collection->ensureIndex($args);
	}

}

$mongodb = new mongoDBHelp();
$postCollection = $mongodb->selectDB('blog')->selectCollection('post')->collection;