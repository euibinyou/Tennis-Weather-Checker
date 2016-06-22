<?php

/* sites/all/modules/custom/loremipsum/templates/loremipsum.html.twig */
class __TwigTemplate_9aa37bdb6db4552542c0d9d00ab642d005f6c9d16317ad7c2b7c981fc2d9142b extends Twig_Template
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
        $tags = array("for" => 15);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 14
        echo "<div class=\"loremipsum\">
";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["source_text"]) ? $context["source_text"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 16
            echo "  <p>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["item"], "html", null, true));
            echo "</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "sites/all/modules/custom/loremipsum/templates/loremipsum.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 18,  50 => 16,  46 => 15,  43 => 14,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation to print Lorem ipsum text.*/
/*  **/
/*  * Available variables:*/
/*  *   - source_text*/
/*  **/
/*  * @see template_preprocess_loremipsum()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <div class="loremipsum">*/
/* {% for item in source_text %}*/
/*   <p>{{ item }}</p>*/
/* {% endfor %}*/
/* </div>*/
/* */
