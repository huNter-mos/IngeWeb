# IngeWeb

Pour faire fonctionner le projet, l'installer dans un dossier /var/www/html/bean.

On a utilisé le fichier de configuration bean.example.com.conf situé dans sites-available dans les dossiers apache:

```
<Virtualhost *:80>
	Servername bean.example.com
	DocumentRoot "/var/www/html/bean/IngeWeb"
	<Directory "/var/www/html/bean/IngeWeb/api">
		# activate URL Rewriting
		RewriteEngine On

		# les fichiers PHP de chaque API ne sont pas directement accessibles
		RewriteRule ^apis/ index.php [QSA,L]

		# autoriser l'accès direct aux fichiers existants
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d

		# rediriger les URLs restantes vers l'index
		RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
	</Directory>
</Virtualhost>
```

Ne pas oublier de faire le lien symbolique dans "sites-enabled"



Il faut penser à décommenter la ligne 22 du fichier index.php dans le dossier api lors du premier lancement pour pouvoir créer la base de données, ensuite la recommenter.
Il faut penser à remettre des droits à la base de données à chaque déploiement de l'application.

URL du site : http://bean.example.com/view/index.php
