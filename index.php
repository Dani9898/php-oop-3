<?php


trait Printable {
    public function printMe() {
        echo $this . "<br>";
    }
}


// /**
//  * 
//  *      Definire classe User:
//  *          ATTRIBUTI (private):
//  *          - username 
//  *          - password
//  *          - age
//  *          
//  *          METODI:
//  *          - costruttore che accetta username, e password
//  *          - proprieta' getter/setter
//  *          - printMe: che stampa se stesso
//  *          - toString: "username: age [password]"
//  * 
//  *          ECCEZIONI:
//  *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
//  *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
//  *          - scatenare eccezione se age non e' un numero
//  * 
//  *          NOTE:
//  *          - per testare il singolo carattere di una stringa
//  * 
//  *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
//  *      try-catch e eventualmente informare l'utente del problema
//  * 
//  */


 class User {

    use Printable;

    private $username;
    private $password;
    private $age;

    public function __construct($username, $password, $age) {

      $this -> setUsername($username);
      $this -> setpassword($password);
      $this -> setAge($age);
    }

    public function getUsername() {
        
        return $this -> username;
    }

    public function setUsername($username) {

        if ( strlen($username) < 3 || strlen($username) > 16 )
            throw new Exception("L'username deve avere tra i 3 e i 16 caratteri");

        $this -> username = $username;
    }

    public function getPassword() {
        
        return $this -> password;
    }

    public function setPassword($password) {

        if (ctype_alnum($password)) 
            throw new Exception("La password deve contenere un carattere speciale");
            
        $this -> password = $password;
    }

    public function getAge() {
        
        return $this -> age;
    }

    public function setAge($age) {
        
        if (!is_numeric($age))
            throw new Exception("L'età deve essere un numero");
        $this -> age = $age;
    }

    public function print() {

        $this -> printMe();
    }

    public function __toString() {

        return $this -> username . ": " . $this -> age . " [" . $this -> password . "]";
    }
 }

 echo "<h1>ESERCIO DELLA MATTINA</h1>";

 try {

    $u1 = new User("daaaa", "asd1#asd", 23);
    $u1 -> printMe();
 }

 catch (Exception $e) {

    echo $e -> getMessage();
 }

// Definire classe Computer:
//      *          ATTRIBUTI:
//      *          - codice univoco
//      *          - modello
//      *          - prezzo
//      *          - marca
//      * 
//      *          METODI:
//      *          - costruttore che accetta codice univoco e prezzo
//      *          - proprieta' getter/setter per tutte le variabili d'istanza
//      *          - printMe: che stampa se stesso (come quella vista a lezione)
//      *          - toString: "marca modello: prezzo [codice univoco]"
//      * 
//      *          ECCEZIONI:
//      *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
//      *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
//      *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
//      * 
//      *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
//      *      il corretto funzionamento dell'algoritmo

class Computer {

    use Printable;

    private $codiceUnivoco;
    private $modello;
    private $prezzo;
    private $marca;

    public function __construct($codiceUnivoco, $modello, $prezzo, $marca) {

        $this -> setCodiceUnivoco($codiceUnivoco);
        $this -> setModello($modello);
        $this -> setPrezzo($prezzo);
        $this -> setMarca($marca);
    }

    public function getCodiceUnivoco() {
        return $this -> codiceUnivoco;
    }

    public function setCodiceUnivoco($codiceUnivoco) {

        if (strlen($codiceUnivoco) != 6)
            throw new Exception("Il codiceUnivoco deve avere 6 caratteri");

        $this -> codiceUnivoco = $codiceUnivoco;
    }

    public function getModello() {
        return $this -> modello;
    }

    public function setModello($modello) {

        if(strlen($modello) < 3 || strlen($modello) > 20)
            throw new Exception("Il modello deve avere un numero di caratteri compreso tra 3 e 20");

        $this -> modello = $modello;
    }

    public function getPrezzo() {

        return $this -> prezzo;
    }

    public function setPrezzo($prezzo) {

        if(!is_int($prezzo) || $prezzo < 0 ||$prezzo > 2000)
            throw new Exception("Il prezzo deve essere compreso tra 0 e 2000");

        $this -> prezzo = $prezzo;
    }

    public function getMarca() {
        return $this -> marca;
    }

    public function setMarca($marca) {

        if(strlen($marca) < 3 || strlen($marca) > 20)
            throw new Exception("La marca deve avere un numero di caratteri compreso tra 3 e 20");

        $this -> marca = $marca;
    }

    public function print() {
        $this -> printMe();
    }

    public function __toString() {

        return $this -> codiceUnivoco . " " . $this -> modello . ": " . $this -> prezzo . " €" . " [" . $this -> marca . "] <br>";
    }
}

echo "<h1>ESERCIO DEL POMERIGGIO</h1>";

try {
    $pc1 = new Computer("123456", "MODELLO", 1000 , "MARCA");
    $pc1 -> print();
}

catch (Exception $e) {
    echo $e -> getMessage();
}
    
?>