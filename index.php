<?php
use GuzzleHttp\Client;

require 'vendor/autoload.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    $nationalite = $_POST['nationalite'];
    $document = $_POST['document'];
    $numero = $_POST['numero'];
    $date_emission = $_POST['date_emission'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_POSTal = $_POST['code_POSTal'];
    $pays = $_POST['pays'];
    $telephone = $_POST['telephone'];
    $centre_interet = isset($_POST['centre_interet']) ? implode(', ', $_POST['centre_interet']) : 'None';

    $nom_accomp1 = $_POST['nom_accomp1'];
    $prenom_accomp1 = $_POST['prenom_accomp1'];
    $nationalite_accomp1 = $_POST['nationalite_accomp1'];
    $document_accomp1 = $_POST['document_accomp1'];
    $numero_accomp1 = $_POST['numero_accomp1'];
    $date_naissance_accomp1 = $_POST['date_naissance_accomp1'];
    $email_accomp1 = $_POST['email_accomp1'];

    $nom_accomp2 = $_POST['nom_accomp2'];
    $prenom_accomp2 = $_POST['prenom_accomp2'];
    $nationalite_accomp2 = $_POST['nationalite_accomp2'];
    $document_accomp2 = $_POST['document_accomp2'];
    $numero_accomp2 = $_POST['numero_accomp2'];
    $date_naissance_accomp2 = $_POST['date_naissance_accomp2'];
    $email_accomp2 = $_POST['email_accomp2'];

    $nom_accomp3 = $_POST['nom_accomp3'];
    $prenom_accomp3 = $_POST['prenom_accomp3'];
    $nationalite_accomp3 = $_POST['nationalite_accomp3'];
    $document_accomp3 = $_POST['document_accomp3'];
    $numero_accomp3 = $_POST['numero_accomp3'];
    $date_naissance_accomp3 = $_POST['date_naissance_accomp3'];
    $email_accomp3 = $_POST['email_accomp3'];

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
                    <div class='info-item'><strong>Code POSTal:</strong> $code_POSTal</div>
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
    <?php
// Define your API key
define('API_KEY', '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');

// Get the request headers
$headers = apache_request_headers();

// Check if the 'Authorization' header is present
if (isset($headers['Authorization'])) {
    // Extract the API key from the 'Authorization' header
    $apiKey = str_replace('Bearer ', '', $headers['Authorization']);

    // Validate the API key
    if ($apiKey === API_KEY) {
        // API key is valid, process the request

        // Get the POST data
        $input = json_decode(file_get_contents('php://input'), true);

        // Handle the request data
        $response = [
            'message' => 'Success',
            'data' => $input
        ];

        // Send a JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Invalid API key
        header('HTTP/1.1 401 Unauthorized');
        echo json_encode(['message' => 'Unauthorized']);
    }
} else {
    // No 'Authorization' header present
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['message' => 'Bad Request: Missing Authorization Header']);
}
?>

    // Create a new Guzzle HTTP client
    $client = new Client();

    try {
        $response = $client->request('POST', 'https://api.brevo.com/v3/smtp/email', [
            'headers' => [
                'accept' => 'application/json',
                'api-key' => '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', // Replace with your Brevo API key
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

        if ($response->POSTStatusCode() == 201) {
            echo 'Message has been sent';
        } else {
            echo 'Failed to send message';
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Error: ', $e->POSTMessage();
    }
} else {
    echo 'Invalid request method';
}
?>
