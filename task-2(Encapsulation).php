<?php
class Employee {
    private $name;
    private $role;
    private $salary;

    public function __construct($name, $role, $salary) {
        $this->name = $name;
        $this->role = $role;
        $this->setSalary($salary);
    }

    public function getName() {
        return $this->name;
    }

    public function getRole() {
        return $this->role;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        if ($salary > 0) {
            $this->salary = $salary;
        } 
    }

    public function displayEmployeeInfo() {
        echo "Employee Name: " . $this->getName() . "<br>";
        echo "His Role: " . $this->getRole() . "<br>";
        echo "His Salary: " . $this->getSalary();
    }
}

$emp1 = new Employee("S. M. Shahriar", "Php Intern", 15000);
$emp1->displayEmployeeInfo();
?>
