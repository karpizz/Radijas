<?php
namespace Mano;
use PDO;
class RadijosDB
{
    private $pdo;
    public function __construct()
    {
        //pagrindiniai nustatymai
        $host = '127.0.0.1';
        $db   = 'radio';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        //papildomi nustatymai
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function getAll()
    { // grazins visus irasus

        $sql = "SELECT * FROM mygtukai;"; //uzklausa i duombaze, lygybes zenklas viengubas, sakynis pasibaigia kabliataskiu

        $stmt = $this->pdo->query($sql);
        $data = [];

        while ($row = $stmt->fetch()) // grazina viena eilute duomenu
        {
            $data[] = $row;
        }
        return $data;
    }

    public function store(array $data) // saugykla  // <----- ['name' => 'medzio vardas', 'type' => 2]
    {
        //irasymas
        //$sql = "INSERT INTO lentele (`type`, `name`) VALUES (" . $data['type'] . ", '" . $data['name'] . "');"; //kiekviena karta refreshinant sita eilu suveikia ir yra pridedama i duombaze
        $sql = "INSERT INTO mygtukai (`type`, `name`) VALUES (?, ?);"; // SVARBUS KLAUSTUKU EILISKUMAS
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['type'], $data['name']]); // SVARBUS PARAMSU EILISKUMAS
        
        // $this->pdo->query($sql);
    }
    
    public function update(array $data)
    {
        // $sql = "UPDATE medziai SET type=".$data['type'].", name='".$data['name']."' WHERE id=".$data['id'].";";
        $sql = "UPDATE mygtukai SET daznis=?, stotis=? WHERE metodas = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['daznis'], $data['stotis'], $data['metodas']]);
        // $this->pdo->query($sql);
    }

    public function delete(array $data)
    {
        //$sql = "DELETE FROM mygtukai WHERE mygtukai.id=".$data['id'].";"; // mygtukai.id dar tiksliau nurodo is kurios duombazes istrinti id
        // $sql = "DELETE FROM mygtukai WHERE mygtukai.id= 88 OR 1;"; id nera prilyginamas 88 arba 1 o yra paverciamas i true arba false 1 = true;
        // $sql = "DELETE FROM mygtukai WHERE mygtukai.id = ? ;";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->execute([$data['id']]);
        //$this->pdo->query($sql); // naudoti query tik tada kai 100% patikima parasyta paciu rankomis

    }
}
