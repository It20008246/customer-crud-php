<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);
    $query ="DELETE FROM customers WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully"; 
        header("Location: index.php");
        exit(0);
  
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted"; 
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con,$_POST['customer_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $Address = mysqli_real_escape_string($con,$_POST['address']);

    $query = "UPDATE customers SET name='$name', email='$email', phone='$phone', address='$address' 
        WHERE id='$customer_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Updated Successfully"; 
        header("Location: index.php");
        exit(0);

    }

    else
    {
        $_SESSION['message'] = "Customer Not Updated"; 
        header("Location: index.php");
        exit(0);
        
    }

}

if(isset($_POST['save_customer']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $address = mysqli_real_escape_string($con,$_POST['address']);

    $query = "INSERT INTO customers (name,email,phone,address) VALUES
    ('$name','$email','$phone','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Customer Created Successfully"; 
        header("Location: customer-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Created"; 
        header("Location: customer-create.php");
        exit(0);
    }
}

?>