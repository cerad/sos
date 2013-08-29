<?php
class Invoke
{
    public function __invoke()
    {
        echo "Fake Invoke<br>\n";
    }
    
}
class UserController
{
    public $search;
    public function __construct()
    {
        $this->search = new Invoke();
    }
    public function add(){
        echo "Creating User...<br>";
    }
    public function edit(){
        echo "Updating User...<br>";
    }
    public function delete(){
        echo "Removing User...<br>";
    }
    public function searchx(){
        echo "Overridden? Nope...<br>";
    }
    public function __call($method, $params){
        if(property_exists($this,$method)){
            $method = $this->$method;
            $method($params);
        }
    }
}  
class UserSearchPlugin
{
    public function __invoke()
    {
        echo "Searching User....<br>\n";
    }
}  
function test00()
{
    $controller = new UserController;
    $controller->search = new UserSearchPlugin();
    $controller->search();  
}
function test01()
{
    $controller = new UserController;
    $controller->search = new UserSearchPlugin();
    $search = $controller->search;
    $search();
}
function test02()
{
    $controller = new UserController;
    $controller->searchx = new UserSearchPlugin();
    $controller->search();  
}
function test03()
{
    $controller = new UserController;
    $controller->search = new UserSearchPlugin();
    $controller->search->__invoke();  
}
test00();
?>
