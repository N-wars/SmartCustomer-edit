<?php
class database{
	function select(){
	$con=mysqli_connect("localhost","root","","smartcustomer");
	$query="select * from product";
	$result=mysqli_query($con,$query);
	return $result;
	}
	function details($query){
	$con=mysqli_connect("localhost","root","","smartcustomer");
	$result=mysqli_query($con,$query);
	return $result;
	}
	function availiablecompany($query){
		$con=mysqli_connect("localhost","root","","smartcustomer");
	$result=mysqli_query($con,$query);
	return $result;
	}
	function price($query){
		$con=mysqli_connect("localhost","root","","smartcustomer");
	$result=mysqli_query($con,$query);
	return $result;
	}
	function shoppingcenter($query){
		$con=mysqli_connect("localhost","root","","smartcustomer");
	$result=mysqli_query($con,$query);
	return $result;

	}
	function search($query){
		$con=mysqli_connect("localhost","root","","smartcustomer");
	$result=mysqli_query($con,$query);
	return $result;
	}
	
}