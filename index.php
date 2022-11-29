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

include __DIR__ . '/functions/functions.php';

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
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>PHP Password Generator</title>
</head>

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
                <div class="d-flex flex-column p-3 align-items-center justify-content-center">
                    <h2 class="text-capitalize">La tua password:</h2>
                    <?php if (isset($password)) { ?>
                    <h3>
                        <?php echo $password ?>
                    </h3>
                    <?php } ?>
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