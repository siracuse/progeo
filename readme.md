<h1>Facebook Login</h1>

Pour tester facebook login, 
<ul>
  <li>Stocker le site sur un serveur https (avec base de données intégré) avec un nom de domaine</li><br/>
  <li>Créer si ce n'est pas fait un compte developpeur facebook, et créer une appli avec Facebook Login</li><br/>
  <li>Dans les paramètres > Général de la page de l'appli, rentrer votre nom de domaine dans le champ "domaines de l'app" et cliquer en bas de la page sur "Ajouter une plate-forme" > "Site Web" et rentrer l'url de votre site.</li><br/>
  <li>Dans "Facebook Login", dans "URI de redirection OAuth valides", ajouter (X nom de votre url) "https://X/login","https://X/redirect", "https://X/callback" et "https://X/"</li><br/>
  <li>Retourner dans paramètres > Général et copié l'Identifiant de l’app et la Clé secrète pour les ajouter à la place de l'id et secret du champ facebook sur le site config/services.php </li><br/>
  <li> Sur config/service.php, remplacer le redirect par "https://le _nom_de_votre_url/callback"</li><br/>
  <li> Dans le .env, ne pas oublié de remplir les informations lié au serveur et à la bd</li><br/>
</ul>
