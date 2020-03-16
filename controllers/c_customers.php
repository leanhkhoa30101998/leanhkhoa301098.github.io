<?php  
	include('./models/m_customers.php');
	$action = filter_input(INPUT_POST, 'action');
	if(empty($action)){
		$action = filter_input(INPUT_GET, 'action');
		if(empty($action)){
			$action = 'show';
		}
	}

	$lifetime = 60*60*3;
	$path = '/';
	session_set_cookie_params($lifetime, $path);

	switch ($action) {
		case 'show':
			if(empty($_SESSION['list_cus'])){
				$_SESSION['list_cus'] = array();
			}
			$list = new CusDB();
			$list_cus = $list->get_cus_db();
			include('./views/list_customers.php');
			break;
		case 'add':
			include ('./views/v_customers.php');
			break;
		case 'add_cus':
			$email = filter_input(INPUT_POST, 'email');
			$name = filter_input(INPUT_POST, 'name');
			$password = filter_input(INPUT_POST, 'password');
			$phone = filter_input(INPUT_POST, 'phone');
			$p = array('email' => $email, 'name' => $name, 'password' => $password, 'phone' => $phone);

			$_SESSION['list_cus'][]=$p;
			$list = new CusDB();
			$list_cus = $list->get_cus_db($_SESSION['list_cus']);
			include ('./views/list_customers.php');
			break;
		case 'search_customer':
			$search_value = filter_input(INPUT_POST, 'search_value');
			$list = new CusDB();
			$list_cus = $list->search_cus($search_value);
			include('./views/list_customers.php');
			break;
		case 'delete':
			$id = filter_input(INPUT_GET,'id');
			unset($_SESSION['list_cus'][$id]);
			$_SESSION['list_cus'] = array_values($_SESSION['list_cus']);
			$list = new CusDB();
			$list_cus = $list->get_cus_db($_SESSION['list_cus']);
			include ('./views/list_customers.php');
			break;
		default:
			// code...
			break;
	}
?>