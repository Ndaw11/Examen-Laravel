<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture de Location</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        .invoice-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            color: #007bff;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .client-details, .car-details {
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: left;
        }

        .total-amount {
            margin-top: 20px;
            text-align: right;
        }

        .car-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <div class="invoice-header">
            <h1>FACTURE</h1>
        </div>

      
        <!-- Informations sur le client -->
        <div class="client-details">
            <h2>Informations sur le Client</h2>
            <p>Prenom du client: {{ $facture->client->Prenom }}</p>
            <p>Nom du client: {{ $facture->client->Nom }}</p>
            <p>Téléphone du client: {{ $facture->client->Telephone }}</p>
            <p>Email du client: {{ $facture->client->Email }}</p>
            <!-- Ajoutez d'autres informations sur le client si nécessaire -->
        </div>

        <!-- Informations sur la voiture -->
        <div class="car-details">
            <h2>Informations sur la Voiture</h2>
            <p>Marque voiture: {{ $facture->voiture->Marque }}</p>
            <p>Modèle voiture: {{ $facture->voiture->Model }}</p>
            <p>Matricule: {{ $facture->voiture->Matricule }}</p>
            <p>Date de Début: {{ $facture->location->LieuDepart }}</p>
            <p>Date de Début: {{ $facture->location->LieuArriver }}</p>
            <p>Date de Fin: {{ $facture->location->DateFin }}</p>
            <!-- Ajoutez d'autres informations sur la voiture ou la location si nécessaire -->
        </div>

        <!-- Photo de la voiture -->
       
        <!-- Tableau des détails de la facture -->
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Location de {{ $facture->voiture->Marque }} {{ $facture->voiture->Model }}</td>
                    <td>{{ $facture->Montant }} FCFA</td>
                </tr>
                <!-- Ajoutez des lignes pour les articles de la facture si nécessaire -->
            </tbody>
        </table>

     

        <!-- Montant total -->
        <div class="total-amount">
            <p>Date de Paiement: {{ $facture->DatePaiement }}</p>
            <h3>Total: {{ $facture->Montant }} FCFA</h3>
        </div>
    </div>

</body>
</html>
