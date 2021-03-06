<?

/*
 * @addtogroup mysqlarchiv
 * @{
 *
 * @package       MySQLArchiv
 * @file          module.php
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2017 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 * @version       1.0
 *
 */

if (@constant('IPS_BASE') == null) //Nur wenn Konstanten noch nicht bekannt sind.
{
// --- BASE MESSAGE
    define('IPS_BASE', 10000);                             //Base Message
    define('IPS_KERNELSTARTED', IPS_BASE + 1);             //Post Ready Message
    define('IPS_KERNELSHUTDOWN', IPS_BASE + 2);            //Pre Shutdown Message, Runlevel UNINIT Follows
// --- KERNEL
    define('IPS_KERNELMESSAGE', IPS_BASE + 100);           //Kernel Message
    define('KR_CREATE', IPS_KERNELMESSAGE + 1);            //Kernel is beeing created
    define('KR_INIT', IPS_KERNELMESSAGE + 2);              //Kernel Components are beeing initialised, Modules loaded, Settings read
    define('KR_READY', IPS_KERNELMESSAGE + 3);             //Kernel is ready and running
    define('KR_UNINIT', IPS_KERNELMESSAGE + 4);            //Got Shutdown Message, unloading all stuff
    define('KR_SHUTDOWN', IPS_KERNELMESSAGE + 5);          //Uninit Complete, Destroying Kernel Inteface
// --- KERNEL LOGMESSAGE
    define('IPS_LOGMESSAGE', IPS_BASE + 200);              //Logmessage Message
    define('KL_MESSAGE', IPS_LOGMESSAGE + 1);              //Normal Message                      | FG: Black | BG: White  | STLYE : NONE
    define('KL_SUCCESS', IPS_LOGMESSAGE + 2);              //Success Message                     | FG: Black | BG: Green  | STYLE : NONE
    define('KL_NOTIFY', IPS_LOGMESSAGE + 3);               //Notiy about Changes                 | FG: Black | BG: Blue   | STLYE : NONE
    define('KL_WARNING', IPS_LOGMESSAGE + 4);              //Warnings                            | FG: Black | BG: Yellow | STLYE : NONE
    define('KL_ERROR', IPS_LOGMESSAGE + 5);                //Error Message                       | FG: Black | BG: Red    | STLYE : BOLD
    define('KL_DEBUG', IPS_LOGMESSAGE + 6);                //Debug Informations + Script Results | FG: Grey  | BG: White  | STLYE : NONE
    define('KL_CUSTOM', IPS_LOGMESSAGE + 7);               //User Message                        | FG: Black | BG: White  | STLYE : NONE
// --- MODULE LOADER
    define('IPS_MODULEMESSAGE', IPS_BASE + 300);           //ModuleLoader Message
    define('ML_LOAD', IPS_MODULEMESSAGE + 1);              //Module loaded
    define('ML_UNLOAD', IPS_MODULEMESSAGE + 2);            //Module unloaded
// --- OBJECT MANAGER
    define('IPS_OBJECTMESSAGE', IPS_BASE + 400);
    define('OM_REGISTER', IPS_OBJECTMESSAGE + 1);          //Object was registered
    define('OM_UNREGISTER', IPS_OBJECTMESSAGE + 2);        //Object was unregistered
    define('OM_CHANGEPARENT', IPS_OBJECTMESSAGE + 3);      //Parent was Changed
    define('OM_CHANGENAME', IPS_OBJECTMESSAGE + 4);        //Name was Changed
    define('OM_CHANGEINFO', IPS_OBJECTMESSAGE + 5);        //Info was Changed
    define('OM_CHANGETYPE', IPS_OBJECTMESSAGE + 6);        //Type was Changed
    define('OM_CHANGESUMMARY', IPS_OBJECTMESSAGE + 7);     //Summary was Changed
    define('OM_CHANGEPOSITION', IPS_OBJECTMESSAGE + 8);    //Position was Changed
    define('OM_CHANGEREADONLY', IPS_OBJECTMESSAGE + 9);    //ReadOnly was Changed
    define('OM_CHANGEHIDDEN', IPS_OBJECTMESSAGE + 10);     //Hidden was Changed
    define('OM_CHANGEICON', IPS_OBJECTMESSAGE + 11);       //Icon was Changed
    define('OM_CHILDADDED', IPS_OBJECTMESSAGE + 12);       //Child for Object was added
    define('OM_CHILDREMOVED', IPS_OBJECTMESSAGE + 13);     //Child for Object was removed
    define('OM_CHANGEIDENT', IPS_OBJECTMESSAGE + 14);      //Ident was Changed
// --- INSTANCE MANAGER
    define('IPS_INSTANCEMESSAGE', IPS_BASE + 500);         //Instance Manager Message
    define('IM_CREATE', IPS_INSTANCEMESSAGE + 1);          //Instance created
    define('IM_DELETE', IPS_INSTANCEMESSAGE + 2);          //Instance deleted
    define('IM_CONNECT', IPS_INSTANCEMESSAGE + 3);         //Instance connectged
    define('IM_DISCONNECT', IPS_INSTANCEMESSAGE + 4);      //Instance disconncted
    define('IM_CHANGESTATUS', IPS_INSTANCEMESSAGE + 5);    //Status was Changed
    define('IM_CHANGESETTINGS', IPS_INSTANCEMESSAGE + 6);  //Settings were Changed
    define('IM_CHANGESEARCH', IPS_INSTANCEMESSAGE + 7);    //Searching was started/stopped
    define('IM_SEARCHUPDATE', IPS_INSTANCEMESSAGE + 8);    //Searching found new results
    define('IM_SEARCHPROGRESS', IPS_INSTANCEMESSAGE + 9);  //Searching progress in %
    define('IM_SEARCHCOMPLETE', IPS_INSTANCEMESSAGE + 10); //Searching is complete
// --- VARIABLE MANAGER
    define('IPS_VARIABLEMESSAGE', IPS_BASE + 600);              //Variable Manager Message
    define('VM_CREATE', IPS_VARIABLEMESSAGE + 1);               //Variable Created
    define('VM_DELETE', IPS_VARIABLEMESSAGE + 2);               //Variable Deleted
    define('VM_UPDATE', IPS_VARIABLEMESSAGE + 3);               //On Variable Update
    define('VM_CHANGEPROFILENAME', IPS_VARIABLEMESSAGE + 4);    //On Profile Name Change
    define('VM_CHANGEPROFILEACTION', IPS_VARIABLEMESSAGE + 5);  //On Profile Action Change
// --- SCRIPT MANAGER
    define('IPS_SCRIPTMESSAGE', IPS_BASE + 700);           //Script Manager Message
    define('SM_CREATE', IPS_SCRIPTMESSAGE + 1);            //On Script Create
    define('SM_DELETE', IPS_SCRIPTMESSAGE + 2);            //On Script Delete
    define('SM_CHANGEFILE', IPS_SCRIPTMESSAGE + 3);        //On Script File changed
    define('SM_BROKEN', IPS_SCRIPTMESSAGE + 4);            //Script Broken Status changed
// --- EVENT MANAGER
    define('IPS_EVENTMESSAGE', IPS_BASE + 800);             //Event Scripter Message
    define('EM_CREATE', IPS_EVENTMESSAGE + 1);             //On Event Create
    define('EM_DELETE', IPS_EVENTMESSAGE + 2);             //On Event Delete
    define('EM_UPDATE', IPS_EVENTMESSAGE + 3);
    define('EM_CHANGEACTIVE', IPS_EVENTMESSAGE + 4);
    define('EM_CHANGELIMIT', IPS_EVENTMESSAGE + 5);
    define('EM_CHANGESCRIPT', IPS_EVENTMESSAGE + 6);
    define('EM_CHANGETRIGGER', IPS_EVENTMESSAGE + 7);
    define('EM_CHANGETRIGGERVALUE', IPS_EVENTMESSAGE + 8);
    define('EM_CHANGETRIGGEREXECUTION', IPS_EVENTMESSAGE + 9);
    define('EM_CHANGECYCLIC', IPS_EVENTMESSAGE + 10);
    define('EM_CHANGECYCLICDATEFROM', IPS_EVENTMESSAGE + 11);
    define('EM_CHANGECYCLICDATETO', IPS_EVENTMESSAGE + 12);
    define('EM_CHANGECYCLICTIMEFROM', IPS_EVENTMESSAGE + 13);
    define('EM_CHANGECYCLICTIMETO', IPS_EVENTMESSAGE + 14);
// --- MEDIA MANAGER
    define('IPS_MEDIAMESSAGE', IPS_BASE + 900);           //Media Manager Message
    define('MM_CREATE', IPS_MEDIAMESSAGE + 1);             //On Media Create
    define('MM_DELETE', IPS_MEDIAMESSAGE + 2);             //On Media Delete
    define('MM_CHANGEFILE', IPS_MEDIAMESSAGE + 3);         //On Media File changed
    define('MM_AVAILABLE', IPS_MEDIAMESSAGE + 4);          //Media Available Status changed
    define('MM_UPDATE', IPS_MEDIAMESSAGE + 5);
// --- LINK MANAGER
    define('IPS_LINKMESSAGE', IPS_BASE + 1000);           //Link Manager Message
    define('LM_CREATE', IPS_LINKMESSAGE + 1);             //On Link Create
    define('LM_DELETE', IPS_LINKMESSAGE + 2);             //On Link Delete
    define('LM_CHANGETARGET', IPS_LINKMESSAGE + 3);       //On Link TargetID change
// --- DATA HANDLER
    define('IPS_DATAMESSAGE', IPS_BASE + 1100);             //Data Handler Message
    define('DM_CONNECT', IPS_DATAMESSAGE + 1);             //On Instance Connect
    define('DM_DISCONNECT', IPS_DATAMESSAGE + 2);          //On Instance Disconnect
// --- SCRIPT ENGINE
    define('IPS_ENGINEMESSAGE', IPS_BASE + 1200);           //Script Engine Message
    define('SE_UPDATE', IPS_ENGINEMESSAGE + 1);             //On Library Refresh
    define('SE_EXECUTE', IPS_ENGINEMESSAGE + 2);            //On Script Finished execution
    define('SE_RUNNING', IPS_ENGINEMESSAGE + 3);            //On Script Started execution
// --- PROFILE POOL
    define('IPS_PROFILEMESSAGE', IPS_BASE + 1300);
    define('PM_CREATE', IPS_PROFILEMESSAGE + 1);
    define('PM_DELETE', IPS_PROFILEMESSAGE + 2);
    define('PM_CHANGETEXT', IPS_PROFILEMESSAGE + 3);
    define('PM_CHANGEVALUES', IPS_PROFILEMESSAGE + 4);
    define('PM_CHANGEDIGITS', IPS_PROFILEMESSAGE + 5);
    define('PM_CHANGEICON', IPS_PROFILEMESSAGE + 6);
    define('PM_ASSOCIATIONADDED', IPS_PROFILEMESSAGE + 7);
    define('PM_ASSOCIATIONREMOVED', IPS_PROFILEMESSAGE + 8);
    define('PM_ASSOCIATIONCHANGED', IPS_PROFILEMESSAGE + 9);
// --- TIMER POOL
    define('IPS_TIMERMESSAGE', IPS_BASE + 1400);            //Timer Pool Message
    define('TM_REGISTER', IPS_TIMERMESSAGE + 1);
    define('TM_UNREGISTER', IPS_TIMERMESSAGE + 2);
    define('TM_SETINTERVAL', IPS_TIMERMESSAGE + 3);
    define('TM_UPDATE', IPS_TIMERMESSAGE + 4);
    define('TM_RUNNING', IPS_TIMERMESSAGE + 5);
// --- STATUS CODES
    define('IS_SBASE', 100);
    define('IS_CREATING', IS_SBASE + 1); //module is being created
    define('IS_ACTIVE', IS_SBASE + 2); //module created and running
    define('IS_DELETING', IS_SBASE + 3); //module us being deleted
    define('IS_INACTIVE', IS_SBASE + 4); //module is not beeing used
// --- ERROR CODES
    define('IS_EBASE', 200);          //default errorcode
    define('IS_NOTCREATED', IS_EBASE + 1); //instance could not be created
// --- Search Handling
    define('FOUND_UNKNOWN', 0);     //Undefined value
    define('FOUND_NEW', 1);         //Device is new and not configured yet
    define('FOUND_OLD', 2);         //Device is already configues (InstanceID should be set)
    define('FOUND_CURRENT', 3);     //Device is already configues (InstanceID is from the current/searching Instance)
    define('FOUND_UNSUPPORTED', 4); //Device is not supported by Module

    define('vtBoolean', 0);
    define('vtInteger', 1);
    define('vtFloat', 2);
    define('vtString', 3);
    define('vtArray', 8);
    define('vtObject', 9);

    define('otVariable', 2);
    define('otLink', 6);
}

trait Database
{

    /**
     * @var mysqli
     */
    private $DB = null;

    /**
     * @var bool
     */
    private $isConnected = false;

    protected function Login()
    {
        if ($this->ReadPropertyString('Host') == '')
            return false;
        if (!$this->isConnected)
        {
            $this->DB = @new mysqli($this->ReadPropertyString('Host'), $this->ReadPropertyString('Username'), $this->ReadPropertyString('Password'));
            if ($this->DB->connect_errno == 0)
            {
                $this->isConnected = true;
                return true;
            }
            return false;
        }
        return true;
    }

    protected function CreateDB()
    {
        if ($this->isConnected)
            return $this->DB->query('CREATE DATABASE ' . $this->ReadPropertyString('Database'));
        return false;
    }

    protected function SelectDB()
    {
        if ($this->isConnected)
            return $this->DB->select_db($this->ReadPropertyString('Database'));
        return false;
    }

    protected function Logout()
    {
        if ($this->isConnected)
            return $this->DB->close();
        return false;
    }

    protected function TableExists($VarId)
    {
        if (!$this->isConnected)
            return false;
        $query = "SHOW TABLES IN " . $this->ReadPropertyString('Database') . " LIKE  'var" . $VarId . "';";
        $result = $this->DB->query($query);
        /* @var $result mysqli_result */
        return !($result->num_rows == 0);
    }

    protected function CreateTable($VarId, $VarTyp)
    {
        if (!$this->isConnected)
            return false;
        switch ($VarTyp)
        {
            case vtInteger:
                $Typ = 'value INT SIGNED, ';
                break;
            case vtFloat:
                $Typ = 'value REAL, ';
                break;
            case vtBoolean:
                $Typ = 'value BIT(1), ';
                break;
            case vtString:
                $Typ = 'value MEDIUMBLOB, ';
                break;
        }
        $query = "CREATE TABLE var" . $VarId . " (id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, " . $Typ . "timestamp DATETIME);";
        $result = $this->DB->query($query);
        $this->SendDebug('CreateTable', $result, 0);
        return $result;
    }

    protected function RenameTable($OldVariableID, $NewVariableID)
    {
        if (!$this->isConnected)
            return false;

        $query = "RENAME TABLE " . $this->ReadPropertyString('Database') . ".var" . $OldVariableID . " TO " . $this->ReadPropertyString('Database') . ".var" . $NewVariableID . ";";
        $result = $this->DB->query($query);
        $this->SendDebug('RenameTable', $result, 0);
        return $result;
    }

    protected function DeleteData($VariableID, $Startzeit, $Endzeit)
    {
        if (!$this->isConnected)
            return false;

        $query = "DELETE FROM var" . $VariableID . " WHERE ((timestamp >= from_unixtime(" . $Startzeit . ")) and (timestamp <= from_unixtime(" . $Endzeit . ")));";
        /* @var $result mysqli_result */
        $result = $this->DB->query($query);
        if ($result)
            $result = $this->DB->affected_rows;
        return $result;
    }

    protected function GetLoggedData($VariableID, $Startzeit, $Endzeit, $Limit)
    {
        if (!$this->isConnected)
            return false;

        $query = "SELECT  unix_timestamp(timestamp) AS 'TimeStamp', value AS 'Value' " .
                "FROM  var" . $VariableID . " " .
                "WHERE  ((timestamp >= from_unixtime(" . $Startzeit . ")) " .
                "and (timestamp <= from_unixtime(" . $Endzeit . "))) " .
                "ORDER BY timestamp DESC " .
                "LIMIT " . $Limit;
        /* @var $result mysqli_result */
        $result = $this->DB->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    protected function GetLoggedDataTyp($VariableID)
    {
        $query = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS " .
                "WHERE ((TABLE_NAME = 'var" . $VariableID . "') AND (COLUMN_NAME = 'value'))";

        $sqlresult = $this->DB->query($query);
        switch (strtolower($sqlresult->fetch_row()[0]))
        {
            case 'double':
            case 'real':
                return vtFloat;
            case 'int':
                return vtInteger;
            case 'bit':
                return vtBoolean;
            default:
                return vtString;
        }
    }

    protected function GetAggregatedData($VariableID, $Typ, $Startzeit, $Endzeit, $Limit)
    {
        switch ($Typ)
        {
            case 0:
                $Time = 10000;
                $Half = 3000;
                break;
            case 1:
                // YYMMDDhhmmss
                $Time = 1000000;
                $Half = 120000;
                break;
            case 2:
                // YYMMDDhhmmss
                $Time = 7000000;
                $Half = 350000;
                break;
            case 3:
                //    YYMMDDhhmmss
                $Time = 100000000;
                $Half = 15000000;
                break;
            case 4:
                //     YYMMDDhhmmss
                $Time = 10000000000;
                $Half = 600000000;
                break;
            case 5: //5 min
                $Time = 500;
                $Half = 230;
                break;
            case 6: //1 min
                $Time = 100;
                $Half = 30;
                break;
        }
        $query = "SELECT MIN(value) AS 'Min', MAX(value) AS 'Max', AVG(value) AS 'Avg', " .
                "UNIX_TIMESTAMP(convert((min(timestamp) div " . $Time . ")*" . $Time . " + " . $Half . ", datetime)) " .
                "as 'TimeStamp' FROM var" . $VariableID . " " .
                "WHERE timestamp BETWEEN from_unixtime(" . $Startzeit . ") " .
                "AND from_unixtime(" . $Endzeit . ") GROUP BY timestamp div " . $Time . " " .
                "ORDER BY 'TimeStamp' DESC " .
                "LIMIT " . $Limit;
        /* @var $result mysqli_result */
        $result = $this->DB->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    protected function GetVariableTables()
    {
        if (!$this->isConnected)
            return array();
        $query = "SELECT right(TABLE_NAME,5) as 'VariableID' FROM information_schema.TABLES WHERE table_schema = '" . $this->ReadPropertyString('Database') . "' ORDER BY 'VariableID' ASC";
        $sqlresult = $this->DB->query($query);
        if ($sqlresult === false)
            return array();
        $Result = $sqlresult->fetch_all(MYSQLI_ASSOC);
        foreach ($Result as &$Item)
        {
            $Item['VariableID'] = (int) $Item['VariableID'];
        }
        return $Result;
    }

    protected function GetSummary($VariableId)
    {
        if (!$this->isConnected)
            return false;

        $query = "SELECT unix_timestamp(timestamp) AS 'TimeStamp' " .
                "FROM  var" . $VariableId . " " .
                "ORDER BY timestamp ASC " .
                "LIMIT 1";
        /* @var $sqlresult mysqli_result */

        $sqlresult = $this->DB->query($query);
        $Result['FirstTimestamp'] = $sqlresult->fetch_row()[0];

        $query = "SELECT unix_timestamp(timestamp) AS 'TimeStamp' " .
                "FROM  var" . $VariableId . " " .
                "ORDER BY timestamp DESC " .
                "LIMIT 1";
        /* @var $sqlresult mysqli_result */
        $sqlresult = $this->DB->query($query);
        $Result['LastTimestamp'] = $sqlresult->fetch_row()[0];

        $query = "SELECT count(*) AS 'Count' " .
                "FROM  var" . $VariableId . " ";
        /* @var $sqlresult mysqli_result */
        $sqlresult = $this->DB->query($query);
        $Result['Count'] = $sqlresult->fetch_row()[0];

        $query = "SELECT count(*) AS 'Count' " .
                "FROM  var" . $VariableId . " ";
        /* @var $sqlresult mysqli_result */
        $sqlresult = $this->DB->query($query);
        $Result['Count'] = $sqlresult->fetch_row()[0];

        $query = "SELECT data_length AS 'Size' " .
                "FROM information_schema.TABLES " .
                "WHERE table_schema = '" . $this->ReadPropertyString('Database') . "' " .
                "AND table_name = 'var" . $VariableId . "' ";
        /* @var $sqlresult mysqli_result */
        $sqlresult = $this->DB->query($query);
        $Result['Size'] = $sqlresult->fetch_row()[0];
        return $Result;
    }

    protected function WriteValue($Variable, $NewValue, $HasChanged, $Timestamp)
    {
        if (!$HasChanged)
        {
            $query = "SELECT id,value FROM var" . $Variable . " ORDER BY timestamp DESC LIMIT 2";
            /* @var $result mysqli_result */
            $result = $this->DB->query($query);
            if ($result === false)
            {
                echo $this->DB->error;
                return false;
            }

            if ($result->num_rows === 2)
            {
                $ids = $result->fetch_all(MYSQLI_ASSOC);
                if ($ids[0]['value'] === $ids[1]['value'])
                {
                    $query = "UPDATE var" . $Variable . " SET timestamp=from_unixtime(" . $Timestamp . ") WHERE id=" . $ids[0]['id'];
                    $result = $this->DB->query($query);
                    return $result;
                }
            }
        }
        $query = "INSERT INTO var" . $Variable . " (value,timestamp) VALUES(" . $NewValue . ",from_unixtime(" . $Timestamp . "));";
        $result = $this->DB->query($query);
        if ($result === false)
        {
            echo $this->DB->error;
            return false;
        }
        return true;
    }

}

trait VariableWatch
{

    /**
     * Deregistriert eine Überwachung einer Variable.
     *
     * @access protected
     * @param int $VarId IPS-ID der Variable.
     */
    protected function UnregisterVariableWatch($VarId)
    {
        if ($VarId == 0)
            return;

        $this->SendDebug('UnregisterVM', $VarId, 0);
        $this->UnregisterMessage($VarId, VM_DELETE);
        $this->UnregisterMessage($VarId, VM_UPDATE);
    }

    /**
     * Registriert eine Überwachung einer Variable.
     *
     * @access protected
     * @param int $VarId IPS-ID der Variable.
     */
    protected function RegisterVariableWatch(int $VarId)
    {
        if ($VarId == 0)
            return;
        $this->SendDebug('RegisterVM', $VarId, 0);
        $this->RegisterMessage($VarId, VM_DELETE);
        $this->RegisterMessage($VarId, VM_UPDATE);
    }

}

/**
 * DebugHelper ergänzt SendDebug um die Möglichkeit Array und Objekte auszugeben.
 * 
 */
trait DebugHelper
{

    /**
     * Ergänzt SendDebug um Möglichkeit Objekte und Array auszugeben.
     *
     * @access protected
     * @param string $Message Nachricht für Data.
     * @param array|object|bool|string|int $Data Daten für die Ausgabe.
     * @return int $Format Ausgabeformat für Strings.
     */
    protected function SendDebug($Message, $Data, $Format)
    {
        if (is_array($Data))
        {
            foreach ($Data as $Key => $DebugData)
            {
                $this->SendDebug($Message . ":" . $Key, $DebugData, 0);
            }
        }
        else if (is_object($Data))
        {
            foreach ($Data as $Key => $DebugData)
            {
                $this->SendDebug($Message . "." . $Key, $DebugData, 0);
            }
        }
        else if (is_bool($Data))
        {
            parent::SendDebug($Message, ($Data ? 'TRUE' : 'FALSE'), 0);
        }
        else
        {
            parent::SendDebug($Message, $Data, $Format);
        }
    }

}

/**
 * Trait welcher Objekt-Eigenschaften in den Instance-Buffer schreiben und lesen kann.
 */
trait BufferHelper
{

    /**
     * Wert einer Eigenschaft aus den InstanceBuffer lesen.
     * 
     * @access public
     * @param string $name Propertyname
     * @return mixed Value of Name
     */
    public function __get($name)
    {
        if (strpos($name, 'Multi_') === 0)
        {
            $Lines = "";
            foreach ($this->{"BufferListe_" . $name} as $BufferIndex)
            {
                $Lines .= $this->{'Part_' . $name . $BufferIndex};
            }
            return unserialize($Lines);
        }
        return unserialize($this->GetBuffer($name));
    }

    /**
     * Wert einer Eigenschaft in den InstanceBuffer schreiben.
     * 
     * @access public
     * @param string $name Propertyname
     * @param mixed Value of Name
     */
    public function __set($name, $value)
    {
        $Data = serialize($value);
        if (strpos($name, 'Multi_') === 0)
        {
            $OldBuffers = $this->{"BufferListe_" . $name};
            if ($OldBuffers == false)
                $OldBuffers = array();
            $Lines = str_split($Data, 8000);
            foreach ($Lines as $BufferIndex => $BufferLine)
            {
                $this->{'Part_' . $name . $BufferIndex} = $BufferLine;
            }
            $NewBuffers = array_keys($Lines);
            $this->{"BufferListe_" . $name} = $NewBuffers;
            $DelBuffers = array_diff_key($OldBuffers, $NewBuffers);
            foreach ($DelBuffers as $DelBuffer)
            {
                $this->{'Part_' . $name . $DelBuffer} = "";
            }
            return;
        }
        $this->SetBuffer($name, $Data);
    }

}

/** @} */