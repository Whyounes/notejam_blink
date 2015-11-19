<?php

/* user/signin.htm */
class __TwigTemplate_0f08bbbef3a78be2391ac5f1ab783de36cb41ce754f1c66b0978daf76d12aed9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/layout.htm", "user/signin.htm", 1);
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
        echo "Sign In";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form action=\"/signin\" method=\"POST\" class=\"offset-by-six\">
        <label for=\"email\">E-mail</label>
        <input type=\"email\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["oldInputs"]) ? $context["oldInputs"] : null), "email", array()), "html", null, true);
        echo "\" name=\"email\" id=\"email\" />

        <label for=\"email\">Password</label>
        <input type=\"password\" value=\"\" name=\"password\" id=\"password\" />

        <input type=\"submit\" value=\"Sign in\" /> or <a href=\"/signup\">Sign up</a>
        <hr />
        <p><a class=\"small-red\" href=\"/forgot_password\">Forgot Password?</a></p>
    </form>
";
    }

    public function getTemplateName()
    {
        return "user/signin.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'layouts/layout.htm' %}*/
/* */
/* {% block page_title %}Sign In{% endblock %}*/
/* */
/* {% block content %}*/
/*     <form action="/signin" method="POST" class="offset-by-six">*/
/*         <label for="email">E-mail</label>*/
/*         <input type="email" value="{{ oldInputs.email }}" name="email" id="email" />*/
/* */
/*         <label for="email">Password</label>*/
/*         <input type="password" value="" name="password" id="password" />*/
/* */
/*         <input type="submit" value="Sign in" /> or <a href="/signup">Sign up</a>*/
/*         <hr />*/
/*         <p><a class="small-red" href="/forgot_password">Forgot Password?</a></p>*/
/*     </form>*/
/* {% endblock %}*/
