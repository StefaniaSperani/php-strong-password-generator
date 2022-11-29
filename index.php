<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato 
per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php 
che includeremo poi nella pagina principale

Milestone 3
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata 
che tramite $_SESSION recupererà la password da mostrare all’utente.

Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. 
Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali. -->

<?php
include __DIR__ . '/partials/header.php';
include __DIR__ . '/functions/functions.php';

session_start();
$password = '';
$characters = 'abcdefghihjklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!£$%&/()=?^{}[]#@.,-_<>;';


if (isset($_GET['passwordLength']) && !empty($_GET['passwordLength'])) {
    //var_dump($_GET['passwordLength']);
    $pswLength = $_GET['passwordLength'];
    for ($i = 0; $i < $pswLength; $i++) {
        //var_dump($i);
        $password .= getCharacter($characters);
    }
    ;
    var_dump($password);
    $_SESSION['password'] = $password;
    header('Location: ./password.php');
}
;

?>


<body>
    <main>
        <div class="container">
            <h1 class="text-uppercase text-center fw-bold">Password generator</h1>
            <form action="index.php" method="GET" name="passwordForm">
                <div class="row g-3 align-items-center justify-content-center">
                    <div class="col-auto">
                        <label for="passwordLength" class="col-form-label text-capitalize">Lunghezza Password</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" min="7" max="20" id="passwordLength" name="passwordLength"
                            class="form-control" required>
                    </div>
                </div>
                <div class="d-flex p-3 align-items-center justify-content-center">
                    <button type="submit" class="btn btn-primary">Invia</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>