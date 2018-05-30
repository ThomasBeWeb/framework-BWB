# framework-BWB
===============
Un magnifique framework qui déchire sa race!!!

Installation
------------
Tout est prêt, y a plus qu'à! koussikoussa...

Configuration
-------------

1)Dossier config
    a)database.json

Entrez les informations de connexion à la database

Exemple:

{
    "type":"mysql",
    "host":"localhost",
    "port":"3250",
    "dbName":"myDatabouse",
    "user":"ruuuut",
    "password":"1234"
}

Le port n'est pas obligatoire

    b)routing.json
Liste des relations entre le routage et les controlleurs/methodes

Exemple:

{
    "/": "ViewController:listeUtilisateurs",
    "/les_cartes":"ViewController:render",
    "/api/users":{
        "GET":"UserController:getAllUsers",
        "DELETE":"UserController:deleteAll",
        "POST":"UserController:create"
    }
}




