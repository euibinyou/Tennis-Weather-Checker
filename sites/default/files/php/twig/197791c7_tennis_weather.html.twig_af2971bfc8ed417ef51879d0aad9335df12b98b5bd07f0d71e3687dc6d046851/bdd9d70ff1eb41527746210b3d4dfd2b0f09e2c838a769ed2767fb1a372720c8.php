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
        $tags = array("if" => 31, "for" => 58);
        $filters = array("raw" => 50);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for'),
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
        echo "<style>
#img_div {
  position: relative;
  display: inline;
}
#img_base {
  position: absolute;
  bottom: -10;
  right: -10;
}
.body_text {
  font-family: Consolas, Monaco, 'Lucida Sans Typewriter', monospace;
}
.body_title {
  font-weight: bold;
  size: 4;
}
</style>
";
        // line 31
        if ($this->getAttribute((isset($context["debug_info"]) ? $context["debug_info"] : null), "error", array())) {
            // line 32
            echo "  <font size=\"5\"><b>Error!</b></font><br />
";
        } else {
            // line 34
            echo "  <font size=\"5\"><b>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["subheading"]) ? $context["subheading"] : null), "html", null, true));
            echo "</b></font><br />
  <small>";
            // line 35
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["timestamp"]) ? $context["timestamp"] : null), "html", null, true));
            echo "</small><br /><br />
  <div>
    <font class=\"body_title\">Current conditions</font><br />
    <img style=\"display: block; vertical-align: middle;  margin-right: 8px; float: left;\" src=\"";
            // line 38
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["current_icon"]) ? $context["current_icon"] : null), "html", null, true));
            echo "\" />
      <span style=\"display: block; overflow: auto;\">
        <font class=\"body_text\">
          ";
            // line 41
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "text", array()), "html", null, true));
            echo "<br />
          Temperature: ";
            // line 42
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "temp", array()), "html", null, true));
            echo " &deg;F<br />
          Wind: ";
            // line 43
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "precip", array()), "html", null, true));
            echo " mph<br />
        </font>
      </span>
    </font>
  </div>
  <p>
    <font class=\"body_text\"><br />
      ";
            // line 50
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["summary"]) ? $context["summary"] : null), "today", array())));
            echo "<br />
      ";
            // line 51
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["summary"]) ? $context["summary"] : null), "hr", array())));
            echo "<br />
    </font>
  </p>
  <font class=\"body_title\">Forecast</font>
  <br />
  <font class=\"body_text\">
    <span style=\"line-height: 22px\">
      ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["forecast"]) ? $context["forecast"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["hour"]) {
                // line 59
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["hour"]));
                echo "<br />
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hour'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "    </span>
  </font>
  <br />
  <div>
    <font class=\"body_title\">Radar</font>
    <br />
    <div id=\"img_div\">
      <img id=\"img_base\" src=\"";
            // line 68
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["radar_gif"]) ? $context["radar_gif"] : null), "html", null, true));
            echo "\" />
      <img id=\"img_sat\" src=\"";
            // line 69
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["map_img"]) ? $context["map_img"] : null), "html", null, true));
            echo "\" />
    </div>
    <br /><br />
  </div>
  <strong>MySQL</strong><br />
  ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["database_test"]) ? $context["database_test"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 75
                echo "      <font class=\"body_text\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["item"], "html", null, true));
                echo "</font><br />
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "  <br />
  <br />
  <br />
  <small>Debug:</small><br />
  ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
                // line 82
                echo "    <small>";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["line"], "html", null, true));
                echo "</small><br />
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
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
        return array (  175 => 82,  171 => 81,  165 => 77,  156 => 75,  152 => 74,  144 => 69,  140 => 68,  131 => 61,  122 => 59,  118 => 58,  108 => 51,  104 => 50,  94 => 43,  90 => 42,  86 => 41,  80 => 38,  74 => 35,  69 => 34,  65 => 32,  63 => 31,  43 => 13,);
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
/* <style>*/
/* #img_div {*/
/*   position: relative;*/
/*   display: inline;*/
/* }*/
/* #img_base {*/
/*   position: absolute;*/
/*   bottom: -10;*/
/*   right: -10;*/
/* }*/
/* .body_text {*/
/*   font-family: Consolas, Monaco, 'Lucida Sans Typewriter', monospace;*/
/* }*/
/* .body_title {*/
/*   font-weight: bold;*/
/*   size: 4;*/
/* }*/
/* </style>*/
/* {% if debug_info.error %}*/
/*   <font size="5"><b>Error!</b></font><br />*/
/* {% else %}*/
/*   <font size="5"><b>{{ subheading }}</b></font><br />*/
/*   <small>{{ timestamp }}</small><br /><br />*/
/*   <div>*/
/*     <font class="body_title">Current conditions</font><br />*/
/*     <img style="display: block; vertical-align: middle;  margin-right: 8px; float: left;" src="{{ current_icon }}" />*/
/*       <span style="display: block; overflow: auto;">*/
/*         <font class="body_text">*/
/*           {{ current_cond.text }}<br />*/
/*           Temperature: {{ current_cond.temp }} &deg;F<br />*/
/*           Wind: {{ current_cond.precip }} mph<br />*/
/*         </font>*/
/*       </span>*/
/*     </font>*/
/*   </div>*/
/*   <p>*/
/*     <font class="body_text"><br />*/
/*       {{ summary.today|raw }}<br />*/
/*       {{ summary.hr|raw }}<br />*/
/*     </font>*/
/*   </p>*/
/*   <font class="body_title">Forecast</font>*/
/*   <br />*/
/*   <font class="body_text">*/
/*     <span style="line-height: 22px">*/
/*       {% for hour in forecast %}*/
/*         {{ hour|raw }}<br />*/
/*       {% endfor %}*/
/*     </span>*/
/*   </font>*/
/*   <br />*/
/*   <div>*/
/*     <font class="body_title">Radar</font>*/
/*     <br />*/
/*     <div id="img_div">*/
/*       <img id="img_base" src="{{ radar_gif }}" />*/
/*       <img id="img_sat" src="{{ map_img }}" />*/
/*     </div>*/
/*     <br /><br />*/
/*   </div>*/
/*   <strong>MySQL</strong><br />*/
/*   {% for item in database_test %}*/
/*       <font class="body_text">{{ item }}</font><br />*/
/*   {% endfor %}*/
/*   <br />*/
/*   <br />*/
/*   <br />*/
/*   <small>Debug:</small><br />*/
/*   {% for line in debug_info %}*/
/*     <small>{{ line }}</small><br />*/
/*   {% endfor %}*/
/* {% endif %}*/
/* */
