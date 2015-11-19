<?php

/* partials/errors.htm */
class __TwigTemplate_41f03f4a59f192e9d6ae864b750c51912b5ad09c1def3788108109ef81699619 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (($this->getAttribute((isset($context["session"]) ? $context["session"] : null), "get", array(0 => "success"), "method") || $this->getAttribute((isset($context["session"]) ? $context["session"] : null), "get", array(0 => "errors"), "method"))) {
            // line 2
            echo "    <div class=\"alert-area\">
        ";
            // line 3
            if ($this->getAttribute((isset($context["session"]) ? $context["session"] : null), "get", array(0 => "success"), "method")) {
                // line 4
                echo "            <div class=\"alert alert-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["session"]) ? $context["session"] : null), "get", array(0 => "success"), "method"), "html", null, true);
                echo "</div>
        ";
            }
            // line 6
            echo "        ";
            if ($this->getAttribute((isset($context["session"]) ? $context["session"] : null), "get", array(0 => "errors"), "method")) {
                // line 7
                echo "            <div class=\"alert alert-error\">
                ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["session"]) ? $context["session"] : null), "get", array(0 => "errors"), "method"));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 9
                    echo "                    <ul class=\"errorlist\">
                        <li>";
                    // line 10
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</li>
                    </ul>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "            </div>
        ";
            }
            // line 15
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/errors.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 15,  54 => 13,  45 => 10,  42 => 9,  38 => 8,  35 => 7,  32 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if session.get('success') or session.get('errors') %}*/
/*     <div class="alert-area">*/
/*         {% if session.get('success') %}*/
/*             <div class="alert alert-success">{{ session.get('success') }}</div>*/
/*         {% endif %}*/
/*         {% if session.get('errors') %}*/
/*             <div class="alert alert-error">*/
/*                 {% for error in session.get('errors') %}*/
/*                     <ul class="errorlist">*/
/*                         <li>{{ error }}</li>*/
/*                     </ul>*/
/*                 {% endfor %}*/
/*             </div>*/
/*         {% endif %}*/
/*     </div>*/
/* {% endif %}*/
