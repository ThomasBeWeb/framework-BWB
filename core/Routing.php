<?php
namespace BWB\Framework\mvc;

class Routing {

    private $routing;

    function __construct() {

        $this->routing = json_decode(file_get_contents('./config/routing.json'),true);

    }

    public function getController(){

        $uri = explode("/",$_SERVER['REQUEST_URI']);

        $root = $this->routing;

        //Variable qui recevra le resultat du chemin
        $controllerMethode;
        
        $args = array();

        foreach ($root as $key => $value) {
            
            $url = explode("/",$key);

            if($this->comperes($url,$uri,$args)){
                
                if(is_array($value)){

                    if(isset($value[$_SERVER['REQUEST_METHOD']])){
                        $controllerMethode = $value[$_SERVER['REQUEST_METHOD']];
                    }

                }else{

                    $controllerMethode =  $value;
                }

            }
        }

        return $this->invoke(array($controllerMethode => $args));
    }

    private function comperes($tabA,$tabB,&$args){

        if($this->isEqual($tabA,$tabB)){   //Si les 2 tablX sont de taille égale

            $flag = true;

            //Comparaison un a un des elements des tablX
            for($i = 0 ; $i < count($tabA) ; $i++){

                if($tabA[$i] !== $tabB[$i]){

                    if($tabA[$i] === "µ1"){
                        array_push($args,$tabB[$i]);
                    }else{

                        $flag = false;
                        break;
                    }
                }
            }

        }

        return $flag;
    }

    private function isEqual($tab1,$tab2){
        if(count($tab1) === count($tab2)){
            return true;
        }else{
            return false;
        }
    }

    //Fonction qui recupere le resultat (controller:methode => array des variables), en retour créé l'objet et appelle la bonne méthode dessus
    public function invoke($tab){

        //recup de la clé controller:methode
        $keys = array_keys($tab);

        //Separation du controller et de la methode
        $elements = explode(':',$keys[0]);

        //Creation de l'objet ciblé
        $object = new $elements[0]();

        //Retourne objet + methode
        return call_user_func_array(array($object, $elements[1]), $tab[$keys[0]]);

    }
}