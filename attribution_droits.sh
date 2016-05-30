#! /bin/bash

echo ""
echo "Changement de propriétaire..."
sudo chgrp -R www-data storage bootstrap/cache
echo "Attribution des droits aux dossier bootstrap & cache..."
sudo chmod -R ug+rwx storage bootstrap/cache

echo "✔ Terminé !!"