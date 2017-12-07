switch ($doc_type)
{
  case 'content' :
  include_once('includes/functions/loader.inc');
  if ($class == 'index')
  {
    if (!empty($si) && ($si->default_home_page == 'content'))
    {
      include_once THEME_DIR . '/home_page_template.php';
    }
    else if (!empty($si) && !empty(($si->default_home_page)))
    {
      include_once THEME_DIR . $si->default_home_page;
    }
    else
    {
      header('location: form.php?class_name=user_dashboard_v');
    }
  }
  else
  {
    include_once 'content.php';
  }
  break;

  case 'product' :
  include_once 'product.php';
  break;

  case 'form' :
  include_once 'form.php';
  break;

  case 'pform' :
  include_once __DIR__.'/public/public_form.php';
  break;

  default :
  include_once 'content.php';
  break;
}