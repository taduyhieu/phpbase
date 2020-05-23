<?php


class register extends Controller
{
	protected $table_name  = "tbl_user";
	protected $table_name1  = "tbl_province";
	protected $key = "id_province";
	public function addUser(){
		if(isset($_POST["addNew"])){
            $_POST['password'] = md5($_POST['password']);
            $register = $this->model->addNew($this->table_name, $_POST);
            header("Location:".URL."/login");

    	}
	}
	public function index()
    {
    	$province = $this->model->getAll($this->table_name1);
    	$this->addUser();
    	require APP . 'view/templates/header.php';
        require APP . 'view/User/register.php';
        require APP . 'view/templates/footer.php';
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