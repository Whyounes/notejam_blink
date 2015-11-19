<?php

/* layouts/layout.htm */
class __TwigTemplate_42793b70bc38c24844a90ccf3511369bc5557f42cb126bc592d4e200f2674bd4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pads' => array($this, 'block_pads'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7 ]><html class=\"ie ie6\" lang=\"en\"> <![endif]-->
<!--[if IE 7 ]><html class=\"ie ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 8 ]><html class=\"ie ie8\" lang=\"en\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang=\"en\"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset=\"utf-8\">
    <title>";
        // line 11
        $this->displayBlock("page_title", $context, $blocks);
        echo "</title>
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">

    <!-- CSS
  ================================================== -->
  <link type=\"text/css\" rel=\"stylesheet\" href=\"http://cdnjs.cloudflare.com/ajax/libs/skeleton/1.2/base.min.css\"/>
  <link type=\"text/css\" rel=\"stylesheet\" href=\"http://cdnjs.cloudflare.com/ajax/libs/skeleton/1.2/skeleton.min.css\"/>
  <link type=\"text/css\" rel=\"stylesheet\" href=\"http://cdnjs.cloudflare.com/ajax/libs/skeleton/1.2/layout.css\"/>
  <link type=\"text/css\" rel=\"stylesheet\" href=\"https://raw.githubusercontent.com/komarserjio/notejam/master/laravel/notejam/public/css/style.css\"/>

    <!--[if lt IE 9]>
        <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->
</head>
<body>
    <div class=\"container\">
        <div class=\"sixteen columns\">
            <div class=\"sign-in-out-block\">
                ";
        // line 34
        if ((isset($context["user"]) ? $context["user"] : null)) {
            // line 35
            echo "                    email:&nbsp; <a href=\"/settings\">Account Settings</a> &nbsp;&nbsp;&nbsp;<a href=\"/signout\">Sign out</a>
                ";
        } else {
            // line 37
            echo "                    <a href=\"/signup\">Sign up</a>&nbsp;&nbsp;&nbsp;<a href=\"/signin\">Sign in</a>
                ";
        }
        // line 39
        echo "            </div>
        </div>
        <div class=\"sixteen columns\">
            <h1 class=\"bold-header\">
                <a href=\"/all_notes\" class=\"header\">note<span class=\"jam\">jam: </span></a>
                <span>";
        // line 44
        $this->displayBlock("page_title", $context, $blocks);
        echo "</span>
            </h1>
        </div>
        
        ";
        // line 48
        $this->displayBlock('pads', $context, $blocks);
        // line 49
        echo "
        <div class=\"content_class columns content-area\">
            ";
        // line 51
        $this->loadTemplate("partials/errors.htm", "layouts/layout.htm", 51)->display($context);
        // line 52
        echo "
            ";
        // line 53
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "        </div>
        <hr class=\"footer\" />
        <div class=\"footer\">
            <div>Notejam: <strong>Blink</strong> application</div>
            <div><a href=\"https://github.com/komarserjio/notejam\">Github</a>, <a href=\"https://twitter.com/RAFIEYounes\">Twitter</a>, created by <a href=\"https://github.com/whyounes/\">RAFIE Younes</a></div>
        </div>
    </div><!-- container -->
    <a href=\"https://github.com/Whyounes\"><img style=\"position: absolute; top: 0; right: 0; border: 0;\" src=\"https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png\" alt=\"Fork me on GitHub\"></a>
</body>
</html>";
    }

    // line 48
    public function block_pads($context, array $blocks = array())
    {
    }

    // line 53
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/layout.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 53,  109 => 48,  96 => 54,  94 => 53,  91 => 52,  89 => 51,  85 => 49,  83 => 48,  76 => 44,  69 => 39,  65 => 37,  61 => 35,  59 => 34,  33 => 11,  21 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->*/
/* <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->*/
/* <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->*/
/* <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->*/
/* <head>*/
/* */
/*     <!-- Basic Page Needs*/
/*   ================================================== -->*/
/*     <meta charset="utf-8">*/
/*     <title>{{ block('page_title') }}</title>*/
/*     <meta name="description" content="">*/
/*     <meta name="author" content="">*/
/* */
/*     <!-- Mobile Specific Metas*/
/*   ================================================== -->*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">*/
/* */
/*     <!-- CSS*/
/*   ================================================== -->*/
/*   <link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/skeleton/1.2/base.min.css"/>*/
/*   <link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/skeleton/1.2/skeleton.min.css"/>*/
/*   <link type="text/css" rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/skeleton/1.2/layout.css"/>*/
/*   <link type="text/css" rel="stylesheet" href="https://raw.githubusercontent.com/komarserjio/notejam/master/laravel/notejam/public/css/style.css"/>*/
/* */
/*     <!--[if lt IE 9]>*/
/*         <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>*/
/*     <![endif]-->*/
/* </head>*/
/* <body>*/
/*     <div class="container">*/
/*         <div class="sixteen columns">*/
/*             <div class="sign-in-out-block">*/
/*                 {% if user %}*/
/*                     email:&nbsp; <a href="/settings">Account Settings</a> &nbsp;&nbsp;&nbsp;<a href="/signout">Sign out</a>*/
/*                 {% else %}*/
/*                     <a href="/signup">Sign up</a>&nbsp;&nbsp;&nbsp;<a href="/signin">Sign in</a>*/
/*                 {% endif %}*/
/*             </div>*/
/*         </div>*/
/*         <div class="sixteen columns">*/
/*             <h1 class="bold-header">*/
/*                 <a href="/all_notes" class="header">note<span class="jam">jam: </span></a>*/
/*                 <span>{{ block('page_title') }}</span>*/
/*             </h1>*/
/*         </div>*/
/*         */
/*         {% block pads %}{% endblock %}*/
/* */
/*         <div class="content_class columns content-area">*/
/*             {% include 'partials/errors.htm' %}*/
/* */
/*             {% block content %}{% endblock %}*/
/*         </div>*/
/*         <hr class="footer" />*/
/*         <div class="footer">*/
/*             <div>Notejam: <strong>Blink</strong> application</div>*/
/*             <div><a href="https://github.com/komarserjio/notejam">Github</a>, <a href="https://twitter.com/RAFIEYounes">Twitter</a>, created by <a href="https://github.com/whyounes/">RAFIE Younes</a></div>*/
/*         </div>*/
/*     </div><!-- container -->*/
/*     <a href="https://github.com/Whyounes"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>*/
/* </body>*/
/* </html>*/
