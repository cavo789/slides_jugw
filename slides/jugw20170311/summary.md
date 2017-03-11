# JUGW - Meeting samedi 11 mars 2017

La présentation générale de la journée se trouve sur https://slides.jugwallonie.be

## Présentation sécurité - hacking

La présentation de Jurgen est disponible sur Slideshare : https://www.slideshare.net/JurgenGaeremyn/l33t-h4x0rz.

Jurgen revient sur l'état d'esprit de certaines personnes : "*Pourquoi un hacker viendrait-il hacker mon site de l'école de Vilvoorde ?*".  L'idée tellement généralisée et fausse que les hackeurs viennent pirater uniquement des sites "intéressants" alors que les hackeurs sont, d'abord, des robots, des scripts, qui hackent à tout va à la recherche d'un site failible pour, ensuite, en exploiter ses ressources (envoi de spam, vol de réputation SEO, phising, ...).

### Outils

>Eric, membre de la commission de la vie privée, insiste fortement sur le caractère illégal de l'utilisation de ces outils sur des sites tiers : pour simplifier; on ne peut les utiliser qu'à des fins éducationnelles; sur sa machine locale et jamais sur d'autres serveurs, même ceux de ses clients et même si on est mandaté par ce dernier.

Jurgen nous montre une distribution sur Linux regroupant, prêt à l'emploi, des outils permettant de hacker, de rechercher des informations sur une personne, sur un serveur, ...   Cette distribution est "ready-to-use" et mets donc des outils puissants à la portée de tous : scripts kiddies.

Une fois pénétré, les ordinateurs/serveurs deviennent des zombies.

Suite à cette démo, on comprends vraiment bien qu'il ne faut pas être "un site important" afin d'être hacké : ces outils scannent à tout va, "au petit bonheur la chance" et il suffit d'avoir un nom de domaine (et donc une présence sur internet) pour que ces outils trouvent votre site et tente d'en mettre à mal la sécurité (=penetration tests).

### WIFI

Jurgen nous parle aussi de la technique sous-jacente au réseau WIFI : toutes les communications WIFI passent par le routour qui contacte alors toutes les machines connectées à ce WIFI : "Est-ce toi qui a demandé telle information ?" et chaque machine réponds alors "Oui, c'est moi" ou "Non, ce n'est pas moi".  Une machine malhonnête connectée au même WIFI voit donc passer le traffic des autres machines connectées au même WIFI.  Cette machine malhonnête peut donc voir, analyser et enregistrer vos échanges **à votre insu**.

D'où l'extrême importance de crypter ses informations avant même de les transmettre sur un WIFI et là l'utilité du certificat SSL : une connexion https est cryptée au départ de la machine; transmettre ainsi son login et son mot de passe d'administration n'est pas lisible sur le WIFI.

Transmettre un email via WIFI avec un protocol non sécurisé comme POP ou SMTP : votre email, vos identifiants à votre messagerie, ... tout passe en clair !  Comme si vous envoyiez une carte postale.  Idem si vous faites du FTP, que vous vous connectez sur votre Facebook, webmail, ... tout passe en clair sur le WIFI et peut être écouté.

Jurgen recommande l'utilisation de logiciel type VPN qui permettent de crypter toute l'échange entre votre appareil et le réseau.

### Testing tools

**Qualys SSL Labs**, interface internet permettant de vérifier la sécurisation de son site et de son certificat.

*Information : dans l'hypothèse où vous trouvez une faille sur un site web, il est possible de mentionner cet incident auprès du [CERT](https://cert.be).*

### Quelques recommandations :

> La sécurité n'est pas un projet mais un day-to-day task.

* Faites du HTTPS, SFTP, ...,
* Ne vous connectez jamais sur un WIFI public sans avoir activé, avant la connexion, un VPN sécurisé (outils généralement payant),
* Sécurisez votre site et restez systématiquement à jour (installez les dernières version et sans délai aucun si un patch de sécurité à été publié),
* Ne pensez plus jamais que votre site n'intéresse personne, les hackeurs Oui! car votre serveur leur permet de lancer des attaques (zombies),
* Si vous devriez communiquer des données sensibles (un mot de passe p.ex.), un outil de communication crypté peut-être [framabin.org](http://www.framabin.org) (à titre personnel j'utilise zerobin en auto-hébergé càd installé sur mon propre serveur), 
* Et, last but not least, éduquez votre ... PEBCAK (**mettre le lien wiki**),
* ...



**CHRISTOPHE : Mettre le lien de l'ANSI publié récemment sur FB**

## Présentation Joomla 3.7 / Preview Joomla 4

Survol des fonctionnalités par Marc Dechèvre.

À priori, la version 3.7 est prévue, en version stable, d'ici à fin mars et la version 4 fin de l'année (=ceci est une estimation, cette date est sujette à modification).

Joomla 4 vient avec une toute nouvelle interface d'administration avec un nouveau menu à gauche.

**MARC : À COMPLÉTER PLEASE**

Blog en français de Cyrille Poussin sur J3.7 : [https://www.joomanji.fr/](https://www.joomanji.fr/) 