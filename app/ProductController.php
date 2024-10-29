<?php 
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_POST['action'])) {
	switch($_POST['action']){

		case 'create_product':
      $nombre = $_POST['nombre'];
      $slug = $_POST['slug'];
      $description = $_POST['description'];
      $features = $_POST['features'];
      
      // Verificar si hay una imagen cargada
      $image = isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK ? $_FILES['image'] : null;
  
      $producController = new ProducController();
      $producController->create($nombre, $slug, $description, $features, $image);
      break;
  
  

		case 'update_product':

			$nombre = $_POST['nombre'];
			$slug = $_POST['slug'];
			$description = $_POST['description'];
			$features = $_POST['features'];

			$product_id = $_POST['product_id'];

			$producController = new ProducController();
			$producController->update($nombre,$slug,$description,$features,$product_id);

		break;

		case 'delete_product': 

			$product_id = $_POST['product_id'];

			$producController = new ProducController();
			$producController->remove($product_id);

		break;
	}
}

class ProducController
{
 
	public function get()
	{ 

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if (isset($response->data) && count($response->data)) {
			
			return $response->data;
		}

		return array();

	}


	public function getBySlug($slug)
	{ 

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		if (isset($response->data) && !is_null($response->data)) {
			
			return $response->data;
		}

		return null;

	}

	public function create($nombre, $slug, $description, $features, $image)
{
    $curl = curl_init();

    // Configurar datos del formulario para enviar al servidor
    $postData = [
        'name' => $nombre,
        'slug' => $slug,
        'description' => $description,
        'features' => $features,
    ];

    if ($image) {
        $postData['image'] = new CURLFile($image['tmp_name'], $image['type'], $image['name']);
    }

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['user_data']->token
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);

    if (isset($response->code) && $response->code == 4) {
        header('Location:home.php?status=ok');
    } else {
        header('Location:home.php?status=error');
    }
}



	public function update($nombre,$slug,$description,$features,$product_id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'PUT',
		  CURLOPT_POSTFIELDS => 'name='.$nombre.'&slug='.$slug.'&description='.$description.'&features='.$features.'&id='.$product_id,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/x-www-form-urlencoded',
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		));

		

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		#echo json_encode($response);

		if (isset($response->code) && $response->code == 4) {
			
			header('Location:home.php?status=ok');
		}else{
			header('Location:home.php?status=error');
		}

		
	}

	public function remove($product_id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$product_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'DELETE',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer '.$_SESSION['user_data']->token
		  ),
		)); 

		$response = curl_exec($curl); 
		curl_close($curl);
		$response = json_decode($response);

		#echo json_encode($response);

		if (isset($response->code) && $response->code == 2) {
			
			header('Location:home.php?status=ok');
		}else{
			header('Location:home.php?status=error');
		}

		
	}

}

?>