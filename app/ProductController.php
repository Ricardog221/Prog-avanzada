<?php

session_start();

if (!$_POST || !$_POST["action"]) {
  echo 'There is no action';
  return;
}

switch ($_POST["action"]) {
  case 'add_product':
    $productController = new ProductController();
    $res = $productController->createProduct($_POST);
    print_r($res);
    break;

  default:
    break;
}

class ProductController
{
  function getAllProducts($token)
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
        'Authorization: Bearer ' . $token,
        'Cookie: XSRF-TOKEN=eyJpdiI6IkN2YVJlblJFcGoycFFibEZpTFZMaGc9PSIsInZhbHVlIjoiQldWbUVNeUVkMzFic29PZjUxVXpCZ291YkIzN0o4TE4rZ3lwZStsNThmd2tYd01idTUyZ0VvZFh1aURmcFYyOTl1UzVRMXJDSDlRQXNUWlRKSEFqVHlxb09YYWxQZlNOaFFFNmJielliajhWOEd1YzNqUkxiMzdUWmVnRVI5WHkiLCJtYWMiOiJkN2JjZWRlYTdlYjg4NjhiODZhYzAyYjExZWVjNTM5YmJjNTI1ZjZhOGZmY2UzNTliOTc0NTIyNmE3YWVjM2UxIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IlBheGw1RTd6M2F4RVVSWCs0Q2F6WWc9PSIsInZhbHVlIjoidDVmNFh2UHYvSkFYRjF2b0lwRUw2YXAvZUVuSjMvUDhRZGFjVkxwL0o2S1hvNlJKelFBSVgvV1NjQjlYVjlZTWJFV2I0OXBrUmJQU3psTzRZSVhSQlhQYWgrMVp1MldTMFFGQ01uano2SGo3Y1M4d05McVdzNGZYNEpGeVV0eU4iLCJtYWMiOiI0YzYyNDJmYjJhNjMyNzA4MTlkZWYwZGIwOWYyNjA5YzA1NzM4NjJmNWM4NGU4NTg5MjU1YzRjMDVlOTQ5M2E4IiwidGFnIjoiIn0%3D'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response)->data;
  }

  function getProductBySlug($slug)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token']
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response)->data;
  }
  function createProduct($product)
  {
    $curl = curl_init();
    $product['cover'] =  new CURLFILE($product['cover']);
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $product,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['api_token']
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return ($response);
  }
}

