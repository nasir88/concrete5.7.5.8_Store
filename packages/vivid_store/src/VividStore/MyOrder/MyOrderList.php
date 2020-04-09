<?php
namespace Concrete\Package\VividStore\Src\VividStore\MyOrder;

use Database;
use Concrete\Core\Search\Pagination\Pagination;
use Concrete\Core\Search\ItemList\Database\ItemList as DatabaseItemList;
use Pagerfanta\Adapter\DoctrineDbalAdapter;

use Concrete\Package\VividStore\Src\VividStore\Order\Order as StoreOrder;

class MyOrderList extends DatabaseItemList {

	//Start - Create Main Query
    protected $tableName = "VividStoreOrders";
    protected $asTableName = "o";
    protected $primaryKey = "oID";
	
	public function createQuery()
    {
        $this->query
        ->select($this->asTableName.'.'.$this->primaryKey)
        ->from($this->tableName,$this->asTableName);
    }
	public function getResult($queryRow)
    {
        return StoreOrder::getByID($queryRow[$this->primaryKey]);
    }
	protected function createPaginationObject()
    {
        $adapter = new DoctrineDbalAdapter($this->deliverQueryObject(), function ($query) {
            $query->select('count(distinct '.$this->asTableName.'.'.$this->primaryKey.')')->setMaxResults(1);
        });
        $pagination = new Pagination($this, $adapter);
        return $pagination;
    }
	public function getTotalResults()
    {
        $query = $this->deliverQueryObject();
        return $query->select('count(distinct '.$this->asTableName.'.'.$this->primaryKey.')')->setMaxResults(1)->execute()->fetchColumn();
    }
	//End
	
	//Start - Create Set Filter
	public function setSearch($search)
    {
        $this->search = $search;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setFromDate($date = null)
    {
        if (!$date) {
            $date = date('Y-m-d', strtotime('-30 days'));
        }
        $this->fromDate = $date;
    }
    public function setToDate($date = null)
    {
        if (!$date) {
            $date = date('Y-m-d');
        }
        $this->toDate = $date;
    }
	//End
	
	//Start - Create Query
    public function finalizeQuery(\Doctrine\DBAL\Query\QueryBuilder $query)
    {
        $paramcount = 0;

        if (isset($this->search)) {
            $this->query->where('o.oID like ?')->setParameter($paramcount++, '%'. $this->search. '%');
        }

        if (isset($this->status)) {
            $db = Database::connection();
            $matchingOrders = $db->query("SELECT oID FROM VividStoreOrderStatusHistories t1
                                            WHERE oshStatus = ? and
                                                  t1.oshDate = (SELECT MAX(t2.oshDate)
																FROM VividStoreOrderStatusHistories t2
																WHERE t2.oID = t1.oID)", array($this->status));
            $orderIDs = array();

            while ($value = $matchingOrders->fetchRow()) {
                $orderIDs[] = $value['oID'];
            }

            if (!empty($orderIDs)) {
                if ($paramcount > 0) {
                    $this->query->addWhere('o.oID in ('.implode(',', $orderIDs).')');
                } else {
                    $this->query->where('o.oID in ('.implode(',', $orderIDs).')');
                }
            } else {
                $this->query->where('1 = 0');
            }
        }
        
        if (isset($this->fromDate)) {
            $this->query->andWhere('DATE(oDate) >= DATE(?)')->setParameter($paramcount++, $this->fromDate);
        }
        if (isset($this->toDate)) {
            $this->query->andWhere('DATE(oDate) <= DATE(?)')->setParameter($paramcount++, $this->toDate);
        }
        
        $this->query->orderBy('oID', 'DESC');
        return $this->query;
    }
	//End
	
	

	
	
	
	
	
}