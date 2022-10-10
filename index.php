<?php

$page = getRequestedPage();
showResponsePage($page);

function getRequestedPage() 
{     
   $requested_type = $_SERVER['REQUEST_METHOD']; 
   if ($requested_type == 'POST') 
   { 
       $requested_page = getPostVar('page','home'); 
   } 
   else 
   { 
       $requested_page = getUrlVar('page','home'); 
   } 
   return $requested_page; 
} 

function showResponsePage($page) 
{ 
   beginDocument(); 
   showHeadSection($page); 
   showBodySection($page); 
   endDocument(); 
}

function getArrayVar($array, $key, $default='') 
{  
   return isset($array[$key]) ? $array[$key] : $default; 
} 

function getPostVar($key, $default='') 
{ 
    return getArrayVar($_POST, $key, $default);

}

function getUrlVar($key, $default='') 
{ 
   return getArrayVar($_GET, $key, $default);
} 

function beginDocument() 
{ 
   echo '<!doctype html> 
<html>'; 
} 

function showHeadSection($page) 
{ 
  echo '<head><title>';  
  switch ($page) {
    case 'home' :
        require_once('home.php');
        showHomeHead();
        break;
    case 'about' :
        require_once('about.php');
        showAboutHead();
        break;
    case 'contact' :
        require_once('contact.php');
        showContactHead();
        break;
    case 'register':
        require_once('register.php');
        showRegisterHead();
        break;
    default:
        echo 'Error : Page NOT Found';

  }
  echo '</title> <link rel="stylesheet" href="CSS/stylesheet.css"> </head>';
} 

function showBodySection($page) 
{ 
   echo '    <body>' . PHP_EOL; 
   showHeader($page);
   showMenu(); 
   showContent($page); 
   showFooter(); 
   echo '    </body>' . PHP_EOL; 
} 

 
function showHeader($page) 
{ 
    echo '<h1>';
    switch ($page) {
        case 'home' :
            require_once('home.php');
            showHomeHeader();
            break;
        case 'about' :
            require_once('about.php');
            showAboutHeader();
            break;
        case 'contact' :
            require_once('contact.php');
            showContactHeader();
            break;
        case 'register':
            require_once('register.php');
            showRegisterHeader();
            break;
        default:
            echo 'Error : Page NOT Found';
    }
    echo '</h1>';

} 

function showMenu() 
{ 
    echo '<div class="links">
    <ul>
      <li><a Href="index.php?page=home">Home</a></li>
      <li><a Href="index.php?page=about">About</a></li>
      <li><a Href="index.php?page=contact">Contact</a></li>
      <li><a Href="index.php?page=register">Register</a></li>
    </ul>
	</div>';

} 

function showContent($page) 
{ 
   switch ($page) 
   { 
       case 'home':
            require_once('home.php');
            showHomeContent();
            break;
       case 'about':
            require_once('about.php');
            showAboutContent();
            break;
       case 'contact':
            require_once('contact.php');
            showContactContent();
            break;
       case 'register':
            require_once('register.php');
            showRegisterContent();
            break;
       default:
            echo 'Error : Page NOT Found';  
   }     
} 

 
function showFooter() 
{ 
  echo '  <footer>
  <h2> &copy;, 2022, Kevin Slieker </h2>
</footer>';
} 


function endDocument() 
{ 
   echo  '</html>'; 
} 
?>