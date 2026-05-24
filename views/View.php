<?php
declare(strict_types=1);
namespace App\views;

class View {

    public string $title;

    /*
    *Allows you to display the page title
    */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
    * This method returns a complete page.
    * @param string $viewPath: the path to the view requested by the controller.
    * @param array $params: the parameters that the controller sent to the view.
    * @return void
    */
    public function render(string $viewName, array $params = []) : void {
        $viewPath = $this->viewPath($viewName);
        $content = $this->_renderViewFromTemplate($viewPath, $params);
        $title = $this->title;

        //bufferisation :
        ob_start();
        require("Main.php");
        echo ob_get_clean();
    }

    /**
     * The heart of the class is where what the controller requested is generated.
     * @param $viewPath : the path to the view requested by the controller.
     * @param array $params : the parameters that the controller sent to the view.
     * @throws Exception : if this view doesn't exist
     * @return string : content of the view.
     */
    private function _renderViewFromTemplate(string $viewPath, array $params = []) : string
    {  
        if (file_exists($viewPath)) {
            extract($params);
            ob_start();
            require($viewPath);
            return ob_get_clean();
        } else {
            throw new \Exception("La vue '$viewPath' est introuvable.");
        }
    }

    /**
     * This methode return a path for template 
     * @param string $viewName : Name of the view requested..
     * @return string
     */    
    private function viewPath (string $viewName) : string {
        return __DIR__ . '/templates/' . $viewName . '.php';
    }
}