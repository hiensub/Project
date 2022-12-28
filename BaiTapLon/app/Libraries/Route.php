<?php
namespace App\Libraries;
class Route
{

//Thuoc tinh property
public $bien = null;
//phuong thuc method
// public function __construct($page = 'site')
// {
//     switch($page){

//         case 'site':{
//             echo $this-> route_site();
//             break;
//         }
        
//         case 'admin':{
//             echo $this-> route_admin();
//             break;
//         }
//         default: {
//             echo $this-> route_site();
//             break;
//         }
//     }
   

// }

public static function route_site()
{

    $pathView = 'views/frontend/';
    if(isset($_REQUEST['option'])){
        $pathView .= $_REQUEST['option'];
        if(isset($_REQUEST['id'])){
            $pathView .= '-detail.php';
        }
        else{

            if(isset($_REQUEST['cat'])){
                $pathView .= '-category.php';

            }
            else{

                $pathView .= '.php';
 
            }
        }  
    
    }
    else{
        $pathView .= 'home.php';    
    }
    //goi
    require_once($pathView);
}
public static function route_admin()
{
    $pathView = '../views/backend/';

    if(isset($_REQUEST['option']))
    {
        $pathView .= $_REQUEST['option'] . "/";
        if(isset($_REQUEST['cat'])){
            $pathView .= $_REQUEST['cat'] . ".php";
        }
        else{
            $pathView .=  "index.php";
        }
    }
    else
    {

         $pathView .="dashboard/index.php";
    }
    require_once($pathView);
   
}

}