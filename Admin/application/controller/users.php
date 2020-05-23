<?php

class Users extends Controller
{   
    protected $table_name = "tbl_user";
    protected $key_word = "id_user";

    public function index()
    {
        $users = $this->model->getList($this->table_name);
        $provinces = array();
        $districts = array();
        $wards = array();
        foreach($users as $user){
            $province = $this->model->getListById("tbl_province", "id_province", $user->province_user);
            $district = $this->model->getListById("tbl_district", "id_district", $user->district_user);
            $ward = $this->model->getListById("tbl_ward", "id_ward", $user->ward_user);
            $provinces[] = $province[0];
            $districts[] = $district[0];
            $wards[] = $ward[0];
        }


        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addUser()
    {
        $this->setAdd();
        $provinces = $this->model->getList("tbl_province");
        
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/add.php';
        require APP . 'view/_templates/footer.php';

    }

    public function setAdd(){
        if(isset($_POST["addNew"])){
            $_POST['password'] = md5($_POST["password"]);
            $temTime = strtotime($_POST["birthday"]);
            $_POST["birthday"] = date("Y-m-d",$temTime);
            $this->model->addNew($this->table_name, $_POST);
            header('location: ' . URL . 'users/index');
        }
    }

    public function editUser($id)
    {
        if (isset($id)) {
            $user = $this->model->getListById($this->table_name, $this->key_word, $id);
            $provinces = $this->model->getList("tbl_province");

            $temTime = strtotime($user[0]->birthday);
            $user[0]->birthday = date("d-m-Y",$temTime);

            $this->setEdit($id);
            
            $this->model->sessionStart();
            require APP . 'view/_templates/header.php';
            require APP . 'view/users/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'users/index');
        }
    }

    public function setEdit($id){
        if(isset($_POST["updateList"])){
            $_POST['password'] = md5($_POST["password"]);
            $temTime = strtotime($_POST["birthday"]);
            $_POST["birthday"] = date("Y-m-d",$temTime);
            $this->model->updateList($this->table_name, $this->key_word, $id, $_POST);
            header('location: ' . URL . 'users/index');
        }
    }    
    public function deleteUser($id)
    {
        if (isset($id)) {
            $this->model->deleteById($this->table_name, $this->key_word, $id);
        }

        header('location: ' . URL . 'users/index');
    }


    public function getDistrict(){
?>
        <option value="">---Chọn---</option>
<?php
            if (isset($_POST["id"]) && isset($_POST["tmp"])) {
                $id=$_POST["id"];
                $tmp = $_POST["tmp"];
                $districts = $this->model->getListById("tbl_district", "id_province", $id);
                foreach ($districts as $district) {
                    $selected = "";
                    if($district->id_district == $tmp){
                        $selected = "selected";
                    }
?>
                <option <?php echo $selected ?> value="<?php echo htmlspecialchars($district->id_district, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($district->name_district, ENT_QUOTES, 'UTF-8'); ?></option>
<?php       
            }       
        }
    }


    public function getWard(){
?>
        <option value="">---Chọn---</option>
<?php
            if (isset($_POST["id"]) && isset($_POST["tmp"])) {
                $id=$_POST["id"];
                $tmp = $_POST["tmp"];
                $wards = $this->model->getListById("tbl_ward", "id_district", $id);
                foreach ($wards as $ward) {
                    $selected = "";
                    if($ward->id_ward == $tmp){
                        $selected = "selected";
                    }
?>
                <option <?php echo $selected ?> value="<?php echo htmlspecialchars($ward->id_ward, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($ward->name_ward, ENT_QUOTES, 'UTF-8'); ?></option>
<?php       
            }       
        }
    }    
}
