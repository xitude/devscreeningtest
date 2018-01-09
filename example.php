<?php

###################################################
# Find as many problems as you can with this code.
###################################################

class Example_Db_Class
{
    static function connect($dbName)
    {
        if ($this->db == null) {
            $this->db = new $this->mysql_connect($dbname);
        }
    }
}




##############################################################################
# Explain what this query is doing and explain the format of the $data array.
##############################################################################

$sql = "SELECT count(logs.log_id) AS total_logins,
            CONCAT_WS(' ', users.first_name, users.last_name) as user_name,
            country.country_name,
            company.company_name,
            dept.dept_name as department_name
        FROM logs LEFT JOIN users on users.user_id = logs.user_id
        LEFT JOIN country on logs.country_id = country.country_id
        LEFT JOIN company on logs.company_id = company.company_id
        LEFT JOIN dept on logs.dept_id = dept.dept_id
        WHERE action='user_log_in'
        GROUP BY logs.user_id
        ORDER BY total_logins DESC
        ";


$columns = [
    'total_logins',
    'user_name',
    'country_name',
    'company_name',
    'dept_name'
];


$data = [];

Database::query($sql);

for ($x = 0; $x < Database::get_total_rows(); $x++) {
    foreach ($columns as $colname) {
        $data[$x][$colname] = Database::get($colname);
    }
    Database::next_record();
}




#########################################################################
# Explain this code, how would you get a database object for the default
# database?
#########################################################################

class D3R_Db
{
    static private $_instances = array();

    private $_config       = null;
    private $_mysqli       = false;
    private $_query        = null;
    private $_queryType    = null;
    private $_queryRunning = false;
    private $_numRows      = false;
    private $_numThisPage  = false;
    private $_insertId     = false;
    private $_joinCount    = false;
    private $_affectRows   = false;

    public static function getInstance($database = 'default')
    {
        if (!(isset(self::$_instances[$database])
            && self::$_instances[$database] instanceof self)
        ) {
            $db = new self();
            $db->setConfig(D3R::config()->database->$database);
            $db->connect();
            self::$_instances[$database] = $db;
        }

        return self::$_instances[$database];
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function setConfig(Zend_Config $config)
    {
        $this->_config = $config;
    }

    # implementation
}




################################################
# What is output by the following code and why?
################################################

class ExampleParentClass
{
    public static function test()
    {
        $instance = new self();
        return get_class($instance);
    }
}

class ExampleChildClass extends ExampleParentClass
{

}

echo ExampleChildClass::test();
