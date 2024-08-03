<?php
use GuzzleHttp\Client;

require 'vendor/autoload.php';  

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Collect form data
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $profession = $_GET['profession'];
    $email = $_GET['email'];
    $nationalite = $_GET['nationalite'];
    $document = $_GET['document'];
    $numero = $_GET['numero'];
    $date_emission = $_GET['date_emission'];
    $adresse = $_GET['adresse'];
    $ville = $_GET['ville'];
    $code_GETal = $_GET['code_GETal'];
    $pays = $_GET['pays'];
    $telephone = $_GET['telephone'];
    $centre_interet = isset($_GET['centre_interet']) ? implode(', ', $_GET['centre_interet']) : 'None';

    $nom_accomp1 = $_GET['nom_accomp1'];
    $prenom_accomp1 = $_GET['prenom_accomp1'];
    $nationalite_accomp1 = $_GET['nationalite_accomp1'];
    $document_accomp1 = $_GET['document_accomp1'];
    $numero_accomp1 = $_GET['numero_accomp1'];
    $date_naissance_accomp1 = $_GET['date_naissance_accomp1'];
    $email_accomp1 = $_GET['email_accomp1'];

    $nom_accomp2 = $_['nom_accomp2'];
    $prenom_accomp2 = $_['prenom_accomp2'];
    $nationalite_accomp2 = $_GET['nationalite_accomp2'];
    $document_accomp2 = $_GET['document_accomp2'];
    $numero_accomp2 = $_GET['numero_accomp2'];
    $date_naissance_accomp2 = $_GET['date_naissance_accomp2'];
    $email_accomp2 = $_GET['email_accomp2'];

    $nom_accomp3 = $_GET['nom_accomp3'];
    $prenom_accomp3 = $_GET['prenom_accomp3'];
    $nationalite_accomp3 = $_GET['nationalite_accomp3'];
    $document_accomp3 = $_GET['document_accomp3'];
    $numero_accomp3 = $_GET['numero_accomp3'];
    $date_naissance_accomp3 = $_GET['date_naissance_accomp3'];
    $email_accomp3 = $_GET['email_accomp3'];

    // Prepare the email content
    $subject = 'New Hotel Registration Form Submission';
    $body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; }
            .container { max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
            h2 { color: #0056b3; border-bottom: 2px solid #0056b3; padding-bottom: 5px; }
            p { margin: 5px 0; }
            .info-section { margin-bottom: 20px; }
            .info-section h2 { margin-top: 0; }
            .info-item { margin-bottom: 10px; }
            .info-item strong { display: inline-block; width: 150px; }
            .info-pair { display: flex; justify-content: space-between; }
            .info-pair div { width: 45%; }
            .signature-container {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                flex-wrap: wrap;
            }
            .signature-wrapper {
                flex: 1;
                margin-right: 10px;
                min-width: calc(50% - 10px);
            }
            .signature-wrapper.middle {
                margin-right: 0;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='info-section'>
                <h2>Reservation</h2>
                <div class='info-pair'>
                    <div class='info-item'><strong>Reservation:</strong></div>
                    <div class='info-item'><strong>Chambre:</strong></div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Type:</strong></div>
                    <div class='info-item'><strong>Régime:</strong></div>
                </div>
                <div class='info-item'><strong>Pax:</strong></div>
            </div>
            <div class='info-section'>
                <h2>Titulaire</h2>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nom:</strong> $nom</div>
                    <div class='info-item'><strong>Prénom:</strong> $prenom</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Profession:</strong> $profession</div>
                    <div class='info-item'><strong>E-mail:</strong> $email</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nationalité:</strong> $nationalite</div>
                    <div class='info-item'><strong>Document:</strong> $document</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Numéro:</strong> $numero</div>
                    <div class='info-item'><strong>Date d'émission:</strong> $date_emission</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Adresse:</strong> $adresse</div>
                    <div class='info-item'><strong>Ville:</strong> $ville</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Code postal:</strong> $code_postal</div>
                    <div class='info-item'><strong>Pays:</strong> $pays</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Téléphone:</strong> $telephone</div>
                    <div class='info-item'><strong>Centre d'intérêt:</strong> $centre_interet</div>
                </div>
            </div>
            <div class='info-section'>
                <h2>Accompagnateurs 1</h2>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nom:</strong> $nom_accomp1</div>
                    <div class='info-item'><strong>Prénom:</strong> $prenom_accomp1</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nationalité:</strong> $nationalite_accomp1</div>
                    <div class='info-item'><strong>Document:</strong> $document_accomp1</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Numéro:</strong> $numero_accomp1</div>
                    <div class='info-item'><strong>Date de naissance:</strong> $date_naissance_accomp1</div>
                </div>
                <div class='info-item'><strong>E-mail:</strong> $email_accomp1</div>
            </div>
            <div class='info-section'>
                <h2>Accompagnateurs 2</h2>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nom:</strong> $nom_accomp2</div>
                    <div class='info-item'><strong>Prénom:</strong> $prenom_accomp2</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nationalité:</strong> $nationalite_accomp2</div>
                    <div class='info-item'><strong>Document:</strong> $document_accomp2</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Numéro:</strong> $numero_accomp2</div>
                    <div class='info-item'><strong>Date de naissance:</strong> $date_naissance_accomp2</div>
                </div>
                <div class='info-item'><strong>E-mail:</strong> $email_accomp2</div>
            </div>
            <div class='info-section'>
                <h2>Accompagnateurs 3</h2>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nom:</strong> $nom_accomp3</div>
                    <div class='info-item'><strong>Prénom:</strong> $prenom_accomp3</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Nationalité:</strong> $nationalite_accomp3</div>
                    <div class='info-item'><strong>Document:</strong> $document_accomp3</div>
                </div>
                <div class='info-pair'>
                    <div class='info-item'><strong>Numéro:</strong> $numero_accomp3</div>
                    <div class='info-item'><strong>Date de naissance:</strong> $date_naissance_accomp3</div>
                </div>
                <div class='info-item'><strong>E-mail:</strong> $email_accomp3</div>
            </div>
            <div class='signature-container'>
                <div class='signature-wrapper left'>
                    <label for='signature-titulaire'>Signature titulaire:</label>
                    <div class='signature' id='signature-titulaire'></div>
                </div>
                <div class='signature-wrapper middle'>
                    <label for='signature-accomp1'>Signature 1er accompagnateur:</label>
                    <div class='signature' id='signature-accomp1'></div>
                </div>
            </div>
            <div class='signature-container'>
                <div class='signature-wrapper left'>
                    <label for='signature-accomp2'>Signature 2ème accompagnateur:</label>
                    <div class='signature' id='signature-accomp2'></div>
                </div>
                <div class='signature-wrapper middle'>
                    <label for='signature-accomp3'>Signature 3ème accompagnateur:</label>
                    <div class='signature' id='signature-accomp3'></div>
                </div>
            </div>
        </div>
    </body>
    </html>
";
$client = new Client();

    try {
        $response = $client->request('POST', 'https://api.brevo.com/v3/smtp/email', [
            'headers' => [
                'accept' => 'application/json',
                'api-key' => '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',
                'content-type' => 'application/json',
            ],
            'json' => [
                'sender' => [
                    'name' => 'Hotel Registration',
                    'email' => 'ahmedbv40@gmail.com', // Replace with your sender email
                ],
                'to' => [
                    [
                        'email' => 'ahmedbvss@gmail.com',
                        'name' => 'Recipient Name',
                    ],
                ],
                'subject' => $subject,
                'htmlContent' => $body,
            ],
        ]);

        if ($response->getStatusCode() == 201) {
            echo 'Message has been sent';
        } else {
            echo 'Failed to send message';
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Error: ', $e->getMessage();
    }
} else {
    echo 'Invalid request method';
}
?>
