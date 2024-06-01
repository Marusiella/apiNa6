<?php
require_once "Database.php";
class ApiClass
{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database();
    }
    private function Get()
    {
        echo $this->database->Get();

    }
    private function Post() {
        $has = filter_has_var(INPUT_POST, "title");
        if (!$has) {
            die("{'error':'didn\'t specified title'}");
        }
        $value = filter_input(INPUT_POST, "title");
         $this->database->Add($value);
         echo "{'error':null}";
    }
    private function Delete() {
        $output = json_decode(file_get_contents("php://input"));

        $id = $output->{"id"};
         $this->database->Delete($id);
        echo "{'error':null}";

    }

    function HandleRequests()
    {
        header('Content-Type: application/json');

        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET':
                $this->Get();
                break;
            case 'POST':
                $this->Post();
                break;
            case 'DELETE':
                $this->Delete();
                break;
            default:

        }
    }
}