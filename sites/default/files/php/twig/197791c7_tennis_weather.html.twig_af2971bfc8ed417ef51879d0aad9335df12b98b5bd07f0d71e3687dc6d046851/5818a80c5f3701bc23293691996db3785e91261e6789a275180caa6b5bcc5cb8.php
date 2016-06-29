<?php

/* sites/all/modules/custom/tennis_weather/templates/tennis_weather.html.twig */
class __TwigTemplate_661233ecb0ffe2929ba78fd3bfd1bdbd5cbd70a0d497642d26c7de225c6fc084 extends Twig_Template
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
        $tags = array("for" => 26);
        $filters = array("raw" => 27);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for'),
                array('raw'),
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

        // line 13
        echo "<h1><strong>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["subheading"]) ? $context["subheading"] : null), "html", null, true));
        echo "</strong><h1>
<div>
<p>";
        // line 15
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["summary"]) ? $context["summary"] : null), "html", null, true));
        echo "</p>
</div>
<div>
<strong>Current conditions</strong>
<br />
<img src=\"";
        // line 20
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["current_icon"]) ? $context["current_icon"] : null), "html", null, true));
        echo "\">&ensp;";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "text", array()), "html", null, true));
        echo "<br />
Temperature: ";
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "temp", array()), "html", null, true));
        echo " &deg;F<br />
Wind: ";
        // line 22
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "precip", array()), "html", null, true));
        echo " mph<br />
<br />
<strong>Forecast</strong>
<br />
";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forecast"]) ? $context["forecast"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "  <font color=";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true));
            echo ">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($context["item"], "string", array())));
            echo "</font><br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "<small>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["timestamp"]) ? $context["timestamp"] : null), "html", null, true));
        echo "</small>
<br /><br />
</div>
<strong>MySQL</strong><br />
";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["database_test"]) ? $context["database_test"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["item"], "html", null, true));
            echo "<br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "<br />
<br />
<br />
<small>Debug:</small><br />
";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 41
            echo "  <small>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["line"], "html", null, true));
            echo "</small><br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "sites/all/modules/custom/tennis_weather/templates/tennis_weather.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 41,  116 => 40,  110 => 36,  101 => 34,  97 => 33,  89 => 29,  78 => 27,  74 => 26,  67 => 22,  63 => 21,  57 => 20,  49 => 15,  43 => 13,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for Tennis Weather Checker.*/
/*  **/
/*  * Available variables:*/
/*  *   - subheading*/
/*  *   - summary*/
/*  *   - weather_text*/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <h1><strong>{{ subheading }}</strong><h1>*/
/* <div>*/
/* <p>{{ summary }}</p>*/
/* </div>*/
/* <div>*/
/* <strong>Current conditions</strong>*/
/* <br />*/
/* <img src="{{current_icon}}">&ensp;{{ current_cond.text }}<br />*/
/* Temperature: {{ current_cond.temp }} &deg;F<br />*/
/* Wind: {{ current_cond.precip }} mph<br />*/
/* <br />*/
/* <strong>Forecast</strong>*/
/* <br />*/
/* {% for item in forecast %}*/
/*   <font color={{ item.color }}>{{ item.string|raw }}</font><br />*/
/* {% endfor %}*/
/* <small>{{ timestamp }}</small>*/
/* <br /><br />*/
/* </div>*/
/* <strong>MySQL</strong><br />*/
/* {% for item in database_test %}*/
/*   {{ item }}<br />*/
/* {% endfor %}*/
/* <br />*/
/* <br />*/
/* <br />*/
/* <small>Debug:</small><br />*/
/* {% for line in debug_info %}*/
/*   <small>{{ line }}</small><br />*/
/* {% endfor %}*/
/* */
