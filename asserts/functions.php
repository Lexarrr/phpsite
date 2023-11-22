<?php
include("vars.inc");
/**
 * @var $a int - first
 * @var $b int - second
 * @return int - summ 2 
 */
function summ($a, $b) : int { 
    global $y;
    return ($a + $b);
} 

/**
 * @var $menu array - assoc arr w links
 * @return string
 */

function get_menu(array $menu) : string {
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
        $res .= "</ul>
        </div>
      </div>
    </nav>";
        return $res;
    }
}
/**
 * возвращ текстовый фрагмент из файла
 * @var $content_file str - path to file
 * @return string - содержимое файла
 */
function get_content(string $content_file) : string {
    return file_get_contents($content_file);
}
?>