<?php

class DB
{

    var $con;
    var $params;
    private static $instance;


    public function __construct()
    {
        $this->con = false;
        $this->connect();
    }

    public function connect()
    {
        if (!$this->con) {
            $pdo = new PDO('mysql:host=localhost;dbname=fmoaproc_pcure', 'root', '');
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $this->con = $pdo;
        }
        return $pdo;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setParameter($params)
    {

        $this->params = $params;
    }

    public function getParameter()
    {
        return $this->params;
    }

    ////////////////////////////////////////////////////////////////////////////
    /////////////////============ LOGIN ============////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function getLogerInfo()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT s.id, s.staffName, r.roleNumber, r.roleTitle FROM `staff` s JOIN `role` r ON s.id=r.staffId WHERE s.staffID=:username AND s.pasword=:password");
        $Query->execute($this->params);
        return [
            'status' => $Query->rowCount() > 0 ? true : false,
            'data' => $Query->fetch(PDO::FETCH_OBJ)
        ];
    }

    public function getLogerAdmin()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `admins` WHERE staffID=:username AND password=:password");
        $Query->execute($this->params);
        return [
            'status' => $Query->rowCount() > 0 ? true : false,
            'data' => $Query->fetch(PDO::FETCH_OBJ)
        ];
    }

    ////////////////////////////////////////////////////////////////////////////
    /////////////////========== APPLICATION =========///////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    public function isExistApplication()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE `file_no` = :file_no AND `status` = 0");
        $Query->execute([
            'file_no' => $this->params['file_no']
        ]);
        return $Query->rowCount() > 0 ? true : false;
    }

    public function saveApplication()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("INSERT INTO `application`(`file_no`, `staff_name`, `email`, `phone`, `attachment`, `tender`, `mood`, `staffId`, `status`) "
            . "VALUES (:file_no, :staff_name, :email, :phone, :attachment, :tender, :mood, :staffId, :status)");
        $Query->execute($this->params);
        // Check if the INSERT was successful
        if ($Query) {
            // Get the last inserted ID
            $lastInsertId = $this->con->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }

    public function saveApprovalOnApply($office)
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("INSERT INTO `approval`(`appId`, `office`) "
            . "VALUES (:appId, :office)");
        $Query->execute($office);
        // Check if the INSERT was successful
        return $Query ? true : false;
    }

    public function saveReaplly()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("UPDATE `application` SET `companyName`=:companyName,`rcNumber`=:rcNumber,`email`=:email,`phone`=:phone,`addr1`=:addr1,`addr2`=:addr2,`state`=:state,`zipCode`=:zipCode,`fileNumber`=:fileNumber,`projectTitle`=:projectTitle,`projectLocation`=:projectLocation,`contractAmount`=:contractAmount,`dateAward`=:dateAward,`financialBid`=:financialBid,`mpb`=:mpb,`technicalBid`=:technicalBid,`bpp`=:bpp,`awardLetter`=:awardLetter,`fecApproval`=:fecApproval,`tender`=:tender,`mood`=:mood,`staffId`=:staffId,`status`=:status WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function getAttendanceApprovalState($appId)
    {
        $Query = $this->con->prepare("SELECT * FROM `approval` WHERE `appId` = :appId AND `status` < 1 LIMIT 1");
        $Query->execute(['appId' => $appId]);
        // Fetch the first matching record as an object
        $result = $Query->fetch(PDO::FETCH_OBJ);
        // Check if $result is false (no matching record)
        if (!$result) {
            return (object)['status' => 1, 'office' => '10'];
        }

        // Return the result
        return $result;
    }

    public function getAllNewApplications($role)
    {
        $Query = $this->con->prepare("SELECT application.* 
    FROM application 
    LEFT JOIN approval ON application.id = approval.appId 
    WHERE application.status <= 1 AND approval.office = :office");

        $Query->execute(['office' => $role]);
        $result = $Query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getNewApplications($previous, $next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE ($previous > 0 AND $next < 1 AND `status` = 0) OR (`sup4` < 1 AND `mood` = 1) OR ($previous > 0 AND $next < 1 AND `mood` = 1)");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllApplicationsUnderRewiew()
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE (`sup2` > 0 AND `sup5` < 1 AND `status` < 1) OR (`sup5` < 1 AND `mood` = 1 AND `status` < 1)");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getApplicationsUnderRewiew($previous, $next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE $previous > 0 AND $next < 1 AND `status` < 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllApplicationsApproved()
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE `sup5` > 0 AND `status` < 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getApplicationsApproved($next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE $next > 0 AND `status` < 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFirstAwaitingApplications()
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE `sup2` < 1 AND `status` < 1 AND `mood` != 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllApplicationsReject()
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE `status` = 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getApplicationsReject($previous, $next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE $previous > 0 AND $next < 1 AND `status` = 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAwaitingApplications($previous, $next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE $previous > 0 AND $next < 1  AND `status` < 1 AND `mood` != 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDirectAwaitingApplications($previous, $next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE ($previous > 0 AND $next < 1  AND `status` < 1) OR ($next < 1 AND `mood` = 1 AND `status` < 1)");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFinalDirectAwaitingApplications($previous, $next)
    {
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE $previous > 0 AND $next < 1  AND `status` < 1");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function viewApplication()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `application` WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query->fetch(PDO::FETCH_OBJ);
    }

    public function rejectApplication()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("INSERT INTO `rejection`(`appId`, `rejectedBy`, `resons`) VALUES (:appId, :rejectedBy, :resons)");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function updateApplicationStatus()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("UPDATE `application` SET `status`=:status WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function rejectionReasons()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `rejection` WHERE `appId`=:id");
        $Query->execute($this->params);
        return $Query->fetch(PDO::FETCH_OBJ);
    }

    public function comment()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `approval` WHERE `appId`=:id ORDER BY `approval`.`id` DESC");
        $Query->execute($this->params);
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteApplication()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("DELETE FROM `application` WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function approveApplication()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("UPDATE `approval` SET `status` = 1 WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function saveComment()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("INSERT INTO `approval`(`appId`, `approvedBy`, `comment`) VALUES (:appId, :approvedBy, :comment)");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    ////////////////////////////////////////////////////////////////////////////
    /////////////////=========== DASHBOARD =========////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    public function applicationStatus($info)
    {
        return $this->getAttendanceApprovalState($info['id']);
        // if ($info['sup2'] == false && $info['mood'] != 1 && (int)$info['status'] < 1) {
        //     return "STAGE 1";
        // } else if ($info['sup4'] == false && $info['mood'] == 1 && (int)$info['status'] < 1) {
        //     return "STAGE 3";
        // } else if ($info['sup2'] != false && $info['sup3'] == false && (int)$info['status'] < 1) {
        //     return "STAGE 2";
        // } else if ($info['sup3'] != false && $info['sup4'] == false && (int)$info['status'] < 1) {
        //     return "STAGE 3";
        // } else if ($info['sup4'] != false && $info['sup5'] == false && (int)$info['status'] < 1) {
        //     return "STAGE 4";
        // } else if ((int)$info['status'] == 1) {
        //     return '<span style="color: red;">Rejected</span>';
        // } else {
        //     return '<span style="color: green;">Approved</span>';
        // }
    }


    public function applicationProgress($info)
    {
        return $this->getAttendanceApprovalState($info['id']);
        // if ($info['sup2'] == false && ($info['mood'] != 1)) {
        //     return "File currently in rectory office";
        // } else if ($info['sup2'] != false && $info['sup3'] == false && ($info['mood'] != 1)) {
        //     return "File currently in registry office";
        // } else if ($info['sup3'] != false && $info['sup4'] == false && ($info['mood'] != 1)) {
        //     return "File currently in bursery office";
        // } else if ($info['sup4'] != false && $info['sup5'] == false && $info['mood'] != 1) {
        //     return "File currently in Director acadamic planing";
        // } else if ($info['sup2'] == false && $info['mood'] == 1) {
        //     return "Rectory office only";
        // } else {
        //     return "Approved";
        // }
    }

    public function office($num)
    {
        return [
            "1" => 'File currently in Rector office',
            "2" => 'File currently in Registra office',
            "3" => 'File currently in Burser office',
            "4" => 'File currently in Director Acadamic Planing office',
            "10" => "Finished and File Returned main office"
        ][$num];
    }

    public function isApproved($info)
    {
        $approval = $this->getAttendanceApprovalState($info['id']);
        if ($approval == "approved") {
            return true;
        } else {
            return false;
        }
    }

    public function isApprovedView($info)
    {
        if ($info->sup4 != false && $info->sup5 != false) {
            return true;
        } else {
            return false;
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ///////////////========== ADMIN MANAGE STAFF =========//////////////////////
    ////////////////////////////////////////////////////////////////////////////

    public function getDepartement()
    {
        $Query = $this->con->prepare("SELECT * FROM department ORDER BY nam ASC");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStaffList()
    {
        $Query = $this->con->prepare("SELECT * FROM `staff`");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isStaffExist()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `staff` WHERE `staffID`=:staffID");
        $Query->execute([
            'staffID' => $this->params['staffID']
        ]);
        return $Query->rowCount() > 0 ? true : false;
    }

    public function saveStaff()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("INSERT INTO `staff`(`staffID`, `staffName`, `dpt`, `rak`, `email`, `contact`, `pasword`) VALUES (:staffID, :staffName, :dpt, :rank, :email, :contact, :password)");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function updateStaff()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("UPDATE `staff` SET `staffID`=:staffID, `staffName`=:staffName, `dpt`=:dpt, `rak`=:rank, `email`=:email, `contact`=:contact, `pasword`=:password WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function staffActivation()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("UPDATE `staff` SET `status`=:status WHERE `id`=:id");
        $Query->execute([
            'status' => $this->params['status'],
            'id' => $this->params['id']
        ]);
        return $Query ? true : false;
    }

    public function staffInfo()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `staff` WHERE `id`=:id");
        $Query->execute([
            'id' => $this->params['id']
        ]);
        return $Query->fetch(PDO::FETCH_OBJ);
    }

    public function isRoleExist()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("SELECT * FROM `role` WHERE `roleNumber` = :roleNumber");
        $Query->execute([
            'roleNumber' => $this->params['roleNumber']
        ]);
        return $Query->rowCount() > 0 ? true : false;
    }

    public function saveRole()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("INSERT INTO `role`(`staffId`, `roleNumber`, `roleTitle`) VALUES (:staffId, :roleNumber, :roleTitle)");
        $Query->execute($this->params);
        return $Query ? true : false;
    }

    public function getAllRole()
    {
        $Query = $this->con->prepare("SELECT r.*, s.staffID, s.staffName FROM `role` r JOIN `staff` s ON r.staffId=s.id");
        $Query->execute();
        return $Query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteRole()
    {
        $this->params = $this->getParameter();
        $Query = $this->con->prepare("DELETE FROM `role` WHERE `id`=:id");
        $Query->execute($this->params);
        return $Query ? true : false;
    }
}
