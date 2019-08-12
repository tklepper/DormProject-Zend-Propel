<?php

namespace Base;

use \Unit as ChildUnit;
use \UnitQuery as ChildUnitQuery;
use \Exception;
use \PDO;
use Map\UnitTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'unit' table.
 *
 *
 *
 * @method     ChildUnitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUnitQuery orderByBuildingNumber($order = Criteria::ASC) Order by the building_number column
 * @method     ChildUnitQuery orderByFloorNumber($order = Criteria::ASC) Order by the floor_number column
 * @method     ChildUnitQuery orderByRoomNumber($order = Criteria::ASC) Order by the room_number column
 *
 * @method     ChildUnitQuery groupById() Group by the id column
 * @method     ChildUnitQuery groupByBuildingNumber() Group by the building_number column
 * @method     ChildUnitQuery groupByFloorNumber() Group by the floor_number column
 * @method     ChildUnitQuery groupByRoomNumber() Group by the room_number column
 *
 * @method     ChildUnitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUnitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUnitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUnitQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUnitQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUnitQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUnitQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildUnitQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildUnitQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildUnitQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildUnitQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildUnitQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildUnitQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUnit findOne(ConnectionInterface $con = null) Return the first ChildUnit matching the query
 * @method     ChildUnit findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUnit matching the query, or a new ChildUnit object populated from the query conditions when no match is found
 *
 * @method     ChildUnit findOneById(int $id) Return the first ChildUnit filtered by the id column
 * @method     ChildUnit findOneByBuildingNumber(int $building_number) Return the first ChildUnit filtered by the building_number column
 * @method     ChildUnit findOneByFloorNumber(int $floor_number) Return the first ChildUnit filtered by the floor_number column
 * @method     ChildUnit findOneByRoomNumber(int $room_number) Return the first ChildUnit filtered by the room_number column *

 * @method     ChildUnit requirePk($key, ConnectionInterface $con = null) Return the ChildUnit by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnit requireOne(ConnectionInterface $con = null) Return the first ChildUnit matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUnit requireOneById(int $id) Return the first ChildUnit filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnit requireOneByBuildingNumber(int $building_number) Return the first ChildUnit filtered by the building_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnit requireOneByFloorNumber(int $floor_number) Return the first ChildUnit filtered by the floor_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnit requireOneByRoomNumber(int $room_number) Return the first ChildUnit filtered by the room_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUnit[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUnit objects based on current ModelCriteria
 * @method     ChildUnit[]|ObjectCollection findById(int $id) Return ChildUnit objects filtered by the id column
 * @method     ChildUnit[]|ObjectCollection findByBuildingNumber(int $building_number) Return ChildUnit objects filtered by the building_number column
 * @method     ChildUnit[]|ObjectCollection findByFloorNumber(int $floor_number) Return ChildUnit objects filtered by the floor_number column
 * @method     ChildUnit[]|ObjectCollection findByRoomNumber(int $room_number) Return ChildUnit objects filtered by the room_number column
 * @method     ChildUnit[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UnitQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UnitQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'itsgenius_zend', $modelName = '\\Unit', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUnitQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUnitQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUnitQuery) {
            return $criteria;
        }
        $query = new ChildUnitQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUnit|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UnitTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UnitTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUnit A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, building_number, floor_number, room_number FROM unit WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUnit $obj */
            $obj = new ChildUnit();
            $obj->hydrate($row);
            UnitTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUnit|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UnitTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UnitTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UnitTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UnitTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the building_number column
     *
     * Example usage:
     * <code>
     * $query->filterByBuildingNumber(1234); // WHERE building_number = 1234
     * $query->filterByBuildingNumber(array(12, 34)); // WHERE building_number IN (12, 34)
     * $query->filterByBuildingNumber(array('min' => 12)); // WHERE building_number > 12
     * </code>
     *
     * @param     mixed $buildingNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function filterByBuildingNumber($buildingNumber = null, $comparison = null)
    {
        if (is_array($buildingNumber)) {
            $useMinMax = false;
            if (isset($buildingNumber['min'])) {
                $this->addUsingAlias(UnitTableMap::COL_BUILDING_NUMBER, $buildingNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($buildingNumber['max'])) {
                $this->addUsingAlias(UnitTableMap::COL_BUILDING_NUMBER, $buildingNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitTableMap::COL_BUILDING_NUMBER, $buildingNumber, $comparison);
    }

    /**
     * Filter the query on the floor_number column
     *
     * Example usage:
     * <code>
     * $query->filterByFloorNumber(1234); // WHERE floor_number = 1234
     * $query->filterByFloorNumber(array(12, 34)); // WHERE floor_number IN (12, 34)
     * $query->filterByFloorNumber(array('min' => 12)); // WHERE floor_number > 12
     * </code>
     *
     * @param     mixed $floorNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function filterByFloorNumber($floorNumber = null, $comparison = null)
    {
        if (is_array($floorNumber)) {
            $useMinMax = false;
            if (isset($floorNumber['min'])) {
                $this->addUsingAlias(UnitTableMap::COL_FLOOR_NUMBER, $floorNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($floorNumber['max'])) {
                $this->addUsingAlias(UnitTableMap::COL_FLOOR_NUMBER, $floorNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitTableMap::COL_FLOOR_NUMBER, $floorNumber, $comparison);
    }

    /**
     * Filter the query on the room_number column
     *
     * Example usage:
     * <code>
     * $query->filterByRoomNumber(1234); // WHERE room_number = 1234
     * $query->filterByRoomNumber(array(12, 34)); // WHERE room_number IN (12, 34)
     * $query->filterByRoomNumber(array('min' => 12)); // WHERE room_number > 12
     * </code>
     *
     * @param     mixed $roomNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function filterByRoomNumber($roomNumber = null, $comparison = null)
    {
        if (is_array($roomNumber)) {
            $useMinMax = false;
            if (isset($roomNumber['min'])) {
                $this->addUsingAlias(UnitTableMap::COL_ROOM_NUMBER, $roomNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roomNumber['max'])) {
                $this->addUsingAlias(UnitTableMap::COL_ROOM_NUMBER, $roomNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitTableMap::COL_ROOM_NUMBER, $roomNumber, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUnitQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(UnitTableMap::COL_ID, $user->getUnitId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            return $this
                ->useUserQuery()
                ->filterByPrimaryKeys($user->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUnit $unit Object to remove from the list of results
     *
     * @return $this|ChildUnitQuery The current query, for fluid interface
     */
    public function prune($unit = null)
    {
        if ($unit) {
            $this->addUsingAlias(UnitTableMap::COL_ID, $unit->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the unit table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UnitTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UnitTableMap::clearInstancePool();
            UnitTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UnitTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UnitTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UnitTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UnitTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UnitQuery
