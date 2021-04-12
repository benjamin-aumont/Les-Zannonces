<?php
/**
 * Moteur de template simple.
 *
 * Les pages doivent être stockées dans le répertoire pages/ et porter l'extension '.inc.php'. Une page peut retourner l'exception NotConnectedException si elle requière la connexion de l'utilisateur pour être affichée.
 * Les templates doivent être stockées dans le répertoire templates/. Ce sont des répertoires qui portent le nom du template et doivent contenir le fichier 'template.php' (ainsi que les éventuelles ressources liées au template: images, etc...)
 *
 * Utilisation basique :
 *   $doc = new HtmlDocument('mapage') ;
 *   $doc->applyTemplate('defaut') ;
 *   $doc->render() ;
 */
namespace petitesAnnonces;
class HtmlDocument {
	
    protected $mainFilePath;// chemin
    protected $templateName;
    protected $headers; //Tableau associatif --> contenu balise <head>
    protected $mainContent; //Contenu balise <main>
    protected $bodyContent; //Contenu balise <body>
    private static $currentInstance;// singleton

    public function __construct($filename)
    {

        if(!isset(self::$currentInstance)) {
            self::$currentInstance = $this;
        }
        else {
            throw new Exception("Attention je suis dans un singleton...");
        }
        $this->headers = array();

        $this->mainFilePath = ROOT . '/pages/' . $filename . ".main.php";
    }

    protected function parseMain() {
        ob_start();
        include $this->mainFilePath;
        $this->mainContent = ob_get_clean();
    }

    protected function parseTemplate() {

    }

    public function applyTemplate($templateName) {
        $this->templateName = $templateName;
        $this->parseMain();

        ob_start();
        include ROOT . '/templates/' . $this->templateName . '/template.php';
        $this->bodyContent = ob_get_clean();
    }

    public function render() {
        echo "<!DOCTYPE html><br/>";
        echo "<html lang='en'>";
        echo "<head>";
        foreach ($this->headers as $header) {
            echo $header;
        }
        echo "</head>";
        echo "<body>";
        echo $this->bodyContent;
        echo "</body>";
        echo "</html>";
    }

    public function addHeader($html) {
        $this->headers[] = $html;
    }

    public function getMainContent() {
        return $this->mainContent;
    }

    public static function getCurrentInstance() {
        return self::$currentInstance;
    }
}
