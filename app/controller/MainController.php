<?php
namespace App\Controller;
use App\Model\MainModel;

class MainController{
    private $MainModel;

    public function __construct(){
        $this->MainModel = new MainModel();
    }
    //soft delete data
    public function softDelete($table, $id){
        $getData = $this->MainModel->getBy('*', $table, 'id', $id);
        $data = [
            'is_deleted' => 1
        ];
        $status = $this->MainModel->update($table, $data, 'id', $id);
        echo $status
        ? "<span class='fw-bold text-danger'>" . htmlspecialchars($getData['full_name']) . "</span> " . $table . " record has been succesfully deactivated!"
        : "deletion failed!";
    }
    //restore data
    public function restore($table, $id){
        $getData = $this->MainModel->getBy('*', $table, 'id', $id);
        $data = [
            'is_deleted' => 0
        ];
        $status = $this->MainModel->update($table, $data, 'id', $id);
        echo $status
        ? "You have succesfully restore <span class='fw-bold text-success'>" . htmlspecialchars($getData['full_name']) . "</span> " . $table . " record!"
        : "Restoration failed!";
    } 
    //permanent delete data
    public function permanentDelete($table, $id){
        $data = $this->MainModel->getBy('*', $table, 'id', $id);
        $status = $this->MainModel->delete($table, 'id', $id);
        echo $status
        ? "You have succesfully deleted <span class='fw-bold text-danger'>" . htmlspecialchars($data['full_name']) . "</span> " . $table . " record!"
        : "Permanent deletion failed!";
    }
    //confirmation message for soft delete/permanent delete/ and restore
    public function modalResponse($action, $table, $id){
        $data = $this->MainModel->getBy('*', $table, 'id', $id);
        if($action === 'soft-delete'){
            echo "This action will archive
                <span class='fw-bold text-danger'>" . htmlspecialchars($data['full_name']) . "</span> "
                . $table . " record. Archived records remain available for restoration unless permanently removed.";
        }elseif($action === 'restore'){
            echo "Are you sure you want to restore 
            <span class='fw-bold text-danger'>" . htmlspecialchars($data['full_name']) . "</span> " 
            . $table . " record?";
        }elseif($action === 'permanent-delete'){
            echo "Are you sure you want to permanently delete 
            <span class='fw-bold text-danger'>" . htmlspecialchars($data['full_name']) . "</span> "
            . $table . " record?. This action cannot be undone!";
        }
    }
    //search
    public function search($table, $keyword){
        if($table === 'student'){
                $field =[
                    'full_name',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'email',
                    'course',
                    'section',
                    'student_id_number'
                ];
            $data = $this->MainModel->search($table, $field, $keyword);
            foreach ($data as $row) {
                echo "<tr>";
                    echo "<td>" . $row['student_id_number'] . "</td>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>" . $row['year_level'] . "</td>";
                    echo "<td>" . $row['section'] . "</td>";
                    echo "<td>" . $row['school_year'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td class='text-center'>
                        <a href='edit-student?id=" . $row['id'] . "' title='Edit' class='btn btn-outline-primary btn-sm'><i class='bi bi-pencil'></i></a>
                        <a href='#' title='Profile' id='" . $row['id'] . "' class='btn btn-outline-secondary btn-sm'><i class='bi bi-person-circle'></i></a>
                        <a href='#' title='Delete' id='student' data-id='" . $row['id'] . "' class='delete btn btn-outline-warning btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-trash text-danger'></i></a></td>";
                echo "</tr>";
            }
        }elseif($table === 'teacher'){
            $field =[
                    'full_name',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'email',
                    'department',
                    'employee_id'
                ];
            $data = $this->MainModel->search($table, $field, $keyword);
            foreach($data as $row){
                echo "<tr>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['middle_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td class='text-center'>
                            <a href='edit-teacher?id=" . $row['id'] . "' title='Edit' class='btn btn-outline-primary btn-sm'><i class='bi bi-pencil'></i></a>
                            <a href='#' title='Profile' id='" . $row['id'] . "' class='btn btn-outline-secondary btn-sm'><i class='bi bi-person-circle'></i></a>
                            <a href='#' title='Delete' id='teacher' data-id='" . $row['id'] . "' class='delete btn btn-outline-warning btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-trash text-danger'></i></a></td>";
                echo "</tr>";
            }
        }
    
        
    }
    
}