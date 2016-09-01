<?php

/* index.blade.php */
class __TwigTemplate_8461f98a0c15e16ed7a418b984a87215fd2286f716d7bb9beb09a190a20aaa2e extends Twig_Template
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
        echo "<h1>测试124</h1>
<hr>
";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "index.blade.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
/* <h1>测试124</h1>*/
/* <hr>*/
/* {{ title }}*/
