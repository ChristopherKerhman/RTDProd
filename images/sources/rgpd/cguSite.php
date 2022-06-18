<?php
$association = $title;
$selectMail = "SELECT `emailContact`, `url`, `adresse` FROM `dataSite` WHERE `idDataSite` = 1";
$void = [];
$readSite = new RCUD($selectMail, $void);
$dataSite = $readSite->READ();
 ?>

<article class="article">
  <h3>Conditions générales d'utilisation du site <?=$association?></h3>
  <h4>ARTICLE 1 : Objet</h4>
  <p>Les présentes « conditions générales d'utilisation » ont pour objet l'encadrement juridique de l’utilisation du site <?=$association?> et de ses services.
<br />
Ce contrat est conclu entre :
<br />
Le gérant du site internet, ci-après désigné « l’Éditeur »,
<br />
Toute personne physique ou morale souhaitant accéder au site et à ses services, ci-après appelé « l’Utilisateur ».
<br />
Les conditions générales d'utilisation doivent être acceptées par tout Utilisateur, et son accès au site vaut acceptation de ces conditions.
</p>
<h4>ARTICLE 2 : Mentions légales</h4>
<p>
  Pour les personnes physiques :
<br />
Ce site web  est édité par l'association <?=$association?> à l'URL suivant : <a href="index.php"><?=$dataSite[0]['url'];?></a><br />
Cette association est domiciliée à cette adresse : <br /><br /><strong><?=$dataSite[0]['adresse'];?></strong><br />
Contacter l'administrateur du site : <a href="mailto:<?=$dataSite[0]['emailContact']?>"><?=$dataSite[0]['emailContact']?></a>
</p>
<h4>ARTICLE 3 : accès aux services</h4>
<p>On ne peut accéder au site web qu'en êtant membre de l'association. Le pré-inscription est assuré par un membre du bureau de celle-ci et
  il vous sera demandé, votre nom et prenom, ainsi qu'un mail. Vous pouvez supprimer cette pré-insciption librement.</p>
<ul>
  <li>Les membres de l'association <?=$association?> a accès aux services suivants sur ce site web :</li>
  <li>Index permettant de visualisé les 6 dernières sorties créées sur le site.</li>
  <li>Ajouter sortie.</li>
  <li>Moteurs (de recherche) des sorties.</li>
  <li>Vos sorties créées.</li>
  <li>Sorties prévus.</li>
  <li>Profil.</li>
  <li>Déconnexion du site,</li>
  <li>Possibilité de s’inscrire à une sortie,</li>
</ul>
<p>Tout Utilisateur ayant accès a internet peut accéder gratuitement et depuis n’importe où au site. Les frais supportés par l’Utilisateur pour y accéder (connexion internet, matériel informatique, etc.) ne sont pas à la charge de l’Éditeur.</p>
<ul>
  <li>Les services suivants ne sont pas accessible pour les membres de l'association que s’il a un compte actif sur site de <?=$association?> (c’est-à-dire qu’ile st identifié à l’aide de ses identifiants de connexion) :</li>
  <li>Création d’un compte utilisateur.</li>
  <li>Ajouter sortie.</li>
  <li>Moteurs (de recherche) des sorties.</li>
  <li>Vos sorties créées.</li>
  <li>Sorties prévus.</li>
  <li>Annuler une sortie, la dupliquer,</li>
  <li>S'incrire ou se désincrire d'une sortie,</li>
  <li>Son profil et supprimer son compte,</li>
  <li>Les compte public de l'association, </li>
  <li>Déconnexion du site,</li>
</ul>
<p>Le site et ses différents services peuvent être interrompus ou suspendus par <?=$association?>, notamment à l’occasion d’une maintenance, sans obligation de préavis ou de justification.</p>
<h4>ARTICLE 4 : Responsabilité de l’Utilisateur</h4>
<p>L'Utilisateur est responsable des risques liés à l’utilisation de son identifiant de connexion et de son mot de passe.
<br />
Le mot de passe de l’Utilisateur doit rester secret. En cas de divulgation de mot de passe, l’Éditeur décline toute responsabilité.
<br />
L’Utilisateur assume l’entière responsabilité de l’utilisation qu’il fait des informations et contenus présents sur le site : <?=$dataSite[0]['url'];?>.
<br />
Tout usage du service par l'Utilisateur ayant directement ou indirectement pour conséquence des dommages doit faire l'objet d'une indemnisation au profit du site.
<br />
<ul>
  <li>Le site permet aux membres de publier sur le site :</li>
  <li>Des sorties de divers natures lier à l'association <?=$association?>.</li>
  <li>Il est de la responsabilité des créateurs de ces sorties d'en assumer l'organisation total. Notamment en étant présent à ces sorties organisé le jour, l'heure et le lieu de rendez-vous.</li>
</ul>
<br />
Le membre s’engage à tenir des propos respectueux des autres et de la loi et accepte que ces publications soient modérées ou refusées par l’Éditeur, sans obligation de justification.
<br />
En publiant sur le site, l’Utilisateur cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé.
<br />
L’Éditeur s'engage toutefois à citer le membre en cas d’utilisation de  sa publication.
<br />
<h4>Limite des sorties :</h4>
<p>Les sorties ne peuvent avoir lieu que sur le territoire français. Il n’est pas prévus d’extension au reste du monde. </p>

<h4>Un compte par Utilisateur :</h4>

<p>Chaque membre doit avoir un compte pour s’inscrire au sortie ou commenter une sortie où elle serait inscrite.</p>

<h4>Comportement lors des sorties :</h4>

<p>Il est de la responsabilité des Utilisateurs de se comporter correctement lors des sorties, arrivé à l’heure, avoir une tenu correcte et se comporter de manière sociable.
</p>
<h4>Les sorties doivent être toutes légales :</h4>

<p>Les sorties proposé doivent toute être dans le stricte cadre de la légalité. Les sorties qui ne seraient pas dans le respect de la loi,
  entraineront une exclusion des comptes Utilisateur ayant participé à cette sortie et aussi une exclusion de l’Utilisateur organisateur de la sortie.
  Ainsi qu’un signalement aux autorités compétentes.
</p>

<h4>Les sorties “+13, +16, +18” :</h4>

<p>Leur titre ou les commentaires sur ce type de sortie pouvant heurté la sensibilité. Ainsi, si vous êtes une personne sensible, ignoré simplement ce type de recherche, elle ne vous seront normalement jamais imposé.
  Eviter le plus possible de heurté la sensibilité du publique dans la description de votre sortie (pas de contenus pornographique par exemple).
<br />
Ces sorties peuvent être de divers nature, noté toutefois, de modérer vos propos sur les commentaires de ces sorties et rester dans le strict respect
de l’ensemble des Utilisateurs.
Si ces sorties vous choque ou ébranle vos convictions personnelle, ignorez les simplement.
<br />
Si vous pensez qu’elles sont de nature illégale, signaler celle-ci par mail : <a href="mailto:<?=$dataSite[0]['emailContact']?>"><?=$dataSite[0]['emailContact']?></a>
les éléments qui vous semble problématiques.
</p>
<h4>Les sortie “+13, +16, +18” qui ont été mal répertorié ?</h4>
<p>L’organisateur d’une tel sortie est invité dans les plus bref delais à supprimer cette sortie et la remettre en ligne avec le bon niveau d'accessibilité.<br />
Si vous ne le faite pas et qu’un Utilisateur le signale à la modération ou que la modération s’en rend compte, il va invalider votre sortie puis sanctionner votre erreur par une suppression de votre compte sur le site sans avertissement.
</p>
</p>
<h4>ARTICLE 5 : Responsabilité de l’Éditeur</h4>
<p>Tout dysfonctionnement du serveur ou du réseau ne peut engager la responsabilité de l’Éditeur.
<br />
De même, la responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d'un tiers.
<br />
Le site <?=$association?> s'engage à mettre en œuvre tous les moyens nécessaires pour garantir la sécurité et la confidentialité des données. Toutefois, il n’apporte pas une garantie de sécurité totale.
<br />
L’Éditeur se réserve la faculté d’une non-garantie de la fiabilité des sources, bien que les informations diffusées su le site soient réputées fiables.</p>
<h4>ARTICLE 6 : Propriété intellectuelle</h4>
<p>Les contenus du site <?=$association?> (logos, textes, éléments graphiques, vidéos, etc.) son protégés par le droit d’auteur, en vertu du Code de la propriété intellectuelle.
<br />
L’Utilisateur devra obtenir l’autorisation de l’éditeur du site avant toute reproduction, copie ou publication de ces différents contenus.
<br />
Ces derniers peuvent être utilisés par les utilisateurs à des fins privées ; tout usage commercial est interdit.
<br />
L’Utilisateur est entièrement responsable de tout contenu qu’il met en ligne et il s’engage à ne pas porter atteinte à un tiers.
<br />
L’Éditeur du site se réserve le droit de modérer ou de supprimer librement et à tout moment les contenus mis en ligne par les utilisateurs,
et ce sans justification.</p>
<h4>ARTICLE 7 : Données personnelles</h4>
<p>L’Utilisateur doit obligatoirement fournir des informations personnelles pour procéder à son inscription sur le site.
<br />
L’adresse électronique (e-mail) de l’utilisateur pourra notamment être utilisée par le site <?=$association?> pour
la communication d’informations diverses et la gestion du compte. Notamment, l’envois de token de sécurité, permettant de valider son compte et modifier son mot de passe. Ces tokens sont par nature unique.
<br />
<?=$association?> garantie le respect de la vie privée de l’utilisateur, conformément à la loi n°78-17 du 6 janvier 1978
relative à l'informatique, aux fichiers et aux libertés.
<br />
En vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l'Utilisateur dispose d'un droit d'accès, de rectification,
de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit via :
<ul>
  <li>Son espace personnel sur le site ; il suffit de selectionner «supprimer mon compte » dans profil et répondre Oui, il faut aussi ajouter 0 à la fin de son login pour que cette suppression soit prise en compte.</li>
  <li>Un formulaire de contact ; prévus sans connexion au site permet de contacter directement l’administrateur du site.</li>
  <li>Par mail à  <a href="mailto:<?=$dataSite[0]['emailContact']?>"><?=$dataSite[0]['emailContact']?></a> </li>
</ul>

  </p>
<h4>ARTICLE 8 : Liens hypertextes</h4>
<p>Les domaines vers lesquels mènent les liens hypertextes présents sur le site n’engagent pas la responsabilité de l’Éditeur de <?=$association?>, qui n’a pas de contrôle sur ces liens.

Il est possible pour un tiers de créer un lien vers une page du site <?=$association?> sans autorisation expresse de l’éditeur.</p>
<h4>ARTICLE 9 : Évolution des conditions générales d’utilisation</h4>
<p>Le site <?=$association?>  se réserve le droit de modifier les clauses de ces conditions générales d’utilisation à tout moment et sans justification.</p>
<h4>ARTICLE 10 : Durée du contrat</h4>
<p>La durée du présent contrat est indéterminée. Le contrat produit ses effets à l'égard de l'Utilisateur à compter du début de l’utilisation du service.
</p>
<h4>ARTICLE 11 : Droit applicable et juridiction compétente</h4>
<p>Le présent contrat dépend de la législation française.
En cas de litige non résolu à l’amiable entre l’Utilisateur et l’Éditeur, les tribunaux de <?=$association?> sont compétents pour régler le contentieux.</p>

</article>
