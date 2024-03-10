<!DOCTYPE html>
<html>
<head>
    <title>Exported Facture</title>
    <!-- Ajoutez des styles supplémentaires ici si nécessaire -->
</head>
<body>
    <h1>Facture #{{ $facture->id }}</h1>
    <p>Date: {{ $facture->DatePaiement }}</p>
    <h4 class="text-primary mb-1">Montant: {{ $facture->Montant }} FCFA</h4>

    <!-- Informations sur le client -->
    <p>Prenom du client: {{ $facture->client->Prenom }}</p>
    <p>Nom du client: {{ $facture->client->Nom }}</p>

    <!-- Informations sur la voiture -->
    <p>Marque voiture: {{ $facture->voiture->Marque }}</p>
    <p>Modele voiture: {{ $facture->voiture->Model }}</p>

    <!-- Ajoutez d'autres détails de la facture selon vos besoins -->

    <!-- Ajoutez un tableau ou d'autres éléments pour afficher les données -->

</body>
</html>
