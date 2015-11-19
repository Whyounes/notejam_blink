<?php

/* user/settings.htm */
class __TwigTemplate_bbbb651737a0453b648b29cec294355f4f3db905c062de7bb77e9e16f0ba1179 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/layout.htm", "user/settings.htm", 1);
        $this->blocks = array(
            'page_title' => array($this, 'block_page_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/layout.htm";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_title($context, array $blocks = array())
    {
        echo "Account Settings";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form action=\"/settings\" method=\"POST\" class=\"offset-by-six\">
        <label for=\"old_password\">Old Password</label>
        <input type=\"password\" value=\"\" name=\"old_password\" id=\"old_password\" />

        <label for=\"password\">Password</label>
        <input type=\"password\" value=\"\" name=\"password\" id=\"password\" />

        <label for=\"password_confirmation\">Password Confirmation</label>
        <input type=\"password\" value=\"\" name=\"password_confirmation\" id=\"password_confirmation\" />

        <input type=\"submit\" value=\"Update\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "user/settings.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'layouts/layout.htm' %}*/
/* */
/* {% block page_title %}Account Settings{% endblock %}*/
/* */
/* {% block content %}*/
/*     <form action="/settings" method="POST" class="offset-by-six">*/
/*         <label for="old_password">Old Password</label>*/
/*         <input type="password" value="" name="old_password" id="old_password" />*/
/* */
/*         <label for="password">Password</label>*/
/*         <input type="password" value="" name="password" id="password" />*/
/* */
/*         <label for="password_confirmation">Password Confirmation</label>*/
/*         <input type="password" value="" name="password_confirmation" id="password_confirmation" />*/
/* */
/*         <input type="submit" value="Update" />*/
/*     </form>*/
/* {% endblock %}*/
