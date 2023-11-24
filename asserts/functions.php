<?php
include("vars.inc");
/**
 * @var $a int - first
 * @var $b int - second
 * @return int - summ 2 
 */
function summ($a, $b): int
{
  global $y;
  return ($a + $b);
}

/**
 * @var $menu array - assoc arr w links
 * @return string
 */

function get_menu(array $menu): string
{

  $page = basename($_SERVER["PHP_SELF"]);
  $res = "<nav class=\"navbar navbar-expand-lg bg-body-tertiary\">
    <div class=\"container-fluid\">
      <a class=\"navbar-brand\" href=\"#index.html\">Site</a>
      <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\"
       aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">";
  foreach ($menu as $k => $l) {
    if ($l == $page) {
      $res .= "<li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"$l\">$k</a>
          </li>";
    } else {
      $res .= "<li class=\"nav-item\">
                <a class=\"nav-link\" aria-current=\"page\" href=\"$l\">$k</a>
              </li>";
    }
  }
  $res .= "</ul>
  </div>
</div>
</nav>";
  return $res;
}
/**
 * возвращ текстовый фрагмент из файла
 * @var $content_file str - path to file
 * @return string - содержимое файла
 */
function get_content(string $content_file): string
{
  return file_get_contents($content_file);
}


function fbForm(): string
{
  $uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/UPLOAD/";
  $fields = [
    "username" => "<b>Name: <b/>",
    "email" => "<b>E-mail: <b/>",
    "textMess" => "<b>Message: <b/>",
  ];
  $res = "";
  if ($_POST["sent"]) {
    foreach ($_POST as $k => $v) {
      if ($v && $v != "Отправить") {
        $res .= $fields[$k] . htmlspecialchars($v) . "<br/>\n";
      }
    }
  }
  if ($_FILES["fileUpload"]["name"]) {
    $uploadFile = $uploadPath . $_FILES["fileUpload"]["name"];
    if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $uploadFile)) {
      $res .= "not sucsses upload file";
    }
  } else {
    $res .= "file is not load";
  }
  return $res;
}
/**
 * @return string with count visits 
 */
function cookies_test(string $cookie_name): string{

  session_start(); //обязательно
  $visit_count = 1;
  if (isset($_COOKIE[$cookie_name])){
    $visit_count += $_COOKIE[$cookie_name];
  }
  setcookie($cookie_name, $visit_count, strtotime("+ 1 minute"),"/");

  return "<p>you to vote: " . $visit_count . "</p>";

}

function session_test(string $session_name): string{
  $visit_count = 1;
  if (isset($_SESSION[$session_name])){
    $visit_count = $_SESSION[$session_name] + 1;
  }

  $_SESSION[$session_name] = $visit_count;
  return "<p>you to vote (session): " . $visit_count . "</p>";

}


?>