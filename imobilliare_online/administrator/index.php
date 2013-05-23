<?php
include_once("model/administrator_class.php");

include_once("../lib/lib.php");
		include_once("../includes/mysqli.php");
		include_once("../includes/db.php");
		include_once("../includes/session.inc");	
		include_once("../core/error/error_class.php");
		include_once("../utilities/portlet/portlet_class.php");	

		include_once("../utilities/util.php");		
		include_once("../lib/lib_errors.php");		
		include_once("../lib/lib_special.php");
		include_once("../lib/lib_util.php");				
		
		
		include_once("../utilities/template/template_class.php");
		include_once("../core/email/email_class.php");
		include_once("../core/site/site_class.php");
		include_once("../core/footer/footer_class.php");
		include_once("../core/error/error.php");
		include_once("../core/position/position_class.php");
		include_once("../core/menus/model/menu_class.php");
		
		/*controllers*/
		include_once("../features/user/controller/controller_class.php");
		
		
		include_once("../features/model/features_class.php");
		include_once("../features/user/model/user_class.php");
		include_once("../features/user/developer/model/developer_class.php");
		include_once("../features/user/employer/model/employer_class.php");
		include_once("../features/search/model/search_class.php");
		include_once("../features/user/model/user_class.php");
		include_once("../features/user/model/login/model/login_class.php");
		include_once("../features/user/model/problems/model/problems_class.php");
		include_once("../features/user/model/toolbox/model/toolbox_class.php");
		include_once("../features/user/model/problems/model/problems_class.php");
		include_once("../features/user/model/register/model/register_class.php");
		include_once("../features/project/model/project_class.php");
		include_once("../features/billing/model/billing_class.php");
		include_once("../features/articles/model/articles_class.php");
		include_once("../features/newsletter/model/newsletter_class.php");
		include_once("../features/search/model/search_class.php");
		include_once("../features/sitemap/model/sitemap_class.php");
		include_once("../features/contact/model/contact_class.php");


	
		/*controllers*/
		include_once("../features/project/controller/controller.php");
		include_once("../features/user/model/login/controller/controller_class.php");
		include_once("../features/user/model/problems/controller/controller_class.php");
		include_once("../features/user/controller/controller_user.php");
		include_once("../features/billing/controller/controller.php");
		include_once("../features/articles/controller/articles.php");
		include_once("../features/newsletter/controller/newsletter.php");
		include_once("../features/search/controller/search.php");
		include_once("../features/sitemap/controller/site_map.php");
		include_once("../features/controller/features.php");
		include_once("../utilities/template/template.php");
		include_once("../utilities/updates/update.php");
		include_once("../core/site/site.php");
		include_once("../core/footer/footer.php");
		include_once("../core/position/position.php");
		include_once("../core/images/images.php");
		include_once("../core/menus/controller/menu.php");
		include_once("../features/contact/controller/contact.php");
		
		include_once("../administrator/controller/admin.php");


ADMINISTRATOR::insertRightFile($_REQUEST['fid']);
?>