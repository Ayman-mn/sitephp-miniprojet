<?php
session_start();

$mysql = new Mysqli('localhost', 'root', '', 'electro');
$result = $mysql->query('SELECT * FROM produit WHERE id = '.$_POST['id']);
$produit = $result->fetch_assoc();

require_once 'panier.php';

$panier = new Panier('produit');

$valeurs = array( 

        'nom'  => $produit['nom'],
        'prix' => $produit['prix'],
        'qte' => $_POST['qte'],
        'id'   => $produit['id'],


        );

        $panier->set( $_POST['id'], $valeurs);

        header('Location: votre_panier.php');

 ?>